<ul class="nav nav-list">
	<li class="<?php if ($menu == 'home'){echo "active";} ?>">
		<a href="<?php echo site_url('Home') ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="<?php if ($menu == 'pegawai'){echo "active";} ?>">
		<a href="<?php echo site_url('Pegawai') ?>">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text"> Pegawai </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">
				Menu
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Sub Menu 1
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="top-menu.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Top Menu
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="two-menu-1.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Two Menus 1
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="two-menu-2.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Two Menus 2
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="mobile-menu-1.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Default Mobile Menu
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="mobile-menu-2.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Mobile Menu 2
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="mobile-menu-3.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Mobile Menu 3
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>

			<li class="">
				<a href="typography.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Sub Menu 2
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>
</ul><!-- /.nav-list -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>