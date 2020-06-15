<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		if (!$this->session->userdata('rule')) {
			redirect('auth');
		}
		$data['title'] = 'Dashboard';
		$data['user']="";
		$username=$this->session->userdata['user_id'];
		if($this->session->userdata['rule']=="admin"){
			$data['user']=$this->db->get_where('admin', ['id' => $username])->row_array();
		}
		if($this->session->userdata['rule']=="guru"){
			$sql = "select guru.nama_guru as nama, guru.* from guru where guru.id=$username";
			$data['user']= $this->db->query($sql)->row_array();
		}
		if($this->session->userdata['rule']=="siswa"){
			$data['user']=$this->db->get_where('siswa', ['id' => $username])->row_array();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer', $data);
	}
}