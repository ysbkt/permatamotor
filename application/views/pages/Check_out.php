<div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li><i class="fa fa-shopping-cart"> Keranjang Belanja</i></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <?php echo $this->session->flashdata('status'); ?>
                    <div class="box">
                        <div class="box-header">
                            <h4>1. Pesanan Anda</h4>
                        </div>
                        <form action="<?php echo base_url()?>Keranjang/Edit" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
                            <?php
                            if ($cart = $this->cart->contents())
                            { ?>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th width="15%">Gambar</th>
                                                <th width="20%">Produk</th>
                                                <th width="20%">Warna</th>
                                                <th width="20%">Harga Per Unit</th>
                                                <th width="10%">Qty</th>
                                                <th width="20%">Jumlah</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <!-- <?php echo "<pre>"; print_r($cart); echo "</pre>" ?> -->
                                        <tbody>
                                            <?php
                                            // Create form and send all values in "shopping/update_cart" function.
                                            $grand_total = 0;
                                            $i = 1;

                                            foreach ($cart as $item):
                                            $grand_total = $grand_total + $item['subtotal'];
                                            ?>
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][id]" value="<?php echo $item['id'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][name]" value="<?php echo $item['name'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][price]" value="<?php echo $item['price'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][gambar]" value="<?php echo $item['gambar'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'];?>" />
                                            <input type="hidden" name="cart[<?php echo $item['id'];?>][warna_produk]" value="<?php echo $item['warna_produk'];?>" />
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><img src="<?php echo base_url() . 'admin/assets/img/produk/Thumbnail/'.$item['gambar']; ?>" title="<?php echo ucwords($item['name']) ?>" style="max-height: 80px; max-width: 80px;"></td>
                                                <td><?php echo ucwords($item['name']); ?></td>
                                                <td><?php echo ucwords($item['warna_produk']) ?></td>
                                                <td>Rp. <?php echo number_format($item['price'], 0,",","."); ?></td>
                                                <td>
                                                    <input type="text" style="text-align: center; max-width: 50px;" class="form-control input-sm" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'];?>" id="jumlahOrder" maxlength="3" />
                                                </td>
                                                <td>Rp. <?php echo number_format($item['subtotal'], 0,",",".") ?></td>
                                                <td><a href="<?php echo base_url()?>Keranjang/Hapus/<?php echo $item['rowid'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" title="Hapus Produk"></a></td>
                                                <?php endforeach; ?>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th>Order Total :</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><b> Rp <?php echo number_format($grand_total, 0,",","."); ?></b></th>
                                                    <th></th>
                                                </tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <!-- <a href="<?php echo base_url(); ?>shopping" class="btn btn-default"><i class="fa fa-chevron-left"></i> Lanjutkan Belanja</a> -->
                                    </div>
                                    <div class="pull-right">
                                        <a data-toggle="modal" data-target="#myModal"  class ='btn btn-danger'>Kosongkan Cart</a>
                                        <button class='btn btn-default'  type="submit"><i class="fa fa-refresh"></i> Update Cart</button>
                                        <!-- <a href="<?php echo base_url()?>shopping/check_out"  class ='btn btn-primary'>Check Out <i class="fa fa-chevron-right"></i></a> -->
                                    </div>
                                </div>
                        </form>
                    </div>

                    <div class="box">
                        <form class="form" action="<?php echo base_url()?>Keranjang/Order" method="post" name="frmCO" id="frmCO">
                            <div class="box-header">
                                <h4>2. Data Diri</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-success has-feedback">
                                        <label for="firstName">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group has-success has-feedback">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group has-success has-feedback">
                                        <label for="phoneNumber">Telepon / Handphone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">+62</i></span>
                                            <input type="tel" class="form-control" name="telepon" id="telepon" onkeypress="return Angka(event)" maxlength="12" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-success has-feedback">
                                        <label for="lastName">Alamat</label>
                                        <textarea style="resize:none; max-width:520px; height:110px;" type="text" class="form-control" name="alamat" id="alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group has-success has-feedback">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" id="kelurahan" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group has-success has-feedback">
                                        <label for="Kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group has-success has-feedback">
                                        <label for="kota">Kota</label>
                                        <input class="form-control" name="kota" id="kota" required></input>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group has-success has-feedback">
                                        <label for="kodepos">Kode Pos</label>
                                        <input class="form-control" onkeypress="return Angka(event)" name="kodepos" id="kodepos" maxlength="5" required></input>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-success has-feedback">
                                        <label>Metode Pembayaran</label>
                                        <select class="form-control" name="metode_pembayaran" id="metode_pembayaran" onchange="pembayaran_onchange()">
                                            <option value="" text-muted>-- Metode Pembayaran --</option>
                                            <option value="cash">Cash</option>
                                            <option value="kredit">Kredit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-success has-feedback">
                                        <label for="tenor" id="label_tenor">Tenor</label>
                                        <select class="form-control" name="tenor" id="tenor" required></select>
                                    </div>
                                </div>
                            </div>
                            <p disabled><small>*Pastikan data yang anda masukkan sudah benar</small></p>
                            <div class="box-footer">
                                <div class="pull-left">
                                    <div class="form-group has-success has-feedback">
                                        <div class="col-sm-6">
                                            <a href="<?php echo base_url(); ?>page" class="btn btn-default"><i class="fa fa-chevron-left"></i> Lanjutkan Belanja</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="form-group  has-success has-feedback">
                                        <div class=" col-sm-6">
                                            <button type="submit" class="btn btn-primary">Proses Order <i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php }
                            else {
                                echo "<h3 align='center'><img src='".base_url()."assets/img/sad.png' style=' height: 100px'><br>Keranjang Belanja masih kosong</h3>"; 
                            }   ?>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <script>
        function pembayaran_onchange(){
            var metode_pembayaran   = document.getElementById("metode_pembayaran").value;
            var tenor               = document.getElementById("tenor");
            var label_tenor         = document.getElementById("label_tenor").value;

            for(var i=tenor.options.length-1;i>=0;i--){
                tenor.remove(i);
            }

            if(metode_pembayaran=="cash"){
                document.getElementById("label_tenor").innerHTML = "Cash";
                tenor.setAttribute("disabled","disabled");
            }
            else if(metode_pembayaran=="kredit"){
                document.getElementById("label_tenor").innerHTML = "Tenor";
                tenor.removeAttribute("disabled");
                var option = document.createElement('option');
                option.text = "11 Bulan";
                option.value="11 Bulan";
                tenor.add(option);
                option = document.createElement('option');
                option.text = "17 Bulan";
                option.value="17 Bulan";
                tenor.add(option);
                option = document.createElement('option');
                option.text = "23 Bulan";
                option.value="23 Bulan";
                tenor.add(option);
                option = document.createElement('option');
                option.text = "29 Bulan";
                option.value="29 Bulan";
                tenor.add(option);
                option = document.createElement('option');
                option.text = "35 Bulan";
                option.value="35 Bulan";
                tenor.add(option);
            }
        }
        </script>

          <!-- Modal Penilai -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
              <!-- Modal content-->
              <div class="modal-content">
                <form method="post" action="<?php echo base_url()?>Keranjang/Hapus/all">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Anda yakin mau mengosongkan Shopping Cart?                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
                  <button type="submit" class="btn btn-sm btn-default">Ya</button>
                </div>
                
                </form>
              </div>
              
            </div>
          </div>
          <!--End Modal-->