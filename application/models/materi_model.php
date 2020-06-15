<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi_model extends CI_Model
{

	public function getMateri(){
        $sql1 = "SELECT list_mapel.*,mapel.nama_mapel,kelas.nama_kelas,guru.nama_guru,list_mapel.type,list_mapel.file,list_mapel.description,date_format(list_mapel.create,'%d %M %Y %H:%i') as time_create FROM list_mapel INNER JOIN mapel ON mapel.id = list_mapel.id_mapel INNER JOIN kelas on kelas.id=list_mapel.id_kelas INNER JOIN guru on guru.id=list_mapel.id_guru ORDER BY list_mapel.create DESC";

        $limit = 10;
        $page= (isset($_GET['page'])) ? $_GET['page'] : 1;
        $totalData=  count($this->db->query($sql1)->result_array());
        $totalPage= ceil($totalData / $limit);
        $firstIndex= ($limit * $page) - $limit;

        $sql = "SELECT list_mapel.*,mapel.nama_mapel,kelas.nama_kelas,guru.nama_guru,list_mapel.type,list_mapel.file,list_mapel.description,date_format(list_mapel.create,'%d %M %Y %H:%i') as time_create FROM list_mapel INNER JOIN mapel ON mapel.id = list_mapel.id_mapel INNER JOIN kelas on kelas.id=list_mapel.id_kelas INNER JOIN guru on guru.id=list_mapel.id_guru ORDER BY list_mapel.create DESC LIMIT $firstIndex, $limit";
        
        $result = $this->db->query($sql)->result_array();
        return [$result,$totalPage,$page];
        }
        
        public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save"){
                        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
                        $this->form_validation->set_rules('mapel', 'Mapel', 'required');
                        $this->form_validation->set_rules('description', 'Description', 'required');
	
		if($this->form_validation->run()){
			return true;
		}else {
			return false;
		}	
		}
		if($mode == "edit"){
            $this->form_validation->set_rules('pdf', 'Pdf File', 'required');
                        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
                        $this->form_validation->set_rules('mapel', 'Mapel', 'required');
                        $this->form_validation->set_rules('description', 'Description', 'required');
	
			if($this->form_validation->run()){
				return true;
			}else {
				return false;
			}	
		}
	}

        public function save(){
                // $upload_pdf = $_FILES['pdf']['name'];
    
                    $config['allowed_types'] = 'pdf';
                    $config['max_size']     = '5120';
                    $config['upload_path'] = './assets/files/pdf/';
                    $config['encrypt_name'] = true;
        
                    $this->load->library('upload', $config);
                        
                    if ($this->upload->do_upload('pdf')) {
              
                                        $file=['upload_data'=> $this->upload->data()];
                        
                                        $new_pdf = $file['upload_data']['file_name'];
                                        $data=[
                                            'id_kelas' => $_GET['id_kelas'],
                                            'id_mapel' => $_GET['id_mapel'],
                                            'type' => $_GET['type'],
                                            'description' => $_GET['desc'],
                                            'id_guru'=>17,
                                            'file' => $new_pdf,
                                         ];

                                      $result=  $this->db->insert('list_mapel', $data);
                                 return $result;
                            }else{
                               $result=$this->upload->display_errors();
                               return $result;
                            }
	}

	public function edit($id){
         $upload_pdf = $_FILES['pdf']['name'];
         if (!$upload_pdf){
             return 'gambar eweh';
         }
         return 'oek';
        //  $config['allowed_types'] = 'pdf';
        //  $config['max_size']     = '5120';
        //  $config['upload_path'] = './assets/files/pdf/';
        //  $config['encrypt_name'] = true;

        //  $this->load->library('upload', $config);
             
        //  if ($this->upload->do_upload('pdf')) {
   
        //                      $file=['upload_data'=> $this->upload->data()];
             
        //                      $new_pdf = $file['upload_data']['file_name'];
                                // $data=[
                                //     'id_kelas' => $_GET['id_kelas'],
                                //     'id_mapel' => $_GET['id_mapel'],
                                //     'id' => $_GET['id'],
                                //     'description' => $_GET['desc'],
                                // ];

        //                    $result=  $this->db->insert('list_mapel', $data);
        //               return $result;
        //          }else{
        //             $result=$this->upload->display_errors();
        //             return $result;
        //          }
	}

	public function delete($id){
        $data['materi'] = $this->db->get_where('list_mapel', ['id' => $id])->row_array();
        $old_pdf = $data['materi']['file'];
        unlink(FCPATH . './assets/files/pdf/' . $old_pdf);

		$this->db->where('id', $id);
		$this->db->delete('list_mapel');
        }
        
}