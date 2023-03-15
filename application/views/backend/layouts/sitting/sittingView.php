




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  Add Setting Info  -->
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
       <!--  <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
       <!--   <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
         <br><br> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
   <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">Settings Info</h3> -->

              <div class="box-tools pull-right">
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                     


                  <form method="post" action="<?php echo base_url('Cms_ci/addSitting');?>" enctype="multipart/form-data">
                         <div class="box-body">

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Company Name</label>
                                   <input type="text" name="name" class="form-control" autocomplete="off" value="<?php echo $updateData['company_name']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Eamil</label>
                                    <input type="text" name="email" class="form-control" autocomplete="off" value="<?php echo $updateData['company_email']; ?>">
                                </div>
                              </div>   
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Address</label>
                                   <input type="text" name="address" class="form-control" autocomplete="off" value="<?php echo $updateData['company_address']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Contact</label>
                                    <input type="text" name="contact" class="form-control" autocomplete="off" value="<?php echo $updateData['company_contact']; ?>">
                                </div>
                              </div>
                              <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label>Linkedin Link</label>
                                      <input type="text" name="linkedin_link" class="form-control" autocomplete="off" value="<?php echo $updateData['linkedin_link']; ?>">
                                  </div>  
                                  <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Facebook Link</label>
                                    <input type="text" name="fb_link" class="form-control " autocomplete="off" value="<?php echo $updateData['fb_link']; ?>">
                                  </div>
                              </div>  
                              <div class="form-row">
                              
                                  <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Google Link</label>
                                    <input type="text" name="google_link" class="form-control"  autocomplete="off" value="<?php echo $updateData['google_link']; ?>">
                                  </div>
                                     <div class="form-group col-md-6">
                                       <label>Twitter Link</label>
                                      <input type="text" name="twitter_link" class="form-control " autocomplete="off" value="<?php echo $updateData['twitter_link']; ?>">
                                  </div>
                              </div> 
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                       <label>Pinterest Link</label>
                                      <input type="text" name="pin_link" class="form-control " autocomplete="off" value="<?php echo $updateData['pinterest_link']; ?>">
                                  </div> 
                                  <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Instagaram Link</label>
                                    <input type="text" name="instagaram_link" class="form-control"  autocomplete="off" value="<?php echo $updateData['instagram_link']; ?>">
                                  </div>
                              </div>
                              
                              <div class="form-row">
                                 <div class="form-group col-md-6"> 
                                  <label>Embed Code (iframe map)</label>
                                   <textarea class="form-control" name="map_embedCode" cols="50" rows="8"><?php if(!empty($updateData['map_embed_code']))
                                      { echo $updateData['map_embed_code'];}?></textarea>    
                                 </div>
                                
                                  <?php
                                    if(empty($updateData['company_logo']))
                                    {
                                  ?>
                                         
                                    <div class="form-group col-md-6">
                                       <label>Company Logo</label>
                                       <input type="file"  name="photo" id="my_image_name"  class="form-control"/>
                                    </div>

                                  <?php 
                                    }
                                    else
                                    {
                                   ?>
                                     
                                      <div class="form-group col-md-6">
                                        <img src="<?php echo base_url('uploads/'.$updateData['company_logo']);?>" style="height: 100px; width: 150px;"><br>
                                        <a href="<?php echo base_url('Cms_ci/deleteSittingImg/'.$updateData['company_id']);?>" class="btn btn-danger btn-sm fo" style="margin-top: 10px;">trash</a>
                                      </div>

                                   <?php     
                                    }
                                  ?>   
                              </div>
                                 
                          
            
                                <div class="form-group col-md-12">
                                  <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
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







