<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $judul; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles form-->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-colorpicker.min.css" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/media/css/dataTables.bootstrap.css" />
		
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url() ?>assets/js/ace-extra.min.js"></script>

		<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url() ?>assets/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url() ?>assets/media/js/dataTables.bootstrap.js"></script>

	</head>

	<body class="no-skin">
	<!--Head-->
	<?php $this->load->view('menu_head'); ?>
	<!--End Head-->

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<!--MENU SAMPING-->
					<?php $this->load->view('menu_sidebar'); ?>
				<!--END MENU SAMPING-->
			</div>

										<?php $this->load->view($konten); ?>

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"></span>
							&copy; 2017
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


		<!-- page specific plugin scripts -->

		<!-- inline scripts related to this page -->
		<?php 
			if ($js == 'js_table') {
				$this->load->view('js_table');
			} elseif ($js == 'js_form') {
				$this->load->view('js_form');
			}
		 ?>

		 <script>
		<?php if (isset($modal_show)) {echo $modal_show;}?>
		</script>

	</body>
</html>
