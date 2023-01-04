@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Customer List')
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
</style>
<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
     
  </div>
  <div class="users-list-table">
  <section id="widgets-Statistics">
  <!-- <div class="row">
    <div class="col-12 mt-1 mb-2">
      <h4>Statistics</h4>
      <hr>
    </div>
  </div> -->
  <div class="row">
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
            <i class="bx bx-analyse"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Valid Contract</p>
          <h2 class="mb-0"><span class="activecont1">{{$totalCount}}</span></h2>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
            <i class="bx  bx-money"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Expired Contract</p>
          <h2 class="mb-0"><span class="agree4">{{$expireContract}}</span></h2>
        </div>
      </div>
    </div>
    
     
    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
            <i class="bx bx-money font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Cancel Contract </span></p>
          <h2 class="mb-0"><span class="expire2">{{$cancelContract}}</span></h2>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
            <i class="bx bx-money font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">Pending Contract </span></p>
          <h2 class="mb-0"><span class="expire2">{{$pendingContract}}</span></h2>
        </div>
      </div>
    </div>

     
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
                    

                      
                        <div class="table-responsive">
                         <form action="{{url('/app')}}/delete-record" method="post" id="deleteForm">
                                        @csrf 
                            <table id='empTable' class="table" style="width: 100%">
                                <thead>
                                <tr>
                                <th>Acc</th>
                                <th >Customer</th>
                                <th>Attention</th>
                                <th>Telephone</th>

                                <th>Mobile</th>
                                 <th style="width: 34px;">
                                  <?php $module='customer_delete'; ?>
                                  @if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1)
                                  <input type="checkbox" class="checkAll" id="selectAll" ><a href="javascript:;" class="delete"><i class="bx bx-trash-alt"></i> </a>
                                  @endif
                                  </th>
                                </tr>
                                </thead>
                                 
                            </table>
                            </form>
                       
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

         // ajax: "{{url('/app/ticket2')}}",
         //  type: "GET",
         //  data: function (data) {
         //  // data.sim_no = $('input[name=sim_no]').val();
         //  // data.v_num = $('input[name=v_num]').val();
         //  // data.dh_num = $('input[name=dh_num]').val();
         //  // data.fnetworks = $('select[name=fnetworks]').val();
         //  // data.fstatus = $('select[name=fstatus]').val();
         //  // data.fintrome = $('select[name=fintrome]').val();
         //  }
          ajax: {
            url: "{{url('/app/cusomer2')}}",
            // type: "get",
           // dataType: 'json',
           /* data: {
                filterParams: {
                    status: $('#status option:selected').text()
                   
                }
            }*/

           /* data: function(d){
            d.status = $('#status option:selected').val();
            d.customer = $('#customer option:selected').val();
            d.user = $('#user option:selected').val();
            d.startDate = $('#startDate').val();
            d.endDate = $('#endDate').val();
            d.rating = $('#rating').val();
            }*/
        },
         columns: [
            { data: 'Organization_Number' },
            { data: 'Organization_Name' },
            { data: 'Attention' },
            { data: 'Primary_Phone' },
            { data: 'Secondary_Phone' },
            { data: 'btn' },
            
            

         ],


          
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    console.log(aData.id);
                    var id=  aData.id;
                         
                        if(aData.deleteCount==1){
                          $('td:eq(5)', nRow).html("<a href='{{url('app/customer/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>");
                        }else{
                        $('td:eq(5)', nRow).html("<a href='{{url('app/customer/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a><input type='checkbox' name='checkOne[]' class='checkOne' value="+id+" style='float: : left !important' >");
                      }
                      

                    



                   // $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i> Cancelled</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>  ");
                   // $('td:eq(6)', nRow).html("<a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;''><i class='bx bx-edit-alt' ></i></a>");
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
    </script>
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
