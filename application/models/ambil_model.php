<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ambil_model extends CI_Model {
    private $_table = 'tb_transaksi_ambil';

    public $kd_transaksi;
    public $tgl;
    public $id_baju;
    public $qty;
    public $keterangan;

    public function rules(){
        return [
            [
                'field' => 'keterangan',
                'label' => 'keterangan',
                'rules' => 'required'
            ],
            [
                'field' => 'tgl',
                'label' => 'tgl',
                'rules' => 'required|date'
            ],
            [
                'field' => 'kd_transaksi',
                'label' => 'kd_transaksi',
                'rules' => 'required'
            ]
        ];
    }

    public function rulesKembali(){
        return [
            [
                'field' => 'id_baju',
                'label' => 'id_baju',
                'rules' => 'required'
            ]
        ];
    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_baju');
        $this->db->join('tb_transaksi_ambil', 'tb_transaksi_ambil.id_baju = tb_baju.id_baju');
        return $this->db->where('tb_transaksi_ambil.id_baju', $id)->order_by('tgl', 'desc')->get()->result();
    }

    public function getAmbil($id){
        $this->db->select('*');
        $this->db->from('tb_baju');
        $this->db->join('tb_transaksi_ambil', 'tb_transaksi_ambil.id_baju = tb_baju.id_baju');
        return $this->db->where('tb_transaksi_ambil.id_ta', $id)->get()->row();
    }
    
    public function save(){
        $post = $this->input->post();

        $this->kd_transaksi = $post['kd_transaksi'];
        $this->tgl = $post['tgl'];
        $this->keterangan = $post['keterangan'];
        if(!empty($post['id_baju'])){
            for($i=0; $i<count($post['id_baju']); $i++){
                $this->id_baju = $post['id_baju'][$i];
                $this->qty = $post['qty'][$i];
                
                // min
                if($this->min($this->id_baju, $this->qty)){
                    $this->db->insert($this->_table, $this);
                }
            }
        }
    }

    public function saveKembali(){
        $post = $this->input->post();

        $this->kd_transaksi = $post['kd_transaksi'];
        $this->tgl = date('Y-m-d');
        $this->keterangan = $post['keterangan'];
        $this->id_baju = $post['id_baju'];
        $this->qty = $post['qty'];

        $id = $post['id_ta'];
        $id_baju2 = $post['id_baju2'];
        
        // min
        if($this->min($this->id_baju, $this->qty)){
            $this->db->insert($this->_table, $this);
        }

        // plus
        if($this->plus($id_baju2, $this->qty)){
            $this->db->where('id_ta', $id)->delete($this->_table);
        }
    }

    public function delete($id){
        $data = $this->db->where('id_ta', $id)->get($this->_table)->row();
        if($this->plus($data->id_baju, $data->qty)){
            $this->db->where('id_ta', $id)->delete($this->_table);
        }
    }

    public function min($id, $qty){
        $data = $this->db->where('id_baju', $id)->get('tb_baju')->row();
        
        $min = $data->jml - $qty;
        if($min >= 0){
            $array = array('jml'=>$min);
            $this->db->where('id_baju', $id)->update('tb_baju', $array);
            return true;
        }else{
            return false;
        }
    }

    public function plus($id, $qty){
        $data = $this->db->where('id_baju', $id)->get('tb_baju')->row();
        
        $plus = $data->jml + $qty;
        $array = array('jml'=>$plus);
        $this->db->where('id_baju', $id)->update('tb_baju', $array);
        return true;
    }
}
