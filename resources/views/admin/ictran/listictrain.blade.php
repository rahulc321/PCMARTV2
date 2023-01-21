<!-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> -->

<?php error_reporting(0); ?>
<!-- users list start -->
<style type="text/css">
    
   a.canvasjs-chart-credit {
   display: none;
   }
   form#form2 {
   margin-left: 11px;
   }
   select.form-control.typeww1 {
   margin-left: 17% !important;
   }
   /*.col-xl-3 {
   -webkit-box-flex : 0;
   -webkit-flex : 0 0 25%;
   -ms-flex : 0 0 25%;
   flex : 0 0 25%;
   max-width : 25%;
   height: 147px !important;
   }*/
   form#form2 {
   margin-left: 11px;
   padding-top: 13px;
   padding-left: 10px;
   }
</style>
<style type="text/css">
    .col-lg-12 {
    margin-top: -35px;
    }
 </style>

    
   <div class="users-list-table">
       
      <div class="card">
         <div class="card-body">
            
            <div class="col-lg-12">
               <div class="ibox float-e-margins">
                  <div class="ibox-title">
                  </div>
                  <div class="ibox-content">
                     {{-- 
                     <div class="">
                        <form action="{{url('/app/service-contract')}}" method="get">
                           @csrf
                           <label>Search</label>
                           <input type="text" name="seacrh" placeholder="Search...">
                           <input type="submit">
                           <input type="reset" id="something">
                        </form>
                     </div>
                     --}}
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
                              <option value="{{$prodcuct['id']}}">{{$prodcuct['title']}}</option>
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
                              <option value="999">< 999</option>
                              <option value="1000-1999">1000-1999</option>
                              <option value="2000-2999">2000-2999</option>
                              <option value="3000-3999">3000-3999</option>
                              <option value="4000">> 4000</option>
                           </select>
                        </div>
                        <div class="form-group hide" style="float: left;width:125px;margin-left: 10px">
                           <label>From</label>
                           <input type="text" class="form-control" id="startDate1">
                        </div>
                        <div class="form-group hide"  style="float: left;width:125px;margin-left: 10px">
                           <label>To</label>
                           <input type="text" id="endDate1" class="form-control">
                        </div>
                        <div class="form-group jj">
                           <label></label>
                           <button type="button" class="btn btn-success submit" style="    margin-top: 23px;"><i class="bx bx-search-alt-2"></i></button>
                            <?php $currentURL = url()->full(); ?>
                           <a href="{{$currentURL}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                        </div>
                     </div>
                     <div class="table-responsive">
                        <table id='empTable1' class="table" style="width: 100% !important;">
                           <thead>
                              <tr>
                                 <th width="5%">Invoice</th>
                                 <th width="40%">Customer</th>
                                 <th width="25%">Type</th>
                                 <th width="13%">Product</th>
                                 <th width="13%">Count</th>
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
   

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
 
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
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
                  $( "#startDate1" ).datepicker({
                 dateFormat: 'dd-mm-yy'
                 })
                 ///////
                 ///////
                  $( "#endDate1" ).datepicker({
                 dateFormat: 'dd-mm-yy'
                 });
                 ///////
                 $('#startDate1').change(function() {
                 startDate = $(this).datepicker('getDate');
                 $("#endDate1").datepicker("option", "minDate", startDate );
                 })
      
      
           });
         $(document).ready(function(){
            $.noConflict();
           $('.typeww').change(function(){
             $('#form2').submit();
           });
           $('.typeww1').change(function(){
             $('#form2').submit();
           });
           // DataTable
           var oTable;
           oTable = $('#empTable1').DataTable({
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
                  d.searchUser = "{{$edit->Organization_Name}}";
                 d.invoice = $('#invoice option:selected').val();
                 d.customer = $('#customer option:selected').val();
                 d.type = $('#type option:selected').val();
                 d.startDate = $('#startDate1').val();
                 d.endDate = $('#endDate1').val();
                 d.value = $('#value').val();
                 }
             },
              columns: [
                 { data: 'Contract_Number' },
                 { data: 'Organization_Name' },
                 { data: 'Support_Type' },
                 { data: 'product' },
                 { data: 'count' },
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
      
               "order": [[ 6, "asc" ]],
              // "aoColumnDefs": [{ "aTargets": [ 4 ], "bSortable": false}],
              "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                         console.log(aData.id);
                          var removeDeleteBtn=  aData.removeDeleteBtn;
                        var contract_delete=  aData.contract_delete;
                        var contract_edit1=  aData.contract_edit;
      
                        var contract_edit='';
                        if(contract_edit1==0){
                         var contract_edit= "display:none";
                        }
                     // alert(contract_edit);
      
      
      
                        var style='';
                        if(removeDeleteBtn==1 || contract_delete==0){
                         var style= "display:none";
                        }
                        var removeTiecket=  aData.removeTiecket;
                        var ticket_multiple=  aData.ticket_multiple;
                        var styleticket='';
                        if(removeTiecket==1 && ticket_multiple==0 || aData.ticket_red_renew==1){
                         var styleticket= "display:none";
                        }
      
                        var id=  aData.id;
                         if(aData.renew_status==1){
                              
                             $('td:eq(0)', nRow).css('color', 'green');
                             $('td:eq(1)', nRow).css('color', 'green');
                             $('td:eq(2)', nRow).css('color', 'green');
                             $('td:eq(3)', nRow).css('color', 'green');
                             $('td:eq(4)', nRow).css('color', 'green');
      
                             $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");
      
                         }else if(aData.renew_status==2){
                              
                             $('td:eq(0)', nRow).css('color', '#d86400');
                             $('td:eq(1)', nRow).css('color', '#d86400');
                             $('td:eq(2)', nRow).css('color', '#d86400');
                             $('td:eq(3)', nRow).css('color', '#d86400');
                             $('td:eq(4)', nRow).css('color', '#d86400');
      
                             $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");
      
                             
      
                         }else if(aData.renew_status==3){
                              
                             $('td:eq(0)', nRow).css('color', '#c7c1c1');
                             $('td:eq(1)', nRow).css('color', '#c7c1c1');
                             $('td:eq(2)', nRow).css('color', '#c7c1c1');
                             $('td:eq(3)', nRow).css('color', '#c7c1c1');
                             $('td:eq(4)', nRow).css('color', '#c7c1c1');
      
                             $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a> <a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a> ");
      
                         }else{
                           $('td:eq(7)', nRow).html("<div class='dropdown'><span style='"+contract_edit+"' class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i>&nbsp;X Cancel</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+style+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;"+contract_edit+"'><i class='bx bx-edit-alt' ></i></a><a href='{{url('app/ictran/ticket')}}/"+id+"' style='float: left !important;"+styleticket+"'><i class='bx bxs-purchase-tag' ></i></a>  ");
                         }
      
                         if(aData.dueDateColor==1){
                              
                             $('td:eq(6)', nRow).css('color', 'Red');
                           }
      
      
      
                        // $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i> Cancelled</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>  ");
                        // $('td:eq(6)', nRow).html("<a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;''><i class='bx bx-edit-alt' ></i></a>");
                     }
           });
      
           
           $(document).on('click','.submit',function(){
            
           oTable.draw();
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
   