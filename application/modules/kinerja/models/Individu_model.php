<?php
class Individu_model extends CI_Model
{

	public function add_individu_din($data)
	{

		$id = $this->session->userdata('user_id');
		$this->db->get_where('ci_individu_din', array('user_id' => $id));


		return $this->db->insert('ci_individu_din', $data);
	}

	public function get_individu_din($id = 0, $tahun = 0)
	{
		$query = $this->db->query('select periode_bln as Bulan,id, 
			 	sholat_awal_waktu as "Frekuensi melaksanakan shalat wajib berjamaah di awal waktu (kali/bln)",
			 	jamaah_masjid as "Frekuensi shalat berjamaah di masjid (kali/bln)",
			 	tilawah_quran as "Jumlah halaman tilawah qur’an (lembar/bln)",
			 	tahajjud as "Frekuensi shalat tahajjud (kali/bln)",
			 	puasa_sunnah as "Puasa sunnah Senin Kamis (kali/bln)",
			 	dhuha as "Shalat dhuha sebelum beraktivitas (kali/bln)"
			 	from ci_individu_din where user_id=' . $id . ' and periode_thn=' . $tahun . ' order by periode_bln ASC');
		return $query->result_array();
	}

	public function get_individu_din_grafik($id = 0, $tahun = 0)
	{
		$query = $this->db->query('select 
			 	sholat_awal_waktu as "Frekuensi melaksanakan shalat wajib berjamaah di awal waktu (kali/bln)",
			 	jamaah_masjid as "Frekuensi shalat berjamaah di masjid (kali/bln)",
			 	tilawah_quran as "Jumlah halaman tilawah qur’an (lembar/bln)",
			 	tahajjud as "Frekuensi shalat tahajjud (kali/bln)",
			 	puasa_sunnah as "Puasa sunnah Senin Kamis (kali/bln)",
			 	dhuha as "Shalat dhuha sebelum beraktivitas (kali/bln)"
			 	from ci_individu_din where user_id=' . $id . ' and periode_thn=' . $tahun . ' order by periode_bln ASC');
		return $query->result_array();
	}

	public function get_individu_din_grafik_tahun($id)
	{
		$query = $this->db->query('select periode_thn from ci_individu_din where user_id=' . $id . ' group by periode_thn order by periode_thn  ASC ');
		return $result = $query->result_array();
	}

	public function add_individu_nafs($data)
	{

		$id = $this->session->userdata('user_id');
		$this->db->get_where('ci_individu_nafs', array('user_id' => $id));


		return 	$this->db->insert('ci_individu_nafs', $data);
	}

	public function get_individu_nafs($id = 0, $tahun = 0)
	{
		$query = $this->db->query('select periode_bln as Bulan, 
					olah_raga as "Olah Raga (kali/bln)",
					tepat_waktu as "Tepat Waktu (kali/bln)"
					
					from ci_individu_nafs where user_id=' . $id . ' and periode_thn=' . $tahun . ' order by periode_bln ASC');
		return $query->result_array();
	}
	public function get_individu_nafs_grafik($id = 0, $tahun = 0)
	{
		$query = $this->db->query('select olah_raga as "Olah Raga (kali/bln)",
					tepat_waktu as "Tepat Waktu (kali/bln)"
					
					from ci_individu_nafs where user_id=' . $id . ' and periode_thn=' . $tahun . ' order by periode_bln ASC');
		return $query->result_array();
	}

	public function get_individu_nafs_grafik_tahun($id)
	{
		$query = $this->db->query('select periode_thn from ci_individu_nafs where user_id=' . $id . ' group by periode_thn order by periode_thn  ASC ');
		return $result = $query->result_array();
	}


	public function add_individu_aql($data)
	{

		$this->db->insert('ci_individu_aql', $data);

		return true;
	}

	public function get_individu_aql($id = 0, $tahun = 0, $jenis_kegiatan)
	{
		$query = $this->db->query('select *			 
			 	from ci_individu_aql where user_id=' . $id . ' and YEAR(date)=' . $tahun . '  and jenis_kegiatan="' . $jenis_kegiatan . '" order by periode_bln ASC');
		return $query->result_array();
	}

	public function get_individu_aql_grafik_tahun($id)
	{
		$query = $this->db->query('select YEAR(date) as periode_thn from ci_individu_aql where user_id=' . $id . ' group by periode_thn order by periode_thn  ASC ');
		return $result = $query->result_array();
	}

	public function add_individu_nasl($data)
	{
		$id = $this->session->userdata('user_id');
		$query = $this->db->get_where('ci_individu_nasl', array('user_id' => $id));

		if ($query->row_array()) {
			$this->db->update('ci_individu_nasl', $data);
		} else {
			$this->db->insert('ci_individu_nasl', $data);
		}
		return true;
	}

	public function get_individu_nasl($id = 0, $tahun = 0)
	{
		$query = $this->db->query('select periode_bln as Bulan, 
					kesehatan_keluarga as "Jumlah hari anggota keluarga yang sakit dalam sebulan dan sembuh",
					partisipasi_keluarga as "Partisipasi keluarga besar di kegiatan BMT"					
					from ci_individu_nasl where user_id=' . $id . ' and periode_thn=' . $tahun . ' order by periode_bln ASC');
		return $query->result_array();
	}
	public function get_individu_nasl_grafik($id = 0, $tahun = 0)
	{
		$query = $this->db->query('select 
					kesehatan_keluarga as "Jumlah hari anggota keluarga yang sakit dalam sebulan dan sembuh",
					partisipasi_keluarga as "Partisipasi keluarga besar di kegiatan BMT"					
					from ci_individu_nasl where user_id=' . $id . ' and periode_thn=' . $tahun . ' order by periode_bln ASC');
		return $query->result_array();
	}

	public function get_individu_nasl_grafik_tahun($id)
	{
		$query = $this->db->query('select periode_thn from ci_individu_nasl where user_id=' . $id . ' group by periode_thn order by periode_thn  ASC ');
		return $result = $query->result_array();
	}


	public function add_individu_mal($data)
	{

		$id = $this->session->userdata('user_id');
		$query = $this->db->get_where('ci_individu_mal', array('user_id' => $id));

		if ($query->row_array()) {
			$this->db->update('ci_individu_mal', $data);
		} else {
			$this->db->insert('ci_individu_mal', $data);
		}

		return true;
	}

	public function get_individu_mal($id = 0, $tahun = 0)
	{
		$query = $this->db->query('select periode_bln as Bulan, 
					saving as "Jumlah Tabungan Pendidikan Anak",
					hutang as "Jumlah Hutang jika ada",	
					tempat_hutang as "Lembaga tempat berhutang"			
					from ci_individu_mal where user_id=' . $id . ' and periode_thn=' . $tahun . ' order by periode_bln ASC');
		return $query->result_array();
	}


	public function get_individu_mal_grafik_tahun($id)
	{
		$query = $this->db->query('select periode_thn from ci_individu_mal where user_id=' . $id . ' group by periode_thn order by periode_thn  ASC ');
		return $result = $query->result_array();
	}

	public function add_raport($data)
	{

		$this->db->insert('ci_raport', $data);
		return "raport";
	}
}
