<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan_model extends CI_Model {
    private $_table = 'tb_karyawan';

    public $nama;
    public $departemen;

    public function rules(){
        return [
            [
				'field' => 'nama',
				'label' => 'nama',
				'rules' => 'required'
			],
			[
				'field' => 'departemen',
				'label' => 'departemen',
				'rules' => 'required'
			]
        ];
    }
    
    public function showAll(){
        return $this->db->order_by('nama', 'asc')->get($this->_table)->result();
    }

    public function save(){
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->departemen = $post['departemen'];

        return $this->db->insert('tb_karyawan', $this);
    }

    public function delete($id){
        return $this->db->delete($this->_table, array('id_karyawan' => $id));
    }

    public function uploadFile($filename){
        $this->load->library('upload');

        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            
            return $return;
        }
    }

    public function insertMultiple($data){
        $cek = $this->db->get('tb_karyawan')->num_rows();

        if($cek > 0){
            $this->db->empty_table('tb_karyawan');
        }
        $this->db->insert_batch('tb_karyawan', $data);
    }
}
