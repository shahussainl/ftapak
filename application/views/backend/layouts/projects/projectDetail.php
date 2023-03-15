<?php
  // echo "<pre>";
  // print_r($appliedLists);
  // die();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Project Details
      </h1>
      <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                
    <!--               <h4 class="text-center" style="color: #337ab7;font-size: 17px;
    font-weight: 600;">Organization Info</h4> -->
            <!--   <h1 class="profile-username text-center"><b><?php //if(!empty($prjLists->prj_name)){ echo $prjLists->prj_name; } ?></b></h1> -->
            <span class="text-muted text-left">
           
              <img src="<?php echo base_url('uploads/'.$prjLists->org_logo); ?>" class="profile-user-img img-responsive img-circle" style="width:70px; height: 70px;">
            </span>
              <p class="text-muted text-center" style="color: #337ab7;font-size: 17px;
    font-weight: 600;"> <b></b> <?php if(!empty($prjLists->org_name)){ echo $prjLists->org_name; } ?></p>

                 
              <ul class="list-group list-group-unbordered">
                 
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php if(!empty($prjLists->org_email)){ echo $prjLists->org_email; } ?></a>
                </li>
                <li class="list-group-item">
                  <b>Contact</b> <a class="pull-right"><?php if(!empty($prjLists->org_contact)){ echo $prjLists->org_contact; } ?></a>
                </li>
                <li class="list-group-item">
                  <b>Type</b> <a class="pull-right"><?php if(!empty($prjLists->org_type=='semi_goverment')){ echo 'Semi Government';}else{ echo $prjLists->org_type; } ?></a>
                </li>
                <li class="list-group-item">
                  <b>Project Marks</b> <a class="pull-right"><?php if(!empty($prjLists->prj_total_marks)){ echo $prjLists->prj_total_marks; } ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Start Date</b> <a class="pull-right"><?php if(!empty($prjLists->prj_start_date)){ echo date('d M Y',strtotime($prjLists->prj_start_date)); } ?></a>
                </li>
                 <li class="list-group-item">
                  <b>End Date</b> <a class="pull-right text-danger"><?php if(!empty($prjLists->prj_end_date)){ echo date('d M Y',strtotime($prjLists->prj_end_date)); } ?></a>
                </li>
                <li class="list-group-item">
                <b>Applicants Applied</b> <a class="pull-right "><?php if(!empty($appliedLists)){ echo $appliedLists; }else{ echo '<b class="text-danger">Not yet Applied</b>'; } ?></a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#"><b>Project Info</b></a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
<ul class="list-group list-group-unbordered">
  <li class="list-group-item">
 <b style="color: black">Position</b> <a class="pull-center" style="margin-left: 20px;"><?php if(!empty($prjLists->prj_name)){ echo $prjLists->prj_name; } ?></a>
  </li>
   <li class="list-group-item">
 <b style="color: black">Duration</b> <a class="pull-center" style="margin-left: 20px;"><?= date('d M Y',strtotime($prjLists->prj_start_date)).' - '. date('d M Y',strtotime($prjLists->prj_end_date)); ?></a>
  </li>
</ul>
                   <!-- <h3 class="text-info"></h3> -->
                  <h5 style="color: black"><b>Description</b></h5>
                  <p style="color: #3c8dbc">
                    <?php if(!empty($prjLists->prj_desc)){ echo $prjLists->prj_desc; } ?>
                  </p>
                  <br>
                  <hr style="border-top: 1px solid #ddd !important;">
                  <br>
                  <ul class="list-inline">
                    <!-- <li>
                <a href="<?// base_url('MainContent/assignToApplicatView/'.$prjLists->prj_id); ?>">
                  <button type="button" class="btn sm btn-info"><i class="fa fa-plus"></i> 
                  Add Applicant
                  </button>
                </a>
              </li> -->
              <li>
                <a href="<?= base_url('MainContent/AddprjApplicantsList/'.$prjLists->prj_id); ?>">
                  <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                  Add/Update Applicants
                  </button>
                </a>
              </li>
               <li>
                <a href="<?= base_url('MainContent/prjApplicantsList/'.$prjLists->prj_id); ?>">
                  <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                  Applicant List
                  </button>
                </a>
              </li>

                <?php
                   // $res = $this->API_m->singleRecord('rollno',['prj_id'=>$prjLists->prj_id]);

                   // if(empty($res))
                   // {
                ?>
                <li>
                  <a onclick="return confirm('Are you sure Generate Rollno list?');" href="<?= base_url('MainContent/GenerateRollNo/'.$prjLists->prj_id); ?>">
                    <button type="button" class="btn sm btn-warning"><i class="fa fa-print"></i> 
                    Generate Rollno
                    </button>
                  </a>
                </li>
                <?php
                   // }
                   // else
                   // {
                ?>
                <li>
                  <a href="<?= base_url('MainContent/prjRollnoView/'.$prjLists->prj_id); ?>">
                    <button type="button" class="btn sm btn-success"><i class="fa fa-list"></i> 
                      Rollno List
                    </button>
                  </a>
               </li>
                <?php
                   // }
                ?>
                                    <?php 
                       // $rs = $this->API_m->singleRecord('attendence',['prj_id'=>$prjLists->prj_id]);
                       // if(empty($rs))
                       // {
                    ?>
                     <li>
                  <a href="<?= base_url('MainContent/attendenceView/'.$prjLists->prj_id); ?>">
                    <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                    Attendence
                    </button>
                  </a>
                </li>
                   
                    <?php
                       // }else{
                    ?>
                     <!-- <li>
                        <a href="<?// base_url('MainContent/attendenceListView/'.$prjLists->prj_id); ?>">
                      <button type="button" class="btn sm btn-info"><i class="fa fa-plus"></i> 
                         Attendence View
                      </button>
                    </a>
                </li> -->
                    <?php
                       // }
                    ?>
               
              <?php
                  // $res = $this->API_m->singleRecord('result',['prj_id'=>$prjLists->prj_id]);

                  // if(empty($res))
                  // {
              ?>
              <li>
                <a href="<?= base_url('MainContent/assignResultView/'.$prjLists->prj_id); ?>">
                  <button type="button" class="btn sm btn-secondary"><i class="fa fa-plus"></i> 
                   Generate Result
                  </button>
                </a>
              </li>
              <?php
               // }
               // else
               // {
              ?>
              <li>
                <a href="<?= base_url('MainContent/getPrjAppResults/'.$prjLists->prj_id); ?>">
                  <button type="button" class="btn sm btn-primary"><i class="fa fa-list"></i> 
                  Result List
                  </button>
                </a>
              </li>
              <?php
               // }
              ?>
              
          </ul>

                  <!-- <input class="form-control input-sm" type="text" placeholder="Type a comment"> -->
                </div>
                <!-- /.post -->
                <!-- post 2 -->
                <div class="post">
                  <h3 class="text-info">Project Attachments</h3><br>
                  <div class="row">
                    <?php 
                        if(!empty($prj_img))
                        {
                          foreach($prj_img as $img)
                          {
                            $i = explode('.', $img->prj_file);
                            // print_r($i);
                            if($i[1]=='pdf')
                            {
                    ?>
                            <div class="col-sm-3" data-toggle="tooltip" title="download attachment">
                                 <a href="<?= base_url('/uploads/'.$img->prj_file);?>"  target="_blank">
                                  <img src="<?= base_url('/uploads/icon/pdf-icon.jpg');?>" style="width: 220px; height: 150px;">
                                <p class="image-text bg-primary text-center"><?php echo $img->img_title;?></p>
                                </a>
                            </div>
                          <!-- /.col -->
                    <?php
                            }else
                            {
                    ?>
                     <div class="col-sm-3"  data-toggle="tooltip" title="download attachment">
                              <a href="<?= base_url('/uploads/'.$img->prj_file);?>" target="_blank">
                               <img src="<?= base_url('/uploads/'.$img->prj_file);?>" style="width: 220px; height: 150px;">
                               <p class="image-text bg-primary text-center"><?php echo $img->img_title;?></p>
                               </a>
                          </div>
                    <?php
                            }
                          }
                        }
                    ?>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.post2 -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 