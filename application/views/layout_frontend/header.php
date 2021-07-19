<?php $dataKeranjang = 0;?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/e-umkm.jpeg">
    <title>UMKM KABUPATEN NGANJUK</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/modernizr.min.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
        </script>
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        disnakerkum.nganjukkab.go.id
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        (0358) 325200
                    </div>
                </div>
                <div class="ht-right">
                <div class="login-panel">
                    <?php if (!$this->session->userdata('idPelanggan')): ?>
                            <li><a href="<?php echo base_url('Pelanggan/login'); ?> "><i class="fa fa-user"></i>Login</a></li>
                        <?php else: ?>

                            <li><a  href="<?php echo base_url('Pelanggan/logout'); ?> "><i class="fa fa-user"></i>Logout</a></li>
                        <?php endif ?>
                    </div>
                        <div class="top-social">
                            <span class="badge badge-warning" style="font-size:16px; background-color: goldenrod;">Selamat Datang <?= $this->session->userdata('namaPelanggan') ?></span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="<?php echo base_url(); ?>assets/admin/images/e-umkm.jpeg">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Aplikasi UMKM</button>
                            <div class="input-group">
                                <input type="text" placeholder="Kabupaten Nganjuk">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                </a>
                            </li>
                           <li class="cart-icon">
                                <a href="#" class="site-header__cart" title="Cart">
                                    <i class="icon_bag_alt"></i>
                                    <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">0</span>
                                </a>
                                <div id="header-cart" class="cart-hover">
                                    <div class="select-items">
                                       <a href="#" class="site-header__cart" title="Cart"></a>
                                        <div id="header-cart" class="block block-cart">
                                            <ul class="mini-products-list"></ul>
                                        </div>
                                        <div class="select-total">
                                            <span>Total: </span><span class="product-price"><span class="money subtotal_keranjang"></span></span>
                                        </div>
                                        <div class="select-button">
                                            <a href="<?= base_url('Keranjang') ?>" class="primary-btn view-card">View Cart</a>
                                            <a href="<?= base_url('Pemesanan/pesanansaya') ?>" class="primary-btn checkout-btn">Check Out</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="<?php echo base_url('Home'); ?>">Home</a></li>
                        <li><a href="<?php echo base_url('Keranjang'); ?>">Keranjang</a></li>
                        <li><a href="<?php echo base_url('Pemesanan/pesanansaya'); ?>">Data Pemesanan</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    