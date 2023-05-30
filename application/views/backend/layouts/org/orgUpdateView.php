


<style type="text/css">
  .image-text {
    width: 100%;height: 30px;background-color: #999; color: #fff; font-size: 16px;text-indent: 10px;line-height: 30px;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <!--  Update Organization -->
        <!-- <small>Version 2.0</small> -->
      </h1>
     <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"><br><br>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                     <!-- <h1>Main Body</h1> -->
            

                        <form action="<?php echo base_url('cms_ci/updateOrgData'); ?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="old_image" value="<?= $updateData['org_logo']  ?>">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4"> Name</label>
                                  <input type="text" name="org_name" class="form-control" value="<?php echo $updateData['org_name'] ?>" required="required">
                                   <input type="hidden" name="org_idd" class="form-control" value="<?php echo $updateData['org_id'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Email</label>
                                  <input type="email" name="email" class="form-control" value="<?php echo $updateData['org_email'] ?>" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Fax</label>
                                  <input type="text" name="fax" class="form-control" value="<?php echo $updateData['org_fax'] ?>"  >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Contact</label>
                                  <input type="text" name="contact" class="form-control" value="<?php echo $updateData['org_contact'] ?>" required >
                                </div>
                                <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">Start Date</label>
                                   <input type="text" name="startdate" class="form-control datepicker strtDate" value="<?php echo date('m/d/Y',strtotime($updateData['startdate'])); ?>" required  onchange="strtDate(this)">
                                 </div>
                                <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">End Date</label>
                                   <input type="text" name="expirydate" class="form-control endDate" value="<?php echo date('m/d/Y',strtotime($updateData['expirydate'])); ?>" required>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4"> Type</label>
                                    <select name="org_type" class="form-control" required="required">
                                        <option value="">--select--</option>
                                          <option value="Goverment" <?php if($updateData['org_type']=='Goverment'){ echo 'selected'; }  ?> > Goverment</option> 
                                        <option value="Private" <?php if($updateData['org_type']=='Private'){ echo 'selected'; }  ?> >Private</option>
                                        <option value="Semi_goverment" <?php if($updateData['org_type']=='Semi_goverment'){ echo 'selected'; }  ?> >Semi Government</option>
                                        <option value="Other"  <?php if($updateData['org_type']=='Other'){ echo 'selected'; }  ?>  >Other</option>
                                       
                                    </select>
                                </div>
                                  <div class="form-group col-md-6">
                                  <label for="inputEmail4">Address</label>
                                  <input type="text" name="address" class="form-control" value="<?php echo $updateData['org_address']; ?>" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">City</label>
                                  <input type="text" name="city" class="form-control" id="inputEmail4" autocomplete="off" required="required" value="<?php echo $updateData['city'];?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">State</label>
                                  <input type="text" name="state" class="form-control" id="inputPassword4" autocomplete="off" required value="<?php echo $updateData['state'];?>">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Country</label>
                                  <input type="text" name="contry" class="form-control" id="inputEmail4" autocomplete="off" required="required" value="<?php echo $updateData['country'];?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">PostCode</label>
                                  <input type="text" name="postCode" class="form-control" id="inputPassword4" autocomplete="off" required value="<?php echo $updateData['postcode'];?>">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Description</label>
                                  <!--  <input type="text" name="desc" class="form-control"  placeholder="description" value="<?php //echo $updateData['prj_desc']; ?>" required="required"> -->
                                   <textarea name="editor1" class="form-control" rows="5" value="" required="required"><?php echo $updateData['org_desc']; ?></textarea>
                                </div>
                              </div>   
                               
                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    
                                     <label>Upload Advertisenment and Application with Title</label>

                                        <input type="file" multiple="multiple" name="image_name[]" id="my_image_name"  class="form-control" />
                                 </div>
                              </div>   
                              <div class="row"> 
                                        <div class="form-group col-md-12">
                                              <?php 
                                                    foreach ($imagedata as $key => $row) 
                                                    {
                                                      $i = explode('.', $row['orgp_file']);
                                                      // print_r($i);
                                                      if($i[1]=='pdf')
                                                      {
                                                  ?>
                                              <div class="col-md-3">
                                                <a href="<?= base_url('/uploads/'.$row['orgp_file']);?>"  target="_blank">
                                                      <img  src="<?= base_url('/uploads/icon/pdf-icon.jpg');?>" style="height: 200px;width: 100%;" id="imgIdd">
                                                      <p class="image-text"><?php echo $row['img_title'];?></p>
                                                </a>  
                                                      <a href="<?php echo base_url('Cms_ci/singleImgaeDalet/'.$row['img_id']);?>" class="btn btn-sm btn-danger deleteImg">trash</a></p>
                                              </div>
                                              <?php 
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <div class="col-md-3">
                                                      <a href="<?php echo base_url('./uploads/'.$row['orgp_file']);?>" target="_blank">
                                                        <img  src="<?php echo base_url('./uploads/'.$row['orgp_file']);?>" style="height: 200px;width: 100%;" id="imgIdd">
                                                        <p class="image-text"><?php echo $row['img_title'];?></p>
                                                      </a>
                                                      <a href="<?php echo base_url('Cms_ci/singleImgaeDalet/'.$row['img_id']);?>" class="btn btn-sm btn-danger deleteImg">trash</a></p>
                                              </div>
                                                <?php
                                                    }    
                                                    }
                                                  ?> 
                                            </div>

                                            <div class="row">
                                              <span id="preview-area"></span>
                                            </div>
                                      </div>

                                  <div class="form-group col-md-6">
                                       
                                    </div>
                                 <?php
                                    if(empty($updateData['org_logo']))
                                    {
                                  ?>
                                         
                                    <div class="form-group col-md-6">
                                        <label>Org Logo</label>
                                        <input type="file"  name="photo" id="my_image_name"  class="form-control" />
                                    </div>

                                  <?php 
                                    }
                                    else
                                    {
                                   ?>
                                     
                                      <div class="form-group col-md-6">
                                        <img src="<?php echo base_url('uploads/'.$updateData['org_logo']);?>" style="height: 100px; width: 150px;"><br>
                                        <a href="<?php echo base_url('Cms_ci/deleteOrgImg/'.$updateData['org_id']);?>" class="btn btn-danger btn-sm fo" style="margin-top: 10px;">trash</a>
                                      </div>

                                   <?php     
                                    }
                                  ?> 
  
  
   
                                <div class="form-group">
                                  <div class="form-group col-md-12">
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


<script type="text/javascript">
  var inputLocalFont = document.getElementById("my_image_name");
  inputLocalFont.addEventListener("change", previewImages, false); //bind the function to the input
  function previewImages() 
  {
      var fileList = this.files;
      var anyWindow = window.URL || window.webkitURL;
      for (var i = 0; i < fileList.length; i++) {
          //get a blob to play with
          var objectUrl = anyWindow.createObjectURL(fileList[i]);
          $('#preview-area').append('<div class="col-md-3"><img class="card-img-top" src="' + objectUrl + '" style="height:200px;  width:100%;" /><br><input type="text" name="img_title[]" placeholder="    enter Title" style="height:30px;  width:100%;"></div>');
          // get rid of the blob
          window.URL.revokeObjectURL(fileList[i]);
      }
  }
</script>









