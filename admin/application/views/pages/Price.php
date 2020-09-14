<!-- <?php echo '<pre>'; print_r($produk) ?> -->
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Edit List Harga</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12">    
                    <div class="pull-left"><br>
                      <a href="<?php echo base_url('Produk/List') ?>" class="btn btn-outline btn-danger fa fa-backward"> Kembali</a>
                    </div>
                    <div class="pull-right"><br>
                      <span>
                        <button onclick="showHargaKredit(<?php echo $id_produk ?>)" class="btn btn-outline btn-success fa fa-plus"> Tambah Harga Kredit</button>
                      </span>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body"><br><br>
                      <?php echo $this->session->flashdata('status'); ?>
                      <?php echo $this->session->flashdata('delete'); ?>
                      <?php echo $this->session->flashdata('kredit'); ?>
                      <table width="100%" class="table table-striped table-bordered table-hover" id="#">
                        <thead>
                          <tr>
                            <th style="vertical-align: middle; text-align: center; ">No</th>
                            <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                            <th style="vertical-align: middle; text-align: center;">Harga</th>
                            <th style="vertical-align: middle; text-align: center;">DP</th>
                            <th style="vertical-align: middle; text-align: center;">11 Bulan</th>
                            <th style="vertical-align: middle; text-align: center;">17 Bulan</th>
                            <th style="vertical-align: middle; text-align: center;">23 Bulan</th>
                            <th style="vertical-align: middle; text-align: center;">29 Bulan</th>
                            <th style="vertical-align: middle; text-align: center;">35 Bulan</th>
                            <th style="vertical-align: middle; text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody style="vertical-align: middle;">
                          <?php 
                          $no = 1;
                          foreach ($harga as $item) {
                            ?>
                            <tr class="odd">
                              <td><?php echo $no++ ?></td>
                              <td style="vertical-align: middle;" align="center" readonly><?php echo ucwords($item->nama_produk) ?></td>
                              <td style="vertical-align: middle;" class="center" readonly>Rp. <?php echo number_format($item->harga_produk, 0,",",".") ?></td>
                              <td style="vertical-align: middle;" class="center">Rp. <?php echo number_format($item->dp, 0,",",".") ?></td>
                              <td style="vertical-align: middle;" class="center">Rp. <?php echo number_format($item->tenor_11, 0,",",".") ?></td>
                              <td style="vertical-align: middle;" class="center">Rp. <?php echo number_format($item->tenor_17, 0,",",".") ?></td>
                              <td style="vertical-align: middle;" class="center">Rp. <?php echo number_format($item->tenor_23, 0,",",".") ?></td>
                              <td style="vertical-align: middle;" class="center">Rp. <?php echo number_format($item->tenor_29, 0,",",".") ?></td>
                              <td style="vertical-align: middle;" class="center">Rp. <?php echo number_format($item->tenor_35, 0,",",".") ?></td>
                              <td style="vertical-align: middle;" align="center">

                                <button onclick="showPrice(<?php echo $item->id_kredit; ?>)" class="btn btn-outline btn-primary fa fa-edit" title="Edit"></button>
                                
                                <a href="<?php echo base_url('Produk/GambarPriceList/'.$id_produk); ?>" class="btn btn-outline btn-info fa fa-image" title="Upload Price List"></a>

                                <a onclick="HapusHargaKredit(<?php echo $item->id_kredit;?>)" data-toggle="modal" class="btn btn-outline btn-danger fa fa-trash" title="Hapus"></a>

                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.panel-body -->
                  </div>
                    <!-- /.panel -->
                    <?php foreach ($produk as $item) { ?>
                      <?php if (empty($item->gambar_price_list)) {
                        echo "";}else{ ?>
                    <div class="col-md-12">
                      <img src="<?php echo base_url().'assets/img/produk/Motor/Price_List/'.$item->gambar_price_list; ?>" class="img-thumbnail rounded" style="max-width: 1020px; vertical-align: middle;" align="center">
                    </div>
                    <?php } } ?>
                </div>
                <!-- /.col-lg-12 -->

            <!-- /.col-md-9 -->
            </div>

    </div>
    <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <script type="text/javascript">
            function HapusHargaKredit(id)
            {
              $('[name="id"]').val(id);

              $('#HapusHargaKredit').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Konfirmasi'); // Set title to Bootstrap modal title
            }
        </script>

        <!-- Modal Penilai -->
        <div class="modal fade" id="HapusHargaKredit" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action="<?php echo base_url('Produk/HapusHargaKredit')?>">
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