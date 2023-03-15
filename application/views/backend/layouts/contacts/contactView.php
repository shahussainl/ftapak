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
       <!--  <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
  <a href="" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#myModalInsert">Add Contact</a>
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
                 <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
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
                                       <th scope="col">Title</th>
                                       <th scope="col">Phone Number</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Address</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th> 
                                     </tr>
                                   </thead>
                                   <tbody>
                                      <?php
                                            $sn=1; 
                                        foreach ($contactData as $key => $row) 
                                        {
                                      ?>
                                          <tr>
                                           <td>
                                           <input type="checkbox" class="delete_checkbox" value="<?php echo $row['con_id']; ?>" />
                                           </td>
                                           <td scope="row"><?php echo $sn; ?></td>
                                           <td><?php echo $row['con_title']; ?></td>
                                           <td><?php echo $row['con_mob']; ?></td>
                                           <td><?php echo $row['con_email']; ?></td>
                                           <td><?php echo $row['con_address']; ?></td>
                                           <td><?php  
                                           if($row['con_primary']==1)
                                             {
                                            ?>
                                                 Primary
                                            <?php
                                             }
                                              else
                                              {
                                                ?>
                                                  Secondary
                                                <?php
                                              }
                                             

                                            ?></td>
                                      
                                           <td><a onclick="return confirm('Are you sure?');" href="<?php echo base_url('cms_ci/deleteContact/'.$row['con_id']);?>" class="btn btn-sm   btn-danger "><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  con_id="<?php echo $row['con_id']?>" con_name="<?php echo $row['con_title']?>" con_mob="<?php echo $row['con_mob']?>" class="btn btn-sm btn-success btn_edit"  data-toggle="modal" data-target="#mdl<?=$key; ?>"><i class="fa fa-eye"></i></a></td>
                                            
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


             <form method="post" action="<?php echo base_url('cms_ci/updateContactData');?>" enctype="multipart/form-data">
                         <div class="box-body">

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Name</label>
                                   <input type="text" value="<?php echo $row['con_title']; ?>" name="name" class="form-control" required="required">
                                   <input type="hidden" name="idd" value="<?php echo $row['con_id'];  ?>">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Phone Number</label>
                                   <input type="text" name="phone_number" class="form-control" value="<?php echo $row['con_mob']; ?>" required="required">
                                </div>
                              </div> 

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Email</label>
                                   <input type="email" name="email" class="form-control" value="<?php echo $row['con_email']; ?>" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">address</label>
                                   <input type="text" name="address" class="form-control" value="<?php echo $row['con_address']; ?>" required="required">
                                </div>
                              </div>

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                        <div class="checkbox">
                                         <label>
                                          <input type="hidden" name="status" value="0">
                                          <input  type="checkbox" name="status" value="1" <?php
                                          if($row['con_primary']==1)
                                          {
                                           
                                           echo 'checked';
                                          
                                          }
                                        
                                          ?> >Primary</label>
                                        </div>
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
                                
                                <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="contact" data-field="con_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>

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
 <!--  <h2>Large Modal</h2> -->

  <div class="modal fade" id="myModalInsert" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Contact Here</h4>
        </div>
        <div class="modal-body">
          


             <form method="post" action="<?php echo base_url('cms_ci/AddContactData');?>" enctype="multipart/form-data">
                         <div class="box-body">

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Name</label>
                                   <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="exampleInputEmail1">Phone Number</label>
                                   <input type="text" name="phone_number" class="form-control"autocomplete="off" required="required">
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
                                  <label for="exampleInputEmail1">address</label>
                                   <input type="text" name="address" class="form-control" autocomplete="off" required="required">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-12">
                                        <div class="checkbox">
                                         <input  type="hidden" name="status" value="0">
                                         <label><input  type="checkbox" name="status" value="1">Primary</label>
                                         
                                        </div>
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





