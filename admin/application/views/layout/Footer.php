
     <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap-imageupload.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

    <!-- Thumbnail -->
    <script type='text/javascript'>
      var $imageupload = $('.imageupload');
      $imageupload.imageupload();

      $('#imageupload-disable').on('click', function() {
        $imageupload.imageupload('disable');
        $(this).blur();
      })

      $('#imageupload-enable').on('click', function() {
        $imageupload.imageupload('enable');
        $(this).blur();
      })

      $('#imageupload-reset').on('click', function() {
        $imageupload.imageupload('reset');
        $(this).blur();
      });

    // <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true
        });
    });

    function hanyaAngka(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }


  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    var name = ''; 
    // Store change
    $('#jenisproduk').change(function(){
      var jenisproduk = $(this).val();
      console.log('berhasil');
      name = jenisproduk;
      console.log(name);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Produk/listKategori',
        method: 'post',
        data: {jenisproduk: jenisproduk},
        dataType: 'json',
        success: function(response){
          console.dir(response);
          // Remove options 
          $('#kategori').find('option').not(':first').remove();
          // $('#sel_depart').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#kategori').append('<option value="'+data['id']+''+data['jenis_kategori']+'">'+data['jenis_kategori']+'</option>');
          });
        }
     });
     });

    $('').change(function(){
      var a = $(this).val();
      console.log(a)
    });

     });


    function show(id)
    {

      //ajax load data from ajax
      console.log(id);
      $.ajax({
        url       : "<?php echo site_url('Home/Show')?>/" + id,
        type      : "GET",
        dataType  : "JSON",
        success   : function(data)
        {
          $("#gambar").attr("src","<?php echo base_url() ?>assets/img/produk/Thumbnail/" + data.gambar);
          $('[name = "nama_produk"]').val(data.nama_produk);
          $('[name = "id_pelanggan"]').val(data.id_pelanggan);
          $('[name = "qty"]').val(data.qty);
          $('[name = "harga_produk"]').val(accounting.formatMoney(data.harga_produk, "Rp. ", 0));
          $('[name = "jumlah"]').val(accounting.formatMoney(data.harga_produk * data.qty, "Rp. ", 0));
          $('[name = "keterangan"]').val(data.catatan);

          $('#tableOrder').modal('show');
          $('.modal-title').text('Order Info');
        },
        error: function (jqHXR, textStatus, errorThrown)
        {

        }
      });
    }

    function showPrice(id)
    {
      
      //Ajax Load data from ajax
      console.log(id);
      $.ajax({
        url : "<?php echo site_url('Produk/showPrice')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="id_kredit"]').val(data.id_kredit);
          $('[name="id_produk"]').val(data.id_produk);
          $('[name="namaproduk"]').val(data.nama_produk);
          $('[name="hargaproduk"]').val(data.harga_produk);
          $('[name="dp"]').val(data.dp);
          $('[name="11bulan"]').val(data.tenor_11);
          $('[name="17bulan"]').val(data.tenor_17);
          $('[name="23bulan"]').val(data.tenor_23);
          $('[name="29bulan"]').val(data.tenor_29);
          $('[name="35bulan"]').val(data.tenor_35);

          $('#priceList').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit Harga Kredit'); // Set title to Bootstrap modal title

        },
        error: function (xhr, textStatus, errorThrown)
        {
            alert(xhr.responseText);
        }
      });
    }

    function showHargaKredit(id)
    {
      $('[name="id_produk"]').val(id);

      $('#hargaKredit').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Tambah Harga Kredit'); // Set title to Bootstrap modal title
    }

    function showSpesifikasi(id)
    {
      //ajax load data from ajax
      console.log(id);
      $.ajax({
        url       : "<?php echo site_url('Produk/showSpesifikasi')?>/" + id,
        type      : "GET",
        dataType  : "JSON",
        success   : function(data)
        {
          $('[name = "tipemesin"]').val(data.tipe_mesin);
          $('[name = "susunansilinder"]').val(data.susunan_silinder);
          $('[name = "diameterxlangkah"]').val(data.diameterxlangkah);
          $('[name = "kompresi"]').val(data.kompresi);
          $('[name = "silinder"]').val(data.volume_silinder);
          $('[name = "dayamaksimum"]').val(data.daya_maksimum);
          $('[name = "torsi"]').val(data.torsi);
          $('[name = "sistemstarter"]').val(data.sistem_starter);
          $('[name = "sistempelumasan"]').val(data.sistem_pelumasan);
          $('[name = "olimesin"]').val(data.kapasitas_oli);
          $('[name = "kopling"]').val(data.tipe_kopling);
          $('[name = "transmisi"]').val(data.transmisi);
          $('[name = "sistembahanbakar"]').val(data.sistem_bhn_bkr);
          $('[name = "pxlxt"]').val(data.pxlxt);
          $('[name = "sumburoda"]').val(data.jarak_sumbu_roda);
          $('[name = "jarakketanah"]').val(data.jarak_terendah);
          $('[name = "tinggitempatduduk"]').val(data.tinggi_tempat_duduk);
          $('[name = "tangkibensin"]').val(data.tangki_bensin);
          $('[name = "beratisi"]').val(data.berat_isi);
          $('[name = "tiperangka"]').val(data.tipe_rangka);
          $('[name = "suspensidepan"]').val(data.suspensi_depan);
          $('[name = "suspensibelakang"]').val(data.suspensi_belakang);
          $('[name = "tipeban"]').val(data.tipe_ban);
          $('[name = "bandepan"]').val(data.ban_depan);
          $('[name = "banbelakang"]').val(data.ban_belakang);
          $('[name = "remdepan"]').val(data.rem_depan);
          $('[name = "rembelakang"]').val(data.rem_belakang);
          $('[name = "sistempengapian"]').val(data.sistem_pengapian);
          $('[name = "battery"]').val(data.tipe_battery);
          $('[name = "tipebusi"]').val(data.tipe_busi);


          $('#listSpesifikasi').modal('show');
          $('.modal-title').text('Spesifikasi');
        },
        error: function (jqHXR, textStatus, errorThrown)
        {

        }
      });
    }

    function editListSpesifikasi(id)
    {
      //ajax load data from ajax
      console.log(id);
      $.ajax({
        url       : "<?php echo site_url('Produk/showSpesifikasi')?>/" + id,
        type      : "GET",
        dataType  : "JSON",
        success   : function(data)
        {
          $('[name = "id_produk"]').val(data.id_produk);
          $('[name = "tipemesin"]').val(data.tipe_mesin);
          $('[name = "susunansilinder"]').val(data.susunan_silinder);
          $('[name = "diameterxlangkah"]').val(data.diameterxlangkah);
          $('[name = "kompresi"]').val(data.kompresi);
          $('[name = "volumesilinder"]').val(data.volume_silinder);
          $('[name = "dayamaksimum"]').val(data.daya_maksimum);
          $('[name = "torsi"]').val(data.torsi);
          $('[name = "sistemstarter"]').val(data.sistem_starter);
          $('[name = "sistempelumasan"]').val(data.sistem_pelumasan);
          $('[name = "olimesin"]').val(data.kapasitas_oli);
          $('[name = "kopling"]').val(data.tipe_kopling);
          $('[name = "transmisi"]').val(data.transmisi);
          $('[name = "sistembahanbakar"]').val(data.sistem_bhn_bkr);
          $('[name = "pxlxt"]').val(data.pxlxt);
          $('[name = "sumburoda"]').val(data.jarak_sumbu_roda);
          $('[name = "jarakketanah"]').val(data.jarak_terendah);
          $('[name = "tinggitempatduduk"]').val(data.tinggi_tempat_duduk);
          $('[name = "tangkibensin"]').val(data.tangki_bensin);
          $('[name = "beratisi"]').val(data.berat_isi);
          $('[name = "tiperangka"]').val(data.tipe_rangka);
          $('[name = "suspensidepan"]').val(data.suspensi_depan);
          $('[name = "suspensibelakang"]').val(data.suspensi_belakang);
          $('[name = "tipeban"]').val(data.tipe_ban);
          $('[name = "bandepan"]').val(data.ban_depan);
          $('[name = "banbelakang"]').val(data.ban_belakang);
          $('[name = "remdepan"]').val(data.rem_depan);
          $('[name = "rembelakang"]').val(data.rem_belakang);
          $('[name = "sistempengapian"]').val(data.sistem_pengapian);
          $('[name = "battery"]').val(data.tipe_battery);
          $('[name = "tipebusi"]').val(data.tipe_busi);


          $('#editListSpesifikasi').modal('show');
          $('.modal-title').text('Spesifikasi');
        },
        error: function (jqHXR, textStatus, errorThrown)
        {

        }
      });
    }

    $('#button').submit(function(e) {
      e.preventDefault();
      // Coding
      $('#hargaKredit').modal('hide'); //or  $('#IDModal').modal('hide');
      return false;
    });

    
  // $().ready(function() {
  //   $("#card").flip({
  //     trigger: 'manual'
  //   });
  // });


  // $(".signup_link").click(function() {

  //   $(".signin_form").css('opacity', '0');
  //   $(".signup_form").css('opacity', '100');
    
    
  //   $("#card").flip(true);
    
  //   return false;
  // });

  // $("#unflip-btn").click(function(){
    
  //   $(".signin_form").css('opacity', '100');
  //   $(".signup_form").css('opacity', '0');
    
  //     $("#card").flip(false);
    
  //   return false;
    
  // });



  function getProdukPromo()
    {
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: "<?php echo base_url() ?>Produk/getProdukPromo",
        success: function(data) {

          $('[name = "id_produk"]').val(data.id_produk);
          $('#nama_produk').empty();
          for(var i = 0; i< data.length;i++){

            $('#nama_produk').append('<option value="'+data[i]['id']+'">'+data[i]['nama_produk']+'</option>');
          }
          console.log(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          alert(textStatus);
        }
      });


      $('#Promo').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Tambah Produk Promo'); // Set title to Bootstrap modal title
    }

  </script>

  <!-- Modal -->
    <div class="modal fade" id="tableOrder" tabindex="1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="modalLongTitle" align="center">Order Info</h2>
          </div>
          <div class="modal-body form">
              <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="">
                <div class="form-body">
                  <div class="row">
                    <table class="table table-striped" id="tblGrid">
                      <thead id="tblHead">
                        <tr>
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Produk</th>
                          <th></th>
                          <th width="5%">Qty</th>
                          <th>Harga Satuan</th>
                          <th>Jumlah Harga</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $i = 1;
                         ?>
                        <tr>
                          <td><?php echo $i++ ?></td>
                          <td><img id="gambar" width="100" height="100"></td>
                          <td><textarea type="text" name="nama_produk" class="form-control" readonly style="background: transparent; border: none; resize: none;"></textarea></td>
                          <td><textarea type="text" name="id_pelanggan" class="form-control" readonly style="background: transparent; border: none; resize: none;"></textarea></td>
                          <td><textarea type="text" name="qty" class="form-control" readonly style="background: transparent; border: none; resize: none;"></textarea></td>
                          <td><textarea type="text" name="harga_produk" class="form-control" readonly style="background: transparent; border: none; resize: none;"></textarea></td>
                          <td><textarea type="text" name="jumlah" class="form-control" readonly style="background: transparent; border: none; resize: none;"></textarea></td>
                          <td><textarea type="text" name="keterangan" class="form-control" readonly style="background: transparent; border: none; resize: none;"></textarea></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>                
                </div>              
              </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="priceList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="modalLongTitle" align="center"></h2>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Produk/editHargaKredit') ?>">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="namaproduk">Nama Produk</label>
                          <input type="text" class="form-control" name="namaproduk" id="namaproduk" value="" readonly>
                          <input type="hidden" class="form-control" name="id_produk" id="id_produk" value="" readonly>
                          <input type="hidden" class="form-control" name="id_kredit" id="id_kredit" value="" readonly>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">Harga Produk</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="hargaproduk" id="hargaproduk" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">Uang Muka (Dp)</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="dp" id="dp" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">11 Bulan</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="11bulan" id="11bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">17 Bulan</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="17bulan" id="17bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">23 Bulan</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="23bulan" id="23bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">29 Bulan</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="29bulan" id="29bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="harga">35 Bulan</label>
                          <div class="input-group">
                              <span class="input-group-addon">Rp.</i></span>
                              <input type="text" class="form-control" name="35bulan" id="35bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
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

    <div class="modal fade" id="hargaKredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="modalLongTitle" align="center"></h2>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/tambahHargaKredit">
              <div class="row">
                <input type="hidden" id="id_produk" name="id_produk" value="">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">Uang Muka (Dp)</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</i></span>
                            <input type="text" class="form-control" name="dp" id="dp" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">11 Bulan</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</i></span>
                            <input type="text" class="form-control" name="11_bulan" id="11bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">17 Bulan</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</i></span>
                            <input type="text" class="form-control" name="17_bulan" id="17bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">23 Bulan</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</i></span>
                            <input type="text" class="form-control" name="23_bulan" id="23bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">29 Bulan</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</i></span>
                            <input type="text" class="form-control" name="29_bulan" id="29bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">35 Bulan</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</i></span>
                            <input type="text" class="form-control" name="35_bulan" id="35bulan" placeholder="masukkan harga tanpa tanda baca" onkeypress="return hanyaAngka(event)" maxlength="9" value="">
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="listSpesifikasi" tabindex="1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
              <div class="box" id="details">
                        <table class="table" style="color: grey;">
                          <thead>
                            <tr>
                              <th scope="col" class="text-center"><h2>Mesin</h2></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Tipe Mesin</dh>
                              <td><input type="text" name="tipemesin" class="form-control"  readonly></td>
                            </tr>
                            <tr>
                              <td>Susunan Silinder</td>
                              <td><input type="text" name="susunansilinder" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Diameter X Langkah</td>
                              <td><input type="text" name="diameterxlangkah" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Perbandingan Kompresi</td>
                              <td><input type="text" name="kompresi" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Volume Silinder</td>
                              <td><input type="text" name="silinder" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Daya Maksimum</td>
                              <td><input type="text" name="dayamaksimum" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Torsi Maksimum</td>
                              <td><input type="text" name="torsi" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Sistem Starter</td>
                              <td><input type="text" name="sistemstarter" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Sistem Pelumasan</td>
                              <td><input type="text" name="sistempelumasan" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Kapasitas Oli Mesin</td>
                              <td><input type="text" name="olimesin" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Tipe Kopling</td>
                              <td><input type="text" name="kopling" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Transmisi</td>
                              <td><input type="text" name="transmisi" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Sistem bahan bakar</td>
                              <td><input type="text" name="sistembahanbakar" class="form-control" readonly></td>
                            </tr>

                            <tr>
                              <th scope="col" class="text-center"><h2>Dimensi</h2></th>
                            </tr>
                            <tr>
                              <td>P x L x T</td>
                              <td><input type="text" name="pxlxt" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Jarak sumbu roda</td>
                              <td><input type="text" name="sumburoda" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Jarak terendah ke tanah</td>
                              <td><input type="text" name="jarakketanah" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Tinggi tempat duduk</td>
                              <td><input type="text" name="tinggitempatduduk" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Kapasitas tangki bensin</td>
                              <td><input type="text" name="tangkibensin" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Berat isi</td>
                              <td><input type="text" name="beratisi" class="form-control" readonly></td>
                            </tr>

                            <tr>
                              <th scope="col" class="text-center"><h2>Rangka</h2></th>
                              <td></td>
                            </tr>
                            <tr>
                              <td>Tipe Rangka</td>
                              <td><input type="text" name="tiperangka" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Suspensi Depan</td>
                              <td><input type="text" name="suspensidepan" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Suspensi Belakang</td>
                              <td><input type="text" name="suspensibelakang" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Tipe Ban</td>
                              <td><input type="text" name="tipeban" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Ban Depan</td>
                              <td><input type="text" name="bandepan" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Ban Belakang</td>
                              <td><input type="text" name="banbelakang" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Rem Depan</td>
                              <td><input type="text" name="remdepan" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Rem Belakang</td>
                              <td><input type="text" name="rembelakang" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <th scope="col" class="text-center"><h2>Kelistrikan</h2></th>
                              <td></td>
                            </tr>
                            <tr>
                              <td>Sistem Pengapian</td>
                              <td><input type="text" name="sistempengapian" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Tipe Battery</td>
                              <td><input type="text" name="battery" class="form-control" readonly></td>
                            </tr>
                            <tr>
                              <td>Tipe Busi</td>
                              <td><input type="text" name="tipebusi" class="form-control" readonly></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <!-- table spesifikasi -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editListSpesifikasi" tabindex="1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/saveEditSpesifikasi">
            <input type="hidden" id="id_produk" name="id_produk" value="">
            <div class="modal-body">
              <div class="box" id="details">
                <table class="table" style="color: grey;">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center"><h2>Mesin</h2></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tipe Mesin</dh>
                      <td><input type="text" name="tipemesin" id="tipemesin" class="form-control" value="" ></td>
                    </tr>
                    <tr>
                      <td>Susunan Silinder</td>
                      <td><input type="text" name="susunansilinder" id="susunansilinder" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Diameter X Langkah</td>
                      <td><input type="text" name="diameterxlangkah" id="diameterxlangkah" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Perbandingan Kompresi</td>
                      <td><input type="text" name="kompresi" id="kompresi" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Volume Silinder</td>
                      <td><input type="text" name="volumesilinder" id="volumesilinder" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Daya Maksimum</td>
                      <td><input type="text" name="dayamaksimum" id="dayamaksimum" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Torsi Maksimum</td>
                      <td><input type="text" name="torsi" id="torsi" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Sistem Starter</td>
                      <td><input type="text" name="sistemstarter" id="sistemstarter" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Sistem Pelumasan</td>
                      <td><input type="text" name="sistempelumasan" id="sistempelumasan" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Kapasitas Oli Mesin</td>
                      <td><input type="text" name="olimesin" id="olimesin" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Tipe Kopling</td>
                      <td><input type="text" name="kopling" id="kopling" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Transmisi</td>
                      <td><input type="text" name="transmisi" id="transmisi" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Sistem bahan bakar</td>
                      <td><input type="text" name="sistembahanbakar" id="sistembahanbakar" class="form-control" value=""></td>
                    </tr>

                    <tr>
                      <th scope="col" class="text-center"><h2>Dimensi</h2></th>
                      <td></td>
                    </tr>
                    <tr>
                      <td>P x L x T</td>
                      <td><input type="text" name="pxlxt" id="pxlxt" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Jarak sumbu roda</td>
                      <td><input type="text" name="sumburoda" id="sumburoda" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Jarak terendah ke tanah</td>
                      <td><input type="text" name="jarakketanah" id="jarakketanah" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Tinggi tempat duduk</td>
                      <td><input type="text" name="tinggitempatduduk" id="tinggitempatduduk" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Kapasitas tangki bensin</td>
                      <td><input type="text" name="tangkibensin" id="tangkibensin" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Berat isi</td>
                      <td><input type="text" name="beratisi" id="beratisi" class="form-control" value=""></td>
                    </tr>

                    <tr>
                      <th scope="col" class="text-center"><h2>Rangka</h2></th>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Tipe Rangka</td>
                      <td><input type="text" name="tiperangka" id="tiperangka" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Suspensi Depan</td>
                      <td><input type="text" name="suspensidepan" id="suspensidepan" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Suspensi Belakang</td>
                      <td><input type="text" name="suspensibelakang" id="suspensibelakang" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Tipe Ban</td>
                      <td><input type="text" name="tipeban" id="tipeban" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Ban Depan</td>
                      <td><input type="text" name="bandepan" id="bandepan" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Ban Belakang</td>
                      <td><input type="text" name="banbelakang" id="banbelakang" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Rem Depan</td>
                      <td><input type="text" name="remdepan" id="remdepan" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Rem Belakang</td>
                      <td><input type="text" name="rembelakang" id="rembelakang" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <th scope="col" class="text-center"><h2>Kelistrikan</h2></th>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Sistem Pengapian</td>
                      <td><input type="text" name="sistempengapian" id="sistempengapian" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Tipe Battery</td>
                      <td><input type="text" name="battery" id="battery" class="form-control" value=""></td>
                    </tr>
                    <tr>
                      <td>Tipe Busi</td>
                      <td><input type="text" name="tipebusi" id="tipebusi" class="form-control" value=""></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- table spesifikasi -->
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      </div>
    </div>

    <div class="modal fade" id="Promo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="modalLongTitle" align="center"></h2>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Produk/addProdukPromo">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">Pilih Produk</label>
                        <input type="hidden" id="id_produk" name="id_produk" value="">
                        <select name="nama_produk" id="nama_produk" class="form-control">
                        </select>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

   
  <!-- end modal list order -->

</body>

</html>