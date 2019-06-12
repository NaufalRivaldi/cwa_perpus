<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class baju_model extends CI_Model {
    private $_table = 'tb_baju';

    public $nama_baju;
    public $uk;
    public $jml;

    public function rules(){
        return [
            [
                'field' => 'nama_baju',
                'label' => 'nama_baju',
                'rules' => 'required'
            ]
        ];
    }

    public function rulesAmbil(){
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
    
    public function showAll(){
        return $this->db->order_by('nama_baju', 'asc')->get($this->_table)->result();
    }
    // 
    public function showAllGroup(){
        return $this->db->group_by('nama_baju')->get($this->_table)->result();
    }

    public function getById($id){
        return $this->db->where('id_baju', $id)->get($this->_table)->row();
    }

    public function save(){
        $post = $this->input->post();

        $this->nama_baju = $post['nama_baju'];
        if(!empty($post['uk'])){
            for($i=0; $i<count($post['uk']); $i++){
                $this->uk = $post['uk'][$i];
                $this->jml = $post['jml'][$i];
                
                $this->db->insert($this->_table, $this);
            }
        }
    }

    public function update(){
        $post = $this->input->post();
        $id = $post['id_baju'];
        $this->nama_baju = $post['nama_baju'];
        $this->uk = $post['uk'];
        $this->jml = $post['jml'];

        return $this->db->where('id_baju',$id)->update($this->_table, $this);
    }
    
    public function delete($id){
        return $this->db->where('id_baju',$id)->delete($this->_table);
    }

    // Ambil baju
    public function saveAmbil(){
        $post = $this->input->post();

        $this->nama_baju = $post['nama_baju'];
        if(!empty($post['uk'])){
            for($i=0; $i<count($post['uk']); $i++){
                $this->uk = $post['uk'][$i];
                $this->jml = $post['jml'][$i];
                
                $this->db->insert($this->_table, $this);
            }
        }
    }
}
