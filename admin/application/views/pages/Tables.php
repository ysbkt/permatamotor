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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;" align="center" width="2%">No</th>
                                        <th style="vertical-align: middle;" align="center" width="5%">Nama</th>
                                        <th style="vertical-align: middle;" align="center" width="5%">Produk</th>
                                        <th style="vertical-align: middle;" align="center" width="5%">Status</th>
                                        <th style="vertical-align: middle;" align="center" width="5%">Surveyor</th>
                                        <th style="vertical-align: middle;" align="center" width="2%">Alasan Tolak</th>
                                        <th style="vertical-align: middle;" align="center" width="9%">Tanggal</th>
                                        <th style="vertical-align: middle;" align="center" width="10%">Manage</th>
                                    </tr>
                                </thead>
                                <!-- <?php echo "<pre>"; print_r($konsumen); echo "</pre>"; ?> -->
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($konsumen as $data) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no++ ?></td>
                                        <td style="vertical-align: middle;" align="justify"><a href="#" onclick="DataKonsumen(<?php echo $data->id_pelanggan ?>)"><?php echo ucwords($data->nama) ?></a></td>
                                        <td align="center">
                                            <a href="<?php echo base_url('Home/OrderInfo/'.$data->id_pelanggan) ?>" type="button" class="btn btn-sm btn-outline btn-primary" value="">Lihat</a>
                                        </td>

                                        <td align="center"><?php echo ucwords($data->status) ?></td>
                                        <td align="center"><?php echo ucwords($data->surveyor) ?></td>
                                        <td align="center"><?php echo ucwords($data->keterangan) ?></td>
                                        <td data-date-format="dd/mm/yyyy"><?php echo date('d F Y', strtotime($data->tanggal)) ?></td>
                                        <td align="center">
                                            <div>
                                                <?php if (($data->status) == 'Pending') { ?>
                                                <button type="button" onclick="Survey(<?php echo $data->id_detail_order; ?>)" class="btn btn-sm btn-outline btn-primary" title="Survey"> Survey</button>
                                                <?php } else if (($data->status) == 'Survey') { ?>
                                            </div>

                                            <div class="row">                                                
                                                <div class="col-md-6">
                                                <a href="<?php echo base_url('Home/Terima/'.$data->id_detail_order); ?>" class="btn btn-sm btn-outline btn-success" style="color: green;" title="Terima">Terima</a>
                                                </div>

                                                <div class="col-md-6">
                                                <button type="button" onclick="Tolak(<?php echo $data->id_detail_order; ?>)" class="btn btn-sm btn-outline btn-danger" title="Tolak">Tolak</button>
                                                </div>
                                            </div>
                                                <?php } else if (($data->status) == 'Terima') {?>
                                            <div class="row">                                                
                                                <div class="col-md-12">
                                                <button type="button" class="btn btn-sm btn-outline btn-success" title="Terima" disabled> Terima</button>
                                                </div>
                                                <?php } else {?>
                                                <div class="col-md-12">
                                                <button type="button" class="btn btn-sm btn-outline btn-danger" title="Tolak" disabled> Tolak</button>
                                                </div>
                                                <?php } ?>
                                            </div>
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
        function Survey(id)
        {
          //ajax load data from ajax
          // console.log(id);
          $('[name = "id"]').val(id);


          $('#survey').modal('show');
          $('.modal-title').text('Nama Surveyor');
        }

        function Tolak(id)
        {
          //ajax load data from ajax
          // console.log(id);
          $('[name = "id"]').val(id);


          $('#tolak').modal('show');
          $('.modal-title').text('Alasan Penolakan');
        }

        function toTitleCase(str) {
            return str.replace(/\w\S*/g, function(txt){
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }

        function DataKonsumen(id)
        {
          //ajax load data from ajax
          console.log(id);
          $.ajax({
            url       : "<?php echo site_url('Home/DataKonsumen')?>/" + id,
            type      : "GET",
            dataType  : "JSON",
            success   : function(data)
            {
              $('[name = "id_pelanggan"]').val(data.id_pelanggan);
              $('[name = "alamat"]').val(toTitleCase(data.alamat)+", Kel. "+toTitleCase(data.kelurahan)+", Kec. "+toTitleCase(data.kecamatan)+", Kota. "+toTitleCase(data.kota)+", Kode Pos : "+toTitleCase(data.kodepos));
              $('[name = "telepon"]').val("0"+data.telepon);
              $('[name = "email"]').val(data.email);


              $('#DataKonsumen').modal('show');
              $('.modal-title').text('Data Konsumen');
            },
            error: function (jqHXR, textStatus, errorThrown)
            {

            }
          });
        }
    </script>

    <!-- Modal  Survey-->
    <div class="modal fade" id="survey" tabindex="-1" role="dialog" aria-labelledby="survey" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle" align="center"></h3>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Home/TambahSurvey">
                        <div class="row">
                            <input type="hidden" id="id" name="id" value="">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Nama</i></span>
                                        <input type="text" class="form-control" name="surveyor" id="surveyor" placeholder="Surveyor" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Tolak-->
    <div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="tolak" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalCenterTitle" align="center"></h3>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Home/AlasanTolak">
                        <div class="row">
                            <input type="hidden" id="id" name="id" value="">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Alasan  :</i></span>
                                        <input type="text" class="form-control" name="tolak" id="tolak" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Konsumen-->
    <div class="modal fade" id="DataKonsumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" align="center"></h3>
          </div>
          <div class="modal-body">
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="max-width: 300px;">Alamat</th>
                        <th style="max-width: 300px;">Telepon</th>
                        <th style="max-width: 300px;">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><textarea style="max-width: 300px; height:150px; resize: none" align="justify" type="text" name="alamat" class="form-control" readonly></textarea>
                        </td>
                        <td><input align="justify" type="text" name="telepon" class="form-control" readonly></td>
                        <td><input type="text" name="email" class="form-control" readonly></td>
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