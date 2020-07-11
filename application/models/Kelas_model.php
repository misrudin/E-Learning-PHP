<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{

	public function getKelas(){
		$sql = "SELECT * FROM kelas";

		return $this->db->query($sql)->result_array();
	}
	public function pageKelas(){
		$q= (isset($_GET['q'])) ? $_GET['q'] : "";
		$sql1 = "SELECT * FROM kelas where nama_kelas like '%$q%'";
		$limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
        $totalData=  count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
		$firstIndex= ($limit * $page) - $limit;

		$sql = "SELECT * FROM kelas where nama_kelas like '%$q%' LIMIT $firstIndex, $limit";

		$result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
	}

	public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save"){
			$this->form_validation->set_rules('kelas', 'Kelas', 'required|is_unique[kelas.nama_kelas]');	
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
		}
		if($mode == "edit"){
			$this->form_validation->set_rules('kelas', 'Kelas', 'required');	
	
			if($this->form_validation->run()){
				return true;
			}else {
				return false;
			}	
		}
	}

	public function save(){
		$data = [
            'nama_kelas' => htmlspecialchars($this->input->post('kelas', true)),
		];
		
		$this->db->insert('kelas', $data);
	}

	public function edit($id){
         $data = [
            'nama_kelas' => htmlspecialchars($this->input->post('kelas', true)),
		 ];
		 
		$this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('kelas');
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('kelas');
	}
}