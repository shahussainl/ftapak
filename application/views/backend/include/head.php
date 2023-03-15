 <?php 
 $adminData = $this->API_m->singleRecord("settings",['company_id'=>2]);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php if(!empty($adminData->company_name)){ echo $adminData->company_name; } ?></title>

  <link rel="icon" type="image/jpg" sizes="32x32" href="<?php if(!empty($adminData->company_logo)){ echo base_url('/uploads/'.$adminData->company_logo); } ?>">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       <link rel="stylesheet" href="<?php echo base_url('back_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/jvectormap/jquery-jvectormap.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('back_asset/dist/css/skins/_all-skins.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('back_asset/plugins/timepicker/bootstrap-timepicker.css');?>">


  <link rel="stylesheet" href="<?php echo base_url('back_asset/bower_components/select2/dist/css/select2.min.css');?>">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">
.buttons-copy
,.buttons-csv
,.buttons-excel
,.buttons-pdf
,.buttons-print{
  display: none !important;
}
  </style>

</head>

  
<body class="hold-transition skin-blue sidebar-mini">
  

