<div id="page-wrapper"><br>
    <div class="row">   
            <div class="col-md-12" id="checkout">
                <ul class="nav nav-pills nav-justified page-header">
                    <li class="disabled"><a href="#" data-toggle="tab" title="Silahkan selesaikan terlebih dahulu"></i>Tambah<br><i class="fa fa-caret-up"></i></a></li>
                    <li class="active">
                        <a href="<?php echo base_url() ?>Produk/Spesifikasi" data-toggle="tab"></i>Spesifikasi<br> <i class="fa fa-caret-up"></i></a>
                    </li>
                </ul>                            
                <br>
                    <!-- Spesifikasi -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/tambahSpesifikasi">
                        <div class="box">
                            <?php echo $this->session->flashdata('status'); ?>
                            <fieldset class="tab-pane fade in active" id="spesifikasi">                                    
                                <div class="row panel panel-default">
                                    <div class="panel panel-heading">
                                        <h2 align="center">Mesin</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tipemesin">Tipe Mesin</label>
                                                <input type="text" class="form-control"  name="tipemesin" id="tipemesin" required>
                                                <input type="hidden" value="<?php echo $idProduk ?>" name="idProduk">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="silinder">Susunan Silinder</label>
                                                <input type="text" class="form-control" name="silinder" id="silinder" required>
                                        </div>
                                    </div>
                                        
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="diameterxlangkah">Diameter x Langkah</label>
                                                <input type="text" class="form-control" name="diameterxlangkah" id="diameterxlangkah" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kompresi">Perbandingan Kompresi</label>
                                                <input type="text" class="form-control" name="kompresi" id="kompresi" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="volumesilinder">Volume Silinder</label>
                                                <input type="text" class="form-control" name="volumesilinder" id="volumesilinder" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dayamaksimum">Daya Maksimum</label>
                                                <input type="text" class="form-control" name="dayamaksimum" id="dayamaksimum" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="torsi">Torsi Maksimum</label>
                                                <input type="text" class="form-control" name="torsi" id="torsi" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="starter">Sistem Starter</label>
                                                <input type="text" class="form-control" name="starter" id="starter" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pelumasan">Sistem Pelumasan</label>
                                                <input type="text" class="form-control" name="pelumasan" id="pelumasan" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="olimesin">Kapasistas Oli Mesin</label>
                                                <input type="text" class="form-control" name="olimesin" id="olimesin" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kopling">Tipe Kopling</label>
                                                <input type="text" class="form-control" name="kopling" id="kopling" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="transmisi">Transmisi</label>
                                                <input type="text" class="form-control" name="transmisi" id="transmisi" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sistembb">Sistem Bahan Bakar</label>
                                                <input type="text" class="form-control" name="sistembb" id="sistembb" required>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="col-sm-12 panel panel-heading">
                                        <h2 align="center">Dimensi</h2>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pxlxt">P x L x T</label>
                                                <input type="text" class="form-control" name="pxlxt" id="pxlxt" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sumburoda">Jarak Sumbu Roda</label>
                                                <input type="text" class="form-control" name="sumburoda" id="sumburoda" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jarakketanah">Jarak Terendah Ke Tanah</label>
                                                <input type="text" class="form-control" name="jarakketanah" id="jarakketanah" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jok">Tinggi Tempat Duduk</label>
                                                <input type="text" class="form-control" name="jok" id="jok" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tangkibensin">Kapasitas Tangki Bensin</label>
                                                <input type="text" class="form-control" name="tangkibensin" id="tangkibensin" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="beratisi">Berat Isi</label>
                                                <input type="text" class="form-control" name="beratisi" id="beratisi" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 panel panel-heading">
                                        <h2 align="center">Rangka</h2>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tiperangka">Tipe Rangka</label>
                                                <input type="text" class="form-control" name="tiperangka" id="tiperangka" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="suspensidepan">Suspensi Depan</label>
                                                <input type="text" class="form-control" name="suspensidepan" id="suspensidepan" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="suspensibelakang">Suspensi Belakang</label>
                                                <input type="text" class="form-control" name="suspensibelakang" id="suspensibelakang" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tipeban">Tipe Ban</label>
                                                <input type="text" class="form-control" name="tipeban" id="tipeban" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bandepan">Ban Depan</label>
                                                <input type="text" class="form-control" name="bandepan" id="bandepan" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="banbelakang">Ban Belakang</label>
                                                <input type="text" class="form-control" name="banbelakang" id="banbelakang" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="remdepan">Rem Depan</label>
                                                <input type="text" class="form-control" name="remdepan" id="remdepan" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="rembelakang">Rem Belakang</label>
                                                <input type="text" class="form-control" name="rembelakang" id="rembelakang" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 panel panel-heading">
                                        <h2 align="center">Kelistrikan</h2>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pengapian">Sistem Pengapian</label>
                                                <input type="text" class="form-control" name="pengapian" id="pengapian" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="battery">Tipe Battery</label>
                                                <input type="text" class="form-control" name="battery" id="battery" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="busi">Tipe Busi</label>
                                                <input type="text" class="form-control" name="busi" id="busi" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3"><br>
                                        <div class="form-group">
                                            <a href="#" class="btn btn-outline btn-danger btn-block">Batal <i class="fa fa-ban"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-md-3"><br>
                                        <div class="form-group">
                                            <button type="Submit" value="Upload" class="btn btn-outline btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
                                        </div>
                                    </div>                                            
                                </div>
                            </fieldset>
                            <!-- /.row -->
                        </div>
                        <!-- /.box -->
                    </form>                                                     
            </div>
            <!-- /.col-md-9 -->
    </div>
</div>
<!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->