@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Search')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/swiper.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/search.css')}}">
@endsection

@section('content')
<section class="search-bar-wrapper">
  <!-- Search Bar -->
  <div class="search-bar">
    <!-- input search -->
    <form>
      <fieldset class="page-search-input form-group position-relative">
        <input type="search" class="form-control rounded-right form-control-lg shadow pl-2" id="searchbar"
          placeholder="Search">
        <button class="btn btn-primary search-btn rounded" type="button">
          <span class="d-none d-sm-block">Search</span>
          <i class="bx bx-search d-block d-sm-none"></i>
        </button>
      </fieldset>
    </form>
    <!--/ input search -->
  </div>
  <div class="row search-menu">
    <div class="col-12">
      <!-- search menu tab -->
      <ul class="nav nav-pills py-1 mb-1" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-selected="true">
            <i class="bx bx-search"></i>
            <span class="d-none d-sm-block">All</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-selected="false">
            <i class="bx bx-image"></i>
            <span class="d-none d-sm-block">Images</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-selected="false">
            <i class="bx bx-news"></i>
            <span class="d-none d-sm-block">News</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-selected="false">
            <i class="bx bx-video"></i>
            <span class="d-none d-sm-block">Videos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tool-tab" data-toggle="tab" href="#tool" role="tab" aria-selected="false">
            <i class="bx bx-pen"></i>
            <span class="d-sm-block d-none">Tools</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="tab" aria-haspopup="true"
            aria-expanded="false">
            <i class="bx bx-cog"></i>
            <span class="d-sm-block d-none">Settings </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="javascript:void(0);" data-toggle="tab" aria-expanded="true">
              Privacy
            </a>
            <a class="dropdown-item" href="javascript:void(0);" data-toggle="tab" aria-expanded="true">
              Filter
            </a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true"
            aria-expanded="false">
            <i class="bx bx-customize"></i>
            <span class="d-none d-sm-block">More</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" id="dropdown12-tab" href="#dropdown12" data-toggle="tab" aria-expanded="true">
              <span>Image Search</span>
            </a>
            <a class="dropdown-item" id="dropdown13-tab" href="#dropdown13" data-toggle="tab" aria-expanded="true">
              <span>Advance Search</span>
            </a>
          </div>
        </li>
      </ul>
      <!--/ search menu tab -->
    </div>
  </div>
  <!-- Search Bar end -->

  <!-- seach result section -->
  <div class="row">
    <div class="col-12">
      <!-- search data searching speed -->
      <div class="search-speed mb-1">
        <small class="text-muted">About 133,000,000 results (0.45seconds)</small>
      </div>
      <!--/ search data searching speed -->
    </div>
    <!--Search Result-->
    <!-- Search content area -->
    <div class="col-lg-8 col-md-7 col-12 order-2 order-md-1">
      <div id="searchResults" class="py-0 search-results">
        <!-- Web results -->
        <div class="web-result">
          <ul class="list-unstyled">
            <!--search with list-->
            <li>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title cursor-pointer">
                    <a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/dashboard-analytics.html"
                      target="_blank">
                      Vuexy - Vuejs + HTML Admin Dashboard Template by PIXINVENT
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    This resource is also a developer-friendly VueJS admin dashboard templates. If you
                    would like to see a preview of the coded version you can explore the ...
                  </p>
                  <span class="badge badge-light-primary mb-sm-0 mb-25 mr-50">Vuexy</span>
                  <span class="badge badge-light-primary mb-sm-0 mb-25 mr-50">Template</span>
                  <span class="badge badge-light-primary mb-sm-0 mb-25 mr-50">HTML ADMIN Template</span>
                </div>
                <div class="card-footer border-top d-flex justify-content-between">
                  <small class="text-truncate">
                    <a href="https://1.envato.market/vusax_admin" class="success darken-4" target="_blank">
                      https://1.envato.market/vusax_admin
                    </a>
                  </small>
                  <i class="bx bx-dots-vertical-rounded font-medium-2 cursor-pointer"></i>
                </div>
              </div>
            </li>
            <li class="media-list">
              <div class="media align-items-center mb-1">
                <a href="https://twitter.com/pixinvents" class="pr-1" target="_blank">
                  <img src="{{asset('images/pages/pixinvent.jpg')}}" alt="pixinvent" class="rounded-circle"
                    height="50" width="50">
                </a>
                <div class="media-body d-sm-flex justify-content-between align-items-center">
                  <div class="media-text mb-1 mb-sm-0">
                    <h5 class="mb-25">
                      <a href="https://twitter.com/pixinvents" target="_blank">PIXINVENT (@Pixinvents) .Twitter</a>
                    </h5>
                    <a href="https://twitter.com/pixinvents" class="success darken-4"
                      target="_blank">https://twitter.com/pixinvents
                    </a>
                  </div>
                  <div class="media-link">
                    <a href="https://twitter.com/pixinvents" class="btn btn-primary round" target="_blank">Follow</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title cursor-pointer">
                    <a href="https://dribbble.com/shots/6065222-vuexy-Vuejs-Vuejs-Admin-Dashboard-Template"
                      target="_blank">
                      Vuexy Vuejs - Vuejs Admin Dashboard Template by Anand on Dribbble
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                  <div class="d-lg-flex align-items-center mb-50">
                    <div class="rating warning">
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star-half"></i>
                    </div>
                    <div class="ml-lg-50 font-small-2">Rating: 5 - ‎49 reviews - ‎Starting from US$ 28.00 - ‎In stock
                    </div>
                  </div>
                  <p class="card-text">
                    Feb 22, 2019 - FREE SKETCH & ADOBE XD FILE INCLUDED Vuexy – Vuejs Admin Dashboard
                    Template – is the most developer friendly & highly customisable VueJS Admin Dashboard Template
                    based on Vue CLI, Vuex & Vuexy component framework. Vuexy provides unique features like fuzzy
                    search,
                    bookmarks ...
                  </p>
                  <span class="badge badge-light-primary mb-sm-0 mb-25 mr-50">Vuexy</span>
                  <span class="badge badge-light-primary mb-sm-0 mb-25 mr-50">Anand On Dribbble</span>
                </div>
                <div class="card-footer border-top d-flex justify-content-between">
                  <small class="text-truncate">
                    <a href="https://dribbble.com/shots/6065222-vuexy-Vuejs-Vuejs-Admin-Dashboard-Template"
                      class="success darken-4 " target="_blank">
                      https://dribbble.com/shots/6065222-vuexy-Vuejs-Vuejs-Admin-Dashboard-Template
                    </a>
                  </small>
                  <i class="bx bx-dots-vertical-rounded font-medium-2 cursor-pointer"></i>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- Video results -->
        <div class="video-result py-2">
          <h4>Video</h4>
          <div class="video-result-swiper swiper-container py-1">
            <div class="swiper-wrapper">
              <div class="swiper-slide rounded">
                <div class="slide-content">
                  <a href="https://www.youtube.com/watch?time_continue=8&v=Y2zBqYEJCdw" target="_blank"
                    class="font-medium-1">
                    <div class="position-relative mb-1">
                      <img src="{{asset('images/slider/apex.jpg')}}" alt="apex" class="card-img">
                      <div class="card-img-overlay overlay-dark rounded">
                        <div class="d-flex justify-content-center align-items-center h-100">
                          <i class="bx bx-play-circle font-large-2 text-center"></i>
                        </div>
                      </div>
                    </div>
                    <span>
                      Most developer friendly and highly customizable react - redux & bs4 admin dashboard template.
                    </span>
                  </a>
                </div>
                <div class="action-link d-flex flex-column mt-1">
                  <a href="https://www.youtube.com/watch?time_continue=8&v=Y2zBqYEJCdw" target="_blank">Youtube
                    Results
                  </a>
                  <small>1 day ago</small>
                </div>
              </div>
              <div class="swiper-slide rounded">
                <div class="slide-content">
                  <a href="https://www.youtube.com/watch?v=ik9Nf7idrXY" class="font-medium-1" target="_blank">
                    <div class="position-relative mb-1">
                      <img src="{{asset('images/slider/materialize.jpg')}}" alt="materialize" class="card-img">
                      <div class="card-img-overlay overlay-dark rounded">
                        <div class="d-flex justify-content-center align-items-center h-100">
                          <i class="bx bx-play-circle font-large-2 text-center"></i>
                        </div>
                      </div>
                    </div>
                    <Span>
                      #1 Selling & Most Popular Material Design Admin Template of All Time Join The 4,000+ Satisfied
                      Customers
                    </Span>
                  </a>
                </div>
                <div class="action-link d-flex flex-column mt-1">
                  <a href="https://www.youtube.com/watch?v=ik9Nf7idrXY" target="_blank">More Related</a>
                  <small>1,769 views </small>
                </div>
              </div>
              <div class="swiper-slide rounded">
                <div class="slide-content">
                  <a href="https://www.youtube.com/watch?v=e7QTyzx-lYE" class="font-medium-1" target="_blank">
                    <div class="position-relative mb-1">
                      <img src="{{asset('images/slider/modern.jpg')}}" alt="modern" class="card-img">
                      <div class="card-img-overlay overlay-dark rounded">
                        <div class="d-flex justify-content-center align-items-center h-100">
                          <i class="bx bx-play-circle font-large-2 text-center"></i>
                        </div>
                      </div>
                    </div>
                    <span>
                      Modern Admin the most complete & feature packed bootstrap 4 admin template of 2019!
                    </span>
                  </a>
                </div>
                <div class="action-link d-flex flex-column mt-1">
                  <a href="https://www.youtube.com/watch?v=e7QTyzx-lYE" target="_blank">Youtube Results</a>
                  <small>4 Year ago</small>
                </div>
              </div>
              <div class="swiper-slide rounded">
                <div class="slide-content">
                  <a href="https://www.youtube.com/watch?v=4irB7FBO3j8" class="font-medium-1" target="_blank">
                    <div class="position-relative mb-1">
                      <img src="{{asset('images/slider/stack.jpg')}}" alt="stack" class="card-img">
                      <div class="card-img-overlay overlay-dark rounded">
                        <div class="d-flex justify-content-center align-items-center h-100">
                          <i class="bx bx-play-circle font-large-2 text-center"></i>
                        </div>
                      </div>
                    </div>
                    <span>
                      Stack Admin Ultimate Bootstrap 4 Admin Template for Next Generation Applications.
                    </span>
                  </a>
                </div>
                <div class="action-link d-flex flex-column mt-1">
                  <a href="https://www.youtube.com/watch?v=4irB7FBO3j8" target="_blank">Youtube Results</a>
                  <small>1 Month ago</small>
                </div>
              </div>
              <div class="swiper-slide rounded">
                <div class="slide-content">
                  <a href="https://www.youtube.com/watch?v=xBa6ma7F_VA" target="_blank" class="font-medium-1">
                    <div class="position-relative mb-1">
                      <img src="{{asset('images/slider/vuesax.jpg')}}" alt="vuexy" class="card-img">
                      <div class="card-img-overlay overlay-dark rounded">
                        <div class="d-flex justify-content-center align-items-center h-100">
                          <i class="bx bx-play-circle font-large-2 text-center"></i>
                        </div>
                      </div>
                    </div>
                    <span>
                      The most developer friendly & highly customisable VueJS + HTML5 Admin & Dashboard Template of
                      2019 !
                    </span>
                  </a>
                </div>
                <div class="action-link d-flex flex-column mt-1">
                  <a href="https://www.youtube.com/watch?v=xBa6ma7F_VA" target="_blank">Youtube Results</a>
                  <small>3 Month ago</small>
                </div>
              </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
        <!-- Web results -->
        <div class="web-result">
          <ul class="list-unstyled">
            <li>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title cursor-pointer">
                    <a href="https://getbootstrap.com/docs/4.4/getting-started/introduction/" target="_blank">
                      Getting Started | Bootstrap
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    Get started with Bootstrap, the world’s most popular framework for building responsive,
                    mobile-first sites.
                  </p>
                </div>
                <div class="card-footer border-top d-flex justify-content-between">
                  <small class="text-truncate">
                    <a href="https://getbootstrap.com/docs/4.4/getting-started/introduction/" class="success darken-4"
                      target="_blank">
                      https://getbootstrap.com/docs/4.4/getting-started/introduction/
                    </a>
                  </small>
                  <i class="bx bx-dots-vertical-rounded font-medium-2 cursor-pointer"></i>
                </div>
              </div>
            </li>
            <li>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title cursor-pointer">
                    <a href="https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation/"
                      target="_blank">
                      Introduction | Vuexy Admin Documentation - Pixinvent
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    Vuexy VueJS. The most developer friendly & highly customisable VueJS + HTML5 Admin & Dashboard
                    Template of 2019
                  </p>
                </div>
                <div class="card-footer border-top d-flex justify-content-between">
                  <small class="text-truncate">
                    <a href="https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation/"
                      class="success darken-4" target="_blank">
                      https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation/
                    </a>
                  </small>
                  <i class="bx bx-dots-vertical-rounded font-medium-2 cursor-pointer"></i>
                </div>
              </div>
            </li>
            <li>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title cursor-pointer">
                    <a href="https://www.uplabs.com/posts/vuesax-vuejs-vuejs-admin-dashboard-template" target="_blank">
                      Vuexy Vuejs - Vuejs Admin Dashboard Template - UpLabs
                    </a>
                  </h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    FREE SKETCH, ADOBE XD & FIGMA FILE INCLUDED Vuexy – Vuejs Admin Dashboard Template – is the most
                    developer friendly & highly customisable ...
                  </p>
                </div>
                <div class="card-footer border-top d-flex justify-content-between">
                  <small class="text-truncate">
                    <a href="https://www.uplabs.com/posts/vuesax-vuejs-vuejs-admin-dashboard-template"
                      class="success darken-4" target="_blank">
                      https://www.uplabs.com/posts/vuesax-vuejs-vuejs-admin-dashboard-template
                    </a>
                  </small>
                  <i class="bx bx-dots-vertical-rounded font-medium-2 cursor-pointer"></i>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- Image results -->
        <div class="image-result">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                People also search for
              </h4>
            </div>
            <div class="card-body">
              <div class="row text-center">
                <div class="col-lg-2 col-sm-4 col-6">
                  <div class="suggestion mb-lg-0 mb-1">
                    <a href="https://1.envato.market/apex_admin" target="_blank">
                      <img src="{{asset('images/pages/1-apex.png')}}" alt="Image description" height="40"
                        width="40">
                      <span class="font-small-2 mt-50 d-block">Apex</span>
                    </a>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                  <div class="suggestion mb-lg-0 mb-1">
                    <a href="https://1.envato.market/stack_admin" target="_blank">
                      <img src="{{asset('images/pages/2-stack.png')}}" alt="Image description" height="40"
                        width="40">
                      <span class="font-small-2 mt-50 d-block">Stack</span>
                    </a>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                  <div class="suggestion mb-lg-0 mb-1">
                    <a href="https://1.envato.market/convex_html_admin" target="_blank">
                      <img src="{{asset('images/pages/3-convex.png')}}" alt="Image description" height="40"
                        width="40">
                      <span class="font-small-2 mt-50 d-block">Convex</span>
                    </a>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                  <div class="suggestion mb-lg-0 mb-1">
                    <a href="https://1.envato.market/materialize_admin" target="_blank">
                      <img src="{{asset('images/pages/4-materialize.png')}}" alt="Image description"
                        height="40" width="40">
                      <span class="font-small-2 mt-50 d-block">Materialize</span>
                    </a>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                  <div class="suggestion mb-lg-0 mb-1">
                    <a href="https://1.envato.market/modern_admin" target="_blank">
                      <img src="{{asset('images/pages/modern-thumbnail.png')}}" alt="Image description"
                        height="40" width="40">
                      <span class="font-small-2 mt-50 d-block">Modern</span>
                    </a>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                  <div class="suggestion mb-lg-0 mb-1">
                    <a href="https://1.envato.market/vusax_admin" target="_blank">
                      <img src="{{asset('images/pages/thumbnail.png')}}" alt="Image description" height="40"
                        width="40">
                      <span class="font-small-2 mt-50 d-block">Vuexy</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Related Links -->
        <div class="search-option">
          <div class="row">
            <div class="col-12">
              <h4>Searches related to frest</h4>
            </div>
            <div class="col-md-12 d-flex my-2">
              <ul class="list-unstyled mr-3">
                <li>
                  <h6>
                    <a href="javascript:void(0);">
                      frest admin
                      <strong>clean and minimal admin</strong>
                    </a>
                  </h6>
                </li>
                <li>
                  <h6>
                    <a href="javascript:void(0);">
                      frest admin
                      <strong>dashboard</strong>
                    </a>
                  </h6>
                </li>
                <li>
                  <h6>
                    <a href="javascript:void(0);">
                      frest admin
                      <strong>Template download</strong>
                    </a>
                  </h6>
                </li>
                <li>
                  <h6>
                    <a href="javascript:void(0);">
                      frest example
                      <strong>download</strong>
                    </a>
                  </h6>
                </li>
              </ul>
              <ul class="list-unstyled">
                <li>
                  <h6>
                    <a href="javascript:void(0);">
                      frest admin
                      <strong>dashboard template</strong>
                    </a>
                  </h6>
                </li>
                <li>
                  <h6>
                    <a href="javascript:void(0);">
                      frest vuejs
                      <strong>admin dashboard template</strong>
                    </a>
                  </h6>
                </li>
                <li>
                  <h6>
                    <a href="javascript:void(0);">
                      frest
                      <strong>template</strong>
                    </a>
                  </h6>
                </li>
                <li>
                  <h6>
                    <a href="javascript:void(0);">frest example
                      <strong>tutorial</strong>
                    </a>
                  </h6>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--Pagination -->
        <div class="pagination justify-content-center">
          <div class="search-pagination">
            <ul class="pagination pagination-borderless  mt-2">
              <li class="page-item previous">
                <a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-left"></i>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
              <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
              <li class="page-item next">
                <a class="page-link" href="javascript:void(0);">
                  <i class="bx bx-chevron-right"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--/ Search content area -->
    <!-- Search Sidebar area -->
    <div class="col-lg-4 col-md-5 col-12 order-1 order-md-2">
      <div class="card box-search">
        <div class="card-body">
          <div class="text-center">
            <img class="img-fluid rounded" src="{{asset('images/pages/vuesax-banner.jpg')}}" alt="logo">
          </div>
          <h5 class="mt-1">Vuexy – Vuejs + HTML Admin Dashboard Template</h5>
          <small>Clean Bootstrap 4 Dashboard HTML Template</small>
          <p class="mt-1">
            <i class="bx bx-link-external pr-1 align-middle"></i>
            <a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/landing/" class="align-middle"
              target="_blank">
              View on Themeforest
            </a>
          </p>
          <p class="card-text">
            If you’re a developer looking for an admin dashboard that is made with you in mind,
            look no further than Vuexy. A powerful admin dashboard template built on Vue.js, Vuexy is
            developer-friendly, rich with features and highly customizable.
          </p>
          <div class="row knowledge-panel text-center py-1">
            <div class="col border-right">
              <p class="mb-0">1,367</p>
              <small>Sales</small>
            </div>
            <div class="col border-right">
              <p class="mb-0">74</p>
              <small>Comments</small>
            </div>
            <div class="col d-inline-block">
              <p class="mb-0">5</p>
              <small>Ratings</small>
            </div>
          </div>
          <div class="py-1 knowledge-panel-info">
            <ul class="list-unstyled">
              <li class="pb-25">Bootstrap : <span class="text-bold-500">v4.13 updated</span></li>
              <li class="pb-25">Created : <span class="text-bold-500">Mar 8 2019</span></li>
              <li class="pb-25">Last Update : <span class="text-bold-500">Sep 28 2019</span></li>
              <li class="pb-25">Documentation : <span class="text-bold-500">Well Documented</span></li>
              <li class="pb-25">Layout : <span class="text-bold-500">Responsive</span></li>
            </ul>
          </div>
          <h6>Connect With US</h6>
          <div class="knowledge-panel-suggestion">
            <div class="suggestion d-inline-block text-center mr-2">
              <a href="https://www.facebook.com/pixinvents" target="_blank">
                <i class="bx bxl-facebook-square facebook font-large-1"></i>
                <span class="font-small-2 d-block">Facebook</span>
              </a>
            </div>
            <div class="suggestion d-inline-block text-center mr-2">
              <a href="https://www.linkedin.com/in/pixinvent-creative-studio-561a4713b/" target="_blank">
                <i class="bx bxl-linkedin-square linkedin font-large-1"></i>
                <span class="font-small-2 d-block">Linkedin</span>
              </a>
            </div>
            <div class="suggestion d-inline-block text-center mr-2">
              <a href="https://twitter.com/pixinvents" target="_blank">
                <i class="bx bxl-twitter twitter font-large-1"></i>
                <span class="font-small-2 d-block">Twitter</span>
              </a>
            </div>
            <div class="suggestion d-inline-block text-center">
              <a href="https://www.youtube.com/channel/UClOcB3o1goJ293ri_Hxpklg" target="_blank">
                <i class="bx bxl-youtube youtube font-large-1"></i>
                <span class="font-small-2 d-block">Youtube</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Search Sidebar area -->
  </div>
</section>
<!--/ Search result section -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-search.js')}}"></script>
@endsection
