@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Dashboard E-commerce')
{{-- vendor css --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')

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
foreach($records as $record){
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


   /* $previousDate = $record->cdate;
    $startdate = new \DateTime($previousDate);
    $endDate   = new \DateTime('now');
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
        }*/

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
    
}

?>
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
<section id="widgets-Statistics">
  <div class="row">
    <div class="col-12 mt-1 mb-2">
      <h4>Statistics <span style="color: green">{{$uuname}}</span></h4>
      <hr>
    </div>
  </div>
 
  <div class="row">

    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
            <i class="bx bx-purchase-tag font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Total Ticket</p>
          <h2 class="mb-0"><?=$totalTicket?></h2>
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
          <h2 class="mb-0"><span class="activecont1"><?=$active?></span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
            <i class="bx bxs-tag-x"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Close</p>
          <h2 class="mb-0"><span class="agree1"><?=$close?></span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis"> > 2 Hour</p>
          <h2 class="mb-0"><span class="cancell1"><?=$status2?></span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">1/2 < 2 Hour</p>
          <h2 class="mb-0"><span class="expire1"><?=$status1?></span></h2>
        </div>
      </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">< 1/2 Hour</p>
          <h2 class="mb-0"><?=$status?></h2>
        </div>
      </div>
    </div>
  </div>
</section>
 <div class="form-group">
  <form action="{{url('/dashboard')}}" method="post" id="form">
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
        <div class="card-body">
          <div id="chart2" style="height: 200px; width: 100%;"></div>
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
        <div class="card-body">
          <div id="chart1" style="height: 200px; width: 100%;"></div>
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
        <div class="card-body">
          <div id="chart4" style="height: 200px; width: 100%;"></div>
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
        <div class="card-body">
          <div id="chart3" style="height: 200px; width: 100%;"></div>
          <!-- <ul class="list-inline text-center mt-1 mb-0">
            <li class="mr-2"><span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
            <li class="mr-2"><span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
            <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
          </ul> -->
        </div>
      </div>
    </div>
    
  </div>
  <div class="row">
    <div class="col-xl-8 col-12 dashboard-order-summary" style="display: none;">
      <div class="card">
        <div class="row">
          <!-- Order Summary Starts -->
          <div class="col-md-8 col-12 order-summary border-right pr-md-0">
            <div class="card mb-0">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Order Summary</h4>
                <div class="d-flex">
                  <button type="button" class="btn btn-sm btn-light-primary mr-1">Week</button>
                  <button type="button" class="btn btn-sm btn-primary glow">Month</button>
                </div>
              </div>
              <div class="card-body p-0">
                <div id="order-summary-chart"></div>
              </div>
            </div>
          </div>
          <!-- Sales History Starts -->
          <div class="col-md-4 col-12 pl-md-0">
            <div class="card mb-0">
              <div class="card-header pb-50">
                <h4 class="card-title">Best Sellers</h4>
              </div>
              <div class="card-body py-1">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <div class="sales-item-name">
                    <p class="mb-0">iPhone</p>
                    <small class="text-muted">Smartphone</small>
                  </div>
                  <h6 class='mb-0'>794</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <div class="sales-item-name">
                    <p class="mb-0">Airpods</p>
                    <small class="text-muted">Earphone</small>
                  </div>
                  <h6 class='mb-0'>550</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="sales-item-name">
                    <p class="mb-0">MacBook</p>
                    <small class="text-muted">Laptop</small>
                  </div>
                  <h6 class='mb-0'>271</h6>
                </div>
              </div>
              <div class="card-footer border-top pb-md-0">
                <h5>Total Sales</h5>
                <span class="text-primary text-bold-500">$82,950.96</span>
                <div class="progress progress-bar-primary progress-sm mt-50 mb-md-50">
                  <div class="progress-bar" role="progressbar" aria-valuenow="78" style="width:78%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Latest Update Starts -->
    <div class="col-xl-4 col-md-6 col-12 dashboard-latest-update" style="display: none;">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center pb-50">
          <h4 class="card-title">Latest Update</h4>
          <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              2020
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtonSec">
              <a class="dropdown-item" href="javascript:;">2020</a>
              <a class="dropdown-item" href="javascript:;">2019</a>
              <a class="dropdown-item" href="javascript:;">2018</a>
            </div>
          </div>
        </div>
        <div class="card-body p-0 pb-1">
          <ul class="list-group list-group-flush">
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-primary m-0">
                    <div class="avatar-content">
                      <i class="bx bxs-zap text-primary font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Products</span>
                  <small class="text-muted d-block">2k New Products</small>
                </div>
              </div>
              <span>10k</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-info m-0">
                    <div class="avatar-content">
                      <i class="bx bx-stats text-info font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Sales</span>
                  <small class="text-muted d-block">39k New Sales</small>
                </div>
              </div>
              <span>26M</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-danger m-0">
                    <div class="avatar-content">
                      <i class="bx bx-credit-card text-danger font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Revenue</span>
                  <small class="text-muted d-block">43k New Revenue</small>
                </div>
              </div>
              <span>15M</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-success m-0">
                    <div class="avatar-content">
                      <i class="bx bx-dollar text-success font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Cost</span>
                  <small class="text-muted d-block">Total Expenses</small>
                </div>
              </div>
              <span>2B</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-primary m-0">
                    <div class="avatar-content">
                      <i class="bx bx-user text-primary font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Users</span>
                  <small class="text-muted d-block">New Users</small>
                </div>
              </div>
              <span>2k</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-danger m-0">
                    <div class="avatar-content">
                      <i class="bx bx-edit-alt text-danger font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Visits</span>
                  <small class="text-muted d-block">New Visits</small>
                </div>
              </div>
              <span>46k</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Earning Swiper Starts -->
    <div class="col-xl-12" id="widget-earnings">
      <div class="card" style="padding: 10px">
      @if (count($errors) > 0)
            <div class="alert alert-success">
                
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h4>Service Contract</h4>
        <div class="table-responsive">
         <table id='empTable' class="table">
                                <thead>
                                <tr>
                                    <th width="5%">Invoice</th>
                                    <th width="40%">Customer</th>
                                    <th width="5%">Type</th>
                                    <th width="25%">Product</th>
                                    <th width="13%" style="display: none">Value</th>
                                    <th width="20%">Expire</th>
                                    <th width="14%">Actions&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                                </thead>
                                 
                            </table>
      </div>
      </div>
    </div>

    <div class="col-xl-12" id="widget-earnings">
      <div class="card" style="padding: 10px">
    <h4>Tickets</h4>
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
                            <select class="form-control status" id="status" style="width:85px">
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
                          <a href="{{url('/dashboard')}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>


                        <div class="col-md-4"></div>

                        <div class="table-responsive">
                            <table id='empTable1' class="table">
                                <thead>
                                <tr>
                                    <th width="2%">Ticket</th>
                                    <th width="30%">Customer</th>
                                    <th width="20%">User</th>
                                    <th width="20%">Phone</th>
                                    <th width="20%">Contact</th>
                                    <!-- <th width="4%">Description</th> -->
                                    <th width="6%">Assign</th>
                                    <th width="113px">Time</th>
                                    <th width="8%">Created</th>
                                    <th width="8%">Action</th>
                                </tr>
                                </thead>
                                 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    <!-- Marketing Campaigns Starts -->
    <div class="col-xl-8 col-12 dashboard-marketing-campaign" style="display: none">
      <div class="card marketing-campaigns">
        <div class="card-header d-flex justify-content-between align-items-center pb-1">
          <h4 class="card-title">Marketing campaigns</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-body pb-0">
          <div class="row mb-1">
            <div class="col-md-9 col-12">
              <div class="d-inline-block">
                <!-- chart-1   -->
                <div class="d-flex market-statistics-1">
                  <!-- chart-statistics-1 -->
                  <div id="donut-success-chart" class="mx-1"></div>
                  <!-- data -->
                  <div class="statistics-data my-auto">
                    <div class="statistics">
                      <span class="font-medium-2 mr-50 text-bold-600">25,756</span><span
                        class="text-success">(+16.2%)</span>
                    </div>
                    <div class="statistics-date">
                      <i class="bx bx-radio-circle font-small-1 text-success mr-25"></i>
                      <small class="text-muted">May 12, 2020</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-inline-block">
                <!-- chart-2 -->
                <div class="d-flex mb-75 market-statistics-2">
                  <!-- chart statistics-2 -->
                  <div id="donut-danger-chart" class="mx-1"></div>
                  <!-- data-2 -->
                  <div class="statistics-data my-auto">
                    <div class="statistics">
                      <span class="font-medium-2 mr-50 text-bold-600">5,352</span><span
                        class="text-danger">(-4.9%)</span>
                    </div>
                    <div class="statistics-date">
                      <i class="bx bx-radio-circle font-small-1 text-success mr-25"></i>
                      <small class="text-muted">Jul 26, 2020</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-12 text-md-right">
              <button class="btn btn-sm btn-primary glow mt-md-2 mb-1">View Report</button>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- table start -->
          <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
            <thead>
              <tr>
                <th>Campaign</th>
                <th>Growth</th>
                <th>Charges</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="{{asset('images/icon/fs.png')}}" alt="card" height="24"
                    width="24">Fastrack Watches
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>30%</span>
                </td>
                <td class="py-1">$5,536</td>
                <td class="text-success py-1">Active</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="{{asset('images/icon/puma.png')}}" alt="card" height="24"
                    width="24">Puma Shoes
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-down text-danger align-middle mr-50"></i><span>15.5%</span>
                </td>
                <td class="py-1">$1,569</td>
                <td class="text-success py-1">Active</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="{{asset('images/icon/nike.png')}}" alt="card" height="24"
                    width="24">Nike Air Jordan
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>70.3%</span>
                </td>
                <td class="py-1">$23,859</td>
                <td class="text-danger py-1">Closed</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="{{asset('images/icon/one-plus.png')}}" alt="card" height="24"
                    width="24">Oneplus 7 pro
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>10.4%</span>
                </td>
                <td class="py-1">$9,523</td>
                <td class="text-success py-1">Active</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="{{asset('images/icon/google.png')}}" alt="card" height="24"
                    width="24">Google Pixel 4 xl
                </td>
                <td class="py-1"><i class="bx bx-trending-down text-danger align-middle mr-50"></i><span>-62.38%</span>
                </td>
                <td class="py-1">$12,897</td>
                <td class="text-danger py-1">Closed</td>
                <td class="text-center py-1">
                  <div class="dropup">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="javascript:;"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- table ends -->
        </div>
      </div>
    </div>
  </div>
</section>
<style type="text/css">
  a.canvasjs-chart-credit {
    display: none;
}
</style>

<?php



 
$chart1 = array( 
  array("label"=>"> 2 Hour", "symbol" => "","y"=>$status2),
  array("label"=>"1/2 <2 Hour", "symbol" => "","y"=>$status1),
  array("label"=>"<1/2 Hour", "symbol" => "","y"=>$status));

$statuslogin2=0;
$statuslogin1=0;
$statuslogin=0;
foreach ($LoginUserData as $key => $value) {

    /*$previousDate = $value->cdate;
    $startdate = new \DateTime($previousDate);
    $endDate   = new \DateTime('now');
    $interval  = $endDate->diff($startdate);
    $time= $interval->format('%H:%i:%s');
   

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
        }*/

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
}

$chart2 = array( 
  array("label"=>"> 2 Hour", "symbol" => "","y"=>$statuslogin2),
  array("label"=>"1/2 <2 Hour", "symbol" => "","y"=>$statuslogin1),
  array("label"=>"<1/2 Hour", "symbol" => "","y"=>$statuslogin));

$rateuser1=0;
$rateuser2=0;
$rateuser3=0;
$rateuser4=0;
$rateuser5=0;
 foreach ($ratings as $key => $value) {
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
 }

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

<script>
window.onload = function() {
 
var chart1 = new CanvasJS.Chart("chart1", {
  theme: "light2",
  animationEnabled: true,
  title: {
    text: ""
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol}  {y}",
    yValueFormatString: "#,##\"\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($chart1, JSON_NUMERIC_CHECK); ?>
  }]
});
chart1.render();


var chart2 = new CanvasJS.Chart("chart2", {
  theme: "light2",
  animationEnabled: true,
  title: {
    text: ""
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol}  {y}",
    yValueFormatString: "#,##\"\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($chart2, JSON_NUMERIC_CHECK); ?>
  }]
});
chart2.render();



var chart3 = new CanvasJS.Chart("chart3", {
  theme: "light2",
  animationEnabled: true,
  title: {
    text: ""
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol}  {y}",
    yValueFormatString: "#,##\"\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($chart3, JSON_NUMERIC_CHECK); ?>
  }]
});
chart3.render();

var chart4 = new CanvasJS.Chart("chart4", {
  theme: "light2",
  animationEnabled: true,
  title: {
    text: ""
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol}  {y}",
    yValueFormatString: "#,##\"\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($chart4, JSON_NUMERIC_CHECK); ?>
  }]
});
chart4.render();
 
}
</script>
</head>
<body>
 
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-scripts')
<script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection

@section('page-scripts')
 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
       
      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,

         //ajax: "{{url('/app/service-contract1')}}",
         ajax: {
            url: "{{url('/dashboard-view')}}",
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
          "order": [[ 5, "desc" ]],
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

                 $('td:eq(4)', nRow).css('display', 'none');
                 //alert(agreeSum);

                  //          var obj = JSON.parse(aData);
                   // console.log(data);


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
                   if(removeTiecket==1 && ticket_multiple==0){
                    var styleticket= "display:none";
                   }

                   var id=  aData.id;
                    if(aData.renew_status==1){
                         
                        $('td:eq(0)', nRow).css('color', 'green');
                        $('td:eq(1)', nRow).css('color', 'green');
                        $('td:eq(2)', nRow).css('color', 'green');
                        $('td:eq(3)', nRow).css('color', 'green');
                        $('td:eq(4)', nRow).css('display', 'none');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");

                    }else if(aData.renew_status==2){
                         
                        $('td:eq(0)', nRow).css('color', '#d86400');
                        $('td:eq(1)', nRow).css('color', '#d86400');
                        $('td:eq(2)', nRow).css('color', '#d86400');
                        $('td:eq(3)', nRow).css('color', '#d86400');
                        $('td:eq(4)', nRow).css('color', '#d86400');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");

                        

                    }else if(aData.renew_status==3){
                         
                        $('td:eq(0)', nRow).css('color', '#c7c1c1');
                        $('td:eq(1)', nRow).css('color', '#c7c1c1');
                        $('td:eq(2)', nRow).css('color', '#c7c1c1');
                        $('td:eq(3)', nRow).css('color', '#c7c1c1');
                        $('td:eq(4)', nRow).css('color', '#c7c1c1');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");

                    }else{
                      $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a><a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a>  ");
                    }

                    if(aData.dueDateColor==1){
                         
                        $('td:eq(5)', nRow).css('color', 'Red');
                         

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
      var oTable = $('#empTable1').DataTable({

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
            url: "{{url('/dashboardTicket')}}",
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
            { data: 'id' },
            { data: 'customer' },
            { data: 'user' },
            { data: 'phone' },
            { data: 'contact' },
            // { data: 'description' },
            { data: 'assign' },
            { data: 'time' },
            { data: 'created_at' },
            { data: 'created_at' },
            

         ],

         "drawCallback": function (settings1) { 
        // Here the response
        var response1 = settings1.json;
        console.log(response1.close);
        // $('.activecont').html(response.renewSum).css('color','green');
        // $('.cancell').html(response.cancell);
        // $('.agree').html(response.agree);
        // $('.expire').html(response.expire);
        },
          
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                   // console.log(aData.id);
                    var id=  aData.id;
                    

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


                     
                         
                    if(aData.ticketstatus==1){   
                      $('td:eq(8)', nRow).html("<a href='javascript:;' class='delete1' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ticket/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>");
                      }else{
                        $('td:eq(8)', nRow).html("<div class='dropdown' ><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/reassign')}}/"+id+"'><i class='bx bx-analyse'></i> Re-Assign</a><a class='dropdown-item' href='{{url('app/ticket/close')}}/"+id+"'><i class='bx bx-check'></i> Close</a></div><a href='javascript:;' class='delete1' data='"+id+"' style='"+hideDelete+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ticket/edit')}}/"+id+"' style='float: left !important;"+tickect_edit+"'><i class='bx bx-edit-alt' ></i></a>");
                      }

                    



                   // $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i> Cancelled</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>  ");
                   // $('td:eq(6)', nRow).html("<a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;''><i class='bx bx-edit-alt' ></i></a>");
                }
      });


      //oTable.ajax.reload();
      $(document).on('click','.submit',function(){
        var status= $('.status').val();
        
      var table  = $('#empTable1').DataTable();
      table.ajax.params({name: 'test'});
      table.draw();
      });
    });


    

    $(document).on('click','.delete1',function(){
        var attr= $(this).attr('data');
        if (confirm('Are you sure you want to delete this ?')) {
        window.location.href = "{{url('app/ticket/delete')}}/"+attr;
        }
        
      });
    </script>


<script src="{{asset('js/scripts/pages/dashboard-ecommerce.js')}}"></script>
@endsection
