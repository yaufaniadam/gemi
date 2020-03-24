<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-graduation-cap"></i> &nbsp; Edit Riwayat Pendidikan</h4>
                </div>
                <div class="col-md-6 text-right">

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body m-form-body">
                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open_multipart(base_url('profile/edit_riwayat_pendidikan/' . $riwayat_pendidikan['id']), 'class="form-horizontal"') ?>

                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Jenjang</label>
                        <div class="col-sm-3">
                            <select name="jenjang" class="form-control">
                                <option value="" <?php echo  set_select('jenjang', '', TRUE); ?>>Pilih Jenjang</option>
                                <option value="SMA" <?php echo (validation_errors()) ? set_select('jenjang', 'SMA') : ""; echo ($riwayat_pendidikan['jenjang'] == 'SMA') ? "selected" : ""; ?>>
                                    SMA</option>
                                <option value="SMK" <?php echo (validation_errors()) ? set_select('jenjang', 'SMK') : ""; echo ($riwayat_pendidikan['jenjang'] == 'SMK') ? "selected" : ""; ?>>
                                    SMK</option>
                                <option value="Diploma" <?php echo (validation_errors()) ? set_select('jenjang', 'Diploma') : ""; echo ($riwayat_pendidikan['jenjang'] == 'Diploma') ? "selected" : ""; ?>>
                                    Diploma</option>
                                <option value="S1" <?php echo (validation_errors()) ? set_select('jenjang', 'S1') : ""; echo ($riwayat_pendidikan['jenjang'] == 'S1') ? "selected" : ""; ?>>
                                    S1</option>
                                <option value="S2" <?php echo (validation_errors()) ? set_select('jenjang', 'S2') : ""; echo ($riwayat_pendidikan['jenjang'] == 'S2') ? "selected" : ""; ?>>
                                    S2</option>
                                <option value="S3" <?php echo (validation_errors()) ? set_select('jenjang', 'S3') : ""; echo ($riwayat_pendidikan['jenjang'] == 'S3') ? "selected" : ""; ?>>
                                    S3</option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="lembaga" class="col-sm-3 control-label">Lembaga Pendidikan</label>

                        <div class="col-sm-9">
                            <input type="text" name="lembaga" value="<?= (validation_errors()) ? set_value('lembaga') : $riwayat_pendidikan['lembaga']; ?>" class="form-control" id="lembaga" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jurusan" class="col-sm-3 control-label">Jurusan/Program Studi</label>

                        <div class="col-sm-9">
                            <input type="text" name="jurusan" value="<?= (validation_errors()) ? set_value('jurusan') : $riwayat_pendidikan['jurusan']; ?>" class="form-control" id="jurusan" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tahun_lulus" class="col-sm-3 control-label">Tahun Lulus</label>

                        <div class="col-sm-9">
                            <input type="number" style="width:100px" min="2010" max="2030" name="tahun_lulus" value="<?= (validation_errors()) ? set_value('tahun_lulus') : $riwayat_pendidikan['tahun_lulus']; ?>" class="form-control" id="tahun_lulus" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tahun_lulus" class="col-sm-3 control-label">File Ijazah</label>

                        <div class="col-sm-9">
                            <input type="file" name="file_ijazah" class="form-control">
                            <input type="hidden" name="file_ijazah_hidden" value="<?= (validation_errors()) ? set_value('file_ijazah_hidden') : $riwayat_pendidikan['file_ijazah']; ?>">
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-4">
			<div class="box">
				<div class="box-header with-border">
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body m-form-body">
                    <img style="width:100%;height:auto;" src="<?=base_url( $riwayat_pendidikan['file_ijazah']); ?>" />
                </div>
            </div>
        </div>
    </div>

</section>

<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script>
    $("#pribadi").addClass('active');
    $("#pribadi .submenu_riwayat_pendidikan").addClass('active');

    $("#tgl_lahir").inputmask("yyyy/mm/dd", {
        "placeholder": "yyyy/mm/dd"
    });
</script>