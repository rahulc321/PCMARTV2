@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Subscription List')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@section('content')
<?php error_reporting(0); ?>
<!-- users list start -->
<style type="text/css">
  i.bx.bx-trash-alt {
    color: red;
}
.btn-danger {
    border-color: #FF2829 !important;
    background-color: #FF5B5C !important;
    color: #FFFFFF;
    padding: 2px;
}
span.bx.bx-dots-vertical-rounded.font-medium-3.dropdown-toggle.nav-hide-arrow.cursor-pointer {
    float: left;
}
.btn {
    display: inline-block;
    font-weight: 400;
    color: #727E8C;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 0 solid transparent;
    /* padding: 0.467rem 1.5rem; */
    font-size: 1rem;
    line-height: 1.6rem;
    border-radius: 0.267rem;
    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    padding: 7px !important;
}
 
.col-xl-2 {
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 16.66667%;
    -ms-flex: 0 0 16.66667%;
    flex: 2 0 16.66667%;
    max-width: 20.66667%;
}
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
  <div class="users-list-filter px-1">
     
  </div>
  <div class="users-list-table">
  <section id="widgets-Statistics">
  
  <div class="row">
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Subscription</p>
          <h2 class="mb-0"><span class="activecont1">{{$totalCount}}</span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
            <i class="bx  bx-money"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Subscription $</p>
          <h2 class="mb-0"><span class="agree4">{{round($totalValue)}}</span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <?php
      //$a = 'How are you?';

      if (strpos($totalPercentage, '-') !== false) {
          $valueTotal1='<span class="trtr" style="font-size: 12px;color:red">('.number_format($totalPercentage,2).'%)</span>';
      }else{
        $valueTotal1='<span class="trtr" style="font-size: 12px;color:green">(+'.number_format($totalPercentage,2).'%)</span>';
      }

     ?>
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bx-check"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis"><span style="color:green"><?=date('F')?></span> Subscription</p>
          <h2 class="mb-0"><span class="cancell1">{{$renewCount}} <?php  echo str_replace('.00','',$valueTotal1) ?></span></span></h2>


        </div>
      </div>
    </div>
    <?php
      //$a = 'How are you?';

      if (strpos($totalvaluePer, '-') !== false) {
          $valueTotal='<span class="trtr" style="font-size: 12px;color:red">('.number_format($totalvaluePer,2).'%)</span>';
      }else{
        $valueTotal='<span class="trtr" style="font-size: 12px;color:green">(+'.number_format($totalvaluePer,2).'%)</span>';
      }

     ?>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
            <i class="bx bx-money font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis"><span style="color:green"><?=date('F')?></span> Subscription $</p>
          <h2 class="mb-0"><span class="expire2">{{round($renewValue)}} <?php  echo str_replace('.00','',$valueTotal) ?></span></h2>
        </div>
      </div>
    </div>
    <?php 


  

// First array for purchased product 
$purchased= $currentYear;

// Second array for sold product 
$sold= $lastYear; 

// Data to draw graph for purchased products 
$currentYear = array( 
  array("label"=> "Jan", "y"=> $purchased[0]), 
  array("label"=> "Feb", "y"=> $purchased[1]), 
  array("label"=> "Mar", "y"=> $purchased[2]), 
  array("label"=> "Apr", "y"=> $purchased[3]), 
  array("label"=> "May", "y"=> $purchased[4]), 
  array("label"=> "Jun", "y"=> $purchased[5]), 
  array("label"=> "Jul", "y"=> $purchased[6]), 
  array("label"=> "Aug", "y"=> $purchased[7]), 
  array("label"=> "Sep", "y"=> $purchased[8]), 
  array("label"=> "Oct", "y"=> $purchased[9]), 
  array("label"=> "Nov", "y"=> $purchased[10]), 
  array("label"=> "Dec", "y"=> $purchased[11]) 
); 

// Data to draw graph for sold products 
$dataPoints = array( 
  array("label"=> "Jan", "y"=> $sold[0]), 
  array("label"=> "Feb", "y"=> $sold[1]), 
  array("label"=> "Mar", "y"=> $sold[2]), 
  array("label"=> "Apr", "y"=> $sold[3]), 
  array("label"=> "May", "y"=> $sold[4]), 
  array("label"=> "Jun", "y"=> $sold[5]), 
  array("label"=> "Jul", "y"=> $sold[6]), 
  array("label"=> "Aug", "y"=> $sold[7]), 
  array("label"=> "Sep", "y"=> $sold[8]), 
  array("label"=> "Oct", "y"=> $sold[9]), 
  array("label"=> "Nov", "y"=> $sold[10]), 
  array("label"=> "Dec", "y"=> $sold[11]) 
); 
  
?> 

     
    <div class="col-xl-8 col-md-4 col-sm-6">
        
      <div class="card">
        <form action="{{url('/app/customer-subscription-list')}}" id="form2" method="post">
        @csrf
          <div class="form-group" style="float: left;">
          <label>Year</label>
          <select class="form-control typeww" style="width: 100%" name="month">
            <option value="">--Select--</option>
            @foreach($invoice_date2 as $invoice_dateDate)
            <option value="{{$invoice_dateDate}}" <?php if($invoice_dateDate==@$_REQUEST['month']){ echo 'selected'; } ?>>{{$invoice_dateDate}}</option>
            @endforeach
          </select>
          </div>

          <div class="form-group">
          <label>Type</label>
          <select class="form-control typeww1" style="width: 16%" name="typeww">
            <option value="">--Select--</option>
            @foreach($Support_Type as $support)
            <option value="{{$support->code}}" <?php if($support->code==@$_REQUEST['typeww']){ echo 'selected'; } ?>>{{$support->code}}</option>
            @endforeach
          </select>
          </div>
<!--           <input type="submit" value="Submit"> -->
        </form>
        <div class="card-body">
           <div id="column-chart" style="height: 300px; width: 100%;"></div>
        </div>
      </div>
    </div>

    <!-- <div class="col-xl-4 col-md-4 col-sm-6">

      <div id="chart3"></div>
    </div> -->

    <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Subscription Category</h4>
         <!--  <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i> -->
        </div>
        <div id="chart3"></div>
        <div class="card-body ff">
        <style type="text/css">
          
            .col-sm-2 {

            max-width: 49.66667%;
            }
            .card-body.ff {
            height: 212px;
            padding-top: 67px;
            }
            .dot {
            height: 12px;
            width: 11px;
            /* background-color: #bbb;*/
            border-radius: 59%;
            display: inline-block;
            /* padding-top: 18px; */
            margin-top: 0px;
            }
            div#chart3 {
            margin-top: 29px;
            }
        </style>
        <?php foreach ($arrayChart as $key => $value) {
          $back='';
          if($key==0){
            $back="#e45364";
          }elseif($key==1){
            $back="#f0ac58";
          }elseif($key==2){
            $back="#67c7c9";
          }elseif($key==3){
            $back="#52971c";
          }elseif($key==4){
            $back="#9c4199";
          }else{
            $back="#9c4199";
          }

          ?>

               
              <div class="col-sm-2" style="float: left;"><span style="background-color: <?=$back?>;" class="dot"></span> <span style="font-size: 12px;"><?=$value['name']?></span></div>

        <?php   } ?>
          
            
           
          
          <!-- <div id="chart2" style="height: 200px; width: 100%;"></div> -->
          <!-- <ul class="list-inline text-center mt-1 mb-0">
            <li class=""><span class="bullet bullet-xs" style="background: #7cbe88"></span> < 1/2</li>
            <li class=""><span class="bullet bullet-xs bullet-danger"></span></li>
            <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
          </ul> -->
        </div>
      </div>
    </div>
     
  </div>
</section>

<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
     
  </div>
  <div class="users-list-table">
   
<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
    <form>
     <!--  <div class="row border rounded py-2 mb-2">
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-verified">Verified</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-verified">
              <option value="">Any</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-role">Role</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-role">
              <option value="">Any</option>
              <option value="User">User</option>
              <option value="Staff">Staff</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-status">Status</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-status">
              <option value="">Any</option>
              <option value="Active">Active</option>
              <option value="Close">Close</option>
              <option value="Banned">Banned</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
          <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</button>
        </div>
      </div> -->
    </form>
  </div>
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

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Invoice</label>
                            <select class="form-control status" id="customer" style="">
                            <option value="">--Select--</option>
                              @foreach($subscription as $prodcuct)
                              <option value="{{$prodcuct->invoice}}">{{$prodcuct->invoice}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Type</label>
                            <select class="form-control status" id="type" style="">
                            <option value="">--Select--</option>
                              @foreach($Support_Type as $support)
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
 

                           <div class="form-group" style="float: left;width:125px;margin-left: 10px">
                            <label>From</label>
                             <input type="text" class="form-control" id="startDate">
                             
                          </div>
                          <div class="form-group"  style="float: left;width:125px;margin-left: 10px">
                            <label>To</label>
                            <input type="text" id="endDate" class="form-control">
                             
                             
                          </div> 

                          <div class="form-group jj">
                          <label></label>
                          <button type="button" class="btn btn-success submit" style="    margin-top: 23px;"><i class="bx bx-search-alt-2"></i></button>
                          <a href="{{url('/app/customer-subscription-list')}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>
                    

                      
                        <div class="table-responsive">
                            <table id='empTable' class="table" style="width: 100%">
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
  </div>
</section>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  
</head>
<body>
 

<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
  <!--   <script src="{{url()}}/app-assets/vendors/js/vendors.min.js"></script>
  <script src="{{url()}}/app-assets/vendors/js/charts/apexcharts.min.js"></script> -->

  <!-- <script src="{{Request::root()}}/app-assets/vendors/js/vendors.min.js"></script> -->
  <script src="{{Request::root()}}/app-assets/vendors/js/charts/apexcharts.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> 
  </script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    series: [{
      name: 'Last Year',
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
      var oTable = $('#empTable').DataTable({

         processing: true,
         serverSide: true,
          ajax: {
            url: "{{url('/app/customer-subscription')}}",


            data: function(d){
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


         "order": [[ 6, "asc" ]],
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
        var status= $('.status').val();
        
      var table  = $('#empTable').DataTable();
      table.ajax.params({name: 'test'});
      table.draw();
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
@endsection
