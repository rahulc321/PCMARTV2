@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Badges')

@section('content')
<!-- Default Badges start -->
<section id="basic-badges">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Badges</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Use the <code>.badge</code> class, followed by<code>.badge-{colorName}</code>class within element to
                create
                badge with different color options.</p>
              <!-- basic Badges -->
              <div class="badge badge-primary mr-1 mb-1">Primary</div>
              <div class="badge badge-secondary mr-1 mb-1">Secondary</div>
              <div class="badge badge-success mr-1 mb-1">Success</div>
              <div class="badge badge-info mr-1 mb-1">Info</div>
              <div class="badge badge-warning mr-1 mb-1">Warning</div>
              <div class="badge badge-danger mb-1">Danger</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default Badges end -->

<!-- Badges Light start -->
<section id="badges-light">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Badges Light</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Use the <code>.badge-light-{colorName}</code> class with <code>.badge</code> class to create badge with
                light colored background options.</p>
              <!-- Light Badges -->
              <div class="badge badge-light-primary mr-1 mb-1">Primary</div>
              <div class="badge badge-light-secondary mr-1 mb-1">Secondary</div>
              <div class="badge badge-light-success mr-1 mb-1">Success</div>
              <div class="badge badge-light-info mr-1 mb-1">Info</div>
              <div class="badge badge-light-warning mr-1 mb-1">Warning</div>
              <div class="badge badge-light-danger mb-1">Danger</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Badges Light end -->

<!-- Badges With Icons Starts -->
<section id="badges-with-icons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Badges With Icons</h4>
        </div>
        <div class="card-body">
          <div class="badge badge-primary d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-facebook font-size-small mr-25"></i>
            <span>Primary</span>
          </div>
          <div class="badge badge-secondary d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-github font-size-small mr-25"></i>
            <span>Secondary</span>
          </div>
          <div class="badge badge-success d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-instagram font-size-small mr-25"></i>
            <span>Success</span>
          </div>
          <div class="badge badge-danger d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-google-plus font-size-small mr-25"></i>
            <span>Danger</span>
          </div>
          <div class="badge badge-info d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-twitter font-size-small mr-25"></i>
            <span>Info</span>
          </div>
          <div class="badge badge-warning d-inline-flex align-items-center mb-1">
            <i class="bx bx-sun font-size-small mr-25"></i>
            <span>Warning</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Badges With Icons End -->

<!-- Badges With Only Icons Starts -->
<section id="badges-only-icons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Badges With Only Icons</h4>
        </div>
        <div class="card-body">
          <p>Add <code>.badge-icon</code> with <code>.badge</code> to make badge with icon.</p>
          <div class="badge badge-primary badge-icon mr-1 mb-1">
            <i class="bx bxl-facebook"></i>
          </div>
          <div class="badge badge-secondary badge-icon mr-1 mb-1">
            <i class="bx bxl-github"></i>
          </div>
          <div class="badge badge-success badge-icon mr-1 mb-1">
            <i class="bx bxl-instagram"></i>
          </div>
          <div class="badge badge-danger badge-icon mr-1 mb-1">
            <i class="bx bxl-google-plus"></i>
          </div>
          <div class="badge badge-info badge-icon mr-1 mb-1">
            <i class="bx bxl-twitter"></i>
          </div>
          <div class="badge badge-warning badge-icon mb-1">
            <i class="bx bx-sun"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Badges With Only Icons Ends -->
@endsection
