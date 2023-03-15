 <?php 
 $adminData = $this->API_m->singleRecord("settings",['company_id'=>2]);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="JobBoard - HTML Template" />
	<meta property="og:title" content="JobBoard - HTML Template" />
	<meta property="og:description" content="JobBoard - HTML Template" />
	<meta property="og:image" content="JobBoard - HTML Template" />
	<meta name="format-detection" content="telephone=no">
	
	<link rel="icon" href="images/favicon.ico" type="<?php if(!empty($adminData->company_logo)){ echo base_url('/uploads/'.$adminData->company_logo); } ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php if(!empty($adminData->company_logo)){ echo base_url('/uploads/'.$adminData->company_logo); } ?>" />
		
	<!-- PAGE TITLE HERE -->
	<title><?php if(!empty($adminData->company_name)){ echo $adminData->company_name; } ?></title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('front_asset/css/plugins.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('front_asset/css/style.css');?>">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('front_asset/css/templete.css');?>">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url('front_asset/css/skin/skin-1.css');?>">
	
</head>