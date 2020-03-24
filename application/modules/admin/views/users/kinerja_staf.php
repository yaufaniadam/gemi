  
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-gear"></i> &nbsp; Lihat Kinerja Staf</h4>
        </div>        
      </div>
    </div>
  </div> 

   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="na_datatable" class="table table-bordered table-striped" width="100%">
        <thead>
        <tr>
         
          <th>Nama</th>
          <th>Email</th>      
          <th>Aksi</th>
        </tr>
        </thead>
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
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?=base_url('admin/users/datatable_json2')?>",
      "order": [[0,'asc']],
      "columnDefs": [
       
        { "targets": 0, "name": "firstname", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "email", 'searchable':true, 'orderable':true},    
        { "targets": 2, "action": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
      ]
    });
  </script>
  
  
 <script>
    $("#kinerja_staf").addClass('active');
  </script>
