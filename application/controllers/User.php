<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

	public function index()
	{ 
        $this->user_model->cek_session();
        $data['user'] = $this->user_model->showAll();
		$this->load->view('user/index', $data);
    }

    public function login(){
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if($validation->run()){
            $row = $user->login()->num_rows();
            $data['user'] = $user->login()->row();

            if($row > 0){
                $new_user = array(
                    'username' => $data['user']->nama,
                    'stat' => $data['user']->stat,
					'logged_in' => true
				);

				$this->session->set_userdata($new_user);

                $this->session->set_flashdata('login-success', 'Login Berhasil');
			    redirect('home/dashboard');
            }else{
                $this->session->set_flashdata('login-gagal', 'Login Gagal');
			    redirect('home');
            }
        }else{
            $this->session->set_flashdata('login-gagal', 'Login Gagal');
			redirect('home');
        }
    }
}
