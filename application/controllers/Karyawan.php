<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    private $filename = 'import_data';

    public function __construct(){
        parent::__construct();

        $this->load->model('karyawan_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->user_model->cek_session();
    }

	public function index()
	{ 
        $data['karyawan'] = $this->karyawan_model->showAll();
		$this->load->view('karyawan/index', $data);
    }

    public function add()
	{
        $karyawan = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if($validation->run()){
            $karyawan->save();
            redirect('karyawan');
        }

		$this->load->view('karyawan/form');
    }

    public function delete($id){
        $this->karyawan_model->delete($id);
        redirect('karyawan');
    }

    public function import(){
        if($_POST['btn']){
            $upload = $this->karyawan_model->uploadFile($this->filename);

            if($upload['result'] == 'success'){
                include APPPATH.'third_party\PHPExcel\PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');

                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                $data = array();

                $numrow = 1;
                foreach($sheet as $row){
                    if($numrow > 1){
                        array_push($data, array(
                            'id_karyawan' => '',
                            'nama' => $row['A'],
                            'departemen' => $row['B']
                        ));
                    }

                    $numrow++;
                }
                
                $this->karyawan_model->insertMultiple($data);

                redirect('karyawan');
            }
        }
    }
}
