@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Edit')
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit</span>
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
            <form class="form-validate" action="{{ route('upload-settings.update', $edit->id)}}" method="post">
                
                @csrf
                @method('PUT')
                 

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                        <div class="controls">
                            <label>Type</label>
                            <select class="form-control form-control-sm mb-3" name="type">
                                <option value="Arcust" <?php if($edit->type=="Arcust"){ echo 'selected'; }?>>Arcust</option>
                                <option value="Support" <?php if($edit->type=="Support"){ echo 'selected'; }?>>Support</option>
                                <option value="Subscription(csv)" <?php if($edit->type=="Subscription(csv)"){ echo 'selected'; }?>>Subscription(csv)</option>
                                <option value="Subscription(ictran)" <?php if($edit->type=="Subscription(ictran)"){ echo 'selected'; }?>>Subscription(ictran)</option>
                                <option value="Subscription(ictran)" <?php if($edit->type=="Subscription(ictran)"){ echo 'selected'; }?>>Training</option>
                            </select>
                        </div>
                      </div>
                  </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                        <div class="controls">
                            <label>Path</label>
                             <input type="text" class="form-control form-control-sm mb-3" placeholder="C:\computer\file" name="path" required="" value="{{$edit->path}}">
                        </div>
                      </div>
                  </div>

                  <div class="col-sm-3">
                       <div class="form-group">
                        <div class="controls">
                            <label>Company</label>
                             <input type="text" value="{{$edit->company}}" class="form-control form-control-sm mb-3" placeholder="Company" name="company" required="">
                        </div>
                      </div>
                  </div>

                   <div class="col-sm-3">
                     <div class="form-group">
                        <div class="controls">
                            <label>From</label>
                             <input type="text" value="{{$edit->from_s}}" class="form-control form-control-sm mb-3" placeholder="From" name="from_s"">
                        </div>
                      </div>
                  </div>
                   <div class="col-sm-3">
                       <div class="form-group">
                        <div class="controls">
                            <label>To</label>
                             <input type="text" value="{{$edit->to_s}}" class="form-control form-control-sm mb-3" placeholder="To" name="to_s">
                        </div>
                      </div>
                  </div>

                  


                  <div class="col-sm-3">
                       <div class="form-group">
                        <div class="controls">
                            <label>Description</label>
                             <input type="text" value="{{$edit->description}}" class="form-control form-control-sm mb-3" placeholder="Description" name="description">
                        </div>
                      </div>
                  </div>

                </div>
                   

                  
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Update</button>
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
