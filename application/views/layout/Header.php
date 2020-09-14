<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title><?php echo $title ?></title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.vertical-tabs.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css">

    <!-- theme stylesheet -->
    <link href="<?php echo base_url(); ?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/float-panel.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
    <style>
        /*body {font-family:Verdana, sans-serif;}*/
        p {padding:20px 0;}

        #backtop {
            position: fixed;
            left:auto;right: 20px;top:auto;bottom: 20px;
            outline: none;
            overflow:hidden;
            color:#fff;
            text-align:center;
            background-color:rgba(49,79,96,0.84);
            height:40px;
            width:40px;
            line-height:40px;
            font-size:14px;
            border-radius:2px;
            cursor:pointer;
            transition:all 0.3s linear;
            z-index:999999;

            opacity:1;
            display:none;
        }
        #backtop:hover {
            background-color:#27CFC3;
        }
        #backtop.mcOut {
            opacity:0;
        }
    </style> 

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/icon-permata.png">
  </head>

  <body>

        <!-- *** TOPBAR ***
 _________________________________________________________ -->
    
    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->
    <!-- <div id="backtop">&#9650;</div> -->
    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>assets/img/permatamotor.png" style="max-width: 150px; max-height: 100px;" alt="Permata Motor" class="hidden-xs">
                    <img src="<?php echo base_url(); ?>assets/img/permatamotor.png" style="max-width: 150px; max-height: 100px;" alt="Permata Motor" class="visible-xs"><span class="sr-only"></span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify" style="color: #fff;"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search" style="color: #fff;"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="<?php echo base_url(); ?>Keranjang">
                        <i class="fa fa-shopping-cart" style="color: #fff;"></i>  <span class="hidden-xs"></span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="dropdown yamm-sw">
                        <a href="<?php echo base_url(''); ?>Kategori/full" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Produk<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5>Motor</h5>
                                            <ul>
                                                <?php
                                                    foreach ($kategori as $row){
                                                ?>                                      
                                                <li><a href="<?php echo base_url()?>Produk/Kategori/<?php echo $row['id'];?>"><?php echo $row['jenis_kategori'];?></a>
                                                <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- <div class="col-sm-4">
                                            <h5>Helm</h5>
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>produk">Cross</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>produk">Half Face</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>produk">Full Face</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>produk">Retro</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>Part & Accessories</h5>
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>produk">Yamalube</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>produk">YGP</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>produk">Accessories</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-hover="dropdown" href="<?php echo base_url('Promo'); ?>">Promo</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-hover="dropdown" href="<?php echo base_url();?>">Katalog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-hover="dropdown" href="<?php echo base_url();?>">Promosi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-hover="dropdown" href="<?php echo base_url();?>Kontak">Kontak</a>
                    </li> -->

                </ul>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="<?php echo base_url(); ?>Keranjang" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"> Keranjang</span></a>
                </div>
                <!--/.nav-collapse -->
                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"> Cari</i>
                    </button>
                </div>
            </div>

            <div class="collapse clearfix" id="search">
                <form class="navbar-form" role="search" action="<?php echo base_url('Produk/Search') ?>">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" placeholder="Cari" id="search" autofocus>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary" id="btn-search"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <!--/.nav-collapse -->
            
        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    