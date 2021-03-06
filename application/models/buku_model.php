<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku_model extends CI_Model {
    private $_table = 'tb_buku';

    public $kode_buku;
    public $judul;
    public $gambar = "default.png";
    public $pengarang;
    public $penerbit;
    public $jml;
    public $keterangan;

    public function rules(){
        return [
            [
                'field' => 'kode_buku',
                'label' => 'kode_buku',
                'rules' => 'required'
            ],
            [
                'field' => 'judul',
                'label' => 'judul',
                'rules' => 'required'
            ],
            [
                'field' => 'pengarang',
                'label' => 'pengarang',
                'rules' => 'required'
            ],
            [
                'field' => 'penerbit',
                'label' => 'penerbit',
                'rules' => 'required'
            ],
            [
                'field' => 'jml',
                'label' => 'jml',
                'rules' => 'required'
            ],
            [
                'field' => 'keterangan',
                'label' => 'keterangan',
                'rules' => 'required'
            ]
        ];
    }
    
    public function showAll(){
        return $this->db->order_by('judul', 'asc')->get($this->_table)->result();
    }

    public function getById($id){
        return $this->db->where('id_buku', $id)->get($this->_table)->row();
    }

    public function showByKode($kd_pinjam){
        $this->db->select('*');
        $this->db->from('tb_peminjaman');
        $this->db->join('tb_buku', 'tb_buku.id_buku = tb_peminjaman.id_buku');
        return $this->db->where('kd_pinjam', $kd_pinjam)->where('stat', 'pinjam')->get()->result();
    }

    public function save(){
        $post = $this->input->post();
        $this->kode_buku = $post['kode_buku'];
        $this->judul = $post['judul'];

        if(!empty($_FILES['gambar'])){
            $this->gambar = $this->uploadGambar();
        }else{
            $this->gambar = "default.png";
        }

        $this->pengarang = $post['pengarang'];
        $this->penerbit = $post['penerbit'];
        $this->jml = $post['jml'];
        $this->keterangan = $post['keterangan'];

        return $this->db->insert($this->_table, $this);
    }

    public function update(){
        $post = $this->input->post();

        $id = $post['id_buku'];
        $this->kode_buku = $post['kode_buku'];
        $this->judul = $post['judul'];

        if(!empty($_FILES['gambar']['name'])){
            $this->gambar = $this->uploadGambar();
        }else{
            $this->gambar = $post['gambar-old'];
        }

        $this->pengarang = $post['pengarang'];
        $this->penerbit = $post['penerbit'];
        $this->jml = $post['jml'];
        $this->keterangan = $post['keterangan'];

        return $this->db->where('id_buku', $id)->update($this->_table, $this);
    }

    public function delete($id){
        return $this->db->delete($this->_table, array('id_buku' => $id));
    }

    public function uploadGambar(){
        $this->load->library('upload');

        $config['upload_path'] = './assets/img/cover/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = uniqid();

        $this->upload->initialize($config);
        if($this->upload->do_upload('gambar')){
            return $this->upload->data('file_name');
        }

        return "default.png";
    }

    public function deleteImage($id){
        $buku = $this->getById($id);

        if($buku->gambar != 'default.png'){
            unlink('./assets/img/cover/'.$buku->gambar);
        }
    }
}
