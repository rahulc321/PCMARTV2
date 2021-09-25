@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Select')
{{-- vendor scripts --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
@endsection

@section('content')
<!-- Bootstrap Select start -->
<section class="bootstrap-select">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Bootstrap Select</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h6>Basic Select</h6>
              <p>Use <code>.form-control</code> class for basic select control.</p>
              <fieldset class="form-group">
                <select class="form-control" id="basicSelect">
                  <option>IT</option>
                  <option>Blade Runner</option>
                  <option>Thor Ragnarok</option>
                </select>
              </fieldset>
            </div>
            <div class="col-md-6">
              <h6>Custom Select</h6>
              <p>Use <code>.custom-select</code> class for Custom Select control.</p>
              <fieldset class="form-group">
                <select class="custom-select" id="customSelect">
                  <option selected>Open this menu</option>
                  <option value="IT">IT</option>
                  <option value="Blade Runner">Blade Runner</option>
                  <option value="Thor Ragnarok">Thor Ragnarok</option>
                </select>
              </fieldset>
            </div>
            <div class="col-md-6">
              <h6>Multiple Select</h6>
              <p>Use <code>multiple</code> attribute for Multiple select control.</p>
              <fieldset class="form-group">
                <select class="form-control" id="countrySelect" multiple="multiple">
                  <option selected="selected">Square</option>
                  <option>Rectangle</option>
                  <option selected="selected">Rombo</option>
                  <option>Romboid</option>
                  <option>Trapeze</option>
                  <option>Triangle</option>
                  <option selected="selected">Polygon</option>
                  <option>Regular polygon</option>
                  <option>Circumference</option>
                  <option>Circle</option>
                </select>
              </fieldset>
            </div>
            <div class="col-md-6">
              <h6>Disabled Select</h6>
              <p>Use <code>disabled</code> attribute for disabled select control.</p>
              <fieldset class="form-group">
                <select class="form-control" disabled="disabled" id="disabledSelect">
                  <option>Green</option>
                  <option>Red</option>
                  <option>Blue</option>
                </select>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bootstrap Select end -->

<!-- Input Group Select start -->
<section class="input-group-select">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Input Group Select</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h6>Basic Select with Input Group</h6>
              <fieldset class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                  </div>
                  <select class="form-control" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </fieldset>
            </div>
            <div class="col-md-6">
              <h6>Custom Select with Input group</h6>
              <fieldset class="form-group">
                <div class="input-group">
                  <select class="custom-select" id="inputGroupSelect02">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Bootstrap Select end -->

<!-- Basic Select2 start -->
<section class="basic-select2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Select2</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 mb-2">
              <a href="https://select2.org/getting-started/installation" target="_blank">For more information </a>
            </div>
            <div class="col-md-6">
              <h6>Basic Select2</h6>
              <p>Use <code>.select2</code> class for basic select2 control.</p>
              <div class="form-group">
                <select class="select2 form-control">
                  <option value="square">Square</option>
                  <option value="rectangle">Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible">Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Single Select with Label</h6>
              <p>Use <code>optgroup</code> attribute for basic select2 with Label control.</p>
              <div class="form-group">
                <select class="select2 form-control">
                  <optgroup label="Figures">
                    <option value="romboid">Romboid</option>
                    <option value="trapeze">Trapeze</option>
                    <option value="triangle">Triangle</option>
                    <option value="polygon">Polygon</option>
                  </optgroup>
                  <optgroup label="Colors">
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Select With Icon</h6>
              <p>Use data attribute <code>data-icon</code> to add icon name for each options. And use class
                <code>.select2-icons</code> to set icon with option.</p>
              <div class="form-group">
                <select data-placeholder="Select a state..." class="select2-icons form-control" id="select2-icons">
                  <optgroup label="Services">
                    <option value="wordpress2" data-icon="bx bxl-wordpress" selected>WordPress</option>
                    <option value="codepen" data-icon="bx bxl-codepen">Codepen</option>
                    <option value="drupal" data-icon="bx bxl-drupal">Drupal</option>
                    <option value="pinterest2" data-icon="bx bxl-css3">CSS3</option>
                    <option value="html5" data-icon="bx bxl-html5">HTML5</option>
                  </optgroup>
                  <optgroup label="Browsers">
                    <option value="chrome" data-icon="bx bxl-chrome">Chrome</option>
                    <option value="firefox" data-icon="bx bxl-firefox">Firefox</option>
                    <option value="opera" data-icon="bx bxl-opera">Opera</option>
                    <option value="IE" data-icon="bx bxl-internet-explorer">IE</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Template support</h6>
              <p>Select2 supports custom themes using the theme option so you can style Select2 to match the rest of
                your application. These are using the <code>classic</code> theme, which matches the old look of
                Select2.</p>
              <div class="form-group">
                <select class="select2-theme form-control" id="select2-theme">
                  <optgroup label="Figures">
                    <option value="romboid">Romboid</option>
                    <option value="trapeze">Trapeze</option>
                    <option value="triangle">Triangle</option>
                    <option value="polygon">Polygon</option>
                  </optgroup>
                  <optgroup label="Colors">
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                  </optgroup>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Select2 end -->

<!-- Multiple Select2 start -->
<section class="multiple-select2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Multiple Select2</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h6>Basic Multiple Select2</h6>
              <p>Use <code>.select2</code> class for basic select2 control. Use <code>multiple="multiple"</code>
                attribute for multiple select box.</p>
              <div class="form-group">
                <select class="select2 form-control" multiple="multiple">
                  <option value="square">Square</option>
                  <option value="rectangle" selected>Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible" selected>Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Multiple Select with Label</h6>
              <p>Use <code>optgroup</code> attribute for multiple select box with Label control.</p>
              <div class="form-group">
                <select class="select2 form-control" multiple="multiple">
                  <optgroup label="Figures">
                    <option value="romboid">Romboid</option>
                    <option value="trapeze" selected>Trapeze</option>
                    <option value="triangle">Triangle</option>
                    <option value="polygon">Polygon</option>
                  </optgroup>
                  <optgroup label="Colors">
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue" selected>Blue</option>
                    <option value="purple">Purple</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Select With Icon</h6>
              <p>Use data attribute <code>data-icon</code> to add icon name for each options. And use class
                <code>.select2-icons</code> to set icon with option.</p>
              <div class="form-group">
                <select data-placeholder="Select a state..." class="select2-icons form-control"
                  id="multiple-select2-icons" multiple="multiple">
                  <optgroup label="Services">
                    <option value="wordpress2" data-icon="bx bxl-wordpress" selected>WordPress</option>
                    <option value="codepen" data-icon="bx bxl-codepen">Codepen</option>
                    <option value="drupal" data-icon="bx bxl-drupal">Drupal</option>
                    <option value="pinterest2" data-icon="bx bxl-css3">CSS3</option>
                    <option value="html5" data-icon="bx bxl-html5">HTML5</option>
                  </optgroup>
                  <optgroup label="File types">
                    <option value="pdf" data-icon="bx bxs-file-pdf">PDF</option>
                    <option value="word" data-icon="bx bxs-file-doc">Word</option>
                    <option value="excel" data-icon="bx bxs-file-json">JSON</option>
                    <option value="facebook" data-icon="bx bxl-facebook-square">Facebook</option>
                  </optgroup>
                  <optgroup label="Browsers">
                    <option value="chrome" data-icon="bx bxl-chrome">Chrome</option>
                    <option value="firefox" data-icon="bx bxl-firefox">Firefox</option>
                    <option value="safari" data-icon="bx bxl-apple">Safari</option>
                    <option value="opera" data-icon="bx bxl-opera">Opera</option>
                    <option value="IE" data-icon="bx bxl-internet-explorer">IE</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Maximum Select with Label</h6>
              <p>Select2 multi-value select boxes can set restrictions regarding the maximum number of options
                selected. The select below is declared with the <code>multiple</code> attribute with
                <code>maximumSelectionLength</code> in the select2 options.</p>
              <div class="form-group">
                <select class="max-length form-control" multiple="multiple" id="max_length">
                  <optgroup label="Figures">
                    <option value="romboid">Romboid</option>
                    <option value="trapeze" selected>Trapeze</option>
                    <option value="triangle">Triangle</option>
                    <option value="polygon">Polygon</option>
                  </optgroup>
                  <optgroup label="Colors">
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Select2 with Light Background Options</h6>
              <p>Use <code>.select-light-{colorName}</code> class for light background to selected Options.</p>
              <div class="form-group">
                <select class="select2 form-control select-light-danger" multiple="multiple">
                  <option value="square">Square</option>
                  <option value="rectangle" selected>Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible" selected>Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Multiple Select2 end -->

<!-- Select2 Advance Options start -->
<section class="select2-advance">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Advance Options</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h6>Loading Array Data</h6>
              <p>Select2 provides a way to load the data from a local array. You can provide initial selections with
                array data by providing the option tag for the selected values, similar to how it would be done for a
                standard select.</p>
              <div class="form-group">
                <select class="select2-data-array form-control" id="select2-array"></select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Loading Remote Data</h6>
              <p>Select2 comes with AJAX support built in, using jQuery's AJAX methods. In this example, we can search
                for repositories using GitHub's API.</p>
              <div class="form-group">
                <select class="select2-data-ajax form-control" id="select2-ajax"></select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Customizing How Results Are Matched</h6>
              <p>Unlike other dropdowns on this page, this one matches options only if the term appears in the
                beginning of the string as opposed to anywhere: This custom matcher uses a compatibility module that
                is only bundled in the full version of Select2. You also have the option of using a more complex
                matcher.</p>
              <div class="form-group">
                <select class="select2-customize-result form-control" multiple="multiple"
                  id="select2-customize-result">
                  <optgroup label="Figures">
                    <option value="romboid">Romboid</option>
                    <option value="trapeze">Trapeze</option>
                    <option value="triangle">Triangle</option>
                    <option value="polygon">Polygon</option>
                  </optgroup>
                  <optgroup label="Colors">
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <h6>Programmatic access</h6>
              <p>Select2 supports methods that allow programmatic control of the component.</p>
              <div class="form-group">
                <select class="select2 js-example-programmatic form-control" id="programmatic-single">
                  <optgroup label="Alaskan/Hawaiian Time Zone">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                  </optgroup>
                  <optgroup label="Pacific Time Zone">
                    <option value="CA">California</option>
                    <option value="NV">Nevada</option>
                    <option value="OR">Oregon</option>
                    <option value="WA">Washington</option>
                  </optgroup>
                  <optgroup label="Mountain Time Zone">
                    <option value="AZ">Arizona</option>
                    <option value="CO">Colorado</option>
                    <option value="ID">Idaho</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NM">New Mexico</option>
                    <option value="ND">North Dakota</option>
                    <option value="UT">Utah</option>
                    <option value="WY">Wyoming</option>
                  </optgroup>
                  <optgroup label="Central Time Zone">
                    <option value="AL">Alabama</option>
                    <option value="AR">Arkansas</option>
                    <option value="IL">Illinois</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="OK">Oklahoma</option>
                    <option value="SD">South Dakota</option>
                    <option value="TX">Texas</option>
                    <option value="TN">Tennessee</option>
                    <option value="WI">Wisconsin</option>
                  </optgroup>
                  <optgroup label="Eastern Time Zone">
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="IN">Indiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="OH">Ohio</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WV">West Virginia</option>
                  </optgroup>
                </select>
              </div>
              <div class="btn-toolbar" role="toolbar" aria-label="Programmatic control">
                <button class="js-programmatic-set-val btn btn-outline-primary btn-sm mr-1 mb-1">Set
                  "California"</button>
                <button class="js-programmatic-open btn btn-outline-primary btn-sm mr-1 mb-1">Open</button>
                <button class="js-programmatic-close btn btn-outline-primary btn-sm mr-1 mb-1">Close</button>
                <button class="js-programmatic-init btn btn-outline-primary btn-sm mr-1 mb-1">Init</button>
                <button class="js-programmatic-destroy btn btn-outline-primary btn-sm mr-1 mb-1">Destroy</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Select2 Advance Options end -->

<!-- Select2 Sizing start -->
<section class="select2-sizing">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Size</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>For different sizes of select2, Use classes like <code>.select2-size-sm</code> &amp;
                <code>.select2-size-lg</code> for Large, small &amp; Extra Small Select respectively.</p>
            </div>
            <div class="col-12">
              <h6>Large</h6>
              <div class="form-group">
                <select class="select2-size-lg form-control" id="large-select">
                  <option value="square">Square</option>
                  <option value="rectangle">Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible">Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <h6>Default</h6>
              <div class="form-group">
                <select class="select2 form-control" id="default-select">
                  <option value="square">Square</option>
                  <option value="rectangle">Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible">Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <h6>Small</h6>
              <div class="form-group">
                <select class="select2-size-sm form-control" id="small-select">
                  <option value="square">Square</option>
                  <option value="rectangle">Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible">Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Multi Select Size</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>For different sizes of select2, Use classes like <code>.select2-size-sm</code> &amp;
                <code>.select2-size-lg</code> for Large, small &amp; Extra Small Select respectively.</p>
            </div>
            <div class="col-12">
              <h6>Large</h6>
              <div class="form-group">
                <select class="select2-size-lg form-control" multiple="multiple" id="large-select-multi">
                  <option value="square" selected>Square</option>
                  <option value="rectangle">Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible">Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <h6>Default</h6>
              <div class="form-group">
                <select class="select2 form-control" multiple="multiple" id="default-select-multi">
                  <option value="square">Square</option>
                  <option value="rectangle">Rectangle</option>
                  <option value="rombo">Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible">Triangle</option>
                  <option value="polygon" selected>Polygon</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <h6>Small</h6>
              <div class="form-group">
                <select class="select2-size-sm form-control" multiple="multiple" id="small-select-multi">
                  <option value="square">Square</option>
                  <option value="rectangle">Rectangle</option>
                  <option value="rombo" selected>Rombo</option>
                  <option value="romboid">Romboid</option>
                  <option value="trapeze">Trapeze</option>
                  <option value="traible">Triangle</option>
                  <option value="polygon">Polygon</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Select2 Sizing end -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
@endsection
{{-- page scrips --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/select/form-select2.js')}}"></script>
@endsection
