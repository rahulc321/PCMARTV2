@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Create Session')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
<?php error_reporting(0); ?>
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection

@section('content')
 <style type="text/css">
   .ui-timepicker-wrapper {
    overflow-y: auto;
    max-height: 150px;
    width: 12.5em !important;
  }
 </style>
<!-- users edit start -->
<section class="users-edit">
  <div class="card">
    <div class="card-body">
      @if (count($errors) > 0)
            <div class="alert alert-success">
                
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <?php
        $module='training_edit';
        $dis='';
        if(in_array($module,Helper::checkPermission())){
          $a=1;
        }else{
          $a=0;
          $dis='disabled';
        }

        ?>
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
            href="#account" aria-controls="account" role="tab" aria-selected="true">
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">@if($a==0) {{'View Session'}} @else {{'Edit Session'}} @endif</span>
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
                            <input type="text" class="form-control" placeholder="Organization Number" name="customer" required="" value="{{$edit->customerId}}" <?=$dis?>>

                             
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Name</label>
                            <input type="text" class="form-control" placeholder="Organization Name" name="customer_name" required="" value="{{$edit->customerName}}" <?=$dis?>>

                             
                        </div>
                      </div>

                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Trainer</label>
                           <select class="form-control" name="trainerId" <?=$dis?>>
                           @foreach($trainers as $trainer)
                             <option value="{{$trainer->id}}" @if($edit->trainerId==$trainer->id) {{'selected'}} @endif>{{$trainer->name}}</option>

                          @endforeach
                           </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Product</label>
                            <input type="text" class="form-control" placeholder="Product" name="Product" required="" value="{{$edit->product}}" <?=$dis?>>

                             
                        </div>
                      </div>
                      
                       
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">

                  


                    <div class="form-group">
                        <div class="controls">
                            <label>Choose Date</label>
                            <input type="text" name="datetimes"  class="form-control" id="datepicker" value="{{date('d-m-Y',strtotime($edit->date))}}" <?=$dis?>/>
                        </div>
                      </div>
                      <div class="col-sm-6" style="float: left;margin-left: -14px;">
                      <div class="form-group">
                        <div class="controls">
                            <label>Start Time</label>
                            <input type="text" name="startTime"  class="form-control" id="start" value="{{date('G:i a',strtotime($edit->startTime))}}" <?=$dis?>/>
                        </div>
                      </div>
                      </div>
                      <div class="col-sm-6" style="float: left;">
                      <div class="form-group">
                        <div class="controls">
                            <label>End Time</label>
                            <input type="text" name="endTime"  class="form-control" id="end" value="{{date('G:i a',strtotime($edit->endTime))}}"<?=$dis?> />
                        </div>
                      </div>

                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="1" @if($edit->status==1) {{'selected'}} @endif>Online</option>
                              <option value="2" @if($edit->status==2) {{'selected'}} @endif>Onsite</option>
                            </select>
                        </div>
                      </div>
                      
                    <div class="form-group">
                        <div class="controls">
                            <label>Remark</label>
                            <textarea class="form-control" <?=$dis?> name="remark" placeholder="Remark">{{$edit->remark}}</textarea>

                             
                        </div>
                      </div>

                    
                     
                    

                  </div>
                 
                  <div  class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                   @if($a==1)
                      <button type="submit"  class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
                     @endif
                      <button type="reset" class="btn btn-light" onclick="goBack()">Back</button>
                  </div>
                 
                </div>
            </form>
            <!-- users edit account form ends -->
        </div>
         
      </div>
    </div>
  </div>
</section>
<!-- { minDate: 0 }<p>Date: <input type="text" id="datepicker"></p> -->

  
<script>
function goBack() {
  window.history.back();
}
</script>
<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.js"></script>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->

<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>

<script>

/******************************************************/
function interval() {

}

$(function () {
  for (var i = 5; i <= 60; i += 5) {
    $('#meeting').append('<option value="' + i + '">' + i + '   min' + '</option>');
  }

  function setEndTime() {
     var meetingLength = parseInt(180 || 0),
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






  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );

  $('#startTime').timepicker({'minTime': '07:00am',});

  $('#endTime').timepicker({
  'minTime': '07:30am',
  'showDuration': true
  });

  $('#startTime').on('changeTime', function() {
  $('#endTime').timepicker('option', 'minTime', $(this).val());
  });


// $(function() {
//   $('input[name="datetimes"]').daterangepicker({
//     timePicker: true,
//     minDate:new Date(),
//     startDate: moment().startOf('hour'),
//     endDate: moment().startOf('hour').add(32, 'hour'),
//     locale: {
//       format: 'd/M/Y hh:mm A'
//     }
//   });
// });
</script>
@endsection
