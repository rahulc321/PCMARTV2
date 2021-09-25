@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Colors')

@section('content')
<!-- Background color start -->
<section id="backcolor">
  <div class="row">
    <div class="col-12">
      <div class="card background-color">
        <div class="card-header">
          <h4 class="card-title">Default Colors</h4>
        </div>
        <div class="card-body mb-0">
          <p class="mb-0">We have a series of colors that are used by default. They include:</p>
          <ul class="colors-list list-unstyled mb-0">
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i>Primary
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i>Success
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i>Danger
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i>Warning
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i>Info
            </li>
          </ul>
          <p>For each color, we think has its functionality in the application as alerts of errors <b>(danger)</b>,
            warnings to the user <b>(warning)</b>, communications of approval <b>(success)</b>, or main color of the
            application <b>(primary)</b>.
            <div class="d-flex justify-content-start flex-wrap">
              <div
                class="text-center bg-primary colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                <span class="align-middle">primary</span>
              </div>
              <div
                class="text-center bg-secondary colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                <span class="align-middle">secondary</span>
              </div>
              <div
                class="text-center bg-success colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                <span class="align-middle">success</span>
              </div>
              <div
                class="text-center bg-danger colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                <span class="align-middle">danger</span>
              </div>
              <div
                class="text-center bg-warning colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                <span class="align-middle">warning</span>
              </div>
              <div
                class="text-center bg-info colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center my-1 ml-50 shadow">
                <span class="align-middle">info</span>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Background color end -->

<!-- Gradient color start -->
<section id="backcolor-gradient">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Light Colors</h4>
        </div>
        <div class="card-body">
          <p class="mb-0">We have make light color based on our default color:</p>
          <ul class="colors-list list-unstyled mb-0">
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i><code>.bg-primary .bg-light</code>
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i><code>.bg-success .bg-light</code>
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i><code>.bg-danger .bg-light</code>
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i><code>.bg-warning .bg-light</code>
            </li>
            <li class="d-flex align-items-center py-25">
              <i class="bx bx-chevrons-right"></i><code>.bg-info .bg-light</code>
            </li>
          </ul>
          <p>For each color, we think has its functionality in the application as alerts of errors <b>(danger)</b>,
            warnings to the user <b>(warning)</b>, communications of approval <b>(success)</b>, or main color of the
            application <b>(primary)</b>.
            <div class="d-flex justify-content-start flex-wrap">
              <div
                class="text-center bg-primary bg-light colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                <span class="align-middle text-primary">primary</span>
              </div>
              <div
                class="text-center bg-secondary bg-light colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                <span class="align-middle text-secondary">secondary</span>
              </div>
              <div
                class="text-center bg-success bg-light colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                <span class="align-middle text-success">success</span>
              </div>
              <div
                class="text-center bg-danger bg-light colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                <span class="align-middle text-danger">danger</span>
              </div>
              <div
                class="text-center bg-warning bg-light colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                <span class="align-middle text-warning">warning</span>
              </div>
              <div
                class="text-center bg-info colors bg-light colors-container rounded text-white width-100 height-100 d-flex align-items-center justify-content-center my-1 ml-50 shadow">
                <span class="align-middle text-info">info</span>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Gradient color end -->
@endsection
