<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
				</li><li>
					<i class="ace-icon fa fa-briefcase"></i>
					<a href="<?php echo site_url('modal') ?>"> Modal</a>
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
						<div class="col-sm-8">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">EDIT MODAL <?php echo $modal['nama_bahan'] ?></h4>
								</div>

								<div class="widget-body">
									<div class="widget-main no-padding">
										<?php echo form_open('modal/edit_proses/'.$modal['id_modal']); ?>
											<!-- <legend>Form</legend> -->
											<fieldset class="form-group">
												<label>ID Modal</label>
												<input class="form-control" type="text" name="id_modal" value="<?php echo $modal['id_modal'] ?>" readonly/>
												<?php echo form_error('id_modal') ?>
												<br>

												<label>Nama Bahan</label>
												<input class="form-control" type="text" name="nama_bahan" value="<?php echo $modal['nama_bahan'] ?>" />
												<?php echo form_error('nama_bahan') ?>
											</fieldset>
											<fieldset class="col-sm-6">
					                            <label>Jumlah</label>
					                            <div>
					                                <input class="form-control" type="number" name="jumlah_bahan" value="<?php echo $modal['jumlah_bahan'] ?>"></input>
					                                <?php echo form_error('jumlah_bahan') ?>
					                            </div>
												<br>
											</fieldset>
											<fieldset class="col-sm-6">
					                            <label>Satuan</label>
					                            <div>
					                                <input class="form-control" type="text" name="satuan" value="<?php echo $modal['satuan'] ?>"></input>
					                                <?php echo form_error('satuan') ?>
					                            </div>
												<br>
											</fieldset>
											<fieldset>
												<label>Harga Beli</label>
												<input class="form-control" name="harga_beli" value="<?php echo $modal['harga_beli'] ?>"></input>
												<?php echo form_error('harga_beli') ?>
												<br>
											</fieldset>

											<div class="form-actions center">
												<button type="submit" class="btn btn-sm btn-success">
													<i class="ace-icon fa fa-pencil icon-on-right bigger-110"></i>
													Edit
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