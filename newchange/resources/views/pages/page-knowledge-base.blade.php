@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Knowledge-base')
{{-- page-styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-knowledge-base.css')}}">
@endsection

@section('content')
<!-- Knowledge base Jumbotron start -->
<section class="kb-search">
  <div class="row">
    <div class="col-12">
      <div class="card bg-transparent shadow-none kb-header">
        <div class="card-body text-center">
          <h1 class=" mb-2 kb-title">How can we help you today?</h1>
          <p class=" mb-3">
            Algolia helps businesses across industries quickly create relevant, scalable, and lightning fast search
            and discovery experiences.
          </p>
          <form>
            <fieldset class="form-group position-relative w-50 mx-auto kb-search-width">
              <input type="text" class="form-control form-control-lg round pl-2" id="searchbar"
                placeholder="Find from talk..">
              <button class="btn btn-primary round position-absolute d-none d-sm-block" type="button">Search</button>
              <button class="btn btn-primary round position-absolute d-block d-sm-none" type="button"><i
                  class="bx bx-search"></i></button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Knowledge base Jumbotron ends -->
<!-- Knowledge base start -->
<section class="kb-content">
  <div class="row kb-search-content-info mx-1 mx-md-2 mx-lg-5">
    <div class="col-12">
      <div class="row match-height">
        <div class="col-md-4 col-sm-6 kb-search-content">
          <div class="card kb-hover-1">
            <div class="card-body text-center">
              <a href="{{url('page/knowledge-base/categories')}}">
                <div class=" mb-1">
                  <i class="livicon-evo"
                    data-options="name: users.svg; size: 50px; strokeColorAlt: #FDAC41; strokeColor: #5A8DEE; style: lines-alt; eventOn: .kb-hover-1;"></i>
                </div>
                <h5>My Account</h5>
                <p class=" text-muted">But students more often neglect fact it is much more</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 kb-search-content">
          <div class="card kb-hover-2">
            <div class="card-body text-center">
              <a href="{{url('page/knowledge-base/categories')}}">
                <div class=" mb-1">
                  <i class="livicon-evo"
                    data-options="name: diagram.svg; size: 50px; strokeColorAlt: #FDAC41; strokeColor: #5A8DEE; style: lines-alt; eventOn: .kb-hover-2;"></i>
                </div>
                <h5>Connect</h5>
                <p class=" text-muted">But students more often neglect fact it is much more</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 kb-search-content">
          <div class="card kb-hover-3">
            <div class="card-body text-center">
              <a href="{{url('page/knowledge-base/categories')}}">
                <div class=" mb-1">
                  <i class="livicon-evo"
                    data-options="name: swap-horizontal.svg; size: 50px; strokeColorAlt: #FDAC41; strokeColor: #5A8DEE; style: lines-alt; eventOn: .kb-hover-3;"></i>
                </div>
                <h5>Charges & Refunds</h5>
                <p class=" text-muted">But students more often neglect fact it is much more</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 kb-search-content">
          <div class="card kb-hover-4">
            <div class="card-body text-center">
              <a href="{{url('page/knowledge-base/categories')}}">
                <div class=" mb-1">
                  <i class="livicon-evo"
                    data-options="name: paper-plane.svg; size: 50px; strokeColorAlt: #FDAC41; strokeColor: #5A8DEE; style: lines-alt; eventOn: .kb-hover-4;"></i>
                </div>
                <h5>International</h5>
                <p class=" text-muted">But students more often neglect fact it is much more</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 kb-search-content">
          <div class="card kb-hover-5">
            <div class="card-body text-center">
              <a href="{{url('page/knowledge-base/categories')}}">
                <div class=" mb-1">
                  <i class="livicon-evo"
                    data-options="name: smartphone.svg; size: 50px; strokeColorAlt: #FDAC41; strokeColor: #5A8DEE; style: lines-alt; eventOn: .kb-hover-5;"></i>
                </div>
                <h5>Payouts</h5>
                <p class=" text-muted">But students more often neglect fact it is much more</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 kb-search-content">
          <div class="card kb-hover-6">
            <div class="card-body text-center">
              <a href="{{url('page/knowledge-base/categories')}}">
                <div class=" mb-1">
                  <i class="livicon-evo"
                    data-options="name: desktop.svg; size: 50px; strokeColorAlt: #FDAC41; strokeColor: #5A8DEE; style: lines-alt; eventOn: .kb-hover-6;"></i>
                </div>
                <h5>Disputes & Fraud</h5>
                <p class=" text-muted">But students more often neglect fact it is much more</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Knowledge base ends -->
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-knowledge-base.js')}}"></script>
@endsection
