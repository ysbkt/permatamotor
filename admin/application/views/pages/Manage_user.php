<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Daftar User Permata Motor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                    <?php echo $this->session->flashdata('user'); ?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;" align="center" width="5%">No</th>
                                        <th style="vertical-align: middle;" align="center" width="10%">Nama</th>
                                        <th style="vertical-align: middle;" align="center" width="5%">Username</th>
                                        <th style="vertical-align: middle;" align="center" width="10%">Level</th>
                                        <th style="vertical-align: middle;" align="center" width="5%">Status</th>
                                        <th style="vertical-align: middle;" align="center" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- <?php echo "<pre>"; print_r($konsumen); echo "</pre>"; ?> -->
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($user as $data) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no++ ?></td>
                                        <td style="vertical-align: middle;" align="justify"><?php echo ucwords($data->nama) ?></a></td>
                                        <td align="center"><?php echo $data->username ?></td>
                                        <td align="center"><?php echo ucwords($data->level) ?></td>
                                        <td align="center">
                                            <?php if (($data->status) == 1) {
                                                echo "Aktif";
                                            }else{
                                                echo "Tidak Aktif";
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (($data->status) == '1') { ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-sm btn-outline btn-success active" style="color: #fff;" title="Akun sudah aktif">Activate</button>
                                                    </div>
                                                    <div class="col-md-6">                                                    
                                                        <a href="<?php echo base_url('User/Deactivate/'.$data->id) ?>" class="btn btn-sm btn-outline btn-danger">Deactivate</a>
                                                    </div>
                                                </div>
                                            </div>                                                    
                                            <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <a href="<?php echo base_url('User/Activate/'.$data->id) ?>" class="btn btn-sm btn-outline btn-success">Activate</a>
                                                    </div>
                                                    <div class="col-md-6">                                                    
                                                        <button class="btn btn-sm btn-outline btn-danger active" style="color: #fff;" title="akun belum aktif">Deactivate</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
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