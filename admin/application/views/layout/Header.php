<?php
date_default_timezone_set('Asia/Jakarta');
if (empty($this->session->userdata['status_login'])) {

echo '<script language="javascript" type="text/javascript"> 
            alert("Anda harus login terlebih dahulu");
            window.location.href="Auth"
            </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?> </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.css.map" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap-imageupload.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">

    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>

</head>

<body onload="startTime()">
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h4 class="navbar-brand">Selamat Datang, <?php echo ucwords($this->session->userdata('email')); ?> </h4>
            </div>
            <!-- /.navbar-header -->

            <div class="nav navbar-top-links navbar-right">
                        <li><a href="<?php echo base_url('Auth/Logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                                <span class="input-group-btn">
                                    <span class="navbar-brand"><?php echo date("d F y") ?> <span id="txt"></span></span>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Home"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus-circle fa-fw"></i> Tambah<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Produk<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url() ?>Produk"><i class="fa fa-motorcycle fa-fw"></i> Motor</a>
                                        </li>
                                        <!-- <li>
                                            <a href="<?php echo base_url() ?>Produk/Helm"><i class="fa fa-drupal fa-fw"></i> Helm</a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Parts & Accessories</a>
                                        </li> -->
                                    </ul>
                                    <!-- /.nav-third-level -->
                                    <li>
                                        <a href="<?php echo base_url(); ?>Home/TambahBanner"><i class="fa fa-image fa-fw"></i> Banner</a>
                                    </li>
                                     <!-- <li>
                                        <a href="#"><i class="fa fa-bold fa-fw"></i> Blog</a>
                                    </li> -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('Produk/List') ?>"><i class="fa fa-list-ul fa-fw"></i> List Produk</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Home/Banner') ?>"><i class="fa fa-th-large fa-fw"></i> List Banner</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Produk/Promo') ?>"><i class="fa fa-th-large fa-fw"></i> Promo</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Home/Tables') ?>"><i class="fa fa-table fa-fw"></i> Data Konsumen</a>
                        </li>
                        <?php if ($this->session->userdata('level') == 'Admin') { ?>
                        <li>
                            <a href="#"><i class="fa fa-user"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo base_url('User') ?>"><i class="fa fa-user-plus"></i> Tambah </a></li>
                                <li><a href="<?php echo base_url('User/ManageUser') ?>"><i class="fa chalkboard-teacher"></i>Manage </a></li>
                            </ul>
                        </li>
                        <?php } else{

                        } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>