<?php 
$pr_id = $this->uri->segment(3);

// echo "<pre>";
// print_r($rollnoList);
// exit();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  Dashboard -->
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
       <!--  <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <br><br>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <?php $res = $this->API_m->singleRecord('projects',['prj_id'=>$this->uri->segment(3)]); ?>
              <h3 class="box-title">Rollno list for <?php if(!empty($res->prj_name)){ echo'<b>'. $res->prj_name.'</b>';} ?></h3>

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
                     <!-- <h1>Main Body</h1> -->
                              <?php
                              if(!empty($rollnoList))
                              {
                              ?>
                                <table class="table data-tbl" id="tbl-prj">
                                   <thead>
                                     <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">ROLLNO</th>
                                       <th scope="col">APPLICANT</th>
                                       <th scope="col">CNIC</th>
                                       <th scope="col">CONTACT</th>
                                       <th scope="col">A R DATE</th>
                                       <th scope="col">TEST DATE</th>
                                    
                                     </tr>
                                   </thead>
                                   <tbody>

                                    <?php
                                    
                                        $sno=1;
                                       foreach ($rollnoList as $key => $list) 
                                       {
                                     ?>
                                     <tr>
                                       <th scope="row"><?php echo $sno; ?></th>
                                       <td><?php echo $list->roll_no;  ?></td>
                                       <td><?php echo $list->user_fullname;   ?></td>
                                       <td><?php echo $list->user_cnic;        ?></td>
                                       <td><?php echo $list->user_contact;    ?></td>
                                       <td><?php echo date('d M Y',strtotime($list->app_received_date)); ?></td>
                                       <td><?php echo date('d M Y',strtotime($list->test_date_time)); ?></td>
                                       
                                     </tr>
                                     <?php   
                                          $sno++;
                                       }
                                    ?>

 
                                   </tbody>
                                </table>
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
                                          <a href="<?= base_url('MainContent/assignToApplicatView/'.$this->uri->segment(3)); ?>">
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
                    <a href="<?= base_url('MainContent/prjApplicantsList/'.$pr_id); ?>">
                      <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                      Applicant List
                      </button>
                    </a>
                  </li>
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
                      <a href="<?= base_url('MainContent/attendenceView/'.$pr_id); ?>">
                        <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                        Attendence
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










