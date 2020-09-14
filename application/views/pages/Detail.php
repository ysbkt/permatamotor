<div id="all">

        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a>
                        </li>
                        <li>Motor</li>
                    </ul>
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
                <!-- <?php echo '<pre>'; print_r($detail); echo '</pre>'; ?> -->
                <div class="col-md-9">
                  <div class="row" id="productMain">
                    <?php foreach ($detail as $item) { ?>
                    <form method="post" action="<?php echo base_url();?>Keranjang/Tambah" method="post" accept-charset="utf-8">
                      <div class="col-sm-6">
                        <div id="mainImage">
                          <img id="myimage" class="img-responsive" src="<?php echo base_url() . 'admin/assets/img/produk/'.$item->jenis_produk.'/'.$item->jenis_kategori.'/'.$item->gambar ?>" style="max-height: 450px; width: 400px;" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="box">
                          <h3 class="text-center"><?php echo ucwords($item->nama_produk) ?></h3>
                          <strong><p class="goToDescription"><a href="#details" class="scroll-to">Spesifikasi</p></a></strong>
                          <span>
                            <!-- <i>Warna : <?php echo ucwords($item->warna_produk) ?></i><br> -->
                            <?php if ($item->stock == 'Ready Stock') { ?>
                            <span>Stock : <i style="color: green;"><?php echo $item->stock ?></i></span>
                            <?php }else{ ?>
                            <span>Stock : <i style="color: red;"><?php echo $item->stock ?></i></span><?php } ?>
                            <br>
                            <span>Dilihat : <?php echo $item->count_view ?> kali</span><br>
                            <span>Kategori : <?php echo ucwords($item->jenis_kategori) ?></span>
                            <p class="price">Rp. <?php echo number_format($item->harga_produk,0,",",".");?></p>
                          </span>
                          <p class="text-center buttons">
                            <input type="hidden" name="id" value="<?php echo $item->id_produk; ?>" />
                            <input type="hidden" name="nama" value="<?php echo $item->nama_produk; ?>" />
                            <input type="hidden" name="harga" value="<?php echo $item->harga_produk; ?>" />
                            <input type="hidden" name="gambar" value="<?php echo $item->gambar; ?>" />
                            <input type="hidden" name="qty" value="1" />
                            <!-- <input type="hidden" name="warna_produk" value="<?php echo $item->warna_produk ?>"> -->
                            <div class="col-xs-8"> 
                              <select class="form-control" name="warna_produk">
                                <option value="" text-muted>-- Silahkan Pilih Warna --</option>
                                <?php if (!empty($item->warna)) { ?>
                                <option value="<?php echo $item->warna ?>"><?php echo ucwords($item->warna) ?></option>
                                <?php } ?>
                                <?php if (!empty($item->warna_1)) { ?>
                                <option value="<?php echo $item->warna_1 ?>"><?php echo ucwords($item->warna_1) ?></option>
                                <?php } ?>
                                <?php if (!empty($item->warna_2)) { ?>
                                <option value="<?php echo $item->warna_2 ?>"><?php echo ucwords($item->warna_2) ?></option>
                                <?php } ?>
                                <?php if (!empty($item->warna_3)) { ?>
                                <option value="<?php echo $item->warna_3 ?>"><?php echo ucwords($item->warna_3) ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i>Beli</button>
                          </p>
                        </div>
                    </form>
                    
                      <div class="row" id="thumbs">
                          <div class="col-xs-3">
                            <a href="<?php echo base_url() . 'admin/assets/img/produk/'.$item->jenis_produk.'/'.$item->jenis_kategori.'/'.$item->gambar ?>" class="thumb" >
                              <img src="<?php echo base_url() . 'admin/assets/img/produk/'.$item->jenis_produk.'/'.$item->jenis_kategori.'/'.$item->gambar ?>" title="<?php echo ucwords($item->warna_produk) ?>" class="img-responsive">
                            </a>
                          </div>

                          <?php if ($item->thumbnail_1 == 'none'){
                            echo '';
                          }else { ?>
                          <div class="col-xs-3">
                            <a href="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$item->thumbnail_1 ?>" class="thumb">
                              <img src="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$item->thumbnail_1 ?>" title="<?php echo ucwords($item->warna_1) ?>" class="img-responsive">
                            </a>
                          </div>
                          <?php } ?>

                          <?php if ($item->thumbnail_2 == 'none'){
                            echo '';
                          }else { ?>
                          <div class="col-xs-3">
                            <a href="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$item->thumbnail_2 ?>" class="thumb">
                              <img src="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$item->thumbnail_2 ?>" title="<?php echo ucwords($item->warna_2) ?>" class="img-responsive">
                            </a>
                          </div>
                          <?php } ?>

                          <?php if ($item->thumbnail_3 == 'none'){
                            echo '';
                          }else { ?>
                          <div class="col-xs-3">
                            <a href="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$item->thumbnail_3 ?>" class="thumb">
                              <img src="<?php echo base_url().'admin/assets/img/produk/Thumbnail/'.$item->thumbnail_3 ?>" title="<?php echo ucwords($item->warna_3) ?>" class="img-responsive">
                            </a>
                          </div>
                          <?php } ?>
                        </div>

                    </div>
                  </div>

                  <div class="box" id="details">
                    <table class="table" style="color: grey;">
                      <h4 class="text-center">Spesifikasi <?php echo ucwords($item->nama_produk) ?></h4>
                      <thead>
                        <tr>
                          <th colspan="2" style="vertical-align: middle; text-align: center;"><h3>Mesin</h3></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tipe Mesin</dh>
                          <td><?php echo ucwords($item->tipe_mesin) ?></td>
                        </tr>
                        <tr>
                          <td>Susunan Silinder</td>
                          <td><?php echo ucwords($item->susunan_silinder) ?></td>
                        </tr>
                        <tr>
                          <td>Diameter X Langkah</td>
                          <td><?php echo ucwords($item->diameterxlangkah) ?></td>
                        </tr>
                        <tr>
                          <td>Perbandingan Kompresi</td>
                          <td><?php echo ucwords($item->kompresi) ?></td>
                        </tr>
                        <tr>
                          <td>Volume Silinder</td>
                          <td><?php echo ucwords($item->volume_silinder) ?></td>
                        </tr>
                        <tr>
                          <td>Daya Maksimum</td>
                          <td><?php echo ucwords($item->daya_maksimum) ?></td>
                        </tr>
                        <tr>
                          <td>Torsi Maksimum</td>
                          <td><?php echo ucwords($item->torsi) ?></td>
                        </tr>
                        <tr>
                          <td>Sistem Starter</td>
                          <td><?php echo ucwords($item->sistem_starter) ?></td>
                        </tr>
                        <tr>
                          <td>Sistem Pelumasan</td>
                          <td><?php echo ucwords($item->sistem_pelumasan) ?></td>
                        </tr>
                        <tr>
                          <td>Kapasitas Oli Mesin</td>
                          <td><?php echo ucwords($item->kapasitas_oli) ?></td>
                        </tr>
                        <tr>
                          <td>Tipe Kopling</td>
                          <td><?php echo ucwords($item->tipe_kopling) ?></td>
                        </tr>
                        <tr>
                          <td>Transmisi</td>
                          <td><?php echo ucwords($item->transmisi) ?></td>
                        </tr>
                        <tr>
                          <td>Sistem bahan bakar</td>
                          <td><?php echo ucwords($item->sistem_bhn_bkr) ?></td>
                        </tr>

                        <tr>
                          <th colspan="2" style="vertical-align: middle; text-align: center;"><h3>Dimensi</h3></th>
                          <td></td>
                        </tr>
                        <tr>
                          <td>P x L x T</td>
                          <td><?php echo ucwords($item->pxlxt) ?></td>
                        </tr>
                        <tr>
                          <td>Jarak sumbu roda</td>
                          <td><?php echo ucwords($item->jarak_sumbu_roda) ?></td>
                        </tr>
                        <tr>
                          <td>Jarak terendah ke tanah</td>
                          <td><?php echo ucwords($item->jarak_terendah) ?></td>
                        </tr>
                        <tr>
                          <td>Tinggi tempat duduk</td>
                          <td><?php echo ucwords($item->tinggi_tempat_duduk) ?></td>
                        </tr>
                        <tr>
                          <td>Kapasitas tangki bensin</td>
                          <td><?php echo ucwords($item->tangki_bensin) ?></td>
                        </tr>
                        <tr>
                          <td>Berat isi</td>
                          <td><?php echo ucwords($item->berat_isi) ?></td>
                        </tr>

                        <tr>
                          <th colspan="2" style="vertical-align: middle; text-align: center;"><h3>Rangka</h3></th>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Tipe Rangka</td>
                          <td><?php echo ucwords($item->tipe_rangka) ?></td>
                        </tr>
                        <tr>
                          <td>Suspensi Depan</td>
                          <td><?php echo ucwords($item->suspensi_depan) ?></td>
                        </tr>
                        <tr>
                          <td>Suspensi Belakang</td>
                          <td><?php echo ucwords($item->suspensi_belakang) ?></td>
                        </tr>
                        <tr>
                          <td>Tipe Ban</td>
                          <td><?php echo ucwords($item->tipe_ban) ?></td>
                        </tr>
                        <tr>
                          <td>Ban Depan</td>
                          <td><?php echo ucwords($item->ban_depan) ?></td>
                        </tr>
                        <tr>
                          <td>Ban Belakang</td>
                          <td><?php echo ucwords($item->ban_belakang) ?></td>
                        </tr>
                        <tr>
                          <td>Rem Depan</td>
                          <td><?php echo ucwords($item->rem_depan) ?></td>
                        </tr>
                        <tr>
                          <td>Rem Belakang</td>
                          <td><?php echo ucwords($item->rem_belakang) ?></td>
                        </tr>
                        <tr>
                          <th colspan="2" style="vertical-align: middle; text-align: center;"><h3>Kelistrikan</h3></th>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Sistem Pengapian</td>
                          <td><?php echo ucwords($item->sistem_pengapian) ?></td>
                        </tr>
                        <tr>
                          <td>Tipe Battery</td>
                          <td><?php echo ucwords($item->tipe_battery) ?></td>
                        </tr>
                        <tr>
                          <td>Tipe Busi</td>
                          <td><?php echo ucwords($item->tipe_busi) ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <?php } ?>

                  <!-- <?php echo "<pre>"; print_r($harga); echo "</pre>"; ?> -->
                  <!-- <div class="box" id="details">
                    <table class="table table-striped" style="color: grey;">
                      <thead>
                        <tr>
                          <th scope="col" style="vertical-align: middle;" text-align="center">DP</th>
                          <th scope="col" style="vertical-align: middle;" text-align="center">11 x</th>
                          <th scope="col" style="vertical-align: middle;" text-align="center">17 x</th>
                          <th scope="col" style="vertical-align: middle;" text-align="center">23 x</th>
                          <th scope="col" style="vertical-align: middle;" text-align="center">29 x</th>
                          <th scope="col" style="vertical-align: middle;" text-align="center">35 x</th>
                        </tr>
                      </thead>
                      <?php foreach ($harga as $data){ ?>
                      <tbody>
                        <tr>
                          <th scope="row">Rp. <?php echo number_format($data->dp, 0,",",".") ?></th>
                          <td>Rp. <?php echo number_format($data->tenor_11, 0,",",".") ?></td>
                          <td>Rp. <?php echo number_format($data->tenor_17, 0,",",".") ?></td>
                          <td>Rp. <?php echo number_format($data->tenor_23, 0,",",".") ?></td>
                          <td>Rp. <?php echo number_format($data->tenor_29, 0,",",".") ?></td>
                          <td>Rp. <?php echo number_format($data->tenor_35, 0,",",".") ?></td>
                        </tr>
                      </tbody>
                      <?php } ?>
                    </table>
                  </div> -->
                  <?php foreach ($detail as $data) { ?>
                  <?php if (empty($data->gambar_price_list)) {
                    echo ""; }else { ?>
                  <div class="box" id="details">
                    <table class="table table-striped" style="color: grey;">
                      <img src="<?php echo base_url().'admin/assets/img/produk/Motor/Price_List/'.$data->gambar_price_list; ?>" class="img-responsive img-thumbnail rounded" style="max-width: 800px; vertical-align: middle;">
                    </table>
                  </div>
                  <?php } } ?>

                 <!--  <form class="box">
                    <h2>Silahkan tulis komentar Anda</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="subject">Judul</label>
                                    <input type="text" class="form-control" id="subject">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message">Pesan</label>
                                    <textarea id="message" class="form-control" style="resize:none; max-width:780px; height:200px;" placeholder="Tinggalkan pesan anda disini..."></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Kirim Pesan</button>

                            </div>
                        </div>
                    </form> -->

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->