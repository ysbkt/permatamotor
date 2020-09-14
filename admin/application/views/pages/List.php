<!-- <?php echo '<pre>'; print_r($produk) ?> -->
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">List Produk Permata Motor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <?php echo $this->session->flashdata('status'); ?>
                          <?php echo $this->session->flashdata('barhasil'); ?>
                          <?php echo $this->session->flashdata('spesifikasi'); ?>
                          <?php echo $this->session->flashdata('delete'); ?>
                          <?php echo $this->session->flashdata('stock'); ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th width="10%">Nama Produk</th>
                                        <th width="10%" vertical-align: middle;">Harga Kredit</th>
                                        <th width="8%" vertical-align: middle;">Spesifikasi</th>
                                        <th width="5%" vertical-align: middle;" colspan="2">Stok</th>
                                        <th width="10%" vertical-align: middle;">Manage</th>

                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle;">
                                    <?php 
                                        $no = 1;
                                        foreach ($produk as $item) {
                                    ?>
                                    <tr class="odd">
                                        <td><?php echo $no++ ?></td>
                                        <td style="vertical-align: middle;" align="center"><a href="#" onclick="ShowMotor(<?php echo $item->id_produk ?>)" title="Klik untuk melihat detail"><?php echo ucwords($item->nama_produk) ?></a></td>
                                        <td style="vertical-align: middle;" align="center">
                                          <a href="<?php echo base_url('Produk/priceList/'.$item->id_produk) ?>" class="btn btn-outline btn-info fa fa-edit" title="Lihat"> Edit</a>
                                          <a href="<?php echo base_url('Produk/GambarPriceList/'.$item->id_produk); ?>" class="btn btn-outline btn-primary fa fa-money" title="Price List"> Upload</a>
                                        </td>
                                        <td style="vertical-align: middle;" align= "center";>
                                            <button class="btn btn-outline btn-info" type="button" onclick="showSpesifikasi(<?php echo $item->id_produk; ?>)"> Lihat</button>
                                            <button class="btn btn-outline btn-primary" title="Ubah" onclick="editListSpesifikasi(<?php echo $item->id_produk; ?>)"> Edit</button>
                                        </td>

                                        <td><?php echo ucwords($item->stock) ?></td>
                                        <?php if (($item->stock) == 'Ready Stock') { ?>
                                        <td><a href="<?php echo base_url('Produk/OutOfStock/'.$item->id_produk); ?>" class="btn btn-sm btn-outline btn-danger"> Out of Stock</a></td>
                                        <?php } else {?>
                                        <td><a href="<?php echo base_url('Produk/Stock/'.$item->id_produk); ?>" class="btn btn-sm btn-outline btn-success"> Ready Stock</a></td>
                                        <?php } ?>

                                        <td style="vertical-align: middle;" align="center">
                                            <a href="<?php echo base_url('Produk/editMotor/'.$item->id_produk) ?>" class="btn btn-outline btn-primary fa fa-edit" title="Ubah"> Edit</a>
                                            <!-- <a href="<?php echo base_url('Produk/Thumbnail/'.$item->id_produk) ?>" class="btn btn-outline btn-success"  title="Tambah Gambar"> Thumbnail</a> -->
                                            <a onclick="DeleteMotor(<?php echo $item->id_produk;?>)" data-toggle="modal" class="btn btn-outline btn-danger fa fa-trash" title="Hapus"> | Hapus</a>
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
            </div>
</div>
<!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <script type="text/javascript">

        function toTitleCase(str) {
            return str.replace(/\w\S*/g, function(txt){
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }

        function ShowMotor(id)
        {
          //ajax load data from ajax
          console.log(id);
          $.ajax({
            url       : "<?php echo site_url('Produk/ShowMotor')?>/" + id,
            type      : "GET",
            dataType  : "JSON",
            success   : function(data)
            {
              $('[name = "id_produk"]').val(data.id_produk);
              $("#gambar").attr("src","<?php echo base_url() ?>assets/img/produk/Thumbnail/" + data.gambar);
              // $('[name = "gambar"]').val(data.gambar);
              $('[name = "nama_produk"]').text(toTitleCase(data.nama_produk));
              $('[name = "warna_produk"]').text(toTitleCase(data.warna_produk));
              $('[name = "jenis_produk"]').text(toTitleCase(data.jenis_produk));
              $('[name = "jenis_kategori"]').text(toTitleCase(data.jenis_kategori));
              $('[name = "harga_produk"]').text(accounting.formatMoney(data.harga_produk, "Rp. ", 0));

              console.log(data.gambar);
              $('#Motor').modal('show');
              $('.modal-title').text('Detail Motor');
            },
            error: function (jqHXR, textStatus, errorThrown)
            {

            }
          });
        }

        function DeleteMotor(id)
            {
              $('[name="id_produk"]').val(id);
              $('#HapusMotor').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Konfirmasi'); // Set title to Bootstrap modal title
            }
    </script>

    <!-- Modal  Konsumen-->
    <div class="modal fade" id="Motor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" align="center"></h3>
          </div>
          <div class="modal-body">
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Warna Produk</th>
                        <th>Jenis Produk</th>
                        <th>Kategori Produk</th>
                        <th>Harga Cash</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="" style="max-width: 150px;" align="justify" id="gambar" class="img-thumbnail rounded" style="max-width: 50px; max-height: 100px; vertical-align: middle;" align="center" readonly>
                        </td>
                        <td><span align="justify" type="text" name="nama_produk"  readonly></td>
                        <td><span align="justify" type="text" name="warna_produk"  readonly></td>
                        <td><span type="text" name="jenis_produk"  readonly></td>
                        <td><span type="text" name="jenis_kategori"  readonly></td>
                        <td><span type="text" name="harga_produk"  readonly></td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal hapus motor -->
        <div class="modal fade" id="HapusMotor" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action="<?php echo base_url('Produk/DeleteMotor')?>">
                        <input type="hidden" name="id_produk" id="id_produk" value="">
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