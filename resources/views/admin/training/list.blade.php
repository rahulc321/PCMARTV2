@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Training')
{{-- vendor styles --}}
@section('vendor-styles')
<?php  error_reporting(0); ?>
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
    padding: -0.533rem 9.5rem;
    /* font-size: 1rem; */
    /* line-height: 1.6rem; */
    border-radius: 0.267rem;
    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    padding: 2px;
    color: white;
}
 
span {
  content: "\0031";
}
.ww{
  float: left !important;
    border-radius: 34px;
    width: 25px;
}
table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 0px !important;
}

table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 0px !important;
    padding-left: 1px !important;
}
.form-group.f {
    margin-left: 105px;
}
</style>

<section id="widgets-Statistics">
  
  <div class="row">
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">None</p>
          <h2 class="mb-0"><span class="activecont1"><?=$none?></span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
            <i class="bx  bx-money"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Session 2</p>
          <h2 class="mb-0"><span class="agree4"><?=$session2?></span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bx-check"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis"><span style="color:green"><?=date('F')?></span> Training</p>
          <h2 class="mb-0"><span class="cancell1"><?=$thisMonth?></span></span></h2>


        </div>
      </div>
    </div>
     
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
            <i class="bx bx-money font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis"><span style="color:green"><?=date('F')?></span> Training $</p>
          <h2 class="mb-0"><span class="expire2">{{$thisMonthValue}}</span></h2>
        </div>
      </div>
    </div>



    <div class="col-xl-8 col-md-4 col-sm-6">
        
      <div class="card">
        <form action="{{url('/app/training')}}" id="form2" method="post">
        @csrf
          <div class="form-group" style="float: left;margin-left: 10px;">
          <label>Year</label>
          <select class="form-control typeww" style="width: 100%" name="month">
            <option value="">--Select--</option>
            @foreach($invoice_date2 as $invoice_dateDate)
            <option value="{{$invoice_dateDate}}" <?php if($invoice_dateDate==@$_REQUEST['month']){ echo 'selected'; } ?>>{{$invoice_dateDate}}</option>
            @endforeach
          </select>
          </div>

          <div class="form-group f">
          <label>Type</label>
          <select class="form-control typeww1" style="width: 16%" name="typeww">
            <option value="">--Select--</option>
            @foreach($Support_Type as $support)
            <option value="{{$support->product}}" <?php if($support->product==@$_REQUEST['typeww']){ echo 'selected'; } ?>>{{$support->product}}</option>
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
          <h4 class="card-title">Product</h4>
         <!--  <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i> -->
         <form action="{{url('/app/training')}}" id="form3" method="post">
        @csrf
          <div class="form-group" style="float: left;margin-left: 10px;">
          <label>Year</label>
          <select class="form-control form3" style="width: 100%" name="form3Year">
            <option value="">--Select--</option>
            @foreach($invoice_date2 as $invoice_dateDate)
            <option value="{{$invoice_dateDate}}" <?php if($invoice_dateDate==@$_REQUEST['form3Year']){ echo 'selected'; } ?>>{{$invoice_dateDate}}</option>
            @endforeach
          </select>
          </div>

           
        </form>
        </div>
        <div id="chart3"></div>
        <div class="card-body ff">
        <style type="text/css">
          
            .col-sm-2 {

            max-width: 49.66667%;
            }
            .card-body.ff {
            height: 201px;
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
            margin-top: -27px;
            }
        </style>
        <?php foreach ($arrayChart as $key => $value) {
          //echo '<pre>';print_r($value['sum'] !=0);

          if($value['sum'] !=0){
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

        <?php  } } ?>
          
            
           
          
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
      <form action="{{url('/app/training')}}" id="form2" method="post">
        @csrf
           <div class="form>">
                          <!-- <div class="form-group" style="float: left;">
                            <label>Status</label>
                            <select class="form-control status" id="invoice" style="width:106px">
                            <option value="">--Select--</option>
                               
                              <option value="0">Active</option>
                              <option value="1">Renew</option>
                              <option value="2">Agree</option>
                              <option value="3">Cancel</option>
                            </select>
                          </div> -->

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Product</label>
                            <select class="form-control status" id="customer" style="" name="product">
                            <option value="">--Select--</option>
                              @foreach($product as $pro)
                              <option value="{{$pro->description}}" @if($_REQUEST['product']==$pro->description) {{'selected'}} @endif>{{$pro->description}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="form-group" style="float: left;width:112px;margin-left: 10px">
                            <label>Session</label>
                            <select class="form-control status" id="type" style="" name="session">
                            <option value="">--Select--</option>
                              <option value="none" @if($_REQUEST['session']=='none') {{'selected'}} @endif>None</option>
                              <option value="1" @if($_REQUEST['session']==1) {{'selected'}} @endif>Session 1</option>
                              <option value="1_2" @if($_REQUEST['session']=='1_2') {{'selected'}} @endif>Session 1-2</option>
                              <option value="2" @if($_REQUEST['session']==2) {{'selected'}} @endif>Session 2</option>
                            </select>
                          </div>

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Trainer</label>
                            <select class="form-control status" id="customer" style="" name="trainer">
                             <option value="">--Select--</option>
                             @foreach($trainers as $trainer)
                             <option value="{{$trainer->id}}" @if($_REQUEST['trainer']==$trainer->id) {{'selected'}} @endif>{{$trainer->name}}</option>

                            @endforeach
                              
                            </select>
                          </div>

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Status</label>
                            <select class="form-control" name="status">
                            <option value="">--Select--</option>
                              <option value="1" @if($_REQUEST['status']==1) {{'selected'}} @endif>Online</option>
                              <option value="2" @if($_REQUEST['status']==2) {{'selected'}} @endif>Onsite</option>
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
                             <input type="text" class="form-control" id="startDate" name="startDate" value="{{$_REQUEST['startDate']}}">
                             
                          </div>
                          <div class="form-group"  style="float: left;width:125px;margin-left: 10px">
                            <label>To</label>
                            <input type="text" id="endDate" value="{{$_REQUEST['endDate']}}" class="form-control" name="endDate">
                             
                             
                          </div> 

                          <div class="form-group jj">
                          <label></label>
                          <button type="submit" class="btn btn-success submit" style="    margin-top: 23px;padding: 6px;"><i class="bx bx-search-alt-2"></i></button>
                          <a href="{{url('/app/training')}}" class="btn btn-warning" style="    margin-top: 23px;padding: 6px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>
        </form>
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
        <div class="table-responsive">
          <table id="empTable" class="table">
            <thead>
              <tr>
                 
                
                <th >Invoice</th>
                <th style="width: 232px;">Customer</th>
                <th >Code</th>
                <th >Product</th>
                <th >Value</th>
                <th style="">Trainee</th>
                <th style="width: 88px !important;">Date</th>
                <th >Session</th>
                
                 
                 
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $ids=[]; ?>
               @foreach($training as $key=>$value) 
               <?php 
               
               //echo '<pre>';print_r(count($value['getCountDta']));
                // $checkSess1= App\Models\ScheduleSession::where('sessionId',1)->where('trainingId',$value->id)->count();
                // $checkSess2= App\Models\ScheduleSession::where('sessionId',2)->where('trainingId',$value->id)->count();

                // if($checkSess1 > 0){
                //   $text= '1';
                //   $class="danger";
                // }else{
                //   $text= '1';
                //   $class="success";
                // }

                // if($checkSess2 > 0){
                //   $text1= '2';
                //   $class1="danger";
                // }else{
                //   $text1= '2';
                //   $class1="success";
                // }

                $module='training_edit';

                



               if(count($value['getCountDta'])== $c || $value['getCountDta']=='none' || $c==''){
                ?>

              <tr>
                 
                <td>{{$value->Invoice}}</td>
                <td>{{$value->customer_name}}</td>
                <td>{{$value->code}}</td>
                <td>{{$value->product}}</td>
                <td>{{$value->value}}</td>
                
                <td style="text-align: center !important;">{{$value->trainee}}</td>
                <td><span style="display: none">{{date('Y-m-d',strtotime($value->invoice_date))}}</span>{{date('d-m-Y',strtotime($value->invoice_date))}}</td>
                 
                 
                 <td>
                 <?php for ($i=1; $i <= $value->noOfSession; $i++) { 
                  $checkSess= App\Models\ScheduleSession::where('sessionId',$i)->where('trainingId',$value->id)->count();
                  $check= $checkSess;
                  if($check > 0){
                  $ids[]=App\Models\ScheduleSession::where('sessionId',$i)->where('trainingId',$value->id)->first()->toArray();
                  $text= '1';
                  $class="danger";
                  }else{
                    $text= '1';
                    $class="success";
                  }

                  $url= asset('app/sessionView').'/'.$value->id.'/'.$i;
                  ?>
                   

                 <a href="@if($check > 0) {{'javascript:;'}} @else {{asset('app/session')}}/{{$value->id}}/{{$i}} @endif" class="btn btn-{{$class}} ww test000" onclick="myOverFunction(<?=$value->id.$i?>)" data="<?=$value->id.'_'.$i?>" style="float: left !important;margin-left: 2px;">
                 {{$i}}
                 </a>
               <!--  <a href="@if($checkSess2 > 0) {{$url}} @else {{asset('app/session')}}/{{$value->id}}/2 @endif" class="btn btn-{{$class1}} ww" style="float: left !important;margin-left: 2px;">
                   {{$text1}}
                </a> -->
                <?php } ?>

                </td>
                
                <td>

                


                 <?php $module='training_edit'; ?>
                 @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/training/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>
                 @endif
                <?php $module='training_delete'; ?>
                @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/training/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="bx bx-trash-alt"></i></a>
                  
                @endif
                </td>
              </tr>
              <?php  }  ?> 
              @endforeach
               
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</section>
<!-- users list ends -->


<!-- Model Code -->
<!-- Button to Open the Modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_99_2">
  Open modal
</button> -->
<?php //echo '<pre>';print_r($ids); ?>
@foreach($ids as $key=>$edit)

<?php
$url= asset('app/sessionView').'/'.$edit['trainingId'].'/'.$edit['sessionId'];
$dis='disabled';
?>
<!-- The Modal -->
<div class="modal" id="myModal_{{$edit['trainingId'].$edit['sessionId']}}">
  <div class="modal-dialog">
    <div class="modal-content">

       <section class="users-edit">
  <div class="card" style="margin: 0;">
    <div class="card-body">
      


        
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
            href="<?=$url?>" aria-controls="account" role="tab" aria-selected="true">
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">View Session</span>

        </a>

        </li>
        <li class="nav-item">
        <!-- <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
            href="#information" aria-controls="information" role="tab" aria-selected="false">
          <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Information</span>
        </a> -->
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
             
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form class="form-validate" action="{{url('/app/updatesession/')}}/{{$id}}/{{$sId}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Number</label>
                            <input type="text" class="form-control" placeholder="Organization Number" name="customer" required="" value="{{$edit['customerId']}}" <?=$dis?>>

                             
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Name</label>
                            <input type="text" class="form-control" placeholder="Organization Name" name="customer_name" required="" value="{{$edit['customerName']}}" <?=$dis?>>

                             
                        </div>
                      </div>

                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Trainer</label>
                           <select class="form-control" name="trainerId" <?=$dis?>>
                           @foreach($trainers as $trainer)
                             <option value="{{$trainer->id}}" @if($edit['trainerId']==$trainer->id) {{'selected'}} @endif>{{$trainer->name}}</option>

                          @endforeach
                           </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Product</label>
                            <input type="text" class="form-control" placeholder="Product" name="Product" required="" value="{{$edit['product']}}" <?=$dis?>>

                             
                        </div>
                      </div>
                      
                       
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">

                  


                    <div class="form-group">
                        <div class="controls">
                            <label>Choose Date</label>
                            <input type="text" name="datetimes"  class="form-control" id="datepicker" value="{{date('d-m-Y',strtotime($edit['date']))}}" <?=$dis?>/>
                        </div>
                      </div>
                      <div class="col-sm-6" style="float: left;margin-left: -14px;">
                      <div class="form-group">
                        <div class="controls">
                            <label>Start Time</label>
                            <input type="text" name="startTime"  class="form-control" id="start" value="{{date('G:i a',strtotime($edit['startTime']))}}" <?=$dis?>/>
                        </div>
                      </div>
                      </div>
                      <div class="col-sm-6" style="float: left;">
                      <div class="form-group">
                        <div class="controls">
                            <label>End Time</label>
                            <input type="text" name="endTime"  class="form-control" id="end" value="{{date('G:i a',strtotime($edit['endTime']))}}"<?=$dis?> />
                        </div>
                      </div>

                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="1" @if($edit['status']==1) {{'selected'}} @endif>Online</option>
                              <option value="2" @if($edit['status']==2) {{'selected'}} @endif>Onsite</option>
                            </select>
                        </div>
                      </div>
                      
                    <div class="form-group">
                        <div class="controls">
                            <label>Remark</label>
                            <textarea class="form-control" <?=$dis?> name="remark" placeholder="Remark">{{$edit['remark']}}</textarea>

                             
                        </div>
                      </div>

                    
                    <a href="<?=$url?>">Edit</a>
                    <!-- Modal footer -->
      
        
                   <button type="button" style="float: right;" class="btn btn-danger" rel="{{$edit['trainingId'].$edit['sessionId']}}" data-dismiss="modal">Close</button>

                  </div>
                 
                  
                 
                </div>
            </form>
            <!-- users edit account form ends -->
        </div>
         
      </div>
    </div>
  </div>
</section>

      

    </div>
  </div>
</div>
<!-- Model Code -->
@endforeach






<?php
$purchased= $currentYear;

// Second array for sold product 
$sold= $lastYear; 

?>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
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
  $('#empTable').DataTable({ 
      // "aaSorting": [[ 6, "asc" ]] 
       order: [
                [6, 'asc']
            ],
    });

  function myOverFunction(id){
    $('#myModal_'+id).show();
  }


  $(function () {

          // $( ".test000" ).hover(function() {
          //   var id= $(this).attr('data');
          //   alert(id);
          //  $('#myModal_'+id).show();
          // });

          $('.btn-danger').click(function(){
            var id= $(this).attr('rel');
           $('#myModal_'+id).hide();
          });


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

          $('.typeww').change(function(){
          $('#form2').submit();
          });
          $('.typeww1').change(function(){
          $('#form2').submit();
          });
           $('.form3').change(function(){
          $('#form3').submit();
          });
      });



  // Column Chart
  // ----------------------------------
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





 var $primary = '#5A8DEE',
            $success = '#39DA8A',
            $danger = '#FF5B5C',
            $warning = '#FDAC41',
            $info = '#39DA8A',
            $label_color_light = '#39DA8A';

            var themeColors = [$primary, $info, $danger, $success, '#39DA8A'];


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
      


</script>
@endsection
