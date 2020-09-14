 <!-- <?php echo '<pre>'; print_r($produk); print_r($listKategori) ?> -->
 <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider" class="main-slider flexslider">
                    <?php foreach ($banner as $bnr) { ?>
                        <div class="item">
                            <img src="<?php echo base_url(); ?>admin/assets/img/banner/<?php echo $bnr->image ?>" alt="" class="img-responsive">
                        </div>
                    <?php } ?>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best prices</a></h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Produk Permata Motor</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="box">
                        <!-- <div class="col-lg-12"> -->
                            <h4>Moped</h4>
                        <!-- </div> -->
                    </div> 

                    <div class="product-slider">
                        <?php foreach ($moped as $data) { ?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container"><br>
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>">
                                                <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Moped/<?php echo $data->gambar ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url("Produk/Detail"); ?>/<?php echo $data->id ?>">
                                                <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Moped/<?php echo $data->gambar ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>" class="invisible">
                                    <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Moped/<?php echo $data->gambar ?>" style="height: 150px;" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>
                                        <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>"><?php echo strtoupper($data->nama_produk) ?>
                                        </a>
                                    </h3>
                                    <?php if ($data->stock == 'Ready Stock') { ?>
                                    <span>Stock : <i style="color: green;"><?php echo $data->stock ?></i></span>
                                    <?php }else{ ?>
                                    <span>Stock : <i style="color: red;"><?php echo $data->stock ?></i></span>
                                    <?php } ?>
                                    <br>
                                    <span>Dilihat : <?php echo $data->count_view ?> kali</span>
                                    <br><br>
                                    <p class="price">Rp. <?php echo number_format($data->harga_produk,0,",",".") ?></p>
                                    <i><sup>*klik gambar untuk melihat detail</sup></i>
                                </div>
                                <!-- /.text -->
                            </div>
                        </div>
                            <?php } ?>
                    </div>                    
                    <!-- /.product-slider -->
                    <div class="pages">
                        <p class="loadMore">
                            <a href="<?php echo base_url(); ?>Produk/Kategori" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Selengkapnya</a>
                        </p>
                    </div>
                </div>
                <!-- /.container -->

                <div class="container">
                    <div class="box">
                        <!-- <div class="col-lg-12"> -->
                            <h4>Matik</h4>
                        <!-- </div> -->
                    </div> 

                    <div class="product-slider">
                        <?php foreach ($matik as $data) { ?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container"><br>
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>">
                                                <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Matik/<?php echo $data->gambar ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>">
                                                <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Matik/<?php echo $data->gambar ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>" class="invisible">
                                    <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Matik/<?php echo $data->gambar ?>" style="height: 150px;" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>
                                        <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>"><?php echo strtoupper($data->nama_produk) ?>
                                        </a>
                                    </h3>
                                    <?php if ($data->stock == 'Ready Stock') { ?>
                                    <span>Stock : <i style="color: green;"><?php echo $data->stock ?></i></span>
                                    <?php }else{ ?>
                                    <span>Stock : <i style="color: red;"><?php echo $data->stock ?></i></span>
                                    <?php } ?>
                                    <br>
                                    <span>Dilihat   : <?php echo $data->count_view ?> kali</span>
                                    <br><br>
                                    <p class="price">Rp. <?php echo number_format($data->harga_produk) ?></p>
                                    <i><sup>*klik gambar untuk melihat detail</sup></i>
                                </div>
                                <!-- /.text -->
                            </div>
                        </div>
                            <?php } ?>
                    </div>                    
                    <!-- /.product-slider -->
                    <div class="pages">
                        <p class="loadMore">
                            <a href="<?php echo base_url(); ?>Produk/Kategori" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Selengkapnya</a>
                        </p>
                    </div>
                </div>
                <!-- /.container -->

                <div class="container">
                    <div class="box">
                        <!-- <div class="col-lg-12"> -->
                            <h4>Sport</h4>
                        <!-- </div> -->
                    </div> 

                    <div class="product-slider">
                        <?php foreach ($sport as $data) { ?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container"><br>
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>">
                                                <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Sport/<?php echo $data->gambar ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>">
                                                <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Sport/<?php echo $data->gambar ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>" class="invisible">
                                    <img src="<?php echo base_url()?>admin/assets/img/produk/Motor/Sport/<?php echo $data->gambar ?>" style="height: 150px;" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>
                                        <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data->id ?>"><?php echo strtoupper($data->nama_produk) ?>
                                        </a>
                                    </h3>
                                    <?php if ($data->stock == 'Ready Stock') { ?>
                                    <span>Stock : <i style="color: green;"><?php echo $data->stock ?></i></span>
                                    <?php }else{ ?>
                                    <span>Stock : <i style="color: red;"><?php echo $data->stock ?></i></span>
                                    <?php } ?>
                                    <br>
                                    <span>Dilihat   : <?php echo $data->count_view ?> kali</span>
                                    <br><br>
                                    <p class="price">Rp. <?php echo number_format($data->harga_produk) ?></p>
                                    <i><sup>*klik gambar untuk melihat detail</sup></i>
                                </div>
                                <!-- /.text -->
                            </div>
                        </div>
                            <?php } ?>
                    </div>                    
                    <!-- /.product-slider -->
                    <div class="pages">
                        <p class="loadMore">
                            <a href="<?php echo base_url(); ?>Produk/Kategori" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Selengkapnya</a>
                        </p>
                    </div>
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

        </div>
        <!-- /#content -->