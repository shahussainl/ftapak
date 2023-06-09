<?php

// echo "<pre>";
// print_r($data);
// exit();
 $adminData = $this->API_m->singleRecord("settings",['company_id'=>2]);
if($data!='')
{
   

 $res         = $this->API_m->singleRecord('projects',['prj_id' => $this->uri->segment(4)]);
 $prj_name    = $res->prj_name;
 // print_r($res);

 // $pr_id = $this->uri->segment(4);
 // $prj_t_marks = $res->prj_total_marks;


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $prj_name; ?></title>

  <link rel="icon" type="image/jpg" sizes="32x32" href="<?php if(!empty($adminData->company_logo)){ echo base_url('/uploads/'.$adminData->company_logo); } ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('back_asset/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('back_asset/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('back_asset/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('back_asset/dist/css/AdminLTE.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- onload="window.print();" -->
<body  onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3" style="border:2px inset #000;">
        <h2 class="page-header text-center">
        	<img class="img-circle img-bordered-sm" style="width: 60px; height: 60px;" src="<?php if(!empty($adminData->company_logo)){ echo base_url('/uploads/'.$adminData->company_logo); } ?>" alt="user image">
        <span style="font-size: 20px; font-weight: bold;"><?= $adminData->company_name; ?></span> 
          <small class="pull-center">
           <?= $adminData->company_address; ?>
      </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3" style="display:none;">
      	<?php
      		// $org = $this->API_m->singleRecord('organization',['org_id'=>$data->org_id]);
      	?>
        <h2 class="page-header text-center">
        	<img class="img-circle img-bordered-sm" style="width: 60px; height: 60px;" src="<?php if(!empty($org->org_logo)){ echo base_url('/uploads/'.$org->org_logo); } ?>" alt="user image">
        <span style="font-size: 20px; font-weight: bold;"><?= $org->org_name; ?></span> 
          
        </h2>
      </div>
      <!-- /.col -->
      <div class="col-xs-6 text-danger" >
      <b style="font-size: 15px;">Test Date/Time:	<?php if($data->test_date_time!=''){ echo date('d M Y h:i a',strtotime($data->test_date_time)); }else {echo 'Pending';} ?></b>
      </div>
    </div>
  
    <div class="row invoice-info">
      <div class="col-sm-8 col-md-8 col-lg-8"></div>
      <!-- /.col -->
      <div class="col-sm-4 col-md-4 col-lg-4">
        <?php
          if(!empty($data->user_img))
          {
        ?>
        <img src="<?= base_url('uploads/'.$data->user_img);?>" class="profile-user-img img-responsive img-rounded" style="border:1px solid #000; width: 200px; height: 160px;">
        <?php
          }
        ?>
      </div>
    </div>
    <!-- /.row -->
<br><br>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead style="background-color: #4d4d4d !important; color:white;">
          <tr>
			<th>Name</th>
			<th>CNIC</th>
			<th>Mobile</th>
			<th>Program/Post</th>
			<th>Rollno</th>
			<th>Test Center</th>
			<th>Test Date/Time</th>
			<th>Address</th>
          </tr>
          </thead>
          <tbody>
          <tr>
			<td><?= $data->user_fullname;                                                 ?></td>
			<td><?= $data->user_cnic;                                                     ?></td>
			<td><?= $data->user_contact;                                                  ?></td>
			<td><?= $data->prj_name;                                                      ?></td>
			<td><?php if($data->roll_no!=''){ echo $data->roll_no;}else {echo 'Pending';}  ?></td>
			<td><?php if($data->name!=''){ echo $data->name;}else {echo 'Pending';}        ?></td>
			<td><?php if($data->test_date_time!=''){ echo date('d M Y h:i a',strtotime($data->test_date_time)); }else {echo 'Pending';}    													                      ?></td>
			<td><?php if($data->address!=''){ echo $data->address;}else {echo 'Pending';}  ?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column --><br>
      <div class="col-sm-12 col-sm-10 col-md-12 col-lg-12">
        <h3 class="text-danger">Important <i class="fa fa-info"></i></h3>
        <ul>
          <li>
            <p>You must bring Roll Number Slip and Orginal Computerized National Identity Card (CNIC). Candidates who doesn't possess Orginal CNIC, they are directed to bring Armed license or driving license or service card (if Govt. Servant) with latest photograph to identify themselves. Otherwise, they will not be allowed to test Center</p>
          </li>
          
          <li>
            <p>No Ta/Da will be admissible on test day.</p>
          </li>
            
          <li>
            <p class="text-danger">Mobile Phone, Calculators or any Gadget is not allowed in the Test Center Premises as per HEC instructions and NTS rules. Please don't bring any of the above with you. Candidate may be searched for mobile phone / electronic device and if found it will be confiscated and paper will be cancelled.</p>
          </li>
           
        </ul>
      
      </div>
      <!-- /.col -->
    <!--   <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </table>
        </div> 
      </div>-->
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
}
else
{
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>No Record</title>

  <link rel="icon" type="image/jpg" sizes="32x32" href="<?php if(!empty($adminData->company_logo)){ echo base_url('/uploads/'.$adminData->company_logo); } ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('back_asset/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('back_asset/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('back_asset/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('back_asset/dist/css/AdminLTE.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- onload="window.print();" -->
<body >
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3" style="border:2px inset #000;">
        <h2 class="page-header text-center">
          <img class="img-circle img-bordered-sm" style="width: 60px; height: 60px;" src="<?php if(!empty($adminData->company_logo)){ echo base_url('/uploads/'.$adminData->company_logo); } ?>" alt="user image">
        <span style="font-size: 20px; font-weight: bold;"><?= $adminData->company_name; ?></span> 
          <small class="pull-center">
           <?= $adminData->company_address; ?>
      </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <hr>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12">
        <h3 class="text-danger">Important!</h3>
        <ul>
          <li>
            <p class="text-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </li>
            <li>
            <p class="text-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </li>
            <li>
            <p class="text-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </li>
        </ul>
      
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
   
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
<?php  
}
?>
