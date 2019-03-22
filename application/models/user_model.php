<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {
    private $_table = 'tb_user';

    public $nama;
    public $username;
    public $pwd;
    public $stat;

    public function rules(){
        return [
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'required'
			],
			[
				'field' => 'pwd',
				'label' => 'pwd',
				'rules' => 'required'
			]
		];
    }
    
    public function showAll(){
        return $this->db->order_by('nama', 'asc')->get($this->_table)->result();
    }


    // auth
    public function login(){
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = sha1($post['pwd']);
        return $this->db->where('username', $this->username)->where('pwd', $this->password)->get($this->_table);
    }

    public function cek_session(){
		if($this->session->userdata('logged_in') != true){
			$this->session->set_flashdata('Danger', 'Harap melakukan login terlebih dahulu.');
			redirect('home');
		}
	}

	public function cek_session_kosong(){
		if($this->session->userdata('logged_in') == true){
			redirect('home/dashboard');
		}
	}
}
