<!-- <?php echo print_r($barang) ?> -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $this->session->flashdata('msg'); ?>
                                                            <div class="card-content">
  
                                   
                                                                <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Store Info</h4>
                                    <p class="category"></p>
                                </div>







                                <div class="card-content table-responsive">
                                      <form action="<?php echo base_url().'StockCard/AddNew'; ?>" method="post" id="myform">
                                  
                                        <div class="row">
                                           
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Store Name</label>
                                                    <select name="nama_toko" class="form-control" id="store">
                                                        
                                                        <option>-- Store Name -- </option>
                                                    
                              <?php
           foreach($storename as $storename){
             echo "<option value='".$storename['nama_toko']."'>".$storename['nama_toko']."</option>";
           }
           ?>
                                                     </select>
                                                  
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Store Branch</label>
                                                    <select name="cabang_toko" class="form-control" id="store_branch">
                                                        <option></option>
                                                    </select>
                                                  
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Store Address</label>
                                                    <select name="alamat" class="form-control" id="store_address">
                                                        <option></option>
                                                    </select>
                                                  <br><br><br>
                                                </div>
                                            </div>



  
 
</div>

</div>
</div>


                                    <div class="card-content">
  
                                   
                                                                <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Add Stock</h4>
                                    <p class="category"></p>
                                </div>

 <div class="card-content table-responsive">
<div class="col-md-6">
<div class="form-group label-floating">
<label class="control-label">Input Jumlah Barang</label>
<input type="text" class="form-control" name="jml" id="member" required="required" value="">
</div>
</div>
<a href="#" class=" btn btn-primary" id="filldetails" onclick="generateInput()">Buat Input</a>
<a href="#" class=" btn btn-primary" id="filldetails" onclick="resetInput()">Reset</a>
<div id="contain">
</div>
                                            <br><br>
<input type="submit" class="btn btn-info pull-right" value="Submit Data">
                                     
<div class="clearfix"></div>
</form>
</div>

</div>
                       </div>
                    </div>
                </div>
            </div>
 <!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.0.0"></script> -->
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script type="text/javascript">
  function generateInput(){
    var number = document.getElementById("member").value;
    var contain = document.getElementById("contain");
    
    for(i=0; i<number; i++){
      //contain.appendChild(document.createTextNode("Soal No. " + (i + 1)));
      // var label = document.createElement("label");
      // label.className = "form-group";
      // label.innerHTML = "No. " + (i + 1);
      var iDiv = document.createElement("div");

      // var soal = document.createElement("input");
      // soal.type = "text";
      // soal.id = "soal";
      // soal.className = "form-control";
      // soal.name = "soal[]";
      // soal.placeholder = "Soal";
      
      
      // iDiv.appendChild(label);
      // contain.appendChild(iDiv);
      var obj = <?php echo json_encode($barang); ?>;
      var kode_label = document.createElement("label");
      kode_label.className = "control-label";
      kode_label.innerHTML = "Kode Barang";
      // console.log(obj);
      var kode_select = document.createElement("select");
      // kode_select.id = "mySelect";
      kode_select.className = "form-control";
      kode_select.name = "kode_barang_"+i;
      kode_select.setAttribute('form','myform');
      // iDiv.appendChild(kode_select);
      for(var k in obj) {
      console.log(k, obj[k].code_barang);
      var option = document.createElement("option");
      option.value = obj[k].code_barang;
      option.text = obj[k].code_barang;
      kode_select.appendChild(option);
        }

      var nama_label = document.createElement("label");
      nama_label.className = "control-label";
      nama_label.innerHTML = "Nama Barang";

        var nama_select = document.createElement("select");
      // nama_select.id = "mySelect";
      nama_select.className = "form-control";
      nama_select.name = "nama_barang_"+i;
      nama_select.setAttribute('form','myform');
      // iDiv.appendChild(nama_select);
      for(var k in obj) {
      console.log(k, obj[k].nama_barang);
      var option = document.createElement("option");
      option.value = obj[k].nama_barang;
      option.text = obj[k].nama_barang;
      nama_select.appendChild(option);
        }

          var size_label = document.createElement("label");
      size_label.className = "control-label";
      size_label.innerHTML = "Size Barang";

        var size_select = document.createElement("select");
      // size_select.id = "mySelect";
      size_select.className = "form-control";
      size_select.name = "ukuran_barang_"+i;
      size_select.setAttribute('form','myform');
      // iDiv.appendChild(size_select);
      for(var k in obj) {
      console.log(k, obj[k].ukuran_barang);
      var option = document.createElement("option");
      option.value = obj[k].ukuran_barang;
      option.text = obj[k].ukuran_barang;
      size_select.appendChild(option);
        }
      var jumlah_label = document.createElement("label");
      jumlah_label.className = "control-label";
      jumlah_label.innerHTML = "Jumlah Barang";
      var a = document.createElement("input");
      a.type = "text";
      a.id = "a";
      a.className = "form-control";
      a.name = "jumlah_barang_"+i;
      a.placeholder = "Jumlah";
      a.setAttribute('form','myform');
      // var a = document.createElement("input");
      // a.type = "text";
      // a.id = "a";
      // a.className = "form-control";
      // a.name = "a[]";
      // a.placeholder = "Kode Barang";
      // var b = document.createElement("input");
      // b.type = "text";
      // b.id = "b";
      // b.className = "form-control";
      // b.name = "b[]";
      // b.placeholder = "Nama Barang";
      // var c = document.createElement("input");
      // c.type = "text";
      // c.id = "c";
      // c.className = "form-control";
      // c.name = "c[]";
      // c.placeholder = "Size";
      // var d = document.createElement("input");
      // d.type = "text";
      // d.id = "d";
      // d.className = "form-control";
      // d.name = "d[]";
      // d.placeholder = "Jumlah Barang";
      // var jawab = document.createElement("input");
      // jawab.type = "text";
      // jawab.id = "e";
      // jawab.className = "form-control";
      // jawab.name = "jawab[]";
      // jawab.placeholder = "Kunci Jawaban (A/B/C/D/E)";
      iDiv.appendChild(kode_label);
      contain.appendChild(iDiv);
      iDiv.appendChild(kode_select);
      contain.appendChild(iDiv);
      iDiv.appendChild(nama_label);
      contain.appendChild(iDiv);
      iDiv.appendChild(nama_select);
      contain.appendChild(iDiv);
      iDiv.appendChild(size_label);
      contain.appendChild(iDiv);
      iDiv.appendChild(size_select);
      contain.appendChild(iDiv);
      iDiv.appendChild(jumlah_label);
      contain.appendChild(iDiv);
      iDiv.appendChild(a);
      contain.appendChild(iDiv);
      // iDiv.appendChild(d);
      // contain.appendChild(iDiv);
      // iDiv.appendChild(jawab);
      // contain.appendChild(iDiv);
      
      // contain.appendChild(document.createElement("br"));
      
    }
    }

    function resetInput(){
    var contain = document.getElementById("contain");
    while(contain.hasChildNodes()){
      contain.removeChild(contain.lastChild);
    }
  }
</script>
  <script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    var name = ''; 
    // Store change
    $('#store').change(function(){
      var storename = $(this).val();
      console.log('berhasil');
      name = storename;
      console.log(name);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>StockCard/getBranch',
        method: 'post',
        data: {storename: storename},
        dataType: 'json',
        success: function(response){
          console.dir(response);
          // Remove options 
          $('#store_branch').find('option').not(':first').remove();
          // $('#sel_depart').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#store_branch').append('<option value="'+data['cabang_toko']+'">'+data['cabang_toko']+'</option>');
          });
        }
     });
     });

   // Store Branch change
   $('#store_branch').change(function(){
     var address = $(this).val();
     console.log('ini juga');
     // AJAX request
     $.ajax({
       url:'<?=base_url()?>StockCard/getAddress',
       method: 'post',
       data: {address: address,
              name : name
            },
       dataType: 'json',
       success: function(response){
          console.dir(response);
         // Remove options
         $('#store_address').find('option').not(':first').remove();

         // Add options
         $.each(response,function(index,data){
           $('#store_address').append('<option value="'+data['alamat']+'">'+data['alamat']+'</option>');
         });
       }
    });
  });

$('').change(function(){
  var a = $(this).val();
  console.log(a)
});

 });
 </script>
<script>
  function save(){
    number = document.getElementById('member').value;
    nama_toko = document.getElementById('store');
    var toko = nama_toko.options[nama_toko.selectedIndex].value;
    branch_toko = document.getElementById('store_branch');
    var branch = branch_toko.options[branch_toko.selectedIndex].value;
    alamat_toko = document.getElementById('store_address');
    var alamat = alamat_toko.options[alamat_toko.selectedIndex].value;
    var kode_barang = [];
    var kode = [];
    // for(var i=0; i<=number; i++){
    //   kode_barang[i] = document.getElementById('kode_barang_'+i);
    //   var kode[i] = kode_barang[i].options[kode_barang[i].selectedIndex].value;
    //   console.log(kode[i]);
    // }
    console.log(number);
    console.log(toko);
    console.log(branch);
    console.log(alamat);
  }
</script>