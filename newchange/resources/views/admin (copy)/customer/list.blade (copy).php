@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Customer List')
{{-- vendor styles --}}
@section('vendor-styles')
 
@endsection
{{-- page styles --}}
@section('page-styles')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@section('content')
<!-- users list start -->
<style type="text/css">
  i.bx.bx-trash-alt {
    color: red;
}
.btn-danger {
    border-color: #FF2829 !important;
    background-color: #FF5B5C !important;
    color: #FFFFFF;
    padding: 2px;
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
      <!-- <a class="btn btn-success" href="{{url('/app/settings/add')}}" style="float: right;">Add Setting</a> -->
       
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
        <form action="{{url('/app')}}/delete-record" method="post" id="deleteForm">
                                        @csrf 
          <table id="example" class="table">
            <thead>
              <tr>
                
                <th>Acc</th>
                <th >Customer</th>
                <th>Attention</th>
                <th>Telephone</th>
                 
                <th>Mobile</th>
                
                 
                <th>
                <?php $module='customer_delete'; ?>
                @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                <input type="checkbox" class="checkAll" id="selectAll" ><a href="javascript:;" class="delete"><i class="bx bx-trash-alt"></i> </a>
                @endif
                </th>
              </tr>
            </thead>
            <tbody>
               @foreach($customers as $key=>$value) 
               <?php //echo '<pre>';print_r(count($value['getDeleteCount'])); ?>
              <tr>
                
                <td>{{$value->Organization_Number}}</td>
                <td>{{$value->Organization_Name}}</td>
                <td>{{$value->Attention}}</td>
                <td style="width:15% !important">{{$value->Primary_Phone}}</td>
                <td style="width:15% !important">{{$value->Secondary_Phone}}</td>
                
                 
               
                 
                <td style="width:10% !important">
                <?php $module='customer_edit'; ?>
                @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                <a href="{{asset('app/customer/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>
                 @endif
                <!-- <a href="{{asset('app/customer/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this customer')" style="float: : left !important"><i class="bx bx-trash-alt"></i></a> -->
                @if(count($value['getDeleteCount']) < 1)
                <input type="checkbox" name="checkOne[]" class="checkOne" value="{{$value->id}}" style="float: : left !important" >
                @endif
                </td>
              </tr>
              @endforeach
               
            </tbody>
          </table>
          </form> 
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
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
            $('.delete').click(function(){
                if (confirm('Are you sure you want to delete all records ?')) {
                    if($('.checkOne').is(':checked')){
                        $('#deleteForm').submit();
                    }else{
                    alert('Please checked atleast one checkbox.');
                    }

                }
            });


            $("#selectAll").click(function() {
                $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
            });

            $("input[type=checkbox]").click(function() {
                if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
            });
            </script> 
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
@endsection
