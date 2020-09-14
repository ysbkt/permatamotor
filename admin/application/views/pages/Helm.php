<div id="page-wrapper"><br>
    <div class="row">   
            <div class="col-md-12" id="checkout">
                <h3 align="center">Halaman <i>Upload</i> Produk Helm</h3>
                <ul class="nav nav-pills nav-justified page-header">
                    <li class="active"><a href="#" data-toggle="tab"></i>Tambah<br><i class="fa fa-caret-up"></i></a></li>
                    <!-- <li class="disabled">
                        <a href="<?php echo base_url() ?>Produk/Spesifikasi" data-toggle="tab" text-muted></i>Spesifikasi<br> <i class="fa fa-caret-up"></i></a>
                    </li> -->
                </ul>                            
                <br>
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/tambahProduk">
                        <div class="box">
                            <div class="tab-content">
                                <fieldset class="tab-pane fade in active" id="tambahproduk">
                                    <div class="row panel panel-default"><br>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="namaproduk">Nama Produk</label>
                                                <input type="text" class="form-control" name="namaproduk" id="namaproduk" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis Produk</label>
                                                <select name="jenisproduk" class="form-control" id="jenisproduk">
                                                    <option value="" text-muted>-- Silahkan Pilih Produk --</option>
                                                    <?php 
                                                    foreach($jenisHelm as $helm){
                                                     ?>
                                                    <option value="<?php echo $helm->id ?>"><?php echo $helm->jenis_produk ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="kategori" id="kategori" class="form-control">
                                                    <option value="">--Pilih Kategori--</option>
                                                    <?php
                                                    foreach ($kategori as $item) { ?>
                                                    <option value="<?php echo $item->id ?> "><?php echo $item->id ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="warnaproduk">Warna Produk</label>
                                                <input type="text" class="form-control" name="warnaproduk" id="warnaproduk" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="harga">Harga Produk</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp.</i></span>
                                                    <input type="text" class="form-control" name="harga" id="hargaproduk" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="image">Pilih Gambar</label>
                                            <div class="imageupload">
                                                <!-- <div class="panel-heading clearfix">
                                                    <h3 class="panel-title pull-left">Upload Image</h3>
                                                </div> -->
                                                <div class="file-tab panel-default">
                                                    <label class="btn btn-default btn-file">
                                                        <span>Browse</span>
                                                        <!-- The file is stored here. -->
                                                        <input type="file" name="image" id="gambar">
                                                    </label>
                                                    <button type="button" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12"><br>
                                            <div class="form-group">
                                                <button type="Submit" value="Upload" class="btn btn-outline btn-lg btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- /.row -->
                            </div>
                        </div>
                    </form>                                                     
            </div>
            <!-- /.col-md-9 -->
    </div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper header-->