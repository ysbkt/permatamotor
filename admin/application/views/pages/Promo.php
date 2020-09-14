<div id="page-wrapper">
            <div class="row">

            </div>
            <!-- <?php echo '<pre>'; print_r($produk); echo '</pre>'; ?> -->
            <!-- /.row -->
            <div class="row"><br>
              <div class="col-md-12">
                <?php echo $this->session->flashdata('promo'); ?>
                <?php echo $this->session->flashdata('status'); ?>
                <?php echo $this->session->flashdata('delete'); ?>
                <?php echo $this->session->flashdata('edit'); ?>
                <div class="col-md-12"><br>
                  <div class="panel panel-default">
                    <div class="col-lg-12">
                        <h3 class="page-header" align="center">Edit List Harga</h3>
                        <div class="pull-right">
                            <span>
                                <button onclick="getProdukPromo()" class="btn btn-outline btn-success fa fa-plus"> Tambah Produk</button>
                            </span>
                        </div><br><br>
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="#">
                            <thead>
                              <tr>
                                <th style="vertical-align: middle; text-align: center; width: 5%;">No</th>
                                <th style="vertical-align: middle;">Nama Produk</th>
                                <th style="vertical-align: middle;">Diskon DP</th>
                                <th style="vertical-align: middle;">Diskon 35 Bulan</th>
                                <th style="vertical-align: middle;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody style="vertical-align: middle;">
                              <?php 
                                    $no = 1;
                                    foreach ($produk as $item) {
                                ?>
                              <tr class="odd">
                                <td><?php echo $no++ ?></td>
                                <td style="vertical-align: middle;" align="center" readonly><?php echo ucwords($item->nama_produk) ?> <?php echo ucwords($item->id_promo) ?></td>
                                <td style="vertical-align: middle;" class="center" readonly>Rp. <?php echo number_format($item->diskon_dp, 0, ",",".") ?></td>
                                <td style="vertical-align: middle;" class="center">Rp. <?php echo number_format($item->diskon_35, 0, ",",".") ?></td>
                                <td style="vertical-align: middle;" align="center">

                                  <button onclick="EditPromosi(<?php echo $item->id_promo ?>)" class="btn btn-outline btn-primary fa fa-edit" title="Input"> | Input Harga</button>

                                  <a onclick="HapusProdukPromo(<?php echo $item->id_promo?>)" data-toggle="modal" class="btn btn-outline btn-danger fa fa-trash" title="Hapus"> | Hapus</a>

                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

                <div class="panel panel-default">
                  <div class="col-md-12">
                      <h3 class="page-header" align="center">Promosi</h3>
                  </div>
                  <div class="panel-body">
                      <form action="<?php echo base_url('Produk/addPromo') ?>" enctype="multipart/form-data" method="post">
                          <div class="row panel-default">    
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">Judul Promosi</label>
                                      <input type="text" class="form-control" name="judul"><br>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-6" align="center">
                                      <label for="">Periode Promosi</label>
                                  </div>
                              </div>
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <div class="col-md-6">
                                      <select name="bulan" id="bulan" class="form-control">
                                          <option value="">-- Bulan --</option>
                                          <option value="Januari" name="Januari" id="Januari ">Januari</option>
                                          <option value="Februari" name="Februari" id="Februari ">Februari</option>
                                          <option value="Maret" name="Maret" id="Maret ">Maret</option>
                                          <option value="April" name="April" id="April ">April</option>
                                          <option value="Mei" name="Mei" id="Mei">Mei</option>
                                          <option value="Juni" name="Juni" id="Juni ">Juni</option>
                                          <option value="Juli" name="Juli" id="Juli ">juli</option>
                                          <option value="Agustus" name="Agustus" id="Agustus ">Agustus</option>
                                          <option value="September" name="September" id="September ">September</option>
                                          <option value="Oktober" name="Oktober" id="Oktober ">Oktober</option>
                                          <option value="November" name="November" id="November ">November</option>
                                          <option value="Desember" name="Desember" id="Desember ">Desember</option>
                                          </select>
                                          <br>                                                   
                                      </div>
                                      <div class="col-md-6">
                                          <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" onkeypress="return hanyaAngka(event)" maxlength="4">
                                      </div>
                                  </div>                                
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="">Deskripsi Promosi</label>
                                      <textarea name="deskripsi" id="" cols="30" rows="10" style="resize: none;"></textarea>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="pull-right">
                                      <button type="submit" class="btn btn-outline btn-primary"> Simpan</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
                </div>
              </div>

            <!-- /.col-md-9 -->
            </div>

    </div>
    <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>

    <script type="text/javascript">
      tinymce.init({
      selector: 'textarea',
      height: 300,
      menubar: false,
      resize: false,
      plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'undo redo | insert | styleselect paste image| bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
      content_css: '//www.tinymce.com/css/codepen.min.css'
      });

    function EditPromosi(id)
    {      
      //Ajax Load data from ajax
      console.log(id);
      $.ajax({
        url : "<?php echo site_url('Produk/EditPromosi')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="id_promo"]').val(data.id_promo);
          $('[name="id_produk"]').val(data.id_produk);
          $('[name="namaproduk"]').val(data.nama_produk);
          $('[name="hargaproduk"]').val(data.harga_produk);
          $('[name="dp"]').val(data.diskon_dp);
          $('[name="diskon35"]').val(data.diskon_35);

          $('#EditPromosi').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit Harga Kredit'); // Set title to Bootstrap modal title

        },
        error: function (xhr, textStatus, errorThrown)
        {
            alert(xhr.responseText);
        }
      });
    }

    function HapusProdukPromo(id)
            {
              $('[name="id"]').val(id);

              $('#HapusProdukPromo').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Konfirmasi'); // Set title to Bootstrap modal title
            }
    </script>

    <div class="modal fade" id="EditPromosi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="modalLongTitle" align="center"></h2>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Produk/EditHargaPromo') ?>">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="namaproduk">Nama Produk</label>
                          <input type="text" class="form-control" name="namaproduk" readonly>
                          <input type="text" class="form-control" name="id_produk" readonly>
                          <input type="text" class="form-control" name="id_promo" readonly>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">Harga Produk</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="hargaproduk" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">Uang Muka (Dp)</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="dp" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" >
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">35 Bulan</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="diskon35" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" >
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal hapus motor -->
        <div class="modal fade" id="HapusProdukPromo" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action="<?php echo base_url('Produk/HapusProdukPromo')?>">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"></button>
                            <h4 class="modal-title" style="text-align: center;">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                            Anda yakin ingin menghapus gambar ini ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-sm btn-default">Ya</button>
                        </div>                
                    </form>
                </div>              
            </div>
        </div>
        <!--End Modal-->