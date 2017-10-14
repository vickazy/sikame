<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
				</li><li>
					<i class="ace-icon fa fa-user user-icon"></i>
					<a href="<?php echo site_url('Barang') ?>">Barang</a>
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
									<h4 class="widget-title">EDIT Barang <?php echo $barang['nama_barang'] ?></h4>
								</div>

								<div class="widget-body">
									<div class="widget-main no-padding">
										<?php echo form_open('Barang/edit_proses/'.$barang['id_barang']); ?>
											<!-- <legend>Form</legend> -->
											<fieldset class="form-group">
												<label>id</label>
												<input class="form-control" type="text" name="id_barang" value="<?php echo $barang['id_barang'] ?>" />
												<?php echo form_error('id_barang') ?>
												<br>

												<label>Nama Barang</label>
												<input class="form-control" type="text" name="nama_barang" value="<?php echo $barang['nama_barang'] ?>" />
												<?php echo form_error('nama_barang') ?>
												<br>

					                            <label>Ukuran Barang</label>
					                            <div>
					                                <input class="form-control" type="text" name="ukuran_barang" value="<?php echo $barang['ukuran_barang'] ?>"></input>
					                                <?php echo form_error('ukuran_barang') ?>
					                            </div>
												<br>

					                            <label>Material Barang</label>
					                            <div>
					                                <input class="form-control" type="text" name="material_barang" value="<?php echo $barang['material_barang'] ?>"></input>
					                                <?php echo form_error('material_barang') ?>
					                            </div>
												<br>

												<label>Jenis Barang</label>
												<select name="id_jenis_barang" class="form-control">
													<?php foreach ($jenis_barang as $key): ?>
				                                        <option value='<?php echo $key['id_jenis_barang'];?>' <?php if($barang['id_jenis_barang'] == $key['id_jenis_barang']){echo "selected";} ?>>
				                                            <?php echo $key['nama_jenis_barang']; ?>   
				                                        </option>
				                                    <?php endforeach ?>
												</select>
												<?php echo form_error('id_jenis_barang') ?>
												<br>

												<div class="form-group">
						                            <label>Stok Barang</label>
						                            <div>
						                                <input class="form-control" type="text" name="stok_barang" placeholder="Stok Barang" value="<?php echo $barang['stok_barang'] ?>" required></input>
						                                <?php echo form_error('stok_barang') ?>
						                            </div>
						                        </div>

												<label>Harga Jual Barang</label>
												<input class="form-control" name="harga_jual_barang" value="<?php echo $barang['harga_jual_barang'] ?>"></input>
												<?php echo form_error('harga_jual_barang') ?>
												<br>

												<label>Desain</label>
												<select name="id_jenis_barang" class="form-control">
													<?php foreach ($desain as $key): ?>
				                                        <option value='<?php echo $key['id_desain'];?>' <?php if($barang['id_desain'] == $key['id_desain']){echo "selected";} ?>>
				                                            <?php echo $key['nama_desain']; ?>   
				                                        </option>
				                                    <?php endforeach ?>
												</select>
												<br>

												<label>Keterangan Barang</label>
					                            <div>
					                                <textarea class="form-control" name="keterangan_barang"><?php echo $barang['keterangan_barang'] ?></textarea>
					                                <?php echo form_error('keterangan_barang') ?>
					                            </div>
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