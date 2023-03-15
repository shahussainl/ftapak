




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  News ListView -->
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
    
   
      <div class="row"><br>
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>

        <div class="col-md-12">
           <td><a href="<?php echo base_url('cms_ci/newsAddView');?>" class="btn btn-sm btn-success">Add News</a></td>
          <div class="box">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">News List</h3> -->

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


                                <table class="table data-tbl" id="tbl-nu">
                                   <thead>
                                     <tr>
                                      <th>
                                        <input type="checkbox" name="" class="delAll">
                                      </th>
                                       <th scope="col">#</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Short Description</th>
                                      
                                       <th scope="col">Date</th>
                                       
                                       <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                      <?php 
                                            $sn=1;
                                        foreach ($newsData as $key => $row) 
                                        {
                                      ?>
                                          <tr>
                                             <td><input type="checkbox" class="delete_checkbox" value="<?php echo $row['n_u_id']; ?>" /></td>
                                           <th scope="row"><?php echo $sn; ?></th>
                                           <td><?php echo $row['n_u_title']; ?></td>
                                           <td><?php echo $row['n_u_short_desc']; ?></td>
                                           <td><?php echo date('d M Y',strtotime($row['n_u_date'])); ?></td>
                                           
                                           <td>
                                            <a onclick="return confirm('Are You Sure Want to Delete?');" href="<?php echo base_url('cms_ci/deleteNews/'.$row['n_u_id']);?>" class="btn btn-sm   btn-danger "><i class="fa fa-trash"></i>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="<?php echo base_url('cms_ci/newsUpdateView/'.$row['n_u_id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>
                                            </a>
                                          </td>
                                            
                                         </tr>



                                      <?php
                                      $sn++;
                                        }
                                      ?>
                                   
                                 
                                 
 
                                   </tbody>
                                </table>
                                <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="news_updates" data-field="n_u_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>

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









