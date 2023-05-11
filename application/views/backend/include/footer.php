<?php
  $adminData = $this->API_m->singleRecord("settings",['company_id'=>2]);


// chart queries dashboard2.js 
  $getPrj        = $this->Project_m->getCurrentMonthPrj(); 
  $getApplicants = $this->Project_m->getCurrentMonthApplicants(); 

?>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.13 -->
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?><a href="<?php echo base_url('Job/index');?>">
      <?php 
       if(!empty($adminData->company_name))
        { 
          echo $adminData->company_name; 
        } 
      ?>
        
      </a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('back_asset/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('back_asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('back_asset/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('back_asset/dist/js/adminlte.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('back_asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url('back_asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?php echo base_url('back_asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('back_asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('back_asset/bower_components/chart.js/Chart.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('back_asset/dist/js/pages/dashboard2.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('back_asset/dist/js/demo.js');?>"></script>
<script src="<?php echo base_url('back_asset/bower_components/ckeditor/ckeditor.js');?>"></script>
<script src="<?php echo base_url('back_asset/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
<script src="<?php echo base_url('back_asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>

<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>

<script src="<?php echo base_url('back_asset/plugins/timepicker/bootstrap-timepicker.js');?>"></script>
<script src="<?php echo base_url('back_asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('back_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script src="<?php echo base_url('back_asset/bower_components/ckeditor/ckeditor.js');?>"></script>


<!-- start js code for multiple check to assign test center for multiple applicant -->
<script>

    $(document).ready(function () {
$(".artoday").datepicker().datepicker("setDate", new Date());

        $('.chAll').click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
            checkId();
            AttChecks();
            // alert();

        });

    });

  function AttChecks()
  {
var check_id = 0;
var rollno   = 0;
var userid   = 0;
var atten    ='';
var testDate ='';
        var html = '';
        $('.myCustomCheckBox').each(function () {
            if ($(this).is(':checked'))
            {
                check_id = $(this).val();
                rollno   = $(this).closest('tr').find('.roll_no').val();
                userid   = $(this).closest('tr').find('.user_id').val();
                atten    = $(this).closest('tr').find('.atten').find('option:selected').val();
                testDate = $(this).closest('tr').find('.testDate').val();
                // alert(rollno);
                // alert(check_id);
                // alert(atten);
                // alert(userid);
                // alert(testDate);
                html += '<input type="hidden" class="Checkd_id" id="Checkd_id" name="app_id[]" value="' + check_id + '">'
                // $('#Checkd_id').val(check_id);

                $('.attCheckForm').html(html);
            }


        });
        // $('#Checkd_id').val(check_id);
    }

    function checkId()
    {
        var check_id = 0;
        var html = '';
        $('.myCustomCheckBox').each(function () {
            if ($(this).is(':checked'))
            {
                check_id = $(this).val();
                // alert(check_id);
                html += '<input type="hidden" class="Checkd_id" id="Checkd_id" name="app_id[]" value="' + check_id + '">'
                // $('#Checkd_id').val(check_id);

                $('.AppModal').html(html);
            }


        });
        // $('#Checkd_id').val(check_id);
    }
        
$('.mdBtn').click(function(){
 var app_id = $('.Checkd_id').val();
    // alert(app_id);
    // alert($(this).attr('data-toggle'));
    if(app_id==undefined)
    {
      // $(this).attr('data-toggle');
      alert('Please check one/more applicants!');
    }
    else
    {
      $("#myModalInsert").modal();

      // $(this).removeAttr('data-toggle');
    }
   
  });
</script>
<!-- end js code for multiple check to assign test center for multiple applicant -->
<?php
$prj_t_marks='';
if($this->uri->segment(2)=='AddprjApplicantsList')
{
 $res         = $this->API_m->singleRecord('projects',['prj_id' => $this->uri->segment(3)]);
 // $prj_name    = $res->prj_name;
 $prj_t_marks = $res->prj_total_marks;
 }
?>

<!-- appending new row -->
<script>
  // setTimeout(function(){ 
  //     $('.alert').hide(1000);
  //  }, 3000);
  // $(document).on('blur','.appendRow',function);
      function appendRow(obj) { // this function is used to append row to payment voucher
// alert('jkj');
    var count = 0;
    $('#a').find('tr').each(function(){
      // alert($(this).find('input:first').val());
      // $(this).find('input:firstuCnic').val()
       if($(this).find('.uCnic').val()=='')
       {
          count=1;
       }
    });
    
        var data = '';
        data += `<tr>
                  <td>
                    <label>
                        <input type="checkbox" onclick="checkId()"  class="minimal myCustomCheckBox ch_ID" name="app_id" value="">
                    </label>
                </td>
                <td>
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
              </tr>`;
      
      // console.log(data);
                 findCnicRec(obj);

        if(count==0)
        {
            $('#a').append(data);
        }
        $('.datepicker').datepicker({
                // autoclose: true,
                // startDate: new Date()
              });
        // $(".artoday").datepicker("setDate", new Date());
        $('[data-mask]').inputmask();

    }



function removeRow(obj) {
      if(confirm('are you sure want to remove this?') == true){
     
       $(obj).parent().parent().remove();
       
       }
   }

</script>


<!-- Finding User Record Through CNIC -->

<script>

   function edDate()
   {
     // alert($('.eDate').val());
     var sd = $('.eDate').val();

    // $('.tstDate').datepicker("destroy");
    $('.tstDate').datepicker({
      autoclose: true,
      startDate: new Date(sd)
    });
   }
   function sdDate()
   {
     // alert($('.eDate').val());
     var ed = $('.eDate').val();
     var sd = $('.sDate').val();
    // $('.tstDate').datepicker("destroy");
    $('.arDate').datepicker({
      autoclose: true,
      // setDate  : new Date(),
      startDate: new Date(sd),
      endDate:   new Date(ed)
    });
   }

   function base_url()
   {
      return '<?php echo base_url();  ?>';
   }

   function strtDate(obj)
   {
     // alert($(obj).val());
     // var sd = $(obj).val();
    $('.endDate').datepicker("destroy");
    $('.endDate').val('').datepicker({
      autoclose: true,
      startDate: new Date($(obj).val())
    });
   }

</script>
  <script>

$(document).ready(function(){

   $('.select2').select2();
   
    $('.datepicker').datepicker({
                autoclose: true,
                startDate: new Date()
              });
 $('.timepicker').timepicker({
      showInputs: false
    });
  $('[data-mask]').inputmask();

   $('[data-toggle="tooltip"]').tooltip();

});
</script>
<!-- <script type="text/javascript">
          $(document).ready(function() {
         $('.select2').select2();
         CKEDITOR.replace('editor1');
});
</script> -->

<!--    <script>
    $(function(){

        CKEDITOR.replace( 'editor1' );
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['editor1'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please enter a message' );
                e.preventDefault();
            }
        });
           });
    </script> -->


    <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

   <!------------------------------------- Start jquery  Delete project Imge --------------------------------------------->
<script type='text/javascript'>
    $(document).ready(function()
    {
      //alert('ysee');
        $(".deleteImg").click(function(e){
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                 //$this.parent().parent().remove();
                // $this.parent().parent().removeAttr('src');​
                 $this.parent().remove();
                //$this.parent().parent().removeAttr('src').replaceWith($image.clone());
               
                
            })
        });
    });
</script>

 <!-------------------------------------End jquery  Delete project Imge  --------------------------------------------->

    <!------------------------------------- Start jquery  Delete organization --------------------------------------------->
<script type='text/javascript'>
    $(document).ready(function()
    {
      //alert('ysee');
        $(".deleteClass").click(function(e){
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                 $this.parent().parent().remove();
                
                 //$this.parent().remove();
                
               
                
            })
        });
    });
</script>


<script>
  // $(function () {
  //   $('#tbl-contact').DataTable()
  //   $('#tbl-org').DataTable()
  //   $('#tbl-prj').DataTable()
  //   $('#tbl-nu').DataTable()
  //   $('#tbl-abt').DataTable()
  //   $('#tbl-user').DataTable({
  //     'paging'      : true,
  //     'lengthChange': false,
  //     'searching'   : false,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : false,
  //     'order'       : [[0, 'desc']],
  //   })
  // })

   $(function () 
   {
    $('.data-tbl').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order'       : [[1, 'desc']],
       'dom'        : 'Bfrtipl',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', 
            {
                extend: 'print',
                exportOptions: 
                {
                    columns: [ 0,1,2,3,4,5,6,7 ]
                }
            }
        ]
    });
// dataTable for applicants add/update views
$('.Appdata-tbl').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      // 'order'       : [[1, 'desc']],
       'dom'        : 'Bfrtipl',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7 ]
                }
            }
        ]
    });
  });
</script>

 <!-------------------------------------End jquery  Delete organization  --------------------------------------------->

<script type="text/javascript">
  $(document).on('keyup', '.oldPassword', function () {
   var obj = $(this);
   var oldPassword = obj.val();
   // alert(oldPassword);
   var label = $('.oldPasswordLabel');
   var btn = $('.updatePasswordBTN');
   $.ajax({
       type: 'post',
       dataType: 'json',
       data: {'oldPassword': oldPassword},
       url:'<?= base_url("MainContent/verifiedOldPassword");?>',
       success: function (data)
       {
         // alert(data);
           if (data == 0)
           {
               obj.css('border-color', 'red');
               label.css('color', 'red');
               label.text('old password is incorrect !');
               btn.attr('disabled', true);
           } else
           {
               obj.css('border-color', 'green');
               label.css('color', 'green');
               label.text('Old Password is correct.');
               btn.removeAttr('disabled');
           }
       },
       error: function ()
       {
           alert('ajax call error');
       }
   });
});
</script>


<script type="text/javascript">
  $(document).on('keyup', '.CustomeroldPassword', function () {
   var obj = $(this);
   var oldPassword = obj.val();
   // alert(oldPassword);
   var label = $('.CustomeroldPasswordLabel');
   var btn = $('.CustomerupdatePasswordBTN');
   $.ajax({
       type: 'post',
       dataType: 'json',
       data: {'CustomeroldPassword': oldPassword},
       url:'<?= base_url("Customer/verifiedOldPassword");?>',
       success: function (data)
       {
         // alert(data);
           if (data == 0)
           {
               obj.css('border-color', 'red');
               label.css('color', 'red');
               label.text('old password is incorrect !');
               btn.attr('disabled', true);
           } else
           {
               obj.css('border-color', 'green');
               label.css('color', 'green');
               label.text('Old Password is correct.');
               btn.removeAttr('disabled');
           }
       },
       error: function ()
       {
           alert('ajax call error');
       }
   });
});
</script>


<!----------------------------start code for multiple delete About---------------------------->

<script>
$(document).ready(function()
{

  $('.delAll').click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
        // $('input:checkbox').prop('checked', this.checked).addClass('removeRow');
        // $('input:checkbox').closest('.ttr').addClass('removeRow');
        // $('.removeRow').fadeOut(1500);
          // window.reload();
        // checkId();
        // alert();

    });

       $('.delete_checkbox').click(function()
        {
          
          if($(this).is(':checked'))
          {
           $(this).closest('tr').addClass('removeRow');
          }
          else
          {
           $(this).closest('tr').removeClass('removeRow');
          }
        });
 

      $('#delete_all').click(function()
       {
           var url    = $(this).attr('data-url'); 
           var table  = $(this).attr('data-table'); 
           var field  = $(this).attr('data-field'); 
          if(confirm('Are you sure to delete the following?') == true)
           {
                var checkbox = $('.delete_checkbox:checked');
                var num= 1;
                if(checkbox.length > 0)
                {
                    var checkbox_value = [];
                     $(checkbox).each(function()
                     {
                       checkbox_value.push($(this).val());
                     });

       
                    $.ajax
                     ({
                       url:url,
                       method:"POST",
                       data:{checkbox_value:checkbox_value,'table':table,'field':field},
                        success:function()
                         {
                          $('.removeRow').fadeOut(1500);
                           location.reload(true);
                         }
                      });
                  }
                  else
                   {
                       alert('Select atleast one records');
                   }
            }       
        });
});
</script>

<!----------------------------End code for multiple delete---------------------------->


<!-------------------------  start Show Data in Model using Jaquey ----------------------------->

  <script type="text/javascript">
      $(document).ready(function(){
         $(document).on('click','.btn_edit',function(){
           
             var center_name = $(this).attr('center_name');
             var address = $(this).attr('address');
             var contact = $(this).attr('contact');
             var pContact = $(this).attr('person_contact');

             $('.testData').find('td:nth-child(1)').text(center_name);
             $('.testData').find('td:nth-child(2)').text(address);
             $('.testData').find('td:nth-child(3)').text(contact);
             $('.testData').find('td:nth-child(4)').text(pContact);
             

         });
      });
 </script>




<!------------------------- End  Show Data in Model using Jaquey ----------------------------->

<script>
   // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------
  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas);

  var salesChartData = 
  {
    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September','October', 'November','December'],
    datasets: [
      {
        label               : 'Projects',
        fillColor           : 'rgb(210, 214, 222)',
        strokeColor         : 'rgb(210, 214, 222)',
        pointColor          : 'rgb(210, 214, 222)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgb(220,220,220)',
        data                : 
        [
 <?php echo implode(',', $getPrj); ?>

        ]
      },
      {
        label               : 'Applicants',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : 
        [
 <?php echo implode(',', $getApplicants); ?>
        ]
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale               : true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    // String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    // Boolean - Whether the line is curved between points
    bezierCurve             : true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot                : false,
    // Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    // String - A legend template
    legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  };

  // Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  // ---------------------------
  // - END MONTHLY SALES CHART -
  // ---------------------------

</script>



</body>
</html>