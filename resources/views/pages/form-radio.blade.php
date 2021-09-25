@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Radio Buttons')

@section('content')
<!-- Basic Radio start -->
<section class="basic-radio">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Radio Buttons</h4>
        </div>
        <div class="card-body">
          <p>Add <code>.radio</code> as a single wrapper & add <code>&lt;label&gt;</code> with <code>for</code> attribute to get better output.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio">
                  <input type="radio" name="bsradio" id="radio1" checked>
                  <label for="radio1">Active</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio">
                  <input type="radio" name="bsradio" id="radio2">
                  <label for="radio2">Inactive</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio">
                  <input type="radio" name="bsradio1" id="radio3" disabled checked>
                  <label for="radio3">Active - Disabled</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
                <fieldset>
                  <div class="radio">
                    <input type="radio" name="bsradio1" id="radio4" disabled>
                    <label for="radio3">Inactive - Disabled</label>
                  </div>
                </fieldset>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Checkbox end -->

<!-- Custom Radio Buttons start -->
<section class="custom-buttons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom Radio Buttons</h4>
        </div>
        <div class="card-body">
          <p>Add <code>.custom-control.custom-radio</code> as a single wrapper & add <code>.custom-control-label</code> for better output.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" name="customRadio" id="customRadio1" checked>
                  <label class="custom-control-label" for="customRadio1">Active</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" name="customRadio" id="customRadio2">
                  <label class="custom-control-label" for="customRadio2">Inactive</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" checked id="customRadio3"
                    disabled>
                  <label class="custom-control-label" for="customRadio3">Active - disabled</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="customRadio4" disabled>
                  <label class="custom-control-label" for="customRadio4">Inactive - disabled</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Custom Radio Buttons end -->

<!-- Custom Radio Colored start -->
<section class="custom-radio-colored">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom Colored Radio Buttons</h4>
        </div>
        <div class="card-body">
            <p>To change the color of the Custom Radios, use the <code>.bg-{colorName}</code> with <code>.custom-control-input</code> class.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input bg-primary" name="customRadioColored" id="customColorRadio1" checked>
                  <label class="custom-control-label" for="customColorRadio1">Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input bg-secondary" name="customRadioColored" id="customColorRadio2">
                  <label class="custom-control-label" for="customColorRadio2">Secondary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input bg-success" name="customRadioColored" id="customColorRadio3">
                  <label class="custom-control-label" for="customColorRadio3">Success</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input bg-danger" name="customRadioColored" id="customColorRadio4">
                  <label class="custom-control-label" for="customColorRadio4">Danger</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input bg-info" name="customRadioColored" id="customColorRadio5">
                  <label class="custom-control-label" for="customColorRadio5">Info</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input bg-warning" name="customRadioColored" id="customColorRadio6">
                  <label class="custom-control-label" for="customColorRadio6">Warning</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Custom Radio Colored end -->

<!-- Colored Radio start -->
<section class="radio-colored">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Colored Radio Buttons</h4>
        </div>
        <div class="card-body">
          <p>To change the color of the Radio Buttons, use the <code>radio-{colorName}</code> for primary, secondary, success, danger, info, warning.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-primary">
                    <input type="radio" name="coloredRadio" id="colorRadio1" checked>
                    <label for="colorRadio1">Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-secondary">
                    <input type="radio" name="coloredRadio" id="colorRadio2">
                    <label for="colorRadio2">Secondary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                  <div class="radio radio-success">
                      <input type="radio" name="coloredRadio" id="colorRadio3">
                      <label for="colorRadio3">Success</label>
                  </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-danger">
                    <input type="radio" name="coloredRadio" id="colorRadio4">
                    <label for="colorRadio4">Danger</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-info">
                    <input type="radio" name="coloredRadio" id="colorRadio5">
                    <label for="colorRadio5">Info</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="radio radio-warning">
                    <input type="radio" name="coloredRadio" id="colorRadio6">
                    <label for="colorRadio6">Warning</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Colored Checkbox end -->

<!-- Radio Buttons Glow start -->
<section class="radio-glow">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Radio Buttons Glow</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.radio-glow</code> class with <code>.radio.radio-{colorName}</code> for glow effect to Radio Buttons. Glow shadow color will be changed according to Colored Checkboxes.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-primary radio-glow">
                    <input type="radio" id="radioGlow1" name="radioGlow" checked>
                    <label for="radioGlow1">Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-secondary radio-glow">
                    <input type="radio" id="radioGlow2" name="radioGlow">
                    <label for="radioGlow2">Secondary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                  <div class="radio radio-success radio-glow">
                      <input type="radio" id="radioGlow3" name="radioGlow">
                      <label for="radioGlow3">Success</label>
                  </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-danger radio-glow">
                    <input type="radio" id="radioGlow4" name="radioGlow">
                    <label for="radioGlow4">Danger</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-info radio-glow">
                    <input type="radio" id="radioGlow5" name="radioGlow">
                    <label for="radioGlow5">Info</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-warning radio-glow">
                    <input type="radio" id="radioGlow6" name="radioGlow">
                    <label for="radioGlow6">Warning</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Radio Glow end -->

<!-- Radio Buttons Shadow start -->
<section class="radio-shadow">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Radio Buttons Shadow</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.radio-shadow</code> class with <code>.radio</code> for shadow effect to Radio Buttons.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-shadow">
                    <input type="radio" id="radioshadow1" name="radiodShadow" checked>
                    <label for="radioshadow1">Radio1</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-shadow">
                    <input type="radio" id="radioshadow2" name="radiodShadow">
                    <label for="radioshadow2">Radio2</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Radio Buttons Glow end -->

<!-- Radio Buttons Sizes start -->
<section class="radio-sizes">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Radio Buttons Sizes</h4>
        </div>
        <div class="card-body">
            <p>To add a Radio Buttons with different sizes, we have the <code>.radio-sm</code> class for small Radio Buttons. Add it along with <code>.radio</code> class.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="radio radio-sm">
                    <input type="radio" id="radiosmall" name="radioSize" checked>
                    <label for="radiosmall">Small Radio Button</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="radio">
                    <input type="radio" id="radiodefault" name="radioSize">
                    <label for="radiodefault">Default Radio Button</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Radio Buttons Sizes end -->
@endsection
