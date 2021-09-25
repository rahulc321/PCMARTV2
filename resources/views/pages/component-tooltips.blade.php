@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Tooltip')

@section('content')
<!--Tooltip Positions Starts-->
<section id="tooltip-positions">
  <div class="row ">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tooltip Positions</h4>
        </div>
        <div class="card-body">
          <p>Four options are available: top, right, bottom, and left aligned.</p>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Top Tooltip</h6>
              <p class="my-1">Add <code>data-placement="top"</code> to add top tooltip.</p>
              <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top"
                title="Tooltip on top">
                Tooltip on top
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Right Tooltip</h6>
              <p class="my-1">Add <code>data-placement="right"</code> to add right tooltip.</p>
              <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="right"
                title="Tooltip on right">
                Tooltip on right
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Bottom Tooltip</h6>
              <p class="my-1">Add <code>data-placement="bottom"</code> to add bottom tooltip.</p>
              <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom"
                title="Tooltip on bottom">
                Tooltip on bottom
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Left Tooltip</h6>
              <p class="my-1">Add <code>data-placement="left"</code> to add left tooltip.</p>
              <button type="button" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="left"
                title="Tooltip on left">
                Tooltip on left
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Tooltip Positions Ends -->

<!--Tooltip Light Starts-->
<section id="tooltip-light">
  <div class="row ">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tooltip Light</h4>
        </div>
        <div class="card-body">
          <p>Tooltip with light colored background, add <code>.tooltip-light</code> class.</p>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Top Tooltip</h6>
              <p class="my-1">Add <code>data-placement="top"</code> to add top tooltip.</p>
              <button type="button" class="btn btn-outline-primary tooltip-light" data-toggle="tooltip"
                data-placement="top" title="Tooltip on top">
                Tooltip on top
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Right Tooltip</h6>
              <p class="my-1">Add <code>data-placement="right"</code> to add right tooltip.</p>
              <button type="button" class="btn btn-outline-primary tooltip-light" data-toggle="tooltip"
                data-placement="right" title="Tooltip on right">
                Tooltip on right
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Bottom Tooltip</h6>
              <p class="my-1">Add <code>data-placement="bottom"</code> to add bottom tooltip.</p>
              <button type="button" class="btn btn-outline-primary tooltip-light" data-toggle="tooltip"
                data-placement="bottom" title="Tooltip on bottom">
                Tooltip on bottom
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Basic Left Tooltip</h6>
              <p class="my-1">Add <code>data-placement="left"</code> to add left tooltip.</p>
              <button type="button" class="btn btn-outline-primary tooltip-light" data-toggle="tooltip"
                data-placement="left" title="Tooltip on left">
                Tooltip on left
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Tooltip Light Ends -->

<!-- Tooltip Triggers Starts-->
<section id="tooltip-triggers">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tooltip Triggers</h4>
        </div>
        <div class="card-body">
          <p>Tooltip is triggered using - click | hover | focus | manual options. You may pass multiple triggers;
            separate them with a space. "manual" cannot be combined with any other trigger.</p>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Click</h6>
              <p class="my-1">Use <code>data-trigger="click"</code> for click trigger.</p>
              <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Click Triggered"
                data-trigger="click">
                On Click Trigger
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Focus</h6>
              <p class="my-1">Use <code>data-trigger="focus"</code> for focus trigger.</p>
              <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Focus Triggered"
                data-trigger="focus">
                On Focus Trigger
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Hover</h6>
              <p class="my-1">Use <code>data-trigger="hover"</code> for hover trigger. This is a default
                trigger.</p>
              <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Hover Triggered">
                On Hover Trigger
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Manual</h6>
              <p class="my-1">Use <code>data-trigger="manual"</code> for manual trigger. You
                show/hide using js</p>
              <button type="button" class="btn btn-primary manual" data-toggle="tooltip" title="Manual Triggered"
                data-trigger="manual">
                On Manual Trigger
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Tooltip Triggers Ends -->

<!-- Tooltip Options -->
<section id="tooltip-options">
  <div class="row ">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tooltip Options</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-1">
              <h6>Disabled Animaition</h6>
              <p class="my-1">Use <code>data-animation="false"</code> to remove fade animation. Default is
                true.</p>
              <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Without Fade Animation"
                data-animation="false">
                No animation
              </button>
            </div>
            <div class="col-md-6 mb-1">
              <h6>Delay Show/Hide</h6>
              <p class="my-1">Delay showing and hiding the tooltip (<code>ms</code>) - does not apply to
                manual trigger type.</p>
              <button type="button" class="btn btn-primary delay" data-toggle="tooltip" title="Click Triggered"
                data-delay="500">
                Delay Tooltip
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Tooltip Options Ends -->

<!-- Tooltip Methods Starts-->
<section id="tooltip-methods">
  <div class="row ">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tooltip Methods</h4>
        </div>
        <div class="card-body">
          <p>This is considered a “manual” triggering of the tooltip. Tooltips with zero-length titles are never
            displayed.</p>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Show</h6>
              <p class="my-1">Reveals an element’s tooltip. Returns to the caller before the tooltip has
                actually been shown.(i.e. before the <code>shown.bs.tooltip</code> event occurs)</p>
              <button type="button" class="btn btn-primary" id="show-method" data-popup="tooltip"
                title="Show Method Tooltip" data-trigger="manual">
                Show Method <i class="bx bx-play-circle ml-1"></i>
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Hide</h6>
              <p class="my-1">Hides an element’s tooltip. Returns to the caller before the tooltip has
                actually been hidden (i.e. before the <code>hidden.bs.tooltip</code> event occurs).</p>
              <button type="button" class="btn btn-primary" id="hide-method" data-popup="tooltip"
                title="Hide Method Tooltip" data-trigger="manual">
                Hide Method <i class="bx bx-play-circle ml-1"></i>
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Toggle</h6>
              <p class="my-1">Toggles an element’s tooltip. Returns to the caller before the tooltip has
                actually been shown or hidden (i.e. before the <code>shown.bs.tooltip</code> or
                <code>hidden.bs.tooltip</code> event occurs).</p>
              <button type="button" class="btn btn-primary" id="toggle-method" data-popup="tooltip"
                title="Toggle Method Tooltip" data-trigger="manual">
                Toggle Method <i class="bx bx-play-circle ml-1"></i>
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Dispose</h6>
              <p class="my-1">Hides and destroys an element’s tooltip. Tooltips that use delegation cannot
                be individually destroyed on descendant trigger elements.</p>
              <div class="btn-group">
                <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Dispose Method Tooltip"
                  data-trigger="click" id="dispose-method">
                  Dispose
                </button>
                <button type="button" class="btn btn-primary" id="dispose">
                  <i class="bx bx-play-circle"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Tooltip Methods Ends -->

<!-- Tooltip Events -->
<section id="tooltip-events">
  <div class="row ">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tooltip Events</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Show Event</h6>
              <p class="my-1">This event fires immediately when the <code>show</code> instance method is
                called.</p>
              <button type="button" class="btn btn-primary" id="show-tooltip">
                Show Event Tooltip
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Shown Event</h6>
              <p class="my-1">This event is fired when the tooltip has been made visible to the user (will
                wait for CSS transitions to complete).</p>
              <button type="button" class="btn btn-primary" id="shown-tooltip">
                Shown Event Tooltip
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Hide Event</h6>
              <p class="my-1">This event is fired immediately when the <code>hide</code> instance method
                has been called.</p>
              <button type="button" class="btn btn-primary" id="hide-tooltip">
                Hide Event Tooltip
              </button>
            </div>
            <div class="col-xl-3 col-md-6 mb-1">
              <h6>Hidden Event</h6>
              <p class="my-1">This event is fired when the tooltip has finished being hidden from the user
                (will wait for CSS transitions to complete).</p>
              <button type="button" class="btn btn-primary" id="hidden-tooltip">
                Hidden Event Tooltip
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section Ends -->
@endsection

{{-- page scripts  --}}
@section('page-scripts')
<script src="{{asset('js/scripts/tooltip/tooltip.js')}}"></script>
@endsection
