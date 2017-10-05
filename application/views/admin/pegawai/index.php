<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			LIST <?php echo $judul; ?>
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pegawai</th>
						<th>Alamat</th>
						<th>
							<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
							Action
						</th>
					</tr>
				</thead>

				<tbody>
				<?php foreach ($pegawai as $row): ?>
					<tr>
						<td><?php echo $row->id_pegawai ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->alamat ?></td>
						<td>
							<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
								<span class="blue">
									<i class="ace-icon fa fa-search-plus bigger-200"></i>
								</span>
							</a>
							<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-200"></i>
								</span>
							</a>
							<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
								<span class="red">
									<i class="ace-icon fa fa-trash-o bigger-200"></i>
								</span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>