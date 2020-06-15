<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{

	public function getTugas(){
        $sql1 = "SELECT tugas.id,tugas.type,tugas.batas_waktu,mapel.nama_mapel,kelas.nama_kelas,guru.nama_guru,tugas.status,tugas.id_kelas,tugas.id_mapel FROM tugas INNER JOIN kelas ON kelas.id=tugas.id_kelas INNER JOIN mapel ON mapel.id=tugas.id_mapel INNER JOIN guru ON guru.id=tugas.id_guru where tugas.status='publish' order by tugas.id desc";

        $limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
        $totalData=  count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
        $firstIndex= ($limit * $page) - $limit;

        $sql = "SELECT tugas.id,tugas.type,tugas.batas_waktu,mapel.nama_mapel,kelas.nama_kelas,guru.nama_guru,tugas.status,tugas.id_kelas,tugas.id_mapel FROM tugas INNER JOIN kelas ON kelas.id=tugas.id_kelas INNER JOIN mapel ON mapel.id=tugas.id_mapel INNER JOIN guru ON guru.id=tugas.id_guru where tugas.status='publish' order by tugas.id desc LIMIT $firstIndex, $limit";
        
        $result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
    }
        

        public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save"){
			$this->form_validation->set_rules('kelas', 'Kelas', 'required');
                        $this->form_validation->set_rules('mapel', 'Mapel', 'required');
                        $this->form_validation->set_rules('batas', 'Batas Waktu', 'required|numeric|max_length[5]');
                        $this->form_validation->set_rules('type', 'Type', 'required');
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
		}
		if($mode == "edit"){
			$this->form_validation->set_rules('kelas', 'Kelas', 'required');
                        $this->form_validation->set_rules('mapel', 'Mapel', 'required');
                        $this->form_validation->set_rules('batas', 'Batas Waktu', 'required|numeric|max_length[5]');
                        $this->form_validation->set_rules('type', 'Type', 'required');	
	
			if($this->form_validation->run()){
				return true;
			}else {
				return false;
			}	
		}
		if($mode == "esay"){
                $this->form_validation->set_rules('soal', 'Soal', 'required');
	
			if($this->form_validation->run()){
				return true;
			}else {
				return false;
			}	
		}
		if($mode == "pg"){
			$this->form_validation->set_rules('soal', 'Soal', 'required');
			$this->form_validation->set_rules('a', 'A', 'required');
			$this->form_validation->set_rules('b', 'B', 'required');
			$this->form_validation->set_rules('c', 'C', 'required');
			$this->form_validation->set_rules('d', 'D', 'required');
			$this->form_validation->set_rules('e', 'E', 'required');
			$this->form_validation->set_rules('benar', 'Kunci Jawaban', 'required');

		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
	}
	}

	public function save(){
	$data = [
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'id_mapel' => htmlspecialchars($this->input->post('mapel', true)),
            'batas_waktu' => htmlspecialchars($this->input->post('batas', true)),
            'type' => htmlspecialchars($this->input->post('type', true)),
            'id_guru' => 17,
            'status'=>'draft'
        ];

		$this->db->insert('tugas', $data);
		$insert_id=$this->db->insert_id();
        return $insert_id;
	}

	public function edit(){
		$id =$this->input->post('id');
		$data = [
                        'id_kelas' => htmlspecialchars($this->input->post('kelas', true)),
                        'id_mapel' => htmlspecialchars($this->input->post('mapel', true)),
                        'batas_waktu' => htmlspecialchars($this->input->post('batas', true)),
                        'type' => htmlspecialchars($this->input->post('type', true)),
                    ];
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('tugas');
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('tugas');
	}

	public function getEsay($tugasid){
		// $tugas=(isset($_GET['tugasid'])) ? $_GET['tugasid'] : 0;

        $sql1 = "SELECT esay.soal,esay.id FROM esay WHERE esay.id_tugas=$tugasid order by esay.id asc";

        $limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
        $totalData=  count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
        $firstIndex= ($limit * $page) - $limit;

        $sql = "SELECT esay.soal,esay.id FROM esay WHERE esay.id_tugas=$tugasid order by esay.id asc LIMIT $firstIndex, $limit";
        
        $result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
	}
	public function getEsayKerjakan($tugasid){
	    $sql = "SELECT esay.soal,esay.id FROM esay WHERE esay.id_tugas=$tugasid order by esay.id asc";
        
        $result = $this->db->query($sql)->result_array();
        return $result;
	}

	public function getEsayJawaban($tugasid){
		// $tugas=(isset($_GET['tugas'])) ? $_GET['tugas'] : 0;
		$siswa=1;
		$sql = "SELECT esay.soal,jawab_esay.jawaban,siswa.nama FROM jawab_esay INNER JOIN esay ON esay.id=jawab_esay.id_detail_tugas INNER JOIN siswa ON siswa.id=jawab_esay.id_siswa WHERE esay.id_tugas=$tugasid and jawab_esay.id_siswa=$siswa order by esay.id asc";
        
        $result = $this->db->query($sql)->result_array();
        return $result;
	}
	
	public function getPg($tugasid){
		// $tugas=(isset($_GET['tugas'])) ? $_GET['tugas'] : 0;

        $sql1 = "SELECT pg.soal,pg.A,pg.B,pg.C,pg.D,pg.E,pg.benar,pg.id FROM pg WHERE id_tugas=$tugasid order by pg.id asc";

        $limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
        $totalData=  count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
        $firstIndex= ($limit * $page) - $limit;

        $sql = "SELECT pg.soal,pg.A,pg.B,pg.C,pg.D,pg.E,pg.benar,pg.id FROM pg WHERE id_tugas=$tugasid order by pg.id asc LIMIT $firstIndex, $limit";
        
        $result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
	}
	public function getPgKerjakan($tugasid){
        $sql = "SELECT pg.soal,pg.A,pg.B,pg.C,pg.D,pg.E,pg.benar,pg.id FROM pg WHERE id_tugas=$tugasid order by pg.id asc";
        
        $result = $this->db->query($sql)->result_array();
        return $result;
	}
	
	public function getPgJawaban($tugasid){
		// $tugas=(isset($_GET['tugas'])) ? $_GET['tugas'] : 0;
		$siswa=1;
		// $sql = "SELECT pg.soal,pg.A,pg.B,pg.C,pg.D,pg.E,pg.benar,jawab_pg.jawaban,siswa.nama FROM pg INNER JOIN jawab_pg ON pg.id = jawab_pg.id_detail_tugas INNER JOIN siswa ON siswa.id = jawab_pg.id_siswa WHERE id_tugas=$tugasid and jawab_pg.id_siswa=$siswa order by pg.id asc";
		$sql = "SELECT jawab_pg.* FROM jawab_pg INNER JOIN pg ON jawab_pg.id_detail_tugas=pg.id WHERE pg.id_tugas=$tugasid and jawab_pg.id_siswa=$siswa order by pg.id asc";
        
        $result = $this->db->query($sql)->result_array();
        return $result;
	}
	public function getPgJawaban2($tugasid){
		// $tugas=(isset($_GET['tugas'])) ? $_GET['tugas'] : 0;
		$siswa=1;
		$sql = "SELECT pg.soal,pg.A,pg.B,pg.C,pg.D,pg.E,pg.benar,jawab_pg.jawaban,siswa.nama FROM pg INNER JOIN jawab_pg ON pg.id = jawab_pg.id_detail_tugas INNER JOIN siswa ON siswa.id = jawab_pg.id_siswa WHERE id_tugas=$tugasid and jawab_pg.id_siswa=$siswa order by pg.id asc";
        
        $result = $this->db->query($sql)->result_array();
        return $result;
	}

	public function addEsay($tugasid){
		// $tugas=(isset($_GET['tugas'])) ? $_GET['tugas'] : 0;
		$data = [
            'id_tugas' => $tugasid,
            'soal' => htmlspecialchars($this->input->post('soal', true)),
        ];

        $this->db->insert('esay', $data);
	}
	public function addPg($tugasid){
		// $tugas=(isset($_GET['tugas'])) ? $_GET['tugas'] : 0;
		$data = [
            'id_tugas' => $tugasid,
            'soal' => htmlspecialchars($this->input->post('soal', true)),
            'A' => htmlspecialchars($this->input->post('a', true)),
            'B' => htmlspecialchars($this->input->post('b', true)),
            'C' => htmlspecialchars($this->input->post('c', true)),
            'D' => htmlspecialchars($this->input->post('d', true)),
            'E' => htmlspecialchars($this->input->post('e', true)),
            'benar' => htmlspecialchars($this->input->post('benar', true)),
        ];

        $this->db->insert('pg', $data);
	}

	public function jawabEsay($id){
		$jawaban=htmlspecialchars($this->input->post('jawaban', true));
		$siswa= 1;
		$result = $this->db->get_where('jawab_esay', ['id_detail_tugas'=>$id,'id_siswa'=>$siswa])->row_array();
		// var_dump($result);
		// die();
		if($result && count($result) > 0){
			$data2 = [
				'jawaban' => $jawaban,
			];
			$this->db->set($data2);
			$this->db->where('id',$result['id']);
			$this->db->update('jawab_esay');
		}else{
			$data2 = [
				'id_detail_tugas' => $id,
				'jawaban' => $jawaban,
				'id_siswa'=> $siswa
			];
			$this->db->insert('jawab_esay', $data2);
		}
	}

	public function jawabPg(){
		$id=$this->input->post('id_detail_tugas');
		$jawaban=$this->input->post('jawaban');
		$siswa= 1;
		$result = $this->db->get_where('jawab_pg', ['id_detail_tugas'=>$id,'id_siswa'=>$siswa])->row_array();
		// var_dump($result);
		// die();
		if(count($result) > 0){
			$data2 = [
				'jawaban' => $jawaban,
			];
			$this->db->set($data2);
			$this->db->where('id',$result['id']);
			$this->db->update('jawab_pg');
		}else{
			$data2 = [
				'id_detail_tugas' => htmlspecialchars($this->input->post('id_detail_tugas', true)),
				'jawaban' => htmlspecialchars($this->input->post('jawaban', true)),
				'id_siswa'=> $siswa
			];
			$this->db->insert('jawab_pg', $data2);
		}
	}

	public function editEsay(){
		$id=$this->input->post('id');
		$data = [
            'soal' => htmlspecialchars($this->input->post('soal', true)),
        ];

        	$this->db->set($data);
			$this->db->where('id',$id);
			$this->db->update('esay');
	}

	public function editPg(){
		$id=$this->input->post('id');
		$data = [
            'soal' => htmlspecialchars($this->input->post('soal', true)),
            'A' => htmlspecialchars($this->input->post('a', true)),
            'B' => htmlspecialchars($this->input->post('b', true)),
            'C' => htmlspecialchars($this->input->post('c', true)),
            'D' => htmlspecialchars($this->input->post('d', true)),
            'E' => htmlspecialchars($this->input->post('e', true)),
            'benar' => htmlspecialchars($this->input->post('benar', true)),
        ];

        	$this->db->set($data);
			$this->db->where('id',$id);
			$this->db->update('pg');
	}

	public function deleteEsay($id){
		$this->db->where('id', $id);
		$this->db->delete('esay');
	}
	public function deletePg($id){
		$this->db->where('id', $id);
		$this->db->delete('pg');
	}

	public function editStatus($tugasid){
		$data = [
            'status' => "publish"
        ];

        	$this->db->set($data);
			$this->db->where('id',$tugasid);
			$this->db->update('tugas');
	}


}

