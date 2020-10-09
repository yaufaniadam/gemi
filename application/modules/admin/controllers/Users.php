<?php defined('BASEPATH') or exit('No direct script access allowed');
class Users extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('admin/unit_model', 'unit_model');
		//	$this->load->model('profile/profile_model', 'profile_model');
		$this->load->model('kinerja/individu_model', 'individu_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index()
	{

		$data['users'] = $this->user_model->get_all_users();
		$data['view'] = 'admin/users/user_list';
		$this->load->view('layout', $data);
	}

	public function kinerja_staf()
	{
		$data['view'] = 'admin/users/kinerja_staf';
		$this->load->view('layout', $data);
	}

	public function datatable_json()
	{
		$records = $this->user_model->get_all_users();
		$data = array();
		foreach ($records['data']  as $row) {
			$status = ($row['is_active'] == 0) ? 'Deactive' : 'Active' . '<span>';
			$disabled = ($row['is_admin'] == 1) ? 'disabled' : '' . '<span>';
			$data[] = array(
				$row['username'],
				$row['firstname'],
				$row['email'],
				$row['role'],

				'<a title="Edit" class="update btn btn-sm btn-primary" href="' . base_url('admin/users/edit/' . $row['id']) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Lihat Profil" class="view btn btn-sm btn-info" href="' . base_url('admin/users/detail/' . $row['id']) . '"> <i class="fa fa-eye"></i></a>
				<a title="Lihat Catatan & Rekomendasi" class="view btn btn-sm btn-warning" href="' . base_url('admin/users/notes/' . $row['id']) . '"> <i class="fa fa-comment-o"></i></a>'
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function datatable_json2()
	{
		$records = $this->user_model->get_all_users();
		$data = array();
		foreach ($records['data']  as $row) {
			$status = ($row['is_active'] == 0) ? 'Deactive' : 'Active' . '<span>';
			$disabled = ($row['is_admin'] == 1) ? 'disabled' : '' . '<span>';
			$data[] = array(

				$row['firstname'],
				$row['email'],

				'<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/users/detail/' . $row['id']) . '"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function add()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			//$this->form_validation->set_rules('role', 'Role', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/users/user_add';
				$this->load->view('layout', $data);
			} else {
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
					'role' => 3,
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->add_user($data);
				if ($result) {
					$this->session->set_flashdata('msg', 'User has been added successfully!');
					redirect(base_url('admin/users'));
				}
			}
		} else {
			$data['user_groups'] = $this->user_model->get_user_groups();
			$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
			$data['view'] = 'admin/users/user_add';
			$this->load->view('layout', $data);
		}
	}

	public function edit($id = 0)
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			//	$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('status', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->user_model->get_user_by_id($id);
				$data['view'] = 'admin/users/user_edit';
				$this->load->view('layout', $data);
			} else {
				$data = array(
					'firstname' => $this->input->post('firstname'),
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'agama' => $this->input->post('agama'),
					'status' => $this->input->post('status'),
					'password' => ($this->input->post('password') !== "" ? password_hash($this->input->post('password'), PASSWORD_BCRYPT) : ""),
					'updated_at' => date('Y-m-d : h:m:s'),
					'is_active' => $this->input->post('status'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->edit_user($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'User has been updated successfully!');
					redirect(base_url('admin/users'));
				}
			}
		} else {
			$data['user'] = $this->user_model->get_user_by_id($id);
			$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
			$data['view'] = 'admin/users/user_edit';
			$this->load->view('layout', $data);
		}
	}

	public function detail($id = 0, $tahun = 0)
	{

		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');

		$tahun = ($tahun != '') ? $tahun : date('Y');

		$data['kategori_minat'] =  $this->user_model->get_kategori_minat();
		$data['minat'] =  $this->user_model->get_minat_by_userid($id);
		$data['riwayat_pendidikan'] =  $this->user_model->get_riwayat_pendidikan($id);
		$data['sertifikat_penghargaan'] =  $this->user_model->get_sertifikat_penghargaan($id);
		$data['sk_penempatan'] = $this->user_model->get_penempatan_by_userid($id);
		$data['user'] = $this->user_model->get_user_by_id($id);
		$data['data_keluarga'] = $this->user_model->get_data_keluarga($id);
		$data['penempatan'] = $this->user_model->get_penempatan($id);
		$data['view'] = 'admin/users/detail';
		$this->load->view('layout', $data);
	}

	public function del($id = 0)
	{
		$this->db->delete('ci_users', array('id' => $id));
		$this->session->set_flashdata('msg', 'Pengguna berhasil dihapus!');
		redirect(base_url('admin/users'));
	}

	public function tambah_penempatan()
	{

		//$all = $this->user_model->get_all_simple_users();

		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('user_id', 'Nama Pegawai', 'trim|required');
			$this->form_validation->set_rules('no_sk_penempatan', 'Nomor SK', 'trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('id_kantor', 'Kantor', 'trim|required');
			$this->form_validation->set_rules('id_unit', 'Unit', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
			$this->form_validation->set_rules('awal_penempatan', 'Awal Penempatan', 'trim|required');
			$this->form_validation->set_rules('akhir_penempatan', 'Akhir Penempatan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['staf'] = $this->user_model->get_all_simple_users();
				$data['ket_penempatan'] = $this->user_model->get_ket_penempatan();
				$data['kantor'] = $this->unit_model->get_all_kantor();
				$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
				$data['view'] = 'admin/users/tambah_penempatan';
				$this->load->view('layout', $data);
			} else {

				$upload_path = './uploads/sk';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}

				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('file_sk_penempatan');
				$file_sk = $this->upload->data();

				$data = array(
					'user_id' => $this->input->post('user_id'),
					'id_kantor' => $this->input->post('id_kantor'),
					'jabatan' => $this->input->post('jabatan'),
					'no_sk_penempatan' => $this->input->post('no_sk_penempatan'),
					'keterangan' => $this->input->post('keterangan'),
					'id_unit' => $this->input->post('id_unit'),
					'awal_penempatan' => date_format(date_create($this->input->post('awal_penempatan')), 'Y-m-d'),
					'akhir_penempatan' => date_format(date_create($this->input->post('akhir_penempatan')), 'Y-m-d'),
					'file_sk_penempatan' => ($file_sk['file_name']) !== "" ? $upload_path . '/' . $file_sk['file_name'] : $this->input->post('file_sk_penempatan_hidden'),
					'date' =>  date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->penempatan($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'User has been added successfully!');
					redirect(base_url('admin/users/tambah_penempatan'));
				}
			}
		} else {
			$data['staf'] = $this->user_model->get_all_simple_users();
			$data['ket_penempatan'] = $this->user_model->get_ket_penempatan();
			$data['kantor'] = $this->unit_model->get_all_kantor();
			$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
			$data['view'] = 'admin/users/tambah_penempatan';

			$this->load->view('layout', $data);
		}
	}

	public function edit_penempatan($id = 0)
	{

		//$all = $this->user_model->get_all_simple_users();

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('user_id', 'Nama Pegawai', 'trim|required');
			$this->form_validation->set_rules('no_sk_penempatan', 'Nomor SK', 'trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('id_kantor', 'Kantor', 'trim|required');
			$this->form_validation->set_rules('id_unit', 'Unit', 'trim|required');
			$this->form_validation->set_rules('awal_penempatan', 'Awal Penempatan', 'trim|required');
			$this->form_validation->set_rules('akhir_penempatan', 'Akhir Penempatan', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['staf'] = $this->user_model->get_all_simple_users();
				$data['penempatan'] = $this->user_model->get_penempatan_byid($id);
				$data['ket_penempatan'] = $this->user_model->get_ket_penempatan();
				$data['kantor'] = $this->unit_model->get_all_kantor();
				$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
				$data['view'] = 'admin/users/edit_penempatan';
				$this->load->view('layout', $data);
			} else {

				$upload_path = './uploads/sk';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}

				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('file_sk_penempatan');
				$file_sk = $this->upload->data();

				$data = array(
					'id_kantor' => $this->input->post('id_kantor'),
					'jabatan' => $this->input->post('jabatan'),
					'no_sk_penempatan' => $this->input->post('no_sk_penempatan'),
					'keterangan' => $this->input->post('keterangan'),
					'id_unit' => $this->input->post('id_unit'),
					'awal_penempatan' => date_format(date_create($this->input->post('awal_penempatan')), 'Y-m-d'),
					'akhir_penempatan' => date_format(date_create($this->input->post('akhir_penempatan')), 'Y-m-d'),
					'file_sk_penempatan' => ($file_sk['file_name']) !== "" ? $upload_path . '/' . $file_sk['file_name'] : $this->input->post('file_sk_hidden'),

					'date' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->edit_penempatan($data, $id);

				if ($result) {
					$this->session->set_flashdata('msg', 'User has been added successfully!');
					redirect(base_url('admin/users/edit_penempatan/' . $id));
				}
			}
		} else {
			$data['staf'] = $this->user_model->get_all_simple_users();
			$data['penempatan'] = $this->user_model->get_penempatan_byid($id);
			$data['ket_penempatan'] = $this->user_model->get_ket_penempatan();
			$data['kantor'] = $this->unit_model->get_all_kantor();
			$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
			$data['view'] = 'admin/users/edit_penempatan';

			$this->load->view('layout', $data);
		}
	}

	public function penempatan()
	{
		$data['penempatan'] = $this->user_model->get_all_penempatan();
		$data['staf'] = $this->user_model->get_all_simple_users();
		$data['kantor'] = $this->unit_model->get_all_kantor();
		$data['unit_kerja'] = $this->unit_model->get_all_unit_kerja();
		$data['view'] = 'admin/users/penempatan';

		$this->load->view('layout', $data);
	}

	public function lihat_penempatan($user_id)
	{
		$data['penempatan'] = $this->user_model->get_penempatan_by_userid($user_id);
		$data['view'] = 'admin/users/lihat_penempatan';

		$this->load->view('layout', $data);
	}

	public function hapus_penempatan($id = 0)
	{
		$this->db->delete('ci_penempatan', array('id' => $id));
		$this->session->set_flashdata('msg', 'Pengguna berhasil dihapus!');
		redirect(base_url('admin/users/penempatan'));
	}

	// notes about user
	public function notes($user_id = null)
	{
		$data['user'] = $this->user_model->get_user_by_id($user_id);
		$data['notes'] = $this->user_model->get_notes_by_userid($user_id);
		$data['view'] = 'admin/users/notes';

		$this->load->view('layout', $data);
	}

	public function tambah_notes($user_id = 0)
	{

		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('notes', 'Catatan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->user_model->get_user_by_id($user_id);
				$data['view'] = 'admin/users/tambah_notes';
				$this->load->view('layout', $data);
			} else {


				$data = array(
					'user_id' => $this->input->post('user_id'),
					'notes' => $this->input->post('notes'),
					'user_id_mgmt' => $this->session->userdata('user_id'),

					'date' =>  date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->tambah_notes($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'Data telah ditambahkan');
					redirect(base_url('admin/users/notes'));
				}
			}
		} else {
			$data['user'] = $this->user_model->get_user_by_id($user_id);
			$data['view'] = 'admin/users/tambah_notes';
			$this->load->view('layout', $data);
		}
	}

	public function upload()
	{
		if (isset($_POST['submit'])) {
			$upload_path = './uploads';

			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, TRUE);
			}

			$config = array(
				'upload_path' => $upload_path,
				'allowed_types' => "xlsx",
				'overwrite' => FALSE,
			);

			$this->load->library('upload', $config);
			$this->upload->do_upload('file');
			$upload = $this->upload->data();


			if ($upload) { // Jika proses upload sukses			    	

				$excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				$loadexcel = $excelreader->load('./uploads/' . $upload['file_name']); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

				$data['sheet'] = $sheet;
				$data['file_excel'] = $upload['file_name'];

				$data['title'] = 'Upload Pengguna';
				$data['view'] = 'admin/users/upload';

				$this->load->view('layout', $data);
			} else {
				$data['title'] = 'Upload Pengguna';
				$data['view'] = 'admin/users/upload';
				$this->load->view('layout', $data);
			}
		} else {
			$data['title'] = 'Upload Pengguna';
			$data['view'] = 'admin/users/upload';
			$this->load->view('layout', $data);
		}
	}

	public function import($file_excel)
	{
		$excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$loadexcel = $excelreader->load('./uploads/' . $file_excel); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

		$data_user = array();

		$numrow = 1;
		foreach ($sheet as $row) {

			if ($numrow > 1) {

				// Kita push (add) array data ke variabel data
				array_push($data_user, array(
					'password' => password_hash($row['A'], PASSWORD_BCRYPT),
					'username' => $row['A'],
					'firstname' => $row['B'],
					'email' => $row['C'],
					'password' => password_hash($row['D'], PASSWORD_BCRYPT),
					'created_at' => date('Y-m-d : h:m:s'),
					'role' => $row['E'],
					'unit' => $row['F'],
					'kantor' => $row['G'],
					'penempatan' => $row['H'],
					'awal' => $row['I'],
					'akhir' => $row['J'],

				));
			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		$this->user_model->import_users($data_user);

		redirect("admin/users"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
