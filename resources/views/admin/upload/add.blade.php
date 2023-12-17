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
      @if(Session::has('error'))
      <p class="alert alert-info">{{ Session::get('success') }}</p>
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
                            <input type="radio"  name="tax" value="0" data="service_contract" class="expcheck"> Support

                            <input type="radio"  name="tax" value="2" data="subscription" class="expcheck"> Subscription(csv)
                            <input type="radio"  name="tax" value="3" data="subscriptionictran" class="expcheck"> Subscription(ictran)

                            <input type="radio"  name="tax" value="3" data="training" class="expcheck"> Training
                        </div>
                      </div>



                      <!-- Training Module -->
                      <div class="training" style="display: none">
                    <form action="{{url('/app')}}/trainingUpload" method="post" enctype="multipart/form-data"> 
                    @csrf
                      <div class="form-group">
                        <div class="controls">
                            <label>Start From</label>
                            <input type="text" class="form-control" placeholder="Start From"
                                                                name="start" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Start To</label>
                            <input type="text" class="form-control" placeholder="Start To"
                                 
                                name="to" required="">
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
                      <!-- Training Module -->

                    <!-- subscription ictran -->
                    <div class="subscriptionictran" style="display: none">
                    <form action="{{url('/app')}}/subscriptionictran" method="post" enctype="multipart/form-data"> 
                    @csrf
                      <div class="form-group">
                        <div class="controls">
                            <label>Start From</label>
                            <input type="text" class="form-control" placeholder="Start From"
                                                                name="start" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Start To</label>
                            <input type="text" class="form-control" placeholder="Start To"
                                 
                                name="to" required="">
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

                    <!-- End subscription ictran -->



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

                      <div class="subscription-upload" style="display: none">
                        <form action="{{url('/app')}}/subscription-upload" method="post" enctype="multipart/form-data"> 
                        @csrf
                          

                          <div class="form-group">
                            <div class="controls">
                                <label></label>
                                <input type="file" class="form-control" name="file" required="" accept=".csv">
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

                <div class="brder"></div>
            <a href="{{route('upload-settings.create')}}">Add</a>  
            <!-- users edit account form ends -->
            <style type="text/css">
            .mb-3, .my-3 {
            margin-bottom: 0rem !important;
            }
            .brder {
            border-bottom: 0px solid;
            /* border-style: dashed; */
            color: #f2b95f;
            margin-top: 10px;
            border-bottom: 2px dotted;
            }
            </style>
             <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                 
                <th>Type</th>
                <th>Path</th>
                <th>From</th>
                <th>To</th>
                
                <th>Action</th>
                <th></th>
                 
                 
                 
              </tr>
            </thead>
            <tbody>
              <?php 
              $sets = \DB::table('upload_settings')->get();
              ?>  
              @foreach($sets as $data)
                <tr>
                    <td>
                             <select class="form-control form-control-sm mb-3" name="type">
                                <option value="Arcust" <?php if($data->type=="Arcust"){ echo 'selected'; }?>>Arcust</option>
                                <option value="Support" <?php if($data->type=="Support"){ echo 'selected'; }?>>Support</option>
                                <option value="Subscription(csv)" <?php if($data->type=="Subscription(csv)"){ echo 'selected'; }?>>Subscription(csv)</option>
                                <option value="Subscription(ictran)" <?php if($data->type=="Subscription(ictran)"){ echo 'selected'; }?>>Subscription(ictran)</option>
                                <option value="Subscription(ictran)" <?php if($data->type=="Subscription(ictran)"){ echo 'selected'; }?>>Training</option>
                            </select>

                    </td>

                    <td>
                      <input type="text" class="form-control form-control-sm mb-3" placeholder="Path" name="path" value="{{$data->path}}">
                    </td>

                    <td>
                      <input type="text" class="form-control form-control-sm mb-3" placeholder="From" name="from_s" value="{{$data->from_s}}">
                    </td>

                    <td>
                      <input type="text" class="form-control form-control-sm mb-3" placeholder="To" name="to_s" value="{{$data->to_s}}">
                    </td>
                    <td>
                        <a href="{{ route('upload-settings.edit', $data->id)}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>

                         <a href="{{ route('upload-settings.show', $data->id)}}" onclick="return confirm('Are you sure you want to delete this user')"><i class="bx bx-trash-alt"></i></a>
                    </td>
                    <td><input type="submit"></td>
                     

                     
                </tr>
              @endforeach
            </tbody>
          </table>
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
        $('.subscription-upload').hide();
        $('.subscriptionictran').hide();
        $('.training').hide();

       }else if( atr=='subscription' ){
         $('.subscription-upload').show();
         $('.service_contract').hide();
         $('.arcust').hide();
         $('.subscriptionictran').hide();
         $('.training').hide();

       }else if( atr=='subscriptionictran' ){
         $('.subscriptionictran').show();
         $('.subscription-upload').hide();
         $('.service_contract').hide();
         $('.arcust').hide();
         $('.training').hide();

       }else if( atr=='training' ){
         $('.training').show();
         $('.subscriptionictran').hide();
         $('.subscription-upload').hide();
         $('.service_contract').hide();
         $('.arcust').hide();
       }else{
        $('.service_contract').hide();
        $('.arcust').show();
        $('.subscription-upload').hide();
        $('.subscriptionictran').hide();
        $('.training').hide();

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
