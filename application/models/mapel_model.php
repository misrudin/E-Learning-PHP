<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{

	public function getMapel(){
		$sql = "SELECT * FROM mapel";

		return $this->db->query($sql)->result_array();
	}
	public function pageMapel(){
		$q= (isset($_GET['q'])) ? $_GET['q'] : "";
		$sql1 = "SELECT * FROM mapel where nama_mapel like '%$q%'";
		$limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
        $totalData=  count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
		$firstIndex= ($limit * $page) - $limit;

		$sql = "SELECT * FROM mapel where nama_mapel like '%$q%' LIMIT $firstIndex, $limit";


		$result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
	}
	public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save"){
			$this->form_validation->set_rules('mapel', 'Mapel', 'required');
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
		}
		if($mode == "edit"){
			$this->form_validation->set_rules('mapel', 'Mapel', 'required');	
	
			if($this->form_validation->run()){
				return true;
			}else {
				return false;
			}	
		}
	}

	public function save(){
		$data = [
            'nama_mapel' => htmlspecialchars($this->input->post('mapel', true)),
        ];

        $this->db->insert('mapel', $data);
	}

	public function edit($id){
		$id =$this->input->post('id');
		$data = [
			'nama_mapel' => htmlspecialchars($this->input->post('mapel', true)),
		];
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('mapel');
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('mapel');
	}
}