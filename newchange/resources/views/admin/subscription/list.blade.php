@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Subscription List')
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
 
.col-xl-2 {
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 16.66667%;
    -ms-flex: 0 0 16.66667%;
    flex: 2 0 16.66667%;
    max-width: 20.66667%;
}
    .addBtn{
      border-color: #23BD70 !important;
      background-color: #39DA8A !important;
      color: #FFFFFF;
      margin-bottom: 30px;
    }
</style>
<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
     
  </div>
  <div class="users-list-table">
  <section id="widgets-Statistics">
  <div class="row">
    <div class="col-12 mt-1 mb-2">
      <h4>Subscription</h4>
      <hr>
    </div>
  </div>
  <div class="row">

     
  </div>
</section>
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
      <?php $module='customer_subscription_add'; ?>
      @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1 )
      <!--a class="btn btn-success addBtn" href="{{url('/app/customer-subscription-create')}}" style="float: right;">Add Subscription</a-->
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
         
         
          <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                         
                    </div>
                    

                      
                        <div class="table-responsive">
                            <table id='empTable' class="table" style="width: 100%">
                                <thead>
                                <tr>
                                <th>Invoice</th>
                                <th>Customer Id</th>
                                <th >Account Code</th>
                                <th>S No.</th>
                                <th>User</th>
                                <th>Value</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                 
                            </table>
                       
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
      $( "#datepicker" ).datepicker();
      // DataTable
      var oTable = $('#empTable').DataTable({

         processing: true,
         serverSide: true,
          ajax: {
            url: "{{url('/app/customer-subscription')}}",
        },
         columns: [
            { data: 'invoice' },
            { data: 'customer_id' },
            { data: 'account_code' },
            { data: 'sno_number' },
            { data: 'user' },
            { data: 'price' },
            { data: 'btn' },
            
            

         ],


          
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    // console.log(aData.id);
                    var id=  aData.id;
                        $('td:eq(6)', nRow).html('');
                        styleEdit = 'display:none';
                        styleDelete = 'display:none';
                        if(aData.editDataC==1){
                          styleEdit = '';
                          /* $('td:eq(6)', nRow).append("<a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>"); */
                        }

                        if(aData.deleteDataC==1){
                          styleDelete ='';
                          /* $('td:eq(6)', nRow).append("<a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='float: left !important;'><i class='bx bx-trash-alt' ></i></a>"); */
                        }

                        
                    if(aData.checkStatus==1){
                         
                        $('td:eq(0)', nRow).css('color', 'green');
                        $('td:eq(1)', nRow).css('color', 'green');
                        $('td:eq(2)', nRow).css('color', 'green');
                        $('td:eq(3)', nRow).css('color', 'green');
                        $('td:eq(4)', nRow).css('color', 'green');
                        $('td:eq(5)', nRow).css('color', 'green');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a> ");

                    }else if(aData.checkStatus==2){
                         
                        $('td:eq(0)', nRow).css('color', '#d86400');
                        $('td:eq(1)', nRow).css('color', '#d86400');
                        $('td:eq(2)', nRow).css('color', '#d86400');
                        $('td:eq(3)', nRow).css('color', '#d86400');
                        $('td:eq(4)', nRow).css('color', '#d86400');
                        $('td:eq(5)', nRow).css('color', '#d86400');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/customer-subscription/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/customer-subscription/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a> ");

                        

                    }else if(aData.checkStatus==3){
                         
                        $('td:eq(0)', nRow).css('color', '#c7c1c1');
                        $('td:eq(1)', nRow).css('color', '#c7c1c1');
                        $('td:eq(2)', nRow).css('color', '#c7c1c1');
                        $('td:eq(3)', nRow).css('color', '#c7c1c1');
                        $('td:eq(4)', nRow).css('color', '#c7c1c1');
                        $('td:eq(5)', nRow).css('color', '#c7c1c1');

                        $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a>  ");

                    }else{
                      $('td:eq(6)', nRow).html("<div class='dropdown'><span style='"+styleEdit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/customer-subscription/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/customer-subscription/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/customer-subscription/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='{{url('app/customer-subscription-delete')}}/"+id+"' class='confirmDelete' style='"+styleDelete+"' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/customer-subscription-edit')}}/"+id+"' style='float: left !important;"+styleEdit+"'><i class='bx bx-edit-alt' ></i></a>  ");
                    }
                }
      });


      //oTable.ajax.reload();
      $(document).on('click','.submit',function(){
        var status= $('.status').val();
        
      var table  = $('#empTable').DataTable();
      table.ajax.params({name: 'test'});
      table.draw();
      });
    });


    

     

            $(document).on('click','.confirmDelete',function(){
                return confirm('Are you sure want to delete?');
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
    </script>
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
