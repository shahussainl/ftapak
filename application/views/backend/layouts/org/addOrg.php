  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Organization  -->
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>
     <h1></h1>
    <!-- Main content -->
    <section class="content">
     
      <a href="<?php echo base_url('cms_ci/orgListView');?>" class="btn btn-sm btn-success">View List</a>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Project</h3>

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
                  
                      
                      
                        <form action="<?php echo base_url('cms_ci/addOrgData'); ?>" method="post" enctype="multipart/form-data">
                             
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4"> Name</label>
                                  <input type="text" name="org_name" class="form-control"  id="inputEmail4"autocomplete="off" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Email</label>
                                  <input type="email" name="email" class="form-control" id="inputEmail4" autocomplete="off" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Fax</label>
                                  <input type="text" name="fax" class="form-control" id="inputEmail4" autocomplete="off" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Contact</label>
                                  <input type="text" name="contact" class="form-control" id="inputPassword4" autocomplete="off" required >
                                </div>
                                 <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">Start Date</label>
                                   <input type="text" name="startdate" class="form-control datepicker strtDate" value="<?php echo date('m/d/Y'); ?>" required  onchange="strtDate(this)">
                                 </div>
                                <div class="form-group col-md-6">
                                   <label for="exampleInputPassword1">End Date</label>
                                   <input type="text" name="expirydate" class="form-control endDate" value="<?php echo date('m/d/Y'); ?>" required>
                                </div>
                              </div> 
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Project bType</label>
                                    <select name="org_type" class="form-control" required="required">
                                        <option value="">--select--</option>
                                        <option value="Goverment">Goverment</option> 
                                        <option value="Semi_goverment">Semi Goverment</option> 
                                        <option value="Private">Private</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                   <div class="form-group col-md-6">
                                  <label for="inputEmail4">Address</label>
                                  <input type="text" name="address" class="form-control" autocomplete="off" id="inputEmail4" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">City</label>
                                  <input type="text" name="city" class="form-control" id="inputEmail4" autocomplete="off" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">State</label>
                                  <input type="text" name="state" class="form-control" id="inputPassword4" autocomplete="off" required >
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Country</label>
                                  <input type="text" name="country" class="form-control" id="inputEmail4" autocomplete="off" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">PostCode</label>
                                  <input type="text" name="postCode" class="form-control" id="inputPassword4" autocomplete="off" required >
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
                                <div class="form-group col-md-12">
                                  <label>Organization Logo </label>
                                  <input type="file"  name="photo" id="my_image_name"  class="form-control" />
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

                              
                                <div class="form-group">
                                  <div class="form-group col-md-12">
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