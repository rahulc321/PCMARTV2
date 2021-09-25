@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Buttons')

@section('content')
<!-- Default Buttons start -->
<section id="basic-buttons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Buttons</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h6>Default</h6>
              <p>Bootstrap includes six predefined button styles, each serving its own semantic purpose.</p>
              <!-- basic buttons -->
              <button type="button" class="btn btn-primary mr-1 mb-1">Primary</button>
              <button type="button" class="btn btn-secondary mr-1 mb-1">Secondary</button>
              <button type="button" class="btn btn-success mr-1 mb-1">Success</button>
              <button type="button" class="btn btn-info mr-1 mb-1">Info</button>
              <button type="button" class="btn btn-warning mr-1 mb-1">Warning</button>
              <button type="button" class="btn btn-danger mr-1 mb-1">Danger</button>
              <button type="button" class="btn btn-light mr-1 mb-1">Light</button>
              <button type="button" class="btn btn-dark mr-1 mb-1">Dark</button>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12">
              <h6>Rounded</h6>
              <p>Use a class <code>.round</code> with <code>.btn</code> class to create round button.</p>
              <!-- basic buttons -->
              <button type="button" class="btn btn-primary round mr-1 mb-1">Primary</button>
              <button type="button" class="btn btn-secondary round mr-1 mb-1">Secondary</button>
              <button type="button" class="btn btn-success round mr-1 mb-1">Success</button>
              <button type="button" class="btn btn-info round mr-1 mb-1">Info</button>
              <button type="button" class="btn btn-warning round mr-1 mb-1">Warning</button>
              <button type="button" class="btn btn-danger round mr-1 mb-1">Danger</button>
              <button type="button" class="btn btn-light round mr-1 mb-1">Light</button>
              <button type="button" class="btn btn-dark round mr-1 mb-1">Dark</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default Buttons end -->

<!-- Outline Buttons start -->
<section id="outline-button">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Outline Buttons</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h6>Default</h6>
              <p>Use a class <code>.btn-outline-{color}</code> to quickly create a outline button.</p>
              <!-- Outline buttons -->
              <button type="button" class="btn btn-outline-primary mr-1 mb-1">Primary</button>
              <button type="button" class="btn btn-outline-secondary mr-1 mb-1">Secondary</button>
              <button type="button" class="btn btn-outline-success mr-1 mb-1">Success</button>
              <button type="button" class="btn btn-outline-info mr-1 mb-1">Info</button>
              <button type="button" class="btn btn-outline-warning mr-1 mb-1">Warning</button>
              <button type="button" class="btn btn-outline-danger mr-1 mb-1">Danger</button>
              <button type="button" class="btn btn-outline-light mr-1 mb-1">Light</button>
              <button type="button" class="btn btn-outline-dark mr-1 mb-1">Dark</button>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12">
              <h6>Rounded</h6>
              <p>Use a class <code>.round</code> with outline button class to create round outline button.</p>
              <!-- Round buttons -->
              <button type="button" class="btn btn-outline-primary round mr-1 mb-1">Primary</button>
              <button type="button" class="btn btn-outline-secondary round mr-1 mb-1">Secondary</button>
              <button type="button" class="btn btn-outline-success round mr-1 mb-1">Success</button>
              <button type="button" class="btn btn-outline-info round mr-1 mb-1">Info</button>
              <button type="button" class="btn btn-outline-warning round mr-1 mb-1">Warning</button>
              <button type="button" class="btn btn-outline-danger round mr-1 mb-1">Danger</button>
              <button type="button" class="btn btn-outline-light round mr-1 mb-1">Light</button>
              <button type="button" class="btn btn-outline-dark round mr-1 mb-1">Dark</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Outline Buttons end -->

<!-- Shadow Buttons start -->
<section id="shadow-button">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Shadow buttons</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Use a class <code>.shadow</code> with button classes to create shadow button.</p>
              <button type="button" class="btn btn-primary shadow mr-1 mb-1">Primary</button>
              <button type="button" class="btn btn-success shadow mr-1 mb-1">Success</button>
              <button type="button" class="btn btn-info shadow mr-1 mb-1">Info</button>
              <button type="button" class="btn btn-warning shadow mr-1 mb-1">Warning</button>
              <button type="button" class="btn btn-danger shadow mr-1 mb-1">Danger</button>
              <button type="button" class="btn btn-light shadow mr-1 mb-1">Light</button>
              <button type="button" class="btn btn-dark shadow mr-1 mb-1">Dark</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shadow Buttons end -->

<!-- Glow Buttons start -->
<section id="glow-button">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Glow buttons</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Use a class <code>.glow</code> with button classes to create glow button.</p>
              <button type="button" class="btn btn-primary glow mr-1 mb-1">Primary</button>
              <button type="button" class="btn btn-success glow mr-1 mb-1">Success</button>
              <button type="button" class="btn btn-info glow mr-1 mb-1">Info</button>
              <button type="button" class="btn btn-warning glow mr-1 mb-1">Warning</button>
              <button type="button" class="btn btn-danger glow mr-1 mb-1">Danger</button>
              <button type="button" class="btn btn-light glow mr-1 mb-1">Light</button>
              <button type="button" class="btn btn-dark glow mr-1 mb-1">Dark</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Glow Buttons end -->

<!-- Light Buttons start -->
<section id="light-buttons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Light Style</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Bootstrap includes six predefined button styles, each serving its own semantic purpose.</p>
              <!-- basic buttons -->
              <button type="button" class="btn btn-light-primary mr-1 mb-1">Primary</button>
              <button type="button" class="btn btn-light-secondary mr-1 mb-1">Secondary</button>
              <button type="button" class="btn btn-light-success mr-1 mb-1">Success</button>
              <button type="button" class="btn btn-light-info mr-1 mb-1">Info</button>
              <button type="button" class="btn btn-light-warning mr-1 mb-1">Warning</button>
              <button type="button" class="btn btn-light-danger mr-1 mb-1">Danger</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Light Buttons end -->


<!-- Basic Button Icon start -->
<section id="basic-button-icons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Buttons with Icon</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <!-- Buttons with Icon -->
              <button type="button" class="btn btn-outline-primary mr-1 mb-1"><i class="bx bx-home"></i><span
                  class="align-middle ml-25">Home</span></button>
              <button type="button" class="btn btn-warning mr-1 mb-1"><i class="bx bx-star"></i><span
                  class="align-middle ml-25">Star</span></button>
              <button type="button" class="btn btn-success glow mr-1 mb-1"><i class="bx bx-check"></i>
                <span class="align-middle ml-25">Done</span></button>
              <button type="button" class="btn btn-light-danger mr-1 mb-1"><i class="bx bx-heart"></i>
                <span class="ml-25">Favorite</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Button Icon end -->

<!-- Icon Buttons start -->
<section id="icon-only-buttons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Icon Only</h4>
        </div>
        <div class="card-body">
          <p>You can only use <code>.btn-icon</code> when you only want icon in your button</p>
          <button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1"><i class="bx bx-search"></i></button>
          <button type="button" class="btn btn-icon btn-warning mr-1 mb-1"><i class="bx bx-archive"></i></button>
          <button type="button" class="btn btn-icon btn-success glow mr-1 mb-1"><i class="bx bx-camera"></i></button>
          <button type="button" class="btn btn-icon btn-light-danger mr-1 mb-1">
            <i class="bx bx-like"></i></button>
          <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i
              class="bx bx-search"></i></button>
          <button type="button" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1"><i
              class="bx bx-archive"></i></button>
          <button type="button" class="btn btn-icon rounded-circle btn-success glow mr-1 mb-1"><i
              class="bx bx-camera"></i></button>
          <button type="button" class="btn btn-icon rounded-circle btn-light-danger mr-1 mb-1">
            <i class="bx bx-like"></i></button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Icon Buttons end -->

<!-- Basic Button group start -->
<section id="basic-button-group">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Button group</h4>
        </div>
        <div class="card-body">
          <p>Group a series of buttons together on a single line with the button group. Wrap a series of buttons
            with <code>.btn</code> in <code>.btn-group</code>.</p>
          <!-- button group -->
          <div class="row">
            <div class="col-lg-6 mb-1">
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-outline-primary">Middle</button>
                <button type="button" class="btn btn-outline-primary">Right</button>
              </div>
            </div>
            <div class="col-lg-6 mb-1">
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary"><i class="bx bxl-facebook"></i></button>
                <button type="button" class="btn btn-primary"><i class="bx bxl-twitter"></i></button>
                <button type="button" class="btn btn-outline-primary"><i class="bx bxl-instagram"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Button group end -->

<!-- Sizes start -->
<section id="sizes-2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Sizes</h4>
        </div>
        <div class="card-body">
          <h6>Buttons</h6>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <p>Add <code>.btn-lg</code> or <code>.btn-sm</code> for Fancy larger or smaller buttons size.</p>
              <!-- simple sizes -->
              <button type="button" class="btn mr-1 mb-1 btn-primary btn-lg">Large</button>
              <button type="button" class="btn mr-1 mb-1 btn-primary">Default</button>
              <button type="button" class="btn mr-1 mb-1 btn-primary btn-sm">Small</button>
            </div>
            <div class="col-md-6 col-sm-12">
              <p>Add <code>.btn-lg</code> or <code>.btn-sm</code> with <code>.btn-outline-*</code> for outline btn in
                diffrent sizes</p>
              <button type="button" class="btn mr-1 mb-1 btn-outline-primary btn-lg">Large</button>
              <button type="button" class="btn mr-1 mb-1 btn-outline-primary">Default</button>
              <button type="button" class="btn mr-1 mb-1 btn-outline-primary btn-sm">Small</button>
            </div>
          </div>
          <hr>
          <h6>Button Groups</h6>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <p>Add <code>.btn-group-lg</code> for larger button group size.</p>
              <!-- simple sizes -->
              <div class="btn-group btn-group-lg mb-1" role="group" aria-label="Size Large">
                <button type="button" class="btn btn-primary">Schedule</button>
                <button type="button" class="btn btn-outline-primary">Publish</button>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <p>Add <code>.btn-group-sm</code> for smaller button group size.</p>
              <div class="btn-group btn-group-sm" role="group" aria-label="Size Small">
                <button type="button" class="btn btn-outline-primary">Male</button>
                <button type="button" class="btn btn-primary">Female</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Sizes end -->

<!-- Block level buttons start -->
<section id="block-level-buttons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Block level buttons</h4>
        </div>
        <div class="card-body">
          <!-- Block level buttons -->
          <p>Create block level buttons—those that span the full width of a parent—by adding <code>.btn-block</code>.
          </p>
          <div class="row">
            <div class="col-lg-6 mb-1 mb-lg-0">
              <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
            </div>
            <div class="col-lg-6">
              <!-- Block level buttons with icon -->
              <button type="button" class="btn btn-outline-primary btn-lg btn-block">Block level button</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Block level buttons end -->

<!-- Toggle Buttons start -->
<section id="toggle-buttons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Toggle</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <h6>Single Toggle</h6>
              <p>Bootstrap includes six predefined button styles, each serving its own semantic purpose.</p>
              <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary">
                  <input type="checkbox" checked> Toggle
                </label>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12 col-lg-6">
              <h6>Radio</h6>
              <div class="btn-group btn-group-toggle mb-1" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input type="radio" name="options" id="radio1" checked> Radio 1(Active)
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="radio2"> Radio 2
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="radio3"> Radio 3
                </label>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <h6>Checkbox</h6>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input type="checkbox" name="checkboxOpt1" id="checkbox1" checked> Check 1
                </label>
                <label class="btn btn-primary">
                  <input type="checkbox" name="checkboxOpt2" id="checkbox2"> Check 2
                </label>
                <label class="btn btn-primary">
                  <input type="checkbox" name="checkboxOpt3" id="checkbox3"> Check 3
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Toggle Buttons end -->

<!-- Vertical variation start -->
<section id="vertical-variation">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Vertical variation</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <p>Make a set of buttons appear vertically.</p>
              <!-- Vertical variation -->
              <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <button type="button" class="btn btn-primary">Button</button>
                <button type="button" class="btn btn-primary">Button</button>
                <button type="button" class="btn btn-primary">Button</button>
                <button type="button" class="btn btn-primary">Button</button>
                <button type="button" class="btn btn-primary">Button</button>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <p>Vertical variation with different colors</p>
              <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <button type="button" class="btn btn-primary">Primary</button>
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-danger">Danger</button>
                <button type="button" class="btn btn-info">Info</button>
                <button type="button" class="btn btn-warning">Warning</button>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <p>Vertical variation with Outlines</p>
              <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <button type="button" class="btn btn-outline-primary">Button</button>
                <button type="button" class="btn btn-outline-secondary">Button</button>
                <button type="button" class="btn btn-outline-warning">Button</button>
                <button type="button" class="btn btn-outline-success">Button</button>
                <button type="button" class="btn btn-outline-danger">Button</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Vertical variation end -->
@endsection
