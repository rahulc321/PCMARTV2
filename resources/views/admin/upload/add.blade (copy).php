@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Uploads')
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
<!-- users edit start -->
<style type="text/css">
 
</style>
<section class="users-edit">
  <div class="card">
    <div class="card-body">
      @if(Session::has('message'))
      <p class="alert alert-info">{{ Session::get('message') }}</p>
      @endif
      @if(Session::has('error'))
      <p class="alert alert-danger">{{ Session::get('error') }}</p>
      @endif
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
            href="#account" aria-controls="account" role="tab" aria-selected="true">
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Uploads</span>
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
            
                
                
                <div class="row">
                  <div class="col-12 col-sm-12">

                      <div class="form-group">
                        <div class="controls">
                            <label>File Type</label>
                            <br>
                            <input type="radio"  name="tax" checked value="1" class="expcheck" data="customer"> Arcust
                            <input type="radio"  name="tax" value="0" data="service_contract" class="expcheck"> Ictran
                        </div>
                      </div>

                    <div class="service_contract" style="display: none">
                    <form action="{{url('/app')}}/ictrain" method="post" enctype="multipart/form-data"> 
                    @csrf
                      <div class="form-group">
                        <div class="controls">
                            <label>Start From</label>
                            <input type="text" class="form-control" placeholder="Start From"
                                                                name="start" >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Start To</label>
                            <input type="text" class="form-control" placeholder="Start To"
                                 
                                name="to" >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label></label>
                            <input type="file" class="form-control" name="file" required="">
                        </div>
                      </div>

                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
                      <button type="reset" class="btn btn-light" onclick="goBack()">Cancel</button>
                  </div>

                      </form>
                      </div>



                      <div class="arcust">
                    <form action="{{url('/app')}}/arcust" method="post" enctype="multipart/form-data"> 
                    @csrf
                      

                      <div class="form-group">
                        <div class="controls">
                            <label></label>
                            <input type="file" class="form-control" name="file" required="">
                        </div>
                      </div>

                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
                      <button type="reset" class="btn btn-light" onclick="goBack()">Cancel</button>
                  </div>

                      </form>
                      </div>
                       
                      
                       
                      
                  </div>
                   
                  
                  

                  
                  
                </div>
             
            <!-- users edit account form ends -->
        </div>
         
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<script>

$(document).ready(function(){
   
    $('.expcheck').click(function(){
      var atr= $(this).attr('data');
       if(atr=='service_contract'){
        $('.service_contract').show();
        $('.arcust').hide();

       }else{
        $('.service_contract').hide();
        $('.arcust').show();
       }
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
@endsection
