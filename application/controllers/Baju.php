<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baju extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('baju_model');
        $this->load->model('ambil_model');
        $this->load->model('tukar_model');
        $this->load->library('form_validation');
        $this->user_model->cek_session();
    }

	public function index()
	{ 
        $data['tanggal'] = date('Y-m-d');
        $data['kode'] = $this->kode();
        $data['kode_tukar'] = $this->kodeTukar();

        $data['baju'] = $this->baju_model->showAll();
        $data['group'] = $this->baju_model->showAllGroup();
		$this->load->view('baju/index', $data);
    }

    public function viewBaju($id){
        $data['baju'] = $this->baju_model->getById($id);
        $baju = $this->baju_model->getById($id);
        $data['historia'] = $this->ambil_model->getById($baju->id_baju);
        $data['historit'] = $this->tukar_model->getById($baju->id_baju);
		$this->load->view('baju/view_baju', $data);
    }

    // public function 

    public function data()
	{   
        $data['baju'] = $this->baju_model->showAll();
		$this->load->view('baju/data', $data);
    }

    public function add(){
        $baju = $this->baju_model;
        $validation = $this->form_validation;
        $validation->set_rules($baju->rules());

        if($validation->run()){
            $baju->save();
            redirect('baju/data');
        }

        echo "Gagal";
    }

    public function edit($id){
        $baju = $this->baju_model;
        $validation = $this->form_validation;
        $validation->set_rules($baju->rules());

        if($validation->run()){
            $baju->update();
            redirect('baju/data');
        }

        $data['baju'] = $this->baju_model->getById($id);
        $this->load->view('baju/edit', $data);
    }

    public function delete($id){
        $this->baju_model->delete($id);
        redirect('baju/data');
    }

    // Ambil Baju
    public function addAmbil(){
        $ambil = $this->ambil_model;
        $validation = $this->form_validation;
        $validation->set_rules($ambil->rules());

        if($validation->run()){
            $ambil->save();
            $this->session->set_flashdata('flash','ambil-berhasil');
            redirect('baju/index');
        }

        echo "Gagal";
    }

    public function deleteAmbil($id){
        $ambil = $this->ambil_model;
        $ambil->delete($id);
        $this->session->set_flashdata('flash','hapus');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // tukar
    public function addTukar(){
        $tukar = $this->tukar_model;
        $validation = $this->form_validation;
        $validation->set_rules($tukar->rules());

        if($validation->run()){
            $tukar->save();
            $this->session->set_flashdata('flash','tukar-berhasil');
            redirect('baju/index');
        }

        echo "Gagal";
    }

    public function deleteTukar($id){
        $tukar = $this->tukar_model;
        $tukar->delete($id);
        $this->session->set_flashdata('flash','hapus');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // function tambahan
    public function kode(){
        $kode_last = $this->db->order_by('kd_transaksi', 'desc')->limit(1)->get('tb_transaksi_ambil')->row();

        if(empty($kode_last)){
            $awal = "TA0";
            $awal = explode('TA', $awal);
            
            $awal[1] += 1;
            
            return "TA".$awal[1];
        }else{
            $awal = $kode_last->kd_transaksi;
            $awal = explode('TA', $awal);
            
            $awal[1] += 1;
            
            return "TA".$awal[1];
        }
    }

    public function kodeTukar(){
        $kode_last = $this->db->order_by('kd_transaksi', 'desc')->limit(1)->get('tb_transaksi_tukar')->row();

        if(empty($kode_last)){
            $awal = "TT0";
            $awal = explode('TT', $awal);
            
            $awal[1] += 1;
            
            return "TT".$awal[1];
        }else{
            $awal = $kode_last->kd_transaksi;
            $awal = explode('TT', $awal);
            
            $awal[1] += 1;
            
            return "TT".$awal[1];
        }
    }
}
