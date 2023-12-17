@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Add Lead')
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
 .mb-3, .my-3 {
    margin-bottom: 1rem !important;
}
</style>
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Add Lead</span>
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
            <form class="form-validate" action="{{route('prospect.store')}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Lead Owner</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Lead Owner" name="lead_owner" required="" readonly="" value="{{\Auth::user()->name }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Name</label>
                             <input type="text" class="form-control form-control-sm mb-3" placeholder="Name" name="name" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Phone </label>
                             <input type="text" class="form-control form-control-sm mb-3" placeholder="Phone" name="phone" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Mobile</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Mobile" name="mobile" required="">
                        </div>
                      </div>
                      <?php
                      $catName= App\Models\ProductCat::where('type',1)->get();
                       ?>
                      <div class="form-group">
                        <div class="controls">
                            <label>Lead Source</label>
                             <select class="form-control form-control-sm mb-3" name="lead_source">
                                <option value="">Select</option>
                                @foreach($catName as $cName)
                                <option value="{{$cName->id}}">{{$cName->cat_name}}</option>
                                @endforeach
                             </select>
                        </div>
                      </div>
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">
                  <div class="form-group">
                        <div class="controls">
                            <label>Company</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Company" name="company" required="">
                        </div>
                      </div>
                     <div class="form-group">
                        <div class="controls">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-sm mb-3" placeholder="Email" name="email" required="">
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <div class="controls">
                            <label>Website</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Website" name="website" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Lead Status</label>
                            <select class="form-control form-control-sm mb-3" name="lead_status">
                                <option value="Open">Open</option>
                                <option value="Close">Close</option>
                                <option value="Not interest">Not interest</option>
                            </select>
                             
                        </div>
                      </div>
                  </div>
                </div>
                  <h5>Additional Information</h5>
                  <div class="row">
                  <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>Street</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Street" name="street" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>State</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="State" name="state" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Country</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Country" name="country" required="">
                        </div>
                      </div>
                  </div>
                  <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>City</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="City" name="City" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>ZipCode</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="ZipCode" name="zipcode" required="">
                        </div>
                      </div>

                       <div class="form-group">
                        <div class="controls">
                            <label>Description</label>
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="Description"  name="description" required="">
                        </div>
                      </div>

                  </div>
                  </div>

                  
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
                      <button type="reset" class="btn btn-light" onclick="goBack()">Cancel</button>
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
