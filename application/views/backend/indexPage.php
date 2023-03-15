<?php
 $prj        = $this->db->count_all_results('projects');
 $applcnts   = $this->db->count_all_results('applicants');
 $tstcentr   = $this->db->count_all_results('test_center');
 $prjDone    = $this->db->select('*')->from('result as res')->join('projects as pro','res.prj_id=pro.prj_id')->count_all_results();


 // $getPrj = $this->Project_m->getCurrentMonthPrj(); 
 //  $getApplicants = $this->Project_m->getCurrentMonthApplicants(); 

// echo "<pre>";
//   print_r($getPrj);
// echo "<pre>";
//   print_r($getApplicants);
//    exit();
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
       <!--  <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
       <!--  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="icon ion-ios-list-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Projects</span>
              <span class="info-box-number"><?= $prj; ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="icon ion-ios-people"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Applicants</span>
              <span class="info-box-number"><?= $applcnts; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="icon ion-ios-home-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Test Centers </span>
              <span class="info-box-number"><?= $tstcentr; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="icon ion-ios-list"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending Projects</span>
              <span class="info-box-number"><?php  $pending = $prj - $prjDone; echo $pending.'/'.$prj; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>

             <!--  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <p class="text-center">
                    <strong>Projects/Applicants Report : 1 Jan, 2019 - 30 Dec, 2019</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              <!--   <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                 /.progress-group -->
                    <!--<div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                 /.progress-group -->
                   <!-- <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  /.progress-group -->
                   <!--<div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  /.progress-group -->
                <!-- </div> -->
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>

            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> -->
                    <!-- <h5 class="description-header">$35,210.43</h5> -->
                    <!-- <span class="description-text">TOTAL REVENUE</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <!-- <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span> -->
                    <!-- <h5 class="description-header">$10,390.90</h5> -->
                    <!-- <span class="description-text">TOTAL COST</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span> -->
                    <!-- <h5 class="description-header">$24,813.53</h5> -->
                    <!-- <span class="description-text">TOTAL PROFIT</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <!-- <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span> -->
                    <!-- <h5 class="description-header">1200</h5> -->
                    <!-- <span class="description-text">GOAL COMPLETIONS</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
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


