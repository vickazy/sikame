<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
				</li><li>
					<i class="ace-icon fa fa-user user-icon"></i>
					<a href="<?php echo site_url('pelanggan') ?>">PELANGGAN</a>
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
									<h4 class="widget-title">EDIT PELANGGAN <?php echo $pelanggan['nama_pelanggan'] ?></h4>
								</div>

								<div class="widget-body">
									<div class="widget-main no-padding">
										<?php echo form_open('pelanggan/edit_proses/'.$pelanggan['id_pelanggan']); ?>
											<!-- <legend>Form</legend> -->
											<fieldset class="form-group">
												<label>Nama Pelanggan</label>
												<input class="form-control" type="text" name="nama_pelanggan" value="<?php echo $pelanggan['nama_pelanggan'] ?>" />
												<?php echo form_error('nama_pelanggan') ?>
												<br>

												<label>Alamat Pelanggan</label>
												<textarea class="form-control" name="alamat_pelanggan" rows="4"><?php echo $pelanggan['alamat_pelanggan'] ?></textarea>
												<?php echo form_error('alamat_pelanggan') ?>
												<br>
												
												<label>Contact Person</label>
												<small class="text-warning">(9999-9999-9999)</small>
					                            <div>
					                                <div class="input-group">
					                                    <span class="input-group-addon">
					                                        <i class="ace-icon fa fa-phone"></i>
					                                    </span>

					                                    <input class="form-control input-mask-phone" name="cp_pelanggan" type="text" id="form-field-mask-2" value="<?php echo $pelanggan['cp_pelanggan'] ?>" />
					                                </div>
					                            </div>
					                            <?php echo form_error('cp_pelanggan') ?>

												
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