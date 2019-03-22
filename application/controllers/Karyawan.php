<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('user_model');
        // $this->load->model('karyawan_model');
        $this->load->library('form_validation');
    }

	public function index()
	{ 
        $data['user'] = $this->user_model->showAll();
		$this->load->view('karyawan/index', $data);
    }

    public function add()
	{ 
		$this->load->view('karyawan/form');
    }
}
