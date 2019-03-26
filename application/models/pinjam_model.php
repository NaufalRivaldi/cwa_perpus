<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pinjam_model extends CI_Model {
    private $_table = 'tb_peminjaman';

    public $id_buku;
    public $id_karyawan;
    public $kd_pinjam;
    public $tgl;
    public $qty;
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
        $this->db->select('*');
        $this->db->from('tb_peminjaman');
        $this->db->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_peminjaman.id_karyawan');
        return $this->db->group_by('kd_pinjam')->order_by('kd_pinjam', 'desc')->where('stat', 'pinjam')->get()->result();
    }

    public function showByKode($kd_pinjam){
        $this->db->select('*');
        $this->db->from('tb_peminjaman');
        $this->db->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_peminjaman.id_karyawan');
        return $this->db->group_by('kd_pinjam')->where('kd_pinjam', $kd_pinjam)->where('stat', 'pinjam')->get()->row();
    }

    public function showByIdBook($id){
        $this->db->select('*');
        $this->db->from('tb_peminjaman');
        $this->db->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_peminjaman.id_karyawan');
        return $this->db->where('id_buku', $id)->where('stat', 'pinjam')->get()->result();
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
            $this->qty = $post['jml'][$i];
            if($this->minStock($this->id_buku, $this->qty)){
                $this->db->insert('tb_peminjaman', $this);
            }
        }

        return $this->kd_pinjam;
    }

    public function delete($kd_pinjam){
        $pinjam = $this->db->where('kd_pinjam', $kd_pinjam)->get($this->_table)->result();

        foreach($pinjam as $row){
            $buku = $this->db->where('id_buku', $row->id_buku)->get('tb_buku')->row();
            $jml = $buku->jml;
            $jml += $row->qty;
            $data = array(
                'jml' => $jml
            );
            $this->db->update('tb_buku', $data, array('id_buku' => $row->id_buku));
        }

        return $this->db->where('kd_pinjam', $kd_pinjam)->delete($this->_table);
    }

    public function minStock($id_buku, $qty){
        $buku = $this->db->where('id_buku', $id_buku)->get('tb_buku')->row();

        $jml = $buku->jml;
        if($jml > $qty){
            $jml -= $qty;
            $data = array(
                'jml' => $jml
            );
            $this->db->update('tb_buku', $data, array('id_buku' => $id_buku));
            return true;
        }else{
            return false;
        }
    }
}
