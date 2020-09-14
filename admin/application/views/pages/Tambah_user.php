        <div id="page-wrapper">
            <!-- /.row -->
            <div class="col-md-12">
                <div class="row">
                    
                
            <div class="col-md-6">                    
                <div class="row main">
                    <div class="main-login main-center">
                    <!-- <h5>Sign up once and watch any of our free demos.</h5> -->
                    <?php echo $this->session->flashdata('user'); ?>
                        <form class="" method="post" action="<?php echo base_url('User/Register') ?>">
                            
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="nama" id="nama"  placeholder="Enter your Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Username</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Level</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">-- pilih posisi --</option>
                                            <option value="admin">Admin</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="sales">Marketing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control message" name="password" id="password"  placeholder="Enter your Password"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control message" name="confirm" id="confirm" onchange="Check()"  placeholder="Confirm your Password"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <button type="submit" id="ok" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">                    
                <div class="row main">
                    <div class="main-logo logo-center">
                        <img src="assets/img/user.gif" style="width: 100%;" title="Please Aktifkan Saya">                    
                    </div>
                    <div class="main-center">
                        <span>
                            <p>
                                Akun yang baru dibuat, tidak langsung aktif. Silahkan aktifkan terlebih dahulu agar bisa melakukan login.
                            </p>
                        </span>
                    </div>
                </div>
            </div>

                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

        <style>
            #playground-container {
                height: 500px;
                overflow: hidden !important;
                -webkit-overflow-scrolling: touch;
            }

            .container{
                width: 100%;
            }

            .main{
                margin:10px 15px;
            }

            h1.title { 
                font-size: 50px;
                font-family: 'Passion One', cursive; 
                font-weight: 400; 
            }

            hr{
                width: 10%;
                color: #fff;
            }

            .form-group{
                margin-bottom: 15px;
            }

            label{
                margin-bottom: 15px;
            }

            input,
            input::-webkit-input-placeholder {
                font-size: 11px;
                padding-top: 3px;
            }

            .main-login{
                background-color: #fff;
                /* shadows and rounded borders */
                -moz-border-radius: 2px;
                -webkit-border-radius: 2px;
                border-radius: 2px;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            }
            .main-logo{
                background-color: #fff;
                /* shadows and rounded borders */
                -moz-border-radius: 2px;
                -webkit-border-radius: 2px;
                border-radius: 2px;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            }

            .logo-center{
                margin-top: 30px;
                margin: 0 auto;
                max-width: 400px;
                padding: 10px 40px;
                background:#fff;
                    color: #FFF;
                text-shadow: none;
                /*-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);*/
                /*-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);*/
                /*box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);*/
                border-color: none;

            }

            .form-control {
                height: auto!important;
                padding: 8px 12px !important;
            }
            .input-group {
                -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
                -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
                box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
            }
            #buttonregist {
                border: 1px solid #ccc;
                margin-top: 28px;
                padding: 6px 12px;
                color: #666;
                text-shadow: 0 1px #fff;
                cursor: pointer;
                -moz-border-radius: 3px 3px;
                -webkit-border-radius: 3px 3px;
                border-radius: 3px 3px;
                -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
                -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
                box-shadow: 0 1px #fff inset, 0 1px #ddd;
                background: #f5f5f5;
                background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
                background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
                background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
                background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
                background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
            }
            .main-center{
                margin-top: 30px;
                margin: 0 auto;
                max-width: 400px;
                padding: 10px 40px;
                background:#009edf;
                    color: #FFF;
                text-shadow: none;
                -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
                -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
                box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

            }
            span.input-group-addon i {
                color: #009edf;
                font-size: 17px;
            }

            .login-button{
                margin-top: 5px;
            }

            .login-register{
                font-size: 11px;
                text-align: center;
            }
        </style>

        <script type="text/javascript">
            function Check(){
                var password        = $("#password").val();
                var confirmPassword = $("#confirm").val();

                if (password != confirmPassword){
                    $('.message').css("border","2px solid #FF1100");
                    $('#ok').attr('disabled','disabled');
                }else{
                    $('.message').css("border","2px solid #60FF02");
                    $('#ok').removeAttr('disabled');
                }
            }
        </script>