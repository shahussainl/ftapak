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
        <div class="col-sm-12">
                <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
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
                <li class="<?php if($_SESSION['activetab']=='updateUserInfo'){echo 'active'; } ?>"><a href="#personal" data-toggle="tab">Personal</a></li>
                <li class="<?php if($_SESSION['activetab']=='updateEducation'){echo 'active'; } ?>"><a href="#education" data-toggle="tab">Education</a></li>
                <li class="<?php if($_SESSION['activetab']=='updateExperience'){echo 'active'; } ?>"><a href="#experience" data-toggle="tab">Experience</a></li>
                <!-- <li><a href="#courses" data-toggle="tab">Courses/Skill</a></li> -->
                <li ><a href="#activity" data-toggle="tab">Positions Applied</a></li>
                <li ><a href="#activejobs" data-toggle="tab">Active Jobs</a></li>
            
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
              <div class="tab-pane <?php if($_SESSION['activetab']=='updateUserInfo'){echo 'active'; } ?>" id="personal">
              <div class="row">
                 <div class="col-md-6">      
                   <form method="post" action="<?php echo base_url('Customer/updateUserInfo');?>" enctype="multipart/form-data">
                         <div class="box-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">User Name</label>
                                   <input type="text" name="name" class="form-control" autocomplete="off" required="required" value="<?php echo $udata->user_fullname;?>">
                                   <input type="hidden" name="idd" value="<?php echo $udata->user_id;?>">
                                </div>  
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Email</label>
                                   <input type="email" name="email" class="form-control" autocomplete="off" required="required" value="<?php echo $udata->user_email;?>">
                                </div> 
                              </div>
                              <div class="form-row">
                               
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Father Name</label>
                                   <input type="text" name="user_f_name" class="form-control" autocomplete="off" required="required" value="<?php echo $udata->user_father_name;?>">
                                </div> 
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Contact</label>
                                   <input type="text" name="contact" class="form-control" autocomplete="off" required="required" value="<?php echo $udata->user_contact;?>">
                                </div> 
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Address</label>
                                   <input type="text" name="address" class="form-control" autocomplete="off" required="required" value="<?php echo $udata->user_address;?>">
                                </div> 
                              </div>
                               <div class="form-row">
                                <div class="form-group col-md-6">     
                                </div>
                                
                                  <?php
                                    if(empty($userInfo->user_img))
                                    {
                                  ?>
                                         
                                    <div class="form-group col-md-6">
                                       <label>User Img</label>
                                       <input type="file"  name="photo" id="my_image_name"  class="form-control"/>
                                    </div>

                                  <?php 
                                    }
                                    else
                                    {
                                   ?>
                                     
                                      <div class="form-group col-md-6">
                                        <img src="<?php echo base_url('uploads/'.$udata->user_img);?>" style="height: 100px; width: 150px;"><br>
                                        <a href="<?php echo base_url('Customer/deleteUserInfoImg/'.$udata->user_id);?>" class="btn btn-danger btn-sm fo" style="margin-top: 10px;">trash</a>
                                      </div>

                                   <?php     
                                    }
                                  ?>   
                              </div>
                          </div>         
                          <div class="form-group col-md-12">
                               <div class="box-footer">
                                 <button type="submit" name="submit" class="btn btn-primary updatePasswordBTN" id="submit">Save</button>
                               </div>
                          </div>
                                 
                     </form>


                  </div> 
                    <div class="col-md-6">      
                      <form method="post" action="<?php echo base_url('Customer/updateUserPassword');?>" enctype="multipart/form-data">
                         <div class="box-body">

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1"  class="CustomeroldPasswordLabel">Old Password</label>
                                   <input type="password" name="oldPassword" class="form-control CustomeroldPassword" autocomplete="off" required="required">
                                </div>  
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">New password</label>
                                   <input type="password" name="newPassword" class="form-control CustomernewPassword" autocomplete="off" required="required">
                                </div> 
                              </div>
                          </div>         
                          <div class="form-group col-md-12">
                               <div class="box-footer">
                                 <button type="submit" name="submit" class="btn btn-primary CustomerupdatePasswordBTN" id="submit">Change Password</button>
                               </div>
                          </div>
                                 
                     </form>           
                  </div>   
              </div>
              <!-- /.row -->
              </div>
              <!-- tab-pane education -->
              <div class="tab-pane <?php if($_SESSION['activetab']=='updateEducation'){echo 'active'; } ?>" id="education">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-striped">
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Qualification</th>
                          <th>Subject</th>
                          <th>Obtained</th>
                          <th>Total</th>
                          <th>%</th>
                        </tr>
                       </thead>
                       <tbody>
                         <?php if(!empty($education)){
                           $c = 1;
                              foreach($education as $edu)
                              {
                          ?>
                           <tr>
                            <td><?= $c; ?></td>
                            <td><?= $edu->qualification; ?></td>
                            <td><?= $edu->subject; ?></td>
                            <td><?= $edu->obtained; ?></td>
                            <td><?= $edu->total; ?></td>
                            <td><?= $edu->percentage; ?></td>
                          </tr>
                          <?php
                           $c++;
                              }
                         }
                         ?>
                       
                       </tbody>
                    </table>
                  </div>
                </div>
                <form method="post" action="<?php echo base_url('Customer/updateEducation');?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-row">
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Qualification</label>
                            <select name="qualification" class="form-control ">
                              <option value="">-select-</option>
                              <option value="Matric/SSC/Equivalent">Matric/SSC/Equivalent </option>
                              <option value="fsc/HSSC/Equivalent">Fsc/HSSC/Equivalent </option>
                              <option value="Bsc/Equivalent">Bsc/Equivalent(14 years) </option>
                              <option value="Bachlor/Msc/Equivalent">Bachlor/Msc/Equivalent (16 Years) </option>
                              <option value="Bachlor/Mphl/Equivalent">Master/Mphl/Equivalent (18 Years) </option>
                            </select>
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Subject</label>
                              <input type="text" name="subject" class="form-control " autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Institute/Board</label>
                              <input type="text" name="institute" class="form-control " placeholder="institute" autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Obtained</label>
                              <input type="text" name="obtained" class="form-control " placeholder=" Marks/CGPA" autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Total </label>
                              <input type="text" name="total" class="form-control " placeholder="Marks/CGPA" autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Percentage</label>
                              <input type="text" name="percentage" class="form-control " placeholder="percentage"  autocomplete="off" required="required">
                          </div>  
                        </div>
                    </div>         
                    <div class="form-group col-md-12">
                          <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary CustomerupdatePasswordBTN" id="submit">Add</button>
                          </div>
                    </div>
                            
                </form>    
              </div>
               <!-- tab-pane experience -->
               <div class="tab-pane <?php if($_SESSION['activetab']=='updateExperience'){echo 'active'; } ?>" id="experience">
               <div class="row">
                  <div class="col-md-12">
                    <table class="table table-striped">
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Organization</th>
                          <th>Designation</th>
                          <th>Tenure</th>
                          <th>Duration</th>
                          <th>Remarks</th>
                        </tr>
                       </thead>
                       <tbody>
                         <?php if(!empty($experience)){
                           $c = 1;
                              foreach($experience as $exp)
                              {
                          ?>
                           <tr>
                            <td><?= $c; ?></td>
                            <td><?= $exp->org; ?></td>
                            <td><?= $exp->designation; ?></td>
                            <td><?= date('d/m/y',strtotime($exp->start)).' to '.date('d/m/y',strtotime($exp->end)); ?></td>
                            <td><?= $exp->duration; ?></td>
                            <td><?= $exp->remarks; ?></td>
                          </tr>
                          <?php
                           $c++;
                              }
                         }
                         ?>
                       </tbody>
                    </table>
                  </div>
                </div>
                <form method="post" action="<?php echo base_url('Customer/updateExperience');?>" enctype="multipart/form-data">
                    
                    <div class="box-body">
                        <div class="form-row">
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Organization</label>
                              <input type="text" name="org" class="form-control " placeholder="Organization"  autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Designation</label>
                              <input type="text" name="designation" class="form-control " placeholder="Designation" autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Start</label>
                              <input type="date" name="start" class="form-control "  autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">End</label>
                              <input type="date" name="end" class="form-control "  autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Duration </label>
                              <input type="text" name="duration" class="form-control " placeholder="Duration" autocomplete="off" required="required">
                          </div>  
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Remarks</label>
                              <input type="text" name="remarks" class="form-control " placeholder="Remarks"  autocomplete="off" required="required">
                          </div>  
                        </div>
                    </div>         
                    <div class="form-group col-md-12">
                          <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary CustomerupdatePasswordBTN" id="submit">Add</button>
                          </div>
                    </div>
                </form>   
              </div>
              <!-- tab-pane courses -->
              <div class="tab-pane" id="courses">
                  <h1>courses</h1>
              </div>
              <!-- tab-pane Active Jobs -->
              <div class="tab-pane" id="activejobs">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-striped">
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Post</th>
                          <th>Dept/Org</th>
                          <th>Start</th>
                          <th>Deadline</th>
                          <th>Action</th>
                        </tr>
                       </thead>
                       <tbody>
                         <?php if(!empty($activejobs)){
                           $c = 1;
                              foreach($activejobs as $job)
                              {
                                $prjid = $job['prj_id'];
                                $today    = date('Y-m-d');
                                $deadline = $job['prj_start_date'];
                          ?>
                           <tr>
                            <td><?= $c; ?></td>
                            <td><?= $job['prj_name']; ?></td>
                            <td><?= $job['org_name']; ?></td>
                            <td><?= date('d M y',strtotime($job['prj_start_date'])); ?></td>
                            <td><?= date('d M y',strtotime($job['prj_end_date'])); ?></td>
                            <?php 
                              // if()
                              // {
                              // }
                              if($today<$deadline)
                              {
                            ?>
                            <td><a data-target="#onlineApply" data-toggle="modal"  class="text-primary"><strong>Apply</strong></a></td>
                            <?php
                              }else
                              {
                            ?>
                             <td class="text-danger"><strong>Expired</strong></td>
                            <?php
                              }
                            ?>
                           <td><a href="<?= base_url('Customer/insertUpdateApplicants/'.$prjid) ?>" onclick="return confirm('Are you sure to apply?');"  class="text-primary"><strong>Apply</strong></a></td>
                          </tr>
                            


                          <?php
                           $c++;
                              }
                         }
                         ?>
                       
                       </tbody>
                    </table>
                  </div>
                </div>
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
