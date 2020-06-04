<?php defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('profile/profile_model', 'profile_model');
	}
	//-------------------------------------------------------------------------

	public function index()
	{
		$id = $this->session->userdata('user_id');

		$data['kategori_minat'] =  $this->user_model->get_kategori_minat();
		$data['minat'] =  $this->user_model->get_minat_by_userid($id);
		$data['riwayat_pendidikan'] =  $this->user_model->get_riwayat_pendidikan($id);
		$data['sertifikat_penghargaan'] =  $this->user_model->get_sertifikat_penghargaan($id);
		$data['sk_penempatan'] = $this->user_model->get_penempatan_by_userid($id);
		$data['user'] = $this->user_model->get_user_by_id($id);
		$data['data_keluarga'] = $this->user_model->get_data_keluarga($id);
		$data['penempatan'] = $this->user_model->get_penempatan($id);
		$data['title'] = 'Profil Saya';
		$data['view'] = 'profile/index';
		$this->load->view('admin/layout', $data);
	}

	public function edit()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('status', 'Status Perkawinan', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('mobile_no', 'Telepon', 'trim|required');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->user_model->get_user_detail();
				$data['title'] = 'Profil Saya';
				$data['view'] = 'profile/edit_profile';
				$this->load->view('admin/layout', $data);
			} else {

				$upload_path = './uploads/fotoProfil';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}

				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('foto_profil');
				$foto_profil = $this->upload->data();

				$data = array(

					'firstname' => $this->input->post('firstname'),
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'updated_at' => date('Y-m-d : h:m:s'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'status' => $this->input->post('status'),
					'agama' => $this->input->post('agama'),
					'alamat' => $this->input->post('alamat'),
					'photo' => ($foto_profil['file_name']) !== "" ? $upload_path . '/' . $foto_profil['file_name'] : $this->input->post('foto_profil_hidden'),
					'password' => ($this->input->post('password') !== "" ? password_hash($this->input->post('password'), PASSWORD_BCRYPT) : $this->input->post('password_hidden')),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->update_user($data);
				if ($result) {
					$this->session->set_flashdata('msg', 'Profil Anda berhasil diubah!');
					redirect(base_url('profile'), 'refresh');
				}
			}
		} else {
			$data['user'] = $this->user_model->detail();
			$data['title'] = 'Profil Saya';
			$data['view'] = 'profile/edit_profile';
			$this->load->view('admin/layout', $data);
		}
	}

	public function riwayat_pendidikan()
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');

		$data['riwayat_pendidikan'] =  $this->user_model->get_riwayat_pendidikan($id);
		$data['title'] = 'Riwayat Pendidikan';
		$data['view'] = 'profile/riwayat_pendidikan';
		$this->load->view('admin/layout', $data);
	}

	public function tambah_riwayat_pendidikan()
	{
		$id = $this->session->userdata('user_id');

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('jenjang', 'Jenjang Pendidikan', 'trim|required');
			$this->form_validation->set_rules('lembaga', 'Lembaga Pendidikan', 'trim|required');
			$this->form_validation->set_rules('jurusan', 'Jurusan/Program Studi', 'trim|required');
			$this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah Riwayat Pendidikan';
				$data['view'] = 'profile/tambah_riwayat_pendidikan';
				$this->load->view('admin/layout', $data);
			} else {

				$upload_path = './uploads/dokumen';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}

				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('file_ijazah');
				$file_ijazah = $this->upload->data();

				$data = array(
					'jenjang' => $this->input->post('jenjang'),
					'lembaga' => $this->input->post('lembaga'),
					'tahun_lulus' => $this->input->post('tahun_lulus'),
					'user_id' => $id,
					'date' => date('Y-m-d : h:m:s'),
					'jurusan' => $this->input->post('jurusan'),
					'file_ijazah' => $upload_path . '/' . $file_ijazah['file_name'],
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->tambah_riwayat_pendidikan($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Data berhasil ditambahkan!');
					redirect(base_url('profile/riwayat_pendidikan'), 'refresh');
				}
			}
		} else {
			$data['user'] = $this->user_model->detail();
			$data['title'] = 'Profil Saya';
			$data['view'] = 'profile/tambah_riwayat_pendidikan';
			$this->load->view('admin/layout', $data);
		}
	}

	public function edit_riwayat_pendidikan($id)
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('jenjang', 'Jenjang Pendidikan', 'trim|required');
			$this->form_validation->set_rules('lembaga', 'Lembaga Pendidikan', 'trim|required');
			$this->form_validation->set_rules('jurusan', 'Jurusan/Program Studi', 'trim|required');
			$this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['riwayat_pendidikan'] = $this->user_model->get_riwayat_pendidikan_byid($id);
				$data['title'] = 'Edit Riwayat Pendidikan';
				$data['view'] = 'profile/edit_riwayat_pendidikan';
				$this->load->view('admin/layout', $data);
			} else {

				$upload_path = './uploads/dokumen';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}

				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('file_ijazah');
				$file_ijazah = $this->upload->data();

				$data = array(
					'jenjang' => $this->input->post('jenjang'),
					'lembaga' => $this->input->post('lembaga'),
					'tahun_lulus' => $this->input->post('tahun_lulus'),
					'date' => date('Y-m-d : h:m:s'),
					'jurusan' => $this->input->post('jurusan'),
					'file_ijazah' => ($file_ijazah['file_name']) !== "" ? $upload_path . '/' . $file_ijazah['file_name'] : $this->input->post('file_ijazah_hidden'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->edit_riwayat_pendidikan($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Data berhasil ditambahkan!');
					redirect(base_url('profile/riwayat_pendidikan'), 'refresh');
				}
			}
		} else {
			$data['riwayat_pendidikan'] = $this->user_model->get_riwayat_pendidikan_byid($id);
			$data['title'] = 'Edit Riwayat Pendidikan';
			$data['view'] = 'profile/edit_riwayat_pendidikan';
			$this->load->view('admin/layout', $data);
		}
	}

	public function hapus_riwayat_pendidikan($id = 0)
	{
		$this->db->delete('ci_riwayat_pendidikan', array('id' => $id));
		$this->session->set_flashdata('msg', 'Data berhasil dihapus.');
		redirect(base_url('profile/riwayat_pendidikan'));
	}

	public function sertifikat_penghargaan()
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');

		$data['sertifikat_penghargaan'] =  $this->user_model->get_sertifikat_penghargaan($id);
		$data['title'] = 'Sertifikat & Penghargaan';
		$data['view'] = 'profile/sertifikat_penghargaan';
		$this->load->view('admin/layout', $data);
	}

	public function tambah_sertifikat_penghargaan()
	{
		$id = $this->session->userdata('user_id');

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
			$this->form_validation->set_rules('yang_menerbitkan', 'Yang Menerbitkan', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah sertifikat_penghargaan';
				$data['view'] = 'profile/tambah_sertifikat_penghargaan';
				$this->load->view('admin/layout', $data);
			} else {

				$upload_path = './uploads/dokumen';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}

				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('file_sertifikat');
				$file_sertifikat = $this->upload->data();

				$data = array(
					'jenis' => $this->input->post('jenis'),
					'keterangan' => $this->input->post('keterangan'),
					'yang_menerbitkan' => $this->input->post('yang_menerbitkan'),
					'user_id' => $id,
					'date' => date('Y-m-d : h:m:s'),
					'tahun' => $this->input->post('tahun'),
					'file_sertifikat' => $upload_path . '/' . $file_sertifikat['file_name'],
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->tambah_sertifikat_penghargaan($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Data berhasil ditambahkan!');
					redirect(base_url('profile/sertifikat_penghargaan'), 'refresh');
				}
			}
		} else {
			$data['user'] = $this->user_model->detail();
			$data['title'] = 'Profil Saya';
			$data['view'] = 'profile/tambah_sertifikat_penghargaan';
			$this->load->view('admin/layout', $data);
		}
	}

	public function edit_sertifikat_penghargaan($id)
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
			$this->form_validation->set_rules('yang_menerbitkan', 'Yang Menerbitkan', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['sertifikat_penghargaan'] = $this->user_model->get_sertifikat_penghargaan_byid($id);
				$data['title'] = 'Edit sertifikat_penghargaan';
				$data['view'] = 'profile/edit_sertifikat_penghargaan';
				$this->load->view('admin/layout', $data);
			} else {

				$upload_path = './uploads/dokumen';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}

				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('file_sertifikat');
				$file_sertifikat = $this->upload->data();

				$data = array(
					'jenis' => $this->input->post('jenis'),
					'keterangan' => $this->input->post('keterangan'),
					'yang_menerbitkan' => $this->input->post('yang_menerbitkan'),
					'date' => date('Y-m-d : h:m:s'),
					'tahun' => $this->input->post('tahun'),
					'file_sertifikat' => ($file_sertifikat['file_name'] !== "") ? $upload_path . '/' . $file_sertifikat['file_name'] : $this->input->post('file_sertifikat_hidden'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->edit_sertifikat_penghargaan($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Data berhasil ditambahkan!');
					redirect(base_url('profile/sertifikat_penghargaan'), 'refresh');
				}
			}
		} else {
			$data['sertifikat_penghargaan'] = $this->user_model->get_sertifikat_penghargaan_byid($id);
			$data['title'] = 'Edit sertifikat_penghargaan';
			$data['view'] = 'profile/edit_sertifikat_penghargaan';
			$this->load->view('admin/layout', $data);
		}
	}

	public function hapus_sertifikat_penghargaan($id = 0)
	{
		$this->db->delete('ci_sertifikat_penghargaan', array('id' => $id));
		$this->session->set_flashdata('msg', 'Data berhasil dihapus.');
		redirect(base_url('profile/sertifikat_penghargaan'));
	}

	public function minat()
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');

		if ($this->input->post('submit')) {

			$data = array(
				'minat' => implode(',', $this->input->post('minat')),
				'user_id' => $id,
			);
			$data = $this->security->xss_clean($data);

			$cek_minat = $this->db->get_where('ci_minat', array('user_id' => $id));

			if ($cek_minat->row_array() > 0) {
				$result = $this->user_model->edit_minat($data, $id);
			} else {
				$result = $this->user_model->tambah_minat($data);
			}

			if ($result) {
				$this->session->set_flashdata('msg', 'Data berhasil ditambahkan!');
				redirect(base_url('profile/minat'), 'refresh');
			}
		} else {
			$data['kategori_minat'] =  $this->user_model->get_kategori_minat();
			$data['minat'] =  $this->user_model->get_minat_by_userid($id);
			$data['title'] = 'Minat dan Keahlian';
			$data['view'] = 'profile/minat';
			$this->load->view('admin/layout', $data);
		}
	}

	public function keluarga($id=0)
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');

		$data['data_keluarga'] =  $this->user_model->get_data_keluarga($id);
		$data['title'] = 'Data keluarga';
		$data['view'] = 'profile/keluarga';
		$this->load->view('admin/layout', $data);
	}


	public function tambah_keluarga()
	{

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('status_keluarga', 'Status Keluarga', 'trim|required');
			if ($this->input->post('status_keluarga') == 'anak') {

				$this->form_validation->set_rules('anak_ke', 'Anak ke', 'trim|required');
			} else if ($this->input->post('status_keluarga') == 'pasutri') {
				$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
				$this->form_validation->set_rules('tempat_bekerja', 'Tempat Bekerja', 'trim|required');
			} else {
			}
			if ($this->form_validation->run() == FALSE) {

				$data['title'] = 'Tambah Anggota Keluarga';
				$data['view'] = 'profile/tambah_keluarga';
				$this->load->view('admin/layout', $data);
			} else {

				$data = array(
					'nama_keluarga' => $this->input->post('nama_keluarga'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'status_keluarga' => $this->input->post('status_keluarga'),
					'anak_ke' => $this->input->post('anak_ke'),
					'user_id' => $this->session->userdata('user_id'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'tempat_bekerja' => $this->input->post('tempat_bekerja'),
					'date' => date('Y-m-d : h:m:s'),

				);
				$data = $this->security->xss_clean($data);
				$result = $this->user_model->tambah_keluarga($data);
				if ($result) {
					$this->session->set_flashdata('msg', 'Data Keluarga berhasil diubah!');
					redirect(base_url('profile/keluarga'), 'refresh');
				}
			}
		} else {

			$data['title'] = 'Tambah Anggota Keluarga';
			$data['view'] = 'profile/tambah_keluarga';
			$this->load->view('admin/layout', $data);
		}
	}
	public function edit_pasutri($id = 0)
	{

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			//$this->form_validation->set_rules('status_keluarga', 'Status Keluarga', 'trim|required');			
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('tempat_bekerja', 'Tempat bekerja', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['keluarga'] = $this->profile_model->get_detail_keluarga($id);
				$data['title'] = 'Edit Anggota Pasutri';
				$data['view'] = 'profile/edit_pasutri';
				$this->load->view('admin/layout', $data);
			} else {

				$data = array(
					'nama_keluarga' => $this->input->post('nama_keluarga'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					//'status_keluarga' => $this->input->post('status_keluarga'),
					'user_id' => $this->session->userdata('user_id'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'tempat_bekerja' => $this->input->post('tempat_bekerja'),

				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->edit_keluarga($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Data Pasutri berhasil diubah!');
					redirect(base_url('profile/edit_pasutri/' . $id), 'refresh');
				}
			}
		} else {

			$data['keluarga'] = $this->profile_model->get_detail_keluarga_individu($id);
			$data['title'] = 'Edit Pasutri' . $id;
			$data['view'] = 'profile/edit_pasutri';
			$this->load->view('admin/layout', $data);
		}
	}

	public function edit_anak($id = 0)
	{

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('anak_ke', 'Anak ke', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['keluarga'] = $this->profile_model->get_detail_keluarga($id);
				$data['title'] = 'Edit Anggota Keluarga';
				$data['view'] = 'profile/edit_anak';
				$this->load->view('admin/layout', $data);
			} else {

				$data = array(
					'nama_keluarga' => $this->input->post('nama_keluarga'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'anak_ke' => $this->input->post('anak_ke'),
					'user_id' => $this->session->userdata('user_id'),
					'date' => date('Y-m-d : h:m:s'),

				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->edit_keluarga($data, $id);
				if ($result) {
					$this->session->set_flashdata('msg', 'Profil Anda berhasil diubah!');
					redirect(base_url('profile/edit_anak/' . $id), 'refresh');
				}
			}
		} else {

			$data['keluarga'] = $this->profile_model->get_detail_keluarga_individu($id);
			$data['title'] = 'Edit Anggota Keluarga';
			$data['view'] = 'profile/edit_anak';
			$this->load->view('admin/layout', $data);
		}
	}

	public function hapus_keluarga($id = 0)
	{

		$this->db->delete('ci_individu_keluarga', array('id' => $id));
		$this->session->set_flashdata('msg', 'Data berhasil dihapus.');
		redirect(base_url('profile/keluarga'));
	}
}
