<?php
 $res =   $this->API_m->singleRecord('projects',['prj_id' => $this->uri->segment(3)]);
 $prj_name = $res->prj_name;

?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendence List View 
        <!-- <small>Version 2.0</small> -->
      </h1>
     <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>
     <h1></h1>
    <!-- Main content -->
    <section class="content">
     
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Applicants Attendence </h3>

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
                  
                      
                      
                        <form action="<?php echo base_url('MainContent/insertAttendence'); ?>" method="post">
                              <div class="row">
                                <div class="col-md-4">
                               <!-- <b>Test Date:</b> <label><input type="text" name="test_date" value="" class="form-control datepicker" required></label> -->
                                </div>
                                <div class="col-md-3 pull-right">
                                  Project Name: <label for="inputPassword4"><?= $prj_name; ?></label>
                                </div>
                              </div>
                              <table class="table table-striped data-tbl" id="tbl-AttendenceList">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>ROLLNO#</th>
                                    <th>CNIC</th>
                                    <th>PROJECT NAME</th>              
                                    <th>ATTENDENCE</th>
                                    <th>TEST DATE</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 
                               <?php
                                        $sn=1; 
                                  foreach ($attendenceList as $key => $row) 
                                  {
                               ?> 

                                  <tr>
                                     <td><?php echo $sn; ?></td>
                                     <td><?php echo $row['user_fullname']; ?></td>
                                     <td><?php echo $row['roll_no']; ?></td>
                                     <td><?php echo $row['user_cnic']; ?></td> 
                                     <td><?= $prj_name; ?></td>                                    
                                     <td><?php if($row['status']=='P'){echo 'Present';}else{echo 'Absent';}  ?></td>
                                     <td><?php echo date('d M Y H:i a',strtotime($row['test_date_time'])); ?></td>
                                  </tr>

                               <?php  
                                      $sn++;  
                                  }
                               ?>

                                
                              </tbody>
                              </table>
                          <!--       <div class="form-group"><br>
                                  <div class="form-group col-md-12">
                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                  </div>
                                </div> -->
                       </form>


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
