<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class helper extends CI_Model {
    public function ambil($id){
        $data = $this->db->where('id_baju',$id)->get('tb_transaksi_ambil')->result();
        $jml = 0;
        foreach($data as $row){
            $jml += $row->qty;
        }

        return $jml;
    }

    public function tukar($id){
        $data = $this->db->where('id_baju',$id)->get('tb_transaksi_tukar')->result();
        $jml = 0;
        foreach($data as $row){
            $jml += $row->qty;
        }

        return $jml;
    }
}
