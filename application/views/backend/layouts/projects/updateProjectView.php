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
      <!--  Update Projects -->
        <!-- <small>Version 2.0</small> -->
      </h1>
      
      <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success" style="">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
<a href="<?php echo base_url('MainContent/projectList_View');?>" class="btn btn-sm btn-success">Post List</a>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $updateData['prj_name']; ?></h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                     <!-- <h1>Main Body</h1> -->
                    <form method="post" action="<?php echo base_url('MainContent/updateProjectData');?>" enctype="multipart/form-data">
                       <div class="box-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Project Title</label>
                                   <input type="text" name="title" class="form-control" required="required"  value="<?php echo $updateData['prj_name']; ?>">
                                   <input type="hidden" name="u_id" value="<?php echo $updateData['prj_id']; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1" >Project Name</label>
                                   <select name="org_id" class="form-control" >
                                      <?php
                                         foreach ($projectList as $key => $row) 
                                         {

                                          ?>
                                            <option 
                                          <?php
                                             if($row['org_id']==$updateData['org_id'])
                                             {
                                      ?>
                                               selected
                                      <?php  
                                             }

                                      ?>
                                             value="<?php echo $row['org_id'];?>"><?php echo $row['org_name'];?></option> 
                                     
                                      <?php 
                                          } 
                                      ?>
                                         <!-- <option value="1">1</option> -->
                                   </select>
                                </div>
                              </div>

                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">Start Date</label>
                                   <input type="text" name="create_date" class="form-control datepicker strtDate" value="<?php echo date('m/d/Y',strtotime($updateData['prj_start_date'])); ?>" required  onchange="strtDate(this)">
                                 </div>
                                <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">End Date</label>
                                   <input type="text" name="last_date" class="form-control endDate" value="<?php echo date('m/d/Y',strtotime($updateData['prj_end_date'])); ?>" required>
                                </div>
                              </div> 

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Total Marks</label>
                                   <input type="text" name="t_marks" class="form-control" id="exampleInputEmail1"  value="<?php echo $updateData['prj_total_marks']; ?>" required="required">
                                </div>
                           
                              </div> 
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Short Description</label>
                                  <!--  <input type="text" name="desc" class="form-control"  placeholder="description" value="<?php //echo $updateData['prj_desc']; ?>" required="required"> -->
                                   <textarea name="editor1" class="form-control" rows="5" value="" required="required"><?php echo $updateData['prj_desc']; ?></textarea>
                                </div>
                              </div>   
                               
                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    
                                     <label>Upload Image</label>

                                        <input type="file" multiple="multiple" name="image_name[]" id="my_image_name"  class="form-control" />
                                 </div>
                              </div>   
                                     
                                    <div class="row"> 
                                        <div class="form-group col-md-12">
                                              <?php 
                                                    foreach ($imagedata as $key => $row) 
                                                    {
                                                      $i = explode('.', $row['prj_file']);
                                                      // print_r($i);
                                                      if($i[1]=='pdf')
                                                      {
                                                  ?>
                                              <div class="col-md-3">
                                                <a href="<?= base_url('/uploads/'.$row['prj_file']);?>"  target="_blank">
                                                      <img  src="<?= base_url('/uploads/icon/pdf-icon.jpg');?>" style="height: 200px;width: 100%;" id="imgIdd">
                                                      <p class="image-text"><?php echo $row['img_title'];?></p>
                                                </a>  
                                                      <a href="<?php echo base_url('MainContent/singleImgaeDalet/'.$row['img_id']);?>" class="btn btn-sm btn-danger deleteImg">trash</a></p>
                                              </div>
                                              <?php 
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <div class="col-md-3">
                                                      <a href="<?php echo base_url('./uploads/'.$row['prj_file']);?>" target="_blank">
                                                        <img  src="<?php echo base_url('./uploads/'.$row['prj_file']);?>" style="height: 200px;width: 100%;" id="imgIdd">
                                                        <p class="image-text"><?php echo $row['img_title'];?></p>
                                                      </a>
                                                      <a href="<?php echo base_url('MainContent/singleImgaeDalet/'.$row['img_id']);?>" class="btn btn-sm btn-danger deleteImg">trash</a></p>
                                              </div>
                                                <?php
                                                    }    
                                                    }
                                                  ?> 
                                            </div>

                                            <div class="row">
                                              <span id="preview-area">
                                            </div>
                                      </div>
               
                            </div>
              

                                  <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">update</button>
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
          // for the next line to work, you need something class="preview-area" in your html
            // $('#preview-area').empty();
          $('#preview-area').append('<div class="col-md-3"><img class="card-img-top" src="' + objectUrl + '" style="height:200px;  width:100%;" /><br><input type="text" name="img_title[]" placeholder="    enter Title" style="height:30px;  width:100%;"></div>');
          // get rid of the blob
          window.URL.revokeObjectURL(fileList[i]);
      }
  }
</script>









