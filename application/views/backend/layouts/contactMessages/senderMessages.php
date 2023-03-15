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
    <section class="content"><br><br>
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
                                       <th scope="col">Name</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Message</th>
                                       <th scope="col">Date/Time</th>
                                       <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th> 
                                     </tr>
                                   </thead>
                                   <tbody>
                                      <?php
                                          	$sn=1;
                                        foreach ($senderList as $list) 
                                        {
                                      ?>
                                          <tr>
                                           <td>
                                           <input type="checkbox" class="delete_checkbox" value="<?php echo $list->sender_id; ?>" />
                                           </td>
                                           <td scope="row"><?php echo $sn;  ?></td>
                                           <td><?php echo $list->sender_name; ?></td>
                                           <td><a href="mailto:<?php echo $list->sender_email; ?>"><?php echo $list->sender_email; ?></a></td>
                                           <td><?php echo $list->sender_msg;   ?></td>
                                           <td><?php echo date('d M Y h:i',strtotime($list->rec_date)); ?></td>
                                           <td>
                                            <a onclick="return confirm('Are you sure?');" href="<?php echo base_url('Cms_ci/deleteSender/'.$list->sender_id);?>" class="btn btn-sm   btn-danger "><i class="fa fa-trash"> 
                                               </i>
                                            </a>
                                           </td>
                                            
                                         </tr>

                                      <?php
                                      		$sn++;
                                        }
                                      ?>
                                   
                                 
                                 
 
                                   </tbody>
                                </table>
                                <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="contact_msgs" data-field="sender_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>

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




