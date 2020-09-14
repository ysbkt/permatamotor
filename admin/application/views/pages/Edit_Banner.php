<div id="page-wrapper"><br>
    <div class="row">
            <div class="col-md-12">
                    <div class="box">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Home/SaveEditBanner">
                            <div class="box-header">
                                <h3 align="center">Halaman <i>Upload</i> Produk Motor</h3>
                            </div>
                          <?php echo $this->session->flashdata('banner'); ?>
                            <div class="row panel panel-default"><br>
                                <?php foreach ($banner as $item){ ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" value="<?php echo ucwords($item->title) ?>" required >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="image">Banner Lama</label><br>
                                    <img src="<?php echo base_url().'assets/img/banner/'.$item->image; ?>" class="img-thumbnail rounded" style="max-width: 90%; vertical-align: middle;">
                                    <div class="imageupload"><br>
                                        <div class="file-tab panel-default">
                                            <label class="btn btn-default btn-file">
                                                <span>Browse</span>
                                                <!-- The file is stored here. -->
                                                <input type="file" name="image" id="gambar">
                                            </label>
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </div><br>
                                        <input type="hidden" name="banner_hide" id="bannerr_hide" value="<?php echo $item->image; ?>">
                                        <input type="hidden" name="id" id="id" value="<?php echo $item->id; ?>">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="box-footer">
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url() ?>Home/Banner" class="btn btn-outline btn-lg btn-danger btn-block"><i class="fa fa-step-backward"></i> Batal</a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="Submit" value="Upload" class="btn btn-outline btn-lg btn-primary btn-block">Simpan <i class="fa fa-save"></i></button><br>
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