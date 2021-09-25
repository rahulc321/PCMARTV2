@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Coming Soon')

{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/coming-soon.css')}}">
@endsection

@section('content')
<!-- coming soon start -->
<section>
  <div class="row flexbox-container">
    <div class="col-md-6 col-12 text-center p-3">
      <h1 class="error-title mb-2">We are launching soon</h1>
      <p class="mb-1">Our website is opening soon. Please register to notify you when it's ready!</p>
      <div id="clockFlat" class="card-text text-center coming-soon pt-2 d-flex justify-content-center mb-2"></div>
      <form>
        <fieldset class="form-group position-relative w-75 mx-auto">
          <input type="text" class="form-control round form-control-lg shadow pl-2" placeholder="Email">
          <button class="btn btn-primary cs-btn-notify round position-absolute" type="button">Notify</button>
        </fieldset>
      </form>
    </div>
    <div class="col-md-6 d-lg-block d-none p-2">
      <img class="img-fluid cs-effect cs-effect-bounce" src="{{asset('images/pages/comingsoon.png')}}" alt="coming soon" width="650">
    </div>
  </div>
</section>
<!--/ coming soon end -->

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/coming-soon/jquery.countdown.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/coming-soon.js')}}"></script>
@endsection
