<?php
 $res      = $this->API_m->singleRecord('projects',['prj_id' => $this->uri->segment(3)]);
 $prj_name = $res->prj_name;
 $pr_id    = $this->uri->segment(3);
// echo "<pre>";
// print_r($appList);
// exit();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <!--  Assigning Results  -->
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
  <!--       <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>
     <h1></h1>
    <!-- Main content -->
    <section class="content">
     <br><br>
      <div class="row">
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Result list of <b><?= $prj_name; ?></b></h3>

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
       
                        <form action="<?php echo base_url('MainContent/InsertApplicantsResults/'); ?>" method="post">
                              <div class="row">
                                <div class="col-md-4">
                               <!-- <b>Test Date:</b> <label><input type="text" name="test_date" value="" class="form-control datepicker" required></label> -->
                                </div>
                                <div class="col-md-3 pull-right">
                                <label for="inputPassword4"></label>
                                </div>
                              </div>
                              <table class="table table-striped">
                                <thead>
                                  <tr> 
                                    <th>#</th>
                                    <th>CNIC</th>
                                    <th>ROLLNO</th>
                                    <th>NAME</th>
                                    <th>TEST DATE</th>
                                    <th>ATTENDENCE</th>
                                    <th>TOTAL MARKS</th>
                                    <th>OBTAINED MARKS</th>
                                    <th>%</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                    if(!empty($appList))
                                    {
                                        $sn=1;
                                      foreach($appList as $list)
                                      {
                                ?>
                                <tr>
                                  <td><?= $sn; ?></td>
                                  <td>
                                    <input type="hidden" name="prj_id"      value="<?= $this->uri->segment(3); ?> ">
                                    <input type="text"   name="user_cnic[]" class="form-control" value="<?= $list->user_cnic; ?>" disabled>
                                    <input type="hidden" name="user_id[]"   value="<?= $list->user_id; ?>">
                                    <input type="hidden" name="app_id[]"    value="<?= $list->ap_app_id; ?>">
                                    <input type="hidden" name="rollno_id[]"    value="<?= $list->rl_rollno_id; ?>">
                                  </td>
                                   <td>
                                    <input type="text" name="roll_no[]" class="form-control"  value="<?= $list->roll_no;  ?>" disabled>
                                  </td>
                                  <td>
                                    <input type="text" name="user_name[]" class="form-control"  value="<?= $list->user_fullname;  ?>" disabled>
                                  </td>
                                  <td>
                                    <input type="text" name="test_date[]" class="form-control"  value="<?= date('d M Y',strtotime($list->test_date_time));  ?>" disabled>
                                  </td>
                                  <td>
                                    <input type="text" name="attendence[]" class="form-control"  value="<?php if($list->status=='P'){ echo 'Present';}elseif($list->status=='A'){ echo 'Absent';} ?>" disabled>
                                  </td>
                                  <td>
                                    <input type="text" name="marks[]" class="form-control totalMarks" id="tmrks"  value="<?php if(!empty($list->prj_total_marks)){ echo $list->prj_total_marks; } ?>" disabled>
                                  </td>
                                   <td>
                                    <?php
                                      if(!empty($list->status=='P'))
                                      {
                                    ?>
                                     <input type="text" name="obt_marks[]" class="form-control obtMarks"  value="<?php if(!empty($list->obt_marks)){ echo $list->obt_marks; }else{ echo'0';} ?>" onblur="FindPercent(this);" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                    <?php
                                      }
                                      elseif(!empty($list->status=='A'))
                                      {
                                    ?>
                                       <input type="text" class="form-control obtMarks"  value="0" onblur="FindPercent(this);" disabled>
                                       <input type="hidden" name="obt_marks[]" class="form-control obtMarks"  value="0" onblur="FindPercent(this);" >
                                    <?php
                                      }
                                      else
                                      {
                                    ?>
                                      <input type="text" class="form-control obtMarks"  value="0" onblur="FindPercent(this);" disabled>
                                       <input type="hidden" name="obt_marks[]" class="form-control obtMarks"  value="0" onblur="FindPercent(this);" >
                                    <?php
                                      }
                                    ?>
                                   

                                  </td>
                                  <td>
                                  <input type="text" name="percent[]" class="form-control appPercent" value="<?php if(!empty($list->percentage)){ echo $list->percentage; }else{ echo'0';} ?>" disabled>
                                    <input type="hidden" name="percent[]" class="form-control appPercent"  value="<?php if(!empty($list->percentage)){ echo $list->percentage; }else{ echo'0';} ?>">
                                  </td>
                                </tr>
                                <?php
                                    $sn++;
                                      }

                                    }
                                ?>
                                
                              </tbody>
                              </table>
                                <div class="form-group"><br>
                                  <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-success">Save</button>
                                  </div>
                                </div>
                       </form>


                 </div> 
                 

              </div>
              <!-- /.row -->
              <div class="row pull-right">
                <div class="col-md-12">
                  <ul class="list-inline">
                   <li>
                    <a href="<?= base_url('MainContent/prjApplicantsList/'.$pr_id); ?>">
                      <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                      Applicant List
                      </button>
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('MainContent/AddprjApplicantsList/'.$pr_id); ?>">
                      <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                      Add/Update Applicants
                      </button>
                    </a>
                  </li>
                    <li>
                      <a href="<?= base_url('MainContent/prjRollnoView/'.$pr_id); ?>">
                        <button type="button" class="btn sm btn-success"><i class="fa fa-list"></i> 
                          Rollno List
                        </button>
                      </a>
                   </li>
                  <li>
                      <a href="<?= base_url('MainContent/attendenceView/'.$pr_id); ?>">
                        <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                        Attendence
                        </button>
                      </a>
                    </li>
                  <li>
                    <a href="<?= base_url('MainContent/getPrjAppResults/'.$pr_id); ?>">
                      <button type="button" class="btn sm btn-primary"><i class="fa fa-list"></i> 
                      Result List
                      </button>
                    </a>
                  </li>
                </ul>
                </div>
              </div>
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
  <!-- loader  -->
  <style type="text/css">
    .modal-dialog{vertical-align: center !important;margin-top: 150px;opacity: 0px;}
    .#modal-success{background-color: rgba(0,0,0,.0001) !important;}
  </style>
<div class="modal" id="modal-success" style="display: none; padding-right: 17px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
            <!-- <span aria-hidden="true">×</span></button> -->
          <h4 class="modal-title">Loading...</h4>
        </div>
        <div class="modal-body text-center">
          <div class="overlay"><i class="fa fa-refresh fa-spin" style="font-size: 50px;"></i></div>
        </div>
      <!--   <div class="modal-footer">
           <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> 
           <button type="button" class="btn btn-outline">Save changes</button> 
        </div> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ./Loader -->

<script>
   function FindPercent(obj)
   {
     // alert('percentage!');
      // var per      = '';
         var obtMarks = $(obj).closest('tr').find('.obtMarks').val();
         var tMarks   = $(obj).closest('tr').find('.totalMarks').val();
      if(obtMarks=='')
      {
        $(obj).closest('tr').find('.obtMarks').val(parseInt(0))
        $(obj).closest('tr').find('.appPercent').val('');

      }
      else
      {
          if(parseInt(obtMarks)>parseInt(tMarks))
          {
            // alert(obtMarks);
            alert('Please obtain Marks must be less than total marks');
              $(obj).closest('tr').find('.obtMarks').val(parseInt(tMarks));
            var per = parseInt(tMarks)*100/parseInt(tMarks);
            $(obj).closest('tr').find('.appPercent').val(parseFloat(per).toFixed(2));
            // $(obj).closest('tr').find('.totalMarks').val('');
          }
          else
          {
            var per = parseInt(obtMarks)*100/parseInt(tMarks);
            $(obj).closest('tr').find('.appPercent').val(parseFloat(per).toFixed(2));
          }
      }
        
  

      // per = (obtMarks.toString())*100/($tMarks.toString());
      // alert(per);
   }
</script>