<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-user"></i> &nbsp; Kinerja Individu</h4>
        </div>       
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h4>Hifdz Al-Maal (Pemeliharaan Harta)  </h4>

        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('kinerja/individu/mal'), 'class="form-horizontal"' )?> 
           
            <?php
              //get current month
              $this_month= date("n");
              
            ?>
              <div class="form-group">
                <label for="periode" class="col-sm-6 control-label">Periode</label>
                <div class="col-sm-5">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="input-group">
                        <select name="periode_bln" class="form-control" id="periode_bln" >
                          <option value="1" <?php if(validation_errors()) { echo set_select('periode_bln', '1'); } else if($this_month == 1)  { echo "selected";} ?> >Januari</option>                          
                          <option value="2" <?php if(validation_errors()) { echo set_select('periode_bln', '2'); } else if($this_month == 2 ) { echo "selected";} ?>>Februari</option>
                          <option value="3" <?php if(validation_errors()) { echo set_select('periode_bln', '3'); } else if($this_month == 3 ) { echo "selected";} ?>>Maret</option>
                          <option value="4" <?php if(validation_errors()) { echo set_select('periode_bln', '4'); } else if($this_month == 4 ) { echo "selected";} ?>>April</option>
                          <option value="5" <?php if(validation_errors()) { echo set_select('periode_bln', '5'); } else if($this_month == 5 ) { echo "selected";} ?>>Mei</option>
                          <option value="6" <?php if(validation_errors()) { echo set_select('periode_bln', '6'); } else if($this_month == 6 ) { echo "selected";} ?>>Juni</option>
                          <option value="7" <?php if(validation_errors()) { echo set_select('periode_bln', '7'); } else if($this_month == 7 ) { echo "selected";} ?>>Juli</option>
                          <option value="8" <?php if(validation_errors()) { echo set_select('periode_bln', '8'); } else if($this_month == 8 ) { echo "selected";} ?>>Agustus</option>
                          <option value="9" <?php if(validation_errors()) { echo set_select('periode_bln', '9'); } else if($this_month == 9 ) { echo "selected";} ?>>September</option>
                          <option value="10" <?php if(validation_errors()) { echo set_select('periode_bln', '10'); } else if($this_month == 10 ) { echo "selected";} ?>>Oktober</option>
                          <option value="11" <?php if(validation_errors()) { echo set_select('periode_bln', '11'); } else if($this_month == 11 ) { echo "selected";} ?>>November</option>
                          <option value="12" <?php if(validation_errors()) { echo set_select('periode_bln', '12'); } else if($this_month == 12)  { echo "selected";} ?> >Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group">
                       <select name="periode_thn" class="form-control" id="periode_thn" >
                        <option value="" > Pilih Tahun</option>
                        <option value="2019" <?php if(validation_errors()) { echo set_select('periode_thn', '2019'); } ?>>2019</option>
                        <option value="2020" <?php if(validation_errors()) { echo set_select('periode_thn', '2020'); } ?>>2020</option> 
                        <option value="2021" <?php if(validation_errors()) { echo set_select('periode_thn', '2021'); } ?>>2021</option>  
                        <option value="2022" <?php if(validation_errors()) { echo set_select('periode_thn', '2022'); } ?>>2022</option>                         
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="saving" class="col-sm-6 control-label">Jumlah saving untuk pendidikan anak</label>
                <div class="col-sm-6">
                  <div class="input-group"> 
                    <span class="input-group-addon"> Rp</span>            
                    <input type="number" name="saving" class="form-control" value="<?php if(validation_errors()) {echo set_value('saving'); }  ?>" placeholder="">
                    <span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label for="hutang" class="col-sm-6 control-label">Jumlah hutang/pembiayaan yang ditanggung keluarga</label>
                <div class="col-sm-6">
                  <div class="input-group"> 
                  <span class="input-group-addon"> Rp</span>        
                    <input type="number" name="hutang" class="form-control" value="<?php if(validation_errors()) {echo set_value('hutang'); }   ?>"><span class="input-group-addon"> / bulan</span>
                  </div>
                </div>
              </div>   

              <div class="form-group">
                <label for="hutang" class="col-sm-6 control-label">Lembaga pembiayaan</label>
                <div class="col-sm-6">                
                        
                    <input type="text" name="tempat_hutang" class="form-control" value="<?php if(validation_errors()) {echo set_value('tempat_hutang'); }  ?>">                
         
                </div>             
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="submit" name="submit" value="Simpan" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div><!-- /.col  -->
  </div><!-- /.row  -->
  
</section> 

<script>
  $("#kinerja_individu").addClass('active');
  $("#kinerja_individu .submenu_mal").addClass('active');
</script