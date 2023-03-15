




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Staff Meassage ListView -->
        <!-- <small>Version 2.0</small> -->
      </h1>
       <ol class="breadcrumb">
     <!--    <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <td><a href="" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#myModalInsert">Add Staff Msg</a></td>
<br>

      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Staff Msg List</h3> -->

              <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button> -->
                <div class="btn-group">
                  <button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-download"></i>Export</button>
                  <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-print").click();'>
                            <i class="fa fa-print"></i>
                          Print
                        </a>
                    </li>
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-pdf").click();'>
                            <i class="fa  fa-file-pdf-o"></i>
                          pdf
                        </a>
                    </li>
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-csv").click();'>
                            <i class="fa fa-database"></i>
                          CSV
                        </a>
                    </li>
                      <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-excel").click();'>
                            <i class="fa  fa-file-excel-o"></i>
                          excel
                        </a>
                    </li>
                     <li>
                        <a href="javascript:void(0);"  onclick='$(".buttons-copy").click();'>
                            <i class="fa fa-copy"></i>
                          copy
                        </a>
                    </li>
                  </ul>
                </div>
                   <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div><br>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                                <table class="table data-tbl" id="tbl-abt">
                                   <thead>
                                     <tr>
                                      <th>
                                        <input type="checkbox" name="" class="delAll">
                                      </th>
                                       <th scope="col">#</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Designation</th>
                                       <!-- <th scope="col">Description</th> -->
                                       <th scope="col">Email</th>
                                       <th scope="col">Staff Image</th>
                                       <th scope="col"><p>Action</p></th> 
                                     </tr>
                                   </thead>
                                   <tbody>
                                      <?php 
                                            $sn=1;
                                        foreach ($aboutData as $key => $row) 
                                        {
                                      ?>
                                        <tr>
                                          <td><input type="checkbox" class="delete_checkbox" value="<?php echo $row['stf_id']; ?>" /></td>
                                           <th scope="row"><?php echo $sn; ?></th>
                                           <td><?php echo $row['stf_name']; ?></td>
                                           <td><?php echo $row['stf_designation']; ?></td>
                                           <!-- <td><?php //echo $row['stf_desc']; ?></td> -->
                                           <td><?php echo $row['stf_email']; ?></td>
                                           
                                          
                                           <td><img src="<?php echo base_url('uploads/'.$row['staff_img']);?>" height="30dp" width="30dp"></td>
                                           <td>
                                            <a onclick=" return confirm('Are you sure?');"  href="<?php echo base_url('cms_ci/deleteMsg/'.$row['stf_id']);?>" class="btn btn-sm   btn-danger "><i class="fa fa-trash"></i></a>
                                            <a  class="btn btn-sm btn-success btn_edit"  data-toggle="modal" data-target="#mdl<?=$key; ?>"><i class="fa fa-eye"></i></a></td>
                                            
                                         </tr>

  <div class="modal fade" id="mdl<?=$key; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Staff Msg here</h4>
        </div>
        <div class="modal-body">
          <!-- <p>This is a large modal.</p> -->



             <form method="post" action="<?php echo base_url('Cms_ci/updateMsgData');?>" enctype="multipart/form-data">
                         <div class="box-body">

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Name</label>
                                   <input type="text" name="name" class="form-control" value="<?php echo $row['stf_name']; ?>" required="required">
                                   <input type="hidden" name="idd" value="<?php echo $row['stf_id']; ?>" required="required">
                                </div>  
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Designation</label>
                                   <input type="text" name="designation" class="form-control" value="<?php echo $row['stf_designation']; ?>" required="required">
                                </div> 
                              </div>

                              <div class="form-row">
                                   <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Email</label>
                                         <input type="email" name="email" class="form-control" value="<?php echo $row['stf_email']; ?>" required="required">
                                  </div> 
                              </div>

                              <div class="form-row">
                                   <div class="form-group col-md-9">
                                        <label>upload image</label>
                                        <input type="file"  name="photo" id="my_image_name"  class="form-control" />
                                  </div> 
                                  <div class="form-group col-md-3">
                                         <img src="<?php echo base_url('uploads/'.$row['staff_img']);?>" height="50px;" width="60px;" style="margin-top: 15px;">
                                  </div> 
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">  
                                   <label for="exampleInputPassword1">Long Description</label>
                                  <textarea name="editor" class="form-control"  rows="7" required><?php echo $row['stf_desc']; ?></textarea>
                                  </div>
                              </div>

                          </div>         
                           
                         
            
                                <div class="form-group col-md-12">
                                  <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                  </div>
                                </div>
                                 
                         </form>           

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

                                      <?php
                                      $sn++;
                                        }
                                      ?>
                                   
                                 
                                 
 
                                   </tbody>
                                </table>

                                 <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="staff_msgs" data-field="stf_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>

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




<!------------------------- Start Insertion Model ----------------------------->

<div class="container">
  <!-- <h2>Large Modal</h2> -->

  <div class="modal fade" id="myModalInsert" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Staff Msg Here</h4>
        </div>
        <div class="modal-body">
          


             <form method="post" action="<?php echo base_url('Cms_ci/addMsgData');?>" enctype="multipart/form-data">
                         <div class="box-body">

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Name</label>
                                   <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                                </div>  
                                 <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Designation</label>
                                   <input type="text" name="designation" class="form-control" autocomplete="off" required="required">
                                </div> 
                              </div>

                              <div class="form-row">
                                   <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Email</label>
                                         <input type="email" name="email" class="form-control" autocomplete="off" required="required">
                                  </div> 
                               
                              </div>

                              <div class="form-row">
                                   <div class="form-group col-md-12">
                                        <label>upload image</label>
                                        <input type="file"  name="photo" id="my_image_name"  class="form-control" required="required"/>
                                  </div> 
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">  
                                   <label for="exampleInputPassword1">Long Description</label>
                                    <textarea name="editor1" class="form-control" rows="7" required></textarea>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!------------------------- End Insertion Model ----------------------------->






