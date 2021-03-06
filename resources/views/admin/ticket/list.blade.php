@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Ticket List')
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
select.form-control1.user111 {
    width: 81px;
}
</style>
<section id="widgets-Statistics">
<!--   <div class="row">
    <div class="col-12 mt-1 mb-2">
      <h4>Statistics <span style="color: green">{{$uuname}}</span></h4>
      <hr>
    </div>
  </div> -->
 
  <div class="row">

    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
            <i class="bx bx-purchase-tag font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Average</p>
          <h2 class="mb-0"><?=round(number_format($closedTicket/$tday,2))?></h2>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
            <i class="bx bxs-tag-x"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Today</p>
          <h2 class="mb-0"><span class="agree1"><?=$closedTicket1?></span></h2>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
            <i class="bx bx bx-check"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Active</p>
          <h2 class="mb-0"><span class="activecont1"><?=$openTicket?></span></h2>
        </div>
      </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">> 2 hour</p>
          <h2 class="mb-0"><span class="cancell1"><?=$twohgreather?></span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">> 1/2 hour</p>
          <h2 class="mb-0"><span class="expire1"><?=$greater30MinutesG?></span></h2>
        </div>
      </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">< 1/2 hour</p>
          <h2 class="mb-0"><?=$less30Minutes?></h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="widgets-Statistics">
<?php   ?>
 
  <div class="row" >
    <!-- Greetings Content Starts -->
    <!-- <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
      <div class="card">
        <div class="card-header">
          <h3 class="greeting-text">Congratulations John!</h3>
          <p class="mb-0">Best seller of the month</p>
        </div>
        <div class="card-body pt-0">
          <div class="d-flex justify-content-between align-items-end">
            <div class="dashboard-content-left">
              <h1 class="text-primary font-large-2 text-bold-500">$89k</h1>
              <p>You have done 57.6% more sales today.</p>
              <button type="button" class="btn btn-primary glow">View Sales</button>
            </div>
            <div class="dashboard-content-right">
              <img src="{{asset('images/icon/cup.png')}}" height="220" width="220" class="img-fluid"
                alt="Dashboard Ecommerce" />
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Multi Radial Chart Starts -->
    <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">User Ticket</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div id="chart2"></div>
        <div class="card-body">

          <!-- <div id="chart2" style="height: 200px; width: 100%;"></div> -->
          <!-- <ul class="list-inline text-center mt-1 mb-0">
            <li class=""><span class="bullet bullet-xs" style="background: #7cbe88"></span> < 1/2</li>
            <li class=""><span class="bullet bullet-xs bullet-danger"></span></li>
            <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
          </ul> -->
        </div>
      </div>
    </div>
<style type="text/css">
/*  div#chart2 {
    padding-top: 22px;
}
div#chart3 {
    padding-top: 22px;
}*/
</style>
    <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
      <div class="card">
         
        <div class="card-header d-flex justify-content-between align-items-center">

          <h4 class="card-title">Hourly Ticket</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>

          <form action="{{url('/app/ticket')}}" method="post" id="form">
  @csrf
     
    <select name="userid" class="form-control1 user111">
    <option value="">--Select--</option>
    @foreach($users as $user)
    <?php
   // echo '<pre>';print_r($user);

    ?>
    <option value="{{$user['id']}}" <?php if(@$_REQUEST['userid']==$user['id']){ echo 'selected'; } ?>>{{$user['name']}}</option>
    @endforeach
      
    </select>
    <!-- <input type="submit" name="Submit"> -->
  </form>

        </div>

  
   
        <div id="chart1"></div>
        <div class="card-body gg">
          <!-- <div id="chart1" style="height: 200px; width: 100%;"></div> -->
          <!-- <ul class="list-inline text-center mt-1 mb-0">
            <li class="mr-2"><span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
            <li class="mr-2"><span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
            <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
          </ul> -->
        </div>
      </div>
    </div>

    <!-- <div class="col-xl-3 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Feedback</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div id="chart4"></div>
        <div class="card-body">
           
        </div>
      </div>
    </div> -->
    <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Feedback</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>

          <form action="{{url('/app/ticket')}}" method="post" id="form1">
          @csrf

          <select name="rate" class="form-control1 user1111">
          <option value="">--Select--</option>
          @foreach($users as $user)
          <?php
          // echo '<pre>';print_r($user);

          ?>
          <option value="{{$user['id']}}" <?php if(@$_REQUEST['rate']==$user['id']){ echo 'selected'; } ?>>{{$user['name']}}</option>
          @endforeach

          </select>
          <!-- <input type="submit" name="Submit"> -->
          </form>
        </div>
        <div id="chart3"></div>
        <div class="card-body">


         <!--  <div id="chart3" style="height: 200px; width: 100%;"></div> -->
          <!-- <ul class="list-inline text-center mt-1 mb-0">
            <li class="mr-2"><span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
            <li class="mr-2"><span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
            <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
          </ul> -->
        </div>
      </div>
    </div>

    <div class="col-xl-12 col-md-4 col-sm-6">
        
      <div class="card">
        <form action="{{url('/app/ticket')}}" id="form2" method="post">
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
          <label>User</label>
          <select class="form-control typeww1" style="width: 16%" name="typeww">
              <option value="">--Select--</option>
              @foreach($users as $user)
              <option value="{{$user['id']}}">{{$user['name']}}</option>
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
    
  </div> 
</section>

 
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
                            <select class="form-control status" id="status" style="width:75px">
                              <option value="0">Open</option>
                              <option value="2">Close</option>
                            </select>
                          </div>

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Rating</label>
                            <select class="form-control status" id="rating" style="">
                            <option value="">--Select--</option>
                               <option value="1">1 Star</option>
                               <option value="2">2 Star</option>
                               <option value="3">3 Star</option>
                               <option value="4">4 Star</option>
                               <option value="5">5 Star</option>
                              
                            </select>
                          </div>
                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Customer</label>
                            <select class="form-control status" id="customer" style="">
                            <option value="">--Select--</option>
                              @foreach($customers as $customer)
                              <option value="{{$customer['id']}}">{{$customer['Organization_Name']}}</option>
                              @endforeach
                            </select>
                          </div>


                          <div class="form-group" style="float: left;width:100px;margin-left: 10px">
                            <label>User</label>
                            <select class="form-control status" id="user" style="width:100px">
                            <option value="">--Select--</option>
                              @foreach($users as $user)
                              <option value="{{$user['id']}}">{{$user['name']}}</option>
                              @endforeach
                            </select>
                          </div>
 

                          <div class="form-group" style="float: left;width:150px;margin-left: 10px">
                            <label>From</label>
                             <input type="text" class="form-control" id="startDate">
                             
                          </div>
                          <div class="form-group"  style="float: left;width:150px;margin-left: 10px">
                            <label>To</label>
                            <input type="text" id="endDate" class="form-control">
                             
                             
                          </div>

                          <div class="form-group jj">
                          <label></label>
                          <button type="button" class="btn btn-success submit" style="    margin-top: 23px;"><i class="bx bx-search-alt-2"></i></button>
                          <a href="{{url('/app/ticket')}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>


                        <div class="col-md-4"></div>

                        <div class="table-responsive">
                            <table id='empTable' class="table">
                                <thead>
                                <tr>
                                    <th width="2%">Ticket</th>
                                    <th width="20%">Customer</th>
                                    <th width="4%">User</th>
                                    <th width="15%">Phone</th>
                                    <th width="8%">Contact</th>
                                    <!-- <th width="4%">Description</th> -->
                                    <th width="6%">Assign</th>
                                    <th width="24%">Time</th>
                                    <th width="8%">Created</th>
                                    <th width="4%">Action</th>
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
 <style type="text/css">
   .form-group {
    margin-bottom: 1rem;
    padding: 10px;
    margin-left: 10px;
}
 </style>

<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')

 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
 <script src="{{Request::root()}}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> 
  </script> 
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


<script type="text/javascript">

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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
    
      var data = google.visualization.arrayToDataTable([
       ['Task', 'Hours per Day'],
       <?php foreach ($arrayChart as $key => $value) { ?>
         
       ['<?=$value['name']?>', <?=$value['tcount']?>],
        
        <?php } ?>
        
     ]);
   
     var options = {
       title: 'Users',         
        pieHole: 0.55,
       
       pieSliceTextStyle:{
         fontSize:8
       },
       
       chartArea:{left:15,top:0,width:'100%',height:'100%'},                  
     slices: {0:{color: '#ed5565'}, 1:{color: '#f8ac59'}, 2: {color: '#23c6c8'}}
     };
   
     var chart = new google.visualization.PieChart(document.getElementById('chart2'));
     chart.draw(data, options);
   }

   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
    
      var data = google.visualization.arrayToDataTable([
       ['Task', 'Hours per Day'],
       ['>2 Hour ', <?=$twohgreatherChart?> ],
       ['> 1/2 < 2 Hour', <?=$greater30MinutesGChart?>],
       ['< 1/2 Hour', <?=$less30MinutesChart?>],
        
     ]);
   
     var options = {
       title: 'Users',         
        pieHole: 0.55,
       
       pieSliceTextStyle:{
         fontSize:8
       },
       
       chartArea:{left:15,top:0,width:'100%',height:'100%'},                  
     slices: {0:{color: '#ed5565'}, 1:{color: '#f8ac59'}, 2: {color: '#23c6c8'}}
     };
   
     var chart = new google.visualization.PieChart(document.getElementById('chart1'));
     chart.draw(data, options);
   }


   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {
    
      var data = google.visualization.arrayToDataTable([
       ['Task', 'Hours per Day'],
       ['5 Star ', <?=$ratell5?> ],
       ['4 Star', <?=$ratell4?>],
       ['3 Star', <?=$ratell3?>],
       ['2 Star', <?=$ratell2?>],
       ['1 Star', <?=$ratell1?>],
        
     ]);
   
     var options = {
       title: 'Users',         
        pieHole: 0.55,
       
       pieSliceTextStyle:{
         fontSize:8
       },
       
       chartArea:{left:15,top:0,width:'100%',height:'100%'},                  
     slices: {0:{color: '#ed5565'}, 1:{color: '#f8ac59'}, 2: {color: '#23c6c8'}}
     };
   
     var chart = new google.visualization.PieChart(document.getElementById('chart4'));
     chart.draw(data, options);
   }

 

   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {
    
      var data = google.visualization.arrayToDataTable([
       ['Task', 'Hours per Day'],
       ['5 Star ', <?=$ratel5?> ],
       ['4 Star', <?=$ratel4?>],
       ['3 Star', <?=$ratel3?>],
       ['2 Star', <?=$ratel2?>],
       ['1 Star', <?=$ratel1?>],
        
     ]);
   
     var options = {
       title: 'Users',         
        pieHole: 0.55,
       
       pieSliceTextStyle:{
         fontSize:8
       },
       
       chartArea:{left:15,top:0,width:'100%',height:'100%'},                  
     slices: {0:{color: '#ed5565'}, 1:{color: '#f8ac59'}, 2: {color: '#23c6c8'}}
     };
   
     var chart = new google.visualization.PieChart(document.getElementById('chart3'));
     chart.draw(data, options);
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

      $('.user111').change(function(){
        $('#form').submit();
      });
      $('.user1111').change(function(){
        $('#form1').submit();
      });

      $( "#datepicker" ).datepicker();
      // DataTable
      var oTable = $('#empTable').DataTable({

         processing: true,
         serverSide: true,

         // ajax: "{{url('/app/ticket2')}}",
         //  type: "GET",
         //  data: function (data) {
         //  // data.sim_no = $('input[name=sim_no]').val();
         //  // data.v_num = $('input[name=v_num]').val();
         //  // data.dh_num = $('input[name=dh_num]').val();
         //  // data.fnetworks = $('select[name=fnetworks]').val();
         //  // data.fstatus = $('select[name=fstatus]').val();
         //  // data.fintrome = $('select[name=fintrome]').val();
         //  }
          ajax: {
            url: "{{url('/app/ticket2')}}",
            type: "get",
           // dataType: 'json',
           /* data: {
                filterParams: {
                    status: $('#status option:selected').text()
                   
                }
            }*/

            data: function(d){
            d.status = $('#status option:selected').val();
            d.customer = $('#customer option:selected').val();
            d.user = $('#user option:selected').val();
            d.startDate = $('#startDate').val();
            d.endDate = $('#endDate').val();
            d.rating = $('#rating').val();
            }
        },
         columns: [
            { data: 'tid' },
            { data: 'oname' },
            { data: 'user' },
            { data: 'phone' },
            { data: 'contact_person' },
            // { data: 'description' },
            { data: 'asignName' },
            { data: 'time' },
            { data: 'cdate' },
            { data: 'btn' },
            

         ],

         "aoColumnDefs": [{ "bSortable": false, "aTargets": [6] }],
          
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    console.log(aData);
                    var id=  aData.tid;
                    

                    if(aData.timeStatus==2){
                      $('td:eq(6)', nRow).css('color', '#d86400');
                    }
                    if(aData.timeStatus==3){
                      $('td:eq(6)', nRow).css('color', 'red');
                    }
                    var hideDelete= '';
                    if(aData.tickect_delete==0){
                      var hideDelete= 'display:none';
                    }
                    var tickect_edit= '';
                    if(aData.tickect_edit==0){
                      var tickect_edit= 'display:none';
                    }

                    
                     
                         
                    if(aData.ticketstatus==2){ 
                    
                      $('td:eq(8)', nRow).html("<a style='"+hideDelete+"' href='javascript:;' class='delete1' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a>");
                      }else{
                        $('td:eq(8)', nRow).html("<div class='dropdown' ><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/reassign')}}/"+id+"'><i class='bx bx-analyse'></i> Re-Assign</a><a class='dropdown-item' href='{{url('app/ticket/close')}}/"+id+"'><i class='bx bx-check'></i> Close</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+hideDelete+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ticket/edit')}}/"+id+"' style='float: left !important;"+tickect_edit+"'><i class='bx bx-edit-alt' ></i></a>");
                      }

                    



                   // $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i> Cancelled</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>  ");
                   // $('td:eq(6)', nRow).html("<a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;''><i class='bx bx-edit-alt' ></i></a>");
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


    

    $(document).on('click','.delete',function(){
        var attr= $(this).attr('data');
        if (confirm('Are you sure you want to delete this ?')) {
        window.location.href = "{{url('app/ticket/delete')}}/"+attr;
        }
        
      });
    </script>
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
