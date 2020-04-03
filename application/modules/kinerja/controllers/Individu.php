<?php defined('BASEPATH') or exit('No direct script access allowed');

class Individu extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kinerja/individu_model', 'individu_model');
		$this->load->model('admin/user_model', 'user_model');
		$this->load->model('admin/user_model', 'user_model');
	}

	public function index()
	{
		$data['view'] = 'din';
		$this->load->view('admin/layout', $data);
	}

	public function detail_din($id = 0, $tahun = 0)
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');
		$tahun = ($tahun != '') ? $tahun : date('Y');
		$data['user'] = $this->user_model->get_user_by_id($id);
		$data['data_keluarga'] = $this->user_model->get_data_keluarga($id);
		$data['penempatan'] = $this->user_model->get_penempatan($id);
		$data['din'] = $this->individu_model->get_individu_din($id, $tahun);
		$data['din_grafik'] = $this->individu_model->get_individu_din_grafik($id, $tahun);
		$data['tahun_din'] = $this->individu_model->get_individu_din_grafik_tahun($id);

		$data['view'] = 'kinerja/detail_din';
		$this->load->view('admin/layout', $data);
	}

	public function din()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('sholat_awal_waktu', 'Frekuensi melaksanakan shalat wajib berjamaah di awal waktu', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('jamaah_masjid', 'Frekuensi shalat berjamaah di masjid', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('tilawah_quran', 'Jumlah halaman tilawah qur’an', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('tahajjud', 'Frekuensi shalat tahajjud', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('puasa_sunnah', 'Puasa sunnah Senin Kamis', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('dhuha', 'Shalat dhuha sebelum beraktivitas', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('periode_bln', 'trim|required|callback_cek_periode_kinerja[' . $this->input->post('periode_thn') . ']');

			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'kinerja/din';
				$this->load->view('admin/layout', $data);
			} else {

				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'periode_bln' => $this->input->post('periode_bln'),
					'periode_thn' => $this->input->post('periode_thn'),
					'sholat_awal_waktu' => $this->input->post('sholat_awal_waktu'),
					'jamaah_masjid' => $this->input->post('jamaah_masjid'),
					'tilawah_quran' => $this->input->post('tilawah_quran'),
					'tahajjud' => $this->input->post('tahajjud'),
					'puasa_sunnah' => $this->input->post('puasa_sunnah'),
					'dhuha' => $this->input->post('dhuha'),
					'date' => date('Y-m-d : h:m:s'),
				);


				$data = $this->security->xss_clean($data);
				$result = $this->individu_model->add_individu_din($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
					redirect(base_url('kinerja/individu/din'));
				}
			}
		} else {

			$data['view'] = 'kinerja/din';
			$this->load->view('admin/layout', $data);
		}
	}

	public function hapus_din($id = 0)
	{
		$this->db->delete('ci_individu_din', array('id' => $id));
		$this->session->set_flashdata('msg', 'Data berhasil dihapus!');
		redirect(base_url('kinerja/individu/detail_din'));
	}



	public function detail_nafs($id = 0, $tahun = 0)
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');
		$tahun = ($tahun != '') ? $tahun : date('Y');
		$data['user'] = $this->user_model->get_user_by_id($id);
		$data['data_keluarga'] = $this->user_model->get_data_keluarga($id);
		$data['penempatan'] = $this->user_model->get_penempatan($id);
		$data['nafs'] = $this->individu_model->get_individu_nafs($id, $tahun);
		$data['nafs_grafik'] = $this->individu_model->get_individu_nafs_grafik($id, $tahun);
		$data['tahun_nafs'] = $this->individu_model->get_individu_nafs_grafik_tahun($id);
		$data['view'] = 'kinerja/detail_nafs';
		$this->load->view('admin/layout', $data);
	}

	public function nafs()
	{

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('olah_raga', 'Frekuensi olah raga per bulan', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('tepat_waktu', 'Kehadiran kerja tepat waktu dalam 1 bulan', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));

			if ($this->form_validation->run() == FALSE) {
				$data['individu_nafs'] = $this->individu_model->get_individu_nafs();
				$data['view'] = 'kinerja/nafs';
				$this->load->view('admin/layout', $data);
			} else {
				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'periode_bln' => $this->input->post('periode_bln'),
					'periode_thn' => $this->input->post('periode_thn'),
					'olah_raga' => $this->input->post('olah_raga'),
					'tepat_waktu' => $this->input->post('tepat_waktu'),
					'date' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->individu_model->add_individu_nafs($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
					redirect(base_url('kinerja/individu/nafs'));
				}
			}
		} else {
			$data['individu_nafs'] = $this->individu_model->get_individu_nafs();
			$data['view'] = 'kinerja/nafs';
			$this->load->view('admin/layout', $data);
		}
	} //nafs

	public function detail_aql($id = 0, $tahun = 0)
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');
		$tahun = ($tahun != '') ? $tahun : date('Y');
		$data['user'] = $this->user_model->get_user_by_id($id);
		$data['data_keluarga'] = $this->user_model->get_data_keluarga($id);
		$data['penempatan'] = $this->user_model->get_penempatan($id);
		$data['aql_pelatihan'] = $this->individu_model->get_individu_aql($id, $tahun, 'Pelatihan');
		$data['aql_inovasi'] = $this->individu_model->get_individu_aql($id, $tahun, '');
		$data['aql_pengajian'] = $this->individu_model->get_individu_aql($id, $tahun, 'Pengajian');
		$data['tahun_aql'] = $this->individu_model->get_individu_aql_grafik_tahun($id);
		$data['view'] = 'kinerja/detail_aql';
		$this->load->view('admin/layout', $data);
	}
	public function aql(){
			
		if($this->input->post('submit')){

			$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal Pelatihan', 'required');
			$this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'trim|required');
			$this->form_validation->set_rules('pembicara', 'Pembicara', 'trim|required');
			$this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'trim|required');
							

			if ($this->form_validation->run() == FALSE) {
				//$data['individu_aql'] = $this->individu_model->get_individu_aql();
				$data['view'] = 'kinerja/aql';
				$this->load->view('admin/layout', $data);
			}
			else{ 

					$data = array(
						'user_id'=> $this->session->userdata('user_id'),
						'nama_kegiatan' => $this->input->post('nama_kegiatan'),
						'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
						'pembicara' => $this->input->post('pembicara'),
						'tanggal' => $this->input->post('tanggal'),		
						'tempat' => $this->input->post('tempat'),			
						'date' => date('Y-m-d : h:m:s'),					
					);

					
				
					$data = $this->security->xss_clean($data);
					$result = $this->individu_model->add_individu_aql($data);

					if($result){
						$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
						redirect(base_url('kinerja/individu/aql'));
					} 

			} 

		} else if($this->input->post('submit-usulan')){


			$this->form_validation->set_rules('inovasi_kepada_bmt', 'Inovasi', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal Pelatihan', 'required');	
			$this->form_validation->set_rules('status', 'Status', 'required');	
							

			if ($this->form_validation->run() == FALSE) {
				//$data['individu_aql'] = $this->individu_model->get_individu_aql();
				$data['view'] = 'kinerja/aql';
				$this->load->view('admin/layout', $data);
			}
			else{ 

					$data = array(
						'user_id'=> $this->session->userdata('user_id'),							
						'tanggal' => $this->input->post('tanggal'),		
						'status' => $this->input->post('status'),	
						'inovasi_kepada_bmt' => $this->input->post('inovasi_kepada_bmt'),			
						'date' => date('Y-m-d : h:m:s'),					
					);

								
					$data = $this->security->xss_clean($data);
					$result = $this->individu_model->add_individu_aql($data);

					if($result){
						$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
						redirect(base_url('kinerja/individu/aql'));
					} 

			} 

			

		} else{
			//$data['individu_aql'] = $this->individu_model->get_individu_aql();
			$data['view'] = 'kinerja/aql';
			$this->load->view('admin/layout', $data);
		}

			

				
	} //aql


	public function detail_nasl($id = 0, $tahun = 0)
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');
		$tahun = ($tahun != '') ? $tahun : date('Y');
		$data['user'] = $this->user_model->get_user_by_id($id);
		$data['data_keluarga'] = $this->user_model->get_data_keluarga($id);
		$data['penempatan'] = $this->user_model->get_penempatan($id);
		$data['nasl'] = $this->individu_model->get_individu_nasl($id, $tahun);
		$data['nasl_grafik'] = $this->individu_model->get_individu_nasl_grafik($id, $tahun);
		$data['tahun_nasl'] = $this->individu_model->get_individu_nasl_grafik_tahun($id);
		$data['anak'] = $this->user_model->get_anak($id);
		$data['view'] = 'kinerja/detail_nasl';
		$this->load->view('admin/layout', $data);
	}

	public function nasl()
	{

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('kesehatan_keluarga', 'Kesehatan anggota keluarga', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('partisipasi_keluarga', 'Partisipasi keluarga besar di kegiatan BMT ', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));

			if ($this->form_validation->run() == FALSE) {
				$data['individu_nasl'] = $this->individu_model->get_individu_nasl();
				$data['anak'] = $this->user_model->get_anak();
				$data['view'] = 'kinerja/nasl';
				$this->load->view('admin/layout', $data);
			} else {

				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'periode_bln' => $this->input->post('periode_bln'),
					'periode_thn' => $this->input->post('periode_thn'),
					'kesehatan_keluarga' => $this->input->post('kesehatan_keluarga'),
					'partisipasi_keluarga' => $this->input->post('partisipasi_keluarga'),
					'date' => date('Y-m-d : h:m:s'),
				);

				$data = $this->security->xss_clean($data);
				$result = $this->individu_model->add_individu_nasl($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
					redirect(base_url('kinerja/individu/detail_nasl'));
				}
			}
		} else {
			$data['individu_nasl'] = $this->individu_model->get_individu_nasl();
			$data['anak'] = $this->user_model->get_anak();
			$data['view'] = 'kinerja/nasl';
			$this->load->view('admin/layout', $data);
		}
	} //nasl

	public function detail_mal($id = 0, $tahun = 0)
	{
		$id = ($this->session->userdata('role') == 1) ? $id = $id :  $id = $this->session->userdata('user_id');
		$tahun = ($tahun != '') ? $tahun : date('Y');
		$data['user'] = $this->user_model->get_user_by_id($id);
		$data['data_keluarga'] = $this->user_model->get_data_keluarga($id);
		$data['penempatan'] = $this->user_model->get_penempatan($id);
		$data['mal'] = $this->individu_model->get_individu_mal($id, $tahun);
		$data['tahun_mal'] = $this->individu_model->get_individu_mal_grafik_tahun($id);
		$data['view'] = 'kinerja/detail_mal';
		$this->load->view('admin/layout', $data);
	}

	public function mal()
	{
		if ($this->input->post('submit')) {
			//$this->form_validation->set_rules('saving', 'Jumlah saving', 'trim|required',array('required' => '<b>%s</b> wajib diisi'));
			//	$this->form_validation->set_rules('hutang', 'Jumlah Hutang', 'trim|required',array('required' => '<b>%s</b> wajib diisi'));
			//$this->form_validation->set_rules('tempat_hutang', 'Lembaga tempat berhutang', 'trim|required',array('required' => '<b>%s</b> wajib diisi'));

			if ($this->form_validation->run() == FALSE) {
				$data['individu_mal'] = $this->individu_model->get_individu_mal();
				$data['view'] = 'kinerja/mal';
				$this->load->view('admin/layout', $data);
			} else {
				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'periode_bln' => $this->input->post('periode_bln'),
					'periode_thn' => $this->input->post('periode_thn'),
					'saving' => $this->input->post('saving'),
					'hutang' => $this->input->post('hutang'),
					'tempat_hutang' => $this->input->post('tempat_hutang'),
					'date' => date('Y-m-d : h:m:s'),
				);

				$data = $this->security->xss_clean($data);
				$result = $this->individu_model->add_individu_mal($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
					redirect(base_url('kinerja/individu/mal'));
				}
			}
		} else {
			$data['individu_mal'] = $this->individu_model->get_individu_mal();
			$data['view'] = 'kinerja/mal';
			$this->load->view('admin/layout', $data);
		}
	} //mal

} //class
