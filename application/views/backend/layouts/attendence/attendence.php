<?php
 $res =   $this->API_m->singleRecord('projects',['prj_id' => $this->uri->segment(3)]);
 $prj_name = $res->prj_name;
 $prj_id = $res->prj_id;
 $pr_id  = $this->uri->segment(3);
 // echo "<pre>";
 // print_r($appList);
 // exit();
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Applicants  Attendence
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
       <!--  <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>
     <h1></h1>
    <!-- Main content -->
    <section class="content">
     
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $prj_name; ?></h3>

              <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button> -->
                <div class="btn-group">
                  <button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-download"></i>Export</button>
                  <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-print").click();'>
                            <i class="fa fa-print"></i>
                          Print
                        </a>
                    </li>
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-pdf").click();'>
                            <i class="fa  fa-file-pdf-o"></i>
                          pdf
                        </a>
                    </li>
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-csv").click();'>
                            <i class="fa fa-database"></i>
                          CSV
                        </a>
                    </li>
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-excel").click();'>
                            <i class="fa  fa-file-excel-o"></i>
                          excel
                        </a>
                    </li>
                     <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-copy").click();'>
                            <i class="fa fa-copy"></i>
                          copy
                        </a>
                    </li>
                  </ul>
                </div>
                <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                   
                 <div class="col-md-12">
                  
                      <?php
                           if(!empty($appList))
                           {
                       ?>
                      
                        <form action="<?php echo base_url('MainContent/insertAttendence'); ?>" method="post">
                              <div class="row">
                                <div class="col-md-4">
                               <!-- <b>Test Date:</b> <label><input type="text" name="test_date" value="" class="form-control datepicker" required></label> -->
                                </div>
                                <div class="col-md-3 pull-right">
                                  <!-- Project Name: <label for="inputPassword4"><?= $prj_name; ?></label> -->
                                </div>
                              </div>
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                     <th>  
                                        <input type="checkbox" class="chAll" />ALL
                                      </th>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>ROLLNO</th>
                                    <th>CNIC</th>              
                                    <th>ATTENDENCE</th>
                                    <th>TEST DATE</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    <?php
                                             $sn = 1;
                                      foreach($appList as $list)
                                      {
                                ?>
                                <tr>
                                  <td>
                                      <label>
                                          <input type="checkbox" onclick="AttChecks()"  class="minimal myCustomCheckBox ch_ID" name="app_id[]" value="<?php if(!empty($list['data']->my_app_id)){ echo $list['data']->my_app_id; } ?>" <?php if(!empty($list['record']->app_id)){ echo 'checked';} ?> >
                                      </label>
                                  </td>
                                  <td><?= $sn; ?></td>
                                 <td>
                                    <input type="text" name="user_name[]" class="form-control"  value="<?= $list['data']->user_fullname;  ?>" disabled>
                                     <input type="hidden" name="user_name[]" class="form-control"  value="<?= $list['data']->user_fullname;  ?>" d>
                                    
                                  </td>
                                  <td>
                                    <input type="text" name="roll_no[]" class="form-control roll_no"  value="<?= $list['data']->roll_no;  ?>" disabled>
                                  </td>
                                  <td>
                                    <input type="hidden" name="prj_id" class="prj_id" value="<?= $this->uri->segment(3); ?> ">
                                    <input type="text"   name="user_cnic[]" class="form-control" value="<?= $list['data']->user_cnic; ?>" disabled>
                                    <input type="hidden" name="user_id[]" class="user_id"   value="<?= $list['data']->user_id; ?>">
                                    <input type="hidden" name=""    value="<?php if(!empty($list['record']->app_id)){ echo $list['record']->app_id;} ?>">
                                    

                                  </td>
                                  <td>
                                       <select class="form-control atten"  name="atten[]" required>
                                           <option value="">--Select--</option>
                                           <option value="P" <?php if(!empty($list['record']->status)){ if($list['record']->status=='P'){ echo 'selected';} } ?> >Present</option>
                                           <option value="A" <?php if(!empty($list['record']->status)){ if($list['record']->status=='A'){ echo 'selected';} } ?> >Absent</option>
                                       </select>
                                  </td>
                                  <td>
                                    <input type="text" name="" class="form-control"  value="<?= date('d M Y h:i a', strtotime($list['data']->app_tdt));  ?> " disabled>
                                    <input type="hidden" name="test_date[]" class="form-control testDate"  value="<?= $list['data']->app_tdt;  ?> ">
                                  </td>
                                </tr>
                                <?php
                                    $sn++;
                                      }
                                ?>
                                
                              </tbody>
                              </table>
                                <div class="form-group"><br>
                                  <div class="form-group col-md-12">
                                    <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-success">Update Checked</button>

                       </form>
                                  </div>
                                </div>
                       <!-- <div class="row">
                         <div class="col-md-12">
                         <div class="btn-group">
                  <button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-arrow-down"></i>Bulk Option</button>
                  <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="javascript:void(0);">
                            <i class="fa fa-print"></i>
                          Update Check
                        </a>
                    </li>
                  </ul>
                </div> 
                         </div>
                       </div>  -->
                       <?php 
                        }
                        else
                        {
                      ?>
                       <div class="form-group">
                          <h3>Please, First Add Applicants</h3>
                        <br>
                        <div class="form-group col-md-12">
                          <label>For Applicants click button </label><br>
                            <a href="<?= base_url('MainContent/AddprjApplicantsList/'.$this->uri->segment(3)); ?>">
                            <button type="button" class="btn btn-lg btn-info"><i class="fa fa-plus"></i> 
                            Add Applicants
                            </button>
                            </a>
                        </div>
                      </div>
                      <?php
                        }
                       ?>



                 </div> 
                 

              </div>
              <!-- /.row -->
              <div class="row pull-right">
                <div class="col-md-12">
                   <ul class="list-inline">
<li>
    <a href="<?= base_url('MainContent/AddprjApplicantsList/'.$pr_id); ?>">
      <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
      Add/Update Applicants
      </button>
    </a>
  </li>
                <li>
                  <a href="<?= base_url('MainContent/prjRollnoView/'.$pr_id); ?>">
                    <button type="button" class="btn sm btn-success"><i class="fa fa-list"></i> 
                      Rollno List
                    </button>
                  </a>
               </li>
              <li>
                <a href="<?= base_url('MainContent/assignResultView/'.$pr_id); ?>">
                  <button type="button" class="btn sm btn-secondary"><i class="fa fa-plus"></i> 
                   Generate Result
                  </button>
                </a>
              </li>
              <li>
                <a href="<?= base_url('MainContent/getPrjAppResults/'.$pr_id); ?>">
                  <button type="button" class="btn sm btn-primary"><i class="fa fa-list"></i> 
                  Result List
                  </button>
                </a>
              </li>
          </ul>
                </div>
              </div>
            </div>
          
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- code for mulitple checks  -->

<form action="<?= base_url(); ?>" class="attCheckForm" method="post">

<input type="hidden" name="prj_id"      value="<?= $this->uri->segment(3); ?>">

 
</form>




<!-- loader  -->
  <style type="text/css">
    .modal-dialog{vertical-align: center !important;margin-top: 150px;opacity: 0px;}
    .#modal-success{background-color: rgba(0,0,0,.0001) !important;}
  </style>
<div class="modal" id="modal-success" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
            <!-- <span aria-hidden="true">×</span></button> -->
          <h4 class="modal-title">Loading...</h4>
        </div>
        <div class="modal-body text-center">
          <div class="overlay"><i class="fa fa-refresh fa-spin" style="font-size: 50px;"></i></div>
        </div>
      <!--   <div class="modal-footer">
           <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> 
           <button type="button" class="btn btn-outline">Save changes</button> 
        </div> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ./Loader -->