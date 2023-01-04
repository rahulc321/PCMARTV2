@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Product List')
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
      <?php $module='setting_add'; ?>
      @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
      <a class="btn btn-success" href="{{url('/app/settings/add')}}" style="float: right;">Add Setting</a>
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
                 
                <th>Title</th>
                <th >1st</th>
                <th>Add</th>
                <th>New</th>
                <th>Renew</th>
                <th>Description</th>
                 
                 
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               @foreach($products as $key=>$value) 
               <?php //echo '<pre>';print_r(count($value->checkRole)); ?>
              <tr>
                 
                <td>{{$value->title}}</td>
                <td>{{$value->first_user}}</td>
                <td>{{$value->add_user}}</td>
                <td>{{$value->new}}</td>
                <td>{{$value->renew}}</td>
                <td>{{$value->description}}</td>
                
                 
                 
               <!--  <td>
                  @if($value->status==1) 
                  <span class="badge badge-light-success">Active</span>
                  @else
                  <span class="badge badge-light-danger">De active</span>
                  @endif
                </td>
                <td> -->
                <td>
                <?php $module='setting_edit'; ?>
                @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                <a href="{{asset('app/settings/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>
                @endif
                <?php $module='setting_delete'; ?>
                @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                <a href="{{asset('app/settings/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this user')"><i class="bx bx-trash-alt"></i></a>
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
