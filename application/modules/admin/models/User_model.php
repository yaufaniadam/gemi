<?php
class User_model extends CI_Model
{

	public function add_user($data)
	{
		$this->db->insert('ci_users', $data);
		return true;
	}

	//---------------------------------------------------
	// get all users for server-side datatable processing (ajax based)
	public function get_all_users()
	{
		$this->db->where('is_admin', 0);
		$query = $this->db->get('ci_users');
		return $query->result_array();
	}

	//---------------------------------------------------
	// get all users for server-side datatable processing (ajax based)
	public function get_penempatan_by_userid($user_id)
	{

		$this->db->select('ci_penempatan.*,ci_unit_kerja.nama_unit,ci_kantor.kantor,ci_ket_penempatan.keterangan');
		$this->db->from('ci_penempatan');
		$this->db->where('user_id', $user_id);
		$this->db->join('ci_unit_kerja', 'ci_unit_kerja.id = ci_penempatan.id_unit ', 'left');
		$this->db->join('ci_kantor', 'ci_kantor.id = ci_penempatan.id_kantor ', 'left');
		$this->db->join('ci_ket_penempatan', 'ci_ket_penempatan.id = ci_penempatan.keterangan ', 'left');

		$query = $this->db->get();
		return $result = $query->result_array();
	}

	//---------------------------------------------------
	// get all user records
	public function get_all_simple_users()
	{
		$this->db->where('is_admin', 0);
		$query = $this->db->get('ci_users');
		return $result = $query->result_array();
	}

	//---------------------------------------------------
	// get all user records
	public function get_ket_penempatan()
	{
		$query = $this->db->get('ci_ket_penempatan');
		return $result = $query->result_array();
	}

	//---------------------------------------------------
	// Count total user for pagination
	public function count_all_users()
	{
		return $this->db->count_all('ci_users');
	}

	//---------------------------------------------------
	// Get all users for pagination
	public function get_all_users_for_pagination($limit, $offset)
	{
		$wh = array();
		$this->db->order_by('created_at', 'desc');
		$this->db->limit($limit, $offset);

		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			$query = $this->db->get_where('ci_users', $WHERE);
		} else {
			$query = $this->db->get('ci_users');
		}
		return $query->result_array();
		//echo $this->db->last_query();
	}

	//--------------------------------------------------------------------
	public function detail()
	{
		$id = $this->session->userdata('user_id');
		$query = $this->db->get_where('ci_users', array('id' => $id));
		return $result = $query->row_array();
	}


	//---------------------------------------------------
	// get all users for server-side datatable with advanced search
	public function get_all_users_by_advance_search()
	{
		$wh = array();
		$SQL = 'SELECT * FROM ci_users';
		if ($this->session->userdata('user_search_type') != '')
			$wh[] = "is_active = '" . $this->session->userdata('user_search_type') . "'";
		if ($this->session->userdata('user_search_from') != '')
			$wh[] = " `created_at` >= '" . date('Y-m-d', strtotime($this->session->userdata('user_search_from'))) . "'";
		if ($this->session->userdata('user_search_to') != '')
			$wh[] = " `created_at` <= '" . date('Y-m-d', strtotime($this->session->userdata('user_search_to'))) . "'";

		$wh[] = " is_admin = 0";
		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE);
		} else {
			return $this->datatable->LoadJson($SQL);
		}
	}

	//--------------------------------------------------------------------
	public function get_user_detail()
	{
		$id = $this->session->userdata('user_id');
		$query = $this->db->get_where('ci_users', array('id' => $id));
		return $result = $query->row_array();
	}
	//---------------------------------------------------
	// Get user detial by ID
	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('ci_users', array('id' => $id));
		return $result = $query->row_array();
	}

	public function update_user($data)
	{
		$id = $this->session->userdata('user_id');
		$this->db->where('id', $id);
		$this->db->update('ci_users', $data);
		return true;
	}

	//---------------------------------------------------
	// Edit user Record
	public function edit_user($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('ci_users', $data);
		return true;
	}

	//---------------------------------------------------
	// Get User Role/Group
	public function get_user_groups()
	{
		$query = $this->db->get('ci_user_groups');
		return $result = $query->result_array();
	}

	public function penempatan($data)
	{
		$this->db->insert('ci_penempatan', $data);
		return true;
	}

	// Edit user Record
	public function edit_penempatan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('ci_penempatan', $data);
		return true;
	}

	// get all penempatan by user id
	public function get_penempatan($id)
	{
		$query = $this->db->get_where('ci_penempatan', array('user_id' => $id));
		return $result = $query->row_array();
	}

	// get all penempatan by id
	public function get_penempatan_byid($id)
	{
		$query = $this->db->get_where('ci_penempatan', array('id' => $id));
		return $result = $query->row_array();
	}

	// get all user records
	public function get_all_penempatan()
	{
		$query = $this->db->get('ci_penempatan');
		return $result = $query->result_array();
	}

	// get all user records
	public function get_penempatan_by_kantor($id)
	{
		$this->db->where('id_kantor', $id);
		$query = $this->db->get('ci_penempatan');
		return $result = $query->result_array();
	}

	/* keluarga */
	public function get_data_keluarga($id)
	{

		$this->db->order_by('status_keluarga', 'DESC');
		$this->db->order_by('anak_ke', 'ASC');
		$query = $this->db->get_where('ci_individu_keluarga', array('user_id' => $id));

		return $query->result_array();
	}

	public function get_anak()
	{
		$id = $this->session->userdata('user_id');

		$this->db->order_by('anak_ke', 'ASC');
		$query = $this->db->get_where('ci_individu_keluarga', array('user_id' => $id, 'status_keluarga' => 'anak'));

		return $result = $query->result_array();
	}

	public function tambah_keluarga($data)
	{

		$this->db->insert('ci_individu_keluarga', $data);
		return true;
	}

	public function edit_keluarga($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('ci_individu_keluarga', $data);
		return true;
	}

	//untuk table data keluarga pada menu Staff>Semua Staff>detail Staf
	public function get_detail_keluarga($id)
	{
		$query = $this->db->get_where('ci_individu_keluarga', array('user_id' => $id));
		return $result = $query->row_array();
	}

	public function get_detail_keluarga_individu($id)
	{

		$query = $this->db->get_where('ci_individu_keluarga', array('id' => $id));
		return $result = $query->row_array();
	}


	public function get_riwayat_pendidikan($id)
	{
		$query = $this->db->get_where('ci_riwayat_pendidikan', array('user_id' => $id));
		return $result = $query->result_array();
	}

	public function get_riwayat_pendidikan_byid($id)
	{
		$query = $this->db->get_where('ci_riwayat_pendidikan', array('id' => $id));
		return $result = $query->row_array();
	}

	public function tambah_riwayat_pendidikan($data)
	{
		$this->db->insert('ci_riwayat_pendidikan', $data);
		return true;
	}

	public function edit_riwayat_pendidikan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('ci_riwayat_pendidikan', $data);
		return true;
	}

	public function get_sertifikat_penghargaan($id)
	{
		$query = $this->db->get_where('ci_sertifikat_penghargaan', array('user_id' => $id));
		return $result = $query->result_array();
	}

	public function get_sertifikat_penghargaan_byid($id)
	{
		$query = $this->db->get_where('ci_sertifikat_penghargaan', array('id' => $id));
		return $result = $query->row_array();
	}

	public function tambah_sertifikat_penghargaan($data)
	{
		$this->db->insert('ci_sertifikat_penghargaan', $data);
		return true;
	}

	public function edit_sertifikat_penghargaan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('ci_sertifikat_penghargaan', $data);
		return true;
	}

	public function get_minat_by_userid($id)
	{
		$query = $this->db->get_where('ci_minat', array('user_id' => $id));
		return $result = $query->row_array();
	}
	public function get_kategori_minat()
	{
		$query = $this->db->query('
			SELECT km.id, km.kategori_minat
			FROM ci_kategori_minat km
				JOIN  ci_sub_kategori_minat skm
					ON km.id = skm.id_kategori_minat				
			GROUP BY km.kategori_minat');

		return $result = $query->result_array();
	}

	public function tambah_minat($data)
	{
		$this->db->insert('ci_minat', $data);
		return true;
	}
	public function edit_minat($data, $id)
	{
		$this->db->where('user_id', $id);
		$this->db->update('ci_minat', $data);
		return true;
	}
	public function get_notes_by_userid($user_id)
	{
		$this->db->select('ci_user_notes.*,ci_users.firstname as user_management, ci_users.photo');
		$this->db->from('ci_user_notes');
		$this->db->where('user_id', $user_id);
		$this->db->join('ci_users', 'ci_user_notes.user_id_mgmt = ci_users.id ', 'left');

		$query = $this->db->get();
		return $result = $query->result_array();
	}

	public function tambah_notes($data)
	{
		$this->db->insert('ci_user_notes', $data);
		return true;
	}

	public function import_users($data_user)
	{

		foreach ($data_user as $user) {

			$data = [
				'username' => $user['username'],
				'email' => $user['email'],
				'role' => $user['role'],
				'password' => $user['password'],
				'firstname' => $user['firstname'],
				'created_at' => $user['created_at'],
			];

			$this->db->insert('ci_users', $data);

			$detail_user = [
				'id_kantor' => $user['kantor'],
				'id_unit' => $user['unit'],
				'awal_penempatan' => $user['awal'],
				'akhir_penempatan' => $user['akhir'],
				'keterangan' => 1,
				'no_sk_penempatan' => 1,
				'user_id' =>  $this->db->insert_id(),
			];
			$this->db->insert('ci_penempatan', $detail_user);
		}

		//$this->db->insert_batch('ci_users', $data);
	}
}
