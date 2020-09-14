<div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li>Promo</li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <?php foreach ($banner as $item) { ?>
                    <div class="box">
                        <h4><?php echo ucwords($item->judul) ?></h4>
                    </div>

                    <div class="box">
                        <span align="justify"><?php echo ucfirst($item->deskripsi) ?></span>
                    </div>

                    <div class="box">
                        <h4 align="center">Periode <?php echo $item->bulan.' '.$item->tahun ?></h4>
                    </div>

                    <?php } ?>

                    <div class="box">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tipe</th>
                                        <th>DP Bayar</th>
                                        <th>Tenor 35x</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($promo as $data) { ?>
                                    <td><?php echo ucwords($data->nama_produk) ?></td>
                                    <td>Rp <?php echo number_format($data->diskon_dp,0 ,'.','.') ?></td>
                                    <td>Rp <?php echo number_format($data->diskon_35,0 ,'.','.') ?></td>
                                </tbody>
                                    <?php } ?>
                            </table>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->