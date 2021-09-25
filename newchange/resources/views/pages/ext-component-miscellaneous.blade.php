@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Miscellaneous')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/jquery.contextMenu.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/toastr.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/context-menu.css')}}">
@endsection

@section('content')
<!-- Copy to clipboard Starts -->
<Section id="copy-to-clipboard">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Clipboard</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2 col-sm-12 pr-0">
              <div class="form-group">
                <input type="text" class="form-control copy-to-clipboard" id="copy-to-clipboard-input"
                  value="Copy Me!">
              </div>
            </div>
            <div class="col-md-2 col-sm-12">
              <button class="btn btn-primary copy-btn">Copy!</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</Section>
<!-- Copy to clipboard Starts -->

<!-- context-menu Starts -->
<section id="context-menu">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Context Menu</h4>
      <p class="card-text pt-2">
        To create a basic context menu use <code>$.contextMenu()</code> and the add your target with
        <code>selector: "#myId"</code> and then create your items for menu with
        <code>items:{ name : "item 1"}</code>
      </p>
    </div>
    <div class="card-body">
      <!-- Basic context menu starts -->
      <button class="btn btn-primary mr-1 mb-1 basic-context-menu" type="button">
        Right Click On Me
      </button>
      <!-- /Basic context menu starts -->

      <!-- left click context menu starts -->
      <button class="btn btn-primary mr-1 mb-1 left-click-context-menu" type="button">
        Left Click On Me
      </button>
      <!-- /left click context menu starts -->

      <!-- submenu context menu starts -->
      <button class="btn btn-primary mr-1 mb-1 submenu-context-menu" type="button">
        Right Click With Submenu
      </button>
      <!-- /submenu context menu starts -->

      <!-- hover context menu starts -->
      <button class="btn btn-primary mr-1 mb-1 hover-context-menu" type="button">
        Hover Over Me
      </button>
      <!-- /hover context menu starts -->
    </div>
  </div>
</section>
<!-- context-menu Starts end -->

<!-- Idle Timer -->
<section id="idleTimer">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">
        Idle Timer
      </h4>
    </div>
    <div class="card-body">
      <p class="card-text">
        The idle timer is built on jQuery and provides two events: <code> idle.idleTimer</code> and
        <code>active.idleTimer</code>, which fire when the user's idle state has changed.
        When you move your mouse over the page or start typing, you're considered "active".
      </p>
      <div class="row">
        <div class="col-lg-6 col-12">
          <h5 class="text-muted">
            Document
            <small>
              <span class="docTimeout"></span>
              second timeout
            </small>
          </h5>
          <div class="btn-group">
            <a href="javascript:void(0);" class="btPause btn btn-primary btn-sm">Pause</a>
            <a href="javascript:void(0);" class="btResume btn btn-primary btn-sm">Resume</a>
            <a href="javascript:void(0);" class="btElapsed btn btn-primary btn-sm">Elapsed</a>
            <a href="javascript:void(0);" class="btInit btn btn-primary btn-sm">Init</a>
            <a href="javascript:void(0);" class="btDestroy btn btn-primary btn-sm">Destroy</a>
          </div>
          <textarea rows="10" cols="30" class="docStatus form-control my-1"></textarea>
        </div>
        <!-- Element timer start -->
        <div class="col-lg-6 col-12">
          <h5 class="text-muted">
            Element
            <small>
              <span class="elTimeout"></span>
              second timeout
            </small>
          </h5>
          <div class="btn-group">
            <a href="javascript:void(0);" class="btReset btn btn-primary btn-sm">Reset</a>
            <a href="javascript:void(0);" class="btLastActive btn btn-primary btn-sm">Last Active</a>
            <a href="javascript:void(0);" class="btRemaining btn btn-primary btn-sm">Remaining</a>
            <a href="javascript:void(0);" class="btState btn btn-primary btn-sm">State</a>
          </div>
          <textarea rows="10" cols="30" class="elStatus form-control my-1"></textarea>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Idle Timer End -->

<!-- Numeral.js start here -->
<section id="numeral-js-wrapper">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Numeral.js</h4>
    </div>
    <div class="card-body">
      <p class="card-text">
        Numbers can be formatted to look like currency, percentages, times, or even plain old
        numbers with decimal places, thousands, and abbreviations. for information click
        <a href="http://numeraljs.com/" target="_blank"> here.</a>
      </p>
      <div class="table-responsive">
        <table class="table ">
          <thead>
            <tr>
              <th>Input</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>numeral(974)</td>
              <td class="dNum"></td>
            </tr>
            <tr>
              <td>numeral(1230974).format('0.0a')</td>
              <td class="fnum"></td>
            </tr>
            <tr>
              <td>numeral(1000.234).format('$0,0.00')</td>
              <td class="fcurrecy"></td>
            </tr>
            <tr>
              <td>numeral(3467479682787).format('0.000 ib')</td>
              <td class="fbytes"></td>
            </tr>
            <tr>
              <td>numeral(0.974878234).format('0.000%')</td>
              <td class="fpercent"></td>
            </tr>
            <tr>
              <td>numeral(63846).format('00:00:00')</td>
              <td class="ftime"></td>
            </tr>
            <tr>
              <td>numeral(1123456789).format('0,0e+0')</td>
              <td class="fexponential"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- Numeral.js end here -->

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/jquery.contextMenu.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/idle-timer.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/numeral/numeral.js')}}"></script>
<script src="{{asset('vendors/js/extensions/numeral/locales.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/extensions/ext-component-miscellaneous.js')}}"></script>
@endsection
