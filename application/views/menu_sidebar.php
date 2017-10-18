<ul class="nav nav-list">
	<li class="<?php if ($menu == 'home'){echo "active";} ?>">
		<a href="<?php echo site_url('Home') ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="<?php if ($menu == 'pegawai' || $menu == 'pelanggan' || $menu == 'barang' || $menu == 'modal'){echo "open";} ?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">
				Master Data
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="<?php if ($menu == 'pegawai'){echo "active";} ?>">
				<a href="<?php echo site_url('Pegawai') ?>">
					<i class="menu-icon fa fa-user"></i>
					<span class="menu-text"> Pegawai </span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="<?php if ($menu == 'pelanggan'){echo "active";} ?>">
				<a href="<?php echo site_url('Pelanggan') ?>">
					<i class="menu-icon fa fa-users"></i>
					<span class="menu-text"> Pelanggan </span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="<?php if ($menu == 'modal'){echo "active";} ?>">
				<a href="<?php echo site_url('Modal') ?>">
					<i class="menu-icon fa fa-briefcase"></i>
					<span class="menu-text"> Modal </span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="<?php if ($menu == 'barang'){echo "active";} ?>">
				<a href="<?php echo site_url('Barang') ?>">
					<i class="menu-icon fa fa-cubes"></i>
					<span class="menu-text"> Barang </span>
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>

	<li class="<?php if ($menu == 'penjualan'){echo "active";} ?>">
		<a href="<?php echo site_url('penjualan') ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Penjualan </span>
		</a>

		<b class="arrow"></b>
	</li>
</ul><!-- /.nav-list -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>