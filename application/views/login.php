<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Halaman Admin Web Inventaris Laboratorium</title>
    <link rel="shorcut icon" type="image/png" href="<?= base_url() ?>assets/dist/img/PNJLogo.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"/>
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css"/>
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css"/>
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url() ?>assets/dist/img/BannerTIK.png" alt="Politeknik Negeri Jakarta Logo" class="img-fluid">
        </div>
        <div class="login-box-body">              
            <p class="login-box-msg">Sign in to start your session</p>            
            <?php $this->load->view('alert')?>  
            <form action="<?=site_url('auth/process')?>" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" name="usr_name" class="form-control" placeholder="Username" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                 <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>            
            </form>
        </div>
    </div>

    
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>