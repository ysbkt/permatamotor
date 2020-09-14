<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Data Konsumen Permata Motor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle; text-align: center;" width="2%">No</th>
                                        <th style="vertical-align: middle; text-align: center;" width="10%">Gambar</th>
                                        <th style="vertical-align: middle; text-align: center;" width="10%">Produk</th>
                                        <th style="vertical-align: middle; text-align: center;" width="5%">Qty</th>
                                        <th style="vertical-align: middle; text-align: center;" width="5%">Harga Satuan</th>
                                        <th style="vertical-align: middle; text-align: center;" width="10%">Jumlah Harga</th>
                                        <th style="vertical-align: middle; text-align: center;" width="10%">Keterangan</th>
                                    </tr>
                                </thead>
                                <!-- <?php echo "<pre>"; print_r($detail); echo "</pre>"; ?> -->
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($detail as $data) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no++ ?></td>
                                        <td style="vertical-align: middle; text-align: center;" align="justify">
                                            <img src="<?php echo base_url().'assets/img/produk/Thumbnail/'.$data->gambar; ?>" class="img-thumbnail rounded" style="max-width: 200px; max-height: 100px; vertical-align: middle;" align="center">
                                        </td>
                                        <td style="vertical-align: middle; text-align: center;" align="justify" class="center"><?php echo ucwords($data->nama_produk) ?></td>
                                        <td style="vertical-align: middle; text-align: center;" align="justify" class="center"><?php echo $data->qty ?></td>
                                        <td style="vertical-align: middle; text-align: center;" align="justify" align="center">Rp. <?php echo number_format($data->harga, 0,",",".") ?></td>
                                        <td style="vertical-align: middle; text-align: center;" align="justify">Rp. <?php echo number_format($data->harga * $data->qty, 0,",",".") ?></td>
                                        <td style="vertical-align: middle; text-align: center;" align="justify" data-date-format="dd/mm/yyyy"><?php echo ucwords($data->metode_pembayaran) ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <a href="<?php echo base_url('Home/Tables'); ?>" class="btn btn-outline btn-danger">Kembali</a>
                            </div>
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