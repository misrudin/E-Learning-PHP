<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Siswa_model','siswa');
    }
    
	public function index()
	{
			$data['title'] = 'Data Siswa';

            $this->load->model('Kelas_model','kelas');
            $data['dataKelas']=$this->kelas->getKelas();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('siswa/index', $data);
            $this->load->view('templates/footer', $data);
        
    }

    public function getData()
	{               
        $html = $this->load->view('siswa/tabel', ['dataSiswa'=>$this->siswa->getSiswa()], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }

    public function simpan(){
        if($this->siswa->validation("save")){ 
            $this->siswa->save(); 

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

        $query="SELECT * FROM siswa WHERE id=$id";

        $result=$this->db->query($query)->row_array();
        echo json_encode($result);
    }

    public function edit($id){
        if($this->siswa->validation("edit")){ 
            $this->siswa->edit($id); 
    
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
        $this->siswa->delete($id);
		
		$response = [
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
        ];

		echo json_encode($response);
    }





}

