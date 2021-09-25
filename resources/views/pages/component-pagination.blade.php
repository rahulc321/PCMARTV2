@extends('layouts.contentLayoutMaster')

{{-- title --}}
@section('title','Pagination')

@section('content')
<!-- Default Pagination Starts -->
<section>
  <div class="row match-height">
    <!-- Default Pagination Starts -->
    <div class="col-md-6">
      <div class="card" id="default-pagination">
        <div class="card-header">
          <h4 class="card-title">Basic</h4>
        </div>
        <div class="card-body">
          <p class="mb-4">
            A basic pagination with active item
          </p>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
              <li class="page-item active"><a class="page-link" href="javascript:void(0);">4</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- Default Pagination Starts -->

    <!-- Pagination with Seperator Starts -->
    <div class="col-md-6">
      <div class="card" id="pagination-separator">
        <div class="card-header">
          <h4 class="card-title">Seprated</h4>
        </div>
        <div class="card-body">
          <p>Pagination with seprated Next and Previous icons </p>
          <p>To make space between seprated icons of pagination use <code>.previous</code> class for the first item and
            <code>.next</code> for the last item</p>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-2">
              <li class="page-item previous disabled"><a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-left"></i>
                </a></li>
              <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
              <li class="page-item next"><a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-right"></i>
                </a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- Pagination with Seperator Starts -->
  </div>
  <div class="row match-height">
    <!-- Pagination without border Starts -->
    <div class="col-md-6">
      <div class="card" id="pagination-borderless">
        <div class="card-header">
          <h4 class="card-title">Without Border</h4>
        </div>
        <div class="card-body">
          <p>To create pagination without border, use <code>.pagination-borderless</code> class along with
            <code>.pagination</code>class.</p>

          <nav aria-label="Page navigation">
            <ul class="pagination pagination-borderless justify-content-center mt-2">
              <li class="page-item previous"><a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-left"></i>
                </a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
              <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
              <li class="page-item next"><a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-right"></i>
                </a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- Pagination without border Ends -->

    <!-- Pagination with Color Option Starts -->
    <div class="col-md-6">
      <div class="card" id="pagination-color">
        <div class="card-header">
          <h4 class="card-title">Color Option</h4>
        </div>
        <div class="card-body">
          <p>To add pagination with different color option, use class <code>.pagination-{colorName}</code> with
            <code>.pagination</code> class.</p>
          <nav aria-label="Page navigation example">
            <ul class="pagination pagination-success justify-content-center mt-2">
              <li class="page-item previous"><a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-left"></i>
                </a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
              <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a>
              </li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
              <li class="page-item next"><a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-right"></i>
                </a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- Pagination with Color Option Ends -->
  </div>
</section>

<!-- Pagination Positions start -->
<section id="pagination-positions">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pagination Positions</h4>
        </div>
        <div class="card-body">
          <p>use classes <code>.justify-content-{direction}</code> with <code>.pagination</code> to align your
            pagination</p>
          <div class="row">
            <div class="col-xl-4 col-lg-12">
              <h6 class="text-left">Left Aligned</h6>
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-start mt-2">
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">3</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-xl-4 col-lg-12">
              <h6 class="text-center">Center Aligned</h6>
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mt-2">
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">3</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-xl-4 col-lg-12">
              <h6 class="text-right">Right Aligned</h6>
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end mt-2">
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">3</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Pagination Positions end -->

<!-- Pagination Sizes start -->
<section id="pagination-sizes">
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Pagination Sizes</h4>
      <p>Add <code>.pagination{sm | lg}</code> along with <code>.pagination</code> for small or large size
        pagination.For Default size no classes required.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pagination Sizes With Border</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <nav aria-label="Page navigation">
                <ul class="pagination pagination-lg mb-1">
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">3</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-md-4">
              <nav aria-label="Page navigation">
                <ul class="pagination mb-1 justify-content-md-center">
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">3</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-md-4">
              <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm justify-content-md-center">
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">3</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Pagination Sizes end -->
@endsection
