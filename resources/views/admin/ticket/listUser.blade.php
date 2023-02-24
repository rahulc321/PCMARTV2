<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
 
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
 <style type="text/css">
    .col-lg-12 {
    margin-top: -33px;
    }
 </style>
<section class="users-list-wrapper">
   
   <div class="users-list-table">
      <div class="card">
         <div class="card-body">
            <!-- <a class="btn btn-success" href="{{url('/app/settings/add')}}" style="float: right;">Add Setting</a> -->
            
            
            <!-- datatable start -->
            <?php $currentURL = url()->full(); ?>
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
                           <label>Status </label>
                           <select class="form-control status" id="status" style="width:75px">
                              <option value="0">Open</option>
                              <option value="2">Close</option>
                           </select>
                        </div>
                        <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                           <label>Rating</label>
                           <select class="form-control status" id="rating" style="">
                              <option value="">--Select--</option>
                              <option value="1">1 Star</option>
                              <option value="2">2 Star</option>
                              <option value="3">3 Star</option>
                              <option value="4">4 Star</option>
                              <option value="5">5 Star</option>
                           </select>
                        </div>
                       <!--  <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                           <label>Customer</label>
                           <select class="form-control status" id="customer" style="">
                              <option value="">--Select--</option>
                              @foreach($customers as $customer)
                              <option value="{{$customer['id']}}">{{$customer['Organization_Name']}}</option>
                              @endforeach
                           </select>
                        </div> -->
                        <div class="form-group" style="float: left;width:100px;margin-left: 10px">
                           <label>User</label>
                           <select class="form-control status" id="user" style="width:100px">
                              <option value="">--Select--</option>
                              @foreach($users as $user)
                              <option value="{{$user['id']}}">{{$user['name']}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group hide" style="float: left;width:150px;margin-left: 10px">
                           <label>From</label>
                           <input type="text" class="form-control" id="startDate">
                        </div>
                        <div class="form-group hide"  style="float: left;width:150px;margin-left: 10px">
                           <label>To</label>
                           <input type="text" id="endDate" class="form-control">
                        </div>
                        <div class="form-group jj">
                           <label></label>
                           <button type="button" class="btn btn-success submit" style="    margin-top: 23px;"><i class="bx bx-search-alt-2"></i></button>
                           <a href="{{$currentURL}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                        </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="table-responsive">
                        <table id='empTable' class="table" style="width: 100% !important;">
                           <thead>
                              <tr>
                                 <th width="2%">Ticket</th>
                                 <th width="20%">Customer</th>
                                 <th width="4%">User</th>
                                 <th width="15%">Phone</th>
                                 <th width="8%">Contact</th>
                                 <!-- <th width="4%">Description</th> -->
                                 <th width="6%">Assign</th>
                                 <th width="24%">Time</th>
                                 <th width="8%">Created</th>
                                 <th width="4%">Action</th>
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
    
</section>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

  <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>  
<!--  <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> -->
  
 <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
   <script type="text/javascript">
      $(function () {
        $.noConflict();
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
             $(document).on('change','#startDate',function() {
             startDate = $(this).datepicker('getDate');
             $("#endDate").datepicker("option", "minDate", startDate );
             })
      
      
       });
      
      
      
      $(document).ready(function(){
      
       $('.user111').change(function(){
         $('#form').submit();
       });
       $('.user1111').change(function(){
         $('#form1').submit();
       });
      
       $( "#datepicker" ).datepicker();
       // DataTable
       var oTable;
       oTable = $('#empTable').DataTable({
          
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
             url: "{{url('/app/ticket2')}}",
             type: "get",
            // dataType: 'json',
            /* data: {
                 filterParams: {
                     status: $('#status option:selected').text()
                    
                 }
             }*/
      
             data: function(d){
             //d.searchUser = {"value":"{{$edit->Organization_Name}}"};
             d.searchUser = "{{$edit->Organization_Name}}";
            d.status = $('#status option:selected').val();
             d.customer = $('#customer option:selected').val();
             d.user = $('#user option:selected').val();
             d.startDate = $('#startDate').val();
             d.endDate = $('#endDate').val();
             d.rating = $('#rating').val();
             }
         },
          columns: [
             { data: 'tid' },
             { data: 'oname' },
             { data: 'user' },
             { data: 'phone' },
             { data: 'contact_person' },
             // { data: 'description' },
             { data: 'asignName' },
             { data: 'time' },
             { data: 'cdate' },
             { data: 'btn' },
             
      
          ],
           "order": [[ 7, "DESC" ]],
          "aoColumnDefs": [{ "bSortable": false, "aTargets": [6] }],
           
          "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     console.log(aData);
                     var id=  aData.tid;
                     
      
                     if(aData.timeStatus==2){
                       $('td:eq(6)', nRow).css('color', '#d86400');
                     }
                     if(aData.timeStatus==3){
                       $('td:eq(6)', nRow).css('color', 'red');
                     }
                     var hideDelete= '';
                     if(aData.tickect_delete==0){
                       var hideDelete= 'display:none';
                     }
                     var tickect_edit= '';
                     if(aData.tickect_edit==0){
                       var tickect_edit= 'display:none';
                     }
      
                     
                      
                          
                     if(aData.ticketstatus==2){ 
                     
                       $('td:eq(8)', nRow).html("<a style='"+hideDelete+"' href='javascript:;' class='delete1' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a>");
                       }else{
                         $('td:eq(8)', nRow).html("<div class='dropdown' ><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/reassign')}}/"+id+"'><i class='bx bx-analyse'></i> Re-Assign</a><a class='dropdown-item' href='{{url('app/ticket/close')}}/"+id+"'><i class='bx bx-check'></i> Close</a></div><a href='javascript:;' class='delete' data='"+id+"' style='"+hideDelete+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ticket/edit')}}/"+id+"' style='float: left !important;"+tickect_edit+"'><i class='bx bx-edit-alt' ></i></a>");
                       }
      
                     
      
      
      
                    // $('td:eq(6)', nRow).html("<div class='dropdown'><span class='bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' role='menu'></span><div class='dropdown-menu dropdown-menu-right'> <a class='dropdown-item' href='{{url('app/renew')}}/"+id+"'><i class='bx bx-analyse'></i> Renew</a><a class='dropdown-item' href='{{url('app/agree')}}/"+id+"'><i class='bx bx-check'></i> Agree</a><a class='dropdown-item' href='{{url('app/cancelled')}}/"+id+"><i class='bx bxs-x-circle'></i> Cancelled</a></div><a href='javascript:;' class='delete' data='"+id+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;'><i class='bx bx-edit-alt' ></i></a>  ");
                    // $('td:eq(6)', nRow).html("<a href='{{url('app/ictran/edit')}}/"+id+"' style='float: left !important;''><i class='bx bx-edit-alt' ></i></a>");
                 }
       });
      
      
       //oTable.ajax.reload();
       $(document).on('click','.submit',function(){
        oTable.draw();
       });
      });
      
      
      
      
      $(document).on('click','.delete',function(){
         var attr= $(this).attr('data');
         if (confirm('Are you sure you want to delete this ?')) {
         window.location.href = "{{url('app/ticket/delete')}}/"+attr;
         }
         
       });
   </script>
   <script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
   