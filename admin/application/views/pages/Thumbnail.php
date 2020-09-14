<div id="page-wrapper"><br>
    <div class="row">
        <div class="col-md-12">
                    <div class="box">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/tambahThumbnail">
                            <div class="box-header">
                                <h3 align="center">Halaman Tambah <i>Thumbnail</i> Motor</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <?php foreach ($produk as $data){ ?>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="namaproduk">Nama Produk</label>
                                        <input type="hidden" class="form-control" name="id_produk" id="id_produk" value="<?php echo $data->id ?>" readonly>
                                        <input type="text" class="form-control" name="namaproduk" id="namaproduk" value="<?php echo ucwords($data->nama_produk) ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="warnaproduk">Warna Produk</label>
                                        <input type="text" class="form-control" name="warnaproduk" id="warnaproduk" value="<?php echo ucwords($data->warna_produk) ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="harga">Harga Produk</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</i></span>
                                            <input type="text" class="form-control" name="harga" id="hargaproduk" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="<?php echo number_format($data->harga_produk) ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4"><hr>
                                    <div class="form-group">
                                        <label for="warna1">Warna Produk</label>
                                        <input type="text" class="form-control" name="warna1" id="warna1">
                                    </div>
                                    <label for="thumbnail1">Pilih Gambar</label>
                                    <div class="imageupload">
                                        <!-- <div class="panel-heading clearfix">
                                            <h3 class="panel-title pull-left">Upload Image</h3>
                                        </div> -->
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="thumbnail1" id="thumbnail1">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4"><hr>
                                    <div class="form-group">
                                        <label for="warna2">Warna Produk</label>
                                        <input type="text" class="form-control" name="warna2" id="warna2">
                                    </div>
                                    <label for="thumbnail2">Pilih Gambar</label>
                                    <div class="imageupload">
                                        <!-- <div class="panel-heading clearfix">
                                            <h3 class="panel-title pull-left">Upload Image</h3>
                                        </div> -->
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="thumbnail2" id="thumbnail2">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4"><hr>
                                    <div class="form-group">
                                        <label for="warna3">Warna Produk</label>
                                        <input type="text" class="form-control" name="warna3" id="warna3">
                                    </div>
                                    <label for="thumbnail3">Pilih Gambar</label>
                                    <div class="imageupload">
                                        <!-- <div class="panel-heading clearfix">
                                            <h3 class="panel-title pull-left">Upload Image</h3>
                                        </div> -->
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="thumbnail3" id="thumbnail3">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <br>
                            <div class="box-footer">
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url('Produk/List') ?>" class="btn btn-outline btn-md btn-danger btn-block">Batal </a>
                                </div>

                                <div class="col-sm-6">
                                    <button type="Submit" value="Upload" class="btn btn-outline btn-md btn-primary btn-block">Selesai </button>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                    <!-- /.row -->
            </div>
            <!-- /.col-md-9 -->
    </div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper header-->