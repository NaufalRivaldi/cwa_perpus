<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->model('karyawan_model');
        $this->load->model('buku_model');
        $this->load->model('pinjam_model');
        $this->load->model('kembali_model');
        $this->load->model('user_model');
        $this->user_model->cek_session();
    }
    
    // Peminjaman
    public function peminjaman(){
        $data['date'] = date('Y-m-d');
        $data['karyawan'] = $this->karyawan_model->showAll();
        $data['buku'] = $this->buku_model->showAll();
        $data['kd_pinjam'] = $this->kdPinjam();
        $this->load->view('transaksi/peminjaman/index', $data);
    }

    public function viewPinjam(){
        $data['pinjam'] = $this->pinjam_model->showAll();
        $this->load->view('transaksi/peminjaman/list', $data);
    }

    public function detailpinjam($kd_pinjam){
        $data['pinjam'] = $this->pinjam_model->showByKode($kd_pinjam);
        $data['buku'] = $this->buku_model->showByKode($kd_pinjam);
        $this->load->view('transaksi/peminjaman/view', $data);
    }

    public function pinjam(){
        $pinjam = $this->pinjam_model;
        $validation = $this->form_validation;
        $validation->set_rules($pinjam->rules());

        if($validation->run()){
            $kode = $pinjam->save();
            redirect('transaksi/detailpinjam/'.$kode);
        }

        redirect('transaksi/peminjaman');
    }

    public function deletePinjam($kd_pinjam){
        $this->pinjam_model->delete($kd_pinjam);
        redirect('transaksi/viewpinjam');
    }

    public function kdPinjam(){
        $kode_last = $this->db->order_by('id_pinjam', 'desc')->limit(1)->get('tb_peminjaman')->row();

        if(empty($kode_last)){
            $awal = "P0";
            $awal = explode('P', $awal);
            
            $awal[1] += 1;
            
            return "P".$awal[1];
        }else{
            $awal = $kode_last->kd_pinjam;
            $awal = explode('P', $awal);
            
            $awal[1] += 1;
            
            return "P".$awal[1];
        }
    }

    public function printPinjam($kd_pinjam){
        $pinjam = $this->pinjam_model->showByKode($kd_pinjam);
        $buku = $this->buku_model->showByKode($kd_pinjam);

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Image(base_url('assets/img/logo.png'),10,5,'C');
        $pdf->Cell(190,7,'TOKO CAT CITRA WARNA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'BUKTI PEMINJAMAN BUKU',0,1,'C');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        
        $pdf->Cell(0,8,'Kode Peminjaman : '.$pinjam->kd_pinjam,0,1);
        $pdf->Cell(0,8,'Tanggal Peminjaman : '.$pinjam->tgl,0,1);
        $pdf->Cell(0,8,'Nama Peminjam : '.$pinjam->nama,0,1);
        $pdf->Cell(0,8,'Departemen : '.$pinjam->departemen,0,1);
        $pdf->Cell(0,8,'Buku : ',0,1);

        // table
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'No',1,0);
        $pdf->Cell(140,6,'Judul Buku',1,0);
        $pdf->Cell(27,6,'Jumlah Pinjam',1,1);
        $pdf->SetFont('Arial','',10);
        $i = 1;
        foreach($buku as $row){
            $pdf->Cell(20,6,$i++,1,0);
            $pdf->Cell(140,6,$row->judul,1,0);
            $pdf->Cell(27,6,$row->qty.' Pcs',1,1);
        }

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        
        $pdf->Cell(0,10,'Penerima Buku,',0,1);
        $pdf->Cell(10,3,'',0,1);
        $pdf->Cell(0,18,$pinjam->nama,0,1);
        
        $pdf->Output();
    }


    // Pengembalian
    public function pengembalian(){
        if(!empty($_POST['btn-cek'])){
            $post = $this->input->post();
            $kode = $post['kd_pinjam'];

            $pinjam = $this->pinjam_model->showByKode($kode);
            if(!empty($pinjam)){
                $data['buku'] = $this->buku_model->showByKode($kode);

                $data['date'] = date('Y-m-d');
                $data['kd_pinjam'] = $pinjam->kd_pinjam;
                $data['nama'] = $pinjam->nama;
                $data['tgl'] = $pinjam->tgl;
                $data['departemen'] = $pinjam->departemen;
                $data['denda'] = $this->denda($pinjam->tgl);
            }else{
                $data['buku'] = "";
                $data['kd_pinjam'] = "";
                $data['nama'] = "";
                $data['tgl'] = "";
                $data['departemen'] = "";
                $data['date'] = date('Y-m-d');
                $data['denda'] = 0;
            }
            

            return $this->load->view('transaksi/pengembalian/index', $data);
        }

        $data['buku'] = "";
        $data['kd_pinjam'] = "";
        $data['nama'] = "";
        $data['tgl'] = "";
        $data['departemen'] = "";
        $data['date'] = date('Y-m-d');
        $data['denda'] = 0;

        return $this->load->view('transaksi/pengembalian/index', $data);
    }

    public function kembali(){
        $kembali = $this->kembali_model;
        $validation = $this->form_validation;
        $validation->set_rules($kembali->rules());

        if($validation->run()){
            $kembali->save();
            redirect('transaksi/pengembalian');
        }
        redirect('transaksi/pengembalian');
    }

    public function denda($tgl_pinjam){
        $tanggal = new DateTime($tgl_pinjam);
        $skrng = new DateTime();
        $perbedaan = $tanggal->diff($skrng);
        $hari = $perbedaan->d;

        $denda = 0;

        // perhitungan
        if($hari > 7){
            $hari -= 7;
            $denda = $hari * 2000;
        }
        
        return $denda;
    }

    // Perpanjangan
    public function perpanjangan(){
        $data['date'] = date('Y-m-d');
        $this->load->view('transaksi/perpanjangan/index', $data);
    }
}
