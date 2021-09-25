@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Add Setting')
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Add Setting</span>
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
            <form class="form-validate" action="{{url('/app/settings/store')}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="title"
                                 "
                                name="title" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Description</label>
                            <input type="text" class="form-control" placeholder="Description"
                                 "
                                name="description" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>1st User : RM </label>
                            <input type="text" class="form-control" placeholder="1st User"
                                 "
                                name="first_user" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Add User : RM</label>
                            <input type="text" class="form-control" placeholder="Add User"
                                 "
                                name="add_user" required="">
                        </div>
                      </div>
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">
                  <div class="form-group">
                        <div class="controls">
                            <label>New</label>
                            <input type="text" class="form-control" placeholder="Add User"
                                 "
                                name="new" required="">
                        </div>
                      </div>
                  <div class="form-group">
                        <div class="controls">
                            <label>Renew</label>
                            <input type="text" class="form-control" placeholder="Renew"
                                 "
                                name="renew" required="">
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <div class="controls">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name"
                                 "
                                name="company_name" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Tax</label>
                            <br>
                            <input type="radio"  name="tax" required="" checked value="1"> Yes
                            <input type="radio"  name="tax" required="" value="0"> No
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
