 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-gears"></i> &nbsp; Kantor Pusat dan Cabang</h4>
        </div>
        <div class="col-md-6 text-right">
          <a data-toggle="modal" href="<?= base_url('admin/unit/tambah_kantor'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kantor Cabang</a>
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
          <th>Kantor</th>
          
          <th style="width:100px;text-align:center;">Aksi</th>
       
          
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_kantor as $row): ?>
          <tr>
            <td><?= $row['kantor']; ?></td>
          
           
            <td style="width:100px;text-align:center;">              
            
               <a title="Edit" class="update btn btn-sm btn-success" href="<?php echo base_url('admin/unit/edit_kantor/' . $row['id']); ?>"> <i class="fa fa-pencil-square-o"></i></a> 
              <!--<a title="Edit" class="delete btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url('admin/unit/del/' . $row['id'].'/unit'); ?>"> <i class="fa fa-trash-o"></i></a>-->
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
  $("#unit_kerja").addClass('active');
  $("#unit_kerja .submenu_kantor").addClass('active');

</script>
