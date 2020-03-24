<?php
	class Kinerjaunit_model extends CI_Model{

	//hrd
		public function add_hrd($data){
			
			$id = $this->session->userdata('user_id');
			$query = $this->db->get_where('ci_individu_din', array('user_id' => $id));

			if($query->row_array()) {
				$this->db->update('ci_individu_din', $data);
			} else {
				$this->db->insert('ci_individu_din', $data);
			}

			return true;		
		}

		public function get_hrd($unit,$kantor){
			$query = $this->db->get_where('ci_hrd', array('id_unit' => $unit, 'id_kantor'=>$kantor));
			return $result = $query->row_array();
		}
		

	
	}

?>