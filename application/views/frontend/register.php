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
    <a href="<?= base_url();?>"><b><?php if(!empty($cmInfo->company_name)){ echo $cmInfo->company_name; } ?> |</b>Customer Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><strong>Register</strong> </p>
    <p class="login-box-msg text-danger">
      <?php 
         if(!empty($this->session->flashdata('Msg')))
           { 
            echo $this->session->flashdata('Msg'); 
           } 
      ?>
      </p>
    <form action="<?= base_url('Customer/CustomerRegister/'); ?>" method="post">
        <div class="form-group has-feedback">
            <input type="text" id="uCnic" class="form-control cnicMsg uCnic" name="user_cnic" onblur="findCnicRec(this);" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask=""  placeholder="xxxxx-xxxxxx-x" autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control " name="user_fullname"   placeholder="Full name" autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="user_email" onblur="findEmailRec(this);" placeholder="Email" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="user_phone" class="form-control user_contact" value="" placeholder="03xx-xxxxxxx" data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign up</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="row">
    <div class="col-xs-5"></div>
      <div class="col-xs-4">
          <h3>OR</h3>
      </div>
      <!-- /.col -->
      <div class="col-xs-12">
        <a href="<?= base_url('Customer'); ?>" class="btn btn-warning btn-block btn-flat">Sign in</a>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->

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

<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
<script>
  function findCnicRec(obj)
  {
    var cnic = $(obj).val();

    // alert(cnic);
   if(cnic!='')
   {
    // $.ajax({
	// 	type: 'post',
	// 	dataType: 'json',
	// 	async: false,
	// 	data: {
	// 		"user_cnic": cnic
	// 	},
	// 	url: '<= base_url('MainContent/getUserDetail'); ?>',
	// 	success: function (data)
	// 	{
	// 		// alert(data);

	// 		if (data == null) {
	// 		} else {

	// 			$('#errMsg').html('<span class="text-success">Record Found!</span>');
	// 			$(obj).closest('tr').find('.cnicMsg').css("border", "green solid 1px");
	// 			$(obj).closest('tr').find('.user_email').val(data.user_email);
				
	// 		}
		
	// 	}
	// });
     } 
     else
     {
         $('#errMsg').html('<span class="text-danger">CNIC must not be empty!</span>');
         $(obj).closest('tr').find('.cnicMsg').css("border", "red solid 1px");
     }
  }

  $(document).ready(function(){
    $('[data-mask]').inputmask();
    // $(document).on('click','.btn_edit',function(){
    //     var id = $(this).attr('id');
    //     $('input[name="id"]').val(id);

    // });
});
</script>
</script>
</body>
</html>
