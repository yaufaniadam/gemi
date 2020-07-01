<?php include('sidebar_detail.php'); ?>
  		<div class="col-md-9">
  			<div class="box box-body">

				  <h4><i class="fa fa-gear"></i> &nbsp; Hifdz Al Mal / Penjagaan Harta
				  <?php if($this->session->userdata('role')== 3) { ?>
				  <a title="Edit" class="delete btn btn-sm btn-success pull-right" href="<?php echo base_url('kinerja/individu/mal'); ?>"> <i class="fa fa-plus"></i>
  						Tambah Data</a>
  					<?php } ?>
				</h4>
  				<hr>
  				<select id="select_menu" class="form-control">
  					<option value="#">Pilih Kinerja</option>
  					<option value="<?= base_url('kinerja/individu/detail_din/' . $user['id']) ?>">Hifdz Ad Din / Penjagaan Agama</option>
  					<option value="<?= base_url('kinerja/individu/detail_nafs/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An Nafs / Penjagaan Jiwa</option>
  					<option value="<?= base_url('kinerja/individu/detail_aql/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz Al 'Aql / Penjagaan Pikiran</option>
  					<option value="<?= base_url('kinerja/individu/detail_nasl/' . $user['id']) ?>" class="btn btn-default btn-md">Hifdz An Nasl / Penjagaan Keturunan</option>
  					<option value="<?= base_url('kinerja/individu/detail_mal/' . $user['id']) ?>" class="btn btn-default btn-md"  selected="selected">Hifdz Al Mal / Penjagaan Harta</option>
  				</select>

  			</div>
  			<!-- About Me Box -->
  			<div class="box box-primary">

  				<div class="box-body">

  					<div class="btn-group" role="group" style="margin-bottom:20px;">
  						<?php if ($tahun_mal) {
								foreach ($tahun_mal as $tahun_mal) { ?>
  								<a href="<?= base_url('kinerja/individu/detail_mal/' . $user['id'] . '/' . $tahun_mal['periode_thn']); ?>" class="btn btn-success"><?= $tahun_mal['periode_thn']; ?></a>
  						<?php }
							} ?>
  					</div>


					  <?php 

					
					 
						if (count($mal) > 0) {
                                                    
							foreach ($mal as $key => $row) {
								foreach ($row as $field => $value) {
									$recNew[$field][] = $value;
								}
							}

							echo "<table class='table table-bordered table-striped'>\n";
							$i = 1;
							foreach ($recNew as $key => $values) // For every field name (id, name, last_name, gender)
							{
								if ($i == 1) {
									echo "<tr>\n"; // start the row
									echo "\t<th>" . $key . "</th>\n"; // create a table cell with the field name
									foreach ($values as $cell) // for every sub-array iterate through all values
									{
										echo "\t<th class='text-center'>" . konversiBulanAngkaKeNama_short($cell) . "</th>\n"; // write cells next to each other
									}
									echo "</tr>\n"; // end row
								} else {
									echo "<tr>\n"; // start the row
									echo "\t<td>" . $key . "</td>\n"; // create a table cell with the field name
									foreach ($values as $cell) // for every sub-array iterate through all values
									{
										echo "\t<td class='text-center'>" . $cell . "</td>\n"; // write cells next to each other
									}
									echo "</tr>\n"; // end row

								}
								$i++;
							}

							echo "</table>"; 

						} ?>

  					

  				</div>
  				<!-- /.box-body -->
  			</div>
  			<!-- /.box -->


  		</div>
  		<!-- /.col -->
  	</div>
  	<!-- /.row -->

  </section>

  <script>
	$("#kinerja_individu").addClass('active');
	$("#kinerja_individu .submenu_mal").addClass('active');
	  
  	$(document).ready(function() {
  		$('#select_menu').change(function() {
  			location.href = $(this).val();
  		});
  	});
  </script>

  