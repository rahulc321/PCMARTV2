@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Pill Badges')

@section('content')
<!-- Default Pill Badges start -->
<section id="basic-pill-badges">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Pill Badges</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Use the <code>.badge-pill</code> modifier class to make badges more rounded (with a larger
                border-radius and additional horizontal padding). </p>
              <!-- basic Badges Pill -->
              <div class="badge badge-pill badge-primary mr-1 mb-1">Primary</div>
              <div class="badge badge-pill badge-secondary mr-1 mb-1">Secondary</div>
              <div class="badge badge-pill badge-success mr-1 mb-1">Success</div>
              <div class="badge badge-pill badge-info mr-1 mb-1">Info</div>
              <div class="badge badge-pill badge-warning mr-1 mb-1">Warning</div>
              <div class="badge badge-pill badge-danger mb-1">Danger</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default Pill Badges end -->

<!-- Pill Badges Light start -->
<section id="pill-badges-light">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pill Badges Light</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Use the <code>.badge-pill</code> class with <code>.badge.badge-light-{colorName}</code> class to
                create pill badges with light colored background options.</p>
              <!-- Light Badges Pill -->
              <div class="badge badge-pill badge-light-primary mr-1 mb-1">Primary</div>
              <div class="badge badge-pill badge-light-secondary mr-1 mb-1">Secondary</div>
              <div class="badge badge-pill badge-light-success mr-1 mb-1">Success</div>
              <div class="badge badge-pill badge-light-info mr-1 mb-1">Info</div>
              <div class="badge badge-pill badge-light-warning mr-1 mb-1">Warning</div>
              <div class="badge badge-pill badge-light-danger mb-1">Danger</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Pill Badges Light end -->

<!-- Glow Badges start -->
<section id="badges-glow">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Glow Badges</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p>Use class <code>.badge-glow</code> to add glow effect with badges.</p>
              <!-- basic Badges Pill -->
              <div class="badge badge-pill badge-glow badge-primary mr-1 mb-1">Primary</div>
              <div class="badge badge-pill badge-glow badge-secondary mr-1 mb-1">Secondary</div>
              <div class="badge badge-pill badge-glow badge-success mr-1 mb-1">Success</div>
              <div class="badge badge-pill badge-glow badge-info mr-1 mb-1">Info</div>
              <div class="badge badge-pill badge-glow badge-warning mr-1 mb-1">Warning</div>
              <div class="badge badge-pill badge-glow badge-danger mb-1">Danger</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Glow Badges end -->

<!-- Pill-Badges With Icons Starts -->
<section id="pill-badges-with-icons">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pill Badges With Icons</h4>
        </div>
        <div class="card-body">
          <div class="badge badge-pill badge-primary d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-facebook font-size-small mr-25"></i>
            <span>Primary</span>
          </div>
          <div class="badge badge-pill badge-secondary d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-github font-size-small mr-25"></i>
            <span>Secondary</span>
          </div>
          <div class="badge badge-pill badge-success d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-instagram font-size-small mr-25"></i>
            <span>Success</span>
          </div>
          <div class="badge badge-pill badge-danger d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-git font-size-small mr-25"></i>
            <span>Danger</span>
          </div>
          <div class="badge badge-pill badge-info d-inline-flex align-items-center mr-1 mb-1">
            <i class="bx bxl-twitter font-size-small mr-25"></i>
            <span>Info</span>
          </div>
          <div class="badge badge-pill badge-warning d-inline-flex align-items-center mb-1">
            <i class="bx bx-sun font-size-small mr-25"></i>
            <span>Warning</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Pill Badges With Icons End -->

<!-- Pill-Badge Notification Starts -->
<section id="pill-badge-notification">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pill Badges as Notification</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.badge-up</code> within <code>.position-relative</code> class to add badges as
            notification.</p>
          <div class="position-relative d-inline-block mr-2">
            <i class="bx bxl-facebook font-medium-5 text-primary"></i>
            <span class="badge badge-pill badge-primary badge-up badge-round">4</span>
          </div>
          <div class="position-relative d-inline-block mr-2">
            <i class="bx bxl-twitter font-medium-5 text-info"></i>
            <span class="badge badge-pill badge-info badge-up badge-round">5</span>
          </div>
          <div class="position-relative d-inline-block">
            <i class="bx bxl-instagram font-medium-5 text-danger"></i>
            <span class="badge badge-pill badge-danger badge-up badge-round badge-glow">6</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Pill-Badge Notification Starts -->

<!-- custom badges -->


<!-- Badge-circle default size Starts -->
<section id="badge-circle">
  <div class="row match-height">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom Badge Circle</h4>
        </div>
        <div class="card-body">
          <p>Use <code>.badge-circle</code> to add badges with circle and use
            <code>.badge-circle-{colorName}</code> to create circle badges with colored background
            options. For different sizing variations, use <code>.badge-circle-{lg/sm}</code> along with
            <code>.badge-circle</code>.</p>
          <ul class="list-inline">
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-primary mr-1 mb-1">
                <i class="bx bxl-facebook font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-secondary mr-1 mb-1">
                <i class="bx bxl-github font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-success mr-1 mb-1">
                <i class="bx bxl-instagram font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-danger mr-1 mb-1">
                <i class="bx bxl-git font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-info mr-1 mb-1">
                <i class="bx bxl-twitter font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-warning mb-1">
                <i class="bx bx-sun font-large-1"></i>
              </div>
            </li>
          </ul>
          <ul class="list-inline">
            <li>
              <div class="badge badge-circle badge-circle-primary mr-1 mb-1">
                <i class="bx bxl-facebook"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-secondary mr-1 mb-1">
                <i class="bx bxl-github"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-success mr-1 mb-1">
                <i class="bx bxl-instagram"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-danger mr-1 mb-1">
                <i class="bx bxl-git"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-info mr-1 mb-1">
                <i class="bx bxl-twitter"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-warning mb-1">
                <i class="bx bx-sun"></i>
              </div>
            </li>
          </ul>
          <ul class="list-inline mb-0">
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-primary mr-1 mb-1">
                <i class="bx bxl-facebook font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-secondary mr-1 mb-1">
                <i class="bx bxl-github font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-success mr-1 mb-1">
                <i class="bx bxl-instagram font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-danger mr-1 mb-1">
                <i class="bx bxl-git font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-info mr-1 mb-1">
                <i class="bx bxl-twitter font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-warning mb-1">
                <i class="bx bx-sun font-size-base"></i>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom Badge Circle with Light Background</h4>
        </div>
        <div class="card-body">
          <p>Use <code>.badge-circle-light-{colorName}</code> along with <code>.badge-circle</code> class to create
            circle badges with light colored background
            options.</p>
          <ul class="list-inline">
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-light-primary mr-1 mb-1">
                <i class="bx bxl-facebook font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-light-secondary mr-1 mb-1">
                <i class="bx bxl-github font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-light-success mr-1 mb-1">
                <i class="bx bxl-instagram font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-light-danger mr-1 mb-1">
                <i class="bx bxl-git font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-light-info mr-1 mb-1">
                <i class="bx bxl-twitter font-large-1"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-lg badge-circle-light-warning mb-1">
                <i class="bx bx-sun font-large-1"></i>
              </div>
            </li>
          </ul>
          <ul class="list-inline">
            <li>
              <div class="badge badge-circle badge-circle-light-primary mr-1 mb-1">
                <i class="bx bxl-facebook"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-light-secondary mr-1 mb-1">
                <i class="bx bxl-github"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-light-success mr-1 mb-1">
                <i class="bx bxl-instagram"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-light-danger mr-1 mb-1">
                <i class="bx bxl-git"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-light-info mr-1 mb-1">
                <i class="bx bxl-twitter"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-light-warning mb-1">
                <i class="bx bx-sun"></i>
              </div>
            </li>
          </ul>
          <ul class="list-inline mb-0">
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-light-primary mr-1 mb-1">
                <i class="bx bxl-facebook font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-light-secondary mr-1 mb-1">
                <i class="bx bxl-github font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-light-success mr-1 mb-1">
                <i class="bx bxl-instagram font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-light-danger mr-1 mb-1">
                <i class="bx bxl-git font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-light-info mr-1 mb-1">
                <i class="bx bxl-twitter font-size-base"></i>
              </div>
            </li>
            <li>
              <div class="badge badge-circle badge-circle-sm badge-circle-light-warning mb-1">
                <i class="bx bx-sun font-size-base"></i>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Badge-circle default size Starts -->
@endsection
