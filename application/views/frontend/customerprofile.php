<?php
  // echo "<pre>";
  // print_r($prjHis);
  // exit();


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php 
                if(!empty($udata->user_img))
                { 
              ?>
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url('/uploads/'.$udata->user_img); ?>" alt="User profile picture">
              <?php //print_r($udata->user_img)?>
              <?php
                }
                else
                {
              ?>
              <?php // print_r($udata->user_img)?>
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url('uploads/user-icon.png'); ?>" alt="User profile picture">
              <?php
                }
             ?>

              <h3 class="profile-username text-center"><?php if(!empty($udata->user_fullname)){ echo $udata->user_fullname;} ?></h3>

              <p class="text-muted text-center"><?php if($udata->role_id==1){ echo 'Admin';}elseif($udata->role_id==2){echo'Staff';}elseif($udata->role_id==3){echo'Applicant';}elseif($udata->role_id==4){echo'Organization Member';} ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Father Name</b> <a class="pull-right"><?php if(!empty($udata->user_father_name)){ echo $udata->user_father_name;} ?></a>
                </li>
                <li class="list-group-item">
                  <b>CNIC</b> <a class="pull-right"><?php if(!empty($udata->user_cnic)){ echo $udata->user_cnic;} ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php if(!empty($udata->user_email)){ echo $udata->user_email;} ?></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> <a class="pull-right"><?php if(!empty($udata->user_contact)){ echo $udata->user_contact;} ?></a>
                </li>
                 <li class="list-group-item">
                  <b>Applied Jobs</b> <a class="pull-right">
                    <?php 
                      if(!empty($udata->user_id))
                      { 
                        $Jobs =  $this->db->where('user_id',$udata->user_id)->count_all_results('applicants');
                        echo $Jobs;
                      } 
                    ?></a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Other Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php if(!empty($udata->user_address)){ echo $udata->user_address;} ?></p>

              <hr>

             <!--  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> 

              <hr>-->

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
                <li><a href="#education" data-toggle="tab">Education</a></li>
                <li><a href="#experience" data-toggle="tab">Experience</a></li>
                <li><a href="#courses" data-toggle="tab">Courses/Skill</a></li>
                <li ><a href="#activity" data-toggle="tab">Positions Applied</a></li>
            </ul>
            <div class="tab-content">
                <!-- position applied -->
              <div class=" tab-pane" id="activity">
                <?php
                  if(!empty($prjHis))
                  {
                    foreach($prjHis as $his)
                    {

                ?>
                <!-- Post -->
                <div class="post">
                  <div class="user-block" >
                    <!-- <img class="img-circle img-bordered-sm" src="" alt="user image"> -->
                        <span class="username" style="margin-left:0px !important;">
                          <a href="#"><?= $his->prj_name;?>.</a>
                          <a href="#" class="pull-right btn-box-tool"></a>
                        </span>
                    <span class="description" style="margin-left:0px !important;">Applied Date: - <?= date('d M Y',strtotime($his->app_received_date)); ?></span>
                    <span class="description" style="margin-left:0px !important;">Organization: - <?= $his->org_name; ?></span>
                  </div>
                </div>
                <!-- /.post -->
                <?php
                    }
                  }
                ?>
              </div>
              <!-- tab pane personal -->
              <div class="tab-pane active" id="personal">
                <form class="form-horizontal">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="inputName" class=" control-label">Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-5">
                        <div class="form-group">
                            <label for="inputEmail" class=" control-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                  </div>
                  <div class="col-sm-12">
                        <div class="form-group">
                          <label for="inputExperience" class="control-label">Address</label>
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                       </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- tab-pane education -->
              <div class="tab-pane" id="education">
                  <h1>education</h1>
              </div>
               <!-- tab-pane experience -->
               <div class="tab-pane" id="experience">
                  <h1>experience</h1>
              </div>
              <!-- tab-pane courses -->
              <div class="tab-pane" id="courses">
                  <h1>courses</h1>
              </div>
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
