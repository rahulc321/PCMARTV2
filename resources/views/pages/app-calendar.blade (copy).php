{{-- mainLayouts extends --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title', 'Scheduling')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/calendars/tui-time-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/calendars/tui-date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/calendars/tui-calendar.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/calendars/app-calendar.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
{{-- main page content --}}
@section('content')
<?php error_reporting(0); ?>

@if (Session::has('error'))
   <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
<!-- calendar Wrapper  -->
<div class="calendar-wrapper position-relative">
  <!-- calendar app overlay -->
  <div class="app-content-overlay"></div>
  <!-- calendar sidebar start -->
  <div id="sidebar" class="sidebar">
    <div class="sidebar-new-schedule">
      <!-- create new schedule button -->
      <button id="btn-new-schedule" type="button" class="btn btn-primary btn-block sidebar-new-schedule-btn">
        New schedule
      </button>
    </div>
    <!-- sidebar calendar labels -->
    <div id="sidebar-calendars" class="sidebar-calendars">
      <div>
        <div class="sidebar-calendars-item">
          <!-- view All checkbox -->
          <div class="checkbox">
            <input type="checkbox" class="checkbox-input tui-full-calendar-checkbox-square" id="checkbox1" value="all"
              checked>
            <label for="checkbox1">View all</label>
          </div>
        </div>
      </div>
      <div id="calendarList" class="sidebar-calendars-d1"></div>
    </div>
    <!-- / sidebar calendar labels -->
  </div>
  <!-- calendar sidebar end -->
  <!-- calendar view start  -->
  <div class="calendar-view">
    <div class="calendar-action d-flex align-items-center flex-wrap">
      <!-- sidebar toggle button for small sceen -->
      <button class="btn btn-icon sidebar-toggle-btn">
        <i class="bx bx-menu font-large-1"></i>
      </button>
      <!-- dropdown button to change calendar-view -->
      <div class="dropdown d-inline mr-75">
        <button id="dropdownMenu-calendarType" class="btn btn-action dropdown-toggle" type="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i id="calendarTypeIcon" class="bx bx-calendar-alt"></i>
          <span id="calendarTypeName">Dropdown</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu-calendarType">
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-daily">
              <i class="bx bx-calendar-alt mr-50"></i>
              <span>Daily</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-weekly">
              <i class='bx bx-calendar-event mr-50'></i>
              <span>Weekly</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-monthly">
              <i class="bx bx-calendar mr-50"></i>
              <span>Month</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-weeks2">
              <i class='bx bx-calendar-check mr-50'></i>
              <span>2 weeks</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-weeks3">
              <i class='bx bx-calendar-check mr-50'></i>
              <span>3 weeks</span>
            </a>
          </li>
          <li role="presentation" class="dropdown-divider"></li>
          <li role="presentation">
            <div role="menuitem" data-action="toggle-workweek" class="dropdown-item">
              <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-workweek" checked>
              <span class="checkbox-title bg-primary"></span>
              <span>Show weekends</span>
            </div>
          </li>
          <li role="presentation">
            <div role="menuitem" data-action="toggle-start-day-1" class="dropdown-item">
              <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-start-day-1">
              <span class="checkbox-title"></span>
              <span>Start Week on Monday</span>
            </div>
          </li>
          <li role="presentation">
            <div role="menuitem" data-action="toggle-narrow-weekend" class="dropdown-item">
              <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-narrow-weekend">
              <span class="checkbox-title"></span>
              <span>Narrower than weekdays</span>
            </div>
          </li>
        </ul>
      </div>
      <!-- calenadar next and previous navigate button -->
      <span id="menu-navi" class="menu-navigation">
        <button type="button" class="btn btn-action move-today mr-50 px-75" data-action="move-today">Today</button>
        <button type="button" class="btn btn-icon btn-action  move-day mr-50 px-50" data-action="move-prev">
          <i class="bx bx-chevron-left" data-action="move-prev"></i>
        </button>
        <button type="button" class="btn btn-icon btn-action move-day mr-50 px-50" data-action="move-next">
          <i class="bx bx-chevron-right" data-action="move-next"></i>
        </button>
      </span>
      <span id="renderRange" class="render-range"></span>
    </div>
    <!-- calendar view  -->
    <div id="calendar" class="calendar-content"></div>
  </div>
  <!-- calendar view end  -->
</div>
<br>
<section class="users-list-wrapper">
  
  <div class="users-list-table">
    <div class="card">
      

     
      <div class="card-body">
      <form action="{{url('/app/training')}}" id="form2" method="post" style="display: none">
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
                 
                
                <th >Trainer</th>
                <th style="width: 232px;">Customer</th>
                <th >Session</th>
                <th >Product</th>
                <th>date</th>
                <th >Start Time</th>
                <th >End Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach ($schedules as $key => $value) {
       // echo '<pre>'; print_r($value);

        $trainerName= App\Models\Trainer::where('id',$value->trainerId)->first()
        ?>
         
          

              <tr>
                 
                <td>{{$trainerName->name}}</td>
                <td>{{$value->customerName}}</td>
                <td>{{$value->sessionId}}</td>
                <td>{{$value->product}}</td>
                <td>{{date('d-m-Y',strtotime($value->date))}}</td>
                <td>{{$value->startTime}}</td>
                <td>{{$value->endTime}}</td>
                
                 
                
                <td>

                


                 <?php $module='training_edit'; ?>
                 @if(in_array($module,Helper::checkPermission()))
                <!-- <a href="{{asset('app/training/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a> -->
                 @endif
                <?php $module='schedule_delete'; ?>
                @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/scheduling/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="bx bx-trash-alt"></i></a>
                  
                @endif
                </td>
              </tr>
              <?php  }   ?> 
               
               
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
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" style="display: none" data-toggle="modal" data-target="#myModal1">Open Modal</button>

<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
     <form action="{{url('/app/createSchedule')}}" method="post" id="pf">
     @csrf
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Schedule Session</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
        
          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <select name="trainerType" class="form-control cc">
            <option value="1">Training</option>
            <option value="2">Onsite</option>
            <option value="3">Demo</option>
              
            </select>
            </div>
          </div>
          <div class="col-sm-6 appdat" style="float: left;">
               <div class="form-group training">
              <select name="trainerTypeName" class="form-control">
              @foreach($training as $trainer)
              <option value="{{$trainer->id}}">{{$trainer->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group onsite" style="display: none">
              <select name="trainerTypeName" class="form-control">
              @foreach($onsite as $trainer1)
              <option value="{{$trainer1->id}}">{{$trainer1->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group demo" style="display: none">
              <select name="trainerTypeName" class="form-control">
              @foreach($demo as $trainer2)
              <option value="{{$trainer2->id}}">{{$trainer2->name}}</option>
              @endforeach
              </select>
            </div>
          </div>
          </div>

          



          <div class="col-sm-12">

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="companyName" class="form-control" placeholder="Company Name">
            </div>
          </div>
        
          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="custometName" class="form-control" placeholder="Customer Name">
            </div>
          </div>

          <div class="col-sm-6" style="float: left;display: none">
          <div class="form-group">
            <input type="text" name="contactPerson" class="form-control" placeholder="Contact Person">
            </div>
          </div>

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
          </div>

          

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="contactNumber" class="form-control" placeholder="Contact Number">
            </div>
          </div>


         



          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="startDate" class="form-control" id="datepicker" placeholder="Choose Date">
            </div>
          </div>

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="startTime"  class="form-control" id="start" placeholder="Start Time" />
            </div>
          </div>



          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="endTime"  class="form-control" id="end" placeholder="End Time" />
            </div>
          </div>

           <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="remark" class="form-control" placeholder="Remark">
            </div>
          </div>


          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
           <button type="button" class="btn btn-success pf">Submit</button>
            </div>
          </div>


          </div>

           
          
            
        </div>  
      </div>

      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>







<!--  -->



<button type="button" class="btn btn-info btn-lg1" style="display: none" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ap">
    
     <form action="{{url('/app/createSchedule')}}" method="post" id="pf">
     @csrf
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title ap1">Schedule Session</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
        
          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <select name="trainerType" class="form-control cc">
            <option value="1">Training</option>
            <option value="2">Onsite</option>
            <option value="3">Demo</option>
              
            </select>
            </div>
          </div>
          <div class="col-sm-6 appdat" style="float: left;">
             <!--   <div class="form-group training">
              <select name="trainerTypeName" class="form-control">
              @foreach($training as $trainer)
              <option value="{{$trainer->id}}">{{$trainer->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group onsite" style="display: none">
              <select name="trainerTypeName" class="form-control">
              @foreach($onsite as $trainer1)
              <option value="{{$trainer1->id}}">{{$trainer1->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group demo" style="display: none">
              <select name="trainerTypeName" class="form-control">
              @foreach($demo as $trainer2)
              <option value="{{$trainer2->id}}">{{$trainer2->name}}</option>
              @endforeach
              </select>
            </div> -->
          </div>
          </div>

          



          <div class="col-sm-12">

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="companyName" class="form-control" placeholder="Company Name">
            </div>
          </div>
        
          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="custometName" class="form-control" placeholder="Customer Name">
            </div>
          </div>

          <div class="col-sm-6" style="float: left;display: none">
          <div class="form-group">
            <input type="text" name="contactPerson" class="form-control" placeholder="Contact Person">
            </div>
          </div>

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
          </div>

          

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="contactNumber" class="form-control" placeholder="Contact Number">
            </div>
          </div>


         



          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="startDate" class="form-control" id="datepicker" placeholder="Choose Date">
            </div>
          </div>

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="startTime"  class="form-control" id="start" placeholder="Start Time" />
            </div>
          </div>



          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="endTime"  class="form-control" id="end" placeholder="End Time" />
            </div>
          </div>

           <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="remark" class="form-control" placeholder="Remark">
            </div>
          </div>


          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
           <button type="button" class="btn btn-success pf">Submit</button>
            </div>
          </div>


          </div>

           
          
            
        </div>  
      </div>

      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<style type="text/css">
  span.tui-full-calendar-weekday-schedule-title {
    font-size: 12px !important;
}
</style>








  <select name="meeting" id="meeting" style="display: none">
      <option value="180" selected>--Select length--</option>
    </select>


           


@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/calendar/tui-code-snippet.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-dom.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-time-picker.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-date-picker.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/chance.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-calendar.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/extensions/calendar/calendars-data.js')}}"></script>
<script src="{{asset('js/scripts/extensions/calendar/schedules.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment-with-locales.min.js"></script>


<style type="text/css">
  button.tui-full-calendar-popup-edit {
    display: none;
}
button.tui-full-calendar-popup-delete {
    display: none;
}
.tui-full-calendar-popup {
   /* display: none;*/
}

.tui-full-calendar-popup-container {
    display: none;
     
}

.tui-full-calendar-weekday-schedule.tui-full-calendar-weekday-schedule-time {
    line-height: 14px !important;
    padding: 2px;
}
</style>




<script type="text/javascript">


$(document).on('change','.cc',function(){
  var id= $(this).val();
  $('.appdat').html(' ');
  $.ajax({
        url: "{{url('/')}}/app/getTType",
        method:'post',
        data: {'_token':"{{csrf_token()}}",'id': id},
        success:function(ress2){
          $('.appdat').html(ress2);
        }
      });

})


$(document).ready(function(){


  $('.pf').click(function(){
    $(this).hide();
    $('#pf').submit();
  }); 

  $(".cc").change(function(){

    var selValue = $(this).val();

    if(selValue==1){

      $('.training').show();
      $('.onsite').hide();
      $('.demo').hide();

    }

    if(selValue==2){

      $('.training').hide();
      $('.onsite').show();
      $('.demo').hide();

    }

    if(selValue==3){

      $('.training').hide();
      $('.onsite').hide();
      $('.demo').show();

    }

});

});


  /*=========================================================================================
    File Name: toast-ui-calendar.js
    Description: toast-ui-calendar
    --------------------------------------------------------------------------------------
    Item Name: Frest HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
'use strict';

(function (window, Calendar) {
  // variables
  var cal, resizeThrottled;
  var useCreationPopup = true;
  var useDetailPopup = true;

  // default keys and styles of calendar
  var themeConfig = {
    'common.border': '1px solid #DFE3E7',
    'common.backgroundColor': 'white',
    'common.holiday.color': '#FF5B5C',
    'common.saturday.color': '#304156',
    'common.dayname.color': '#304156',
    'month.dayname.borderLeft': '1px solid transparent',
    'month.dayname.fontSize': '1rem',
    'week.dayGridSchedule.borderRadius': '4px',
    'week.timegridSchedule.borderRadius': '4px',
  }

  // calendar initialize here
  cal = new Calendar('#calendar', {
    defaultView: 'month',
    useCreationPopup: useCreationPopup,
    useDetailPopup: useDetailPopup,
    calendars: CalendarList,
    theme: themeConfig,
  // useCreationPopup: false,
   // useDetailPopup: false,
    template: {
      milestone: function (model) {
        return '<span class="bx bx-flag align-middle"></span> <span style="background-color: ' + model.bgColor + '">' + model.title + '</span>';
      },
      allday: function (schedule) {
        return getTimeTemplate(schedule, true);
      },
      time: function (schedule) {
        return getTimeTemplate(schedule, false);
      }
    }
  });

  // calendar default on click event
  cal.on({
    'clickSchedule': function (e) {
     console.log('clickSchedule', e);

     $('.ap').html(' ');
     var id= e.schedule.id;
     $.ajax({
        url: "{{url('/')}}/app/getDataCal",
        method:'post',
        data: {'_token':"{{csrf_token()}}",'id': id},
        success:function(ress2){
          $('.ap').html(ress2);
          $('.ap1').html('Edit Session');
           $('.btn-lg1').trigger( "click" );
        }
      }); 

      $(".tui-full-calendar-popup-top-line").css("background-color", e.calendar.color);
      $(".tui-full-calendar-calendar-dot").css("background-color", e.calendar.borderColor);
    },
    'beforeCreateSchedule': function (e) {
      // new schedule create and save
     // saveNewSchedule(e);
    },
    'beforeUpdateSchedule': function (e) {
      // schedule update
    //  alert(e.schedule.id);

     

      console.log(68687);
      e.schedule.start = e.start;
      e.schedule.end = e.end;
      cal.updateSchedule(e.schedule.id, e.schedule.calendarId, e.schedule);
    },
    'beforeDeleteSchedule': function (e) {
      // schedule delete
      console.log('beforeDeleteSchedule', e);
      cal.deleteSchedule(e.schedule.id, e.schedule.calendarId);
    },
    'clickTimezonesCollapseBtn': function (timezonesCollapsed) {
      if (timezonesCollapsed) {
        cal.setTheme({
          'week.daygridLeft.width': '77px',
          'week.timegridLeft.width': '77px'
        });
      } else {
        cal.setTheme({
          'week.daygridLeft.width': '60px',
          'week.timegridLeft.width': '60px'
        });
      }
      return true;
    }
  });

  // Create Event according to their Template
  function getTimeTemplate(schedule, isAllDay) {
    var html = [];
    var start = moment(schedule.start.toUTCString());
    if (!isAllDay) {
      html.push('<span>' + start.format('HH:mm') + '</span> ');
    }
    if (schedule.isPrivate) {
      html.push('<span class="bx bxs-lock-alt font-size-small align-middle"></span>');
      html.push(' Private');
    } else {
      if (schedule.isReadOnly) {
        html.push('<span class="bx bx-block font-size-small align-middle"></span>');
      } else if (schedule.recurrenceRule) {
        html.push('<span class="bx bx-repeat font-size-small align-middle"></span>');
      } else if (schedule.attendees.length) {
        html.push('<span class="bx bxs-user font-size-small align-middle"></span>');


      }
      // } else if (schedule.location) {
      //   html.push('<span class="bx bxs-map font-size-small align-middle"></span>');
      // }

      var name= schedule.title+'<br><span class="tt">'+schedule.location+'</span>';
     html.push(' ' + name);


     
       console.log(schedule);
    }
    return html.join('');
  }

  // A listener for click the menu
  function onClickMenu(e) {
    var target = $(e.target).closest('[role="menuitem"]')[0];
    var action = getDataAction(target);
    var options = cal.getOptions();
    var viewName = '';
    // on click of dropdown button change calendar view
    switch (action) {
      case 'toggle-daily':
        viewName = 'day';
        break;
      case 'toggle-weekly':
        viewName = 'week';
        break;
      case 'toggle-monthly':
        options.month.visibleWeeksCount = 0;
        options.month.isAlways6Week = false;
        viewName = 'month';
        break;
      case 'toggle-weeks2':
        options.month.visibleWeeksCount = 2;
        viewName = 'month';
        break;
      case 'toggle-weeks3':
        options.month.visibleWeeksCount = 3;
        viewName = 'month';
        break;
      case 'toggle-narrow-weekend':
        options.month.narrowWeekend = !options.month.narrowWeekend;
        options.week.narrowWeekend = !options.week.narrowWeekend;
        viewName = cal.getViewName();

        target.querySelector('input').checked = options.month.narrowWeekend;
        break;
      case 'toggle-start-day-1':
        options.month.startDayOfWeek = options.month.startDayOfWeek ? 0 : 1;
        options.week.startDayOfWeek = options.week.startDayOfWeek ? 0 : 1;
        viewName = cal.getViewName();

        target.querySelector('input').checked = options.month.startDayOfWeek;
        break;
      case 'toggle-workweek':
        options.month.workweek = !options.month.workweek;
        options.week.workweek = !options.week.workweek;
        viewName = cal.getViewName();

        target.querySelector('input').checked = !options.month.workweek;
        break;
      default:
        break;
    }
    cal.setOptions(options, true);
    cal.changeView(viewName, true);

    setDropdownCalendarType();
    setRenderRangeText();
    setSchedules();
  }

  // on click of next and previous button view change
  function onClickNavi(e) {
    var action = getDataAction(e.target);
    switch (action) {
      case 'move-prev':
        cal.prev();
        break;
      case 'move-next':
        cal.next();
        break;
      case 'move-today':
        cal.today();
        break;
      default:
        return;
    }
    setRenderRangeText();
    setSchedules();
  }

  // Click of new schedule button's open schedule create popup
  function createNewSchedule(event) {
    //alert();
    $('.btn-lg').trigger( "click" );
    // var start = event.start ? new Date(event.start.getTime()) : new Date();
    // var end = event.end ? new Date(event.end.getTime()) : moment().add(1, 'hours').toDate();

    // if (useCreationPopup) {
    //   cal.openCreationPopup({
    //     start: start,
    //     end: end
    //   });
    // }
  }
  // new schedule create
  function saveNewSchedule(scheduleData) {
    var calendar = scheduleData.calendar || findCalendar(scheduleData.calendarId);
    var schedule = {
      id: String(chance.guid()),
      title: scheduleData.title,
      isAllDay: scheduleData.isAllDay,
      start: scheduleData.start,
      end: scheduleData.end,
      category: scheduleData.isAllDay ? 'allday' : 'time',
      dueDateClass: '',
      color: calendar.color,
      bgColor: calendar.bgColor,
      dragBgColor: calendar.bgColor,
      borderColor: calendar.borderColor,
      location: scheduleData.location,
      raw: {
        class: scheduleData.raw['class']
      },
      state: scheduleData.state
    };
    if (calendar) {
      schedule.calendarId = calendar.id;
      schedule.color = calendar.color;
      schedule.bgColor = calendar.bgColor;
      schedule.borderColor = calendar.borderColor;
    }

    cal.createSchedules([schedule]);

    refreshScheduleVisibility();
  }

  // view all checkbox initialize
  function onChangeCalendars(e) {
    var calendarId = e.target.value;
    var checked = e.target.checked;
    var viewAll = document.querySelector('.sidebar-calendars-item input');
    var calendarElements = Array.prototype.slice.call(document.querySelectorAll('#calendarList input'));
    var allCheckedCalendars = true;

    if (calendarId === 'all') {
      allCheckedCalendars = checked;

      calendarElements.forEach(function (input) {
        var span = input.parentNode;
        input.checked = checked;
        span.style.backgroundColor = checked ? span.style.borderColor : 'transparent';
      });

      CalendarList.forEach(function (calendar) {
        calendar.checked = checked;
      });
    } else {
      findCalendar(calendarId).checked = checked;

      allCheckedCalendars = calendarElements.every(function (input) {
        return input.checked;
      });

      if (allCheckedCalendars) {
        viewAll.checked = true;
      } else {
        viewAll.checked = false;
      }
    }
    refreshScheduleVisibility();
  }
  // schedule refresh according to view
  function refreshScheduleVisibility() {
    var calendarElements = Array.prototype.slice.call(document.querySelectorAll('#calendarList input'));

    CalendarList.forEach(function (calendar) {
      cal.toggleSchedules(calendar.id, !calendar.checked, false);
    });

    cal.render(true);

    calendarElements.forEach(function (input) {
      var span = input.nextElementSibling;
      span.style.backgroundColor = input.checked ? span.style.borderColor : 'transparent';
    });
  }
  // calendar type set on dropdown button
  function setDropdownCalendarType() {
    var calendarTypeName = document.getElementById('calendarTypeName');
    var calendarTypeIcon = document.getElementById('calendarTypeIcon');
    var options = cal.getOptions();
    var type = cal.getViewName();
    var iconClassName;

    if (type === 'day') {
      type = 'Daily';
      iconClassName = 'bx bx-calendar-alt mr-25';
    } else if (type === 'week') {
      type = 'Weekly';
      iconClassName = 'bx bx-calendar-event mr-25';
    } else if (options.month.visibleWeeksCount === 2) {
      type = '2 weeks';
      iconClassName = 'bx bx-calendar-check mr-25';
    } else if (options.month.visibleWeeksCount === 3) {
      type = '3 weeks';
      iconClassName = 'bx bx-calendar-check mr-25';
    } else {
      type = 'Monthly';
      iconClassName = 'bx bx-calendar mr-25';
    }
    calendarTypeName.innerHTML = type;
    calendarTypeIcon.className = iconClassName;
  }

  function setRenderRangeText() {
    var renderRange = document.getElementById('renderRange');
    var options = cal.getOptions();
    var viewName = cal.getViewName();
    var html = [];
    if (viewName === 'day') {
      html.push(moment(cal.getDate().getTime()).format('YYYY-MM-DD'));
    } else if (viewName === 'month' &&
      (!options.month.visibleWeeksCount || options.month.visibleWeeksCount > 4)) {
      html.push(moment(cal.getDate().getTime()).format('YYYY-MM'));
    } else {
      html.push(moment(cal.getDateRangeStart().getTime()).format('YYYY-MM-DD'));
      html.push('-');
      html.push(moment(cal.getDateRangeEnd().getTime()).format(' MM.DD'));
    }
    renderRange.innerHTML = html.join('');
  }
  // Randome Generated schedule
  function setSchedules() {
    // cal.clear();
    // generateSchedule(cal.getViewName(), cal.getDateRangeStart(), cal.getDateRangeEnd());
    // cal.createSchedules(ScheduleList);
    // refreshScheduleVisibility();
  }
  // Events initialize
  function setEventListener() {
    $('.menu-navigation').on('click', onClickNavi);
    $('.dropdown-menu [role="menuitem"]').on('click', onClickMenu);
    $('.sidebar-calendars').on('change', onChangeCalendars);
    $('.sidebar-new-schedule-btn').on('click', createNewSchedule);
    window.addEventListener('resize', resizeThrottled);
  }
  // get data-action atrribute's value
  function getDataAction(target) {
    return target.dataset ? target.dataset.action : target.getAttribute('data-action');
  }
  resizeThrottled = tui.util.throttle(function () {
    cal.render();
  }, 50);
  window.cal = cal;
  setDropdownCalendarType();
  setRenderRangeText();
  setSchedules();
  setEventListener();
})(window, tui.Calendar);

// set sidebar calendar list
(function () {
  var calendarList = document.getElementById('calendarList');
  var html = [];
  CalendarList.forEach(function (calendar) {
    html.push('<div class="sidebar-calendars-item"><label>' +
      '<input type="checkbox" class="tui-full-calendar-checkbox-round" value="' + calendar.id + '" checked>' +
      '<span style="border-color: ' + calendar.borderColor + '; background-color: ' + calendar.borderColor + ';"></span>' +
      '<span>' + calendar.name + '</span>' +
      '</label></div>'
    );
  });
  calendarList.innerHTML = html.join('\n');
})();

$(document).ready(function () {

  // calendar sidebar scrollbar
  if ($('.sidebar').length > 0) {
    var sidebar = new PerfectScrollbar(".sidebar", {
      wheelPropagation: false
    });
  }
  // sidebar menu toggle
  $(".sidebar-toggle-btn").on("click", function () {
    $(".sidebar").toggleClass("show");
    $(".app-content-overlay").toggleClass("show");
  })
  // on click Overlay hide sidebar and overlay
  $(".app-content-overlay, .sidebar-new-schedule-btn").on("click", function () {
    $(".sidebar").removeClass("show");
    $(".app-content-overlay").removeClass("show");
  });
})

$(window).on("resize", function () {
  // sidebar and overlay hide if screen resize
  if ($(window).width() < 991) {
    $(".sidebar").removeClass("show");
    $(".app-content-overlay").removeClass("show");
  }
})



  cal.createSchedules([
       <?php foreach ($schedulesList as $key => $value) {
       // echo '<pre>'; print_r($value);

        $trainerName= App\Models\Trainer::where('id',$value->trainerId)->first();

        if($value->trainerType == 2){
          $ttype=2;
        }elseif($value->trainerType == 3){
          $ttype=3;
        }else{
          $ttype=1;
        }
        ?>
        
       {
        id: '<?=$value->id?>',
        calendarId: '<?=$ttype?>',
        title: "<?=$trainerName->name?>",
        customerName: 'pppapap',
        category: 'time',
        dueDateClass: '',
        location:'<?=$value->companyName?>',
        start: "<?=$value->date.'T'.$value->startTime?>",
        end: "<?=$value->date.'T'.$value->endTime?>"
    },

       <?php } ?>
       ]);


</script>
<!-- <script src="{{asset('js/scripts/extensions/calendar/app-calendar.js')}}"></script> -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
 
 
 
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      $('#empTable').DataTable({ 
      // "aaSorting": [[ 6, "asc" ]] 
       order: [
                [6, 'asc']
            ],
    });
    </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.js"></script>

  <link rel="stylesheet" href="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.css">
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );

  /******************************************************/
function interval() {

}

$(function () {
  for (var i = 5; i <= 60; i += 5) {
    $('#meeting').append('<option value="' + i + '">' + i + '   min' + '</option>');
  }

  function setEndTime() {
     var meetingLength = parseInt($('#meeting').find('option:selected').val() || 0),
         selectedTime = $('#start').timepicker('getTime');
      selectedTime.setMinutes(selectedTime.getMinutes() + parseInt(meetingLength, 10), 0);
      $('#end').timepicker('setTime', selectedTime);
  }
  
  $('#start').timepicker({
    'minTime': '8:00 AM',
    'maxTime': '9:00 PM',
    'step': 5
  }).on('changeTime', function () {
    setEndTime();
  });

  $('#end').timepicker({
    'minTime': '8:00 AM',
    'maxTime': '9:00 PM',
    'step': 5
  });
  
  $('#meeting').bind('change', function () {
     setEndTime();
  });
});






/*******************************************************/




  </script>
@endsection
