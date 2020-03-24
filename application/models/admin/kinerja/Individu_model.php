<?php
	class Individu_model extends CI_Model{

		public function add_individu_din($data){
			
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_din', array('user_id' => $id));

			$this->db->insert('ci_individu_din', $data);
			

			return true;		
		}

		public function get_individu_din(){
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_din', array('user_id' => $id));
			return $result = $query->row_array();
		}
		

		public function add_individu_nafs($data){
			
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_nafs', array('user_id' => $id));
			
			
			$this->db->insert('ci_individu_nafs', $data);
			

			return true;		
		}

		public function get_individu_nafs(){
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_nafs', array('user_id' => $id));
			return $result = $query->row_array();
		}

		public function add_individu_aql($data){
			
			$id = $this->session->userdata('user_id');
			
		
			$this->db->insert('ci_individu_aql', $data);
		

			return true;		
		}

		public function get_individu_aql(){
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_aql', array('user_id' => $id));
			return $result = $query->row_array();
		}

		public function add_individu_nasl($data){
			
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_nasl', array('user_id' => $id));
			$this->db->insert('ci_individu_nasl', $data);
			

			return true;		
		}

		public function get_kinerja_individu_nasl(){
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_nasl', array('user_id' => $id));
			return $result = $query->result_array();
		}

		public function add_individu_mal($data){
			
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_mal', array('user_id' => $id));
			
			$this->db->insert('ci_individu_mal', $data);
		

			return true;		
		}

		public function get_individu_mal(){
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_mal', array('user_id' => $id));
			return $result = $query->row_array();
		}

		//get data untuk keperluan ditampilkan pada halaman profil

		public function get_kinerja_individu($kategori, $tahun, $id){			
			
			

			$this->db->select('*, MONTHNAME(STR_TO_DATE(periode_bln,"%m")) as bulan');
			$this->db->from('ci_individu_'.$kategori);
			$this->db->where('user_id', $id);
			$this->db->where('periode_thn', $tahun);
			
			$this->db->order_by('periode_bln', 'ASC');
			//$this->db->order_by('id', 'ASC');
			$query = $this->db->get();

			return $result = $query->result_array();
		}

		public function get_kinerja_individu_tahun($kategori){	

			$id = $this->session->userdata('user_id');

			$this->db->select('periode_thn');
			$this->db->from('ci_individu_'.$kategori);
			$this->db->where('user_id', $id);
			
			$this->db->order_by('periode_thn', 'ASC');
			$this->db->group_by('periode_thn');
			
			$query = $this->db->get();

			return $result = $query->result_array();
		}
		

		public function get_kinerja_individu_aql($jenis){
			$id = $this->session->userdata('user_id');	

			if(($jenis == 'pengajian') || ($jenis == 'pelatihan')) {	

				$this->db->select('id, nama_kegiatan, jenis_kegiatan, tanggal, tempat, pembicara');
				$this->db->from('ci_individu_aql');
				$this->db->where('user_id', $id);
				
				$this->db->order_by('id', 'ASC');
				

				if ($jenis == 'pengajian') {
					$this->db->where('jenis_kegiatan', 'Pengajian');
				} else {
					$this->db->where('jenis_kegiatan', 'Pelatihan');
				}

				$query = $this->db->get();
				return $result = $query->result_array();

			} 

			if($jenis == 'usulan') {

				$this->db->select('id, tanggal,inovasi_kepada_bmt, status');
				$this->db->from('ci_individu_aql');
				$this->db->where('user_id', $id);
				$this->db->where('jenis_kegiatan', '');
				$this->db->order_by('id', 'ASC');

				$query = $this->db->get();
				return $result = $query->result_array();

			}

		
			
		}
		public function get_individu_aql_grafik($id=0){			
			$query = $this->db->get_where('ci_individu_aql', array('user_id' => $id));
			return $result = $query->row_array();
		}
		public function get_individu_nafs_grafik($id=0){			
			$query = $this->db->get_where('ci_individu_nafs', array('user_id' => $id));
			return $result = $query->row_array();
		}

		public function get_individu_din_grafik($id=0){			
			$query = $this->db->get_where('ci_individu_din', array('user_id' => $id));
			return $result = $query->row_array();
		}

		public function get_individu_mal_grafik($id=0){			
			$query = $this->db->get_where('ci_individu_mal', array('user_id' => $id));
			return $result = $query->row_array();
		}

		public function get_individu_nasb_grafik($id=0){			
			$query = $this->db->get_where('ci_individu_nasl', array('user_id' => $id));
			return $result = $query->row_array();
		}

		public function add_raport($data){			

			$this->db->insert('ci_raport', $data);
			return "raport";
		}
	}

?>