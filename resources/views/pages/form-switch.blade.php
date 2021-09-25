
@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Switch')

@section('content')
<!-- Basic Switches Starts -->
<section id="basic-switches">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Switch</h4>
        </div>
        <div class="card-body">
          <div class="custom-control custom-switch custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" checked id="customSwitch1">
            <label class="custom-control-label mr-1" for="customSwitch1">
            </label>
            <span>Active Switch</span>
          </div>
          <div class="custom-control custom-switch custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" id="customSwitch2">
            <label class="custom-control-label mr-1" for="customSwitch2">
            </label>
            <span>Inactive Switch</span>
          </div>
          <div class="custom-control custom-switch custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" checked disabled id="customSwitch3">
            <label class="custom-control-label mr-1" for="customSwitch3">
            </label>
            <span>Disabled Active Switch</span>
          </div>
          <div class="custom-control custom-switch custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" disabled id="customSwitch4">
            <label class="custom-control-label mr-1" for="customSwitch4">
            </label>
            <span>Disabled Inactive Switch</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Switches Ends -->

<!-- Switches Glow Starts -->
<section id="switches-glow">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Switch with Glow</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.custom-switch-glow</code> class with <code>.custom-switch</code> for glow effect to switch. Glow shadow color will be changed according to switch color.</p>
          <div class="custom-control custom-switch custom-switch-glow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" checked id="customSwitchGlow1">
            <label class="custom-control-label" for="customSwitchGlow1">
            </label>
          </div>
          <div class="custom-control custom-switch custom-switch-success custom-switch-glow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" id="customSwitchGlow2">
            <label class="custom-control-label" for="customSwitchGlow2">
            </label>
          </div>
          <div class="custom-control custom-switch custom-switch-danger custom-switch-glow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" id="customSwitchGlow3">
            <label class="custom-control-label" for="customSwitchGlow3">
            </label>
          </div>
          <div class="custom-control custom-switch custom-switch-info custom-switch-glow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" id="customSwitchGlow4">
            <label class="custom-control-label" for="customSwitchGlow4">
            </label>
          </div>
          <div class="custom-control custom-switch custom-switch-warning cess custom-switch-glow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" id="customSwitchGlow5">
            <label class="custom-control-label" for="customSwitchGlow5">
            </label>
          </div>
          <div class="custom-control custom-switch custom-switch-secondary custom-switch-glow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" id="customSwitchGlow6">
            <label class="custom-control-label" for="customSwitchGlow6">
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Switches Glow Ends -->

<!-- Switches Shadow Starts -->
<section id="switches-shadow">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Switch with Shadow</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.custom-switch-shadow</code> class with <code>.custom-switch</code> for shadow effect to switch.</p>
          <div class="custom-control custom-switch custom-switch-shadow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" checked id="customSwitchShadow1">
            <label class="custom-control-label" for="customSwitchShadow1">
            </label>
          </div>
          <div class="custom-control custom-switch custom-switch-shadow custom-control-inline mb-1">
            <input type="checkbox" class="custom-control-input" checked disabled id="customSwitchShadow2">
            <label class="custom-control-label" for="customSwitchShadow2">
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Switches Shadow Ends -->

<!-- Switch Colors Starts -->
<section id="switch-colors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Colors</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.custom-switch-#{$color-name}</code> with <code>.custom-switch</code> to change switch's
            color</p>
          <div class="d-flex justify-content-start flex-wrap">
            <div class="custom-control custom-switch mr-2 mb-1">
              <p class="mb-0">Primary</p>
              <input type="checkbox" class="custom-control-input" checked id="customSwitchcolor1">
              <label class="custom-control-label" for="customSwitchcolor1"></label>
            </div>
            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
              <p class="mb-0">Success</p>
              <input type="checkbox" class="custom-control-input" id="customSwitchcolor2">
              <label class="custom-control-label" for="customSwitchcolor2"></label>
            </div>
            <div class="custom-control custom-switch custom-switch-danger mr-2 mb-1">
              <p class="mb-0">Danger</p>
              <input type="checkbox" class="custom-control-input" id="customSwitchcolor3">
              <label class="custom-control-label" for="customSwitchcolor3"></label>
            </div>
            <div class="custom-control custom-switch custom-switch-info mr-2 mb-1">
              <p class="mb-0">Info</p>
              <input type="checkbox" class="custom-control-input" id="customSwitchcolor4">
              <label class="custom-control-label" for="customSwitchcolor4"></label>
            </div>
            <div class="custom-control custom-switch custom-switch-warning mr-2 mb-1">
              <p class="mb-0">Warning</p>
              <input type="checkbox" class="custom-control-input" id="customSwitchcolor5">
              <label class="custom-control-label" for="customSwitchcolor5"></label>
            </div>
            <div class="custom-control custom-switch custom-switch-dark mb-1">
              <p class="mb-0">Dark</p>
              <input type="checkbox" class="custom-control-input" id="customSwitchcolor6">
              <label class="custom-control-label" for="customSwitchcolor6"></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Switch Colors Ends -->

<!-- Switch Icons Starts -->
<section id="switch-icons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Icons</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.switch-icon-left & .switch-icon-right</code> inside of
            <code>.custom-control-label</code> to create a switch with icon.
          </p>
          <div class="d-flex justify-content-start flex-wrap">
            <div class="custom-control custom-switch mr-2 mb-1">
              <p class="mb-0">Primary</p>
              <input type="checkbox" class="custom-control-input" checked id="customSwitch10">
              <label class="custom-control-label" for="customSwitch10">
                <span class="switch-icon-left"><i class="bx bx-check"></i></span>
                <span class="switch-icon-right"><i class="bx bx-bell"></i></span>
              </label>
            </div>
            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
              <p class="mb-0">Success</p>
              <input type="checkbox" class="custom-control-input" id="customSwitch11">
              <label class="custom-control-label" for="customSwitch11">
                <span class="switch-icon-left"><i class="bx bx-check"></i></span>
                <span class="switch-icon-right"><i class="bx bx-check"></i></span>
              </label>
            </div>
            <div class="custom-control custom-switch custom-switch-danger mr-2 mb-1">
              <p class="mb-0">Danger</p>
              <input type="checkbox" class="custom-control-input" id="customSwitch12">
              <label class="custom-control-label" for="customSwitch12">
                <span class="switch-icon-left"><i class="bx bx-x"></i></span>
                <span class="switch-icon-right"><i class="bx bx-x"></i></span>
              </label>
            </div>
            <div class="custom-control custom-switch custom-switch-info mr-2 mb-1">
              <p class="mb-0">Info</p>
              <input type="checkbox" class="custom-control-input" id="customSwitch13">
              <label class="custom-control-label" for="customSwitch13">
                <span class="switch-icon-left"><i class="bx bx-error-circle"></i></span>
                <span class="switch-icon-right"><i class="bx bx-error-circle"></i></span>
              </label>
            </div>
            <div class="custom-control custom-switch custom-switch-warning mr-2 mb-1">
              <p class="mb-0">Warning</p>
              <input type="checkbox" class="custom-control-input" id="customSwitch14">
              <label class="custom-control-label" for="customSwitch14">
                <span class="switch-icon-left"><i class="bx bx-error"></i></span>
                <span class="switch-icon-right"><i class="bx bx-error"></i></span>
              </label>
            </div>
            <div class="custom-control custom-switch custom-switch-secondary mr-2 mb-1">
              <p class="mb-0">Secondary</p>
              <input type="checkbox" class="custom-control-input" id="customSwitch15">
              <label class="custom-control-label" for="customSwitch15">
                <span class="switch-icon-left"><i class="bx bx-volume-mute"></i></span>
                <span class="switch-icon-right"><i class="bx bx-volume-mute"></i></span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Switch Icons Ends -->
@endsection
