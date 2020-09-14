<div id="page-wrapper"><br>
    <div class="row">
            <div class="col-md-12">
                    <div class="box">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/saveEditMotor">
                            <div class="box-header">
                                <h3 align="center">Halaman <i>Upload</i> Produk Motor</h3>
                            </div>
                            <div class="row panel panel-default"><br>
                                <?php foreach ($produk as $item){ ?>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="namaproduk">Nama Produk</label>
                                        <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $item->id_produk ?>">
                                        <input type="text" class="form-control" name="namaproduk" id="namaproduk" value="<?php echo $item->nama_produk ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Jenis Produk</label>
                                        <select name="jenisproduk" class="form-control" id="jenisproduk" required>
                                            <option value="" text-muted>-- Silahkan Pilih Produk --</option>
                                            <?php
                                            foreach($jenisMotor as $motor){ ?>
                                            <option value="<?php echo $motor->id ?>"><?php echo $motor->jenis_produk ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control" required>
                                            <option value="">--Pilih Kategori--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="harga">Harga Produk</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</i></span>
                                            <input type="text" class="form-control" name="harga" id="hargaproduk" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="<?php echo $item->harga_produk ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="warnaproduk">Warna Produk</label>
                                        <input type="text" class="form-control" name="warnaproduk" id="warnaproduk" value="<?php echo ucwords($item->warna) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="warnaproduk">Warna Produk</label>
                                        <input type="text" class="form-control" name="warnaproduk" id="warnaproduk" value="<?php echo ucwords($item->warna_1) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="warnaproduk">Warna Produk</label>
                                        <input type="text" class="form-control" name="warnaproduk" id="warnaproduk" value="<?php echo ucwords($item->warna_2) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="warnaproduk">Warna Produk</label>
                                        <input type="text" class="form-control" name="warnaproduk" id="warnaproduk" value="<?php echo ucwords($item->warna_3) ?>">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="image">Gambar Utama</label><br>
                                    <p class="text-center">(gambar lama)</p>
                                    <img src="<?php echo base_url().'assets/img/produk/'.$item->jenis_produk.'/'.$item->jenis_kategori."/".$item->gambar; ?>" class="img-thumbnail rounded" style="max-width: 200px; vertical-align: middle;">
                                    <div class="imageupload"><br>
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="image" id="gambar">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div><br>
                                        <input type="hidden" name="image_hide" id="gambar_hide" value="<?php echo $item->gambar; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="image">Thumbnail 1</label><br>
                                    <p class="text-center">(gambar lama)</p>
                                    <img src="<?php echo base_url().'assets/img/produk/Thumbnail/'.$item->thumbnail_1; ?>" class="img-thumbnail rounded" style="max-width: 200px; vertical-align: middle;">
                                    <div class="imageupload"><br>
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="thumbnail1" id="thumbnail1">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div>
                                        <input type="hidden" name="thumbnail1_hide" id="thumbnail1_hide" value="<?php echo $item->thumbnail_1; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="image">Thumbnail 2</label><br>
                                    <p class="text-center">(gambar lama)</p>
                                    <img src="<?php echo base_url().'assets/img/produk/Thumbnail/'.$item->thumbnail_2; ?>" class="img-thumbnail rounded" style="max-width: 200px; vertical-align: middle;">
                                    <div class="imageupload"><br>
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="thumbnail2" id="thumbnail2">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div>
                                        <input type="hidden" name="thumbnail2_hide" id="thumbnail2_hide" value="<?php echo $item->thumbnail_2; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="image">Thumbnail 3</label><br>
                                    <p class="text-center">(gambar lama)</p>
                                    <img src="<?php echo base_url().'assets/img/produk/Thumbnail/'.$item->thumbnail_3; ?>" class="img-thumbnail rounded" style="max-width: 200px; vertical-align: middle;">
                                    <div class="imageupload"><br>
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="thumbnail3" id="thumbnail3">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div>
                                        <input type="hidden" name="thumbnail3_hide" id="thumbnail3_hide" value="<?php echo $item->thumbnail_3; ?>">
                                    </div><br>
                                </div>
                            <?php } ?>
                            <div class="box-footer col-md-12">
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url() ?>Produk/List" class="btn btn-outline btn-lg btn-danger btn-block"><i class="fa fa-step-backward"></i> Batal</a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="Submit" value="Upload" class="btn btn-outline btn-lg btn-primary btn-block">Simpan <i class="fa fa-step-forward"></i></button><br>
                                </div>
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