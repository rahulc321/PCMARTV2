@extends('layouts.contentLayoutMaster')
@section('content')
<?php error_reporting(0); ?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css">
<style type="text/css">
/*  body{
  font-family: Roboto;
  padding: 30px;
}
.dropNewEvent{
  font-family: Roboto;
  font-size: 13px;
}
.popoverTitleCalendar{
  width: 100%;
  height: 100%;
  padding: 15px 15px;
  font-family: Roboto;
  font-size: 13px;
  border-radius: 5px 5px 0 0;
}
.popoverInfoCalendar i{
  font-size: 14px;
    margin-right: 10px;
    line-height: inherit;
    color: #d3d4da;
}
.popoverInfoCalendar p{
  margin-bottom: 1px;
}
.popoverDescCalendar{
  margin-top: 12px;
  padding-top: 12px;
  border-top: 1px solid #E3E3E3;
  overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.popover-title {
    background: transparent;
    font-weight: 600;
    padding: 0 !important;
    border: none;
}
.popover-content {
    padding: 15px 15px;
    font-family: Roboto;
    font-size: 13px;
}
.inputModal{
  width: 65%;
  margin-bottom: 10px;
}
#contextMenu {
  position: absolute;
  display:none;
  z-index: 2;
}
#contextMenu .dropdown-menu{
  border: none;
}
.opacityWeekend{
  background-color: #f4f4fb !important;
}
.fc-avatar-image{
    top: 4px;
    left: 20px;
    height: 28px;
    width: 28px;
    border-radius: 50%;
    position: absolute;
    z-index: 2;
}
.fc-avatar-image img{
  height: 28px;
  width: 28px;
  border-radius: 50%;
}
.fc-avatar-image:before{
    content: none !important;
}
.fc-day-header{
  text-transform: uppercase;
  font-size: 13px;
  font-family: Roboto;
  font-weight: 500;
  color: #505363;
  background-color: #FAFAFA;
  padding: 11px 0px !important;
  text-decoration: none;
}
.fc-day-header a{
  text-decoration: none !important;
  color: #505363;
}
.fc-center h2{
   text-transform: uppercase;
  font-size: 18px;
  font-family: Roboto;
  font-weight: 500;
  color: #505363;
  line-height: 32px;
}
.fc-toolbar.fc-header-toolbar {
    margin-bottom: 22px;
    padding-top: 22px;
}
.fc-agenda-view .fc-day-grid .fc-row .fc-content-skeleton {
    padding-bottom: 1em;
    padding-top: 1em;
}
.fc-day{
  transition: all 0.2s linear;
}
.fc-day:hover{
  background:#EEF7FF;
  cursor: pointer;
  transition: all 0.2s linear;
}
.fc-highlight {
    background: #EEF7FF;
    opacity: 0.7;
}
.fc-time-grid-event.fc-short .fc-time:before {
    content: attr(data-start);
    display: none;
}
.fc-time-grid-event.fc-short .fc-time span {
    display: inline-block;
}
.fc-time-grid-event.fc-short .fc-avatar-image {
    display: none;
    transition: all 0.3s linear;
}
.fc-time-grid .fc-bgevent, .fc-time-grid .fc-event {
    border: 1px solid #fff !important;
}
.fc-time-grid-event.fc-short .fc-content {
    padding: 4px 20px 10px 22px !important;
}
.fc-time-grid-event .fc-avatar-image{
    top: 9px;
}
.fc-event-vert {
  min-height: 22px;
}
.fc .fc-axis {
    vertical-align: middle;
    padding: 0 4px;
    white-space: nowrap;
    font-size: 10px;
    color: #505362;
    text-transform: uppercase;
    text-align: center !important;
    background-color: #fafafa;
}
.fc-unthemed .fc-event .fc-content, .fc-unthemed .fc-event-dot .fc-content {
    padding: 10px 20px 10px 22px;
    font-family: 'Roboto', sans-serif;
    margin-left: -1px;
    height: 100%;
}
.fc-event{
    border: none !important;
}
.fc-day-grid-event .fc-time {
    font-weight: 700;
      text-transform: uppercase;
}
.fc-unthemed .fc-day-grid td:not(.fc-axis).fc-event-container {
    padding: 0.2rem 0.5rem;
}
.fc-unthemed .fc-content, .fc-unthemed .fc-divider, .fc-unthemed .fc-list-heading td, .fc-unthemed .fc-list-view, .fc-unthemed .fc-popover, .fc-unthemed .fc-row, .fc-unthemed tbody, .fc-unthemed td, .fc-unthemed th, .fc-unthemed thead {
    border-color: #DADFEA;
}
.fc-ltr .fc-h-event .fc-end-resizer, .fc-ltr .fc-h-event .fc-end-resizer:before, .fc-ltr .fc-h-event .fc-end-resizer:after, .fc-rtl .fc-h-event .fc-start-resizer, .fc-rtl .fc-h-event .fc-start-resizer:before, .fc-rtl .fc-h-event .fc-start-resizer:after {
    left: auto;
    cursor: e-resize;
    background: none;
}
.colorAppointment :before {
    background-color: #9F4AFF;
    border-right: 1px solid rgba(255, 255, 255, 0.6);
    display: block;
    content: " ";
    position: absolute;
    height: 100%;
    width: 8px;
    border-radius: 3px 0 0 3px;
    top: 0;
    left: -1px;
}
.colorCheck-in :before {
    background-color: #ff4747;
    border-right: 1px solid rgba(255, 255, 255, 0.6);
    display: block;
    content: " ";
    position: absolute;
    height: 100%;
    width: 8px;
    border-radius: 3px 0 0 3px;
    top: 0;
    left: -1px;
}
.colorCheckout :before {
    background-color: #FFC400;
    border-right: 1px solid rgba(255, 255, 255, 0.6);
    display: block;
    content: " ";
    position: absolute;
    height: 100%;
    width: 8px;
    border-radius: 3px 0 0 3px;
    top: 0;
    left: -1px;
}
.colorInventory :before {
    background-color: #FE56F2;
    border-right: 1px solid rgba(255, 255, 255, 0.6);
    display: block;
    content: " ";
    position: absolute;
    height: 100%;
    width: 8px;
    border-radius: 3px 0 0 3px;
    top: 0;
    left: -1px;
}
.colorValuation :before {
    background-color: #0DE882;
    border-right: 1px solid rgba(255, 255, 255, 0.6);
    display: block;
    content: " ";
    position: absolute;
    height: 100%;
    width: 8px;
    border-radius: 3px 0 0 3px;
    top: 0;
    left: -1px;
}
.colorViewing :before {
    background-color: #26CBFF;
    border-right: 1px solid rgba(255, 255, 255, 0.6);
    display: block;
    content: " ";
    position: absolute;
    height: 100%;
    width: 8px;
    border-radius: 3px 0 0 3px;
    top: 0;
    left: -1px;
}
select.filter{
  width: 500px !important;
}

.popover  {
  background: #fff !important;
  color: #2E2F34;
  border: none;
  margin-bottom: 10px;
}

/*popover header*/
/*.popover-title{
    background: #F7F7FC;
    font-weight: 600;
    padding: 15px 15px 11px ;
    border: none;
}

/*popover arrows*/
 
</style>
<div class="row">
  
<div class="col-lg-6">
<input class="form-control" id="searchTextField" type="text" size="50" placeholder="Enter a location" autocomplete="on" runat="server" /> 
</div>

<div class="col-lg-6">
<select class="form-control" id="switchWeatherTheme">
  <option value="weather_one">Weather Conditions</option>
  
  <option value="original">Original</option>
  <option value="pure">Pure</option>
  <option value="orange">Orange</option>
  <option value="gray">Gray</option>
  <option value="dark">Dark</option>
  <option value="desert">Desert</option>
  <option value="candy">Candy</option>
  <option value="beige">Beige</option>
  <option value="blank">Blank</option>
  <option value="salmon">Salmon</option>
  
  <option value="marine">Marine</option>
  <option value="mountains">Mountains</option>
</select>
</div>

</div>


<div id="openviewWeather">
    <a class="weatherwidget-io" href="https://forecast7.com/en/51d51n0d13/london/" data-label_1="London" data-label_2="Weather" data-font="Roboto" data-icons="Climacons Animated" data-theme="original" data-accent="rgba(1, 1, 1, 0.0)"></a>
</div>

<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css' rel='stylesheet' media='print' />

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<div id="contextMenu" class="dropdown clearfix">

</div>

<div class="panel panel-default hidden-print">
  <div class="panel-heading">
    <h3 class="panel-title">Calendar Configuration</h3>
  </div>
  <div class="panel-body">
    
    <div class="col-lg-4">
  
  <label for="calendar_view">Add Custom Calendar</label>
  <div class="input-group">
      <input type="text" class="form-control" id="inputCustomCalendar" placeholder="Add Custom Calendar">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="addCustomCalendar">Add Calendar</button>
      </span>
    </div>
</div>

<div class="col-lg-2">
<div class="form-group">
  <label for="calendar_view">View Mode</label>
  <select class="form-control" id="calendar_view">
      <option value="month">Month</option>
      <option value="agendaWeek">Week</option>
      <option value="agendaDay">Day</option>
      <option value="listWeek">Event List</option>
    </select>
</div>
</div>

<div class="col-lg-2">
<div class="form-group">
  <label for="calendar_start_time">Start Time Agenda:</label>
  <select class="form-control" id="calendar_start_time">
    <option value="01:00:00">01:00 AM</option>
    <option value="02:00:00">02:00 AM</option>
    <option value="03:00:00">03:00 AM</option>
    <option value="04:00:00">04:00 AM</option>
    <option value="05:00:00">05:00 AM</option>
    <option value="06:00:00">06:00 AM</option>
    <option value="07:00:00">07:00 AM</option>
    <option value="08:00:00">08:00 AM</option>
    <option value="09:00:00">09:00 AM</option>
    <option value="10:00:00">10:00 AM</option>
    <option value="11:00:00">11:00 AM</option>
    <option value="12:00:00">12:00 PM</option>
    <option value="13:00:00">13:00 PM</option>
    <option value="14:00:00">14:00 PM</option>
    <option value="15:00:00">15:00 PM</option>
    <option value="16:00:00">16:00 PM</option>
    <option value="17:00:00">17:00 PM</option>
    <option value="18:00:00">18:00 PM</option>
    <option value="19:00:00">19:00 PM</option>
    <option value="20:00:00">20:00 PM</option>
    <option value="21:00:00">21:00 PM</option>
    <option value="22:00:00">22:00 PM</option>
    <option value="23:00:00">23:00 PM</option>    
  </select>
</div>
</div>

<div class="col-lg-2">
<div class="form-group">
  <label for="calendar_end_time">End Time Agenda:</label>
  <select class="form-control" id="calendar_end_time">
    <option value="01:00:00">01:00 AM</option>
    <option value="02:00:00">02:00 AM</option>
    <option value="03:00:00">03:00 AM</option>
    <option value="04:00:00">04:00 AM</option>
    <option value="05:00:00">05:00 AM</option>
    <option value="06:00:00">06:00 AM</option>
    <option value="07:00:00">07:00 AM</option>
    <option value="08:00:00">08:00 AM</option>
    <option value="09:00:00">09:00 AM</option>
    <option value="10:00:00">10:00 AM</option>
    <option value="11:00:00">11:00 AM</option>
    <option value="12:00:00">12:00 PM</option>
    <option value="13:00:00">13:00 PM</option>
    <option value="14:00:00">14:00 PM</option>
    <option value="15:00:00">15:00 PM</option>
    <option value="16:00:00">16:00 PM</option>
    <option value="17:00:00">17:00 PM</option>
    <option value="18:00:00">18:00 PM</option>
    <option value="19:00:00">19:00 PM</option>
    <option value="20:00:00">20:00 PM</option>
    <option value="21:00:00">21:00 PM</option>
    <option value="22:00:00">22:00 PM</option>
    <option value="23:00:00">23:00 PM</option> 
  </select>
</div>
</div>

<div class="col-lg-2">
    
<div class="form-group">
  <label for="ShowWeekends">Calendar Weekends</label>
  <div class="input-group">
  <input class='showHideWeekend' type="checkbox" checked>
    </div>
</div>
</div>
    
  </div>
</div>


<div class="panel panel-default hidden-print">
  <div class="panel-heading">
    <h3 class="panel-title">Filter Calendar (Users, Calendar and Eventy Type)</h3>
  </div>
  <div class="panel-body">
    
    <div class="col-lg-4">
  
  <label for="calendar_view">Filter Eventy Type</label>
  <div class="input-group">
      <select class="filter" id="type_filter" multiple="multiple">
        <option value="Appointment">Appointment</option>
        <option value="Check-in">Check-in</option>
        <option value="Checkout">Checkout</option>
        <option value="Inventory">Inventory</option>
        <option value="Valuation">Valuation</option>
        <option value="Viewing">Viewing</option>
      </select>
    </div>
</div>
    
    <div class="col-lg-4">
  
  <label for="calendar_view">Filter Calendars</label>
  <div class="input-group">
      <select class="filter" id="calendar_filter" multiple="multiple">
        <option value="Sales">Sales</option>
        <option value="Lettings">Lettings</option>
      </select>
    </div>
</div>
    
    <div class="col-lg-4">
  
  <label for="calendar_view">Filter Users</label>
  <div class="input-group">
      <label class="checkbox-inline"><input class='filter' type="checkbox" value="Caio Vitorelli" checked>Caio Vitorelli</label>
      <label class="checkbox-inline"><input class='filter' type="checkbox" value="Peter Grant" checked>Peter Grant</label>
      <label class="checkbox-inline"><input class='filter' type="checkbox" value="Adam Rackham" checked>Adam Rackham</label>
  </div>
</div>
    
  </div>
</div>

        <div id="wrapper">
            <div id="loading"></div>
            <div class="print-visible" id="calendar"></div>
        </div>
    
      
      <!-- ADD EVENT MODAL -->
      
      <div class="modal fade" tabindex="-1" role="dialog" id="newEventModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create new <span class="eventType"></span></h4>
            </div>
            <div class="modal-body">
              
              <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">All Day Event ?</label>
                        <input class='allDayNewEvent' type="checkbox"></label>
                    </div>
                </div>
          
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">Event title</label>
                        <input class="inputModal" type="text" name="title" id="title" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="starts-at">Starts at</label>
                        <input class="inputModal" type="text" name="starts_at" id="starts-at" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="ends-at">Ends at</label>
                        <input class="inputModal" type="text" name="ends_at" id="ends-at" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="calendar-type">Calendar</label>
                        <select class="inputModal" type="text" name="calendar-type" id="calendar-type">
                          <option value="Sales">Sales</option>
                          <option value="Lettings">Lettings</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="add-event-desc">Description</label>
                        <textarea rows="4" cols="50" class="inputModal" name="add-event-desc" id="add-event-desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-event">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      
      
      <!-- EDIT EVENT MODAL -->
      
      <div class="modal fade" tabindex="-1" role="dialog" id="editEventModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit <span class="eventName"></span></h4>
            </div>
            <div class="modal-body">
              
                
          
          <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">All Day Event ?</label>
                        <input class='allDayEdit' type="checkbox"></label>
                    </div>
                </div>
          
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">Event title</label>
                        <input class="inputModal" type="text" name="editTitle" id="editTitle" />
                    </div>
                </div>
          
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="starts-at">Starts at</label>
                        <input class="inputModal" type="text" name="editStartDate" id="editStartDate" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="ends-at">Ends at</label>
                        <input class="inputModal" type="text" name="editEndDate" id="editEndDate" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="edit-calendar-type">Calendar</label>
                        <select class="inputModal" type="text" name="edit-calendar-type" id="edit-calendar-type">
                          <option value="Sales">Sales</option>
                          <option value="Lettings">Lettings</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="edit-event-desc">Description</label>
                        <textarea rows="4" cols="50" class="inputModal" name="edit-event-desc" id="edit-event-desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteEvent">Delete Event</button>
                <button type="button" class="btn btn-primary" id="updateEvent">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      

@endsection
@section('page-scripts')
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

 


<!--  -->
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCit4RJVPT9UiLQCJJPYEBkNTJCslqO4ps&libraries=places"></script>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css">
 

<!--  -->

<script type="text/javascript">
  $('#empTable').DataTable({ 
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
    series: [{
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

<script type="text/javascript">
  var newEvent;
var editEvent;

$(document).ready(function() {
    
   var calendar = $('#calendar').fullCalendar({
       
       eventRender: function(event, element, view) {
         
         var startTimeEventInfo = moment(event.start).format('HH:mm');
         var endTimeEventInfo = moment(event.end).format('HH:mm');
         var displayEventDate;
         
         if(event.avatar.length > 1){
           
           element.find(".fc-content").css('padding-left','45px');
           element.find(".fc-content").after($("<div class=\"fc-avatar-image\"></div>").html(event.description));
           element.find(".fc-content").after($("<div class=\"fc-avatar-image\"></div>").html(event.title));
           
         }
         
         if(event.allDay == false){
           displayEventDate = startTimeEventInfo + " - " + endTimeEventInfo;
         }else{
           displayEventDate = "All Day";
         }
         
          element.popover({
            title:    '<div class="popoverTitleCalendar" style="background-color:'+ event.backgroundColor +'; color:'+ event.textColor +'">'+ event.title +'</div>',
            content:  '<div class="popoverInfoCalendar">' +
                      '<p><strong>Session:</strong> ' + event.Session + '</p>' +
                      '<p><strong>Product:</strong> ' + event.product + '</p>' +
                      '<p><strong>Time:</strong> ' + displayEventDate + '</p>' +
                      '<div class="popoverDescCalendar"><strong>Customer:</strong> '+ event.description +'</div>' +
                      '</div>',
            delay: { 
               show: "800", 
               hide: "50"
            },
            trigger: 'hover',
            placement: 'top',
            html: true,
            container: 'body'
          });
         
           if (event.title == "Rahul") {
               element.css('background-color', '#f4516c');
           }
           if (event.username == "Peter Grant") {
               element.css('background-color', '#1756ff');
           }
           if (event.username == "Adam Rackham") {
               element.css('background-color', '#9816f4');
           }

           var show_username, show_type = true, show_calendar = true;

           var username = $('input:checkbox.filter:checked').map(function() {
               return $(this).val();
           }).get();
           var types = $('#type_filter').val();
           var calendars = $('#calendar_filter').val();

           show_username = username.indexOf(event.username) >= 0;

           if (types && types.length > 0) {
               if (types[0] == "all") {
                   show_type = true;
               } else {
                   show_type = types.indexOf(event.type) >= 0;
               }
           }

           if (calendars && calendars.length > 0) {
               if (calendars[0] == "all") {
                   show_calendar = true;
               } else {
                   show_calendar = calendars.indexOf(event.calendar) >= 0;
               }
           }

           //return show_username && show_type && show_calendar;
           return  show_type && show_calendar;
          
       },
       customButtons: {
          printButton: {
            icon: 'print',
            click: function() {
              window.print();
            }
          }
        },
       header: {
           left: 'today, prevYear, nextYear, printButton',
           center: 'prev, title, next',
           right: 'month,agendaWeek,agendaDay,listWeek'
       },
       views: {
            month: {
              columnFormat:'dddd'
            },
            agendaWeek:{
              columnFormat:'ddd D/M',
              eventLimit: false
            },
            agendaDay:{
              columnFormat:'dddd',
              eventLimit: false
            },
            listWeek:{
              columnFormat:''
            }
        },
     
       loading: function(bool) {
           //alert('events are being rendered');
       },
       eventAfterAllRender: function(view) {
           if(view.name == "month"){
              $(".fc-content").css('height','auto');
            }
       },
       eventLimitClick: function(cellInfo, event) {
           

       },
       eventResize: function(event, delta, revertFunc, jsEvent, ui, view) {
            $('.popover.fade.top').remove();
       },
       eventDragStart: function(event, jsEvent, ui, view) {
            var draggedEventIsAllDay;
            draggedEventIsAllDay = event.allDay;
       },
       eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
            $('.popover.fade.top').remove();
       },
       unselect: function(jsEvent, view) {
          //$(".dropNewEvent").hide();
       },
       dayClick: function(startDate, jsEvent, view) {
         
         //var today = moment();
         //var startDate;
         
         //if(view.name == "month"){
           
         //  startDate.set({ hours: today.hours(), minute: today.minutes() });
         //  alert('Clicked on: ' + startDate.format());
           
         //}
         
       },
       select: function(startDate, endDate, jsEvent, view) {
         
         var today = moment();
         var startDate;
         var endDate;
         
         if(view.name == "month"){
            startDate.set({ hours: today.hours(), minute: today.minutes() });
            startDate = moment(startDate).format('ddd DD MMM YYYY HH:mm');
            endDate = moment(endDate).subtract('days', 1);
            endDate.set({ hours: today.hours() + 1, minute: today.minutes() });
            endDate = moment(endDate).format('ddd DD MMM YYYY HH:mm');           
         }else{
            startDate = moment(startDate).format('ddd DD MMM YYYY HH:mm');
            endDate = moment(endDate).format('ddd DD MMM YYYY HH:mm');
         }
         
         var $contextMenu = $("#contextMenu");
         
         var HTMLContent = '<ul class="dropdown-menu dropNewEvent" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Appointment" +'")\'> <a tabindex="-1" href="#">Add Appointment</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Check-in" +'")\'> <a tabindex="-1" href="#">Add Check-In</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Checkout" +'")\'> <a tabindex="-1" href="#">Add Checkout</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Inventory" +'")\'> <a tabindex="-1" href="#">Add Inventory</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Valuation" +'")\'> <a tabindex="-1" href="#">Add Valuation</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Viewing" +'")\'> <a tabindex="-1" href="#">Add Viewing</a></li>' +
      '<li class="divider"></li>' +
      '<li><a tabindex="-1" href="#">Close</a></li>' +
    '</ul>';
          
          $(".fc-body").unbind('click');
          $(".fc-body").on('click', 'td', function (e) {
              
              document.getElementById('contextMenu').innerHTML = (HTMLContent);

              $contextMenu.addClass("contextOpened");
              $contextMenu.css({
                display: "block",
                left: e.pageX,
                top: e.pageY
              });
              return false;
            
            });

            $contextMenu.on("click", "a", function(e) {
              e.preventDefault();
              $contextMenu.removeClass("contextOpened");
              $contextMenu.hide();
            });
         
            $('body').on('click', function() {
               $contextMenu.hide();
               $contextMenu.removeClass("contextOpened");
           });

         //newEvent(startDate, endDate);
         
        },
        eventClick: function(event, jsEvent, view) {
          
          editEvent(event);
          
        },
       locale: 'en-GB',
       timezone: "local",
       nextDayThreshold: "09:00:00",
       allDaySlot: true,
       displayEventTime: true,
       displayEventEnd: true,
       firstDay: 1,
       weekNumbers: false,
       selectable: true,
       weekNumberCalculation: "ISO",
       eventLimit: true,
       eventLimitClick: 'week', //popover
       navLinks: true,
       defaultDate: moment('2021-06-07'),
       timeFormat: 'HH:mm',
       defaultTimedEventDuration: '01:00:00',
       editable: true,
       minTime: '07:00:00',
       maxTime: '18:00:00',
       slotLabelFormat: 'HH:mm', 
       weekends: true,
       nowIndicator: true,
       dayPopoverFormat: 'dddd DD/MM', 
       longPressDelay : 0,
       eventLongPressDelay : 0,
       selectLongPressDelay : 0,
       
       events: [
       <?php foreach ($schedulesList as $key => $value) {
       // echo '<pre>'; print_r($value);

        $trainerName= App\Models\Trainer::where('id',$value->trainerId)->first()
        ?>
        
       {
           _id: 1,
           title: "<?=$trainerName->name?>",
           avatar: 'https://republika.mk/wp-content/uploads/2017/07/man-852762_960_720.jpg',
           description: "<?=$value->customerName?>",
           start: "<?=$value->date.'T'.$value->startTime?>",
           end: "<?=$value->date.'T'.$value->endTime?>",
           type: '<?=$trainerName->name?>',
           product: "<?=$value->product?>",
           Session: <?=$value->sessionId?>,
           className: 'colorAppointment',
           username: 'Adam Rackham',
           backgroundColor: "#007500",
           textColor: "#ffffff",
           allDay: false
       },

       <?php } ?>
       ]

   });
  
   $('.filter').on('change', function() {
       $('#calendar').fullCalendar('rerenderEvents');
   });

   $("#type_filter").select2({
       placeholder: "Filter Types",
       allowClear: true
   });

   $("#calendar_filter").select2({
       placeholder: "Filter Calendars",
       allowClear: true
   });
  
  $("#starts-at, #ends-at").datetimepicker({
    format: 'ddd DD MMM YYYY HH:mm'
  });
  
  //var minDate = moment().subtract(0, 'days').millisecond(0).second(0).minute(0).hour(0);
  
  $(" #editStartDate, #editEndDate").datetimepicker({
    format: 'ddd DD MMM YYYY HH:mm'
    //minDate: minDate
  });
  
  //CREATE NEW EVENT CALENDAR

  newEvent = function(start, end, eventType) {
      
      var colorEventyType;
      
      if (eventType == "Appointment"){
        colorEventyType = "colorAppointment";
      }
      else if (eventType == "Check-in"){
        colorEventyType = "colorCheck-in";
      }
      else if (eventType == "Checkout"){
        colorEventyType = "colorCheckout";
      }
      else if (eventType == "Inventory"){
        colorEventyType = "colorInventory";
      }
      else if (eventType == "Valuation"){
        colorEventyType = "colorValuation";
      }
      else if (eventType == "Viewing"){
        colorEventyType = "colorViewing";
      }

      $("#contextMenu").hide();
      $('.eventType').text(eventType);
      $('input#title').val("");
      $('#starts-at').val(start);
      $('#ends-at').val(end);
      $('#newEventModal').modal('show');
      
      var statusAllDay;
      var endDay;
    
      $('.allDayNewEvent').on('change',function () {
      
        if ($(this).is(':checked')) {
          statusAllDay = true;
          var endDay = $('#ends-at').prop('disabled', true);
        } else {
          statusAllDay = false;
          var endDay = $('#ends-at').prop('disabled', false);
        }   
      });
      
      //GENERATE RAMDON ID - JUST FOR TEST - DELETE IT
      var eventId = 1 + Math.floor(Math.random() * 1000);
      //GENERATE RAMDON ID - JUST FOR TEST - DELETE IT
    
      $('#save-event').unbind();
      $('#save-event').on('click', function() {
      var title = $('input#title').val();
      var startDay = $('#starts-at').val();
      if(!$(".allDayNewEvent").is(':checked')){
        var endDay = $('#ends-at').val();
      }
      var calendar = $('#calendar-type').val();
      var description = $('#add-event-desc').val();
      var type = eventType;
      if (title) {
        var eventData = {
            _id: eventId,
            title: title,
            avatar: 'https://i.ibb.co/tzNj68N/Old-scratches-grunge-stamp-with-red-text-BOOKED.jpg',
            start: startDay,
            end: endDay,
            description: description,
            type: type,
            calendar: calendar,
            className: colorEventyType,
            username: 'Caio Vitorelli',
            backgroundColor: '#1756ff',
            textColor: '#ffffff',
            allDay: statusAllDay
        };
        $("#calendar").fullCalendar('renderEvent', eventData, true);
        $('#newEventModal').find('input, textarea').val('');
        $('#newEventModal').find('input:checkbox').prop('checked',false);
        $('#ends-at').prop('disabled', false);
        $('#newEventModal').modal('hide');
        }
      else {
        alert("Title can't be blank. Please try again.")
      }
      });
    }
    
  //EDIT EVENT CALENDAR
  
    editEvent = function(event, element, view) {

        $('.popover.fade.top').remove();
        $(element).popover("hide");
      
        //$(".dropdown").hide().css("visibility", "hidden");
      
        if(event.allDay == true){
          $('#editEventModal').find('#editEndDate').attr("disabled", true);
          $('#editEventModal').find('#editEndDate').val("");
          $(".allDayEdit").prop('checked', true);
        }else{
          $('#editEventModal').find('#editEndDate').attr("disabled", false);
          $('#editEventModal').find('#editEndDate').val(event.end.format('ddd DD MMM YYYY HH:mm'));
          $(".allDayEdit").prop('checked', false);
        }
      
        $('.allDayEdit').on('change',function () {
      
          if ($(this).is(':checked')) {
              $('#editEventModal').find('#editEndDate').attr("disabled", true);
              $('#editEventModal').find('#editEndDate').val("");
              $(".allDayEdit").prop('checked', true);
            } else {
              $('#editEventModal').find('#editEndDate').attr("disabled", false);
              $(".allDayEdit").prop('checked', false);
            }   
        });
        
        $('#editTitle').val(event.title);
        $('#editStartDate').val(event.start.format('ddd DD MMM YYYY HH:mm'));
        $('#edit-calendar-type').val(event.calendar);
        $('#edit-event-desc').val(event.description);
        $('.eventName').text(event.title);
        $('#editEventModal').modal('show');
        $('#updateEvent').unbind();
        $('#updateEvent').on('click', function() {
          var statusAllDay;
          if ($(".allDayEdit").is(':checked')) {
            statusAllDay = true;
          }else{
            statusAllDay = false;
          }
          var title = $('input#editTitle').val();
          var startDate = $('input#editStartDate').val();
          var endDate = $('input#editEndDate').val();
          var calendar = $('#edit-calendar-type').val();
          var description = $('#edit-event-desc').val();
          $('#editEventModal').modal('hide');
          var eventData;
          if (title) {
            event.title = title
            event.start = startDate
            event.end = endDate
            event.calendar = calendar
            event.description = description
            event.allDay = statusAllDay
            $("#calendar").fullCalendar('updateEvent', event);
          } else {
          alert("Title can't be blank. Please try again.")
          }
        });
      
        $('#deleteEvent').on('click', function() {
          $('#deleteEvent').unbind();
          if (event._id.includes("_fc")){
            $("#calendar").fullCalendar('removeEvents', [event._id]);
          } else {
            $("#calendar").fullCalendar('removeEvents', [event._id]);
          }
          $('#editEventModal').modal('hide');
        });
      }
    

  //SET DEFAULT VIEW CALENDAR
    
  var defaultCalendarView = $("#calendar_view").val();
  
  if(defaultCalendarView == 'month'){                             
      $('#calendar').fullCalendar( 'changeView', 'month');
  }else if(defaultCalendarView == 'agendaWeek'){
      $('#calendar').fullCalendar( 'changeView', 'agendaWeek');
  }else if(defaultCalendarView == 'agendaDay'){
      $('#calendar').fullCalendar( 'changeView', 'agendaDay');
  }else if(defaultCalendarView == 'listWeek'){
      $('#calendar').fullCalendar( 'changeView', 'listWeek');
  }
  
  $('#calendar_view').on('change',function () {
    
    var defaultCalendarView = $("#calendar_view").val();
    $('#calendar').fullCalendar('changeView', defaultCalendarView);
    
  });
  
  //SET MIN TIME AGENDA
    
  $('#calendar_start_time').on('change',function () {
    
    var minTimeAgendaView = $(this).val();
    $('#calendar').fullCalendar('option', {minTime: minTimeAgendaView});
    
  });
  
  //SET MAX TIME AGENDA
    
  $('#calendar_end_time').on('change',function () {
    
    var maxTimeAgendaView = $(this).val();
    $('#calendar').fullCalendar('option', {maxTime: maxTimeAgendaView});
    
  });
  
  //SHOW - HIDE WEEKENDS
  
  var activeInactiveWeekends = false;
  checkCalendarWeekends();

  $('.showHideWeekend').on('change',function () {
    checkCalendarWeekends();
  });
  
  function checkCalendarWeekends(){
    
    if ($('.showHideWeekend').is(':checked')) {
      activeInactiveWeekends = true;
      $('#calendar').fullCalendar('option', {
        weekends: activeInactiveWeekends
      });
    } else {
      activeInactiveWeekends = false;
      $('#calendar').fullCalendar('option', {
        weekends: activeInactiveWeekends
      });
    }   
    
  }
  
  //CREATE NEW CALENDAR AND APPEND
  
  $('#addCustomCalendar').on('click', function() {
    
    var newCalendarName = $("#inputCustomCalendar").val();
    $('#calendar_filter, #calendar-type, #edit-calendar-type').append($('<option>', {
        value: newCalendarName,
        text: newCalendarName
    }));
    $("#inputCustomCalendar").val("");
    
  });
  
  //WEATHER GRAMATICALLY
  
  function retira_acentos(str) {
    var com_acento = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝRÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿr";
    var sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr";
    var novastr="";
    for(i=0; i<str.length; i++) {
      troca=false;
      for (a=0; a<com_acento.length; a++) {
        if (str.substr(i,1)==com_acento.substr(a,1)) {
          novastr+=sem_acento.substr(a,1);
          troca=true;
          break;
        }
      }
      if (troca==false) {
        novastr+=str.substr(i,1);
      }
    }
    return novastr.toLowerCase().replace( /\s/g, '-' );
  }
  
  //WEATHER THEMES
  
  document.getElementById('switchWeatherTheme').addEventListener('change', function(){
    
    var valueTheme = $(this).val();
    var widget = document.querySelector('.weatherwidget-io');
    widget.setAttribute('data-theme', valueTheme);
    __weatherwidget_init();
    
  });
  
  //WEATHER LOCATION
  var input = document.getElementById('searchTextField');
  var autocomplete = new google.maps.places.Autocomplete(input);
  
  google.maps.event.addListener(autocomplete, 'place_changed', function () {
    var place = autocomplete.getPlace();
    var latitude = place.geometry.location.lat();
    var longitude = place.geometry.location.lng();
    var newPlace = retira_acentos(place.name);
    
    var urlDataWeather = 'https://forecast7.com/en/'+ latitude.toFixed(2).replace(/\./g,'d').replace(/\-/g,'n') + longitude.toFixed(2).replace(/\./g,'d').replace(/\-/g,'n') + '/'+ newPlace +'/';
    
    alert(urlDataWeather);
    
    var weatherWidget = document.querySelector('.weatherwidget-io');
    weatherWidget.href = urlDataWeather;
    weatherWidget.dataset.label_1 = place.name;
    __weatherwidget_init();
    
    //document.getElementById('city2').value = place.name;
    //document.getElementById('cityLat').value = place.geometry.location.lat();
    //document.getElementById('cityLng').value = place.geometry.location.lng();
    //alert("This function is working!");
    //alert(place.name);
    // alert(place.address_components[0].long_name);

  });
  
});
</script>
@endsection

