@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Service contract List')
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
.btn-danger {
    border-color: #FF2829 !important;
    background-color: #FF5B5C !important;
    color: #FFFFFF;
    padding: 2px;
}
span.bx.bx-dots-vertical-rounded.font-medium-3.dropdown-toggle.nav-hide-arrow.cursor-pointer {
    float: left;
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
         
         
          <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                         
                    </div>
                    <div class="ibox-content">

                        <div class="">
                           <form action="{{url('/app/service-contract')}}" method="get">
                           @csrf
                           <label>Search</label>
                           <input type="text" name="seacrh" placeholder="Search...">
                           <input type="submit">
                           <input type="reset" id="something">
                           </form>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id='empTable' class="table table-striped table-bordered bootstrap-datatable ServerSideTableARC">
                                <thead>
                                <tr>
                                    <th width="5%">Acc</th>
                                    <th width="35%">Customer</th>
                                    <th width="25%">Type</th>
                                    <th width="13%">Product</th>
                                    <th width="13%">Value</th>
                                    <th width="8%">Due Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th width="14%">Actions&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($ictran as $key=>$value) 
                                 <?php 
                                    if($value->renew_status==1){
                                      $color="green";
                                    }elseif($value->renew_status==2){
                                      $color="#d86400;";
                                    }elseif($value->renew_status==3){
                                      $color="#c7c1c1;";
                                    }else{
                                      $color="";
                                    }

                                 // $product=  App\Models\CustomerInfo::where('customer_id',$value->CUSTNO)->where('exp_date_checkbox',1)->get()->pluck('info_type')->toArray();
                                    //echo '<pre>';print_r($product);

                                  if($value->product==""){
                                   $product=App\Models\CustomerInfo::where('customer_id',$value->CUSTNO)->where('exp_date_checkbox',1)->get()->pluck('info_type')->toArray();
                                  }else{
                                   $product=App\Models\Product::whereIn('id',explode(',',$value->product))->get()->pluck('title')->toArray();
                                  }

                                  $dueDate= strtotime($value->Due_date);
                                  $toDayDate= strtotime(date('d-m-Y'));

                                  $dueDateColor='';
                                  if($toDayDate > $dueDate){
                                    $dueDateColor='red';
                                  }

                                  ?>
                                <tr>

                                   
                                   
                                  <td style="color: <?=$color?>">{{$value->CUSTNO}}</td>
                                  <td style="color: <?=$color?>">{{$value->Organization_Name}}</td>
                                  <td style="color: <?=$color?>">{{$value->Support_Type}}</td>
                                  <td style="color: <?=$color?>">
                                  @if($value->Support_Type !=1000)
                                  {{implode(',',$product)}}
                                  @endif

                                  </td>
                                  <td style="color: <?=$color?>">{{$value->Price_RM}}</td>
                                  <td style="color: <?=$dueDateColor?>">{{date('d-m-Y',strtotime($value->Due_date))}}</td>
                                  
                                  
                                   
                                 
                                   
                                  <td>
                                   <?php $module='customer_edit'; ?>
                                   @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                                  <a href="{{asset('app/ictran/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>
                                  @endif
                                  <div class="dropdown">
                                  <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                  @if($value->renew_status==1)

                                  @elseif($value->renew_status==2)
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url('app/renew')}}/{{$value->id}}"><i class="bx bx-analyse"></i> Renew</a>
                                     
                                    <a class="dropdown-item" href="{{url('app/cancelled')}}/{{$value->id}}"><i class="bx bxs-x-circle"></i> Cancelled</a>
                                  </div>

                                  @elseif($value->renew_status==3)



                                  @else
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url('app/renew')}}/{{$value->id}}"><i class="bx bx-analyse"></i> Renew</a>
                                    <a class="dropdown-item" href="{{url('app/agree')}}/{{$value->id}}"><i class="bx bx-check"></i> Agree</a>
                                    <a class="dropdown-item" href="{{url('app/cancelled')}}/{{$value->id}}"><i class="bx bxs-x-circle"></i> Cancelled</a>
                                  </div>
                                  @endif
                                </div>
                                  <?php $module='customer_delete'; ?>
                                   @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                                  <a href="{{asset('app/ictran/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this ?')" style="float: : left !important"><i class="bx bx-trash-alt"></i></a>
                                  @endif

                                   
                                  <!-- <input type="checkbox" name="checkOne[]" class="checkOne" value="{{$value->id}}" style="float: : left !important" > -->
                                  </td>
                                </tr>
                                @endforeach
               
            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         
 <div class="pp" style="display: none"> 
{{ $ictran->withQueryString()->links() }}
   </div> 
   <div class="total">
   Total Records : {{$ictran->total()}}
   </div>       
            
           @if ($ictran->hasPages())
<ul class="pagination" role="navigation" style="float: right;">
    {{-- Previous Page Link --}}
    @if ($ictran->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $ictran->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
    @endif

    <?php
        $start = $ictran->currentPage() - 2; // show 3 pagination links before current
        $end = $ictran->currentPage() + 2; // show 3 pagination links after current
        if($start < 1) {
            $start = 1; // reset start to 1
            $end += 1;
        } 
        if($end >= $ictran->lastPage() ) $end = $ictran->lastPage(); // reset end to last page
    ?>

    @if($start > 1)
        <li class="page-item">
            <a class="page-link" href="{{ $ictran->url(1) }}">{{1}}</a>
        </li>
        @if($ictran->currentPage() != 4)
            {{-- "Three Dots" Separator --}}
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
        @endif
    @endif
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ ($ictran->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $ictran->url($i) }}">{{$i}}</a>
            </li>
        @endfor
    @if($end < $ictran->lastPage())
        @if($ictran->currentPage() + 3 != $ictran->lastPage())
            {{-- "Three Dots" Separator --}}
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
        @endif
        <li class="page-item">
            <a class="page-link" href="{{ $ictran->url($ictran->lastPage()) }}">{{$ictran->lastPage()}}</a>
        </li>
    @endif

    {{-- Next Page Link --}}
    @if ($ictran->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $ictran->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
    @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">&rsaquo;</span>
        </li>
    @endif
</ul>
@endif

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
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
       alert();
      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,

         ajax: "{{url('/datatable2')}}",
         columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'name' },
            { data: 'email' },
            { data: 'created_at' },
            { data: 'button' },
            

         ],

          
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    console.log(iDisplayIndexFull);
                    if(aData.status==1){
                         
                        $('td:eq(0)', nRow).css('color', 'Red');
                        $('td:eq(1)', nRow).css('color', 'Red');
                        $('td:eq(2)', nRow).css('color', 'Red');
                        $('td:eq(3)', nRow).css('color', 'Red');

                    }
                    if(aData.status==1){
                         
                        $('td:eq(0)', nRow).css('color', 'Red');
                        $('td:eq(1)', nRow).css('color', 'Red');
                        $('td:eq(2)', nRow).css('color', 'Red');
                        $('td:eq(3)', nRow).css('color', 'Red');

                    }
                    if(aData.date_status==1){
                         
                        $('td:eq(4)', nRow).css('color', 'Red');
                         

                    }
                }
      });

    });
    </script>
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
