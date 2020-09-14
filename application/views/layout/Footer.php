
 </div>
          <!-- /.row -->

   </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>

    <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <!-- <div class="col-md-3 col-sm-6"> -->
                            <!-- <h4>Halaman</h4>

                            <ul>
                                <li><a href="<?php echo base_url(); ?>text">Tentang</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>text">Syarat & Ketentuan</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>faq">FAQ</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>kontak">Kontak</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>blog">Blog</a>
                                </li>
                            </ul> -->

                            <!-- <h4>User section</h4>

                            <ul>
                                <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>register">Regiter</a>
                                </li>
                            </ul>

                            <hr class="hidden-md hidden-lg hidden-sm">
     -->
                        <!-- </div> -->
                        <!-- /.col-md-3 -->

                        <div class="col-md-4 col-sm-6">

                            <h4>Produk</h4>
                            <h5>Motor</h5>
                            <ul>
                                <?php
                                foreach ($kategori as $row){
                                    ?>
                                <li><a href="<?php echo base_url()?>Produk/Kategori/<?php echo $row['id'];?>"><?php echo $row['jenis_kategori'];?></a>
                                <?php } ?>
                                </li>
                                <!-- <li><a href="<?php echo base_url(); ?>produk">Bebek</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">Matic</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">Maxi Yamaha</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">Naked Bike</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">Sport</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">CBU</a>
                                </li> -->
                            </ul>

                            <!-- <h5>Parts & Accessories</h5>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>produk">Yamalube</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">YGP</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">Accessories</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>produk">Helm</a>
                                </li>
                            </ul> -->

                            <hr class="hidden-md hidden-lg">

                        </div>
                        <!-- /.col-md-3 -->

                        <div class="col-md-4 col-sm-6">
                            <h4>Kunjungi Kami Di</h4>
                            <p class="text-muted"><strong>Permata Motor.</strong>
                            <br>Jalan Raya Kebayoran Lama
                            <br>Daerah Khusus Ibukota
                            <br>Jakarta Selatan
                            <br>12220
                            <br>
                            <strong>Indonesia</strong>
                            </p>
                            <hr class="hidden-md hidden-lg">
                        </div>
                        <!-- /.col-md-3 -->

                        <div class="col-md-4">
                            <h4>Tetap Terhubung</h4>

                            <p class="social">
                                <a href="http://bit.ly/permata-motor-fb" title="Permata Motor" class="facebook external"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter external" title="Permata Motor"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="instagram external" title="Permata Motor"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="gplus external" title="Permata Motor"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="email external" title="Permata Motor"><i class="fa fa-envelope"></i></a>
                            </p>

                        </div>
                        <!-- /.col-md-3 -->

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container" align="center">
                <div class="col-md-12">
                    <p>© 2018 Permata Motor.</p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->

    </div>
    <!-- /#all -->


    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>

    <!-- <script>
        function total_change(){
            var harga = document.getElementById("hpp").value;
            var unit  = document.getElementById("qty").value;
            var total = harga * unit;
            var number_string = total.toString(),
                    sisa    = number_string.length % 3,
                    rupiah  = number_string.substr(0, sisa),
                    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                        
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                 // Cetak hasil
                // console.log(rupiah);
                    document.getElementById("jumlah").textContent = 'Rp. ' + rupiah;
                    // document.getElementById("total_id").setAttribute("value", total);
                    total.textContent="";
        }
    </script> -->

    <script>
        $(document).ready(function()
        {
            var navItems = $('.category-menu li > a');
            var navListItems = $('.category-menu li');
            var allWells = $('.category-content');
            var allWellsExceptFirst = $('.category-content:not(:first)');
            
            allWellsExceptFirst.hide();
            navItems.click(function(e)
            {
                e.preventDefault();
                navListItems.removeClass('active');
                $(this).closest('li').addClass('active');
                
                allWells.hide();
                var target = $(this).attr('data-target-id');
                $('#' + target).show();
            });

        //kredit
        // baseURL variable
          var baseURL= "<?php echo base_url();?>";
         
          // $(document).ready(function(){
         
            var name = ''; 
            // Store change
            $('#dp').change(function(){
              var dp = $(this).val();
              console.log('berhasil');
              name = dp;
              console.log(name);
              // AJAX request
              $.ajax({
                url:'<?=base_url()?>Shopping/listKredit',
                method: 'post',
                data: {dp : dp},
                dataType: 'json',
                success: function(response){
                  console.dir(response);
                  // Remove options 
                  $('#tenor').find('option').not(':first').remove();
                  // $('#sel_depart').find('option').not(':first').remove();

                  // Add options
                  $.each(response,function(index,data){
                     $('#tenor').append('<option value="'+data['id']+''+data['tenor']+'">'+data['tenor']+'</option>');
                  });
                }
             });
             });

            $('').change(function(){
              var a = $(this).val();
              console.log(a)
            });

             });

        function Angka(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))

                    return false;
                return true;
            }

            //input angka
            $( "#jumlahOrder" ).on('input', function() {
                if ($(this).val().length>=3) {
                    alert('Maksimal Pemesanan 3 Digit');       
                }
            });

        $('#pagination-demo').twbsPagination({
            totalPages: 16,
            visiblePages: 6,
            next: 'Next',
            prev: 'Prev',
            onPageClick: function (event, page) {
                //fetch content and render here
                $('#page-content').text('Page ' + page) + ' content here';
            }
        });

        document.querySelector('.sweet-3').onclick = function(){
        swal("Good job!", "You clicked the button!", "success");
      };
        
    </script>
    <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "6281213751979", // WhatsApp number
                company_logo_url: "//static.whatshelp.io/img/flag.png", // URL of company logo (png, jpg, gif)
                greeting_message: "Halo, ada yang bisa kami bantu? Kirim saja pesan sekarang untuk mendapatkan bantuan.", // Text of greeting message
                call_to_action: "Hubungi kami", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /WhatsHelp.io widget -->
</body>

</html> 