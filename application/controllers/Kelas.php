<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kelas_model','kelas');
    }
    
	public function index()
	{
            $data['title'] = 'Data Kelas';
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelas/index', $data);
            $this->load->view('templates/footer', $data);
        
    }
	public function getData()
	{               
        $html = $this->load->view('kelas/tabel', ['dataKelas'=>$this->kelas->pageKelas()], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }

    public function simpan(){
        if($this->kelas->validation("save")){ 
            $this->kelas->save(); 

			$response = [
				'status'=>'sukses',
				'pesan'=>'Data berhasil disimpan',
            ];
		}else{
			$response =[
				'status'=>'gagal',
				'pesan'=>validation_errors()
            ];
		}

		echo json_encode($response);
    }

    public function tampilEdit($id){
    
        $query="SELECT * FROM kelas WHERE id=$id";

        $result=$this->db->query($query)->row_array();
        echo json_encode($result);
    }

    public function edit($id){
        if($this->kelas->validation("edit")){ 
            $this->kelas->edit($id); 
    
            $response = [
                'status'=>'sukses',
                'pesan'=>'Data berhasil diedit',
            ];
		}else{
			$response =[
				'status'=>'gagal',
				'pesan'=>validation_errors()
            ];
		}

		echo json_encode($response);
    }

    public function delete($id){
        $this->kelas->delete($id);
		
		$response = [
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
        ];

		echo json_encode($response);
    }





}

