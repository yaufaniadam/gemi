<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-certificate"></i> &nbsp; Sertifikat dan Penghargaan</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="<?= base_url('profile/tambah_sertifikat_penghargaan'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Tambah Sertifikat dan Penghargaan</a>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body m-form-body">
                    <table id="standar" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Yang Menerbitkan</th>
                                <th>Tahun</th>
                                <th>Sertifikat</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if ($sertifikat_penghargaan) {
                                $i = 1;
                                foreach ($sertifikat_penghargaan as $row) { ?>
                                    <tr>
                                        <td><?= $i; ?></td>

                                        <td><?= $row['jenis']; ?></td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td><?= $row['yang_menerbitkan']; ?></td>
                                        <td><?= $row['tahun']; ?></td>
                                        <td><a href="<?=base_url($row['file_sertifikat']); ?>" target="_blank">Download</a></td>

                                        <td style="text-align:center;">
                                            <a title="Edit" class="update btn btn-sm btn-success" href="<?php echo base_url('profile/edit_sertifikat_penghargaan/' . $row['id']); ?>">
                                                <i class="fa fa-pencil-square-o"></i></a>
                                            <a title="Hapus" class="delete btn btn-sm btn-danger" data-href="<?= base_url('profile/hapus_sertifikat_penghargaan/' . $row['id']); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>

                            <?php $i++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>

<!-- Modal -->
<div id="confirm-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<script>
    $("#pribadi").addClass('active');
    $("#pribadi .submenu_sertifikat_penghargaan").addClass('active');
</script>