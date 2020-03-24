<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Users extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/user_model', 'user_model');
			$this->load->model('admin/unit_model', 'unit_model');
			$this->load->model('admin/profile_model', 'profile_model');
			$this->load->model('kinerja/individu_model', 'individu_model');
			$this->load->library('datatable'); // loaded my custom serverside datatable library
		}

		public function index(){
			$data['view'] = 'admin/users/user_list';
			$this->load->view('layout', $data);
		}
		
		public function datatable_json(){				   					   
			$records = $this->user_model->get_all_users();
	        $data = array();
	        foreach ($records['data']  as $row) 
			{  
				$status = ($row['is_active'] == 0)? 'Deactive': 'Active'.'<span>';
				$disabled = ($row['is_admin'] == 1)? 'disabled': ''.'<span>';
				$data[]= array(
					$row['username'],
					$row['firstname'],
					$row['email'],
				/*	$row['role'],
					getUnitById($row['unit_kerja']), */
				
					
					'<a title="Edit" class="update btn btn-sm btn-primary" href="'.base_url('admin/users/edit/'.$row['id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					 <a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/users/detail/'.$row['id']).'"> <i class="fa fa-eye"></i></a>' 
				);
	        }
			$records['data']=$data;
	        echo json_encode($records);						   
		}

		public function add(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				//$this->form_validation->set_rules('role', 'Role', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
	
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/users/user_add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'username' => $this->input->post('username'),
						'firstname' => $this->input->post('firstname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
					//	'unit_kerja' => $this->input->post('unit_kerja'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
						'is_verify' => 1,
						'is_active' => 1,
						//'role' => $this->input->post('role'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'User has been added successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['user_groups'] = $this->user_model->get_user_groups();
				$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
				$data['view'] = 'admin/users/user_add';
				$this->load->view('layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			//	$this->form_validation->set_rules('password', 'Password', 'trim');
				$this->form_validation->set_rules('status', 'Password', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->user_model->get_user_by_id($id);
					$data['view'] = 'admin/users/user_edit';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'firstname' => $this->input->post('firstname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'unit_kerja' => $this->input->post('unit_kerja'),
						'password' =>  ($this->input->post('password') !== "" ? password_hash($this->input->post('password'), PASSWORD_BCRYPT) : "" ),
						'updated_at' => date('Y-m-d : h:m:s'),
						'is_active' => $this->input->post('status'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->edit_user($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'User has been updated successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['user'] = $this->user_model->get_user_by_id($id);				
				$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
				$data['view'] = 'admin/users/user_edit';
				$this->load->view('layout', $data);
			}
		}

		public function detail($id = 0, $bulan=0, $tahun=0){
			$data['user'] = $this->user_model->get_user_by_id($id);
			$data['data_keluarga'] = $this->profile_model->get_detail_keluarga($id);
			$data['penempatan'] = $this->profile_model->get_penempatan($id);
			$data['din'] = $this->individu_model->get_individu_din_grafik($id);
			$data['nafs'] = $this->individu_model->get_individu_nafs_grafik($id);
			$data['aql'] = $this->individu_model->get_individu_aql_grafik($id);
			$data['mal'] = $this->individu_model->get_individu_mal_grafik($id);
			$data['nasb'] = $this->individu_model->get_individu_nasb_grafik($id);
			$data['data_anak'] = $this->profile_model->get_anak_profil($id);
			$data['view'] = 'admin/users/detail';
			$this->load->view('layout', $data);
		}

		public function del($id = 0){
			$this->db->delete('ci_users', array('id' => $id));
			$this->session->set_flashdata('msg', 'Pengguna berhasil dihapus!');
			redirect(base_url('admin/users'));
		}

		public function tambah_penempatan() {

			//$all = $this->user_model->get_all_simple_users();

			if($this->input->post('submit')){
				$this->form_validation->set_rules('user_id', 'Nama Staf', 'trim|required');
				$this->form_validation->set_rules('id_kantor', 'Kantor', 'trim|required');
				$this->form_validation->set_rules('id_unit', 'Unit', 'trim|required');
				$this->form_validation->set_rules('awal_penempatan', 'Awal Penempatan', 'trim|required');
				$this->form_validation->set_rules('akhir_penempatan', 'Akhir Penempatan', 'trim|required');
	
				if ($this->form_validation->run() == FALSE) {
					$data['staf'] = $this->user_model->get_all_simple_users();
					$data['kantor'] = $this->unit_model->get_all_kantor();
					$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
					$data['view'] = 'admin/users/tambah_penempatan';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'user_id' => $this->input->post('user_id'),
						'id_kantor' => $this->input->post('id_kantor'),
						'id_unit' => $this->input->post('id_unit'),
						'awal_penempatan' => $this->input->post('awal_penempatan'),
						'akhir_penempatan' => $this->input->post('akhir_penempatan'),			
						'date' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->user_model->penempatan($data);

					if($result){
						$this->session->set_flashdata('msg', 'User has been added successfully!');
						redirect(base_url('admin/users/tambah_penempatan'));
					}
				}
			}
			else{
				$data['staf'] = $this->user_model->get_all_simple_users();
				$data['kantor'] = $this->unit_model->get_all_kantor();
				$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
				$data['view'] = 'admin/users/tambah_penempatan';
		
				$this->load->view('layout', $data);
			}

		}

		public function penempatan() {
			$data['penempatan'] = $this->user_model->get_all_penempatan();
			$data['staf'] = $this->user_model->get_all_simple_users();
			$data['kantor'] = $this->unit_model->get_all_kantor();
			$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
			$data['view'] = 'admin/users/penempatan';
		
			$this->load->view('layout', $data);
			
		}

	}


?>