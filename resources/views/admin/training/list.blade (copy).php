@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Training')
{{-- vendor styles --}}
@section('vendor-styles')
<?php  error_reporting(0); ?>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
 
span {
  content: "\0031";
}
.ww{
  float: left !important;
    border-radius: 34px;
    width: 25px;
}
table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 0px !important;
}

table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 0px !important;
    padding-left: 1px !important;
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
      <form action="{{url('/app/training')}}" id="form2" method="post">
        @csrf
           <div class="form>">
                          <!-- <div class="form-group" style="float: left;">
                            <label>Status</label>
                            <select class="form-control status" id="invoice" style="width:106px">
                            <option value="">--Select--</option>
                               
                              <option value="0">Active</option>
                              <option value="1">Renew</option>
                              <option value="2">Agree</option>
                              <option value="3">Cancel</option>
                            </select>
                          </div> -->

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Product</label>
                            <select class="form-control status" id="customer" style="" name="product">
                            <option value="">--Select--</option>
                              @foreach($product as $pro)
                              <option value="{{$pro->description}}" @if($_REQUEST['product']==$pro->description) {{'selected'}} @endif>{{$pro->description}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Session</label>
                            <select class="form-control status" id="type" style="" name="session">
                            <option value="">--Select--</option>
                              <option value="none" @if($_REQUEST['session']=='none') {{'selected'}} @endif>None</option>
                              <option value="1" @if($_REQUEST['session']==1) {{'selected'}} @endif>Session 1</option>
                              <option value="2" @if($_REQUEST['session']==2) {{'selected'}} @endif>Session 2</option>
                            </select>
                          </div>


                          <!-- <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Value</label>
                            <select class="form-control status" id="value" style="width:106px">
                            <option value="">--Select--</option>
                              
                              <option value="999">< 999</option>
                              <option value="1000-1999">1000-1999</option>
                              <option value="2000-2999">2000-2999</option>
                              <option value="3000-3999">3000-3999</option>
                              <option value="4000">> 4000</option>
                               
                            </select>
                          </div> -->
 

                           <div class="form-group" style="float: left;width:125px;margin-left: 10px">
                            <label>From</label>
                             <input type="text" class="form-control" id="startDate" name="startDate">
                             
                          </div>
                          <div class="form-group"  style="float: left;width:125px;margin-left: 10px">
                            <label>To</label>
                            <input type="text" id="endDate" class="form-control" name="endDate">
                             
                             
                          </div> 

                          <div class="form-group jj">
                          <label></label>
                          <button type="submit" class="btn btn-success submit" style="    margin-top: 23px;padding: 6px;"><i class="bx bx-search-alt-2"></i></button>
                          <a href="{{url('/app/training')}}" class="btn btn-warning" style="    margin-top: 23px;padding: 6px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>
        </form>
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
          <table id="empTable" class="table">
            <thead>
              <tr>
                 
                
                <th >Invoice</th>
                <th style="width: 232px;">Customer</th>
                <th >Code</th>
                <th >Product</th>
                <th >Value</th>
                <th style="">Trainee</th>
                <th style="width: 88px !important;">Date</th>
                <th >Session</th>
                
                 
                 
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               @foreach($training as $key=>$value) 
               <?php 

               //echo '<pre>';print_r(count($value['getCountDta']));
                $checkSess1= App\Models\ScheduleSession::where('sessionId',1)->where('trainingId',$value->id)->count();
                $checkSess2= App\Models\ScheduleSession::where('sessionId',2)->where('trainingId',$value->id)->count();

                if($checkSess1 > 0){
                  $text= '1';
                  $class="danger";
                }else{
                  $text= '1';
                  $class="success";
                }

                if($checkSess2 > 0){
                  $text1= '2';
                  $class1="danger";
                }else{
                  $text1= '2';
                  $class1="success";
                }

                $module='training_edit';

                if(in_array($module,Helper::checkPermission())){
                  $url= asset('app/sessionView').'/'.$value->id;
                }else{
                  $url= asset('app/sessionView').'/'.$value->id;
                }
                $sett = App\Models\TrainingSetting::where('code',$value->code)->first();
                $tVal= $value->value-$sett->first_user;

                if($tVal==0){
                  $count=1;
                }

                if($tVal > 0){
                  $count1= $tVal/$sett->add_user;
                }

                $trainne= $count+$count1;




                if(count($value['getCountDta'])== $c || $value['getCountDta']=='none' || $c==''){
                ?>

              <tr>
                 
                <td>{{$value->Invoice}}</td>
                <td>{{$value->customer_name}}</td>
                <td>{{$value->code}}</td>
                <td>{{$value->product}}</td>
                <td>{{$value->value}}</td>
                
                <td style="text-align: center !important;">{{$value->trainee}}</td>
                <td>{{date('d-m-Y',strtotime($value->invoice_date))}}</td>
                 
                 
                 <td>
                 <a href="@if($checkSess1 > 0) {{$url}} @else {{asset('app/session')}}/{{$value->id}}/1 @endif" class="btn btn-{{$class}} ww" style="float: left !important;">
                 {{$text}}
                 </a>
                <a href="@if($checkSess2 > 0) {{$url}} @else {{asset('app/session')}}/{{$value->id}}/2 @endif" class="btn btn-{{$class1}} ww" style="float: left !important;margin-left: 2px;">
                   {{$text1}}
                </a></td>
                
                <td>

                


                 <?php $module='training_edit'; ?>
                 @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/training/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a>
                 @endif
                <?php $module='training_delete'; ?>
                @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/training/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="bx bx-trash-alt"></i></a>
                  
                @endif
                </td>
              </tr>
              <?php }else{  ?>



              <?php } ?> 
              @endforeach
               
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
  
  <script src="{{Request::root()}}/app-assets/vendors/js/charts/apexcharts.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> 
  </script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  $('#empTable').DataTable();
  $(function () {
            // $("#startDate").datepicker({
            //     maxDate: 0,
            //     onClose: function (selectedDate) {
            //         $("#endDate").datepicker("option", "minDate", selectedDate);
            //     }
            // });
            // $("#endDate").datepicker({
            //     maxDate: 0,
            //     onClose: function (selectedDate) {
            //         $("#startDate").datepicker("option", "maxDate", selectedDate);
            //     }
            // });
            var startDate;
            var endDate;
             $( "#startDate" ).datepicker({
            dateFormat: 'dd-mm-yy'
            })
            ///////
            ///////
             $( "#endDate" ).datepicker({
            dateFormat: 'dd-mm-yy'
            });
            ///////
            $('#startDate').change(function() {
            startDate = $(this).datepicker('getDate');
            $("#endDate").datepicker("option", "minDate", startDate );
            })

 
      });

</script>
@endsection
