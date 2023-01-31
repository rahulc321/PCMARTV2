 
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
 
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
 
<?php error_reporting(0); ?>
<!-- users list start -->
<style type="text/css">
  
   .addBtn{
   border-color: #23BD70 !important;
   background-color: #39DA8A !important;
   color: #FFFFFF;
   margin-bottom: 30px;
   }
   form#form2 {
   margin-left: 11px;
   }
   table.dataTable tbody th, table.dataTable tbody td {
   padding: 5px 3px !important;
   }
   form#form2 {
   margin-left: 11px;
   padding-top: 13px;
   padding-left: 10px;
   }
   .vertical-layout.vertical-menu-modern.menu-expanded .footer {
   margin-left : 0px !important;
   }
</style>
 
<section class="users-list-wrapper">
 
<div class="users-list-table">
   <section class="users-list-wrapper">
      
      <div class="users-list-table">
         <div class="card">
            <div class="card-body">
               <?php $module='customer_subscription_add'; ?>
               @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1 )
               <!--a class="btn btn-success addBtn" href="{{url('/app/customer-subscription-create')}}" style="float: right;">Add Subscription</a-->
               @endif
               <br>
               <br>
               @if (count($errors) > 0)
               <div class="alert alert-success">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <!-- datatable start -->
               <div class="col-lg-12">
                  <div class="ibox float-e-margins">
                     <div class="ibox-title">
                     </div>
                     <div class="form>">
                        <div class="form-group" style="float: left;">
                           <label>Status</label>
                           <select class="form-control status" id="invoice" style="width:106px">
                              <option value="">--Select--</option>
                              <option value="0">Active</option>
                              <option value="1">Renew</option>
                              <option value="2">Agree</option>
                              <option value="3">Cancel</option>
                           </select>
                        </div>
                         <?php //echo '<pre>';print_r($invoicesU); ?>
                        <div class="form-group" style="float: left;width:106px;margin-left: 10px">

                           <label>Invoice</label>
                           <select class="form-control status" id="customer" style="">
                              <option value="">--Select--</option>
                              @foreach($invoicesU as $prodcuct)
                              <option value="{{$prodcuct['invoice']}}">{{$prodcuct['invoice']}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                           <label>Type</label>
                           <select class="form-control status" id="type" style="">
                              <option value="">--Select--</option>
                              @foreach($Support_TypeU as $support)
                              <option value="{{$support->code}}">{{$support->code}}</option>
                              @endforeach
                           </select>
                        </div>
                        <!-- <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                           <label>Value</label>
                           <select class="form-control status" id="value" style="width:106px">
                           <option value="">--Select--</option>
                             
                             <option value="999">< 999</option>
                             <option value="1000-1999">1000-1999</option>
                             <option value="2000-2999">2000-2999</option>
                             <option value="3000-3999">3000-3999</option>
                             <option value="4000">> 4000</option>
                              
                           </select>
                           </div> -->
                        <div class="form-group hide" style="float: left;width:125px;margin-left: 10px">
                           <label>From</label>
                           <input type="text" class="form-control" id="startDate">
                        </div>
                        <div class="form-group hide"  style="float: left;width:125px;margin-left: 10px">
                           <label>To</label>
                           <input type="text" id="endDate" class="form-control">
                        </div>
                        <?php $currentURL = url()->full(); ?>
                        <div class="form-group jj">
                           <label></label>
                           <button type="button" class="btn btn-success submit" style="    margin-top: 23px;"><i class="bx bx-search-alt-2"></i></button>
                           <a href="{{ $currentURL }}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                        </div>
                     </div>
                     <div class="table-responsive">
                        <table id='empTable3' class="table" style="width: 100%">
                           <thead>
                              <tr>
                                 <th>Invoice</th>
                                 <th style="width: 273px;">Customer</th>
                                 <th >Code</th>
                                 <th style="width: 134px;">SNO</th>
                                 <th>User</th>
                                 <th>Value</th>
                                 <th>Expire</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- datatable ends -->
         </div>
      </div>
      </section>
</div>
</section>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
   <!-- users list ends -->
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
 
 
   <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>
 
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart4);
      
            function drawChart4() {
          
            var data = google.visualization.arrayToDataTable([
             ['Task', 'Hours per Day'],
             <?php foreach ($arrayChart as $key => $value) { ?>
               
             ['<?=$value['name']?>', <?=$value['sum']?>],
              
              <?php } ?>
              
           ]);
         
           var options = {
            // title: 'Users',         
              pieHole: 0.55,
               legend: 'none',
              //legend:{position: 'bottom'},
              
              width:'100%',
             // height:390,
      
             
             pieSliceTextStyle:{
               fontSize:10
             },
             
             chartArea:{left:15,top:0,width:'100%',height:'100%'},                  
           slices: {0:{color: '#ed5565'}, 1:{color: '#f8ac59'}, 2: {color: '#23c6c8'}}
           };
         
           var chart = new google.visualization.PieChart(document.getElementById('chart3'));
           chart.draw(data, options);
         }
             
      
      
      
      
      
      
      
      
      
      
              $(document).ready(function () {
            
                $('.typeww').change(function(){
                $('#form2').submit();
                });
                $('.typeww1').change(function(){
                $('#form2').submit();
                });
      
      
                  var $primary = '#5A8DEE',
                  $success = '#39DA8A',
                  $danger = '#FF5B5C',
                  $warning = '#FDAC41',
                  $info = '#39DA8A',
                  $label_color_light = '#39DA8A';
      
                  var themeColors = [$primary, $info, $danger, $success, '#39DA8A'];
      
                   // Column Chart
        // ----------------------------------
        var columnChartOptions = {
          chart: {
            height: 350,
            type: 'bar',
          },
          colors: themeColors,
          plotOptions: {
            bar: {
              horizontal: false,
              endingShape: 'rounded',
              columnWidth: '55%',
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          series: [
      
          {name: 'Last 3 Year',
            /// color:'#39DA8A',
            data: [<?=$lst3Year[0]?>,<?=$lst3Year[1]?>,<?=$lst3Year[2]?>,<?=$lst3Year[3]?>,<?=$lst3Year[4]?>,<?=$lst3Year[5]?>,<?=$lst3Year[6]?>,<?=$lst3Year[7]?>,<?=$lst3Year[8]?>,<?=$lst3Year[9]?>,<?=$lst3Year[10]?>,<?=$lst3Year[11]?>]
          },
      
          {name: 'Last Year',
            /// color:'#39DA8A',
            data: [<?=$sold[0]?>,<?=$sold[1]?>,<?=$sold[2]?>,<?=$sold[3]?>,<?=$sold[4]?>,<?=$sold[5]?>,<?=$sold[6]?>,<?=$sold[7]?>,<?=$sold[8]?>,<?=$sold[9]?>,<?=$sold[10]?>,<?=$sold[11]?>]
          }, {
            name: 'Current Year',
            color:'#007F64',
            data: [<?=$purchased[0]?>,<?=$purchased[1]?>,<?=$purchased[2]?>,<?=$purchased[3]?>,<?=$purchased[4]?>,<?=$purchased[5]?>,<?=$purchased[6]?>,<?=$purchased[7]?>,<?=$purchased[8]?>,<?=$purchased[9]?>,<?=$purchased[10]?>,<?=$purchased[11]?>]
          }],
          legend: {
            offsetY: 8
          },
          xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
          },
          yaxis: {
            title: {
              text: ''
            }
          },
          fill: {
            opacity: 1
      
          },
          tooltip: {
            y: {
              formatter: function (val) {
                return "" + val + ""
              }
            }
          }
        }
        var columnChart = new ApexCharts(
          document.querySelector("#column-chart"),
          columnChartOptions
        );
      
        columnChart.render();
              })
          
   </script>
   <script type="text/javascript">
      $(function () {
        $.noConflict();
             // $("#startDate").datepicker({
             //     maxDate: 0,
             //     onClose: function (selectedDate) {
             //         $("#endDate").datepicker("option", "minDate", selectedDate);
             //     }
             // });
             // $("#endDate").datepicker({
             //     maxDate: 0,
             //     onClose: function (selectedDate) {
             //         $("#startDate").datepicker("option", "maxDate", selectedDate);
             //     }
             // });
             var startDate;
             var endDate;
              $( "#startDate" ).datepicker({
             dateFormat: 'dd-mm-yy'
             })
             ///////
             ///////
              $( "#endDate" ).datepicker({
             dateFormat: 'dd-mm-yy'
             });
             ///////
             $('#startDate').change(function() {
             startDate = $(this).datepicker('getDate');
             $("#endDate").datepicker("option", "minDate", startDate );
             })
      
      
       });
      
      
      
      $(document).ready(function(){
       $( "#datepicker" ).datepicker();
       // DataTable
       var oTable = $('#empTable3').DataTable({
      
          processing: true,
          serverSide: true,
           ajax: {
             url: "{{url('/app/customer-subscription')}}",
      
      
             data: function(d){
               d.searchUser = "{{$edit->Organization_Name}}";
              d.invoice = $('#invoice option:selected').val();
             d.customer = $('#customer option:selected').val();
              d.type = $('#type option:selected').val();
             d.startDate = $('#startDate').val();
             d.endDate = $('#endDate').val();
            // d.value = $('#value').val();
             }
      
      
         },
          columns: [
             { data: 'invoice' },
             { data: 'customer_id' },
             { data: 'account_code' },
             { data: 'sno_number' },
             { data: 'user' },
             { data: 'total_price' },
             { data: 'expire' },
              
             { data: 'btn' },
             
             
      
          ],
      
      
          "order": [[ 6, "DESC" ]],
          "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     // console.log(aData.id);
                     $('td:eq(4)', nRow).css('text-align', 'center');
                     $('td:eq(5)', nRow).css('text-align', 'center');
                     var id=  aData.id;
                        // $('td:eq(6)', nRow).html('');
                         styleEdit = 'display:none';
                         styleDelete = 'display:none';
                         if(aData.editDataC==1){
                           styleEdit = '';
                           /* $('td:eq(6)', nRow).append("<a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>"); */
                         }
      
                         if(aData.deleteDataC==1){
                           styleDelete ='';
                           /* $('td:eq(6)', nRow).append("<a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='float: left !important;'><i class='bx bx-trash-alt' ></i></a>"); */
                         }
      
                         
                     if(aData.checkStatus==1){
                          
                         $('td:eq(0)', nRow).css('color', 'green');
                         $('td:eq(1)', nRow).css('color', 'green');
                         $('td:eq(2)', nRow).css('color', 'green');
                         $('td:eq(3)', nRow).css('color', 'green');
                         $('td:eq(4)', nRow).css('color', 'green');
                         $('td:eq(5)', nRow).css('color', 'green');
      
                         $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a> ");
      
                     }else if(aData.checkStatus==2){
                          
                         $('td:eq(0)', nRow).css('color', '#d86400');
                         $('td:eq(1)', nRow).css('color', '#d86400');
                         $('td:eq(2)', nRow).css('color', '#d86400');
                         $('td:eq(3)', nRow).css('color', '#d86400');
                         $('td:eq(4)', nRow).css('color', '#d86400');
                         $('td:eq(5)', nRow).css('color', '#d86400');
      
                         $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/customer-subscription/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/customer-subscription/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a> ");
      
                         
      
                     }else if(aData.checkStatus==3){
                          
                         $('td:eq(0)', nRow).css('color', '#c7c1c1');
                         $('td:eq(1)', nRow).css('color', '#c7c1c1');
                         $('td:eq(2)', nRow).css('color', '#c7c1c1');
                         $('td:eq(3)', nRow).css('color', '#c7c1c1');
                         $('td:eq(4)', nRow).css('color', '#c7c1c1');
                         $('td:eq(5)', nRow).css('color', '#c7c1c1');
      
                         $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a>  ");
      
                     }else{
                       $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/customer-subscription/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/customer-subscription/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/customer-subscription/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a>  ");
                     }
                     if(aData.dueDateColor==1){
                          
                         $('td:eq(6)', nRow).css('color', 'Red');
                       }
                 }
       });
      
      
       //oTable.ajax.reload();
       $(document).on('click','.submit',function(){
         
       oTable.draw();
       });
      });
      
      
      
      
      
      
             $(document).on('click','.confirmDelete',function(){
                 return confirm('Are you sure want to delete?');
             });
      
      
             $("#selectAll").click(function() {
                 $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
             });
      
             $("input[type=checkbox]").click(function() {
                 if (!$(this).prop("checked")) {
                 $("#selectAll").prop("checked", false);
             }
             });
             
   </script> 
   </script>
   <script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
 