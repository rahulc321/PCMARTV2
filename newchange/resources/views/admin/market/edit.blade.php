@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Edit Service Contract')
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
   @media (min-width: 300px) and (max-width: 991px){ 

 
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit Service Contract</span>
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
            <form class="form-validate" action="{{url('/app/ictran/update')}}/{{$edit->id}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Customer</label>
                            <input type="text" class="form-control" placeholder="Organization Number"
                                 " value="{{$edit->CUSTNO}}"
                                name="CUSTNO" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Name</label>
                            <input type="text" class="form-control" placeholder="Organization Name"
                                 " value="{{$edit->Organization_Name}}"
                                name="Organization_Name"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Product</label>
                            <select class="js-example-basic-multiple form-control" name="product[]" multiple="multiple">
                             @foreach($products as $product)
                             <option value="{{$product->id}}" @if(in_array($product->id,$CustomerInfo)) {{'selected'}}@endif>{{$product->title}}</option>

                             @endforeach
                            </select>
                             
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Invoive Date</label>
                            <input type="text" class="form-control" placeholder="Invoive Date"
                                 " value="{{date('d-m-Y',strtotime($edit->invoice_date))}}"
                                name="invoice_date"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Invoive No</label>
                            <input type="text" class="form-control" placeholder="Invoive Date"
                                 " value="{{$edit->Contract_Number}}"
                                name="Contract_Number"  >
                        </div>
                      </div>
                     
  
                      
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">

                  <div class="form-group">

                       
                        <div class="controls">
                        
                            <label>Start Date</label>
                            <input type="text" class="form-control" placeholder="Due Date"
                                 " value="{{date('d-m-Y',strtotime($edit->Start_Date))}}"
                                name="Start_Date"  >
                        </div>
                      </div>


                   <div class="form-group">
                        <div class="controls">
                         
                            <label>Due Date</label>
                            <input type="text" class="form-control" placeholder="Due Date"
                                 " value="{{date('d-m-Y',strtotime($edit->Due_date))}}"
                                name="Due_date"  >
                        </div>
                    </div>
                     
                     
                      <div class="form-group">
                        <div class="controls">
                            <label>Support Type</label>
                            <input type="text" class="form-control" placeholder="Support Type"
                                 " value="{{$edit->Support_Type}}"
                                name="Support_Type"  >
                        </div>
                      </div>
                  <div class="form-group">
                        <div class="controls">
                            <label>Price (RM)</label>
                            <input type="text" class="form-control" placeholder="Price (RM)"
                                 " value="{{$edit->Price_RM}}"
                                name="Price_RM"  >
                        </div>
                      </div>

                       
                  </div>
 
                  
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                    @if($read !='readonly')
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit {{$read}}</button>
                    @endif
                      <button type="reset" class="btn btn-light" onclick="goBack()">Cancel</button>
                  </div>
                </div>
            </form>
            <!-- users edit account form ends -->
        </div>
         
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
      $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});


    $('.expcheck').click(function(){
      var atr= $(this).attr('data');
      if($(this).prop("checked") == true){
        var check =1;
      }
      else if($(this).prop("checked") == false){
        var check =0;
      }
      $('.expcheck_'+atr).val(check);
    });
    $('.sagecover').click(function(){
      var atr= $(this).attr('data');
      if($(this).prop("checked") == true){
        var check =1;
      }
      else if($(this).prop("checked") == false){
        var check =0;
      }
      $('.sagecover_'+atr).val(check);
    });
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
