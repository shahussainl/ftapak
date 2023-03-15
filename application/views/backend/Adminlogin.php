<?php
  $cmInfo = $this->API_m->singleRecord('settings',['company_id'=>2]);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php if(!empty($cmInfo->company_name)){ echo $cmInfo->company_name; } ?> | Log in</title>
  <link rel="icon" type="image" sizes="32x32" href="<?php if(!empty($cmInfo->company_logo)){ echo $cmInfo->company_logo; } ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?> ">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/font-awesome/css/font-awesome.min.css'); ?> ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/Ionicons/css/ionicons.min.css'); ?> ">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/dist/css/AdminLTE.min.css'); ?> ">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url();?>"><b><?php if(!empty($cmInfo->company_name)){ echo $cmInfo->company_name; } ?> |</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p><br>
    <p class="login-box-msg text-danger">
      <?php 
         if(!empty($this->session->flashdata('Msg')))
           { 
            echo $this->session->flashdata('Msg'); 
           } 
      ?>
      </p>

    <form action="<?= base_url('Admin/AdminVerify/'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="user_email" placeholder="Email" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="user_password" placeholder="Password" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('back_asset/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('back_asset/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('back_asset/plugins/iCheck/icheck.min.js'); ?>"></script>

</body>
</html>
