@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users Edit')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit Account</span>
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
            <div class="media mb-2">
                <a class="mr-2" href="javascript:void(0);">
                  <img src="{{asset('profile')}}/{{$edit->profile_pic}}" alt="users avatar"
                      class="users-avatar-shadow rounded-circle" height="64" width="64">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Avatar</h4>
                  <div class="col-12 px-0 d-flex">
                     <!--  <a href="javascript:void(0);" class="btn btn-sm btn-primary mr-25">Change</a> -->
                      <!-- <a href="javascript:void(0);" class="btn btn-sm btn-light-secondary">Reset</a> -->
                  </div>
                </div>
            </div>
             
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form class="form-validate" action="{{url('/app/user/update')}}/{{$edit->id}}" method="post" enctype='multipart/form-data'>
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">

                  <div class="form-group">
                        <div class="controls">
                            <label>Profile Pic</label>
                            <input type="file" class="form-control" placeholder="Username"
                                 
                                name="file" >
                        </div>
                      </div>
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name"
                                value="{{$edit->name}}"
                                name="fname">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>E-mail</label>
                            <input type="email" class="form-control" placeholder="Email"
                                value="{{$edit->email}}"
                                name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Phone"
                                value="{{$edit->phone}}"
                                name="phone">
                        </div>
                      </div>
                  </div>
                  <div class="col-12 col-sm-6">
                  @if(Auth::user()->user_type ==1)
                      <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="user_type">
                        
                            @foreach($roles as $role)
                            <option value="{{$role['id']}}" @if($edit['user_type']==$role['id']) {{'selected'}} @endif>{{$role['role']}}</option>
                            @endforeach
                           
                        </select>
                      </div>
                      @endif 
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1" @if($edit->status==1) {{'selected'}} @endif>Active</option>
                             
                            <option value="0" @if($edit->status==0) {{'selected'}} @endif>Deactive</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <div class="controls">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address"
                                value="{{$edit->address}}"
                                name="address">
                        </div>
                      </div>
                       
                  </div>
                  
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                        changes</button>
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
