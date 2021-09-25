@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Chips')

@section('content')
<!-- Default chips starts -->
<section id="default-chips">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            Default Chips
          </h4>
        </div>
        <div class="card-body">
          <p>
            Helps you represent simple data with Various options.you can create a chip by using <code>.chip</code> and
            <code>.chip-body</code>. to add avatar use class <code>.avatar</code> inside <code>.chip-body</code>.
            use class <code>.chip-text</code> for chip text.
          </p>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text"> Basic Chip</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar">
                <div class="avatar-content">
                  LD
                </div>
              </div>
              <span class="chip-text">Avatar Text</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar">
                <span><i class="bx bx-user"></i></span>
              </div>
              <span class="chip-text">Avatar Icon</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar">
                <img class="img-fluid" src="{{asset('images/portrait/small/avatar-s-2.jpg')}}"
                  alt="generic img placeholder" height="20" width="20">
              </div>
              <span class="chip-text">Avatar Image</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Chip Closeable</span>
              <div class="chip-closeable">
                <i class="bx bx-x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default chips ends -->

<!-- Colored Chips Starts -->
<section id="colored-chips">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Colors</h4>
        </div>
        <div class="card-body">
          <p>use class <code>.chip-{color-name}</code> with <code>.chip</code> to change background color of chip.</p>
          <div class="chip chip-primary mr-1">
            <div class="chip-body">
              <span class="chip-text">Primary chip</span>
            </div>
          </div>
          <div class="chip chip-success mr-1">
            <div class="chip-body">
              <div class="avatar">
                <div class="avatar-content">
                  LD
                </div>
              </div>
              <span class="chip-text">Avatar Text</span>
            </div>
          </div>
          <div class="chip chip-info mr-1">
            <div class="chip-body">
              <div class="avatar">
                <span><i class="bx bx-user"></i></span>
              </div>
              <span class="chip-text">Avatar Icon</span>
            </div>
          </div>
          <div class="chip chip-warning mr-1">
            <div class="chip-body">
              <div class="avatar">
                <img class="img-fluid" src="{{asset('images/portrait/small/avatar-s-2.jpg')}}"
                  alt="generic img placeholder" height="20" width="20">
              </div>
              <span class="chip-text">Avatar Image</span>
            </div>
          </div>
          <div class="chip chip-danger mr-1">
            <div class="chip-body">
              <span class="chip-text">Avatar Closeable</span>
              <div class="chip-closeable">
                <i class="bx bx-x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Colored Chips Ends -->

<!-- Colored Avatar Starts -->
<section id="colored-avatar">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Colored Avatar</h4>
        </div>
        <div class="card-body">
          <p>You can change background color of avatar by using <code>.bg-{color-name}</code> with
            <code>.avatar</code></p>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar bg-primary">
                <span>VS</span>
              </div>
              <span class="chip-text">Avatar Text</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar bg-success">
                <span>HT</span>
              </div>
              <span class="chip-text">Avatar Text</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar bg-info">
                <i class="bx bx-user"></i>
              </div>
              <span class="chip-text">Avatar Text</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar bg-danger">
                <i class="bx bx-user"></i>
              </div>
              <span class="chip-text">Avatar Text</span>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar bg-warning">
                <i class="bx bx-user"></i>
              </div>
              <span class="chip-text">Avatar Text</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Colored Avatar Ends -->

<!-- Icons Chips Starts -->
<section id="icons-chips">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Icons</h4>
        </div>
        <div class="card-body">
          <p>To add icons in your chips wrap them inside <code>.avatar</code></p>
          <div class="chip mr-1">
            <div class="chip-body">
              <div class="avatar">
                <i class="bx bx-user"></i>
              </div>
              <span class="chip-text">Default chip</span>
            </div>
          </div>
          <div class="chip chip-primary mr-1">
            <div class="chip-body">
              <div class="avatar">
                <i class="bx bx-download"></i>
              </div>
              <span class="chip-text">Download Icon</span>
            </div>
          </div>
          <div class="chip chip-success mr-1">
            <div class="chip-body">
              <div class="avatar">
                <i class="bx bx-envelope"></i>
              </div>
              <span class="chip-text">Mail Icon</span>
            </div>
          </div>
          <div class="chip chip-danger mr-1">
            <div class="chip-body">
              <div class="avatar">
                <i class="bx bx-block"></i>
              </div>
              <span class="chip-text">Block Icon</span>
            </div>
          </div>
          <div class="chip chip-warning mr-1">
            <div class="chip-body">
              <div class="avatar">
                <i class="bx bx-battery"></i>
              </div>
              <span class="chip-text">Battery Icon</span>
            </div>
          </div>
          <div class="chip chip-info mr-1">
            <div class="chip-body">
              <div class="avatar">
                <i class="bx bx-edit"></i>
              </div>
              <span class="chip-text">Edit Icon</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Icons Chips Ends -->

<!-- Closeable Chips Starts -->
<section id="closeable-chips">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Closeable</h4>
        </div>
        <div class="card-body">
          <p>To make your chip closeable use class <code>.chip-closeable</code></p>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Dribble</span>
              <div class="chip-closeable">
                <i class="bx bx-x"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Github</span>
              <div class="chip-closeable">
                <i class="bx bx-x"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Behance</span>
              <div class="chip-closeable">
                <i class="bx bx-x"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Vue Js</span>
              <div class="chip-closeable">
                <i class="bx bx-x"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Frest</span>
              <div class="chip-closeable">
                <i class="bx bx-x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Closeable Chips Ends -->

<!-- Customized Closeable Chips Starts -->
<section id="closeable-chips-customized">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Customized Closeable Icon</h4>
        </div>
        <div class="card-body">
          <p>You can change closeable icon by wrapping your preferred icon in <code>.chip-closeable</code></p>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Dribble</span>
              <div class="chip-closeable">
                <i class="bx bx-trash-alt"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Github</span>
              <div class="chip-closeable">
                <i class="bx bx-trash"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Behance</span>
              <div class="chip-closeable">
                <i class="bx bx-star"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Vue Js</span>
              <div class="chip-closeable">
                <i class="bx bx-minus-circle"></i>
              </div>
            </div>
          </div>
          <div class="chip mr-1">
            <div class="chip-body">
              <span class="chip-text">Frest</span>
              <div class="chip-closeable">
                <i class="bx bx-x-circle"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Customized Closeable Chips Ends -->
@endsection
