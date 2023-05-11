<?php
 $res         = $this->API_m->singleRecord('projects',['prj_id' => $this->uri->segment(3)]);
 // print_r($res);
 $pr_id = $this->uri->segment(3);
 $prj_name    = $res->prj_name;
 $prj_t_marks = $res->prj_total_marks;

 // echo "<pre>";
 // print_r($appList);
 // exit();

?>
<style> 
 .table_wrapper{
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
.form-control {
    display: block;
    width: 150px !important;
}
</style> 



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Assign Applicants  -->
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
      <!-- <a onclick="window.history.back();" class="btn btn-sm btn-success">Back</a> -->
      <div class="row">
        <br><br>
         <div class="col-sm-12">
               <?php $this->load->view('backend/layouts/flashMsg/flashMsg'); ?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $prj_name; ?></h3>

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
                  
                      
                      
<form action="<?php echo base_url('MainContent/insertUpdateApplicants'); ?>" method="post">
<input type="hidden" name="prj_id" value="<?= $this->uri->segment(3); ?> ">
<div class="row">
<div class="col-md-4">
<b>Test Date/Time:</b> <label>
 <div class="row">
    <div class="col-md-6">
      <div class="input-group date">
        <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
        </div>
         <input type="text" class="form-control pull-right  tstDate" value="<?php if(!empty($res->prj_end_date)){ echo date('m/d/Y',strtotime($res->prj_end_date)); } ?>" name="test_date" onclick="edDate()" required>
         <input type="hidden" value="<?php if(!empty($res->prj_end_date)){ echo date('m/d/Y',strtotime($res->prj_end_date)); } ?>" class="eDate">
         <input type="hidden" value="<?php if(!empty($res->prj_start_date)){ echo date('m/d/Y',strtotime($res->prj_start_date)); } ?>" class="sDate">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group">
         <div class="input-group-addon">
      <i class="fa fa-clock-o"></i>
      </div>
      <input type="text" class="form-control timepicker"  name="test_time" required>
      </div>
    </div>
    
  </div>

                              </div>
                                <div class="col-md-3 pull-right">
                                  <!-- Project Name: <label for="inputPassword4"><?= $prj_name; ?></label> -->
                                </div>
                              </div>
                              <table class="table table-striped table_wrapper">
                                <thead>
                                  <tr>
                                    <span id="errMsg"></span>
                                    <th scope="col">
                                      <input type="checkbox" name="" class="delAll">All
                                    </th>
                                    <th>CNIC</th>
                                    <th>ROLLNO</th>
                                    <th>NAME</th>
                                    <th>F/NAME</th>
                                    <th>CONTACT</th>
                                    <th>EMAIL</th>
                                    <th>AR DATE</th>
                                    <th>DoB</th>
                                    <th>GENDER</th>
                                    <th>RELIGION</th>
                                    <th>DISTRICT</th>
                                    <th>PROVINCE</th>
                                    <th>ADDRESS</th>
                                    <th>REMARKS</th>
                                    <th>ATTENDENCE</th>
                                    <th>OBT MARKS</th>
                                    <th>TOTAL MARKS</th>
                                  </tr>
                              </thead>
                              <tbody id="a">
                                <?php
                                    if(!empty($appList))
                                    {
                                        foreach($appList as $list)
                                        {
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="delete_checkbox" value="<?php echo $list->ap_app_id; ?>" /></td>
                                  <td>
                                    <input type="text" name="user_cnic[]" id="uCnic" class="form-control cnicMsg uCnic" onblur="appendRow(this);" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" value="<?php if(!empty($list->user_cnic)){ echo $list->user_cnic; }?>">
                                    <input type="hidden" name="user_id[]" id="user_id" value="<?php if(!empty($list->user_id)){ echo $list->user_id; }?>">

                                  </td>
                                  <td style="width: 100px !important;">
                                    <input type="text" name="roll_no[]" class="form-control roll_no" value="<?php if(!empty($list->roll_no)){ echo $list->roll_no; }?>" >
                                     <input type="hidden" name="roll_no[]" class="form-control roll_no" value="<?php if(!empty($list->roll_no)){ echo $list->roll_no; }?>" >
                                  </td>
                                  
                                  <td>
                                    <input type="text" name="user_name[]" class="form-control user_fullname" value="<?php if(!empty($list->user_fullname)){ echo $list->user_fullname; }?>">
                                  </td>
                                  <td>
                                    <input type="text" name="user_fname[]" class="form-control user_fname" value="<?php if(!empty($list->user_father_name)){ echo $list->user_father_name; }?>">
                                  </td>
                                  <td>
                                    <input type="text" name="user_contact[]" class="form-control user_contact" value="<?php if(!empty($list->user_contact)){ echo $list->user_contact; }?>" data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="">
                                  </td>
                                  <td>
                                    <input type="email" name="user_email[]" class="form-control user_email" value="<?php if(!empty($list->user_email)){ echo $list->user_email; }?>" required>
                                  </td>
                                  <td>
                                      <input type="text" name="ar_date[]" onclick="sdDate()" class="form-control arDate" value="<?php if(!empty($list->app_received_date)){ echo $list->app_received_date; }?>" required>
                                  </td>
                                  <td>
                                    <input type="date" name="dob[]"  class="form-control " value="<?php if(!empty($list->dob)){ echo date('m/d/Y',strtotime($list->dob)); }?>">
                                  </td>
                                  <td>
                                    <select name="gender[]" class="form-control user_gender" >
                                      <option value="">-</option>
                                      <option <?php if($list->gender=='Male'){ echo 'selected'; } ?> value="Male">Male</option>
                                      <option <?php if($list->gender=='Female'){ echo 'selected'; } ?> value="Female">Female</option>
                                      <option <?php if($list->gender=='Other'){ echo 'selected'; } ?> value="Other">Other</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select name="religion[]" class="form-control user_religion" >
                                      <option value="">-</option>
                                      <option <?php if($list->religion=='Muslim'){ echo 'selected'; } ?>  value="Muslim">Muslim</option>
                                      <option <?php if($list->religion=='Christian'){ echo 'selected'; } ?>  value="Christian">Christian</option>
                                      <option <?php if($list->religion=='Jew'){ echo 'selected'; } ?>  value="Jew">Jew</option>
                                      <option <?php if($list->religion=='Sikh'){ echo 'selected'; } ?>  value="Sikh">Sikh</option>
                                      <option <?php if($list->religion=='Hindu'){ echo 'selected'; } ?>  value="Hindu">Other</option>
                                      <option <?php if($list->religion=='Other'){ echo 'selected'; } ?>  value="Other">Other</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input type="text" name="district[]" class="form-control user_district" value="<?php if(!empty($list->district)){ echo $list->district; }?>">
                                  </td>
                                  <td>
                                    <input type="text" name="province[]" class="form-control user_province" value="<?php if(!empty($list->province)){ echo $list->province; }?>">
                                  </td>
                                   <td>
                                    <input type="text" name="address[]" class="form-control user_address" value="<?php if(!empty($list->address)){ echo $list->address; }?>">
                                  </td>
                                  <td>
                                    <select name="remarks[]" class="form-control user_remarks" >
                                      <option value="">-</option>
                                      <option <?php if(!empty($list->remarks=='ELigible')){ echo 'selected'; }?> value="ELigible">ELigible</option>
                                      <option <?php if(!empty($list->remarks=='Rejected')){ echo 'selected'; }?> value="Rejected">Rejected</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input type="text" name="attendence[]" class="form-control attendence" value="<?php if(!empty($list->status=='P')){ echo 'Present'; }elseif(!empty($list->status=='A')){ echo'Absent'; } ?>" disabled>
                                    <input type="hidden" name="attendence[]" class="form-control attendence" value="<?php if(!empty($list->status)){ echo $list->status; }?>" >
                                  </td>
                                  <td>
                                    <input type="text" name="obt_mark[]" class="form-control obt_mark" value="<?php if(!empty($list->obt_marks)){ echo $list->obt_marks; }else{echo '0';}?>" disabled>
                                     <input type="hidden" name="obt_mark[]" class="form-control obt_mark" value="<?php if(!empty($list->obt_marks)){ echo $list->obt_marks; }else{ echo '0';}?>">
                                  </td>
                                   <td>
                                    <input type="text" name="ttl_mark[]" class="form-control ttl_mark" value="<?php if(!empty($prj_t_marks)){ echo $prj_t_marks; }?>" disabled>
                                     <input type="hidden" name="ttl_mark[]" class="form-control ttl_mark" value="<?php if(!empty($prj_t_marks)){ echo $prj_t_marks; }?>" >
                                  </td>

                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                                <tr>
                                   <td>
                                      <label>
                                          <input type="checkbox" onclick="checkId()"  class="minimal myCustomCheckBox ch_ID" name="app_id" value="">
                                      </label>
                                  </td>
                                  <td style="width: 100px !important;">
                                    <input type="text" name="user_cnic[]" id="uCnic" class="form-control cnicMsg uCnic" onblur="appendRow(this);" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" value="">
                                    <input type="hidden" name="user_id[]" id="user_id" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="roll_no[]" class="form-control roll_no" value="" >
                                     <input type="hidden" name="roll_no[]" class="form-control roll_no" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="user_name[]" class="form-control user_fullname" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="user_fname[]" class="form-control user_fname" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="user_contact[]" class="form-control user_contact" value="" data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="">
                                  </td>
                                  <td>
                                    <input type="email" name="user_email[]" class="form-control user_email" value="" >
                                  </td>
                                  <td>
                                    <input type="text" name="ar_date[]" onclick="sdDate()" class="form-control arDate" value="">
                                  </td>
                                  <td>
                                    <input type="date" name="dob[]"  class="form-control " value="">
                                  </td>
                                  <td>
                                    <select name="gender[]" class="form-control user_gender" >
                                      <option value="">-</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                      <option value="Other">Other</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select name="religion[]" class="form-control user_religion" >
                                      <option value="">-</option>
                                      <option value="Muslim">Muslim</option>
                                      <option value="Christian">Christian</option>
                                      <option value="Jew">Jew</option>
                                      <option value="Sikh">Sikh</option>
                                      <option value="Hindu">Other</option>
                                      <option value="Other">Other</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input type="text" name="district[]" class="form-control user_district" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="province[]" class="form-control user_province" value="">
                                  </td>
                                  <td>
                                   <input type="text" name="address[]" class="form-control user_address" value="">
                                 </td>
                                  <td>
                                    <select name="remarks[]" class="form-control user_remarks" >
                                      <option value="">-</option>
                                      <option value="Eligible">Eligible</option>
                                      <option value="Not Eligible">Not Eligible</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input type="text" name="attendence[]" class="form-control attendence" value="" disabled>
                                     <input type="hidden" name="attendence[]" class="form-control attendence" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="obt_mark[]" class="form-control obt_mark" value="" disabled>
                                     <input type="hidden" name="obt_mark[]" class="form-control obt_mark" value="" >
                                  </td>
                                   <td>
                                    <input type="text" name="ttl_mark[]" class="form-control ttl_mark" value="<?php if(!empty($prj_t_marks)){ echo $prj_t_marks; }?>" >
                                     <input type="hidden" name="ttl_mark[]" class="form-control ttl_mark" value="<?php if(!empty($prj_t_marks)){ echo $prj_t_marks; }?>" >
                                  </td>
                                </tr>
                              </tbody>
                              </table>
                                <div class="form-group"><br>
                                  <div class="form-group col-md-12">
                                    <button type="submit" name="submit"  class="btn btn-primary" data-toggle="modal" data-target="#modal-success">update</button>

                                  </form>
<div class="btn-group">
<button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
Bulk Option</button>
<ul class="dropdown-menu" role="menu">
<li>
<a  name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="applicants" data-field="app_id" class=""><i class="fa fa-trash"></i> Delete</a>
</li>
</ul>
</div>
                                  </div>
                                </div>


                 </div> 
                 

              </div>
              <!-- /.row -->
<!-- <div class="row pull-left">
<div class="col-md-12">
<div class="btn-group">
<button type="button" class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-arrow-down"></i>Bulk Option</button>
<ul class="dropdown-menu" role="menu">
<li>
 <button type="button" name="delete_all" id="delete_all" about="aboutttt" data-url="<?= base_url('Cms_ci/abt_delete_all') ?>" data-table="applicants" data-field="app_id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> bulks</button>
</li>
</ul>
</div> 
</div>
</div> --> 
              <hr>
              <div class="row pull-right">
                <div class="col-md-12">
                   <ul class="list-inline">
<!-- <li>
<a href="<?// base_url('MainContent/assignToApplicatView/'.$pr_id); ?>">
<button type="button" class="btn sm btn-info"><i class="fa fa-plus"></i> 
Add Applicant
</button>
</a>
</li> -->
<li>
<a href="<?= base_url('MainContent/prjApplicantsList/'.$pr_id); ?>">
<button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
Applicant List
</button>
</a>
</li>
<!-- <li>
<a href="<?// base_url('MainContent/AddprjApplicantsList/'.$pr_id); ?>">
<button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
Applicant List2
</button>
</a>
</li> -->

                <?php
                   // $res = $this->API_m->singleRecord('rollno',['prj_id'=>$pr_id]);

                   // if(empty($res))
                   // {
                ?>
                <li>
                  <a onclick="return confirm('Are you sure Generate Rollno list?');" href="<?= base_url('MainContent/GenerateRollNo/'.$pr_id); ?>">
                    <button type="button" class="btn sm btn-warning" ><i class="fa fa-print"></i> 
                    Generate Rollno
                    </button>
                  </a>
                </li>
                <?php
                   // }
                   // else
                   // {
                ?>
                <li>
                  <a href="<?= base_url('MainContent/prjRollnoView/'.$pr_id); ?>">
                    <button type="button" class="btn sm btn-success"><i class="fa fa-list"></i> 
                      Rollno List
                    </button>
                  </a>
               </li>
                <?php
                   // }
                ?>
                                    <?php 
                       // $rs = $this->API_m->singleRecord('attendence',['prj_id'=>$pr_id]);
                       // if(empty($rs))
                       // {
                    ?>
                     <li>
                  <a href="<?= base_url('MainContent/attendenceView/'.$pr_id); ?>">
                    <button type="button" class="btn sm btn-info"><i class="fa fa-list"></i> 
                    Attendence
                    </button>
                  </a>
                </li>
                   
                    <?php
                       // }else{
                    ?>
                     <!-- <li>
                        <a href="<?// base_url('MainContent/attendenceListView/'.$pr_id); ?>">
                      <button type="button" class="btn sm btn-info"><i class="fa fa-plus"></i> 
                         Attendence View
                      </button>
                    </a>
                </li> -->
                    <?php
                       // }
                    ?>
               
              <?php
                  // $res = $this->API_m->singleRecord('result',['prj_id'=>$pr_id]);

                  // if(empty($res))
                  // {
              ?>
              <li>
                <a href="<?= base_url('MainContent/assignResultView/'.$pr_id); ?>">
                  <button type="button" class="btn sm btn-secondary"><i class="fa fa-plus"></i> 
                   Generate Result
                  </button>
                </a>
              </li>
              <?php
               // }
               // else
               // {
              ?>
              <li>
                <a href="<?= base_url('MainContent/getPrjAppResults/'.$pr_id); ?>">
                  <button type="button" class="btn sm btn-primary"><i class="fa fa-list"></i> 
                  Result List
                  </button>
                </a>
              </li>
              <?php
               // }
              ?>
              
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
 <!--    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                Launch Success Modal
              </button> -->
  </div>
  <style type="text/css">
    .modal-dialog{vertical-align: center !important;margin-top: 150px;opacity: 0px;}
    #modal-success{background-color: rgba(0,0,0,.0001) !important;}
  </style>
  <!-- /.content-wrapper -->
<!-- loader  -->
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
  function findCnicRec(obj)
  {
    var cnic = $(obj).closest('tr').find('#uCnic').val();

    // alert(cnic);
   if(cnic!='')
   {
    $.ajax({
            type: 'post',
            dataType: 'json',
            async: false,
            data: {
                "user_cnic": cnic
            },
            url: '<?= base_url('MainContent/getUserDetail'); ?>',
            success: function (data)
            {
              // alert(data);

              if (data == null) {
    
                  $('#errMsg').html('<span class="text-danger">Record not Found!</span>');
                  $(obj).closest('tr').find('.cnicMsg').css("border", "red solid 1px");
                    $(obj).closest('tr').find('.user_id').val('');
                    $(obj).closest('tr').find('.user_fullname').val('');
                    $(obj).closest('tr').find('.user_f_name').val('');
                    $(obj).closest('tr').find('.user_email').val('');
                    $(obj).closest('tr').find('#user_id').val('');
                    // $(obj).closest('tr').find('.user_remarks').val('').change();
                    $(obj).closest('tr').find('.user_contact').val('');
                    $(obj).closest('tr').find('.user_address').val('');
                    
                } else {

                   $('#errMsg').html('<span class="text-success">Record Found!</span>');
                   $(obj).closest('tr').find('.cnicMsg').css("border", "green solid 1px");
                    $(obj).closest('tr').find('.user_id').val('');
                    $(obj).closest('tr').find('.user_fullname').val(data.user_fullname);
                    $(obj).closest('tr').find('.user_f_name').val(data.user_father_name);
                    $(obj).closest('tr').find('.user_email').val(data.user_email);
                    // $(obj).closest('tr').find('#kt_select2_4').trigger('change');
                    $(obj).closest('tr').find('#user_id').val(data.user_id);
                    $(obj).closest('tr').find('.user_contact').val(data.user_contact);
                    $(obj).closest('tr').find('.user_address').val(data.user_address);
                    // $('#kt_select2_4').val(data.usercompnayid);
                    
                }
          
            }
        });
     } 
     else
     {
         $('#errMsg').html('<span class="text-danger">CNIC must not be empty!</span>');
         $(obj).closest('tr').find('.cnicMsg').css("border", "red solid 1px");
     }
  }
</script>
