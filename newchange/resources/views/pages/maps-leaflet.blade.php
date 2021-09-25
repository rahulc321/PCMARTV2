@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Leaflet')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/maps/leaflet.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/maps/maps-leaflet.css')}}">
@endsection

@section('content')
<section id="maps-leaflet">
  <div class="row">
    <!-- Basic Map starts -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Map</h4>
        </div>
        <div class="card-body">
          <div class="leaflet-map" id="basic-map"></div>
        </div>
      </div>
    </div>
    <!-- Basic Map ends -->

    <!-- Marker Circle & Polygon starts -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Marker Circle & Polygon</h4>
        </div>
        <div class="card-body">
          <div class="leaflet-map" id="circle-polygon-map"></div>
        </div>
      </div>
    </div>
    <!-- Marker Circle & Polygon ends -->

    <!-- Draggable Marker With Popup starts -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Draggable Marker With Popup</h4>
        </div>
        <div class="card-body">
          <div class="leaflet-map" id="draggable-marker-map"></div>
        </div>
      </div>
    </div>
    <!-- Draggable Marker With Popup ends -->

    <!-- User Location starts -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">User Location</h4>
        </div>
        <div class="card-body">
          <div class="leaflet-map" id="user-location-map"></div>
        </div>
      </div>
    </div>
    <!-- User Location ends -->

    <!-- Custom Icons Map starts -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Custom Icons</h4>
        </div>
        <div class="card-body">
          <div class="leaflet-map" id="custom-icons-map"></div>
        </div>
      </div>
    </div>
    <!-- Custom Icons Map ends -->

    <!-- GeoJson starts -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">GeoJson</h4>
        </div>
        <div class="card-body">
          <div class="leaflet-map" id="geojson-map"></div>
        </div>
      </div>
    </div>
    <!-- GeoJson ends -->

    <!-- Layer Control starts -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Layer Control</h4>
        </div>
        <div class="card-body">
          <div class="leaflet-map" id="layer-control-map"></div>
        </div>
      </div>
    </div>
    <!-- Layer Control ends -->
  </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/maps/leaflet.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/maps/maps-leaflet.js')}}"></script>
@endsection
