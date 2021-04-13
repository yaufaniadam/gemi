<?php
$last = $this->uri->total_segments();
$sub_maqasid = $this->uri->segment($last);
$unit = $this->uri->segment($last - 1);
$kantors = $this->uri->segment($last - 2);
?>
<ul class="nav nav-tabs">
    <li role="presentation" <?php if ($sub_maqasid == 'dansos') {
                                echo 'class="active"';
                            } ?>><a href="<?php echo base_url("unitkerja/index/dansos"); ?>">
            <h4>Hifdz Al Maal</h4>
            <p>Program Dana Sosial</p>
        </a></li>

    <li role="presentation" <?php if ($sub_maqasid == 'wakaf') {
                                echo 'class="active"';
                            } ?>><a href="<?php echo base_url("unitkerja/index/wakaf"); ?>">
            <h4>Hifdz Al Maal</h4>
            <p>Wakaf</p>
        </a></li>

    <li role="presentation" <?php if ($sub_maqasid == 'penerimaan_dansos') {
                                echo 'class="active"';
                            } ?>><a href="<?php echo base_url("unitkerja/index/penerimaan_dansos"); ?>">
            <h4>Hifdz Al Maal</h4>
            <p>Penerimaan Dana Sosial</p>
        </a></li>

    <li role="presentation" <?php if ($sub_maqasid == 'pendampingan') {
                                echo 'class="active"';
                            } ?>><a href="<?php echo base_url("unitkerja/index/pendampingan"); ?>">
            <h4>Hifdz Al Aql</h4>
            <p>Pendampingan</p>
        </a></li>
</ul>
<br>

<?php if ($sub_maqasid == 'dansos') { ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th style="width:100px">Tanggal</th>
                <th>Nama Program</th>
                <th>Penerima</th>
                <th>Lokasi</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th style="width:50px"></th>
            </tr>
            <?php foreach ($detail_unit as $unit) { ?>
                <tr>
                    <td><?= $unit['tanggal']; ?></td>
                    <td><?= $unit['nama_program']; ?></td>
                    <td><?= $unit['penerima']; ?></td>
                    <td><?= $unit['lokasi']; ?></td>
                    <td><?= $unit['nominal']; ?></td>
                    <td><?= $unit['keterangan']; ?></td>
                    <td>
                        <a title="Edit" class="delete btn btn-sm btn-info" href="<?php echo base_url('unitkerja/hapus_entry/dansos/' . $unit['id']); ?>"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php } else if ($sub_maqasid == 'wakaf') { ?>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th style="width:100px">Tanggal</th>
                <th>Wakif</th>
                <th>Benda Wakaf</th>
                <th>Mauquf 'alaih</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th style="width:50px"></th>
            </tr>
            <?php $i = 1;
            foreach ($detail_unit as $unit) { ?>
                <tr>
                    <td><?= $unit['tanggal']; ?></td>
                    <td><?= $unit['nama_program']; ?></td>
                    <td><?= $unit['wakif']; ?></td>
                    <td><?= $unit['penerima']; ?></td>
                    <td><?= $unit['lokasi']; ?></td>
                    <td><?= $unit['keterangan']; ?></td>
                    <td>
                        <a title="Edit" class="delete btn btn-sm btn-info" href="<?php echo base_url('unitkerja/hapus_entry/wakaf/' . $unit['id']); ?>"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } else if ($sub_maqasid == 'pendampingan') { ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th style="width:100px">Tanggal</th>
                <th>Nama Program</th>
                <th>Peserta</th>
                <th>Jumlah Peserta</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th style="width:50px"></th>
            </tr>
            <?php $i = 1;
            foreach ($detail_unit as $unit) { ?>
                <tr>
                    <td><?= $unit['tanggal']; ?></td>
                    <td><?= $unit['nama_program']; ?></td>
                    <td><?= $unit['penerima']; ?></td>
                    <td><?= $unit['jumlah_peserta']; ?></td>
                    <td><?= $unit['lokasi']; ?></td>
                    <td><?= $unit['keterangan']; ?></td>
                    <td>
                        <a title="Edit" class="delete btn btn-sm btn-info" href="<?php echo base_url('unitkerja/hapus_entry/pendampingan/' . $unit['id']); ?>"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } else if ($sub_maqasid == 'penerimaan_dansos') { ?> <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th style="width:100px">Tanggal</th>
                <th>Nama Program</th>
                <th>Instansi/Lembaga/Person</th>
                <th>Terikat</th>
                <th>Penerima</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th style="width:50px"></th>
            </tr>
            <?php $i = 1;
            foreach ($detail_unit as $unit) { ?>
                <tr>
                    <td><?= $unit['tanggal']; ?></td>
                    <td><?= $unit['nama_program']; ?></td>
                    <td><?= $unit['wakif']; ?></td>
                    <td><?= $unit['terikat']; ?></td>
                    <td><?= $unit['penerima']; ?></td>
                    <td><?= $unit['nominal']; ?></td>
                    <td><?= $unit['keterangan']; ?></td>
                    <td>
                        <a title="Edit" class="delete btn btn-sm btn-info" href="<?php echo base_url('unitkerja/hapus_entry/penerimaan_dansos/' . $unit['id']); ?>"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>