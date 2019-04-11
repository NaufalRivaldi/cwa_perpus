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

		$data['jml_buku'] = $this->db->get('tb_buku')->num_rows();
		$data['jml_karyawan'] = $this->db->get('tb_karyawan')->num_rows();
		$data['jml_pinjam'] = $this->db->where('stat', 'pinjam')->group_by('kd_pinjam')->get('tb_peminjaman')->num_rows();
		$this->load->view('dashboard', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}
