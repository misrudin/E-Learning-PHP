<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->session->userdata('rule')) {
			redirect('dashboard');
		}

			$data['sekolah']=$this->db->get_where('sekolah',['id'=>1])->row_array();
			$data['sbg']=(isset($_GET['sbg']))? $_GET['sbg'] : "siswa";
			$data['title']="E Learning";
			
			$this->load->view('auth/login',$data);

		
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('rule');

		$this->session->set_flashdata('message', 'Berhasil logout!');
		redirect('auth');
	}

	public function masuk(){
		$sbg=(isset($_GET['sbg']))? $_GET['sbg'] : "";
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(!$sbg){
			redirect('auth');
		}else{
			if($sbg=="sekolah"){
				$user = $this->db->get_where('sekolah', ['username' => $username])->row_array();
				if($user){
					if (password_verify($password, $user['password'])) {
						$data = [
							'user' => $user['email'],
							'rule' => $user['rule'],
							'user_id' => $user['id'],
							'user_name' => $user['nama_sekolah'],
						];
						$this->session->set_userdata($data);
						$data=[
							'pesan'=>'Yeyyy!',
							'status'=>'sukses'
						];
						echo json_encode($data);
					} else {
						$data=[
							'pesan'=>'Password yang anda masukan salah!',
							'status'=>'gagal'
						];
						echo json_encode($data);
					}
				}else{
					$data=[
						'pesan'=>'Username tidak terdaftar!',
						'status'=>'gagal'
					];
					echo json_encode($data);
				}
			}
			if($sbg=="guru"){
				$user = $this->db->get_where('guru', ['username' => $username])->row_array();
				if($user){
					if (password_verify($password, $user['password'])) {
						$data = [
							'user' => $user['nip'],
							'rule' => $user['rule'],
							'user_id' => $user['id'],
							'user_name' => $user['nama_guru'],
						];
						$this->session->set_userdata($data);
						$data=[
							'pesan'=>'Yeyyy!',
							'status'=>'sukses'
						];
						echo json_encode($data);
					} else {
						$data=[
							'pesan'=>'Password yang anda masukan salah!',
							'status'=>'gagal'
						];
						echo json_encode($data);
					}
				}else{
					$data=[
						'pesan'=>'Username tidak terdaftar!',
						'status'=>'gagal'
					];
					echo json_encode($data);
				}
			}
			if($sbg=="siswa"){
				$user = $this->db->get_where('siswa', ['username' => $username])->row_array();
				if($user){
					if (password_verify($password, $user['password'])) {
						$data = [
							'user' => $user['nis'],
							'rule' => $user['rule'],
							'user_id' => $user['id'],
							'user_name' => $user['nama'],
						];
						$this->session->set_userdata($data);
						$data=[
							'pesan'=>'Yeyyy!',
							'status'=>'sukses'
						];
						echo json_encode($data);
					} else {
						$data=[
							'pesan'=>'Password yang anda masukan salah!',
							'status'=>'gagal'
						];
						echo json_encode($data);
					}
				}else{
					$data=[
						'pesan'=>'Username tidak terdaftar!',
						'status'=>'gagal'
					];
					echo json_encode($data);
				}
			}
		}
	}
		
}
