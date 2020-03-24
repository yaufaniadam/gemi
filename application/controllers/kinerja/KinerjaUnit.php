<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class KinerjaUnit extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('kinerja/individu_model', 'individu_model');
			$this->load->model('admin/profile_model', 'profile_model');
		}

		public function index(){
			
			$data['view'] = 'din';
			$this->load->view('admin/layout', $data);

		}

		public function add_hrd($unit=0,$kantor=0){
			
			
			if($this->input->post('submit')){

				$data['view'] = 'unit/detail_unit';
				$this->load->view('admin/layout', $data);

			} 
		
					
		}
		
		public function nafs(){
			
			if($this->input->post('submit')){

				$this->form_validation->set_rules('olah_raga', 'Frekuensi olah raga per bulan', 'trim|required');
				$this->form_validation->set_rules('tepat_waktu', 'Kehadiran kerja tepat waktu dalam 1 bulan', 'trim|required');					

				if ($this->form_validation->run() == FALSE) {
					$data['individu_nafs'] = $this->individu_model->get_individu_nafs();
					$data['view'] = 'kinerja/nafs';
					$this->load->view('admin/layout', $data);
				} else { 

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
					$data['individu_nafs'] = $this->individu_model->get_individu_nafs();
					$data['view'] = 'kinerja/nafs';
					$this->load->view('admin/layout', $data);
				}
					
		} //nafs

		public function aql(){
			
			if($this->input->post('submit')){

				$this->form_validation->set_rules('pelatihan', 'Jumlah Pelatihan yang diikuti', 'trim|required');
				$this->form_validation->set_rules('inovasi_kepada_bmt', 'Inovasi yang disampaikan kepada BMT', 'trim|required');
				$this->form_validation->set_rules('usulan_dipakai', 'Usulan Inovasi yang dipakai oleh BMT', 'trim|required');
				$this->form_validation->set_rules('kajian_rutin', 'Kajian rutin mingguan dalam sebulan', 'trim|required');				

				if ($this->form_validation->run() == FALSE) {
					$data['individu_aql'] = $this->individu_model->get_individu_aql();
					$data['view'] = 'kinerja/aql';
					$this->load->view('admin/layout', $data);
				} else{ 

						$data = array(
							'user_id'=> $this->session->userdata('user_id'),
							'periode_bln' => $this->input->post('periode_bln'),
							'periode_thn' => $this->input->post('periode_thn'),
							'pelatihan' => $this->input->post('pelatihan'),
							'inovasi_kepada_bmt' => $this->input->post('inovasi_kepada_bmt'),
							'usulan_dipakai' => $this->input->post('usulan_dipakai'),
							'kajian_rutin' => $this->input->post('kajian_rutin'),				
							'date' => date('Y-m-d : h:m:s'),					
						);

									
						$data = $this->security->xss_clean($data);
						$result = $this->individu_model->add_individu_aql($data);

						if($result){
							$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
							redirect(base_url('kinerja/individu/aql'));
						} 

					} 

				}

				else{
					$data['individu_aql'] = $this->individu_model->get_individu_aql();
					$data['view'] = 'kinerja/aql';
					$this->load->view('admin/layout', $data);
				}
					
		} //aql

		public function nasb(){
			
			if($this->input->post('submit')){


				$this->form_validation->set_rules('kesehatan_keluarga', 'Kesehatan anggota keluarga', 'trim|required');
	
				$this->form_validation->set_rules('partisipasi_keluarga', 'Partisipasi keluarga besar di kegiatan BMT ', 'trim|required');

				
	

				if ($this->form_validation->run() == FALSE) {
					$data['individu_nasb'] = $this->individu_model->get_individu_nasb();
					$data['anak'] = $this->profile_model->get_anak();
					$data['view'] = 'kinerja/nasb';
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
						$result = $this->individu_model->add_individu_nasb($data);

						if($result){
							$this->session->set_flashdata('msg', 'Kinerja telah ditambahkan!');
							redirect(base_url('kinerja/individu/nasb'));
						} 

					} 

				}

				else{
					$data['individu_nasb'] = $this->individu_model->get_individu_nasb();
					$data['raport'] = $this->individu_model->get_raport();
					$data['anak'] = $this->profile_model->get_anak();
					$data['view'] = 'kinerja/nasb';
					$this->load->view('admin/layout', $data);
				}
					
		} //nasb

		public function mal(){
			
			if($this->input->post('submit')){

				$this->form_validation->set_rules('saving', 'Frekuensi melaksanakan shalat wajib berjamaah di awal waktu', 'trim|required');
				$this->form_validation->set_rules('hutang', 'Frekuensi shalat berjamaah di masjid', 'trim|required');
	
				if ($this->form_validation->run() == FALSE) {
					$data['individu_mal'] = $this->individu_model->get_individu_mal();
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
					$data['individu_mal'] = $this->individu_model->get_individu_mal();
					$data['view'] = 'kinerja/mal';
					$this->load->view('admin/layout', $data);
				}
					
		} //mal

	} //class

