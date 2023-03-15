




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  Add News -->
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
    
 
      <div class="row"><br>
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <a href="<?php echo base_url('cms_ci/newsView');?>" class="btn btn-sm btn-success">News List</a>
          <div class="box">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">News ListView</h3> -->

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
                 <div class="col-md-12">
                     
                    <form method="post" action="<?php echo base_url('cms_ci/addNewsData');?>" enctype="multipart/form-data">
                         <div class="box-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">News Title</label>
                                   <input type="text" name="title" class="form-control" autocomplete="off"  required="required">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Short Description</label>
                                    <input type="text" name="short_desc" class="form-control" autocomplete="off" required="required">
                                </div>
                              </div>

                               <div class="form-row">
                                   <div class="form-group col-md-6">
                                        <label>Upload Image</label>

                                       <input type="file"  name="image_name[]"  id="my_image_name"  class="form-control" required="required" multiple="multiple"/>
                                  </div> 

                                <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">Date</label>
                                  <input type="text" name="datee" class="form-control datepicker" autocomplete="off" required="required">
                                </div>
                              </div>  
                                 
                              <div class="form-row">
                                  <div class="form-group col-md-12">  
                                   <label for="exampleInputPassword1">Long Description</label>
                                       <textarea class="textarea" name="desc" id="editor1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                  </div>
                              </div>
                            </div>
            
                                <div class="form-group col-md-12">
                                  <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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







