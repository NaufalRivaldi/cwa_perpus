<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kembali_model extends CI_Model {
    private $_table = 'tb_pengembalian';

    public $id_pinjam;
    public $tgl;
    public $denda;

    public function rules(){
        return [
            [
				'field' => 'denda',
				'label' => 'denda',
				'rules' => 'required'
            ]
        ];
    }

    public function save(){
        $post = $this->input->post();

        $this->tgl = $post['tgl'];
        $this->denda = $post['denda'];

        // kembali
        if(!empty($post['id_buku'])){
            for($i=0; $i<count($post['id_buku']); $i++){
                $pinjam = $this->db->where('kd_pinjam', $post['kd_pinjam'])->where('id_buku', $post['id_buku'][$i])->get('tb_peminjaman')->row();
                
                $this->id_pinjam = $pinjam->id_pinjam;

                $qty = $pinjam->qty;

                $buku = $this->db->where('id_buku', $post['id_buku'][$i])->get('tb_buku')->row();
                $jml = $buku->jml;
                $jml += $qty;
                $data = array(
                    'jml' => $jml
                );

                // update stock buku
                $this->db->update('tb_buku', $data, array('id_buku' => $post['id_buku'][$i]));

                $data = array(
                    'stat' => 'kembali'
                );

                // update stock buku
                $this->db->update('tb_peminjaman', $data, array('id_pinjam' => $pinjam->id_pinjam));

                $this->db->insert('tb_pengembalian', $this);
            }
            return true;
        }
    }
}
