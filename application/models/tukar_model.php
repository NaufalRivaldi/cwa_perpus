<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tukar_model extends CI_Model {
    private $_table = 'tb_transaksi_tukar';

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

    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_baju');
        $this->db->join('tb_transaksi_tukar', 'tb_transaksi_tukar.id_baju = tb_baju.id_baju');
        return $this->db->where('tb_transaksi_tukar.id_baju', $id)->order_by('tgl', 'desc')->get()->result();
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

    public function delete($id){
        $data = $this->db->where('id_tt', $id)->get($this->_table)->row();
        if($this->plus($data->id_baju, $data->qty)){
            $this->db->where('id_tt', $id)->delete($this->_table);
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
