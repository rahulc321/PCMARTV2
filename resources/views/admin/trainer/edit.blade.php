@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Edit Trainer')
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit Trainer</span>
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
            <form class="form-validate" action="{{url('/app/trainer/update')}}/{{$edit->id}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Trainer Name</label>
                            <input type="text" class="form-control" placeholder="Trainer Name" name="fname" required="" value="{{$edit->name}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" required="" value="{{$edit->phone}}">
                        </div>
                      </div>

                     <!--  <div class="form-group">
                        <div class="controls">
                            <label>1st User</label>
                            <input type="text" class="form-control" placeholder="1st User" name="first_user">
                        </div>
                      </div> -->

                      <!--  -->


                        <div class="form-group">
                        <div class="controls">

                            <?php
                            $ty = explode(',',$edit->trainerType);
                            //echo '<pre>';print_r($ty);

                            ?>


                            <label>Trainer Type</label>
                            <select name="trainerType[]" class="form-control js-example-basic-multiple" multiple="multiple">
                            <option value="1" <?php if (in_array(1, $ty)){ echo 'selected'; } ?>>Training</option>
                            <option value="2" <?php if (in_array(2, $ty)){ echo 'selected'; } ?>>Onsite</option>
                            <option value="3" <?php if (in_array(3, $ty)){ echo 'selected'; } ?>>Demo</option>
                            <option value="5" <?php if (in_array(3, $ty)){ echo 'selected'; } ?>>On Leave</option>

                            </select>
                        </div>
                    </div>
                       
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <div class="controls">
                            <label>Email</label>
                            <input type="text" value="{{$edit->email}}" class="form-control" placeholder="Email" name="email">
                        </div>
                      </div>
                    
                    <div class="form-group">
                        <div class="controls">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="1" {{($edit->status==1) ? 'selected' : ''}}>Active</option>
                              <option value="0" {{($edit->status==0) ? 'selected' : ''}}>In-Active</option>
                            </select>
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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>
@endsection
