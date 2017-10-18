<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
				</li><li>
					<i class="ace-icon fa fa-user user-icon"></i>
					<a href="<?php echo site_url('penjualan') ?>">PENJUALAN</a>
				</li>
				<li class="active">EDIT</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<!--Setting-->
				<?php $this->load->view('setting'); ?>
			<!--End Setting-->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
						<!--KONTEN-->

					<div class="row">
						<div class="col-sm-6">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">TAMBAH PENJUALAN</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main no-padding">
										<?php echo form_open('Penjualan/tambah_proses') ?>
											<!-- <legend>Form</legend> -->
											<fieldset class="form-group">
												<label>ID Faktur</label>
												<input class="form-control" type="text" name="id_faktur" value="<?php echo $id_p; ?>" readonly/>
												<?php echo form_error('id_faktur') ?>
												<br>

												<label>Jumlah Barang</label>
												<input class="form-control" type="number" name="jumlah_barang" placeholder="Jumlah Barang" />
                                				<?php echo form_error('jumlah_barang') ?>
												<br>

												<label>Nama Barang</label>
												<br>
					                            <input class="" type="text" name="id_barang" id="id_barang" readonly>
					                            <input class="autocomplete form-control" type="text" name="nama_barang" placeholder="Nama Barang" id="barang">
					                            <?php echo form_error('id_barang') ?>
					                            <br>

					                            <label>Nama Pelanggan</label>
					                            <br>
					                            <input class="" type="text" name="id_pelanggan" id="id_pelanggan" readonly>
					                            <input class="form-control" type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" id="pelanggan">
					                            <?php echo form_error('id_pelanggan') ?>
											</fieldset>

											<div class="form-actions center">
												<button type="submit" class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i>
													Tambah
												</button>
											</div>
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--END KONTEN-->
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

<!-- Memanggil file .js untuk proses autocomplete -->
<script type='text/javascript' src='<?php echo base_url();?>assets/jquery.autocomplete/jquery-1.8.2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/jquery.autocomplete/jquery.autocomplete.js'></script>

<!-- Memanggil file .css untuk style saat data dicari dalam filed -->
<link href='<?php echo base_url();?>assets/jquery.autocomplete/jquery.autocomplete.css' rel='stylesheet' />

<script type='text/javascript'>
    var site = "<?php echo site_url();?>";
    $(function(){
    	var id_b 	= document.getElementById('id_barang'); 
        var id_br 	=  $('#id_barang').val(); 
        $('#barang').autocomplete({
            // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
            serviceUrl: site+'/penjualan/get_barang',
            // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
            onSelect: function (suggestion) {
               	$('#id_barang').val(''+suggestion.id_barang); 
            		id_b.setAttribute('readonly','');
            }
        });
    });
</script>

<script type='text/javascript'>
    var site = "<?php echo site_url();?>";
    $(function(){
        $('#pelanggan').autocomplete({
            // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
            serviceUrl: site+'/penjualan/get_pelanggan',
            // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
            onSelect: function (suggestion) {
                $('#id_pelanggan').val(''+suggestion.id_pelanggan); 
            }
        });
    });
</script>