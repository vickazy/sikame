<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
				</li><li>
					<i class="ace-icon fa fa-user user-icon"></i>
					<a href="<?php echo site_url('Pegawai') ?>">PEGAWAI</a>
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
									<h4 class="widget-title">EDIT PEGAWAI <?php echo $pegawai['nama_pegawai'] ?></h4>
								</div>

								<div class="widget-body">
									<div class="widget-main no-padding">
										<?php echo form_open('Pegawai/edit_proses/'.$pegawai['id_pegawai']); ?>
											<!-- <legend>Form</legend> -->
											<fieldset class="form-group">
												<label>Nama Pegawai</label>
												<input class="form-control" type="text" name="nama_pegawai" value="<?php echo $pegawai['nama_pegawai'] ?>" />
												<?php echo form_error('nama_pegawai') ?>
												<br>

												<label>Alamat Pegawai</label>
												<textarea class="form-control" name="alamat_pegawai" rows="4"><?php echo $pegawai['alamat_pegawai'] ?></textarea>
												<?php echo form_error('alamat_pegawai') ?>
												<br>

												<label>Akses Pegawai</label>
												<select name="akses_pegawai" class="form-control">
													<option value="">--Pilih Akses--</option>
													<option value="user" <?php if($pegawai['akses_pegawai'] == 'user'){echo "selected";} ?>>User</option>
													<option value="admin" <?php if($pegawai['akses_pegawai'] == 'admin'){echo "selected";} ?>>Admin</option>
												</select>
												<?php echo form_error('akses_pegawai') ?>
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