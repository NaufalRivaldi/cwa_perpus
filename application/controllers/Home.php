<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();

        $this->load->model('user_model');
	}
	
	public function index()
	{
		$this->user_model->cek_session_kosong();
		$this->load->view('login');
	}

	public function dashboard(){
		$this->user_model->cek_session();
		$this->load->view('dashboard');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}
