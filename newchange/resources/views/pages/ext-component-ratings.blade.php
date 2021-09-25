@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Ratings')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/jquery.rateyo.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/ext-component-ratings.css')}}">
@endsection

@section('content')
<!-- Rating starts -->
<section id="ratings">
  <div class="row">
    <div class="col-md-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic</h4>
        </div>
        <div class="card-body">
          <div class="basic-ratings"></div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Readonly</h4>
        </div>
        <div class="card-body">
          <div class="read-only-ratings" data-rateyo-read-only="true"></div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Half Star</h4>
        </div>
        <div class="card-body">
          <div class="half-star-ratings" data-rateyo-half-star="true"></div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Full Star</h4>
        </div>
        <div class="card-body">
          <div class="full-star-ratings" data-rateyo-full-star="true"></div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Multicolor</h4>
        </div>
        <div class="card-body">
          <div class="multi-color-ratings"></div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom SVG</h4>
        </div>
        <div class="card-body">
          <div class="custom-svg-ratings"></div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Events</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md d-flex flex-column align-items-start mb-lg-0 mb-1">
              <h6 class="card-text mb-50">onSet Event</h6>
              <div class="onset-event-ratings"></div>
            </div>
            <div class="col-md d-flex flex-column align-items-start">
              <h6 class="card-text mb-50">onChange Event</h6>
              <div class="onChange-event-ratings"></div>
              <div class="counter-wrapper mt-50">
                <strong>Ratings:</strong>
                <span class="counter"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Methods</h4>
        </div>
        <div class="card-body">
          <div class="methods-ratings"></div>
          <button class="btn btn-outline-primary mr-75 mt-1 btn-initialize">Initialize</button>
          <button class="btn btn-outline-primary mr-75 mt-1 btn-get-rating">Get Ratings</button>
          <button class="btn btn-outline-primary mr-75 mt-1 btn-set-rating">Set Ratings to 1</button>
          <button class="btn btn-outline-danger mt-1 btn-destroy">Destroy</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Rating ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/jquery.rateyo.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/extensions/ext-component-ratings.js')}}"></script>
@endsection
