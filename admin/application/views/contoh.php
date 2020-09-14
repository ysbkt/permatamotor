<div id="content" class="content-no-window">
    <?php echo $this->session->flashdata('pesan');?>
    <div class="container-fluid ">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
            <i class="icon-align-justify"></i>
          </span>
                <?php foreach ($data2 as $d) {?>
                <h5>Data Keluarga | <?php echo $d->nrk?> | <?php echo $d->nama?> | <?php echo $d->no_ktp?></h5>
                <?php }?>
                <div class="span3">
                    <button class="btn btn-success" id="tambah"><i class="icon-plus"></i>Tambah Anggota Keluarga</button>
                </div>
            </div>
            <div class="widget-content nopadding">
                <table id="table" class="table display" cellspacing="0" width="100%">
                    <thead class="filters">
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Hubungan</th>
                            <th>Nomor BPJS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d2){?>
                        <tr class="gradeA">
                            <td class="center">
                                <center>
                                    <?php echo $d2->nik;?>
                                </center>
                            </td>
                            <td class="center">
                                <center>
                                    <?php echo $d2->nama;?>
                                </center>
                            </td>
                            <td class="center">
                                <center>
                                    <?php echo $d2->hubungan;?>
                                </center>
                            </td>
                            <td class="center">
                                <center>
                                    <?php echo $d2->nomor_bpjs;?>
                                </center>
                            </td>
                            <td class="center">
                                <button class="btn btn-success" id="edit" onclick="edit(<?php echo $d2->keluarga_id;?>)"><i class="glyphicon glyphicon-plus"></i> Edit/Lihat</button>
                                <button class="btn btn-danger" id="edit" onclick="hapus(<?php echo $d2->keluarga_id;?>)"><i class="glyphicon glyphicon-plus"></i>Hapus</button>
                                <?php }?>
                               
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="<?php echo base_url();?>DataKaryawan/EditDataPribadi/<?php foreach ($data2 as $d) {echo $d->nrk;}?>" onclick="window.open(this.href,'window','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes" class="btn btn-primary"> << Data Pribadi<i class="glyphicon glyphicon-plus"></i></a>
        <a href="" onclick="window.close()" class="btn btn-danger">Batal</a>
        <a href="<?php echo base_url();?>DataKaryawan/DataPekerjaanDetails/<?php foreach ($data2 as $d) {echo $d->nrk;}?>" onclick="window.open(this.href,'window','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes" class="btn btn-primary">Data Pekerjaan >><i class="glyphicon glyphicon-plus"></i></a>
        
    </div>
    <div class="container-fluid" id="divtambah">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                          <i class="icon-align-justify"></i>
                        </span>
                        <h5>Tambah Data Keluarga</h5>
                    </div>
                    <form action="#" id="form" class="form-horizontal">
                        <div class="span6">
                            <input type="hidden" id="keluarga_nrk" name="keluarga_nrk" value="<?php foreach ($data2 as $d){echo $d->nrk;}?>" />
                            <div class="control-group">
                                <label class="control-label">Nama :</label>
                                <div class="controls">
                                    <input type="text" name="nama_keluarga" id="nama_keluarga" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tanggal Lahir :</label>
                                <div class="controls">
                                    <input type="text" name="tanggal" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" id="tanggal" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nomor BPJS :</label>
                                <div class="controls">
                                    <input type="text" name="nomor_bpjs" id="nomor_bpjs" maxlength="25" placeholder="Nomor BPJS" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">NIK :</label>
                                <div class="controls">
                                    <input type="text" name="nik" id="nik" maxlength="25" placeholder="NIK" value="">
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Nama Faskes :</label>
                                <div class="controls">
                                    <input type="text" name="faskes1" id="faskes1" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tanggal Issued :</label>
                                <div class="controls">
                                    <input type="text" name="issued" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" id="issued" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Kelas Rawat :</label>
                                <div class="controls">
                                    <input type="text" name="kelas" id="kelas" maxlength="25" placeholder="kelas" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Hubungan :</label>
                                <div class="controls">
                                    <select id="hubungan_keluarga" name="hubungan_keluarga">
                                        <option value="">--Pilih Hubungan--</option>
                                        <option value="suami">Suami</option>
                                        <option value="istri">Istri</option>
                                        <option value="anak">Anak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-danger" id="batal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid" id="divedit">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                              <i class="icon-align-justify"></i>
                        </span>
                        <h5>Edit Data Keluarga</h5>
                    </div>
                    <form action="#" id="form" class="form-horizontal">
                        <div class="span6">
                            <input type="hidden" id="edit_keluarga_nrk" name="keluarga_nrk" value="<?php foreach ($data2 as $d){echo $d->nrk;}?>" />
                            <input type="hidden" id="edit_keluarga_id" name="keluarga_nrk" value="" />
                            <div class="control-group">
                                <label class="control-label">Nama :</label>
                                <div class="controls">
                                    <input type="text" name="nama_keluarga" id="edit_nama" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tanggal Lahir :</label>
                                <div class="controls">
                                    <input type="text" name="tanggal" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" id="edit_tanggal" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nomor BPJS :</label>
                                <div class="controls">
                                    <input type="text" name="nomor_bpjs" id="edit_nomor_bpjs" maxlength="25" placeholder="Nomor BPJS" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">NIK :</label>
                                <div class="controls">
                                    <input type="text" name="nik" id="edit_nik" maxlength="25" placeholder="NIK" value="">
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Nama Faskes :</label>
                                <div class="controls">
                                    <input type="text" name="faskes1" id="edit_faskes1" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tanggal Issued :</label>
                                <div class="controls">
                                    <input type="text" name="issued" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" id="edit_issued" maxlength="25" placeholder="Nama" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Kelas Rawat :</label>
                                <div class="controls">
                                    <input type="text" name="kelas" id="edit_kelas" maxlength="25" placeholder="kelas" value="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Hubungan :</label>
                                <div class="controls">
                                    <select id="edit_hubungan_keluarga" name="hubungan_keluarga">
                                        <option value="">--Pilih Hubungan--</option>
                                        <option value="suami">Suami</option>
                                        <option value="istri">Istri</option>
                                        <option value="anak">Anak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="btnSave" onclick="save_update()" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" id="bataledit">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>source/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>source/js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url();?>source/js/jquery.uniform.js"></script>
<script src="<?php echo base_url();?>source/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>source/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url();?>source/js/maruti.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
<script src="<?php echo base_url();?>source/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    
$(document).ready(function(){
        // Setup - add a text input to each footer cell
        $('#table .filters th').each( function () {
            var title = $('#table thead th').eq( $(this).index() ).text();
            if (title != 'Action') {
            $(this).html( '<center><input type="text" placeholder="Search '+title+'" /></center>' );}
        } );
        $('#table').DataTable( {
            "dom": '<"top"i>rt<"bottom"flp><"clear">',
            "responsive": true,
            "autoWidth": true,
          } );
        // DataTable
        var table = $('#table').DataTable();
     
        // Apply the search
        table.columns().eq( 0 ).each( function ( colIdx ) {
            $( 'input', $('.filters th')[colIdx] ).on( 'keyup change', function () {
                table
                    .column( colIdx )
                    .search( this.value )
                    .draw();
            } );
        } );
});

</script>
<script type="text/javascript">
$("#edit_tanggal").datepicker();
$("#tanggal").datepicker();
$("#issued").datepicker();
$("#edit_issued").datepicker();
$("#divtambah").hide();
$("#divedit").hide();

$("#tambah").click(function() {
    $("#divtambah").toggle();
    $("#divedit").hide();
    save_method = 'add';
    window.location.hash = '#divtambah';
    $("#form")[0].reset();
});



$("#batal").click(function() {
    $("#divtambah").toggle();
    $("#form")[0].reset();
});
$("#bataledit").click(function() {
    $("#divedit").hide();
    $("#form")[0].reset();
});



function readURLphoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#photofile')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
var save_method; //for save method string
var table;




function edit(id) {
    save_method = 'update';
    //Ajax Load data from ajax
    $.ajax({
        url: "<?php echo base_url('DataKaryawan/EditDataKeluarga/');?>" + id,
        dataType: "JSON",
        success: function(data) {

            $('#edit_nama').val(data.nama);
            $('#edit_keluarga_id').val(data.keluarga_id);
            $('#edit_nik').val(data.nik);
            $('#edit_nomor_bpjs').val(data.nomor_bpjs);
            $('#edit_kelas').val(data.kelas);
            $('#edit_tanggal').val(data.tanggal);
            $('#edit_issued').val(data.issued);
            $('#edit_faskes1').val(data.faskes1);
            $('#edit_hubungan_keluarga option:selected').text(data.hubungan);

            $("#divedit").toggle();
            $("#divtambah").hide();
            window.location.hash = '#divedit';


        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);

        }
    });
}



function save() {
    var url;
    url = "<?php echo base_url()?>DataKaryawan/AddDataKeluarga";
    var nama_keluarga = $.trim($("#nama_keluarga").val());
    var nrk = $.trim($("#keluarga_nrk").val());
    var nik = $.trim($("#nik").val());
    var nomor_bpjs = $.trim($("#nomor_bpjs").val());
    var kelas = $.trim($("#kelas").val());
    var tanggal = $.trim($("#tanggal").val());
    var issued = $.trim($("#issued").val());
    var faskes1 = $.trim($("#faskes1").val());
    var hubungan_keluarga = $.trim($("#hubungan_keluarga option:selected").text());

    // ajax adding data to database
    $.ajax({
        type: "POST",
        url: url,
        data: {
            nrk: nrk,
            nik: nik,
            nomor_bpjs: nomor_bpjs,
            kelas: kelas,
            tanggal: tanggal,
            issued: issued,
            faskes1: faskes1,
            nama_keluarga: nama_keluarga,
            hubungan_keluarga: hubungan_keluarga

        },
        dataType: "JSON",
        success: function(data) {
            $("#divtambah").hide();
            location.reload(); // for reload a page

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(console.error());
        }
    });
}

function save_update() {
    var url;
    url = "<?php echo base_url()?>DataKaryawan/UpdateDataKeluarga";
    var nama_keluarga = $.trim($("#edit_nama").val());
    var keluarga_id = $.trim($("#edit_keluarga_id").val());
    var nik = $.trim($("#edit_nik").val());
    var nomor_bpjs = $.trim($("#edit_nomor_bpjs").val());
    var kelas = $.trim($("#edit_kelas").val());
    var tanggal = $.trim($("#edit_tanggal").val());
    var issued = $.trim($("#edit_issued").val());
    var faskes1 = $.trim($("#edit_faskes1").val());
    var hubungan_keluarga = $.trim($("#edit_hubungan_keluarga option:selected").text());

    // ajax adding data to database
    $.ajax({
        type: "POST",
        url: url,
        data: {
            nama: nama_keluarga,
            keluarga_id: keluarga_id,
            nik: nik,
            nomor_bpjs: nomor_bpjs,
            kelas: kelas,
            tanggal: tanggal,
            issued: issued,
            faskes1: faskes1,
            hubungan_keluarga: hubungan_keluarga
        },
        dataType: "JSON",
        success: function(data) {
            $("#divedit").hide();
            location.reload(); // for reload a page
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(console.error());
        }
    });
}

function hapus(id) {
    if (confirm('Anda yakin ingin menghapus data ini?')) {
        // ajax delete data from database
        $.ajax({
            url: "<?php echo site_url()?>DataKaryawan/HapusDataKeluarga/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Menghapus Data');
            }
        });

    }
}
</script>
</body>
