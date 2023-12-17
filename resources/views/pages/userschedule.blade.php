 <section class="users-list-wrapper">
  
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

                        <div class="form>" style="display: none" >
                          <div class="form-group" style="float: left;">
                            <label>Trainer</label>
                            <select class="form-control status" id="trainer" style="width:75px">
                              <option value="">--select--</option>
                              @foreach($trainsers as $trainer)
                                <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                              @endforeach
                               
                            </select>
                          </div>

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Type</label>
                            <select class="form-control status" id="type" style="">
                            <option value="">--Select--</option>
                               <option value="1" selected="">Training</option>
                               <option value="2">Onsite</option>
                               <option value="3">Demo</option>
                               <option value="4">Public Holiday</option>
                               <option value="5">On Leave</option>
                                
                              
                            </select>
                          </div>


                          <div class="form-group" style="float: left;margin-left: 9px;">
                            <label>Product</label>
                             <select class="form-control product" name="product">
                                        <option value="">Select Product</option>
                                        @foreach($trainingSetting as $setProduct)
                                          <option value="{{$setProduct->description}}">{{$setProduct->description}}</option>
                                        @endforeach   
                            </select>
                          </div>

                            

                          <div class="form-group jj">
                          <label></label>
                          <button type="button" class="btn btn-success submit" style="    margin-top: 23px;"><i class="bx bx-search-alt-2"></i></button>
                          <a href="{{url('/app/scheduling')}}" class="btn btn-warning" style="    margin-top: 23px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>


                        <div class="col-md-4"></div>

                        <div class="table-responsive1">
                            <table id='empTablee' class="table" style="width: 100% !important;">
                                <thead>
                                <tr>
                                    
                                    <th width="10%">Trainer</th>
                                    <th width="40%">Customer Name</th>
                                    <th width="15%">Product</th>
                                    
                                    <th width="15%">Type</th>
                                    <th width="15%">Date</th>
                                    <!-- <th width="4%">Description</th> -->
                                    <th width="15%">Start</th>
                                    <th width="24%">End</th>
                                    <th width="4%">Action</th>
                                </tr>
                                </thead>
                                 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
  </div>
   
</section>
  <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>  
   
   <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>
 
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">


    $(function () {
      $.noConflict();
          
      });
        var oTable133;
        oTable133 =  $('#empTablee').DataTable({

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
            url: "{{url('/app/schedulingData1')}}",
            type: "get",
           // dataType: 'json',
           /* data: {
                filterParams: {
                    status: $('#status option:selected').text()
                   
                }
            }*/

            data: function(d){
             d.searchUser = $("input[name='Organization_Name']").val();
            //d.trainer = $('#trainer option:selected').val();
            d.product = $('.product option:selected').val();
            d.type = $('#type option:selected').val();
            //d.type = 1;
            //d.user = $('#user option:selected').val();
            d.startDate = $('#startDate').val();
            d.endDate = $('#endDate').val();
           // d.rating = $('#rating').val();
            }
        },
         columns: [
           
            { data: 'name' },

            { data: 'customerName' },
            { data: 'product' },
            
            { data: 'trainerType' },
            { data: 'date' },
            { data: 'starttime' },
            // { data: 'description' },
            { data: 'endtime' },
            { data: 'endtime' },
            
            

         ],
          order: [
                 [4, 'DESC']
             ],
      //   "aoColumnDefs": [{ "bSortable": false, "aTargets": [6] }],
          
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    console.log(aData);
                    var id=  aData.id;
                    

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

                    
                     
                         
                    $('td:eq(7)', nRow).html("<a href='javascript:;' class='delete' data='"+id+"' style='"+hideDelete+"' onclick='return confirm('Are you sure you want to delete this ?')' style='float: : left !important'><i class='bx bx-trash-alt'></i></a><a href='{{url('app/schedule/edit')}}/"+id+"' style='float: left !important;"+tickect_edit+"'><i class='bx bx-edit-alt' ></i></a>");

                    



                  
                }
      });

     $(document).on('click','.submit',function(){
        oTable133.draw();
       });


 $(document).on('click','.delete',function(){
        var attr= $(this).attr('data');
        if (confirm('Are you sure you want to delete this ?')) {
        window.location.href = "{{url('app/scheduling/delete')}}/"+attr;
        }
        
      });

    </script>
   
   

  
 
 
