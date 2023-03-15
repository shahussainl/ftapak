  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  Add User -->
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
    
  <td><a href="<?php echo base_url('MainContent/userList_View');?>" class="btn btn-sm btn-success">Users List</a></td>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">User ListView</h3> -->
<!-- 
              <div class="box-tools pull-right">
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
                    <form method="post" action="<?php echo base_url('MainContent/userAddData');?>" enctype="multipart/form-data">
                         <div class="box-body">
                            <input type="hidden" name="user_id" id="user_id" value="">

                              <div class="form-row">                                
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">CNIC</label> <span id="errMsg"></span>
                                   <input type="text" name="user_cnic" onblur="Findcnic();" class="form-control" id="uCnic" placeholder="Enter a Valid cnic i.e 16xxx-xxxxxxx-x" autocomplete="off" value="" required data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" title="Enter Only digits like 16xxx-xxxxxxx-x ">
                                </div> 
                                                               
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Full Name</label>
                                   <input type="text" name="user_fullname" value="" id="user_fullname" class="form-control" placeholder="Enter Your Full Name" required>
                                </div>
                              </div>
                               <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputPassword1">Father Name</label>
                                   <input type="text" name="user_f_name" id="user_f_name" value="" class="form-control" required >
                                </div>
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputPassword1">Mobile</label>
                                   <input type="text" name="user_contact" value="" class="form-control user_contact" required data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="">
                                </div>
                              </div> 
                              
                             
                               <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Telephone</label>
                                  <input type="text" name="user_telephone" value="" class="form-control user_telephone"  placeholder="Enter Your Telephone #">
                                </div> 
                                 <div class="form-group col-md-6">
                                   <label for="">Email</label>
                                  <input type="email" name="user_email" id="user_email" value="" class="form-control" required>
                                </div>
                               
                                 
                              </div>
                              <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                  <label for="">User Password</label>
                                  <input type="password" name="user_password" value="" class="form-control"  placeholder="Enter Your Password" >
                                </div>
                             
                                
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="user_address" value="" class="form-control user_address"  placeholder="Enter Your Address" required>

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
                                  <div class="form-group col-md-6">
                                        <label></label>

                                        <input type="file"  name="photo" id="my_image_name"  class="form-control" required="required"/>
                                  </div> 
                                   <div class="form-group col-md-6">
                                  <label for="">Select Role</label>
                                    <select name="role_id" class="form-control select2" required>
                                        <option value="">-select-</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Staff</option>
                                        <option value="3">Applicant</option>
                                        <option value="4">Organization</option>
                                   </select>
                                </div>
                                 
                                </div>
                              </div>
                            </div>
                                <div class="form-group col-md-12">
                                  <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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


<!-- <script type="text/javascript">
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
</script> -->

<script>
  function Findcnic()
  {
    var cnic = $('#uCnic').val();
    // alert(cnic);
     if(cnic!='')
     {
      $.ajax({
              type: 'post',
              dataType: 'json',
              data: {
                  "user_cnic": cnic
              },
              url: '<?= base_url('MainContent/getUserDetail'); ?>',
              success: function (data)
              {
                // alert(data);

                if (data == null) {
      
                    $('#errMsg').html('<span class="text-danger">Record not Found!</span>');

                      $('#user_fullname').val('');
                      $('#user_f_name').val('');
                      $('#user_email').val('');
                      $('#user_id').val('');
                      $('#kt_select2_4').val('').change();
                      $('.user_contact').val('');
                      $('.user_telephone').val('');
                      $('.user_address').val('');
                      
                  } 
                  else 
                  {

                     $('#errMsg').html('<span class="text-success">Record Found!</span>');
                      $('#user_fullname').val(data.user_fullname);
                      $('#user_f_name').val(data.user_father_name);
                      $('#user_email').val(data.user_email);
                      // $('#kt_select2_4').trigger('change');
                      $('#user_id').val(data.user_id);
                      $('.user_contact').val(data.user_contact);
                      $('.user_telephone').val(data.user_telephone);
                      $('.user_address').val(data.user_address);
                      // $('#kt_select2_4').val(data.usercompnayid);
                      
                  }
            
              }
          });

     } 
     else
     {
         $('#errMsg').html('<span class="text-danger">CNIC must not be empty!</span>');
     }
  }
</script>

