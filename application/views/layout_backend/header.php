<?php
if ($this->session->userdata('user') != NULL) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/e-umkm.jpeg">

    <title>UMKM KABUPATEN NGANJUK</title>

<!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/responsive.css" rel="stylesheet" type="text/css"/>

    <!-- Data Tables Select -->
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />

    <!-- Data Tables Date Picker -->
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index-2.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>UMKM KAB NGANJUK</span></a>
             
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                 <input type="text" placeholder="Search..." class="form-control">
                                 <a href="#"><i class="fa fa-search"></i></a>
                            </form>

  
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 230px;"><li class="list-group slimscroll-noti notification-list" style="overflow: hidden; width: auto; height: 230px;">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond noti-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog noti-warning"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-bell-o noti-custom"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">Updates</h5>
                                                    <p class="m-0">
                                                        <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-user-plus noti-pink"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New user registered</h5>
                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                            <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond noti-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>

                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog noti-warning"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                        </li><div class="slimScrollBar" style="background: rgb(152, 166, 173); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                        <li>
                                            <a href="javascript:void(0);" class="list-group-item text-right">
                                                <small class="font-600">See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
        </div>
    </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                         <div class="user-panel mt-4 pb-4 mb-4 d-flex">
                    </div>
                        <ul>
                             <li class="text-muted menu-title">Daftar Menu</li>
                             <li class="has_sub">
                                <a href="<?php echo base_url('Beranda'); ?>" id="brn"><i class="ti-home"></i> <span> Beranda </span></a>
                            </li>
                             <li class="has_sub">
                                <a href="<?php echo base_url('Beranda2'); ?>" id="brnd"><i class="ti-home"></i> <span>Beranda</span></a>
                            </li>
                             <li class="has_sub">
                                <a href="<?php echo base_url('Profile'); ?>" id="prof"><i class="ion-person"></i> <span>Profile</span></a>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo base_url('Pengguna'); ?>" id="usr"><i class=" md-accessibility"></i> <span>Data User</span></a>
                            </li>
                             <li class="has_sub">
                                <a href="<?php echo base_url('Kategori'); ?>" id="ktg"><i class="ti-briefcase"></i> <span>Data Kategori</span></a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" id="plp"><i class=" md-account-child"></i> <span>Data Pelapak UMKM</span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('Pelapakumkm'); ?>">Tampil Pelapak UMKM</a></li>
                                    <li><a href="<?php echo base_url('Pelapakumkm/add'); ?>">Input Pelapak UMKM</a></li>
                                </ul>
                            </li>
                             <li class="has_sub">
                                <a href="<?php echo base_url('lokasi'); ?>" id="lok"><i class="ion-pin"></i> <span>Lokasi UMKM</span></a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" id="rek"><i class="md md-attach-money"></i> <span>Rekening</span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('Rekening'); ?>">Rekening Dinas</a></li>
                                    <li><a href="<?php echo base_url('Rekeningpelapak'); ?>">Rekening Pelapak</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" id="prod"><i class="glyphicon glyphicon-picture"></i> <span>Data Produk UMKM</span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('Produk'); ?>">Tampil Produk UMKM</a></li>
                                    <li><a href="<?php echo base_url('Produk/add'); ?>">Input Produk UMKM</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo base_url('Pemesanan/pesanan_masuk'); ?>" id="trans"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Transaksi</span></a>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo base_url('Penarikan'); ?>" id="penarikan"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Penarikan Dana</span></a>
                            </li>
                             <li class="has_sub">
                                <a href="http://localhost/umkm/admin/logout"><i class="glyphicon glyphicon-log-out"></i></i> <span>Logout</span></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
<?php
    } else redirect(base_url('admin'));
    if ($this->session->userdata('level') == "Admin") {
        echo "<script>   
        document.getElementById('brn').style.display = 'none';
        document.getElementById('prod').style.display = 'none';
        document.getElementById('trans').style.display = 'none';
         </script>";
    }

    if ($this->session->userdata('level') == "Pelapak") {
        echo "<script> 
        document.getElementById('brnd').style.display = 'none';      
        document.getElementById('usr').style.display = 'none';
        document.getElementById('ktg').style.display = 'none';
        document.getElementById('lok').style.display = 'none';
        document.getElementById('plp').style.display = 'none';
        document.getElementById('rek').style.display = 'none';
        document.getElementById('penarikan').style.display = 'none';
        </script>";
    }
        ?>
</body>
</html>
