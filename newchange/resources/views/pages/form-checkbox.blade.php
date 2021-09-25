@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Checkbox')

@section('content')
<!-- Basic Checkbox start -->
<section id="basic-checkbox">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Checkboxes</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox1" checked>
                  <label for="checkbox1">Touch me!</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox2">
                  <label for="checkbox2">Touch me!</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox">
                    <input type="checkbox" id="checkbox3" disabled checked>
                    <label for="checkbox3">Disabled Checkbox</label>
                </div>
              </fieldset>
            </li>
           <li class="d-inline-block mb-1">
              <fieldset>
                <div class="checkbox">
                    <input type="checkbox" id="checkbox4" disabled>
                    <label for="checkbox4">Disabled Unchecked Checkbox</label>
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

<!-- Custom Checkbox start -->
<section id="custom-checkbox">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom Checkboxes</h4>
        </div>
        <div class="card-body">
           <p>Add <code>.custom-control .custom-checkbox</code> as a single wrapper and add
            <code>.custom-control-label</code> for better output.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" checked name="customCheck" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Active</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="customCheck" id="customCheck2">
                  <label class="custom-control-label" for="customCheck2">Inactive</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" checked name="customCheck" id="customCheck3"
                    disabled>
                  <label class="custom-control-label" for="customCheck3">Active - disabled</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="customCheck" disabled id="customCheck4">
                  <label class="custom-control-label" for="customCheck4">Inactive - disabled</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Custom Checkbox end -->

<!-- Custom Checkbox Colored start -->
<section id="custom-checkbox-colored">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom Colored Checkboxes</h4>
        </div>
        <div class="card-body">
          <p>To change the color of the Custom CheckBoxes, use the <code>.bg-{colorName}</code> with <code>.custom-control-input</code> class.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input bg-primary" checked name="customCheck" id="customColorCheck1">
                  <label class="custom-control-label" for="customColorCheck1">Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input bg-secondary" checked name="customCheck" id="customColorCheck2">
                  <label class="custom-control-label" for="customColorCheck2">Secondary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input bg-success" checked name="customCheck" id="customColorCheck3">
                  <label class="custom-control-label" for="customColorCheck3">Success</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input bg-danger" checked name="customCheck" id="customColorCheck4">
                  <label class="custom-control-label" for="customColorCheck4">Danger</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input bg-info" checked name="customCheck" id="customColorCheck5">
                  <label class="custom-control-label" for="customColorCheck5">Info</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input bg-warning" checked name="customCheck" id="customColorCheck6">
                  <label class="custom-control-label" for="customColorCheck6">Warning</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Custom Checkbox end -->

<!-- Colored Checkbox start -->
<section id="checkbox-color">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Colored Checkboxes</h4>
        </div>
        <div class="card-body">
          <p>To change the color of the checkBox, use the <code>checkbox-{colorName}</code> for primary, secondary, success, danger, info, warning.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-primary">
                    <input type="checkbox" id="colorCheckbox1" checked>
                    <label for="colorCheckbox1">Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-secondary">
                    <input type="checkbox" id="colorCheckbox2" checked>
                    <label for="colorCheckbox2">Secondary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                  <div class="checkbox checkbox-success">
                      <input type="checkbox" id="colorCheckbox3" checked>
                      <label for="colorCheckbox3">Success</label>
                  </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-danger">
                    <input type="checkbox" id="colorCheckbox4" checked>
                    <label for="colorCheckbox4">Danger</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-info">
                    <input type="checkbox" id="colorCheckbox5" checked>
                    <label for="colorCheckbox5">Info</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="checkbox checkbox-warning">
                    <input type="checkbox" id="colorCheckbox6" checked>
                    <label for="colorCheckbox6">Warning</label>
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

<!-- Checkbox Glow start -->
<section id="checkbox-glow">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Checkboxes Glow</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.checkbox-glow</code> class with <code>.checkbox.checkbox-{colorName}</code> for glow effect to Checkboxes. Glow shadow color will be changed according to Colored Checkboxes.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-primary checkbox-glow">
                    <input type="checkbox" id="checkboxGlow1" checked>
                    <label for="checkboxGlow1">Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-secondary checkbox-glow">
                    <input type="checkbox" id="checkboxGlow2" checked>
                    <label for="checkboxGlow2">Secondary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                  <div class="checkbox checkbox-success checkbox-glow">
                      <input type="checkbox" id="checkboxGlow3" checked>
                      <label for="checkboxGlow3">Success</label>
                  </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-danger checkbox-glow">
                    <input type="checkbox" id="checkboxGlow4" checked>
                    <label for="checkboxGlow4">Danger</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-info checkbox-glow">
                    <input type="checkbox" id="checkboxGlow5" checked>
                    <label for="checkboxGlow5">Info</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-warning checkbox-glow">
                    <input type="checkbox" id="checkboxGlow6" checked>
                    <label for="checkboxGlow6">Warning</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Checkbox Glow end -->

<!-- Checkbox Shadow start -->
<section id="checkbox-shadow">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Checkboxes Shadow</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.checkbox-shadow</code> class with <code>.checkbox</code> for shadow effect to Checkboxes.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-shadow">
                    <input type="checkbox" id="checkboxshadow1" checked>
                    <label for="checkboxshadow1">Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-shadow">
                    <input type="checkbox" id="checkboxshadow2" disabled checked>
                    <label for="checkboxshadow2">Disabled</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Checkbox Glow end -->

<!-- Checkbox with Icon start -->
<section id="checkbox-icon">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Checkboxes with Icons</h4>
        </div>
        <div class="card-body">
          <p>Use <code>.checkbox-icon</code> with <code>.checkbox</code> class to change the internal icon inside the checkbox.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-primary checkbox-icon">
                    <input type="checkbox" id="checkboxIcon1" checked>
                    <label for="checkboxIcon1"><i class="bx bx-music"></i>Primary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-secondary checkbox-icon">
                    <input type="checkbox" id="checkboxIcon2" checked>
                    <label for="checkboxIcon2"><i class="bx bx-message"></i>Secondary</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                  <div class="checkbox checkbox-success checkbox-icon">
                      <input type="checkbox" id="checkboxIcon3">
                      <label for="checkboxIcon3"><i class="bx bx-x"></i>Success</label>
                  </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-danger checkbox-icon">
                    <input type="checkbox" id="checkboxIcon4">
                    <label for="checkboxIcon4"><i class="bx bx-paperclip"></i>Danger</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-info checkbox-icon">
                    <input type="checkbox" id="checkboxIcon5">
                    <label for="checkboxIcon5"><i class="bx bx-bold"></i>Info</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="checkbox checkbox-warning checkbox-icon">
                    <input type="checkbox" id="checkboxIcon6">
                    <label for="checkboxIcon6"><i class="bx bx-bell"></i>Warning</label>
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

<!-- Checkbox Sizes start -->
<section id="checkbox-sizes">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Checkboxes Sizes</h4>
        </div>
        <div class="card-body">
           <p>To add a checkBox with different sizes, we have the <code>.checkbox-sm</code> class for small Checkboxes. Add it along with <code>.checkbox</code> class.</p>
          <ul class="list-unstyled mb-0">
            <li class="d-inline-block mr-2 mb-1">
              <fieldset>
                <div class="checkbox checkbox-sm">
                    <input type="checkbox" id="checkboxsmall" checked>
                    <label for="checkboxsmall">Small Checkbox</label>
                </div>
              </fieldset>
            </li>
            <li class="d-inline-block mb-1">
              <fieldset>
                <div class="checkbox">
                    <input type="checkbox" id="checkboxdefault" checked>
                    <label for="checkboxdefault">Default Checkbox</label>
                </div>
              </fieldset>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Checkbox Sizes end -->
@endsection
