

<?php

  $user_id =$this->session->userdata('user')['user_id'];

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile 
        <small></small>
      </h1>
     <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <td><a href="" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#myModalInsert">Back</a></td>


      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Change User Profile</h3>

              <div class="box-tools pull-right">
            
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="row">
                 <div class="col-md-6">      
                   <form method="post" action="<?php echo base_url('MainContent/updateUserInfo/'.$user_id);?>" enctype="multipart/form-data">
                         <div class="box-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">User Name</label>
                                   <input type="text" name="name" class="form-control" autocomplete="off" required="required" value="<?php echo $userInfo['user_fullname'];?>">
                                   <input type="hidden" name="idd" value="<?php echo $userInfo['user_id'];?>">
                                </div>  
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Email</label>
                                   <input type="email" name="email" class="form-control" autocomplete="off" required="required" value="<?php echo $userInfo['user_email'];?>">
                                </div> 
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Address</label>
                                   <input type="text" name="address" class="form-control" autocomplete="off" required="required" value="<?php echo $userInfo['user_address'];?>">
                                </div>  
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Contact</label>
                                   <input type="text" name="contact" class="form-control" autocomplete="off" required="required" value="<?php echo $userInfo['user_contact'];?>">
                                </div> 
                              </div>
                               <div class="form-row">
                                <div class="form-group col-md-6">     
                                </div>
                                
                                  <?php
                                    if(empty($userInfo['user_img']))
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
                                        <img src="<?php echo base_url('uploads/'.$userInfo['user_img']);?>" style="height: 100px; width: 150px;"><br>
                                        <a href="<?php echo base_url('MainContent/deleteUserInfoImg/'.$userInfo['user_id']);?>" class="btn btn-danger btn-sm fo" style="margin-top: 10px;">trash</a>
                                      </div>

                                   <?php     
                                    }
                                  ?>   
                              </div>
                          </div>         
                          <div class="form-group col-md-12">
                               <div class="box-footer">
                                 <button type="submit" name="submit" class="btn btn-primary updatePasswordBTN" id="submit">Change info</button>
                               </div>
                          </div>
                                 
                     </form>


                  </div> 
                    <div class="col-md-6">      
                      <form method="post" action="<?php echo base_url('MainContent/updateUserPassword');?>" enctype="multipart/form-data">
                         <div class="box-body">

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1"  class="oldPasswordLabel">Old Password</label>
                                   <input type="password" name="oldPassword" class="form-control oldPassword" autocomplete="off" required="required">
                                </div>  
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">New password</label>
                                   <input type="password" name="newPassword" class="form-control newPassword" autocomplete="off" required="required">
                                </div> 
                              </div>
                          </div>         
                          <div class="form-group col-md-12">
                               <div class="box-footer">
                                 <button type="submit" name="submit" class="btn btn-primary updatePasswordBTN" id="submit">Change Password</button>
                               </div>
                          </div>
                                 
                     </form>           
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







