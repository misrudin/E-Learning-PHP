<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

	public function getSiswa(){
		$q= (isset($_GET['q'])) ? $_GET['q'] : "";
		$sql1 = "SELECT siswa.*,kelas.nama_kelas FROM siswa INNER JOIN kelas ON kelas.id=siswa.id_kelas where kelas.nama_kelas like '%$q%' or siswa.nama like '%$q%' or  siswa.nis like '%$q%' or  siswa.email like '%$q%'";
		$limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
        $totalData=  count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
		$firstIndex= ($limit * $page) - $limit;

		$sql = "SELECT siswa.*,kelas.nama_kelas FROM siswa INNER JOIN kelas ON kelas.id=siswa.id_kelas where kelas.nama_kelas like '%$q%' or siswa.nama like '%$q%' or  siswa.nis like '%$q%' or  siswa.email like '%$q%' LIMIT $firstIndex, $limit";

		$result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
	}

	public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save"){
			$this->form_validation->set_rules('nis', 'Nis', 'required|is_unique[siswa.nis]');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
		}
		if($mode == "edit"){
			$this->form_validation->set_rules('nis', 'Nis', 'required');
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
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'id_kelas' => htmlspecialchars($this->input->post('kelas',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'rule' => "siswa",
            'password' => password_hash($this->input->post('nis'), PASSWORD_DEFAULT)
        ];

        $this->db->insert('siswa', $data);
	}

	public function edit($id){
		$data = [
			'nis' => htmlspecialchars($this->input->post('nis', true)),
			'nama' => htmlspecialchars($this->input->post('nama',true)),
			'id_kelas' => htmlspecialchars($this->input->post('kelas',true)),
			'email' => htmlspecialchars($this->input->post('email',true)),
		];
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('siswa');
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('siswa');
	}
}