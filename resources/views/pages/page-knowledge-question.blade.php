@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Question')
{{-- page-styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-knowledge-base.css')}}">
@endsection
@section('content')
<!-- Knowledge base question Content start -->
<section class="kb-question">
  <div class="row">
      <!-- left side menubar section -->
    <div class="kb-overlay"></div>
    <div class="col-sm-3">
      <div class="kb-sidebar">
        <i class="bx bx-x font-medium-5 d-md-none kb-close-icon cursor-pointer"></i>
        <h6 class="mb-2">Related Questions</h6>
        <ul class="list-unstyled">
          <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect">Laravel Starter Kit?</a>
          </li>
          <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect">Firebase &
                  Authentication?</a></li>
          <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect">Clean & Modern
                  Design?</a></li>
          <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect">No jQuery Dependency?</a>
          </li>
          <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect">Code Splitting?</a></li>
          <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect">Continuous Updates?</a>
          </li>
          <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect">Do you charge for
              upgrade?</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- right side section -->
    <div class="col-md-9">
      <button class="btn btn-primary mb-1 kb-menu d-md-none"><i class="bx bx-menu mr-50"></i>Question</button>
      <div class="card">
        <div class="card-body">
          <div class="title mb-2">
              <h2 class="kb-title">UX Design Portfolio: Best Practices</h2>
              <p>Last updated on 01 Aug 2019</p>
          </div>
          <p>
              So you know you need a portfolio to land a UI/UX gig. If you are just starting out or it’s
              been
              a while, that can be overwhelming. Even if you have a portfolio, you may be wondering if it
              is
              doing all it can for you. As experienced digital product designers, we have some thoughts on
              the
              topic of design portfolios; how to make one and how to get the most out of it.
          </p>
          <div id="kb-carousel" class="carousel slide my-2" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#kb-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#kb-carousel" data-slide-to="1"></li>
                  <li data-target="#kb-carousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                      <img class="img-fluid" src="{{asset('images/banner/banner-1.jpg')}}"
                          alt="banner">
                  </div>
                  <div class="carousel-item">
                      <img class="img-fluid" src="{{asset('images/banner/banner-2.jpg')}}"
                          alt="banner">
                  </div>
                  <div class="carousel-item">
                      <img class="img-fluid" src="{{asset('images/banner/banner-4.jpg')}}"
                          alt="banner">
                  </div>
              </div>
              <a class="carousel-control-prev" href="#kb-carousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#kb-carousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
          <h3>Inspiration</h3>
          <p>
              So where to start? How many projects do you need? What’s the best way to organize? There are
              lots of great resources available to you if you need help getting started or need some
              inspiration.
          </p>
          <h5 class="mb-1">Topics:</h5>
          <ul>
              <li>What challenges did you encounter?</li>
              <li>What did you do differently?</li>
              <li>What did you try that didn’t work?</li>
              <li>What did you learn?</li>
              <li>What did you accomplish?</li>
          </ul>
          <p class="mt-2">
              On our site, we like to include the results of our projects. Hiring managers love concrete
              numbers that prove the value of your work, particularly in a creative area that can be hard
              to
              quantify. We state the metric, show our solution, and then show the result.
          </p>
          <div class="d-flex justify-content-between mt-2">
              <a href="javascript:void(0)" class="btn btn-light-primary">Previous</a>
              <a href="javascript:void(0)" class="btn btn-light-primary">Next</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Knowledge base question Content ends -->
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-knowledge-base.js')}}"></script>
@endsection
