<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('karyawan_model');
        $this->load->model('buku_model');
        $this->load->model('pinjam_model');
        $this->load->model('user_model');
        $this->user_model->cek_session();
    }

	public function index()
	{
		// 
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

    public function pinjam(){
        $pinjam = $this->pinjam_model;
        $validation = $this->form_validation;
        $validation->set_rules($pinjam->rules());

        if($validation->run()){
            $pinjam->save();
            redirect('transaksi/peminjaman');
        }

        redirect('transaksi/peminjaman');
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


    // Pengembalian
    public function pengembalian(){
        $data['date'] = date('Y-m-d');
        $this->load->view('transaksi/pengembalian/index', $data);
    }

    // Perpanjangan
    public function perpanjangan(){
        $data['date'] = date('Y-m-d');
        $this->load->view('transaksi/perpanjangan/index', $data);
    }
}
