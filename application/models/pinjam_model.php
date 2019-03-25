<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pinjam_model extends CI_Model {
    private $_table = 'tb_peminjaman';

    public $id_buku;
    public $id_karyawan;
    public $kd_pinjam;
    public $tgl;
    public $jml;
    public $stat;

    public function rules(){
        return [
            [
				'field' => 'id_karyawan',
				'label' => 'id_karyawan',
				'rules' => 'required'
			],
			[
				'field' => 'kd_pinjam',
				'label' => 'kd_pinjam',
				'rules' => 'required'
            ]
        ];
    }

    public function showAll(){
        
    }

    public function save(){
        $post = $this->input->post();

        $this->id_karyawan = $post['id_karyawan'];
        $this->kd_pinjam = $post['kd_pinjam'];
        $this->tgl = $post['tgl'];
        $this->stat = 'pinjam';

        $row = count($post['id_buku']);
        for($i=0; $i<$row; $i++){
            $this->id_buku = $post['id_buku'][$i];
            $this->jml = $post['jml'][$i];

            $this->db->insert('tb_peminjaman', $this);
        }

        return true;
    }
}
