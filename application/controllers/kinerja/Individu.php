<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Individu extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('kinerja/individu_model', 'individu_model');
			$this->load->model('admin/profile_model', 'profile_model');
			$this->load->model('admin/user_model', 'user_model');
		}

		public function index(){
			
			$data['view'] = 'din';
			$this->load->view('admin/layout', $data);

		}

		public function din(){
			
			if($this->input->post('submit')){


				$this->form_validation->set_rules('sholat_awal_waktu', 'Frekuensi melaksanakan shalat wajib berjamaah di awal waktu', 'trim|required');
				$this->form_validation->set_rules('jamaah_masjid', 'Frekuensi shalat berjamaah di masjid', 'trim|required');
				$this->form_validation->set_rules('tilawah_quran', 'Jumlah halaman tilawah qur’an', 'trim|required');
				$this->form_validation->set_rules('tahajjud', 'Frekuensi shalat tahajjud', 'trim|required');
				$this->form_validation->set_rules('puasa_sunnah', 'Puasa sunnah Senin Kamis', 'trim|required');
				$this->form_validation->set_rules('dhuha', 'Shalat dhuha sebelum beraktivitas', 'trim|required');
	

				if ($this->form_validation->run() == FALSE) {
					$data['individu_din'] = $this->individu_model->get_individu_din();
					$data['view'] = 'kinerja/din';
					$this->load->view('admin/layout', $data);
				}
				else{ 

						$data = array(
							'user_id'=> $this->session->userdata('user_id'),
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

						if($result){
							$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
							redirect(base_url('kinerja/individu/din'));
						} 

					} 

				}

				else{
					$data['individu_din'] = $this->individu_model->get_individu_din();
					$data['view'] = 'kinerja/din';
					$this->load->view('admin/layout', $data);
				}
					
		}

		public function detail( $kategori, $tahun=0, $id=0){

			 $tahun = ($tahun!='') ? $tahun : date('Y'); 

			 $id = ($id!='') ? $id : $this->session->userdata('user_id');

			$data['user'] = $this->user_model->get_user_by_id($id);
			$data['tahun'] = $this->individu_model->get_kinerja_individu_tahun($kategori);
	
			if(($kategori == 'din') || ($kategori == 'nafs')) {
				$data['result'] = $this->individu_model->get_kinerja_individu($kategori, $tahun, $id);
			}
			if($kategori == 'aql') {
				$data['pelatihan'] = $this->individu_model->get_kinerja_individu_aql('pelatihan');
				$data['pengajian'] = $this->individu_model->get_kinerja_individu_aql('pengajian');
				$data['usulan'] = $this->individu_model->get_kinerja_individu_aql('usulan');
			}
			
			if($kategori == 'nasl') {
				$data['data_keluarga'] = $this->profile_model->get_data_keluarga($id);
				$data['keluarga'] = $this->individu_model->get_kinerja_individu($kategori, $tahun, $id);	
			}

			if($kategori == 'mal') {			
				$data['result'] = $this->individu_model->get_kinerja_individu($kategori, $tahun, $id);	
			}

			
			$data['view'] = 'kinerja/view_' . $kategori;
			$this->load->view('admin/layout', $data);
					
		}
		
		
		public function nafs(){
			
			if($this->input->post('submit')){


				$this->form_validation->set_rules('olah_raga', 'Frekuensi olah raga per bulan', 'trim|required');
				$this->form_validation->set_rules('tepat_waktu', 'Kehadiran kerja tepat waktu dalam 1 bulan', 'trim|required');
					

				if ($this->form_validation->run() == FALSE) {
					$data['individu_nafs'] = $this->individu_model->get_individu_nafs();
					$data['view'] = 'kinerja/nafs';
					$this->load->view('admin/layout', $data);
				}
				else{ 

						$data = array(
							'user_id'=> $this->session->userdata('user_id'),
							'periode_bln' => $this->input->post('periode_bln'),
							'periode_thn' => $this->input->post('periode_thn'),
							'olah_raga' => $this->input->post('olah_raga'),
							'tepat_waktu' => $this->input->post('tepat_waktu'),
							'date' => date('Y-m-d : h:m:s'),					
						);

									
						$data = $this->security->xss_clean($data);
						$result = $this->individu_model->add_individu_nafs($data);

						if($result){
							$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
							redirect(base_url('kinerja/individu/nafs'));
						} 

					} 

				}

				else{
					//$data['individu_nafs'] = $this->individu_model->get_individu_nafs();
					$data['view'] = 'kinerja/nafs';
					$this->load->view('admin/layout', $data);
				}
					
		} //nafs

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

		public function nasl(){
			
			if($this->input->post('submit')){

				$this->form_validation->set_rules('kesehatan_keluarga', 'Kesehatan anggota keluarga', 'trim|required');	
				$this->form_validation->set_rules('partisipasi_keluarga', 'Partisipasi keluarga besar di kegiatan BMT ', 'trim|required');	

				if ($this->form_validation->run() == FALSE) {
					//$data['individu_nasb'] = $this->individu_model->get_individu_nasl();
					$data['anak'] = $this->profile_model->get_anak();
					$data['view'] = 'kinerja/nasl';
					$this->load->view('admin/layout', $data);
				}
				else{ 

						$data = array(
							'user_id'=> $this->session->userdata('user_id'),
							'periode_bln' => $this->input->post('periode_bln'),
							'periode_thn' => $this->input->post('periode_thn'),
							'kesehatan_keluarga' => $this->input->post('kesehatan_keluarga'),
							'partisipasi_keluarga' => $this->input->post('partisipasi_keluarga'),
							'date' => date('Y-m-d : h:m:s'),					
						);

									
						$data = $this->security->xss_clean($data);
						$result = $this->individu_model->add_individu_nasl($data);

						if($result){
							$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
							redirect(base_url('kinerja/individu/detail/nasl'));
						} 

					} 

				}

				else{
					//$data['individu_nasb'] = $this->individu_model->get_individu_nasl();
					$data['anak'] = $this->profile_model->get_anak();
					$data['view'] = 'kinerja/nasl';
					$this->load->view('admin/layout', $data);
				}
					
		} //nasl		

		public function mal(){
			
			if($this->input->post('submit')){

				$this->form_validation->set_rules('periode_bln', 'Bulan', 'trim|required');
				$this->form_validation->set_rules('periode_thn', 'Tahun', 'trim|required');
				$this->form_validation->set_rules('saving', 'Jumlah Tabungan', 'trim|required');
				$this->form_validation->set_rules('hutang', 'Jumlah hutang', 'trim|required');
				$this->form_validation->set_rules('tempat_hutang', 'Tempat berhutang', 'trim|required');
	
				if ($this->form_validation->run() == FALSE) {
				
					$data['view'] = 'kinerja/mal';
					$this->load->view('admin/layout', $data);
				}
				else{ 

						$data = array(
							'user_id'=> $this->session->userdata('user_id'),
							'periode_bln' => $this->input->post('periode_bln'),
							'periode_thn' => $this->input->post('periode_thn'),
							'saving' => $this->input->post('saving'),
							'hutang' => $this->input->post('hutang'),	
							'tempat_hutang' => $this->input->post('tempat_hutang'),						
							'date' => date('Y-m-d : h:m:s'),					
						);

									
						$data = $this->security->xss_clean($data);
						$result = $this->individu_model->add_individu_mal($data);

						if($result){
							$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
							redirect(base_url('kinerja/individu/mal'));
						} 

					} 

				}

				else{
					
					$data['view'] = 'kinerja/mal';
					$this->load->view('admin/layout', $data);
				}
					
		} //mal

		public function tambah_raport(){
			if($this->input->post('submit')){	
			

				$this->form_validation->set_rules('id_keluarga', 'Nama Anak', 'trim|required');
				$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
				$this->form_validation->set_rules('semester', 'Semester', 'trim|required');
				$this->form_validation->set_rules('kelas', 'Kelas/Semester', 'trim|required');
				$this->form_validation->set_rules('sekolah', 'Tempat Sekolah', 'trim|required');
	
				if ($this->form_validation->run() == FALSE) {

					$data['anak'] = $this->profile_model->get_anak();
					$data['view'] = 'kinerja/tambah_raport';
					$this->load->view('admin/layout', $data);
				}
				else{ 			

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
							'user_id'=> $this->session->userdata('user_id'),
							'id_keluarga'=>  $this->input->post('id_keluarga'),	
							'tahun'=>  $this->input->post('tahun'),	
							'semester'=>  $this->input->post('semester'),	
							'kelas'=>  $this->input->post('kelas'),	
							'sekolah'=>  $this->input->post('sekolah'),	
							'raport' => $upload_path.'/'.$raport['file_name'],		
						);
									
						$data = $this->security->xss_clean($data);
						$result = $this->individu_model->add_raport($data);

						if($result){
							$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
							redirect(base_url('kinerja/individu/detail/nasl#pendidikan-anak'));
						} 
					}			

			} else{
					//$data['individu_nasb'] = $this->individu_model->get_individu_nasl();
					$data['anak'] = $this->profile_model->get_anak();
					$data['view'] = 'kinerja/tambah_raport';
					$this->load->view('admin/layout', $data);

			} //submit


		
		} //tambah raport


		public function del_raport($id = 0){
			$this->db->delete('ci_raport', array('id' => $id));
			$this->session->set_flashdata('msg', 'Raport berhasil dihapus!');
			redirect(base_url('kinerja/individu/detail/nasl#pendidikan-anak'));
		}

		//hapus kegiatan pada individu din
		public function hapus_din($id = 0){
			$this->db->delete('ci_individu_din', array('id' => $id));
			$this->session->set_flashdata('msg', 'Data berhasil dihapus!');
			redirect(base_url('kinerja/individu/detail/din'));
		}

		//hapus kegiatan pada individu aql
		public function hapus_kegiatan($id = 0){
			$this->db->delete('ci_individu_aql', array('id' => $id));
			$this->session->set_flashdata('msg', 'Data berhasil dihapus!');
			redirect(base_url('kinerja/individu/detail/aql'));
		}

		//hapus kegiatan pada individu aql
		public function hapus_nafs($id = 0){
			$this->db->delete('ci_individu_nafs', array('id' => $id));
			$this->session->set_flashdata('msg', 'Data berhasil dihapus!');
			redirect(base_url('kinerja/individu/detail/nafs'));
		}

		//hapus kegiatan pada individu aql
		public function hapus_nasl($id = 0){
			$this->db->delete('ci_individu_nasl', array('id' => $id));
			$this->session->set_flashdata('msg', 'Data berhasil dihapus!');
			redirect(base_url('kinerja/individu/detail/nasl'));
		}

		public function hapus_mal($id = 0){
			$this->db->delete('ci_individu_mal', array('id' => $id));
			$this->session->set_flashdata('msg', 'Data berhasil dihapus!');
			redirect(base_url('kinerja/individu/detail/mal'));
		}

		

	} //class

