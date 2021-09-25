@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Breadcrumbs')

@section('content')
<!-- Default Breadcrumb Starts -->
<section id="default-breadcrumb">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Default</h4>
        </div>
        <div class="card-body">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="bx bx-home"></i></a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Library</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Data</a></li>
              <li class="breadcrumb-item active" aria-current="page">Link</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default Breadcrumb Ends -->

<!-- Breadcrumb with Divider Starts -->
<section id="breadcrumb-divider">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Breadcrumb Divider Icon with Active Link Fill</h4>
        </div>
        <div class="card-body">
          <p>To change Divider Icon, add <code>.breadcrumb-divider</code> class along with <code>.breadcrumb</code>
            class.</p>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-divider">
              <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="bx bx-home"></i></a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Library</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Data</a></li>
              <li class="breadcrumb-item active" aria-current="page">Link</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default Breadcrumb Ends -->

<!-- Breadcrumb with Rounded Shape Starts -->
<section id="breadcrumb-rounded">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Breadcrumb Rounded</h4>
        </div>
        <div class="card-body">
          <p>For Rounded Breadcrumb, add <code>.rounded-pill</code> class along with <code>.breadcrumb</code> class.
          </p>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-pill">
              <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="bx bx-home"></i></a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Library</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Data</a></li>
              <li class="breadcrumb-item active" aria-current="page">Link</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default Breadcrumb Ends -->

<!-- Breadcrumb with Divider and Rounded Shape Starts -->
<section id="breadcrumb-rounded-divider">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Breadcrumb Rounded with Divider Icon and Active Link Fill</h4>
        </div>
        <div class="card-body">
          <p>For Rounded Breadcrumb with change divider icon, add <code>.rounded-pill.breadcrumb-divider</code> class
            along with <code>.breadcrumb</code> class. </p>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-pill breadcrumb-divider">
              <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="bx bx-home"></i></a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Library</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Data</a></li>
              <li class="breadcrumb-item active" aria-current="page">Link</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Default Breadcrumb Ends -->
@endsection
