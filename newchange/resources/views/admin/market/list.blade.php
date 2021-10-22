@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Email Marketing')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@section('content')`
<?php error_reporting(0); ?>
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
    /* padding: 0.467rem 1.5rem; */
    font-size: 1rem;
    line-height: 1.6rem;
    border-radius: 0.267rem;
    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    padding: 7px !important;
}
</style>
<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
     
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
                        <?php
                          $getMonth = \DB::table('filter_Setting')->first();
                         ?>
                         <div class="">
                           <form action="{{url('/app/update-setting')}}" method="post">
                           @csrf
                           <div class="form-group" style="float: left;">
                            <label>Month</label>
                            <select class="form-control status" id="month" style="width:106px">
                            <option value="">--Select--</option>
                              @for($m=1; $m<=12; ++$m)
                              <option value="{{date('m', mktime(0, 0, 0, $m, 1))}}" <?php if($getMonth->month==date('m', mktime(0, 0, 0, $m, 1))){ echo 'selected'; } ?>>{{date('m', mktime(0, 0, 0, $m, 1))}}</option>
                              @endfor
                            </select>
                          </div>
                          <div class="form-group" style="float: left;margin-left: 10px">
                            <label>Year</label>
                            <select class="form-control status" id="year" style="width:106px">
                            <option value="">--Select--</option>
                              @for($i=2015;$i<=2025;$i++) 
                              <option value="{{$i}}" <?php if($getMonth->year==$i){ echo 'selected'; } ?>>{{$i}}</option>
                             @endfor
                            </select>
                          </div>
                          <button type="button" class="btn btn-success submit" style="    margin-top: 23px;margin-left: 10px"><i class="bx bx-search-alt-2"></i></button>

                          <a href="javascript:;" class="btn btn-info tttt" data-toggle="modal" data-target="#myModal"  style="margin-top: 23px;margin-left: 10px"><i class="bx bx-mail-send"></i></a>
                           </form>
                        </div>
                        <br>
                       
                        <div class="table-responsive">
                            <table id='empTable' class="table">
                                <thead>
                                <tr>
                                    <th width="10%">Type</th>
                                    <th width="10%">Product</th>
                                    <th width="30%">Customer</th>
                                    
                                    <th width="13%">Email</th>
                                    <th width="10%">Past</th>
                                    <th width="10%">Total</th>
                                    <th width="10%">Expire</th>
                                    
                                </tr>
                                </thead>
                                 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  
</head>
<body>
<div class="container">
   
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Send Email</h4>
        </div>
        <div class="modal-body">
          <form action="{{url('/app/send-email')}}" method="post">
          @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control email" value="rahul@yopmail.com">
                <input type="hidden" name="month" class="form-control month">
                <input type="hidden" name="year" class="form-control year">
              </div>

              <div class="form-group">
                <label>Price</label>
                <select class="form-control priceType" name="priceType">
                  <option value="0">Past Price</option>
                  <option value="1">Current Price</option>
                </select>
              </div>

              <div class="form-group">
                <label></label>
                <input type="checkbox" class="testmode" name="testmode" checked="" value="1"> Is Test ?
              </div>
              <div class="form-group">
                 <input type="hidden" class="btnclick" value="0" name="btnclick">
                <button type="submit" class="btn btn-info submit12"><i class="bx bx-mail-send"></i></button>
              </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

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
    $(document).ready(function(){

      $('.tttt').click(function(){
        var month= $('#month').val();
        var year= $('#year').val();
        $('.month').val(month);
        $('.year').val(year);
      });
       
      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,

         //ajax: "{{url('/app/service-contract1')}}",
         ajax: {
            url: "{{url('/app/email-market')}}",
            type: "get",
           // dataType: 'json',
           /* data: {
                filterParams: {
                    status: $('#status option:selected').text()
                   
                }
            }*/

            data: function(d){

            if($('.testmode').is(':checked'))
            {
            var checked=1;
            }else
            {
            var checked=0;
            }


            d.month = $('#month option:selected').val();
            d.year = $('#year option:selected').val();
            d.priceType = $('.priceType option:selected').val();
            d.testmode = checked;
            d.email = $('.email').val();
            d.btnclick = $('.btnclick').val();
            // d.type = $('#type option:selected').val();
            // d.startDate = $('#startDate').val();
            // d.endDate = $('#endDate').val();
            // d.value = $('#value').val();
            }
        },
         columns: [
            { data: 'Support_Type' },
            { data: 'product' },
            { data: 'Organization_Name' },
            
            { data: 'email' },
            { data: 'Price_RM' },
            { data: 'sum' },
            { data: 'due_date' },
             
            

         ],
         "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 3,5] }],

          
          
      });

      
      $(document).on('click','.submit',function(){
      var table  = $('#empTable').DataTable();
      table.draw();
      });

      $(document).on('click','.submit1',function(){
        $('.btnclick').val(1);
      var table  = $('#empTable').DataTable();
      table.draw();
      });

    });

    $(document).on('click','.delete',function(){
        var attr= $(this).attr('data');
        if (confirm('Are you sure you want to delete this ?')) {
        window.location.href = "{{url('app/ictran/delete')}}/"+attr;
        }
        
      });
    </script>
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
