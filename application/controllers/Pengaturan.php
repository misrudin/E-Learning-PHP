<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
      public function __construct()
	{
	  parent::__construct();
        $this->load->library('form_validation');
    }
	public function sekolah()
	{
            $data['title'] = 'Sekolah';
            $data['sekolah']=$this->db->get_where('sekolah',['id',1])->row_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pengaturan/sekolah', $data);
            $this->load->view('templates/footer', $data);
      }

      private function _validation($mode){
		if($mode == "save"){
			$this->form_validation->set_rules('npsn', 'NPSN', 'required');
			$this->form_validation->set_rules('sekolah', 'Sekolah', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
            }
            
            if($mode == "profile"){
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
            }
            
            if($mode == "password"){
			$this->form_validation->set_rules('baru', 'New Password', 'required|trim|min_length[3]|matches[konfirmasi]', ['matches' => 'Password tidak cocok!', 'min_length' => 'Minimal 3 karakter!','required' => 'Password baru harus di isi!']);
			$this->form_validation->set_rules('konfirmasi', 'Konfirmasi', 'required|trim|matches[baru]');
			$this->form_validation->set_rules('lama', 'Old Password', 'required');
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
		}
	}

      public function simpanSekolah(){
            if($this->_validation("save")){ 
                  $data = [
                        'npsn' => htmlspecialchars($this->input->post('npsn', true)),
                        'nama_sekolah' => htmlspecialchars($this->input->post('sekolah', true)),
                        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                         ];
                         
                    $this->db->set($data);
                    $this->db->where('id',1);
                    $this->db->update('sekolah'); 
      
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
      public function simpanProfile(){
            if($this->_validation("profile")){ 
                  $id=$this->session->userdata['user_id'];
                  $rule=$this->session->userdata['rule'];
                  $password=$this->input->post('password');
                  
                  if($rule=="admin"){
                        $data = [
                              'nama' => htmlspecialchars($this->input->post('nama', true)),
                              'email' => htmlspecialchars($this->input->post('email', true)),
                               ];
                        $user = $this->db->get_where('admin', ['id' => $id])->row_array();
                        if (password_verify($password, $user['password'])) {
                              $this->db->set($data);
                              $this->db->where('id',$id);
                              $this->db->update('admin'); 
                              $response = [
                                    'status'=>'sukses',
                                    'pesan'=>'Data berhasil disimpan',
                        ];
                        }else{
                              $response = [
                                    'status'=>'gagal',
                                    'pesan'=>'Password salah!',
                        ];
                        }
                  }
                  
                  if($rule=="guru"){
                        $data = [
                              'nama_guru' => htmlspecialchars($this->input->post('nama', true)),
                              'email' => htmlspecialchars($this->input->post('email', true)),
                               ];
                        $user = $this->db->get_where('guru', ['id' => $id])->row_array();
                        if (password_verify($password, $user['password'])) {
                              $this->db->set($data);
                              $this->db->where('id',$id);
                              $this->db->update('guru'); 
                              $response = [
                                    'status'=>'sukses',
                                    'pesan'=>'Data berhasil disimpan',
                        ];
                        }else{
                              $response = [
                                    'status'=>'gagal',
                                    'pesan'=>'Password salah!',
                        ];
                        }
                  }

                  if($rule=="siswa"){
                        $data = [
                              'nama' => htmlspecialchars($this->input->post('nama', true)),
                              'email' => htmlspecialchars($this->input->post('email', true)),
                               ];
                        $user = $this->db->get_where('siswa', ['id' => $id])->row_array();
                        if (password_verify($password, $user['password'])) {
                              $this->db->set($data);
                              $this->db->where('id',$id);
                              $this->db->update('siswa'); 
                              $response = [
                                    'status'=>'sukses',
                                    'pesan'=>'Data berhasil disimpan',
                        ];
                        }else{
                              $response = [
                                    'status'=>'gagal',
                                    'pesan'=>'Password salah!',
                        ];
                        }
                  }


                         
                    
      
                 
                  }else{
                        $response =[
                              'status'=>'gagal',
                              'pesan'=>validation_errors()
                  ];
                  }
      
                  echo json_encode($response);
      }
      
      public function getSekolah(){
            $data['sekolah']=$this->db->get_where('sekolah',['id',1])->row_array();
      }


	public function profile()
	{
            $data['title'] = 'Profile';
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
            $this->load->view('pengaturan/profile', $data);
            $this->load->view('templates/footer', $data);
	}
	public function password()
	{
		$data['title'] = 'Password';
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pengaturan/password', $data);
            $this->load->view('templates/footer', $data);
      }
      


      public function editPassword(){
            if($this->_validation("password")){ 
                  $id=$this->session->userdata['user_id'];
                  $rule=$this->session->userdata['rule'];
                  $password=$this->input->post('lama');
                  $password=$this->input->post('lama');
                  
                  if($rule=="admin"){
                        $data = [
                              'nama' => htmlspecialchars($this->input->post('nama', true)),
                              'email' => htmlspecialchars($this->input->post('email', true)),
                               ];
                        $user = $this->db->get_where('admin', ['id' => $id])->row_array();
                        if (password_verify($password, $user['password'])) {
                              $this->db->set($data);
                              $this->db->where('id',$id);
                              $this->db->update('admin'); 
                              $response = [
                                    'status'=>'sukses',
                                    'pesan'=>'Data berhasil disimpan',
                        ];
                        }else{
                              $response = [
                                    'status'=>'gagal',
                                    'pesan'=>'Password salah!',
                        ];
                        }
                  }
                  
                  if($rule=="guru"){
                        $data = [
                              'nama_guru' => htmlspecialchars($this->input->post('nama', true)),
                              'email' => htmlspecialchars($this->input->post('email', true)),
                               ];
                        $user = $this->db->get_where('guru', ['id' => $id])->row_array();
                        if (password_verify($password, $user['password'])) {
                              $this->db->set($data);
                              $this->db->where('id',$id);
                              $this->db->update('guru'); 
                              $response = [
                                    'status'=>'sukses',
                                    'pesan'=>'Data berhasil disimpan',
                        ];
                        }else{
                              $response = [
                                    'status'=>'gagal',
                                    'pesan'=>'Password salah!',
                        ];
                        }
                  }

                  if($rule=="siswa"){
                        $data = [
                              'nama' => htmlspecialchars($this->input->post('nama', true)),
                              'email' => htmlspecialchars($this->input->post('email', true)),
                               ];
                        $user = $this->db->get_where('siswa', ['id' => $id])->row_array();
                        if (password_verify($password, $user['password'])) {
                              $this->db->set($data);
                              $this->db->where('id',$id);
                              $this->db->update('siswa'); 
                              $response = [
                                    'status'=>'sukses',
                                    'pesan'=>'Data berhasil disimpan',
                        ];
                        }else{
                              $response = [
                                    'status'=>'gagal',
                                    'pesan'=>'Password salah!',
                        ];
                        }
                  }


                         
                    
      
                 
                  }else{
                        $response =[
                              'status'=>'gagal',
                              'pesan'=>validation_errors()
                  ];
                  }
      
                  echo json_encode($response);
      }
}
