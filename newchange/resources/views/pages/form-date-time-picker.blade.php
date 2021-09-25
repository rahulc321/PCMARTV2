@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Date & Time Picker')
{{-- vendor style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
@endsection

@section('content')
<!-- Pick-A-Date Picker start -->
<section id="pick-a-date">
  <div class="card">
 		<div class="card-body">
	  		<div class="row">
	  			<div class="col-12">
	  				<h4 class="card-title">Pick-a-Date : Date Picker</h4>
	  				<p class="mb-2">The basic setup requires targetting an <code>input</code> element and invoking the picker.</p>
          </div>
	  		</div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-1">
              <h6>Default</h6>
              <p>Use <code>.pickadate</code> class for basic Pick-A-Date Picker.</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
            <div class="mb-1">
              <h6>Format Date Picker</h6>
              <p>Set<code>format</code> attribute for basic change format of date.</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control format-picker" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
            <div class="mb-1">
              <h6>Min-Max Date Range</h6>
              <p>Use <code>.pickadate-limits</code> class for min. and max. date range.</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate-limits" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
            <div class="mb-1">
              <h6>Translation</h6>
              <p>Use <code>.pickadate-translations</code> class for language translation.</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate-translations" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
            <div class="mb-1">
              <h6>Pick-a-date with short string</h6>
              <p>Use <code>.pickadate-short-string</code> class for short Month & Week String.</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate-short-string" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
            <div class="mb-1">
              <h6>Change First Weekday</h6>
              <p>Use <code>.pickadate-firstday</code> class to change first weekday to Monday.</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate-firstday" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-1">
              <h6>Select Month & Year</h6>
              <p>Use <code>.pickadate-months-year</code> class for display select menus to pick the month & year.</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate-months-year" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
            <div class="mb-1">
              <h6>Disabled Dates & Weeks</h6>
              <p>Use <code>.pickadate-disable</code> class for disabled dates or weeks. (such as all Sun.1th day of week and 1st and 3rd Sat.).</p>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate-disable" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
            </div>
            <div class="mb-1">
              <h6>Inline Date Picker</h6>
              <p id="inlineDatePicker-container"></p>
              <input class="inlineDatePicker" type="hidden">
            </div>
          </div>
			</div>
		</div>
	</div>
</section>
<!-- Pick-A-Date Picker end -->

<!-- Pick-A-Time Picker start -->
<section id="pick-a-time">
 	<div class="card">
 		<div class="card-body">
	  		<div class="row match-height">
	  			<div class="col-12">
	  				<h4 class="card-title">Pick-a-Date : Time Picker</h4>
	  			</div>
		    	<div class="col-md-6 mb-1">
			     	<h6>Default</h6>
            <p>Use <code>.pickatime</code> class for basic Pick-a-Time Picker.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
			    </div>
			    <div class="col-md-6 mb-1">
            <h6>Change Formats</h6>
            <p>Use <code>.pickatime-format</code> class to change time display formats.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime-format" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
			    </div>
			    <div class="col-md-6 mb-1">
            <h6>Format with Label</h6>
            <p>Use <code>.pickatime-formatlabel</code> class to display time label format.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime-formatlabel" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
			    </div>
			    <div class="col-md-6 mb-1">
            <h6>Intervals</h6>
            <p>Use <code>.pickatime-intervals</code> class to display time in Intervals.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime-intervals" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
			    </div>
			    <div class="col-md-6 mb-1">
            <h6>Disable set of Time</h6>
            <p>Use <code>.pickatime-disable</code> class to disable time hours.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime-disable" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
			    </div>
			    <div class="col-md-6 mb-1">
            <h6>Minimum and maximum time range</h6>
            <p>Use <code>.pickatime-min-max</code> class for Start Time & End Time.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime-min-max" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
			    </div>
			</div>
	  	</div>
  	</div>
</section>
<!-- Pick-A-Time Picker end -->

<!-- Bootstrap DateRange Picker start -->
<section id="daterange">
	<div class="card">
		<div class="card-header">
      <h4 class="card-title">Bootstrap DateRange Picker</h4>
      <p class="mt-1">The Date Range Picker can be attached to any webpage element to pop up two calendars for selecting dates, times, or predefined ranges like "Last 30 Days".</p>
		</div>
    <div class="card-body">
      <div class="form">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <h6>Default</h6>
              <p>The Date Range Picker is attached to a text input. It will use the current value of the input to initialize, and update the input if new dates are chosen.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control daterange" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Date and Time</h6>
              <p>The Date Range Picker can also be used to select times. Hour, minute and (optional) second dropdowns are added in the calendars.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control datetime" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Single Date Picker</h6>
              <p>The Date Range Picker can be turned into a single date picker widget with only one calendar.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control single-daterange" value="10/24/1984">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>24 hour Time Picker with Seconds</h6>
              <p>Use 24-hour instead of 12-hour times, removing the AM/PM selection. Show seconds in the timePicker.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control timeseconds" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Input Initially Empty</h6>
              <p>To set datepicker input default empty.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control initial-empty" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Predefined Ranges</h6>
              <p>Set predefined date ranges the user can select from.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control dateranges" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Auto Apply Date Range</h6>
              <p>Hide the apply and cancel buttons, and automatically apply a new date range.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control autoapply" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Date Limit</h6>
              <p>The maximum span between the selected start and end dates.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control dateLimit" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Show Dropdowns</h6>
              <p>Show year and month select boxes above calendars to jump to a specific month and year.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control showdropdowns" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <h6>Show Week Numbers</h6>
              <p>Show localized week numbers at the start of each week on the calendars.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control showweeknumbers" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Always Show Calendar</h6>
              <p>Normally, if you use the ranges option to specify pre-defined date ranges, calendars for choosing a custom date range are not shown until the user clicks "Custom Range". When this option is set to true, the calendars for choosing a custom date range are always shown instead.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control showCalRanges" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Localization</h6>
              <p>Allows you to provide localized strings for buttons and labels, customize the date display format, and change the first day of week for the calendars.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control localeRange" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Picker Alignment</h6>
              <p>Whether the picker appears aligned to the left, to the right, or centered under the HTML element it's attached to.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control openRight" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Open Picker on top</h6>
              <p>Whether the picker appears below (default) or above the HTML element it's attached to.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control drops" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Button Class Options</h6>
              <p>CSS class names that will be added to all buttons in the picker.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control buttonClass" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

            <div class="mb-3">
              <h6>Inline Date Range Picker</h6>
              <input class="inlineDateRangePicker" type="hidden">
              <div id="daterangepicker-container" class="daterangepicker-container"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</section>
<!-- Bootstrap DateRange Picker end -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>
@endsection
