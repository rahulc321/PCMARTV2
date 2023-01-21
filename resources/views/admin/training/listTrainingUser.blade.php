<?php  error_reporting(0); ?>
 
<style type="text/css">
.nav.nav-tabs .nav-item, .nav.nav-pills .nav-item {
margin-right: 0.2rem;
}
</style>

<section class="users-list-wrapper">
   
   <div class="users-list-table">
      <div class="card">
         <div class="card-body">
         <div class="col-lg-12">
             
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
               <table id="empTable8" class="table">
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
                     <?php $ids=[]; ?>
                     @foreach($training as $key=>$value) 
                     <?php 
                        //echo '<pre>';print_r(count($value['getCountDta']));
                         // $checkSess1= App\Models\ScheduleSession::where('sessionId',1)->where('trainingId',$value->id)->count();
                         // $checkSess2= App\Models\ScheduleSession::where('sessionId',2)->where('trainingId',$value->id)->count();
                        
                         // if($checkSess1 > 0){
                         //   $text= '1';
                         //   $class="danger";
                         // }else{
                         //   $text= '1';
                         //   $class="success";
                         // }
                        
                         // if($checkSess2 > 0){
                         //   $text1= '2';
                         //   $class1="danger";
                         // }else{
                         //   $text1= '2';
                         //   $class1="success";
                         // }
                        
                         $module='training_edit';
                        
                         
                        
                        
                        
                        if(count($value['getCountDta'])== $c || $value['getCountDta']=='none' || $c==''){
                         ?>
                     <tr>
                        <td>{{$value->Invoice}}</td>
                        <td>{{$value->customer_name}}</td>
                        <td>{{$value->code}}</td>
                        <td>{{$value->product}}</td>
                        <td>{{$value->value}}</td>
                        <td style="text-align: center !important;">{{$value->trainee}}</td>
                        <td><span style="display: none">{{date('Y-m-d',strtotime($value->invoice_date))}}</span>{{date('d-m-Y',strtotime($value->invoice_date))}}</td>
                        <td>
                           <?php for ($i=1; $i <= $value->noOfSession; $i++) { 
                              $checkSess= App\Models\ScheduleSession::where('sessionId',$i)->where('trainingId',$value->id)->count();
                              $check= $checkSess;
                              if($check > 0){
                              $ids[]=App\Models\ScheduleSession::where('sessionId',$i)->where('trainingId',$value->id)->first()->toArray();
                              $text= '1';
                              $class="danger";
                              }else{
                                $text= '1';
                                $class="success";
                              }
                              
                              $url= asset('app/sessionView').'/'.$value->id.'/'.$i;
                              ?>
                           <a href="@if($check > 0) {{'javascript:;'}} @else {{asset('app/session')}}/{{$value->id}}/{{$i}} @endif" class="btn btn-{{$class}} ww test000" onclick="myOverFunction(<?=$value->id.$i?>)" data="<?=$value->id.'_'.$i?>" style="float: left !important;margin-left: 2px;border-radius: 70px;height: 36px;color: white;width: 36px;">
                           {{$i}}
                           </a>
                           <!--  <a href="@if($checkSess2 > 0) {{$url}} @else {{asset('app/session')}}/{{$value->id}}/2 @endif" class="btn btn-{{$class1}} ww" style="float: left !important;margin-left: 2px;">
                              {{$text1}}
                              </a> -->
                           <?php } ?>
                        </td>
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
                     <?php  }  ?> 
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- datatable ends -->
         </div>
         </div>
      </div>
   </div>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
</section>
<!-- users list ends -->
<!-- Model Code -->
<!-- Button to Open the Modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_99_2">
   Open modal
   </button> -->
<?php //echo '<pre>';print_r($ids); ?>
@foreach($ids as $key=>$edit)
<?php
   $url= asset('app/sessionView').'/'.$edit['trainingId'].'/'.$edit['sessionId'];
   $dis='disabled';
   ?>
<!-- The Modal -->
<div class="modal" id="myModal_{{$edit['trainingId'].$edit['sessionId']}}">
   <div class="modal-dialog">
      <div class="modal-content">
         <section class="users-edit">
            <div class="card" style="margin: 0;">
               <div class="card-body">
                  <ul class="nav nav-tabs mb-2" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                           href="<?=$url?>" aria-controls="account" role="tab" aria-selected="true">
                        <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">View Session</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <!-- <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                           href="#information" aria-controls="information" role="tab" aria-selected="false">
                           <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Information</span>
                           </a> -->
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <!-- users edit media object start -->
                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form class="form-validate" action="{{url('/app/updatesession/')}}/{{$id}}/{{$sId}}" method="post">
                           @csrf
                           <div class="row">
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <div class="controls">
                                       <label>Organization Number</label>
                                       <input type="text" class="form-control" placeholder="Organization Number" name="customer" required="" value="{{$edit['customerId']}}" <?=$dis?>>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="controls">
                                       <label>Organization Name</label>
                                       <input type="text" class="form-control" placeholder="Organization Name" name="customer_name" required="" value="{{$edit['customerName']}}" <?=$dis?>>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="controls">
                                       <label>Trainer</label>
                                       <select class="form-control" name="trainerId" <?=$dis?>>
                                       @foreach($trainers as $trainer)
                                       <option value="{{$trainer->id}}" @if($edit['trainerId']==$trainer->id) {{'selected'}} @endif>{{$trainer->name}}</option>
                                       @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="controls">
                                       <label>Product</label>
                                       <input type="text" class="form-control" placeholder="Product" name="Product" required="" value="{{$edit['product']}}" <?=$dis?>>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <div class="controls">
                                       <label>Choose Date</label>
                                       <input type="text" name="datetimes"  class="form-control" id="datepicker" value="{{date('d-m-Y',strtotime($edit['date']))}}" <?=$dis?>/>
                                    </div>
                                 </div>
                                 <div class="col-sm-6" style="float: left;margin-left: -14px;">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label>Start Time</label>
                                          <input style="width: 81px;" type="text" name="startTime"  class="form-control" id="start" value="{{date('G:i a',strtotime($edit['startTime']))}}" <?=$dis?>/>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6" style="float: left;">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label>End Time</label>
                                          <input style="width: 81px;" type="text" name="endTime"  class="form-control" id="end" value="{{date('G:i a',strtotime($edit['endTime']))}}"<?=$dis?> />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="controls">
                                       <label>Status</label>
                                       <select class="form-control" name="status">
                                       <option value="1" @if($edit['status']==1) {{'selected'}} @endif>Online</option>
                                       <option value="2" @if($edit['status']==2) {{'selected'}} @endif>Onsite</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="controls">
                                       <label>Remark</label>
                                       <textarea class="form-control" <?=$dis?> name="remark" placeholder="Remark">{{$edit['remark']}}</textarea>
                                    </div>
                                 </div>
                                 <a href="<?=$url?>">Edit</a>
                                 <!-- Modal footer -->
                                 <button type="button" style="float: right;" class="btn btn-danger" rel="{{$edit['trainingId'].$edit['sessionId']}}" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </form>
                        <!-- users edit account form ends -->
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
<!-- Model Code -->
@endforeach
<?php
   $purchased= $currentYear;
   
   // Second array for sold product 
   $sold= $lastYear; 
   
   ?>
 
 
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script> -->

<script type="text/javascript">

   $('#empTable8').DataTable({ 
       // "aaSorting": [[ 6, "asc" ]] 
        order: [
                 [6, 'asc']
             ],
     });
   
   function myOverFunction(id){
     $('#myModal_'+id).show();
   }
   
   
   $(function () {
   
   
           // $( ".test000" ).hover(function() {
           //   var id= $(this).attr('data');
           //   alert(id);
           //  $('#myModal_'+id).show();
           // });
   
           $('.btn-danger').click(function(){
             var id= $(this).attr('rel');
            $('#myModal_'+id).hide();
           });
   
   
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
   
           $('.typeww').change(function(){
           $('#form2').submit();
           });
           $('.typeww1').change(function(){
           $('#form2').submit();
           });
            $('.form3').change(function(){
           $('#form3').submit();
           });
       });
   
   
   
   // Column Chart
   // ----------------------------------
   google.charts.load('current', {'packages':['corechart']});
       google.charts.setOnLoadCallback(drawChart4);
   
       function drawChart4() {
     
       var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        <?php foreach ($arrayChart as $key => $value) { ?>
          
        ['<?=$value['name']?>', <?=$value['sum']?>],
         
         <?php } ?>
         
      ]);
    
      var options = {
       // title: 'Users',         
         pieHole: 0.55,
          legend: 'none',
         //legend:{position: 'bottom'},
         
         width:'100%',
        // height:390,
   
        
        pieSliceTextStyle:{
          fontSize:10
        },
        
        chartArea:{left:15,top:0,width:'100%',height:'100%'},                  
      slices: {0:{color: '#ed5565'}, 1:{color: '#f8ac59'}, 2: {color: '#23c6c8'}}
      };
    
      var chart = new google.visualization.PieChart(document.getElementById('chart3'));
      chart.draw(data, options);
    }
   
   
   
   
   
   var $primary = '#5A8DEE',
             $success = '#39DA8A',
             $danger = '#FF5B5C',
             $warning = '#FDAC41',
             $info = '#39DA8A',
             $label_color_light = '#39DA8A';
   
             var themeColors = [$primary, $info, $danger, $success, '#39DA8A'];
   
   
   var columnChartOptions = {
     chart: {
       height: 350,
       type: 'bar',
     },
     colors: themeColors,
     plotOptions: {
       bar: {
         horizontal: false,
         endingShape: 'rounded',
         columnWidth: '55%',
       },
     },
     dataLabels: {
       enabled: false
     },
     stroke: {
       show: true,
       width: 2,
       colors: ['transparent']
     },
     series: [
     {name: 'Last 3 Year',
       /// color:'#39DA8A',
       data: [<?=$lst3Year[0]?>,<?=$lst3Year[1]?>,<?=$lst3Year[2]?>,<?=$lst3Year[3]?>,<?=$lst3Year[4]?>,<?=$lst3Year[5]?>,<?=$lst3Year[6]?>,<?=$lst3Year[7]?>,<?=$lst3Year[8]?>,<?=$lst3Year[9]?>,<?=$lst3Year[10]?>,<?=$lst3Year[11]?>]
     },
     {
       name: 'Last Year',
       /// color:'#39DA8A',
       data: [<?=$sold[0]?>,<?=$sold[1]?>,<?=$sold[2]?>,<?=$sold[3]?>,<?=$sold[4]?>,<?=$sold[5]?>,<?=$sold[6]?>,<?=$sold[7]?>,<?=$sold[8]?>,<?=$sold[9]?>,<?=$sold[10]?>,<?=$sold[11]?>]
     }, {
       name: 'Current Year',
       color:'#007F64',
       data: [<?=$purchased[0]?>,<?=$purchased[1]?>,<?=$purchased[2]?>,<?=$purchased[3]?>,<?=$purchased[4]?>,<?=$purchased[5]?>,<?=$purchased[6]?>,<?=$purchased[7]?>,<?=$purchased[8]?>,<?=$purchased[9]?>,<?=$purchased[10]?>,<?=$purchased[11]?>]
     }],
     legend: {
       offsetY: 8
     },
     xaxis: {
       categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
     },
     yaxis: {
       title: {
         text: ''
       }
     },
     fill: {
       opacity: 1
   
     },
     tooltip: {
       y: {
         formatter: function (val) {
           return "" + val + ""
         }
       }
     }
   }
   var columnChart = new ApexCharts(
     document.querySelector("#column-chart"),
     columnChartOptions
   );
   
   columnChart.render();
       
   
   
</script>
