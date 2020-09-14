<div id="all">

        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a>
                        </li>
                        <li>Motor</li>
                    </ul>
                </div><br><br><br>

                <div class="col-md-12">
                <?php echo $this->session->flashdata('status'); ?>                    
                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu list-group">
                        <div class="panel-heading">
                          <h3 class="panel-title" align="center"><strong>Kategori</strong></h3>
                        </div>
                        <a class="list-group-item" href="<?php echo base_url()?>Produk/" >Semua</a>
                        <?php
                            foreach ($kategori as $row){
                        ?>
                        <a class="list-group-item" href="<?php echo base_url()?>Produk/Kategori/<?php echo $row['id'];?>"><?php echo $row['jenis_kategori'];?></a>
                                <?php } ?>
                    </div>

                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h3>
                        </div>
                        <!-- <div class="panel-body list-group-item"> -->
                          <?php
                            $cart = $this->cart->contents();

                            if (empty($cart)){
                                ?>
                                <a class="list-group-item" align="center">Keranjang Belanja Masih Kosong</a>
                                <?php
                            } else{
                                $no = 1;
                                $grandTotal = 0;
                                foreach ($cart as $item) {
                                    $grandTotal+=$item['subtotal'];
                                ?>
                                <a class="list-group-item"><span style="color: red;">[ <?php echo $no++; ?> ]</span> <?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo number_format($item['price'],0,",","."); ?>) = <?php echo number_format($item['subtotal'],0,",","."); ?></a>
                                <?php
                                }
                            ?>

                            <?php
                            }
                        ?>
                        <!-- </div> -->
                    </div>
                </div>                
                
                <div class="col-md-9">
                    <!-- <?php echo "<pre>"; print_r($produk); echo "</pre>"; ?> -->
                    <div class="col-md-12 well category-content" id="Moped">
                        <?php
                          foreach ($produk as $data) {
                        ?>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="product">
                                <form method="post" action="<?php echo base_url();?>Keranjang/Tambah" method="post" accept-charset="utf-8">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><br>
                                                <a href="#"><img class="img-responsive" src="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$data['gambar']; ?>"/></a>
                                            </div>
                                            <div class="back"><br>
                                                <a href="#"><img class="img-responsive" src="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$data['gambar']; ?>"/></a>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data['id'] ?>" class="invisible">
                                        <img src="<?php echo base_url() . 'admin/assets/img/produk/Thumbnail/'.$data['gambar']; ?>" style="height: 150px;" alt="" class="img-responsive">
                                    </a>
                                    <br><br>
                                    <div class="text"><br>
                                        <div class="card-body">
                                            <h3 class="card-title">
                                                <a href="<?php echo base_url("Produk/Detail") ?>/<?php echo $data['id'] ?>"><?php echo ucwords($data['nama_produk']) ?></a>
                                            </h3>
                                            <p class="price">Rp. <?php echo number_format($data['harga_produk'],0,",",".");?></p>
                                            <!-- <i>Warna : <?php echo ucwords($data['warna_produk']) ?></i><br> -->
                                            <?php if ($data['stock'] == 'Ready Stock') { ?>
                                            <span>Stock : <i style="color: green;"><?php echo $data['stock'] ?></i></span>
                                            <?php }else{ ?>
                                            <span>Stock : <i style="color: red;"><?php echo $data['stock'] ?></i></span><?php } ?>
                                            <br>
                                            <span>Dilihat   : <?php echo $data['count_view'] ?> kali</span>
                                        </div>

                                        <div class="card-footer">
                                            <p class="buttons"><br>
                                                <a href="<?php echo base_url();?>Produk/Detail/<?php echo $data['id'];?>" class="btn btn-default"> <span>Lihat Detail</span>
                                                </a>
                                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                                <input type="hidden" name="nama" value="<?php echo $data['nama_produk']; ?>" />
                                                <input type="hidden" name="harga" value="<?php echo $data['harga_produk']; ?>" />
                                                <input type="hidden" name="gambar" value="<?php echo $data['gambar']; ?>" />
                                                <input type="hidden" name="qty" value="1" />
                                                <input type="hidden" name="warna_produk" value="<?php echo $data['warna_produk'] ?> ">
                                                <button type="submit" class="btn btn-sm btn-primary"><span class="fa fa-shopping-cart"></span> Beli</button>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- <div class="pages">
                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div> -->

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->