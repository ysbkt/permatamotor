<div id="page-wrapper"><br>
    <div class="row">
            <div class="col-md-12">
                    <div class="box">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/TambahGambarPricelist">
                            <div class="box-header">
                                <h3 align="center">Halaman <i>Upload</i> Produk Motor</h3>
                            </div>
                            <div class="row panel panel-default"><br>
                                <?php foreach ($produk as $item){ ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="namaproduk">Nama Produk</label>
                                        <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $item->id_produk ?>">
                                        <input type="text" class="form-control" name="namaproduk" id="namaproduk" value="<?php echo ucwords($item->nama_produk) ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="harga">Harga Produk</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</i></span>
                                            <input type="text" class="form-control" name="harga" id="hargaproduk" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="<?php echo number_format($item->harga_produk, 0,",",".") ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="image">Price List Lama</label>
                                    <p></p>
                                    <img src="<?php echo base_url().'assets/img/produk/Motor/Price_List/'.$item->gambar_price_list; ?>" class="img-thumbnail rounded" style="max-width: 500px; vertical-align: middle;">
                                    <hr>
                                </div>

                                <div class="col-sm-6">
                                    <div class="imageupload">
                                        <label for="image">Price List Baru</label>
                                        <p></p>
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="image" id="gambar">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div><br>
                                        <!-- <input type="hidden" name="image_hide" id="gambar_hide" value="<?php echo $item->gambar; ?>"> -->
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="box-footer"><br>
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url() ?>Produk/List" class="btn btn-outline btn-lg btn-danger btn-block"><i class="fa fa-step-backward"></i> Batal</a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="Submit" value="Upload" class="btn btn-outline btn-lg btn-primary btn-block">Simpan <i class="fa fa-step-forward"></i></button><br>
                                </div>
                            </div><br>
                        </form>
                    </div>
            </div>
            <!-- /.col-md-12 -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper header-->