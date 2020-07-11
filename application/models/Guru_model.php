<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{

	public function getGuru(){
		$q= (isset($_GET['q'])) ? $_GET['q'] : "";
		$sql1 = "SELECT * FROM guru where nama_guru like '%$q%' or  nip like '%$q%' or  email like '%$q%'";
		$limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
		$totalData=count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
		$firstIndex= ($limit * $page) - $limit;
		
		$sql="SELECT * FROM guru where nama_guru like '%$q%' or  nip like '%$q%' or  email like '%$q%' LIMIT $firstIndex, $limit";

		$result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
	}

	public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save"){
			$this->form_validation->set_rules('nip', 'Nip', 'required|is_unique[guru.nip]');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');	
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
		}
		if($mode == "edit"){
		$this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');	
	
			if($this->form_validation->run()){
				return true;
			}else {
				return false;
			}	
		}
	}

	public function save(){
		$data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama_guru' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'rule' => "guru",
            'password' => password_hash($this->input->post('nip'), PASSWORD_DEFAULT)
        ];

        $this->db->insert('guru', $data);
	}

	public function edit($id){
		$data = [
			'nip' => htmlspecialchars($this->input->post('nip', true)),
			'nama_guru' => htmlspecialchars($this->input->post('nama',true)),
			'email' => htmlspecialchars($this->input->post('email',true)),
		];
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('guru');
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('guru');
	}
}