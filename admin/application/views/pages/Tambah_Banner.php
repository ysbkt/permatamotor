<div id="page-wrapper"><br>
    <div class="row">   
            <div class="col-md-12" id="checkout">
                <h3 align="center">Halaman <i>Upload Banner</i> </h3>
                <?php echo $this->session->flashdata('addbanner'); ?>
                <ul class="nav nav-pills nav-justified page-header">
                    <li class="active"><a href="#tambahproduk" data-toggle="tab"></i>Tambah<br><i class="fa fa-caret-up"></i></a></li>
                </ul>                            
                <br>
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Home/SaveTambahbanner">
                        <div class="box">
                            <div class="tab-content">
                                <fieldset class="tab-pane fade in active" id="tambahproduk">
                                    <div class="row panel panel-default"><br>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" name="title" id="title" required >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image">Pilih Gambar</label>
                                            <div class="imageupload">
                                                <div class="file-tab panel-default">
                                                    <label class="btn btn-default btn-file">
                                                        <span>Browse</span>
                                                        <!-- The file is stored here. -->
                                                        <input type="file" name="image" id="gambar" required>
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