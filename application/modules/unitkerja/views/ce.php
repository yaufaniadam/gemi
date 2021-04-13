<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<?php
$last = $this->uri->total_segments();
$sub_maqasid = $this->uri->segment($last);


switch ($sub_maqasid) {
    case 'wakaf'; ?>

        <h3>Hifdz Al Maal</h3>
        <h4>Wakaf</h4>
        <hr>

        <?php echo form_open_multipart(base_url("unitkerja/add_ce/"), 'class="form-horizontal"') ?>

        <input name="maqasid" type="hidden" value="maal">
        <input name="sub_maqasid" type="hidden" value="wakaf">

        <div class="form-group">
            <label for="nama_prodi" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input name="tanggal" type="text" class="form-control pull-right datepicker" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_program" class="col-sm-3 control-label">Nama Program</label>
            <div class="col-sm-6">
                <input type="text" name="nama_program" value="" class="form-control" id="nama_program" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="wakif" class="col-sm-3 control-label">Wakif</label>
            <div class="col-sm-6">
                <input type="text" name="wakif" value="" class="form-control" id="wakif" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="penerima" class="col-sm-3 control-label">Mauquf 'Aalih</label>
            <div class="col-sm-6">
                <input type="text" name="penerima" value="" class="form-control" id="penerima" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="benda_wakaf" class="col-sm-3 control-label">Benda yang diwakafkan</label>
            <div class="col-sm-6">
                <input type="text" name="benda_wakaf" value="" class="form-control" id="benda_wakaf" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="lokasi" class="col-sm-3 control-label">Lokasi</label>
            <div class="col-sm-6">
                <input type="text" name="lokasi" value="" class="form-control" id="lokasi" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea name="keterangan" value="" class="form-control" id="keterangan" placeholder=""></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-11">
                <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
            </div>
        </div>
        <?php echo form_close(); ?>

    <?php
        break;
    case 'pendampingan';
    ?>

        <h3>Hifdz Al Aql</h3>
        <h4>Pendampingan</h4>
        <hr>

        <?php echo form_open_multipart(base_url("unitkerja/add_ce/"), 'class="form-horizontal"') ?>

        <input name="maqasid" type="hidden" value="aql">
        <input name="sub_maqasid" type="hidden" value="pendampingan">

        <div class="form-group">
            <label for="nama_prodi" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input name="tanggal" type="text" class="form-control pull-right datepicker" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_program" class="col-sm-3 control-label">Nama Program</label>
            <div class="col-sm-6">
                <input type="text" name="nama_program" value="" class="form-control" id="nama_program" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <label for="penerima" class="col-sm-3 control-label">Peserta</label>
            <div class="col-sm-6">
                <input type="text" name="penerima" value="" class="form-control" id="penerima" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah_peserta" class="col-sm-3 control-label">Jumlah_peserta</label>
            <div class="col-sm-6">
                <input type="text" name="jumlah_peserta" value="" class="form-control" id="jumlah_peserta" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="lokasi" class="col-sm-3 control-label">Lokasi</label>
            <div class="col-sm-6">
                <input type="text" name="lokasi" value="" class="form-control" id="lokasi" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea name="keterangan" value="" class="form-control" id="keterangan" placeholder=""></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-11">
                <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
            </div>
        </div>
        <?php echo form_close(); ?>

    <?php
        break;
    case 'penerimaan_dansos';
    ?>

        <h3>Hifdz Al Maal</h3>
        <h4>Penerimaan Dana Sosial</h4>
        <hr>

        <?php echo form_open_multipart(base_url("unitkerja/add_ce/"), 'class="form-horizontal"') ?>

        <input name="maqasid" type="hidden" value="maal">
        <input name="sub_maqasid" type="hidden" value="penerimaan_dansos">

        <div class="form-group">
            <label for="nama_prodi" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input name="tanggal" type="text" class="form-control pull-right datepicker" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_program" class="col-sm-3 control-label">Nama Program</label>
            <div class="col-sm-6">
                <input type="text" name="nama_program" value="" class="form-control" id="nama_program" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <label for="wakif" class="col-sm-3 control-label">Instansi/Lembaga/Person</label>
            <div class="col-sm-6">
                <input type="text" name="wakif" value="" class="form-control" id="wakif" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nama_prodi" class="col-sm-3 control-label">Terikat</label>
            <div class="col-sm-6">
                <select name="terikat" class="form-control" id="periode_bln">
                    <option value=""> -- Pilihan -- </option>
                    <option value="Terikat">Terikat</option>
                    <option value="Tidak Terikat">Tidak Terikat</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="penerima" class="col-sm-3 control-label">Penerima</label>
            <div class="col-sm-6">
                <input type="text" name="penerima" value="" class="form-control" id="penerima" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nominal" class="col-sm-3 control-label">Nominal (Rp)</label>
            <div class="col-sm-6">
                <input type="number" name="nominal" value="" class="form-control" id="nominal" placeholder="" required>
            </div>
        </div>

        <div class="form-group">
            <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea name="keterangan" value="" class="form-control" id="keterangan" placeholder=""></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-11">
                <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
            </div>
        </div>
        <?php echo form_close(); ?>


    <?php break;
    default: ?>

        <h3>Hifdz Al Maal</h3>
        <h4>Program Dana Sosial</h4>
        <hr>
        <?php echo form_open_multipart(base_url("unitkerja/add_ce/"), 'class="form-horizontal"') ?>

        <input name="maqasid" type="hidden" value="maal">
        <input name="sub_maqasid" type="hidden" value="dansos">

        <div class="form-group">
            <label for="nama_prodi" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input name="tanggal" type="text" class="form-control pull-right datepicker" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nama_program" class="col-sm-3 control-label">Nama Program</label>
            <div class="col-sm-6">
                <input type="text" name="nama_program" value="" class="form-control" id="nama_program" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="penerima" class="col-sm-3 control-label">Penerima</label>
            <div class="col-sm-6">
                <input type="text" name="penerima" value="" class="form-control" id="penerima" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="lokasi" class="col-sm-3 control-label">Lokasi</label>
            <div class="col-sm-6">
                <input type="text" name="lokasi" value="" class="form-control" id="lokasi" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="nominal" class="col-sm-3 control-label">Nominal (Rp)</label>
            <div class="col-sm-6">
                <input type="number" name="nominal" value="" class="form-control" id="nominal" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea name="keterangan" value="" class="form-control" id="keterangan" placeholder=""></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-11">
                <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
            </div>
        </div>
        <?php echo form_close(); ?>

<?php } ?>


<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script>
    $(function() {

        //Date picker
        $('.datepicker').datepicker({
            autoclose: true
        });

    });
</script>