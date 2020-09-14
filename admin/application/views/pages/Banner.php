
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                                        <th style="width: 7%; text-align: center;">No</th>
                                        <th style="max-width: 20% vertical-align: middle; text-align: center;" >Title</th>
                                        <th style="max-width: 50%; vertical-align: middle; text-align: center;" >Gambar</th>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle;">
                                    <?php 
                                        $no = 1;
                                        foreach ($banner as $item) {
                                    ?>
                                    <tr class="odd">
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo ucwords($item->title) ?></td>
                                        <td>
                                          <img src="<?php echo base_url().'assets/img/banner/'.$item->image; ?>" class="img-thumbnail rounded" style="max-width: 90%; vertical-align: middle;" align="center"><br><br>
                                          <span>
                                            <a href="<?php echo base_url('Home/editBanner/'.$item->id) ?>" class="btn btn-outline btn-success fa fa-edit" title="Ubah"> | Ubah</a>
                                            <a onclick="HapusBanner(<?php echo $item->id;?>)" data-toggle="modal" class="btn btn-outline btn-danger fa fa-trash" title="Hapus"> | Hapus</a>
                                          </span>
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
            function HapusBanner(id)
            {
              $('[name="id"]').val(id);

              $('#myModal').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Konfirmasi'); // Set title to Bootstrap modal title
            }
        </script>

        <!-- Modal Penilai -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action="<?php echo base_url('Home/HapusBanner')?>">
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