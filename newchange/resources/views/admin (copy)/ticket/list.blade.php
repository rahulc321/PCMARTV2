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
</style>
<section id="widgets-Statistics">
<div class="form-group">
  <form action="{{url('/app/ticket')}}" method="post" id="form">
  @csrf
    <label>User :- <span style="color: green">{{$uuname}}</label>
    <select name="userid" class="form-control user111">
    <option value="">--Select--</option>
    @foreach($allUser as $user)
    <option value="{{$user->uid}}" <?php if(@$_REQUEST['userid']==$user->uid){ echo 'selected'; } ?>>{{$user->user}}</option>
    @endforeach
      
    </select>
    <!-- <input type="submit" name="Submit"> -->
  </form>
  </div>
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
    <div class="col-xl-3 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Tickets</h4>
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

    <div class="col-xl-3 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Company</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div id="chart1"></div>
        <div class="card-body">
          <!-- <div id="chart1" style="height: 200px; width: 100%;"></div> -->
          <!-- <ul class="list-inline text-center mt-1 mb-0">
            <li class="mr-2"><span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
            <li class="mr-2"><span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
            <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
          </ul> -->
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Feedback</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div id="chart4"></div>
        <div class="card-body">
          <!-- <div id="chart4" style="height: 200px; width: 100%;"></div> -->
          <!-- <ul class="list-inline text-center mt-1 mb-0">
            <li class="mr-2"><span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
            <li class="mr-2"><span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
            <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
          </ul> -->
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 dashboard-visit">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Company</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
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
 

<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')

 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <?php

 
$status=0;
$status1=0;
$status2=0;
$rate1=0;
$rate2=0;
$rate3=0;
$rate4=0;
$rate5=0;


$totalTicket=0;
$active=0;
$close=0;
/*foreach($records as $record){
   // echo '<pre>';print_r($record->rate);
  $totalTicket++;

  if($record->status==0){
    $active++;
  }
  if($record->status==2){
    $close++;
  }

 
    if($record->rate==1){
      $rate1++;
    }elseif($record->rate==2){
      $rate2++;
    }elseif($record->rate==3){
      $rate3++;
    }elseif($record->rate==4){
      $rate4++;
    }elseif($record->rate==5){
      $rate5++;
    }
 

        $endDate   = new \DateTime('now');
        if($record->status==2){
          $endDate   = new \DateTime($record->close_date);
        }

        

        $previousDate = $record->cdate;
        $startdate = new \DateTime($previousDate);
        
        $interval  = $endDate->diff($startdate);
        $time= $interval->format('%d:%H:%i:%s');
        $min= $interval->format('%i');
        $hours= $interval->format('%H');
        //$time= '2:10:0';
        if($min < '30' && $hours =='00'){
        $status++;

        }elseif($min > '30' && $hours <= '02'){
         
        $status1++;
        }else{

        $status2++;
        }
    
}*/

 
$chart1 = array( 
  array("label"=>"> 2 Hour", "symbol" => "","y"=>$status2),
  array("label"=>"1/2 <2 Hour", "symbol" => "","y"=>$status1),
  array("label"=>"<1/2 Hour", "symbol" => "","y"=>$status));

$statuslogin2=0;
$statuslogin1=0;
$statuslogin=0;
/*foreach ($LoginUserData as $key => $value) {


        $endDate   = new \DateTime('now');
        if($value->status==2){
          $endDate   = new \DateTime($value->close_date);
        }

        

        $previousDate = $value->cdate;
        $startdate = new \DateTime($previousDate);
        
        $interval  = $endDate->diff($startdate);
        $time= $interval->format('%d:%H:%i:%s');
        $min= $interval->format('%i');
        $hours= $interval->format('%H');
        //$time= '2:10:0';
        if($min < '30' && $hours =='00'){
        $statuslogin++;

        }elseif($min > '30' && $hours <= '02'){
         
        $statuslogin1++;
        }else{

        $statuslogin2++;
        }
}*/

$chart2 = array( 
  array("label"=>"> 2 Hour", "symbol" => "","y"=>$statuslogin2),
  array("label"=>"1/2 <2 Hour", "symbol" => "","y"=>$statuslogin1),
  array("label"=>"<1/2 Hour", "symbol" => "","y"=>$statuslogin));

$rateuser1=0;
$rateuser2=0;
$rateuser3=0;
$rateuser4=0;
$rateuser5=0;
/* foreach ($ratings as $key => $value) {
   if($value->rate==1){
      $rateuser1++;
    }elseif($value->rate==2){
      $rateuser2++;
    }elseif($value->rate==3){
      $rateuser3++;
    }elseif($value->rate==4){
      $rateuser4++;
    }elseif($value->rate==5){
      $rateuser5++;
    }
 }*/

$chart3 = array( 
  array("label"=>"5 Star", "symbol" => "","y"=>$rate5),
  array("label"=>"4 Star", "symbol" => "","y"=>$rate4),
  array("label"=>"3 Star", "symbol" => "","y"=>$rate3),
  array("label"=>"2 Star", "symbol" => "","y"=>$rate2),
  array("label"=>"1 Star", "symbol" => "","y"=>$rate1)
   
  );



$chart4 = array( 
  array("label"=>"5 Star", "symbol" => "","y"=>$rateuser5),
  array("label"=>"4 Star", "symbol" => "","y"=>$rateuser4),
  array("label"=>"3 Star", "symbol" => "","y"=>$rateuser3),
  array("label"=>"2 Star", "symbol" => "","y"=>$rateuser2),
  array("label"=>"1 Star", "symbol" => "","y"=>$rateuser1)
   
  );
 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
       <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
    
      var data = google.visualization.arrayToDataTable([
       ['Task', 'Hours per Day'],
       ['>2 Hour ', <?=$statuslogin?> ],
       ['> 1/2 < 2 Hour', <?=$statuslogin1?>],
       ['< 1/2 Hour', <?=$statuslogin2?>],
        
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
       ['>2 Hour ', <?=$status?> ],
       ['> 1/2 < 2 Hour', <?=$status1?>],
       ['< 1/2 Hour', <?=$status2?>],
        
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
       ['5 Star ', <?=$rateuser5?> ],
       ['4 Star', <?=$rateuser4?>],
       ['3 Star', <?=$rateuser3?>],
       ['2 Star', <?=$rateuser2?>],
       ['1 Star', <?=$rateuser1?>],
        
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
       ['5 Star ', <?=$rate5?> ],
       ['4 Star', <?=$rate4?>],
       ['3 Star', <?=$rate3?>],
       ['2 Star', <?=$rate2?>],
       ['1 Star', <?=$rate1?>],
        
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
            { data: 'assign' },
            { data: 'time' },
            { data: 'cdate' },
            { data: 'btn' },
            

         ],

         "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 2,5,6 ] }],
          
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
