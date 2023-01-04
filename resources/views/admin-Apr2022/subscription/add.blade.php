@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Edit Subscription')
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
 <?php
 $read=0;
 if($read==1){
  $read='readonly';
 }else{
  $read='';
 }
 ?>
 <style type="text/css">
    .cstmFormC{
      width: 75px;
      display: inline-block;
      margin-right: 10px;
    }
    .cstmFormCWd{
      width: 110px;
      display: inline-block;
      margin-right: 10px;
    }
    .cstmFormCO{
      width: 160px;
      display: inline-block;
      margin-right: 10px;
    }
    .messg-tab{
      width: 100%;
      display: inline-block;
    }
    .messg-tab h4{
      float: left;
    }
    .messg-tab .addMoreBtn, .addMoreBtnIn{
      float: right;
    }
    span.addRemoveBtn, .addRemoveBtnIN {
    font-size: 16px;
    color: red;
    cursor: pointer;
    }
    p.other-info-error {
        color: red;
        text-align: center;
        margin: 0;
        display: none;
    }
   @media (min-width: 300px) and (max-width: 991px){ 
  }
  }
  }

 
.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    overflow-y: scroll;
}
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
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
            href="#account" aria-controls="account" role="tab" aria-selected="true">
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Add Subscription</span>
        </a>
        </li>
        <li class="nav-item">
        <!-- <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
            href="#information" aria-controls="information" role="tab" aria-selected="false">
          <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Information</span>
        </a> -->
        </li>
      </ul>

    <form class="form-validate" id="" action="{{url('/app/customer-subscription-store')}}" method="post">
                
                @csrf

                      <div class="form-group">
                        <div class="controls">
                            <label>Customer Id</label>
                            <input type="text" class="form-control" placeholder="Customer Id" name="customer_id" >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Code</label>
                            <select class="form-control selectSubs" name="code">
                              <option>Select Code</option>
                              @foreach($subscriptions as $key=>$subscription)
                                <option value="{{$subscription->code}}">{{$subscription->code}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Sno Number</label>
                            <input type="text" class="form-control" placeholder="Sno Number" name="sno_number" >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Account Code</label>
                            <input type="text" class="form-control" placeholder="Account Code" name="account_code" >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Activation Code</label>
                            <input type="text" class="form-control" placeholder="Activation Code" name="activation_code" >
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <div class="controls">
                            <label>User</label>
                            <input type="text" class="form-control" placeholder="User" name="user" maxlength="3">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Start</label>
                            <input type="date" class="form-control" placeholder="Start" name="start" >
                        </div>
                      </div>



            
                      <div class="form-group">
                        <div class="controls">
                            <label>Expire</label>
                            <input type="date" class="form-control" placeholder="Expire" name="expire" >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Location</label>
                            <input type="text" class="form-control" placeholder="Location" name="location" >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Counter</label>
                            <input type="text" class="form-control" placeholder="Counter" name="counter" >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Remark</label>
                            <input type="text" class="form-control" placeholder="Remark" name="remark" >
                        </div>
                      </div>


                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                    
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 customerSubmit">Submit {{$read}}</button>
                    
                      <button type="reset" class="btn btn-light" onclick="goBack()">Cancel</button>
                  </div>
</form>


      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
             
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            
            <!-- users edit account form ends -->
        </div>
         
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(document).ready(function(){

});


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
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection
