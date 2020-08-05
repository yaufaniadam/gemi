<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-body">
                    <div class="col-md-6">
                        <h4><i class="fa fa-upload"></i> &nbsp; Upload Pegawai</h4>
                    </div>
                    <div class="col-md-6 text-right">

                    </div>

                </div>

                <?php if (isset($msg) || validation_errors() !== '') : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-exclamation"></i> Terjadi Kesalahan</h4>
                        <?= validation_errors(); ?>
                        <?= isset($msg) ? $msg : ''; ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>

    <?php

    if (isset($_POST['submit'])) {

        // Buat sebuah tag form untuk proses import data ke database
        echo form_open_multipart(base_url('admin/users/import/' . $file_excel), 'class="form-horizontal"');
    ?>
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="box">

                        <div class="box-header">
                            <h4> <i style="color:red" class="fa fa-exclamation-triangle"></i><strong> Periksa kembali dengan
                                    seksama</strong></h4>
                        </div>

                        <div class="box-body">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Unit</th>
                                        <th>Kantor</th>
                                        <th>Penempatan</th>
                                        <th>Awal</th>
                                        <th>Akhir</th>
                                    </tr>
                                    <thead>
                                    <tbody>
                                        <?php
                                        $numrow = 1;
                                        foreach ($sheet as $row) {
                                            // Ambil data pada excel sesuai Kolom
                                            if ($numrow > 1) {


                                                echo "<tr>";
                                                echo "<td>" . $row['A'] . "</td>";
                                                echo "<td>" . $row['B'] . "</td>";
                                                echo "<td>" . $row['C'] . "</td>";
                                                echo "<td>" . $row['E'] . "</td>";
                                                echo "<td>" . getUnitbyId($row['F']) . "</td>";
                                                echo "<td>" . get_kantor_by_id($row['G']) . "</td>";
                                                echo "<td>" . $row['H'] . "</td>";
                                                echo "<td>" . $row['I'] . "</td>";
                                                echo "<td>" . $row['J'] . "</td>";

                                                echo "</tr>";
                                            }
                                            $numrow++; // Tambah 1 setiap kali looping
                                        }

                                        ?>
                                <tbody>
                            </table>

                            <hr>

                            <button class='btn btn-success' type='submit' name='import'>Import</button>
                            <a class="btn btn-warning" href="<?= base_url("admin/users/upload"); ?>">Cancel</a>

                            <?php echo form_close(); ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    <?php } else {

        echo form_open_multipart(base_url('admin/users/upload'), 'class="form-horizontal"') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">


                        <div class="box-body my-form-body">
                            <ul class="alert alert-default">
                                <li>Ekstensi File yang didukung hanya .xlsx</li>
                                <li>Data yang diupload harus mengikuti template yang sudah disediakan. <a href="<?= base_url('public/dist/user_import.xlsx'); ?>" class="btn btn-success btn-sm"><i class="fa fa-file"></i> Unduh Template Excel</a></li>
                            </ul>
                            <div class="form-group">
                                <input type="file" name="file" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Upload" class="btn btn-warning pull-right">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    <?php echo form_close();
    }
    ?>
</section>

<script>
    $("#pengguna").addClass('menu-open');
    $("#pengguna .upload_residen a.nav-link").addClass('active');
</script>