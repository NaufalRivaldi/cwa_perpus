<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('buku_model');
        $this->load->library('form_validation');
    }

	public function index()
	{ 
        $data['buku'] = $this->buku_model->showAll();
		$this->load->view('buku/index', $data);
    }
}
