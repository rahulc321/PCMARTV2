@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Chartist')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/chartist.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/chart-chartist.css')}}">
@endsection

@section('content')
<!-- Chartist  -->
<section id="chartist-wrapper">
  <!-- simple line chart -->
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Simple Line Chart</h6>
        </div>
        <div class="card-body">
          <div class="simple-line-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Line Chart With Area</h6>
        </div>
        <div class="card-body">
          <div class="line-area-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
    <!-- line chart with area -->
  </div>
  <div class="row">
    <!-- Bi-Polar Line Chart with Area only -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Bi-Polar Line Chart With Area Only</h6>
        </div>
        <div class="card-body">
          <div class="bi-polar-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
    <!-- Series Overrides -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Series Overrides</h6>
        </div>
        <div class="card-body">
          <div class="series-overrides-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- bar chart start here -->
  <div class="row">
    <!-- Bi polar bar Chart -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">BI-Polar Bar Chart
          </h6>
        </div>
        <div class="card-body">
          <div class="bi-polar-bar-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Stacked Bar Chart</h6>
        </div>
        <div class="card-body">
          <div class="stacked-bar-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Horizontal Bar Chart</h6>
        </div>
        <div class="card-body">
          <div class="horizontal-bar-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Multi-Line Labels</h6>
        </div>
        <div class="card-body">
          <div class="multi-line-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ bar chart start here -->
  <!-- Pie chart start here -->
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Simple Pie Chart</h6>
        </div>
        <div class="card-body">
          <div class="pie-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Pie Chart With Custom Labels</h6>
        </div>
        <div class="card-body">
          <div class="pie-custome-label-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 animated-chart">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Animating A Donut With SVG.Animate</h6>
        </div>
        <div class="card-body">
          <div class="animation-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Gauge Chart Using Fill Rather Than Stroke</h6>
        </div>
        <div class="card-body">
          <div class="gauge-chart ct-golden-section"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Pie chart start here -->
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/charts/chartist.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/charts/chart-chartist.js')}}"></script>
@endsection
