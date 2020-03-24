<!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; SK Penempatan Pegawai</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users/tambah_penempatan'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Tambah SK</a>
        </div>
      </div>
    </div>
  </div>


   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="prodi" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Nama Staf</th>
          <th>Unit kerja</th>
          <th>Kantor</th>
          <!--<th>Periode Penempatan</th>-->
          <th style="width:100px;text-align:center;">Aksi</th>
        
          
        </tr>
        </thead>
        <tbody>
          <?php foreach($penempatan as $penempatan): ?>
          <tr>
            <td><?=get_stafname_by_id($penempatan['user_id']); ?></td>
            <td><?=get_unit_kerja_by_id($penempatan['id_unit']); ?></td>
            <td><?=get_kantor_by_id($penempatan['id_kantor']); ?></td>
            <!--<td><?=$penempatan['awal_penempatan']; ?> - <?=$penempatan['akhir_penempatan']; ?></td>-->           
            <td style="width:100px;text-align:center;">              
              <a title="Hapus" class="delete btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url('admin/users/hapus_penempatan/' . $penempatan['id']); ?>"> <i class="fa fa-trash-o"></i></a>
              <a title="Edit" class="delete btn btn-sm btn-info" href="<?php echo base_url('admin/users/edit_penempatan/' . $penempatan['id']); ?>"> <i class="fa fa-pencil"></i></a>
               
            </td>            
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  


<div class="modal fade" id="confirm-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Perhatian</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Tutuo">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin ingin menghapus data ini?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  //datatable
  var table =$("#prodi").DataTable(
  {
    order: [[ 1, "asc" ]],
      language: {
        searchPlaceholder: "Cari data"
      }
    }
  );
  
  //for nav
  $("#pengguna").addClass('active');
  $("#pengguna .submenu_penempatan").addClass('active');

  //modal
  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
</script>
