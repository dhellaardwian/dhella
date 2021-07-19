<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/e-umkm.jpeg">
    <title>UMKM KABUPATEN NGANJUK</title>
  </head>
  <body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login<strong>Pelanggan</strong></h3>
            <p class="mb-4">UMKM KABUPATEN NGANJUK</p>
            <form class="form-horizontal" action="<?php echo base_url().'pelanggan/login' ?>" method="post">
              <div class="form-group first">
                <label for="username">Email</label>
                <input  type="email" name="email" id="email" class="form-control" placeholder="Email Anda">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="pass" name="pass"  placeholder="Password">
              </div>
              <input type="submit" class="btn btn-block btn-primary">
            </form>
            <div class="form-group">
							<div class="col-xs-12">
								<label><a href="<?= base_url('pelanggan/register') ?>">Belum Punya Akun ?</a></label>
							</div>
						</div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="<?php echo base_url(); ?>assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
  </body>
</html>