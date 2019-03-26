<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('buku_model');
        $this->load->model('pinjam_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->user_model->cek_session();
    }

	public function index()
	{ 
        $data['buku'] = $this->buku_model->showAll();
		$this->load->view('buku/index', $data);
    }

    public function add(){
        $buku = $this->buku_model;
        $validation = $this->form_validation;
        $validation->set_rules($buku->rules());

        if($validation->run()){
            $buku->save();
            redirect('buku');
        }

        redirect('buku');
    }

    public function view($id_buku){
        $data['buku'] = $this->buku_model->getById($id_buku);
        $data['pinjam'] = $this->pinjam_model->showByIdBook($id_buku);
		$this->load->view('buku/view', $data);
    }

    public function delete($id){
        $buku = $this->buku_model;
        $buku->deleteImage($id);
        $buku->delete($id);

        redirect('buku');
    }
}
