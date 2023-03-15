




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  Updates News -->
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
  <td><a href="<?php echo base_url('cms_ci/newsView');?>" class="btn btn-sm btn-success">News List</a></td>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">Update News Here</h3> -->

              <div class="box-tools pull-right">
                
              
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                     


                    <form method="post" action="<?php echo base_url('cms_ci/updateNewsData');?>" enctype="multipart/form-data">
                         <div class="box-body">



                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">News Title</label>
                                   <input type="text" name="title" class="form-control" value="<?php echo $updateData['n_u_title'];?>" required="required">
                                   <input type="hidden" name="idd" value="<?php echo $updateData['n_u_id'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Short Description</label>
                                    <input type="text" name="short_desc" class="form-control" value="<?php echo $updateData['n_u_short_desc'];?>" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                   <label for="exampleInputPassword1">Date</label>
                                  <input type="text" name="datee" class="form-control datepicker" value="<?php echo date('m/d/Y',strtotime($updateData['n_u_date']));?>" required>
                                </div>
                              </div>  
 
                                 
                              <div class="form-row">
                                  <div class="form-group col-md-12">  
                                   <label for="exampleInputPassword1">Long Description</label>
                                    <textarea name="editor1" class="form-control" rows="7" required="required"><?php echo $updateData['n_u_long_desc'];?></textarea>
                                  </div>
                              </div>

                                

                                <div class="form-group">
                                     <label>Upload Image</label>
                                        <input type="file" multiple="multiple" name="image_name[]" id="my_image_name"  class="form-control" />
                                 </div>
                                     
                                    
                                  <div class="form-group">
                                       <div class="row">
                                         <?php 
                                              foreach ($imagedata as $key => $row) 
                                              {
                                                 $i = explode('.', $row['img']);
                                                if($i[1]=='pdf')
                                                {
                                            ?>
                                         <div class="col-md-3" data-toggle="tooltip" title="download attachment">
                                           <a href="<?= base_url('/uploads/'.$row['img']);?>"  target="_blank">
                                                 <img  src="<?= base_url('/uploads/icon/pdf-icon.jpg');?>" style="height: 200px;width: 100%;" id="imgIdd">
                                        </a>
                                                 <a href="<?php echo base_url('Cms_ci/deleteNewsImg/'.$row['img_u_n_id']);?>" class="btn btn-sm btn-danger deleteImg">trash</a></p>
                                             
                                         </div>
                                         <?php   
                                              }
                                              else
                                              {
                                          ?>
                                           <div class="col-md-3">
                                           
                                                 <img  src="<?php echo base_url('./uploads/'.$row['img']);?>" style="height: 200px;width: 100%;" id="imgIdd">
                                                 
                                                 <a href="<?php echo base_url('Cms_ci/deleteNewsImg/'.$row['img_u_n_id']);?>" class="btn btn-sm btn-danger deleteImg">trash</a></p>
                                             
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







