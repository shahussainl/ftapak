<?php 
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
      <!--   <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
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
              <!-- <h3 class="box-title">Applicants list</h3> -->

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
                                      <th scope="col">
                                        <input type="checkbox" name="" class="delAll">
                                       </th>
                                       <th scope="col">#</th>
                                       <th scope="col">APPLICANT</th>
                                       <th scope="col">PROJECT NAME</th>
                                       <th scope="col">CNIC</th>
                                       <th scope="col">CONTACT</th>
                                       <th scope="col">A R DATE</th>
                                       <th scope="col">TEST DATE</th>
                                       <th scope="col">MARKS</th>
                                       <th scope="col">ACTION</th>
                                     
                                     </tr>
                                   </thead>
                                   <tbody>

                                    <?php
                                    
                                        $sno=1;
                                       foreach ($appList as $key => $row) 
                                       {
                                     ?>
                                     <tr>
                                      <td><input type="checkbox" class="delete_checkbox" value="<?php echo $row->app_id; ?>" /></td>
                                       <th scope="row"><?php echo $sno;      ?></th>
                                       <td><?php echo $row->user_fullname;   ?></td>
                                       <td><?php echo $row->prj_name;        ?></td>
                                       <td><?php echo $row->user_cnic;        ?></td>
                                       <td><?php echo $row->user_contact;    ?></td>
                                       <td><?php echo date('d M Y',strtotime($row->app_received_date)); ?></td>
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
                                 <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="applicants" data-field="app_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>

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
              <!-- /.row -->
              
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










