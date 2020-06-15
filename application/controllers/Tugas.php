<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Tugas_model','tugas');
    }
    
	public function index()
	{
            $data['title'] = 'Tugas';
            
            $this->load->model('Kelas_model','kelas');
            $data['dataKelas']=$this->kelas->getKelas();
            $this->load->model('Mapel_model','mapel');
            $data['dataMapel']=$this->mapel->getMapel();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('tugas/index', $data);
            $this->load->view('templates/footer', $data);
        
    }

    public function getData()
	{               
        $html = $this->load->view('tugas/tabel', ['dataTugas'=>$this->tugas->getTugas()], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }

    public function simpan(){
        if($this->tugas->validation("save")){ 
           $result= $this->tugas->save(); 

			$response = [
				'status'=>'sukses',
                'pesan'=>'Data berhasil disimpan',
                'result'=> $result,
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

        $query="SELECT * FROM tugas WHERE id=$id";

        $result=$this->db->query($query)->row_array();
        echo json_encode($result);
    }
    public function tampileditEsay($id){

        $query="SELECT * FROM esay WHERE id=$id";

        $result=$this->db->query($query)->row_array();
        echo json_encode($result);
    }
    public function tampileditPg($id){

        $query="SELECT * FROM pg WHERE id=$id";

        $result=$this->db->query($query)->row_array();
        echo json_encode($result);
    }

    public function edit(){
        if($this->tugas->validation("edit")){ 
            $this->tugas->edit(); 
    
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
        $this->tugas->delete($id);
		
		$response = [
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
        ];

		echo json_encode($response);
    }


    public function tambahisi(){
            $data['title'] = 'Tambah Isi';
            $tugas=(isset($_GET['tugasid'])) ? $_GET['tugasid'] : 0;
            $data['tugasDetail'] = $this->db->get_where('tugas', ['id' => $tugas])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('tugas/tambahisi', $data);
            $this->load->view('templates/footer', $data);
    }
    public function kerjakan(){
            $tugas=(isset($_GET['tugasid'])) ? $_GET['tugasid'] : 0;
            $data['tugasDetail'] = $this->db->get_where('tugas', ['id' => $tugas])->row_array();
            $data['title'] = 'Kerjakan';
            $this->load->view('templates/header2', $data);
            $this->load->view('tugas/kerjakan', $data);
            $this->load->view('templates/footer2', $data);
    }
    public function hasil(){
            $tugas=(isset($_GET['tugasid'])) ? $_GET['tugasid'] : 0;
            $data['tugasDetail'] = $this->db->get_where('tugas', ['id' => $tugas])->row_array();
            $data['title'] = 'Hasil';
            $data['dataEsay']=$this->tugas->getEsayJawaban($tugas);
            $data['dataPg']=$this->tugas->getPgJawaban2($tugas);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('tugas/hasil', $data);
            $this->load->view('templates/footer', $data);
    }

    public function getEsay($tugasid){
        $html = $this->load->view('tugas/esay', ['dataEsay'=>$this->tugas->getEsay($tugasid)], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }
    public function getPg($tugasid){
        $html = $this->load->view('tugas/pg', ['dataPg'=>$this->tugas->getPg($tugasid)], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }

    public function simpanEsay($tugasid){
        if($this->tugas->validation("esay")){ 
            $this->tugas->addEsay($tugasid); 

			$response = [
				'status'=>'sukses',
				'pesan'=>'Esay Ditambahkan',
            ];
		}else{
			$response =[
				'status'=>'gagal',
				'pesan'=>validation_errors()
            ];
		}

		echo json_encode($response);
    }
    public function simpanPg($tugasid){
        if($this->tugas->validation("pg")){ 
            $this->tugas->addPg($tugasid); 

			$response = [
				'status'=>'sukses',
				'pesan'=>'Pilihan Ganda Ditambahkan',
            ];
		}else{
			$response =[
				'status'=>'gagal',
				'pesan'=>validation_errors()
            ];
		}

		echo json_encode($response);
    }

    
    public function editEsay(){
        if($this->tugas->validation("esay")){ 
            $this->tugas->editEsay(); 
    
            $response = [
                'status'=>'sukses',
                'pesan'=>'Esay berhasil diedit',
            ];
		}else{
			$response =[
				'status'=>'gagal',
				'pesan'=>validation_errors()
            ];
		}

		echo json_encode($response);
    }
    public function editPg(){
        if($this->tugas->validation("pg")){ 
            $this->tugas->editPg(); 
    
            $response = [
                'status'=>'sukses',
                'pesan'=>'Pilihan Ganda berhasil diedit',
            ];
		}else{
			$response =[
				'status'=>'gagal',
				'pesan'=>validation_errors()
            ];
		}

		echo json_encode($response);
    }

    public function deleteEsay($id){
        $this->tugas->deleteEsay($id);
		
		$response = [
			'status'=>'sukses',
			'pesan'=>'Esay dihapus',
        ];

		echo json_encode($response);
    }

    public function deletePg($id){
        $this->tugas->deletePG($id);
		
		$response = [
			'status'=>'sukses',
			'pesan'=>'Pilihan Ganda dihapus',
        ];

		echo json_encode($response);
    }

    public function editStatus($tugasid){
            $this->tugas->editStatus($tugasid); 

            $this->session->set_flashdata('message', '1');
            redirect('tugas');
    
        //     $response = [
        //         'status'=>'sukses',
        //         'pesan'=>'Yey, Tugas Publish',
        //     ];

		// echo json_encode($response);
    }


    public function getEsayJawaban($tugasid){
        $html = $this->load->view('tugas/kerjakanEsay', ['jawabanEsay'=>$this->tugas->getEsayJawaban($tugasid)], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }
    public function getPgJawaban($tugasid){
        $html = $this->load->view('tugas/kerjakanPg', ['jawabanPg'=>$this->tugas->getPgJawaban($tugasid)], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }
    public function getEsayKerjakan($tugasid){
        $data['dataEsay']=$this->tugas->getEsayKerjakan($tugasid);
        $data['jawabanEsay']=$this->tugas->getEsayJawaban($tugasid);
    
        $html = $this->load->view('tugas/kerjakanEsay', $data , true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }
    public function getPgKerjakan($tugasid){
        $data['dataPg']=$this->tugas->getPgKerjakan($tugasid);
        $data['jawabanPg']=$this->tugas->getPgJawaban($tugasid);

        $html = $this->load->view('tugas/kerjakanPg', $data , true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }

    public function jawabEsay($id){
            $this->tugas->jawabEsay($id); 

			$response = [
				'status'=>'sukses',
				'pesan'=>'Jawaban disimpan',
            ];

		echo json_encode($response);
    }
    public function jawabPg(){
            $result = $this->tugas->jawabPg(); 

			$response = [
				'status'=>'sukses',
				'pesan'=>'Esay Ditambahkan',
            ];

		echo json_encode($response);
    }


}

