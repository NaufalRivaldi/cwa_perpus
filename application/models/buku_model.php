<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku_model extends CI_Model {
    private $_table = 'tb_buku';
    
    public function showAll(){
        return $this->db->order_by('judul', 'asc')->get($this->_table)->result();
    }
}
