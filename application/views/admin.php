<?php
if (empty($this->session->userdata('user'))) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="<?php echo base_url(); ?>ubold-21/ubold/Admin/dark_leftbar/assets/images/favicon_1.ico">
		  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/e-umkm.jpeg">
		<title>UMKM KABUPATEN NGANJUK</title>

		<link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

		<script src="<?php echo base_url(); ?>assets/admin/assets/js/modernizr.min.js"></script>
		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-69506598-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>

	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Selamat Datang di<br><strong class="text-custom">UMKM KABUPATEN NGANJUK</strong> </h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" action="<?php echo base_url().'admin/aksi_login' ?>" method="post">

						<div class="form-group ">
							<div class="col-md-12">
								<input class="form-control" id="username" name="username" type="text" required="" placeholder="Username">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<input class="form-control" id="pass" name="pass" type="password" required="" placeholder="Password">
							</div>
						</div>
						
						<div class="form-group text-center m-t-40">
							<div class="col-md-12">
								<button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">LOGIN</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/detect.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/fastclick.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.slimscroll.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.blockUI.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/waves.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/wow.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.nicescroll.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.scrollTo.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.core.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.app.js"></script>

	</body>
	</html>
<?php
} else if($this->session->userdata('level') == "Admin"){
 	redirect(base_url('beranda2'));
} else if($this->session->userdata('level') == "Pelapak"){
	redirect(base_url('beranda'));
}
?>
