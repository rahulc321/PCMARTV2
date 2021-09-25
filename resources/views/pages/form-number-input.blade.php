@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Number Input')
{{-- vendor scripts --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
@endsection

@section('content')
<!-- Bootstrap TouchSpin Spinners start -->
<section id="basic-touchspin">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Touchspin</h4>
        </div>
        <div class="card-body">
          <p>Add <code>.touchspin</code> class with input tag to add touchspin input group. Add <code>.disabled-touchspin</code> class and add attribute <code>disabled</code> with <code>input</code> tag to add disabled touchspin input group.</p>
          <div class="d-inline-block mb-1 mr-1">
              <input type="number" class="touchspin" value="50">
          </div>
          <div class="d-inline-block mb-1 mr-1">
              <div class="input-group disabled-touchspin">
                  <input type="number" class="touchspin" value="50" disabled>
              </div>
          </div>
          <div class="d-inline-block mb-1">
            <input type="number" class="touchspin-icon" value="50">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bootstrap TouchSpin Spinners end -->

<!-- Bootstrap TouchSpin Spinners Size start -->
<section id="touchspin-size">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Size</h4>
        </div>
        <div class="card-body">
          <p>Add <code>.input-group-lg</code> and <code>.input-group-sm</code> class for touchspin large and small respectively.</p>
          <div class="d-inline-flex align-items-center mb-1 mr-1">
              <div class="input-group input-group-lg">
                  <input type="number" class="touchspin" value="50">
              </div>
          </div>
          <div class="d-inline-flex align-items-center mb-1 mr-1">
              <div class="input-group">
                  <input type="number" class="touchspin" value="50">
              </div>
          </div>
          <div class="d-inline-flex align-items-center mb-1">
              <div class="input-group input-group-sm">
                  <input type="number" class="touchspin" value="50">
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bootstrap TouchSpin Spinners end -->

<!-- Bootstrap TouchSpin Spinners Decimal start -->
<section id="touchspin-decimal">
  <div class="row">
    <div class="col-md-4 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Decimal</h4>
        </div>
        <div class="card-body">
          <p>Set <code>data-bts-step</code> and <code>data-bts-decimals</code> attributes.</p>
          <input type="text" class="touchspin" value="50" data-bts-step="0.5" data-bts-decimals="2">
        </div>
      </div>
    </div>
    <div class="col-md-4 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Min - Max</h4>
        </div>
        <div class="card-body">
          <p>Set <code>min</code> and <code>max</code> attributes values for minimum and maximum.</p>
          <input type="number" class="touchspin-min-max" value="19">
        </div>
      </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Step</h4>
          </div>
          <div class="card-body">
            <p>Set <code>step</code> attribute value in page js file.</p>
            <input type="number" class="touchspin-step" value="45">
          </div>
        </div>
      </div>
  </div>
</section>
<!-- Bootstrap TouchSpin Spinners Decimal end -->

<!-- Bootstrap TouchSpin Spinners Colors start -->
<section id="touchspin-colors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Colors Variation</h4>
        </div>
        <div class="card-body">
          <p>set <code>data-bts-button-down-class</code> &amp; <code>data-bts-button-up-class</code> attribute and add value as <code>btn btn-{color}</code> for different colors spinner.</p>
          <div class="d-inline-block mb-1 mr-1">
            <input type="text" class="touchspin-color" value="60" data-bts-button-down-class="btn btn-primary"
                  data-bts-button-up-class="btn btn-primary" />
          </div>
          <div class="d-inline-block mb-1 mr-1">
            <input type="text" class="touchspin-color" value="60" data-bts-button-down-class="btn btn-success"
                  data-bts-button-up-class="btn btn-success" />
          </div>
          <div class="d-inline-block mb-1 mr-1">
            <input type="text" class="touchspin-color" value="60" data-bts-button-down-class="btn btn-warning"
                  data-bts-button-up-class="btn btn-warning" />
          </div>
          <div class="d-inline-block mb-1 mr-1">
            <input type="text" class="touchspin-color" value="60" data-bts-button-down-class="btn btn-info"
                  data-bts-button-up-class="btn btn-info" />
          </div>
          <div class="d-inline-block mb-1">
            <input type="text" class="touchspin-color" value="60" data-bts-button-down-class="btn btn-danger"
                  data-bts-button-up-class="btn btn-danger" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bootstrap TouchSpin Spinners Colors end -->

<!-- Bootstrap TouchSpin Spinners Variation start -->
<section id="touchspin-fixer">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Touchspin Variation</h4>
        </div>
        <div class="card-body">
          <p>Add <code>data-bts-postfix="POSTFIX_VALUE"</code> attribute to input to add postfix to touchspin input group and add <code>data-bts-prefix="PREFIX_VALUE"</code> attribute to input to add prefix to touchspin input group.
          Add <code>.touchspin-vertical</code> class with <code>&lt;input&gt;</code> for Vertical Touchspin Effect. Add <code>.touchspin-glow</code> along with <code>.input-group</code> for adding glow effect to touchspin.</p>
          <div class="d-inline-block mb-1 mr-1">
              <input type="text" class="touchspin" value="50" data-bts-prefix="$">
          </div>
          <div class="d-inline-block mb-1 mr-1">
              <input type="text" class="touchspin" value="20" data-bts-postfix="%">
          </div>
          <div class="d-inline-block mb-1 mr-1">
              <input type="text" class="touchspin" value="50" data-bts-postfix="Post" data-bts-prefix="Pre">
          </div>
          <div class="d-inline-block mb-1 mr-1">
            <input type="text" class="touchspin-vertical" value="55" />
          </div>
          <div class="d-inline-block mb-1">
            <div class="input-group touchspin-glow">
              <input type="text" class="touchspin" value="55" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bootstrap TouchSpin Spinners Variation end -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/number-input.js')}}"></script>
@endsection
