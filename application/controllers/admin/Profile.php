<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/profile_model', 'profile_model');
	}
	//-------------------------------------------------------------------------
	public function index(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('mobile_no', 'Telepon', 'trim|required');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->profile_model->get_user_detail();
					$data['title'] = 'Admin Profile';
					$data['view'] = 'admin/profile/index';
					$this->load->view('layout', $data);
				} else {				

				$data = array(
					
					'firstname' => $this->input->post('firstname'),
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'updated_at' => date('Y-m-d : h:m:s'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'alamat' => $this->input->post('alamat'),					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->update_user($data);
				if($result){
					$this->session->set_flashdata('msg', 'Profil Anda berhasil diubah!');
					redirect(base_url('admin/profile'), 'refresh');
				}
			}
		}
		else{
			$data['user'] = $this->profile_model->get_user_detail();
			$data['title'] = 'Admin Profile';
			$data['view'] = 'admin/profile/index';
			$this->load->view('layout', $data);
		}
	}

	//-------------------------------------------------------------------------
	public function change_pwd(){
		$id = $this->session->userdata('user_id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->profile_model->get_user_detail();
				$data['view'] = 'admin/profile/change_pwd';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->change_pwd($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Password berhasil diubah!');
					redirect(base_url('auth/logout'));
				}
			}
		}
		else{
			$data['user'] = $this->profile_model->get_user_detail();
			$data['title'] = 'Change Password';
			$data['view'] = 'admin/profile/change_pwd';
			$this->load->view('layout', $data);
		}
	}

	public function keluarga() {
		$data['data_keluarga'] =  $this->profile_model->get_data_keluarga();
		$data['title'] = 'Data keluarga';
		$data['view'] = 'admin/profile/keluarga';
		$this->load->view('layout', $data);

	}

	public function tambah_keluarga() {

		if($this->input->post('submit')){
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('status_keluarga', 'Status Keluarga', 'trim|required');
			if($this->input->post('status_keluarga')=='anak') {
		
				$this->form_validation->set_rules('anak_ke', 'Anak ke', 'trim|required');
				
			} else if($this->input->post('status_keluarga')=='pasutri') {
				$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
				$this->form_validation->set_rules('tempat_bekerja', 'Tempat Bekerja', 'trim|required');
			} else {}
			if ($this->form_validation->run() == FALSE) {
					
					$data['title'] = 'Tambah Anggota Keluarga';
					$data['view'] = 'admin/profile/tambah_keluarga';
					$this->load->view('layout', $data);
				} else { 			

				$data = array(					
					'nama_keluarga' => $this->input->post('nama_keluarga'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'status_keluarga' => $this->input->post('status_keluarga'),
					'anak_ke' => $this->input->post('anak_ke'),
					'user_id'=> $this->session->userdata('user_id'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'tempat_bekerja'=> $this->input->post('tempat_bekerja'),
					'date' => date('Y-m-d : h:m:s'),	
								
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->tambah_keluarga($data);
				if($result){
					$this->session->set_flashdata('msg', 'Data Keluarga berhasil diubah!');
					redirect(base_url('admin/profile/keluarga'), 'refresh');
				}
			}
		}
		else{
			
			$data['title'] = 'Tambah Anggota Keluarga';
			$data['view'] = 'admin/profile/tambah_keluarga';
			$this->load->view('layout', $data);
		}

	}
	public function edit_pasutri($id = 0) {

		if($this->input->post('submit')){
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			//$this->form_validation->set_rules('status_keluarga', 'Status Keluarga', 'trim|required');			
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('tempat_bekerja', 'Tempat bekerja', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
					$data['keluarga']= $this->profile_model->get_detail_keluarga($id);
					$data['title'] = 'Edit Anggota Pasutri';
					$data['view'] = 'admin/profile/edit_pasutri';
					$this->load->view('layout', $data);

				} else { 			

				$data = array(					
					'nama_keluarga' => $this->input->post('nama_keluarga'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					//'status_keluarga' => $this->input->post('status_keluarga'),
					'user_id'=> $this->session->userdata('user_id'),									
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'tempat_bekerja'=> $this->input->post('tempat_bekerja'),
								
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->edit_anak($data,$id);
				if($result){
					$this->session->set_flashdata('msg', 'Data Pasutri berhasil diubah!');
					redirect(base_url('admin/profile/edit_pasutri/'.$id), 'refresh');
				}
			}
		}
		else{
			
			$data['keluarga']= $this->profile_model->get_detail_keluarga_individu($id);
			$data['title'] = 'Edit Pasutri';
			$data['view'] = 'admin/profile/edit_pasutri';
			$this->load->view('layout', $data);
		}

	}

	public function edit_anak($id = 0) {

		if($this->input->post('submit')){
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');	
			$this->form_validation->set_rules('anak_ke', 'Anak ke', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
					$data['keluarga']= $this->profile_model->get_detail_keluarga($id);
					$data['title'] = 'Edit Anggota Keluarga';
					$data['view'] = 'admin/profile/edit_anak';
					$this->load->view('layout', $data);

				} else { 			

				$data = array(					
					'nama_keluarga' => $this->input->post('nama_keluarga'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'anak_ke' => $this->input->post('anak_ke'),					
					'user_id'=> $this->session->userdata('user_id'),
					'date' => date('Y-m-d : h:m:s'),	
										
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->edit_keluarga($data,$id);
				if($result){
					$this->session->set_flashdata('msg', 'Profil Anda berhasil diubah!');
					redirect(base_url('admin/profile/edit_anak/'.$id), 'refresh');
				}
			}
		}
		else{
			
			$data['keluarga']= $this->profile_model->get_detail_keluarga_individu($id);
			$data['title'] = 'Edit Anggota Keluarga';
			$data['view'] = 'admin/profile/edit_anak';
			$this->load->view('layout', $data);
		}

	}

	public function hapus_keluarga($id = 0){

		$this->db->delete('ci_individu_keluarga', array('id' => $id));
		$this->session->set_flashdata('msg', 'Data berhasil dihapus.');
		redirect(base_url('admin/profile/keluarga'));

	}

	

}

?>	