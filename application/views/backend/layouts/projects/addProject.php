  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  Add Project -->
        <!-- <small>Version</small> -->
      </h1>
      <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
        <a href="<?php echo base_url('MainContent/projectList_View');?>" class="btn btn-sm btn-success">Project List</a>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Projects ListView</h3> -->

              <!-- <div class="box-tools pull-right">
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
                     


                  <form method="post" action="<?php echo base_url('MainContent/projectAddData');?>" enctype="multipart/form-data">
                         <div class="box-body">
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Project Title</label>
                                   <input type="text" name="title" class="form-control" autocomplete="off" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Org Name</label>
                                   <select name="org_id" class="form-control select2" required>
                                    <option value="">-select-</option>
                                    <?php
                                       foreach ($orgList as $key => $row) 
                                       {
                                    ?>
                                        <option value="<?php echo $row['org_id']; ?>"><?php echo $row['org_name']; ?></option>
                                    <?php      
                                        } 
                                    ?>
                                   </select>
                                </div>
                              </div>
                                 <div class="clearfix">&nbsp</div>
                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">Start Date</label>
                                   <input type="text" name="create_date" class="form-control datepicker strtDate" autocomplete="off" required="required" onchange="strtDate(this)">
                                 </div>
                                 <div class="form-group date col-md-6">
                                   <label for="exampleInputPassword1">End Date</label>
                                  <input type="text" name="last_date" class="form-control  endDate" autocomplete="off" required="required">
                                </div>
                              </div>

                           
                              <div class="form-row">                               
                                 <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Total Marks</label>
                                   <input type="number" name="t_marks" class="form-control" autocomplete="off" required="required">
                                 </div>
                              </div>
                             
                            
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Short Description</label>
                                   <!-- <input type="text" name="desc" class="form-control" autocomplete="off" required="required"> -->
                                    <textarea name="editor1" class="form-control" rows="5" autocomplete="off" required></textarea>
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12" id="upload-form">
                                        <label>Upload Image</label>

                                        <input type="file" name="image_name[]" onchange="myFunction(this);previewImages(this)" id="my_image_name"  class="form-control file-input"   multiple="multiple"/>
                                  </div> 
                              </div>
                              <div class="row">
                                         <span id="preview-area">
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


<script type="text/javascript">
  // var inputLocalFont = document.getElementById("my_image_name");
  // inputLocalFont.addEventListener("change", previewImages, false); //bind the function to the input
  function previewImages(obj) 
  {
      var fileList = obj.files;
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

     function myFunction(obj) 
   {
       // alert('fun');
      $(obj).hide();
      $(obj).removeAttr('id');
      $("#upload-form").append("<input class='form-control file-input' type='file' onchange='myFunction(this);previewImages(this);' name='image_name[]' id='my_image_name' multiple='multiple' />");
    }
</script>




