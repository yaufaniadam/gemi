<?php
	class Unitkerja_model extends CI_Model{

		public function add_unit($data){
			$this->db->insert('ci_unit_kerja', $data);
			return true;
		}
		
		//---------------------------------------------------
		// get all unit records
		public function get_unitkerja_byuserid($id) 
		{
			$penempatan = $this->db->query('SELECT p.*, uk.kode, uk.nama_unit, k.kantor FROM ci_penempatan p     
			LEFT JOIN ci_unit_kerja uk ON uk.id = p.id_unit
			LEFT JOIN ci_kantor k ON k.id = p.id_kantor    
			WHERE user_id=' . $id . ' AND CURRENT_DATE BETWEEN awal_penempatan AND akhir_penempatan         
			');

			return $penempatan->row_array();
		}

		
		//---------------------------------------------------
		// Count total unit for pagination
		public function count_all_unit(){
			return $this->db->count_all('ci_unit_kerja');
		}

		

		//---------------------------------------------------
		// Get unit detial by ID
		public function get_unit_by_id($id){
			$query = $this->db->get_where('ci_unit_kerja', array('id' => $id));
			return $result = $query->row_array();
		}

		
		//---------------------------------------------------
		// Edit unit Record
		public function edit_unit($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_unit_kerja', $data);
			return true;
		}

		//---------------------------------------------------
		// Get unit detial by userID
		public function get_unit_by_userid($user_id){
			//$this->db->select('prodi');
			$query = $this->db->get_where('ci_users', array('id' => $user_id));	
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// get all unit records
		public function get_all_kantor(){
			$query = $this->db->get('ci_kantor');		
			return $result = $query->result_array();
		}


		public function add_kantor($data){
			$this->db->insert('ci_kantor', $data);
			return true;
		}

		// Edit unit Record
		public function edit_kantor($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_kantor', $data);
			return true;
		}

		// Get unit detial by ID
		public function get_kantor_by_id($id){
			//$this->db->select('prodi');
			$query = $this->db->get_where('ci_kantor', array('id' => $id));	
			return $result = $query->row_array();
		}

		public function add_hrd($data) {
			$this->db->insert('ci_hrd', $data);
			return true;
		}
		public function add_teller($data) {
			$this->db->insert('ci_teller', $data);
			return true;
		}
		public function add_akunting($data) {
			$this->db->insert('ci_akunting', $data);
			return true;
		}
		public function add_cs($data) {
			$this->db->insert('ci_cs', $data);
			return true;
		}
		public function add_pembiayaan($data) {
			$this->db->insert('ci_pembiayaan', $data);
			return true;
		}
		public function add_surveyor($data) {
			$this->db->insert('ci_surveyor', $data);
			return true;
		}
		public function add_marketing($data) {
			$this->db->insert('ci_marketing', $data);
			return true;
		}
		public function add_manager($data) {
			$this->db->insert('ci_manager', $data);
			return true;
		}

		public function add_auditor($data) {
			$this->db->insert('ci_auditor', $data);
			return true;
		}
		public function add_digimark($data) {
			$this->db->insert('ci_digimark', $data);
			return true;
		}
		
		

		public function get_unit_by_kantor($kantor,$unit, $sub_maqasid) {

			$unit_kerja = get_kode_unit_kerja_by_id($unit);
				
			$query = $this->db->get_where('ci_'.$unit_kerja, array('id_kantor' => $kantor,'sub_maqasid'=>$sub_maqasid));	
			return $result = $query->result_array();
			
		}

	}

?>