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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@section('content')
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
  <section id="widgets-Statistics">
  <div class="row">
    <div class="col-12 mt-1 mb-2">
      <h4>Statistics</h4>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Renew</p>
          <h2 class="mb-0"><span class="activecont">0</span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
            <i class="bx bx-check"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Agree</p>
          <h2 class="mb-0"><span class="agree">0</span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bxs-tag-x"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Cancell</p>
          <h2 class="mb-0"><span class="cancell">0</span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
            <i class="bx bx-money font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Expire</p>
          <h2 class="mb-0"><span class="expire">0</span></h2>
        </div>
      </div>
    </div>
     
  </div>
</section>
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

                       {{-- <div class="">
                           <form action="{{url('/app/service-contract')}}" method="get">
                           @csrf
                           <label>Search</label>
                           <input type="text" name="seacrh" placeholder="Search...">
                           <input type="submit">
                           <input type="reset" id="something">
                           </form>
                        </div>--}}
                        <br>
                        <div class="form>">
                          <div class="form-group" style="float: left;">
                            <label>Status</label>
                            <select class="form-control status" id="invoice" style="width:106px">
                            <option value="">--Select--</option>
                               
                              <option value="0">Active</option>
                              <option value="1">Renew</option>
                              <option value="2">Agree</option>
                              <option value="3">Cancel</option>
                            </select>
                          </div>

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Product</label>
                            <select class="form-control status" id="customer" style="">
                            <option value="">--Select--</option>
                              @foreach($prodcucts as $prodcuct)
                              <option value="{{$prodcuct->id}}">{{$prodcuct->title}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Type</label>
                            <select class="form-control status" id="type" style="">
                            <option value="">--Select--</option>
                              @foreach($Support_Type as $support)
                              <option value="{{$support->Support_Type}}">{{$support->Support_Type}}</option>
                              @endforeach
                            </select>
                          </div>


                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Value</label>
                            <select class="form-control status" id="value" style="width:106px">
                            <option value="">--Select--</option>
                              
                              <option value="1000">Less 1000</option>
                              <option value="1001">More 1000</option>
                               
                            </select>
                          </div>
 

                           <div class="form-group" style="float: left;width:125px;margin-left: 10px">
                            <label>From</label>
                             <input type="text" class="form-control" id="startDate">
                             
                          </div>
                          <div class="form-group"  style="float: left;width:125px;margin-left: 10px">
                            <label>To</label>
                            <input type="text" id="endDate" class="form-control">
                             
                             
                          </div> 

                          <div class="form-group jj">
                          <label></label>
                          <button type="button" class="btn btn-success submit" style="    margin-top: 23px;"><i class="bx bx-search-alt-2"></i></button>
                          <a href="{{url('/app/service-contract')}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>
                        <div class="table-responsive">
                            <table id='empTable' class="table">
                                <thead>
                                <tr>
                                    <th width="5%">Invoice</th>
                                    <th width="40%">Customer</th>
                                    <th width="25%">Type</th>
                                    <th width="13%">Product</th>
                                    <th width="13%">Value</th>
                                    <th width="8%">Expire</th>
                                    <th width="14%">Actions&nbsp;&nbsp;&nbsp;</th>
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
       
      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,


         //ajax: "{{url('/app/service-contract1')}}",
         ajax: {
            url: "{{url('/app/service-contract1')}}",
            type: "get",
           // dataType: 'json',
           /* data: {
                filterParams: {
                    status: $('#status option:selected').text()
                   
                }
            }*/

            data: function(d){
            d.invoice = $('#invoice option:selected').val();
            d.customer = $('#customer option:selected').val();
            d.type = $('#type option:selected').val();
            d.startDate = $('#startDate').val();
            d.endDate = $('#endDate').val();
            d.value = $('#value').val();
            }
        },
         columns: [
            { data: 'Contract_Number' },
            { data: 'Organization_Name' },
            { data: 'Support_Type' },
            { data: 'product' },
            { data: 'Price_RM' },
            { data: 'due_date' },
            { data: 'button' },
            

         ],
         "drawCallback": function (settings) { 
        // Here the response
        var response = settings.json;
        console.log(response.renewSum);
        $('.activecont').html(response.renewSum).css('color','green');
        $('.cancell').html(response.cancell).css('color','red');
        $('.agree').html(response.agree).css('color','#d86400');
        $('.expire').html(response.expire);
        },

          "order": [[ 5, "asc" ]],
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    console.log(aData.id);
                    var id=  aData.id;
                    if(aData.renew_status==1){
                         
                        $('td:eq(0)', nRow).css('color', 'green');
                        $('td:eq(1)', nRow).css('color', 'green');
                        $('td:eq(2)', nRow).css('color', 'green');
                        $('td:eq(3)', nRow).css('color', 'green');
                        $('td:eq(4)', nRow).css('color', 'green');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;'><i class='bx bxs-purchase-tag' ></i></a> ");

                    }else if(aData.renew_status==2){
                         
                        $('td:eq(0)', nRow).css('color', '#d86400');
                        $('td:eq(1)', nRow).css('color', '#d86400');
                        $('td:eq(2)', nRow).css('color', '#d86400');
                        $('td:eq(3)', nRow).css('color', '#d86400');
                        $('td:eq(4)', nRow).css('color', '#d86400');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;'><i class='bx bxs-purchase-tag' ></i></a> ");

                        

                    }else if(aData.renew_status==3){
                         
                        $('td:eq(0)', nRow).css('color', '#c7c1c1');
                        $('td:eq(1)', nRow).css('color', '#c7c1c1');
                        $('td:eq(2)', nRow).css('color', '#c7c1c1');
                        $('td:eq(3)', nRow).css('color', '#c7c1c1');
                        $('td:eq(4)', nRow).css('color', '#c7c1c1');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;'><i class='bx bxs-purchase-tag' ></i></a> ");

                    }else{
                      $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a><a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;'><i class='bx bxs-purchase-tag' ></i></a>  ");
                    }

                    if(aData.dueDateColor==1){
                         
                        $('td:eq(5)', nRow).css('color', 'Red');
                         

                    }



                   // $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i> Cancelled</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>  ");
                   // $('td:eq(6)', nRow).html("<a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;''><i class='bx bx-edit-alt' ></i></a>");
                }
      });

      
      $(document).on('click','.submit',function(){
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
