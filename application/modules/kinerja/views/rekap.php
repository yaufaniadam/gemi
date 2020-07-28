<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body with-border">
                <div class="col-md-4">
                    <h4><i class="fa fa-user"></i> &nbsp; Rekap Kinerja Individu (<?= konversiBulanAngkaKeNama($bln); ?> <?= $thn; ?>)</h4>
                </div>
                <div class="col-md-8">
                    <?php if ($kat !== "aql") { ?>
                        <div class="row">
                            <div class="col-md-9 text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary disabled">Tahun : </button>
                                    <?php
                                    foreach ($years as $year) { ?>
                                        <a class="btn btn-warning" href="<?= base_url('kinerja/individu/rekap/' . $kat . '/' .  $year['periode_thn'] . '/' .  $bln); ?>"><?= $year['periode_thn']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="periode_bln">
                                    <option value="">Pilih bulan</option>
                                    <?php
                                    foreach ($months as $month) { ?>
                                        <option value="<?= base_url('kinerja/individu/rekap/' . $kat . '/' . $thn . '/' . $month['periode_bln']); ?>" <?= ($month['periode_bln'] == $bln) ? 'selected' : '' ?>><?= konversiBulanAngkaKeNama($month['periode_bln']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border" style="padding: 5px 15px">
                    <h4 style="display:inline-block; width:50%">
                        <?php
                        switch ($kat) {

                            case 'mal':
                                echo "Hifdz Al Maal (Pemeliharaan Harta)";
                                break;
                            case 'nafs':
                                echo "Hifdz An-Nafs (Pemeliharaan Jiwa)";
                                break;
                            case 'nasl':
                                echo "Hifdz An Nasl (Pemeliharaan Keturunan)";
                                break;
                            case 'aql':
                                echo "Hifdz Al Aql (Pemeliharaan Pikiran)";
                                break;
                            default:
                                echo "Hifdz Ad-Din (Pemeliharaan Agama)";
                                break;
                        }
                        ?>

                    </h4>

                    <a style="margin-top:3px;" class="btn btn-success pull-right" href="<?= base_url('kinerja/individu/rekap_excel/' . $kat . '/' . $thn . '/' . $bln); ?>"><i class="fa fa-file-excel-o"></i> Export ke Excel</a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body smy-form-body">

                    <?php
                    if ($kat == 'din') {
                    ?>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th width="200">Nama Staf</th>
                                <th>Frekuensi melaksanakan<br> shalat wajib
                                    berjamaah di awal
                                    waktu</th>
                                <th>Frekuensi<br> shalat berjamaah di
                                    masjid</th>
                                <th>Jumlah<br> halaman tilawah qur’an</th>
                                <th>Frekuensi<br> shalat tahajjud</th>
                                <th>Puasa<br> sunnah Senin Kamis</th>
                                <th>Shalat dhuha<br> sebelum beraktivitas</th>

                            </tr>
                            <?php
                            if (count($kinerja) > 0) {
                                foreach ($kinerja as $kinerja) {
                                    echo "<tr>";
                                    echo "<td>";

                                    echo ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username'];

                                    echo "</td>";
                                    echo "<td>" . $kinerja['sholat_awal_waktu'] . "</td>";
                                    echo "<td>" . $kinerja['jamaah_masjid'] . "</td>";
                                    echo "<td>" . $kinerja['tilawah_quran'] . "</td>";
                                    echo "<td>" . $kinerja['tahajjud'] . "</td>";
                                    echo "<td>" . $kinerja['puasa_sunnah'] . "</td>";
                                    echo "<td>" . $kinerja['dhuha'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {

                                echo "<tr>
                                    <td colspan='7'>
                                        <p class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Belum ada data atau pilih Bulan terlebih dahulu</p>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </table>



                    <?php } elseif ($kat == 'mal') { ?>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th width="200">Nama Staf</th>
                                <th>Jumlah Tabungan Pendidikan Anak</th>
                                <th>Jumlah Hutang jika ada</th>
                                <th>Lembaga tempat berhutang</th>
                            </tr>
                            <?php
                            if (count($kinerja) > 0) {
                                foreach ($kinerja as $kinerja) {
                                    echo "<tr>";
                                    echo "<td>";

                                    echo ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username'];

                                    echo "</td>";
                                    echo "<td>Rp<span style='float:right;display:inline-block'>" . number_format($kinerja['saving']) . "</span></td>";
                                    echo "<td>Rp<span style='float:right;display:inline-block'>" . number_format($kinerja['hutang']) . "</span></td>";
                                    echo "<td>" . $kinerja['tempat_hutang'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {

                                echo "<tr>
                                    <td colspan='7'>
                                        <p class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Belum ada data atau pilih Bulan terlebih dahulu</p>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </table>

                    <?php } elseif ($kat == 'nafs') { ?>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th width="200">Nama Staf</th>
                                <th>Olah Raga (kali/bln)</th>
                                <th>Tepat Waktu (kali/bln)</th>
                            </tr>
                            <?php
                            if (count($kinerja) > 0) {
                                foreach ($kinerja as $kinerja) {
                                    echo "<tr>";
                                    echo "<td>";

                                    echo ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username'];

                                    echo "</td>";
                                    echo "<td>" . $kinerja['olah_raga'] . "</td>";
                                    echo "<td>" . $kinerja['tepat_waktu'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {

                                echo "<tr>
                                        <td colspan='7'>
                                            <p class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Belum ada data atau pilih Bulan terlebih dahulu</p>
                                        </td>
                                    </tr>";
                            }
                            ?>
                        </table>
                    <?php } elseif ($kat == 'nasl') { ?>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th width="200">Nama Staf</th>
                                <th>Jumlah hari anggota keluarga<br> yang sakit dalam sebulan dan sembuh</th>
                                <th>Partisipasi keluarga besar di kegiatan BMT</th>
                            </tr>
                            <?php
                            if (count($kinerja) > 0) {
                                foreach ($kinerja as $kinerja) {
                                    echo "<tr>";
                                    echo "<td>";

                                    echo ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username'];

                                    echo "</td>";
                                    echo "<td>" . $kinerja['kesehatan_keluarga'] . "</td>";
                                    echo "<td>" . $kinerja['partisipasi_keluarga'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {

                                echo "<tr>
                                <td colspan='7'>
                                    <p class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Belum ada data atau pilih Bulan terlebih dahulu</p>
                                </td>
                            </tr>";
                            }
                            ?>
                        </table>
                    <?php } elseif ($kat == 'aql') { ?>

                        <table id="aql" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="200">Nama Staf</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Pembicara</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Tempat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($kinerja) > 0) {
                                    foreach ($kinerja as $kinerja) {
                                        echo "<tr>";
                                        echo "<td>";

                                        echo ($kinerja['username']) ? $kinerja['firstname'] : $kinerja['username'];

                                        echo "</td>";
                                        echo "<td>" . $kinerja['nama_kegiatan'] . "</td>";
                                        echo "<td>" . $kinerja['pembicara'] . "</td>";
                                        echo "<td>" . $kinerja['jenis_kegiatan'] . "</td>";
                                        echo "<td>" . $kinerja['tanggal'] . "</td>";
                                        echo "<td>" . $kinerja['tempat'] . "</td>";

                                        echo "</tr>";
                                    }
                                } else {

                                    echo "<tr>
                                <td colspan='7'>
                                    <p class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Belum ada data atau pilih Bulan terlebih dahulu</p>
                                </td>
                            </tr>";
                                }
                                ?>
                            </tbody>
                        </table>



                    <?php }    ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div><!-- /.col  -->
    </div><!-- /.row  -->

</section>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    //datatable
    var table = $("#aql").DataTable({
        order: [
            [1, "asc"]
        ],
        language: {
            searchPlaceholder: "Cari data"
        }
    });
</script>

<script>
    $(function() {
        // bind change event to select
        $('#periode_bln').on('change', function() {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url // redirect
            }
            return false;
        });
    });
</script>
<script>
    $("#rekap").addClass('active');
    $("#rekap .<?= $kat; ?>").addClass('active');
</script>