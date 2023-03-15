<?php
 $res =   $this->API_m->singleRecord('projects',['prj_id' => $this->uri->segment(3)]);
 $prj_name = $res->prj_name;

// print_r($res);
// exit();
?>




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
                  
                      
                      
                        <form action="<?php echo base_url('MainContent/insertApplicants'); ?>" method="post">
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
        <input type="text" class="form-control pull-right  tstDate" name="test_date" onclick="edDate()" required>
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
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <span id="errMsg"></span>
                                    <th>CNIC</th>
                                    <th>NAME</th>
                                    <th>FATHER NAME</th>
                                    <th>CONTACT</th>
                                    <th>EMAIL</th>
                                    <th>AR DATE</th>
                                    <th>CITY</th>
                                  </tr>
                              </thead>
                              <tbody id="a">
                                <tr>
                                  <td>
                <div class="input-group">
                  <input type="text" name="user_cnic[]" id="uCnic" class="form-control cnicMsg" onblur="appendRow(this);" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="">
                  <div class="input-group-addon">
                    <span id="faIcon"><i class="fa fa-exclamation-circle text-danger"></i></span>
                  </div>
                </div>
                                <input type="hidden" name="user_id[]" id="user_id" value="">

                                  </td>
                                  <td>
                                    <input type="text" name="user_name[]" class="form-control user_fullname" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="user_f_name[]" class="form-control user_f_name" value="">
                                  </td>
                                  <td>
                                    <input type="text" name="user_contact[]" class="form-control user_contact" value="" data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="" required>
                                  </td>
                                  <td>
                                    <input type="email" name="user_email[]" class="form-control user_email" value="" required>
                                  </td>
                                  <td>
                                    <input type="text" name="ar_date[]" onclick="sdDate()" class="form-control arDate" value="" required>
                                  </td>
                                   <td>
                                    <input type="text" name="address[]" class="form-control user_address" value="">
                                  </td>
                                </tr>
                                
                              </tbody>
                              </table>
                                <div class="form-group"><br>
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

<script>
   // alert();
  function findCnicRec(obj)
  {
    var cnic = $(obj).closest('tr').find('#uCnic').val();
   $('#faIcon').hide();
     
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
                  $('#faIcon').show();
                  // $('.cnicMsg').css({"border-Color":"red"});
                  $(obj).closest('tr').find('.cnicMsg').css("border", "red solid 1px");

                    $(obj).closest('tr').find('.user_id').val('');
                    $(obj).closest('tr').find('.user_fullname').val('');
                    $(obj).closest('tr').find('.user_f_name').val('');
                    $(obj).closest('tr').find('.user_email').val('');
                    $(obj).closest('tr').find('#user_id').val('');
                    // $(obj).closest('tr').find('#kt_select2_4').val('').change();
                    $(obj).closest('tr').find('.user_contact').val('');
                    $(obj).closest('tr').find('.user_address').val('');
                    
                } else {

                   $('#errMsg').html('<span class="text-success">Record Found!</span>');
                   $('#faIcon').hide();
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
