<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Guru_model','guru');
    }
    
	public function index()
	{
			$data['title'] = 'Data Guru';
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('guru/index', $data);
            $this->load->view('templates/footer', $data);
        
    }

	public function getData()
	{               
        $html = $this->load->view('guru/tabel', ['dataGuru'=>$this->guru->getGuru()], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }

    public function simpan(){
        if($this->guru->validation("save")){ 
            $this->guru->save(); 

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
    
    /* ajax */

    public function tampiledit($id){
        $query="SELECT * FROM guru WHERE id=$id";

        $result=$this->db->query($query)->row_array();
        echo json_encode($result);
    }

    public function edit($id){
        if($this->guru->validation("edit")){ 
            $this->guru->edit($id); 
    
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


    /* end ajsx */

    public function delete($id){
        $this->guru->delete($id);
		
		$response = [
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
        ];

		echo json_encode($response);
    }





}

