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
     
      <a href="<?php echo base_url('cms_ci/orgListView');?>" class="btn btn-sm btn-success">View Organization List</a>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Organization</h3>

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
                                  <label for="inputEmail4">Organization Name</label>
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
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Organization Type</label>
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
                                        <label>Organization Logo </label>
                                        <input type="file"  name="photo" id="my_image_name"  class="form-control" />
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
  


