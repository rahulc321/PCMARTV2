{{-- mainLayouts extends --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title', 'Calendar')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/calendars/tui-time-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/calendars/tui-date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/calendars/tui-calendar.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/calendars/app-calendar.css')}}">
@endsection
{{-- main page content --}}
@section('content')
<!-- calendar Wrapper  -->
<div class="calendar-wrapper position-relative">
  <!-- calendar app overlay -->
  <div class="app-content-overlay"></div>
  <!-- calendar sidebar start -->
  <div id="sidebar" class="sidebar">
    <div class="sidebar-new-schedule">
      <!-- create new schedule button -->
      <button id="btn-new-schedule" type="button" class="btn btn-primary btn-block sidebar-new-schedule-btn">
        New schedule
      </button>
    </div>
    <!-- sidebar calendar labels -->
    <div id="sidebar-calendars" class="sidebar-calendars">
      <div>
        <div class="sidebar-calendars-item">
          <!-- view All checkbox -->
          <div class="checkbox">
            <input type="checkbox" class="checkbox-input tui-full-calendar-checkbox-square" id="checkbox1" value="all"
              checked>
            <label for="checkbox1">View all</label>
          </div>
        </div>
      </div>
      <div id="calendarList" class="sidebar-calendars-d1"></div>
    </div>
    <!-- / sidebar calendar labels -->
  </div>
  <!-- calendar sidebar end -->
  <!-- calendar view start  -->
  <div class="calendar-view">
    <div class="calendar-action d-flex align-items-center flex-wrap">
      <!-- sidebar toggle button for small sceen -->
      <button class="btn btn-icon sidebar-toggle-btn">
        <i class="bx bx-menu font-large-1"></i>
      </button>
      <!-- dropdown button to change calendar-view -->
      <div class="dropdown d-inline mr-75">
        <button id="dropdownMenu-calendarType" class="btn btn-action dropdown-toggle" type="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i id="calendarTypeIcon" class="bx bx-calendar-alt"></i>
          <span id="calendarTypeName">Dropdown</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu-calendarType">
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-daily">
              <i class="bx bx-calendar-alt mr-50"></i>
              <span>Daily</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-weekly">
              <i class='bx bx-calendar-event mr-50'></i>
              <span>Weekly</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-monthly">
              <i class="bx bx-calendar mr-50"></i>
              <span>Month</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-weeks2">
              <i class='bx bx-calendar-check mr-50'></i>
              <span>2 weeks</span>
            </a>
          </li>
          <li role="presentation">
            <a class="dropdown-menu-title dropdown-item" role="menuitem" data-action="toggle-weeks3">
              <i class='bx bx-calendar-check mr-50'></i>
              <span>3 weeks</span>
            </a>
          </li>
          <li role="presentation" class="dropdown-divider"></li>
          <li role="presentation">
            <div role="menuitem" data-action="toggle-workweek" class="dropdown-item">
              <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-workweek" checked>
              <span class="checkbox-title bg-primary"></span>
              <span>Show weekends</span>
            </div>
          </li>
          <li role="presentation">
            <div role="menuitem" data-action="toggle-start-day-1" class="dropdown-item">
              <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-start-day-1">
              <span class="checkbox-title"></span>
              <span>Start Week on Monday</span>
            </div>
          </li>
          <li role="presentation">
            <div role="menuitem" data-action="toggle-narrow-weekend" class="dropdown-item">
              <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-narrow-weekend">
              <span class="checkbox-title"></span>
              <span>Narrower than weekdays</span>
            </div>
          </li>
        </ul>
      </div>
      <!-- calenadar next and previous navigate button -->
      <span id="menu-navi" class="menu-navigation">
        <button type="button" class="btn btn-action move-today mr-50 px-75" data-action="move-today">Today</button>
        <button type="button" class="btn btn-icon btn-action  move-day mr-50 px-50" data-action="move-prev">
          <i class="bx bx-chevron-left" data-action="move-prev"></i>
        </button>
        <button type="button" class="btn btn-icon btn-action move-day mr-50 px-50" data-action="move-next">
          <i class="bx bx-chevron-right" data-action="move-next"></i>
        </button>
      </span>
      <span id="renderRange" class="render-range"></span>
    </div>
    <!-- calendar view  -->
    <div id="calendar" class="calendar-content"></div>
  </div>
  <!-- calendar view end  -->
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/calendar/tui-code-snippet.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-dom.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-time-picker.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-date-picker.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/chance.min.js')}}"></script>
<script src="{{asset('vendors/js/calendar/tui-calendar.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/extensions/calendar/calendars-data.js')}}"></script>
<script src="{{asset('js/scripts/extensions/calendar/schedules.js')}}"></script>
<script src="{{asset('js/scripts/extensions/calendar/app-calendar.js')}}"></script>
@endsection
