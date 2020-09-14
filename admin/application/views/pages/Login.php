<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style type="text/css">
        html, body {
    height: 100%;
    width: 100%;
}

body {
    font-family: 'Raleway',sans-serif;
    position: relative;
    /*background: rgba(0, 0, 0, 0) url("../img/ptn.png") repeat scroll 0 0;*/
}

.in-page {
    min-height: 520px;
}

.main {
    position: relative;
}

a {
    color: #1b5a7c;
}

a:hover, a:focus {
    color: #1b5a7c;
}

.btn-cyan {
    background-color: #1b5a7c;
    color: #fff;
}

.btn-cyan:hover {
    color: #fff;
    opacity: 0.9;
}

.form-control:focus {
    border-color: #1b5a7c;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(24, 204, 162, 0.6);
    outline: 0 none;
}

.min-height {
    min-height: 350px;
    padding-top: 20px;
}

.login-screen {
    background-image: url(../assets/img/logo-permata.png);
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: contain;
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
}

.login-screen:before {
    content: "";
    background: rgba(0,0,0, 0.5);
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.login-center {
    text-align: left;
}

.login {
    width: 320px;
    color: #fff;
}

.login .login-form {
    text-align: left;
}

.login label {
    color: #fff;
}

.login-form .input-group .form-control {
    background: none;
    height: 44px;
    color: #ddd;
}

.login-form .input-group .input-group-addon {
    background: none;
}

.login-form .input-group .input-group-addon .glyphicon {
    color: #1b5a7c;
}

.login-form .input-group .form-control::-moz-placeholder {
    color: #fff;
    opacity: 0.3;
}

.login .sign-btn button.btn {
    background: none;
    border-color: #1b5a7c;
    color: #fff;
    width: 320px;
}

.btn-outline{
    border-color: #fff;
}

.login .sign-btn a {
    text-decoration: none;
}

.login .checkbox {
    margin-top: 20px;
    margin-bottom: 20px;
}

.login .forgot {
    display: inline-block;
    margin: 20px 0;
}
    </style>

</head>

<body class="main">
    <div class="login-screen"></div>
    <div class="login-center">
        <div class="container min-height">
            <div class="row">
                <div class="col-xs-4 col-md-offset-8">
                    <div class="login">
                        <div class="front signin_form">
                            <p>Login Your Account</p>
                            <form class="login-form" action="<?php echo base_url('Auth/Login'); ?>" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-envelope" title="Email"></i>
                                        </span>
                                        <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-lock" title="Password"></i>
                                        </span>
                                        <input type="password" name="password" id="passwordfield" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group sign-btn">
                                    <button type="submit" class="btn btn-outline" style="color: #1b5a7c;"><span style="color: #fff;">Login</span></button>
                                </div>
                                <div class="text-center text-error">
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/my-login.js"></script>    
    </body>

</html>

