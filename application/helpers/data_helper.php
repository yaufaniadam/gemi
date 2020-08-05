<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// -----------------------------------------------------------------------------
function getGroupyName($id)
{

    $CI = &get_instance();
    return $CI->db->get_where('ci_user_groups', array('id' => $id))->row_array()['group_name'];
}

// -----------------------------------------------------------------------------
function getUnitbyId($id)
{

    $CI = &get_instance();
    return $CI->db->get_where('ci_unit_kerja', array('id' => $id))->row_array()['nama_unit'];
}

// -----------------------------------------------------------------------------
function getUserbyId($id)
{

    $CI = &get_instance();
    return $CI->db->get_where('ci_users', array('id' => $id))->row_array()['firstname'];
}
function getUserPhoto($id)
{

    $CI = &get_instance();
    return $CI->db->get_where('ci_users', array('id' => $id))->row_array()['photo'];
}

function is_admin()
{
    $CI = &get_instance();
    $admin = $CI->session->userdata('is_admin', 1);
    return $admin;
}

//mengambil upload by kriteria by prodi
function getUploadByKriteria($id, $kriteria)
{
    $CI = &get_instance();
    $upload = $CI->db->get('ci_borang');;
    return $upload->result();
}

function get_unit_kerja()
{
    $CI = &get_instance();

    $unit = $CI->db->where('kode =', 'b');
    $unit = $CI->db->get('ci_unit_kerja');;
    return $unit->result_array();
}

function get_unit_kerja_by_kantor($id)
{
    $CI = &get_instance();

    $query = $CI->db->query('SELECT id_unit FROM ci_kantor where id=' . $id);
    $row = $query->row();
    return $row->id_unit;
}

function get_unit_by_id($id)
{
    $CI = &get_instance();
    $query = $CI->db->query('SELECT id_unit FROM ci_penempatan where user_id=' . $id);
    $row = $query->row();
    return $row->id_unit;
}
function get_unit_kerja_by_id($id)
{
    $CI = &get_instance();
    $query = $CI->db->query('SELECT nama_unit FROM ci_unit_kerja where id=' . $id);
    $row = $query->row();
    return $row->nama_unit;
}

function get_kode_unit_kerja_by_id($id)
{
    $CI = &get_instance();
    $query = $CI->db->query('SELECT kode FROM ci_unit_kerja where id=' . $id);
    $row = $query->row();
    return $row->kode;
}

function get_kantor()
{
    $CI = &get_instance();
    $unit = $CI->db->get('ci_kantor');;
    return $unit->result_array();
}

function get_kantor_by_id($id)
{
    $CI = &get_instance();
    $query = $CI->db->query('SELECT kantor FROM ci_kantor where id=' . $id);
    $row = $query->row();
    return $row->kantor;
}

function get_stafname_by_id($id)
{
    $CI = &get_instance();
    $query = $CI->db->query('SELECT firstname FROM ci_users where id=' . $id);
    $row = $query->row();
    return $row->firstname;
}

function get_kantor_by_user()
{

    $CI = &get_instance();
    return  $id = $CI->session->userdata('user_id');

    // $penempatan = $CI->db->query('SELECT p.*, uk.nama_unit, k.kantor FROM ci_penempatan p     
    // LEFT JOIN ci_unit_kerja uk ON uk.id = p.id_unit
    // LEFT JOIN ci_kantor k ON k.id = p.id_kantor    
    // WHERE user_id=' . $id . ' AND CURRENT_DATE BETWEEN awal_penempatan AND akhir_penempatan         
    // ');

    // $row = $penempatan->row_array();


    // if ($row > 0) {
    //     return $row;
    // } else {
    //     return $id;
    // }
}

function get_raport($id = 0)
{
    $CI = &get_instance();
    $query = $CI->db->get_where('ci_raport', array('id_keluarga' => $id));
    return $result = $query->row_array();
}

function get_kinerja($kategori, $hal)
{
    $CI = &get_instance();

    $id = $CI->session->userdata('user_id');

    $query = $CI->db->query('SELECT * FROM ci_individu_din where user_id=' . $id);
    return $result = $query->result_array();
}

function get_pendidikan($id)
{
    $CI = &get_instance();
    $CI->db->order_by('tahun', 'ASC');
    $query = $CI->db->query('SELECT * FROM ci_raport where id_keluarga=' . $id);
    return $result = $query->result_array();
}

function konversiBulanAngkaKeNama($tanggal)
{

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    return  $bulan[$tanggal];
}

function konversiBulanAngkaKeNama_short($tanggal)
{

    $bulan = array(
        1 =>   'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agu',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    );

    return  $bulan[$tanggal];
}
function option_bulan()
{
    $month = date('n'); ?>
    <select name="periode_bln" class="form-control" id="periode_bln">
        <option value="1" <?= ($month == 1) ? 'Selected = "selected"' : ''; ?>>Januari</option>
        <option value="2" <?= ($month == 2) ? 'Selected = "selected"' : ''; ?>>Februari</option>
        <option value="3" <?= ($month == 3) ? 'Selected = "selected"' : ''; ?>>Maret</option>
        <option value="4" <?= ($month == 4) ? 'Selected = "selected"' : ''; ?>>April</option>
        <option value="5" <?= ($month == 5) ? 'Selected = "selected"' : ''; ?>>Mei</option>
        <option value="6" <?= ($month == 6) ? 'Selected = "selected"' : ''; ?>>Juni</option>
        <option value="7" <?= ($month == 7) ? 'Selected = "selected"' : ''; ?>>Juli</option>
        <option value="8" <?= ($month == 8) ? 'Selected = "selected"' : ''; ?>>Agustus</option>
        <option value="9" <?= ($month == 9) ? 'Selected = "selected"' : ''; ?>>September</option>
        <option value="10" <?= ($month == 10) ? 'Selected = "selected"' : ''; ?>>Oktober</option>
        <option value="11" <?= ($month == 11) ? 'Selected = "selected"' : ''; ?>>November</option>
        <option value="12" <?= ($month == 12) ? 'Selected = "selected"' : ''; ?>>Desember</option>
    </select>

<?php }

function option_tahun()
{
    $year = date('Y');
    $i = 2020; ?>
    <select name="periode_thn" class="form-control" id="periode_thn">
        <option>Pilih tahun</option>
        <?php while ($i <= 2025) {
            $selected = ($year == $i) ? 'Selected = "selected"' : '';
            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
            $i++;
        }  ?>
    </select>

<?php }

function get_sub_kategori_minat($kat_id)
{
    $CI = &get_instance();
    $query = $CI->db->query('SELECT * FROM ci_sub_kategori_minat where id_kategori_minat=' . $kat_id);
    return $result = $query->result_array();
}

function indonesian_date($timestamp = '', $date_format = 'j F Y', $suffix = 'WIB')
{
    if (trim($timestamp) == '') {
        $timestamp = time();
    } elseif (!ctype_digit($timestamp)) {
        $timestamp = strtotime($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace("/S/", "", $date_format);
    $pattern = array(
        '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
        '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
        '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
        '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
        '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
        '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
        '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
        '/November/', '/December/',
    );
    $replace = array(
        'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
        'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
        'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'Sepember',
        'Oktober', 'November', 'Desember',
    );
    $date = date($date_format, $timestamp);
    $date = preg_replace($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
}

?>