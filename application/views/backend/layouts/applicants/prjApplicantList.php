<?php 
$pr_id = $this->uri->segment(3);
// echo "<pre>";
// print_r($appList);
// exit();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Applicants list -->
        <!-- <small>Version 2.0</small> -->
      </h1>
     <ol class="breadcrumb">
        <!-- <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
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
              <?php
                  $res = $this->API_m->singleRecord('projects',['prj_id'=>$this->uri->segment(3)]);
              ?>
              <h3 class="box-title">Applicants list of <b> <?= $res->prj_name; ?> </b> </h3>

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
                          if(!empty($appList))
                          {
                        ?>
                                <table class="table data-tbl" id="tbl-prj">
                                   <thead>
                                     <tr>
                                       <th>  
                                        <input type="checkbox" class="chAll" /> ASSIGN ALL
                                      </th>
                                       <th scope="col">#</th>
                                       <th scope="col">APPLICANT</th>
                                       <th scope="col">CNIC</th>
                                       <th scope="col">CONTACT</th>
                                       <th scope="col">A R DATE</th>
                                       <th scope="col">TEST CENTER</th>
                                       <th scope="col">TEST DATE</th>
                                       <th scope="col">MARKS</th>
                                       <th scope="col">VIEW</th>
                                      
                                    </tr>
                                   </thead>
                                   <tbody>

                                    <?php
                                    
                                        $sno=1;
                                       foreach ($appList as $key => $row) 
                                       {
                                     ?>
                                     <tr>
                                      <td>
                                          <label>
                                              <input type="checkbox" onclick="checkId()"  class="minimal myCustomCheckBox ch_ID" name="app_id" value="<?php echo $row->app_id; ?>">
                                          </label>
                                      </td>
                                       <!-- <td>
                                         <input type="checkbox" class="add_checkbox" value="<?php echo $row->app_id; ?>" />
                                       </td> -->
                                       <th scope="row"><?php echo $sno; ?></th>
                                       <td><?php echo $row->user_fullname;   ?></td>
                                       <td><?php echo $row->user_cnic;        ?></td>
                                       <td><?php echo $row->user_contact;    ?></td>
                                       <td><?php echo date('d M Y',strtotime($row->app_received_date)); ?></td>
                                       <td>
                                         <?php
                                               if(!empty($row->name))
                                                { 
                                                ?>  
                                                  <a href="" center_name="<?php echo $row->name;?>" address="<?php echo $row->address;?>" contact="<?php echo $row->contact;?>" person_contact="<?php echo $row->person_contact;?>" data-toggle="modal" data-target="#myModalShowData" class="btn_edit"><?php echo $row->name;?></a>
                                                
                                                 <?php  
                                                 }
                                               else
                                                { echo 'Not assign';}
                                          ?>
                                       </td>
                                       <td><?php echo date('d M Y h:i a',strtotime($row->test_date_time)); ?></td>
                                       <td><?php echo $row->prj_total_marks;  ?></td>
                                       <td>
                                         <a href="<?= base_url('MainContent/applicantProfile_View/'.$row->user_id); ?>"><i class="fa fa-eye"></i></a>
                                       </td>
                                     </tr>
                                     <?php   
                                          $sno++;
                                       }
                                     ?>

 
                                   </tbody>
                                </table>
                                      
                                          <a href="javascript:void(0);" class="btn btn-sm btn-success mdBtn"  data-toggle="modal" >Bulk Option</a>
                                     <?php
                                      }
                                      else
                                      {
                                    ?>
                              <div class="form-group">
                          <h3>Please, First Add Applicants from Project Section</h3>
                        <br>
                        <div class="form-group col-md-12">
                          <label> </label><br>
                            <a href="<?= base_url('MainContent/projectList_View/'); ?>">
                            <button type="button" class="btn btn-lg btn-info"><i class="fa fa-arrow-right"></i> 
                            Project Section
                            </button>
                            </a>
                        </div>
                      </div>
                                    <?php
                                      }
                                    ?>
                  </div>    
              </div>
              <!-- /.row --><br>
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
                  <a onclick="return confirm('Are you sure Generate Rollno list?');" href="<?= base_url('MainContent/GenerateRollNo/'.$pr_id); ?>">
                    <button type="button" class="btn sm btn-warning"><i class="fa fa-print"></i> 
                    Generate Rollno
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



<!------------------------- Start Insertion Model ----------------------------->

<div class="container">
  <h2>Large Modal</h2>

  <div class="modal fade" id="myModalInsert" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Test Center/Date</h4>
        </div>
        <div class="modal-body">
          


             <form method="post" action="<?= base_url('MainContent/checkedApplicant') ?>" enctype="multipart/form-data">

                      <!-- <input type="hidden" class="pApp_id" name="app_id[]" value=""> -->
                      <input type="hidden" name="prj_id" value="<?= $this->uri->segment(3); ?>">
                         <div class="box-body">
                              <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                  <label>Test Center</label><br>
                                   <select name="center_id" class="form-control  select2" style="width:320px;">
                                      <option value="">-select Test Center-</option>
                                      <?php
                                         foreach ($textCenter as $key => $row) 
                                         {
                                      ?>
                                           <option value="<?php echo $row->center_id; ?>"><?php echo $row->name; ?></option>
                                      <?php      
                                          } 
                                      ?>
                                     </select>
                                   
                                  </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                     <label>Test Date/Time</label>
      <div class="input-group date">
        <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right  tstDate" name="test_date" onclick="edDate()" >
        <input type="hidden" value="<?php if(!empty($res->prj_end_date)){ echo date('m/d/Y',strtotime($res->prj_end_date)); } ?>" class="eDate">
        
      </div><br>
      <div class="input-group">
         <div class="input-group-addon">
      <i class="fa fa-clock-o"></i>
      </div>
      <input type="text" class="form-control timepicker"  name="test_time">
      </div>
    
                                    </div>
                                </div>
                              

                              </div>
                                <div class="AppModal">
                                  
                                </div>
                         </div>


        </div>
        <div class="modal-footer">
<div class="col-md-12">
<div class="box-footer">
<button type="submit" class="btn btn-danger btn-md"><i class="fa fa-plus"></i> Save</button>
</div>
</div>
              </form>            

          
        </div>
      </div>
    </div>
  </div>
</div>

<!------------------------- End Insertion Model ----------------------------->



<!------------------------- Start Insertion Model ----------------------------->

<div class="container">
  <h2>Large Modal</h2>

  <div class="modal fade" id="myModalShowData" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Test Center Detail</h4>
        </div>
        <div class="modal-body">

               <table class="table">
                                   <thead>
                                     <tr>
                                      
                                       <th scope="col">Center Name</th>
                                       <th scope="col">Address</th>
                                       <th scope="col">Contact</th>
                                       <th scope="col">Focal Person</th>
                                    
                                     </tr>
                                   </thead>
                                   <tbody>
                                      <tr class="testData">
                                          
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                       </tr>
                                     </tbody>
                                    </table>     
          
              

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!------------------------- End Insertion Model ----------------------------->






