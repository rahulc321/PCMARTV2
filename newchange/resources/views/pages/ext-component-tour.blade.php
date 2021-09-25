@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Tour')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/shepherd.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/tour/tour.css')}}">
@endsection

@section('content')
<!-- Basic tour Starts -->
<section id="basic-tour">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tour</h4>
        </div>
        <div class="card-body">
          <div class="btn btn-outline-primary" id="tour">Start Tour</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic tour Ends -->

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/shepherd.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/extensions/tour.js')}}"></script>
@endsection
