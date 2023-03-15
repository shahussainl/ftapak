<?php
// echo "<pre>";
// print_r($contactData);
// exit();
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Contact List -->
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <!-- <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <a href="" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#myModalInsert">Add TestCenter</a>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">Contact List</h3> -->

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
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
              </div><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                     <!-- <h1>Main Body</h1> -->


                                <table class="table data-tbl" id="tbl-contact">
                                   <thead>
                                     <tr>
                                      <th>
                                        <input type="checkbox" name="" class="delAll">
                                      </th>
                                       <th scope="col">#</th>
                                       <th scope="col">Test Center Name</th>
                                       <th scope="col">Test Center Address</th>
                                       <th scope="col">Test Center Contact</th>
                                       <th scope="col">Test Center Person Contact</th>
                                       
                                       <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th> 
                                     </tr>
                                   </thead>
                                   <tbody>
                                      <?php
                                          $sn=1;
                                        foreach ($testCeneteData as $key => $row) 
                                        {
                                      ?>
                                          <tr>
                                           <td>
                                           <input type="checkbox" class="delete_checkbox" value="<?php echo $row['center_id']; ?>" />
                                           </td>
                                           <td scope="row"><?php echo $sn;  ?></td>
                                           <td><?php echo $row['name']; ?></td>
                                           <td><?php echo $row['address']; ?></td>
                                           <td><?php echo $row['contact']; ?></td>
                                           <td><?php echo $row['person_contact']; ?></td>
                                     
                                      
                                           <td>
                                            <a onclick="return confirm('Are you sure?');" href="<?php echo base_url('Cms_ci/deleteTestCenter/'.$row['center_id']);?>" class="btn btn-sm   btn-danger "><i class="fa fa-trash"> 
                                               </i>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="#" class="btn btn-sm btn-success btn_edit"  data-toggle="modal" data-target="#mdl<?=$key; ?>"><i class="fa fa-eye"></i>
                                             </a>
                                           </td>
                                            
                                         </tr>

  <div class="modal fade" id="mdl<?=$key; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Contact here</h4>
        </div>
        <div class="modal-body">
          <!-- <p>This is a large modal.</p> -->


             <form method="post" action="<?php echo base_url('Cms_ci/updateCenterData');?>" enctype="multipart/form-data">
                         <div class="box-body">

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Name</label>
                                   <input type="text" value="<?php echo $row['name']; ?>" name="name" class="form-control" required="required">
                                   <input type="hidden" name="idd" value="<?php echo $row['center_id'];  ?>">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Center Address</label>
                                   <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" required="required">
                                </div>
                              </div> 

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Center Contact</label>
                                   <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" required="required" data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Person Contact</label>
                                   <input type="text" name="personcontact" class="form-control" value="<?php echo $row['person_contact']; ?>" required="required">
                                </div>
                              </div>

                         

      

                                <div class="form-group col-md-12">
                                  <div class="box-footer">
                                    <button type="submit" value="" name="submit" class="btn btn-primary">update</button>
                                  </div>
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
                                <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="tbl_testCenter" data-field="center_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>

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
  <h2>Large Modal</h2>

  <div class="modal fade" id="myModalInsert" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Contact Here</h4>
        </div>
        <div class="modal-body">
          


             <form method="post" action="<?php echo base_url('Cms_ci/AddTestCenterData');?>" enctype="multipart/form-data">
                         <div class="box-body">

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Test Center Name</label>
                                   <input type="text" name="test_name" class="form-control" autocomplete="off" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Center Address</label>
                                   <input type="text" name="tes_address" class="form-control"autocomplete="off" required="required">
                                </div>
                              </div> 

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Center Contact</label>
                                   <input type="text" name="test_contact" class="form-control" autocomplete="off" required="required" data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Contact Person</label>
                                   <input type="text" name="contact_person" class="form-control" autocomplete="off" required="required">
                                </div>
                              </div>

                            



                                <div class="form-group col-md-12">
                                  <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                  </div>
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





