




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <!--   Organization List -->
        <!-- <small>Version 2.0</small> -->
      </h1>
     <ol class="breadcrumb">
        <!-- <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>
     <h1></h1>
    <!-- Main content -->
    <section class="content">
     
      <a href="<?php echo base_url('cms_ci/orgAddview');?>" class="btn btn-sm btn-success">Add New Organization</a>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button> -->
                <div class="btn-group">
                  <button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-reply"></i>Export</button> 
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
                  
                   <table class="table data-tbl" id="tbl-org">
                      <thead>
                        <tr>
                          <th>
                            <input type="checkbox" name="" class="delAll">
                          </th>
                          <th scope="col">#</th>
                          <th scope="col">Organization Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Fax</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Address</th>
                          <th scope="col">Org Type</th>
                          <th scope="col"><p>Action</p></th>
                        </tr>
                      </thead>
                       <tbody>
                        <?php
                        $sn=1;
                           foreach ($orgAllData as $key => $row) 
                           {
                         ?>
                         <tr>
                           <td><input type="checkbox" class="delete_checkbox" value="<?php echo $row['org_id']; ?>" /></td>
                           <th scope="row"><?php echo $sn;?></th>   
                           <td><?php echo $row['org_name'];?></td>
                           <td><?php echo $row['org_email'];?></td>
                           <td><?php echo $row['org_fax'];?></td>
                           <td><?php echo $row['org_contact'];?></td>
                           <td><?php echo $row['org_address'];?></td>
                           <td><?php if($row['org_type']=='semi_goverment'){ echo 'Semi Government';}else{ echo $row['org_type'];} ?></td>
                           <td scope="col"><a onclick="return confirm('Are You Sure Want To Delete?');"  href="<?php echo base_url('cms_ci/deleteOrg/'.$row['org_id']);?>" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a> 
                            <a href="<?php echo base_url('Cms_ci/orgupdateview/'.$row['org_id']);?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>
                         </tr>
                        <?php   
                              $sn++;
                           }
                        ?> 
 
                       </tbody>
                   </table>
                   
                   <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="organization" data-field="org_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>
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


