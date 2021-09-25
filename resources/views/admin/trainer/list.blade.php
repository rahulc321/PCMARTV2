@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Trainer')
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
.btn {
    display: inline-block;
    font-weight: 400;
    color: #727E8C;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 0 solid transparent;
    padding: -0.533rem 9.5rem;
    /* font-size: 1rem; */
    /* line-height: 1.6rem; */
    border-radius: 0.267rem;
    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    padding: 2px;
    color: white;
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
      <?php $module='trainer_add'; ?>
      @if(in_array($module,Helper::checkPermission()))
      <a class="btn btn-success" href="{{url('/app/trainer/add')}}" style="float: right;">Add Trainer</a>
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
                 
                
                <th >Trainer Name</th>
                <th >Email</th>
                <th >Phone</th>
                <th >Trainer Type</th>
                <th >Status</th>
                 
                <th style="display: none;"></th>
                <th style="display: none;"></th>
                 
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               @foreach($trainer as $key=>$value) 
               <?php //echo '<pre>';print_r(count($value->checkRole));
                

                ?>
              <tr>
                 
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->phone}}</td>
                <td>
                <?php
                $ty = explode(',',$value->trainerType);
                //echo '<pre>';print_r($ty);

                ?>

                 @if (in_array(1, $ty))
                  {{'Trainer'}}
                 @endif

                 @if (in_array(2, $ty))
                  ,{{'Onsite'}}
                 @endif

                 @if (in_array(3, $ty))
                  ,{{'Demo'}}
                 @endif

                 @if (in_array(5, $ty))
                  ,{{'On Leave'}}
                 @endif
                </td>
                <td>
                  @if($value->status == 1)
                  <p style="color: green">Active</p>

                  @else
                  <p style="color: red">In-active</p>

                  @endif

                </td>
                  
                 <td style="display:none"></td>
                 <td style="display:none"></td>
                
                <td>

                 


                 <?php $module='trainer_edit'; ?>
                 @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/trainer/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>
                 @endif
                <?php $module='trainer_delete'; ?>
                @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/trainer/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="bx bx-trash-alt"></i></a>
                  
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
