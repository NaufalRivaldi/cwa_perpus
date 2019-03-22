<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function index()
	{
		// 
    }
    
    // Peminjaman
    public function peminjaman(){
        $data['date'] = date('Y-m-d');
        $this->load->view('transaksi/peminjaman/index', $data);
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
