<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment as alignment; // Instead alignment
use PhpOffice\PhpSpreadsheet\Style\Fill as fill; // Instead fill
use PhpOffice\PhpSpreadsheet\Style\Border as border; // Instead fill
use PhpOffice\PhpSpreadsheet\Style\Color as color_; //Instead PHPExcel_Style_Color
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup as pagesetup; // Instead PHPExcel_Worksheet_PageSetup


defined('BASEPATH') or exit('No direct script access allowed');

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
	public function aql()
	{

		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal Pelatihan', 'required');
			$this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'trim|required');
			$this->form_validation->set_rules('pembicara', 'Pembicara', 'trim|required');
			$this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				//$data['individu_aql'] = $this->individu_model->get_individu_aql();
				$data['view'] = 'kinerja/aql';
				$this->load->view('admin/layout', $data);
			} else {

				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
					'pembicara' => $this->input->post('pembicara'),
					'tanggal' => $this->input->post('tanggal'),
					'tempat' => $this->input->post('tempat'),
					'date' => date('Y-m-d : h:m:s'),
				);



				$data = $this->security->xss_clean($data);
				$result = $this->individu_model->add_individu_aql($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
					redirect(base_url('kinerja/individu/aql'));
				}
			}
		} else if ($this->input->post('submit-usulan')) {


			$this->form_validation->set_rules('inovasi_kepada_bmt', 'Inovasi', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal Pelatihan', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');


			if ($this->form_validation->run() == FALSE) {
				//$data['individu_aql'] = $this->individu_model->get_individu_aql();
				$data['view'] = 'kinerja/aql';
				$this->load->view('admin/layout', $data);
			} else {

				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'tanggal' => $this->input->post('tanggal'),
					'status' => $this->input->post('status'),
					'inovasi_kepada_bmt' => $this->input->post('inovasi_kepada_bmt'),
					'date' => date('Y-m-d : h:m:s'),
				);


				$data = $this->security->xss_clean($data);
				$result = $this->individu_model->add_individu_aql($data);

				if ($result) {
					$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
					redirect(base_url('kinerja/individu/aql'));
				}
			}
		} else {
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
			$this->form_validation->set_rules('saving', 'Jumlah saving', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('hutang', 'Jumlah Hutang', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));
			$this->form_validation->set_rules('tempat_hutang', 'Lembaga tempat berhutang', 'trim|required', array('required' => '<b>%s</b> wajib diisi'));

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

	public function tambah_raport()
	{
		if ($this->input->post('submit')) {

			//$this->form_validation->set_rules('saving', 'Jumlah Tabungan', 'trim|required');


			/*if ($this->form_validation->run() == FALSE) {
				$data['individu_nasb'] = $this->individu_model->get_individu_nasb();
				$data['anak'] = $this->profile_model->get_anak();
				$data['view'] = 'kinerja/nasb';
				$this->load->view('admin/layout', $data);
			}
			else{ */

			$upload_path = './uploads/raport';

			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, TRUE);
			}
			//$newName = "hrd-".date('Ymd-His');
			$config = array(
				'upload_path' => $upload_path,
				'allowed_types' => "doc|docx|xls|xlsx|ppt|pptx|odt|rtf|jpg|png|pdf",
				'overwrite' => FALSE,
			);

			$this->load->library('upload', $config);
			$this->upload->do_upload('raport');
			$raport = $this->upload->data();

			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'id_keluarga' =>  $this->input->post('id_keluarga'),

				'raport' => $upload_path . '/' . $raport['file_name'],
			);

			$data = $this->security->xss_clean($data);
			$result = $this->individu_model->add_raport($data);

			if ($result) {
				$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
				redirect(base_url('kinerja/individu/detail_nasl'));
			}

			//	} 

		} else {
			$data['individu_nasb'] = $this->individu_model->get_individu_nasb();
			$data['anak'] = $this->profile_model->get_anak();
			$data['view'] = 'kinerja/individu/detail_nasl';
			$this->load->view('admin/layout', $data);
		}
	}


	public function del_raport($id = 0)
	{
		$this->db->delete('ci_raport', array('id' => $id));
		$this->session->set_flashdata('msg', 'Raport berhasil dihapus!');
		redirect(base_url('kinerja/individu/detail_nasl'));
	}

	public function rekap($kat = null, $thn = null, $bln = null)
	{

		if (!isset($bln)) {
			$bln = date("n");
		}
		if (!isset($thn)) {
			$thn = date("Y");
		}

		if (!isset($kat)) {

			$data['view'] = 'error';
			$data['error'] = 'Halaman tidak ditemukan';
			$this->load->view('admin/layout', $data);
		} else {




			switch ($kat) {
				case "nafs":
					$table = "ci_individu_nafs";

					break;
				case "mal":
					$table = "ci_individu_mal";
					break;
				case "nasl":
					$table = "ci_individu_nasl";
					break;
				case "aql":
					$table = "ci_individu_aql";
					break;
				default:
					$table = "ci_individu_din";
			}

			$months = $this->db->query("SELECT DISTINCT(periode_bln) FROM $table WHERE  periode_thn = $thn ORDER BY periode_bln ASC")->result_array();
			$years = $this->db->query("SELECT DISTINCT(periode_thn) FROM $table ORDER BY periode_thn ASC")->result_array();
			if ($kat !== 'aql') {
				$query = $this->db->query("SELECT d.*, u.username, u.firstname from $table d
				LEFT JOIN ci_users u ON u.id = d.user_id
				WHERE d.periode_thn = '$thn' AND d.periode_bln = '$bln'
				")->result_array();
			} else {
				$query = $this->db->query("SELECT d.*, u.username, u.firstname from $table d
				LEFT JOIN ci_users u ON u.id = d.user_id
				")->result_array();
			}

			$data['kinerja'] = $query;
			$data['kat'] = $kat;
			$data['thn'] = $thn;
			$data['months'] = $months;
			$data['years'] = $years;
			$data['bln'] = $bln;
			$data['view'] = 'kinerja/rekap';
			$this->load->view('admin/layout', $data);
		}
	} //rekap

	public function rekap_excel($kat, $thn, $bln)
	{
		switch ($kat) {
			case "nafs":
				$table = "ci_individu_nafs";
				$filename = "Hifdz An Nafs";
				$coltab = 'C';
				break;
			case "mal":
				$table = "ci_individu_mal";
				$filename = "Hifdz Al Maal";
				$coltab = 'D';
				break;
			case "nasl":
				$table = "ci_individu_nasl";
				$filename = "Hifdz An Nasl";
				$coltab = 'C';
				break;
			case "aql":
				$table = "ci_individu_aql";
				$filename = "Hifdz Al Aql";
				$coltab = 'F';
				break;
			case "din":
				$table = "ci_individu_din";
				$filename = "Hifdz Ad Din";
				$coltab = 'G';
			default:
				$table = "ci_individu_din";
				$filename = "Hifdz Ad Din";
				$coltab = 'G';
		}

		$style_header = [
			'font' => [
				'bold' => true,
				'color' => ['argb' => 'FFFFFFFF'],
			],
			'alignment' => [
				'horizontal' => alignment::HORIZONTAL_CENTER,
				'WrapText' => true,
			],
			'borders' => [
				'right' => ['borderStyle'  => border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => border::BORDER_THIN] // Set border left dengan garis tipis			  
			],
			'fill' => [
				'fillType' => fill::FILL_GRADIENT_LINEAR,
				'rotation' => 90,
				'startColor' => [
					'argb' => '0a3256',
				],
				'endColor' => [
					'argb' => '11375b',
				],
			],
		];


		$style_td = [
			'alignment' => [
				'horizontal' => alignment::HORIZONTAL_RIGHT, // Set text jadi di tengah secara vertical (middle)
				'vertical' => alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];

		$style_td_left = [
			'alignment' => [
				'horizontal' => alignment::HORIZONTAL_LEFT, // Set text jadi di tengah secara vertical (middle)
				'vertical' => alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
		];


		$style_td_bold = [
			'font' => ['bold' => true],
			'fill' => [
				'fillType' => fill::FILL_SOLID,
				'color' => [
					'argb' => 'ecaa27',
				],
			],
		];

		$style_td_bold_no_bg = [
			'font' => ['bold' => true],
			'fill' => [
				'type' => fill::FILL_SOLID,
			],
		];

		if ($kat !== 'aql') {
			$kinerja = $this->db->query("SELECT d.*, u.username, u.firstname from $table d
			LEFT JOIN ci_users u ON u.id = d.user_id
			WHERE d.periode_thn = '$thn' AND d.periode_bln = '$bln'
			")->result_array();
		} else {
			$kinerja = $this->db->query("SELECT d.*, u.username, u.firstname from $table d
			LEFT JOIN ci_users u ON u.id = d.user_id		
			")->result_array();
		}

		$last_row = count($kinerja) + 4;

		// echo '<pre>';
		// print_r($kinerja);
		// echo '</pre>';

		// create file name

		$fileName = "Rekap-Kinerja-Staf-BMT-$filename-" . konversiBulanAngkaKeNama($bln) . "-$thn.xlsx";

		$excel = new Spreadsheet;

		// Settingan awal file excel
		$excel->getProperties()->setCreator('Siskimas BMT')
			->setLastModifiedBy('Siskimas BMT')
			->setTitle("Siskimas BMT")
			->setSubject("Siskimas BMT")
			->setDescription("Siskimas BMT")
			->setKeywords("Siskimas BMT");

		//judul baris ke 1
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "Rekap Kinerja Pegawai BMT " . konversiBulanAngkaKeNama($bln) . " " . $thn); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:' . $coltab . '1'); // Set Merge Cell pada kolom A1 sampai F1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		//sub judul baris ke 2
		$excel->setActiveSheetIndex(0)->setCellValue('A2', $filename); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:' . $coltab . '2'); // Set Merge Cell pada kolom A1 sampai F1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1


		if ($kat == 'din') {
			$excel->getActiveSheet()->SetCellValue('A3', 'Nama Staf');
			$excel->getActiveSheet()->SetCellValue('B3', 'Frekuensi melaksanakan shalat wajib berjamaah di awal	waktu');
			$excel->getActiveSheet()->SetCellValue('C3', 'Frekuensi shalat berjamaah di	masjid');
			$excel->getActiveSheet()->SetCellValue('D3', 'Jumlah halaman tilawah qur’an');
			$excel->getActiveSheet()->SetCellValue('E3', 'Frekuensi shalat tahajjud');
			$excel->getActiveSheet()->SetCellValue('F3', 'Puasa sunnah Senin Kamis');
			$excel->getActiveSheet()->SetCellValue('G3', 'Shalat dhuha sebelum beraktivitas');

			$rowCount = 4;
			foreach ($kinerja as $kinerja) {
				$excel->getActiveSheet()->SetCellValue('A' . $rowCount, ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username']);
				$excel->getActiveSheet()->SetCellValue('B' . $rowCount, $kinerja['sholat_awal_waktu']);
				$excel->getActiveSheet()->SetCellValue('C' . $rowCount, $kinerja['jamaah_masjid']);
				$excel->getActiveSheet()->SetCellValue('D' . $rowCount, $kinerja['tilawah_quran']);
				$excel->getActiveSheet()->SetCellValue('E' . $rowCount, $kinerja['tahajjud']);
				$excel->getActiveSheet()->SetCellValue('F' . $rowCount, $kinerja['puasa_sunnah']);
				$excel->getActiveSheet()->SetCellValue('G' . $rowCount, $kinerja['dhuha']);

				$rowCount++;
			}
		} elseif ($kat == 'mal') {
			$excel->getActiveSheet()->SetCellValue('A3', 'Nama Staf');
			$excel->getActiveSheet()->SetCellValue('B3', 'Jumlah Tabungan Pendidikan Anak');
			$excel->getActiveSheet()->SetCellValue('C3', 'Jumlah Hutang jika ada');
			$excel->getActiveSheet()->SetCellValue('D3', 'Lembaga tempat berhutang');

			$rowCount = 4;
			foreach ($kinerja as $kinerja) {
				$excel->getActiveSheet()->SetCellValue('A' . $rowCount, ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username']);
				$excel->getActiveSheet()->SetCellValue('B' . $rowCount, number_format($kinerja['saving']));
				$excel->getActiveSheet()->SetCellValue('C' . $rowCount, number_format($kinerja['hutang']));
				$excel->getActiveSheet()->SetCellValue('D' . $rowCount, $kinerja['tempat_hutang']);
				$rowCount++;
			}
		} elseif ($kat == 'nafs') {
			$excel->getActiveSheet()->SetCellValue('A3', 'Nama Staf');
			$excel->getActiveSheet()->SetCellValue('B3', 'Olah Raga (kali/bln)');
			$excel->getActiveSheet()->SetCellValue('C3', 'Tepat Waktu (kali/bln)');

			$rowCount = 4;
			foreach ($kinerja as $kinerja) {
				$excel->getActiveSheet()->SetCellValue('A' . $rowCount, ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username']);
				$excel->getActiveSheet()->SetCellValue('B' . $rowCount, $kinerja['olah_raga']);
				$excel->getActiveSheet()->SetCellValue('C' . $rowCount, $kinerja['tepat_waktu']);
				$rowCount++;
			}
		} elseif ($kat == 'nasl') {
			$excel->getActiveSheet()->SetCellValue('A3', 'Nama Staf');
			$excel->getActiveSheet()->SetCellValue('B3', 'Jumlah hari anggota keluarga<br> yang sakit dalam sebulan dan sembuh');
			$excel->getActiveSheet()->SetCellValue('C3', 'Partisipasi keluarga besar di kegiatan BMT');

			$rowCount = 4;
			foreach ($kinerja as $kinerja) {
				$excel->getActiveSheet()->SetCellValue('A' . $rowCount, ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username']);
				$excel->getActiveSheet()->SetCellValue('B' . $rowCount, $kinerja['kesehatan_keluarga']);
				$excel->getActiveSheet()->SetCellValue('C' . $rowCount, $kinerja['partisipasi_keluarga']);
				$rowCount++;
			}
		} elseif ($kat == 'aql') {
			$excel->getActiveSheet()->SetCellValue('A3', 'Nama Staf');
			$excel->getActiveSheet()->SetCellValue('B3', 'Nama Kegiatan');
			$excel->getActiveSheet()->SetCellValue('C3', 'Pembicara');
			$excel->getActiveSheet()->SetCellValue('D3', 'Jenis Kegiatan');
			$excel->getActiveSheet()->SetCellValue('E3', 'Tanggal');
			$excel->getActiveSheet()->SetCellValue('F3', 'Tempat');

			$rowCount = 4;
			foreach ($kinerja as $kinerja) {
				$excel->getActiveSheet()->SetCellValue('A' . $rowCount, ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username']);
				$excel->getActiveSheet()->SetCellValue('B' . $rowCount, $kinerja['nama_kegiatan']);
				$excel->getActiveSheet()->SetCellValue('C' . $rowCount, $kinerja['pembicara']);
				$excel->getActiveSheet()->SetCellValue('D' . $rowCount, $kinerja['jenis_kegiatan']);
				$excel->getActiveSheet()->SetCellValue('E' . $rowCount, $kinerja['tanggal']);
				$excel->getActiveSheet()->SetCellValue('F' . $rowCount, $kinerja['tempat']);
				$rowCount++;
			}
		}


		//header style
		for ($i = 'A'; $i <=  $excel->getActiveSheet()->getHighestColumn(); $i++) {
			$excel->getActiveSheet()->getStyle($i . '3')->applyFromArray($style_header);
		}
		// last row style    		
		for ($i = 'A'; $i <=  $excel->getActiveSheet()->getHighestColumn(); $i++) {
			$excel->getActiveSheet()->getStyle($i . $last_row)->applyFromArray($style_td_bold);
		}
		//auto column width
		for ($i = 'A'; $i <=  $excel->getActiveSheet()->getHighestColumn(); $i++) {
			$excel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
		}

		$objWriter = IOFactory::createWriter($excel, "Xlsx");
		$objWriter->save('./uploads/excel/' . $fileName);
		// download file
		header("Content-Type: application/vnd.ms-excel");
		redirect('./uploads/excel/' . $fileName);
	}
} //class
