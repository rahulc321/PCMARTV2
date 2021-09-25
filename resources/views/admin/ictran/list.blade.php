@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Service contract List')
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
span.rere {
    background: #5a8dee;
    color: white;
    padding: 4px;
    border-radius: 6px;
}
a.canvasjs-chart-credit {
    display: none;
}
form#form2 {
    margin-left: 11px;
}
select.form-control.typeww1 {
    margin-left: 17% !important;
}
 /*.col-xl-3 {
    -webkit-box-flex : 0;
    -webkit-flex : 0 0 25%;
        -ms-flex : 0 0 25%;
            flex : 0 0 25%;
    max-width : 25%;
    height: 147px !important;
  }*/

  form#form2 {
    margin-left: 11px;
    padding-top: 13px;
    padding-left: 10px;
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
          <p class="text-muted mb-0 line-ellipsis">Service Contract</p>
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
          <p class="text-muted mb-0 line-ellipsis">Service Contract $</p>
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
          <p class="text-muted mb-0 line-ellipsis">  <span style="color:green"><?=date('F')?></span> Renew Contract</p>
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
          <p class="text-muted mb-0 line-ellipsis"> <span style="color:green"><?=date('F')?></span> Renew $</p>
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
        <form action="{{url('/app/service-contract')}}" id="form2" method="post">
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
            <option value="{{$support->Support_Type}}" <?php if($support->Support_Type==@$_REQUEST['typeww']){ echo 'selected'; } ?>>{{$support->Support_Type}}</option>
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

    <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Contract Category</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
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
          }elseif($key==5){
            $back="#9c4199";
          }elseif($key==6){
            $back="#9c4199";
          }elseif($key==7){
            $back="#9c4199";
          }elseif($key==8){
            $back="#9c4199";
          }else{
            $back="#9c4199";
          }
          if($value['sum'] !=""){
          ?>

               
              <div class="col-sm-2" style="float: left;"><span style="background-color: <?=$back?>;" class="dot"></span> <span style="font-size: 12px;"><?=$value['name']?></span></div>

        <?php }  } ?>
          
            
           
          
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
    <div class="card">
      <div class="card-body">
      <!-- <a class="btn btn-success" href="{{url('/app/settings/add')}}" style="float: right;">Add Setting</a> -->
       
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
                    <div class="ibox-content">

                       {{-- <div class="">
                           <form action="{{url('/app/service-contract')}}" method="get">
                           @csrf
                           <label>Search</label>
                           <input type="text" name="seacrh" placeholder="Search...">
                           <input type="submit">
                           <input type="reset" id="something">
                           </form>
                        </div>--}}
                        <br>
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
                            <label>Product</label>
                            <select class="form-control status" id="customer" style="">
                            <option value="">--Select--</option>
                              @foreach($prodcucts as $prodcuct)
                              <option value="{{$prodcuct->id}}">{{$prodcuct->title}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Type</label>
                            <select class="form-control status" id="type" style="">
                            <option value="">--Select--</option>
                              @foreach($Support_Type as $support)
                              <option value="{{$support->Support_Type}}">{{$support->Support_Type}}</option>
                              @endforeach
                            </select>
                          </div>


                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Value</label>
                            <select class="form-control status" id="value" style="width:106px">
                            <option value="">--Select--</option>
                              
                              <option value="999">< 999</option>
                              <option value="1000-1999">1000-1999</option>
                              <option value="2000-2999">2000-2999</option>
                              <option value="3000-3999">3000-3999</option>
                              <option value="4000">> 4000</option>
                               
                            </select>
                          </div>
 

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
                          <a href="{{url('/app/service-contract')}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>
                        <div class="table-responsive">
                            <table id='empTable' class="table">
                                <thead>
                                <tr>
                                    <th width="5%">Invoice</th>
                                    <th width="40%">Customer</th>
                                    <th width="25%">Type</th>
                                    <th width="13%">Product</th>
                                    <th width="13%">Count</th>
                                    <th width="13%">Value</th>
                                    <th width="8%">Expire</th>
                                    <th width="14%">Actions&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                                </thead>
                                 
                            </table>
                        </div>
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
   <!--  <script src="{{url()}}/app-assets/vendors/js/vendors.min.js"></script>
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
       // legend:{position: 'labled'},
        
        width:'100%',
       // height:390,
       
       pieSliceTextStyle:{
         fontSize:10
       },
       
      chartArea:{left:15,top:0,width:'100%',height:'430%'},                  
      slices: {
        0:{color: '#ed5565'}
      , 1:{color: '#f8ac59'}
      , 2: {color: '#23c6c8'}
      , 3: {color: '#ed55b1'}
      , 4: {color: '#5565ed'}
      , 5: {color: '#eddd55'}
    }

     };
   
     var chart = new google.visualization.PieChart(document.getElementById('chart3'));
     chart.draw(data, options);
   }


        $(document).ready(function () {
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
  <script> 
   /* window.onload = function () { 
    
      var chart = new CanvasJS.Chart("chartContainer", { 
        animationEnabled: true, 
        theme: "light2",
        title:{ 
          text: "Monthly Report"
        },   
        axisY: { 
          title: "Last Year", 
          titleFontColor: "#4F81BC", 
          lineColor: "#4F81BC", 
          labelFontColor: "#4F81BC", 
          tickColor: "#4F81BC"
        }, 
        axisY2: { 
          title: "This Year", 
          titleFontColor: "#C0504E", 
          lineColor: "#C0504E", 
          labelFontColor: "#C0504E", 
          tickColor: "#C0504E"
        },   
        toolTip: { 
          shared: true 
        }, 
        legend: { 
          cursor:"pointer", 
          itemclick: toggleDataSeries 
        }, 
        data: [{ 
          type: "column", 
          name: "Last Year Value", 
          color:'#00CFDD',
          legendText: "Last Year",
          lineColor: "green", 
          showInLegend: true, 
          dataPoints:<?php echo json_encode($dataPoints, 
              JSON_NUMERIC_CHECK); ?> 
        }, 
        { 
          type: "column",  
          name: "This Year Value", 
          legendText: "This Year",
          color:'#5A8DEE', 
          axisYType: "secondary", 
          showInLegend: true, 
          dataPoints:<?php echo json_encode($dataPoints2, 
              JSON_NUMERIC_CHECK); ?> 
        }
        ] 
      }); 
      chart.render(); 
      
      function toggleDataSeries(e) { 
        if (typeof(e.dataSeries.visible) === "undefined"
              || e.dataSeries.visible) { 
          e.dataSeries.visible = false; 
        } 
        else { 
          e.dataSeries.visible = true; 
        } 
        chart.render(); 
      } */
    
   // } 

   window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      animationEnabled: true, 
        theme: "light2",
      title:{
        text: "Monthly Report"
      
      },
      axisX: {
    interval: 1,
    labelAngle: -70 
},
       dataPointWidth: 18,  
      toolTip: { 
          shared: true 
        }, 
        legend: { 
          cursor:"pointer", 
          itemclick: toggleDataSeries 
        },

      data: [{        
        type: "column",
        name: "Last Year Value",
        color:'#5A8DEE',
        showInLegend: true, 

        dataPoints:<?php echo json_encode($dataPoints, 
              JSON_NUMERIC_CHECK); ?> 
      },
      {        
          type: "column",  
          name: "Current year", 
          legendText: "Current year",
          color:'#00CFDD', 
          //axisYType: "secondary", 
          showInLegend: true, 
          dataPoints:<?php echo json_encode($currentYear, 
              JSON_NUMERIC_CHECK); ?>  
      }        
      ]
    });

    chart.render();
    function toggleDataSeries(e) { 
        if (typeof(e.dataSeries.visible) === "undefined"
              || e.dataSeries.visible) { 
          e.dataSeries.visible = false; 
        } 
        else { 
          e.dataSeries.visible = true; 
        } 
        chart.render(); 
      }
  }
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
      
      $('.typeww').change(function(){
        $('#form2').submit();
      });
      $('.typeww1').change(function(){
        $('#form2').submit();
      });
      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,


         //ajax: "{{url('/app/service-contract1')}}",
         ajax: {
            url: "{{url('/app/service-contract1')}}",
            type: "get",
           // dataType: 'json',
           /* data: {
                filterParams: {
                    status: $('#status option:selected').text()
                   
                }
            }*/

            data: function(d){
            d.invoice = $('#invoice option:selected').val();
            d.customer = $('#customer option:selected').val();
            d.type = $('#type option:selected').val();
            d.startDate = $('#startDate').val();
            d.endDate = $('#endDate').val();
            d.value = $('#value').val();
            }
        },
         columns: [
            { data: 'Contract_Number' },
            { data: 'Organization_Name' },
            { data: 'Support_Type' },
            { data: 'product' },
            { data: 'count' },
            { data: 'Price_RM' },
            { data: 'due_date' },
            { data: 'button' },
            

         ],
         "drawCallback": function (settings) { 
        // Here the response
        var response = settings.json;
        console.log(response.renewSum);
        $('.activecont').html(response.renewSum).css('color','green');
        $('.cancell').html(response.cancell).css('color','red');
        $('.agree').html(response.agree).css('color','#d86400');
        $('.expire').html(response.expire);
        },

          "order": [[ 6, "asc" ]],
         // "aoColumnDefs": [{ "aTargets": [ 4 ], "bSortable": false}],
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    console.log(aData.id);
                     var removeDeleteBtn=  aData.removeDeleteBtn;
                   var contract_delete=  aData.contract_delete;
                   var contract_edit1=  aData.contract_edit;

                   var contract_edit='';
                   if(contract_edit1==0){
                    var contract_edit= "display:none";
                   }
                // alert(contract_edit);



                   var style='';
                   if(removeDeleteBtn==1 || contract_delete==0){
                    var style= "display:none";
                   }
                   var removeTiecket=  aData.removeTiecket;
                   var ticket_multiple=  aData.ticket_multiple;
                   var styleticket='';
                   if(removeTiecket==1 && ticket_multiple==0 || aData.ticket_red_renew==1){
                    var styleticket= "display:none";
                   }

                   var id=  aData.id;
                    if(aData.renew_status==1){
                         
                        $('td:eq(0)', nRow).css('color', 'green');
                        $('td:eq(1)', nRow).css('color', 'green');
                        $('td:eq(2)', nRow).css('color', 'green');
                        $('td:eq(3)', nRow).css('color', 'green');
                        $('td:eq(4)', nRow).css('color', 'green');

                        $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");

                    }else if(aData.renew_status==2){
                         
                        $('td:eq(0)', nRow).css('color', '#d86400');
                        $('td:eq(1)', nRow).css('color', '#d86400');
                        $('td:eq(2)', nRow).css('color', '#d86400');
                        $('td:eq(3)', nRow).css('color', '#d86400');
                        $('td:eq(4)', nRow).css('color', '#d86400');

                        $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");

                        

                    }else if(aData.renew_status==3){
                         
                        $('td:eq(0)', nRow).css('color', '#c7c1c1');
                        $('td:eq(1)', nRow).css('color', '#c7c1c1');
                        $('td:eq(2)', nRow).css('color', '#c7c1c1');
                        $('td:eq(3)', nRow).css('color', '#c7c1c1');
                        $('td:eq(4)', nRow).css('color', '#c7c1c1');

                        $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");

                    }else{
                      $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a><a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a>  ");
                    }

                    if(aData.dueDateColor==1){
                         
                        $('td:eq(6)', nRow).css('color', 'Red');
                      }



                   // $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i> Cancelled</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>  ");
                   // $('td:eq(6)', nRow).html("<a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;''><i class='bx bx-edit-alt' ></i></a>");
                }
      });

      
      $(document).on('click','.submit',function(){
      var table  = $('#empTable').DataTable();
      table.draw();
      });

    });

    $(document).on('click','.delete',function(){
        var attr= $(this).attr('data');
        if (confirm('Are you sure you want to delete this ?')) {
        window.location.href = "{{url('app/ictran/delete')}}/"+attr;
        }
        
      });
    </script>
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
