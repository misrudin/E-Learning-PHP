<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Materi_model','materi');
    }
    
	public function index()
	{
        // $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        // $this->form_validation->set_rules('mapel', 'Mapel', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');
            $data['title'] = 'Materi';
    
            $this->load->model('Kelas_model','kelas');
            $data['dataKelas']=$this->kelas->getKelas();
            $this->load->model('Mapel_model','mapel');
            $data['dataMapel']=$this->mapel->getMapel();
            $this->session->set_flashdata('error', validation_errors());
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('materi/index', $data);
            $this->load->view('templates/footer', $data);
        
    }

    public function getData()
	{               
        $html = $this->load->view('materi/tabel', ['dataMateri'=>$this->materi->getMateri()], true);
        $response = [
            'status'=>'sukses',
            'pesan'=>'Data berhasil ditampilkan',
            'html'=>$html
        ];
        echo json_encode($response);
    }

    public function simpan(){

        $upload_pdf = $_FILES['pdf']['name'];
        if ($upload_pdf) {
            $config['allowed_types'] = 'pdf';
            $config['max_size']     = '5120';
            $config['upload_path'] = './assets/files/pdf/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pdf')) {

                // $old_pdf = $data['list_mapel']['file'];
                // unlink(FCPATH . 'assets/img/profile/' . $old_pdf);

                $new_pdf = $this->upload->data('file_name');
                $data = [
                    'id_kelas' => htmlspecialchars($this->input->post('kelas', true)),
                    'id_mapel' => htmlspecialchars($this->input->post('mapel', true)),
                    'id_guru' => 17,
                    'type' => htmlspecialchars($this->input->post('type', true)),
                    'description' => htmlspecialchars($this->input->post('description', true)),
                    'file' => $new_pdf,
                ];

                 $this->db->insert('list_mapel', $data);
                //  $this->session->set_flashdata('message', '1');
                //   redirect('materi');
                $response=[
                    'status'=> 'sukses',
                    'pesan'=>'Data di simpan'
                ];
                echo json_encode($response);
            } else {
                $error= $this->upload->display_errors();
                // $this->session->set_flashdata('message', '2');
                // $this->session->set_flashdata('pesan', $error."Max 5 mb, dan type file harus pdf!");
                //   redirect('materi');
                $response=[
                    'status'=> 'gagal',
                    'pesan'=>'File harus .pdf'
                ];
                echo json_encode($response);
            }
        }
    }
    

    public function tampiledit($id){

        $query="SELECT * FROM list_mapel WHERE id=$id";

        $result=$this->db->query($query)->row_array();
        echo json_encode($result);
    }

    public function edit(){
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('mapel', 'Mapel', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Materi';
    
            $this->load->model('Kelas_model','kelas');
            $data['dataKelas']=$this->kelas->getKelas();
            $this->load->model('Mapel_model','mapel');
            $data['dataMapel']=$this->mapel->getMapel();
            $this->session->set_flashdata('error', validation_errors());
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('materi/index', $data);
            $this->load->view('templates/footer', $data);
        }else{
                $this->_edit();
            }
    }

    private function _edit(){
        $upload_pdf = $_FILES['pdf']['name'];
        $id=$this->input->post('id');
        $data['materi'] = $this->db->get_where('list_mapel', ['id' => $id])->row_array();

        if ($upload_pdf) {
            $config['allowed_types'] = 'pdf';
            $config['upload_path'] = './assets/files/pdf/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pdf')) {

                $old_pdf = $data['materi']['file'];
                unlink(FCPATH . './assets/files/pdf/' . $old_pdf);

                $new_pdf = $this->upload->data('file_name');
                
                 $this->db->set('file',$new_pdf);
            } else {
                $error= $this->upload->display_errors();
                $this->session->set_flashdata('message', '2');
                $this->session->set_flashdata('pesan', $error."Max 5 mb, dan type file harus pdf!");
                var_dump($error);
                sleep(1);
                redirect('materi');
                
            }
        }
        $data = [
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'id_mapel' => htmlspecialchars($this->input->post('mapel', true)),
            'description' => htmlspecialchars($this->input->post('description', true)),
        ];

        $this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('list_mapel');

        $this->session->set_flashdata('message', '1');
        redirect('materi');
   }

   public function delete($id){
       $this->materi->delete($id);
       $response=[
           'status'=>'sukses',
           'pesan'=>'Materi dihapus!'
       ];

       echo json_encode($response);
   }

   public function belajar(){
    $id=(isset($_GET['id']))? $_GET['id'] : 1;
    $sql = "SELECT list_mapel.*,mapel.nama_mapel,kelas.nama_kelas,guru.nama_guru,list_mapel.type,list_mapel.file,list_mapel.description,date_format(list_mapel.create,'%d %M %Y %H:%i') as time_create FROM list_mapel INNER JOIN mapel ON mapel.id = list_mapel.id_mapel INNER JOIN kelas on kelas.id=list_mapel.id_kelas INNER JOIN guru on guru.id=list_mapel.id_guru where list_mapel.id=$id";
   $data['materi']=  $this->db->query($sql)->row_array();;
    $data['title']='Belajar';
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('materi/belajar', $data);
    $this->load->view('templates/footer', $data);
   }
}

