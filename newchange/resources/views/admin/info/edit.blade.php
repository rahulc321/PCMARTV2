@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Edit Info')
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit Info</span>
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
            <form class="form-validate" action="{{url('/app/info/update')}}/{{$edit->id}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name"
                                 " value="{{$edit->company_name}}"
                                name="company_name" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Company Number</label>
                            <input type="text" class="form-control" placeholder="Company Number"
                                 " value="{{$edit->company_number}}"
                                name="company_number" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address"
                                 " value="{{$edit->address}}"
                                name="address" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Phone"
                                 " value="{{$edit->phone}}"
                                name="phone" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Attention</label>
                            <input type="text" class="form-control" placeholder="Attention"
                                 " value="{{$edit->attention}}"
                                name="attention" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Email"
                                 " value="{{$edit->email}}"
                                name="email" required="">
                        </div>
                      </div>
                     
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">

                   <div class="form-group">
                        <div class="controls">
                            <label>Website</label>
                            <input type="text" class="form-control" placeholder="Website"
                                 " value="{{$edit->website}}"
                                name="website" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>FB</label>
                            <input type="text" class="form-control" placeholder="FB"
                                 " value="{{$edit->fb}}"
                                name="fb" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Skype</label>
                            <input type="text" class="form-control" placeholder="Skype"
                                 " value="{{$edit->skype}}"
                                name="skype" required="">
                        </div>
                      </div>
                    <div class="form-group">
                        <div class="controls">
                            <label>Tax Number</label>
                            <input type="text" class="form-control" placeholder="Tax Number"
                                 " value="{{$edit->tax_number}}"
                                name="tax_number" >
                        </div>
                  </div>
                  
                  <div class="form-group">
                        <div class="controls">
                            <label>Tax %</label>
                            <input type="text" class="form-control" placeholder="Tax"
                                 " value="{{$edit->tax}}"
                                name="tax" required="">
                        </div>
                  </div>
                  
                  <div class="form-group">
                        <div class="controls">
                            <label>Other</label>
                            <input type="text" class="form-control" placeholder="Other"
                                 " value="{{$edit->other}}"
                                name="other" required="">
                        </div>
                      </div>
                   
                       

                       
                  </div>
                  

                  
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
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
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection
