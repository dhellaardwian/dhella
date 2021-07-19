
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
            <h3>Registrasi<strong>Pelanggan</strong></h3>
            <p class="mb-4">UMKM KABUPATEN NGANJUK</p>
            <?php
				echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
				echo form_open('pelanggan/register'); ?>
              <div class="form-group first">
                <label for="namaPengguna">Nama Pengguna</label>
               <input class="form-control" type="text" name="namaPelanggan" value="<?= set_value('namaPelanggan') ?>" placeholder="Nama Pengguna">
              </div>
              <div class="form-group last mb-3">
                <label for="email">Email</label>
               <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email">
              </div>
              <div class="form-group first">
                <label for="noTelepon">Nomor Telepon</label>
                <input class="form-control" type="text" name="noTelepon" value="<?= set_value('noTelepon') ?>" placeholder="No Telepon">
              </div>
              <div class="form-group first">
                <label for="pass">Password</label>
                <input class="form-control" type="password" name="ulangi_pass"  placeholder="Password" p>
              </div>
               <div class="form-group first">
                <label for="pass">Confirm Password</label>
                <input class="form-control" type="password" name="pass" placeholder="Confirm Password" >
              </div>
						 <input type="submit" value="Registrasi" class="btn btn-block btn-primary">
            <?php echo form_close() ?>
						<div class="form-group">
							<div class="col-xs-12">

									<label for="checkbox-signup">Sudah Punya Akun ? <a href="<?= base_url('pelanggan/login') ?>">Silahkan Login</a></label>
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