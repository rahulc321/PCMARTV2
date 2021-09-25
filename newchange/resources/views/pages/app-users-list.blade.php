@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users List')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection
@section('content')
<!-- users list start -->
<style type="text/css">
  i.bx.bx-trash-alt {
    color: red;
}
</style>
<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
    <form>
     <!--  <div class="row border rounded py-2 mb-2">
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-verified">Verified</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-verified">
              <option value="">Any</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-role">Role</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-role">
              <option value="">Any</option>
              <option value="User">User</option>
              <option value="Staff">Staff</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-status">Status</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-status">
              <option value="">Any</option>
              <option value="Active">Active</option>
              <option value="Close">Close</option>
              <option value="Banned">Banned</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
          <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</button>
        </div>
      </div> -->
    </form>
  </div>
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
      <?php $module='User_add'; ?>
        @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
      <a class="btn btn-success" href="{{url('/app/add-user')}}" style="float: right;">Add User</a>
      @endif
      <br>
      <br>
      @if (count($errors) > 0)
            <div class="alert alert-success">
                
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Sno</th>
                <th>Profile Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>role</th>
                <th>status</th>
                <th>edit</th>
              </tr>
            </thead>
            <tbody>
               @foreach($users as $key=>$value) 
              <tr>
                <td>#{{$key+1}}</td>
                <td>
              <div class="media mb-2">
              <a class="mr-2" href="javascript:void(0);">
              <img src="{{asset('profile')}}/{{$value->profile_pic}}" alt="users avatar"
              class="users-avatar-shadow rounded-circle" height="64" width="64">
              </a>
              <div class="media-body">
               
              <div class="col-12 px-0 d-flex">
              <!--  <a href="javascript:void(0);" class="btn btn-sm btn-primary mr-25">Change</a> -->
              <!-- <a href="javascript:void(0);" class="btn btn-sm btn-light-secondary">Reset</a> -->
              </div>
              </div>
              </div>


                </td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->getUserRole['role']}}</td>
                 
                <td>
                  @if($value->status==1) 
                  <span class="badge badge-light-success">Active</span>
                  @else
                  <span class="badge badge-light-danger">De active</span>
                  @endif
                </td>
                <td>
                <?php $module='User_edit'; ?>
                @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                <a href="{{asset('app/user/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>
                @endif
                <?php $module='User_delete'; ?>
                 @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                <a href="{{asset('app/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this user')"><i class="bx bx-trash-alt"></i></a>
                @endif
                </td>
              </tr>
              @endforeach
               
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
