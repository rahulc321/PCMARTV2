@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Navbar')

@section('content')
<!-- Basic Navbar Starts -->
<section class="navbar-components-wrapper">
  <section id="basic-navbar">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Basic Navbar</h4>
          </div>
          <div class="card-body">
            <p class="mb-1">
              Navbars can utilize <code>.navbar-toggler</code>, <code>.navbar-collapse</code>, and
              <code>.navbar-expand{-sm|-md|-lg|-xl}</code> classes to change when their content collapses behind a
              button. In combination with other utilities, you can easily choose when to show or hide particular
              elements.
            </p>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-demo">
              <div class="navbar-wrapper">
                <div class="navbar-container content pl-lg-1">
                  <div class="navbar-collapse" id="navbar-mobile-1">
                    <ul class="nav navbar-nav bookmark-icons mr-auto float-left">
                      <li class="nav-item mobile-menu d-xl-none">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle mt-75 mt-lg-0"
                          href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Todo">
                          <i class="ficon bx bx-check-square"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Chat">
                          <i class="ficon bx bx-message-square"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Email">
                          <i class="ficon bx bx-mail-send"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Calendar">
                          <i class="ficon bx bx-calendar"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link">
                          <i class="ficon bx bx-star warning"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link">
                          <i class="ficon bx bx-fullscreen"></i>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                      <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag-2" href="javascript:void(0);"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="flag-icon flag-icon-us mr-50"></i>
                          <span class="selected-language">English</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="flag-icon flag-icon-us mr-50"></i>
                            <span>English</span>
                          </a>
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="flag-icon flag-icon-fr mr-50"></i>
                            <span> French</span>
                          </a>
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="flag-icon flag-icon-cn mr-50"></i>
                            <span> Chinese</span>
                          </a>
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="flag-icon flag-icon-de mr-50"></i>
                            <span> German</span>
                          </a>
                        </div>
                      </li>
                      <li class="nav-item nav-search">
                        <a class="nav-link nav-link-search">
                          <i class="ficon bx bx-search"></i>
                        </a>
                      </li>
                      <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="javascript:void(0);" data-toggle="dropdown">
                          <i class="ficon bx bx-bell"></i>
                          <span class="badge badge-pill badge-danger badge-up">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                          <li class="dropdown-menu-header">
                            <div class="dropdown-header m-0 px-1 py-75 d-flex justify-content-between">
                              <span class="white">5 New</span>
                              <span class="grey darken-2">App Notifications</span>
                            </div>
                          </li>
                          <li class="scrollable-container media-list ps">
                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                <div class="mr-1">
                                  <i class="bx bxs-plus-square font-medium-5 primary mr-50"></i>
                                </div>
                                <div class="media-body">
                                  <h6 class="primary media-heading">You have new order!</h6>
                                  <small class="notification-text">Are your going to meet me tonight?</small>
                                </div>
                                <small>
                                  <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time>
                                </small>
                              </div>
                            </a>
                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                <div class="mr-1">
                                  <i class="bx bx-cloud-download font-medium-5 success mr-50"></i>
                                </div>
                                <div class="media-body">
                                  <h6 class="success media-heading red darken-1">99% Server load</h6>
                                  <small class="notification-text">You got new order of goods.</small>
                                </div>
                                <small>
                                  <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time>
                                </small>
                              </div>
                            </a>
                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                <div class="mr-1">
                                  <i class="bx bx-error font-medium-5 danger mr-50"></i>
                                </div>
                                <div class="media-body">
                                  <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6>
                                  <small class="notification-text">Server have 99% CPU usage.</small>
                                </div>
                                <small>
                                  <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time>
                                </small>
                              </div>
                            </a>
                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                <div class="mr-1">
                                  <i class="bx bx-check-circle font-medium-5 info mr-50"></i>
                                </div>
                                <div class="media-body">
                                  <h6 class="info media-heading">Complete the task</h6>
                                  <small class="notification-text">Cake sesame snaps cupcake</small>
                                </div>
                                <small>
                                  <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                                </small>
                              </div>
                            </a>
                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                <div class="mr-1">
                                  <i class="bx bx-file font-medium-5 warning mr-50"></i>
                                </div>
                                <div class="media-body">
                                  <h6 class="warning media-heading">Generate monthly report</h6>
                                  <small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                </div>
                                <small>
                                  <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                                </small>
                              </div>
                            </a>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                          </li>
                          <li class="dropdown-menu-footer">
                            <a class="dropdown-item p-1 text-center" href="javascript:void(0)">
                              Read all notifications
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);"
                          data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                            <span class="user-name text-bold-600">John Doe</span>
                            <span class="user-status">Available</span>
                          </div>
                          <span>
                            <img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar"
                              height="40" width="40">
                          </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="bx bx-user mr-50"></i>
                            <span>Edit Profile </span>
                          </a>
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="bx bx-envelope mr-50"></i>
                            <span> My Inbox</span>
                          </a>
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="bx bx-check-square mr-50"></i>
                            <span> Task</span>
                          </a>
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="bx bx-message mr-50"></i>
                            <span> Chats</span>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="javascript:void(0);">
                            <i class="bx bx-power-off mr-50"></i>
                            <span> Logout</span>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Basic Navbar Ends -->

  <!-- Navbar Themes Starts -->
  <section id="navbar-theme" class="navbar-theme">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Navbar Themes</h4>
          </div>
          <div class="card-body">
            <p class="mb-1">
              To create a navbar with different background color options, use <code>.bg-{color}</code> along with
              <code>.navbar</code>.
            </p>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu bg-primary navbar-dark
            mb-2">
              <div class="navbar-wrapper">
                <div class="navbar-container content">
                  <div class="navbar-collapse" id="navbar-mobile-2">
                    <ul class="nav navbar-nav left-menu mr-auto float-left">
                      <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle is-active" href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link navbar-brand" href="javascript:void(0);">
                          <span>Navbar</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Primary Color</span>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav right-menu float-right">
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-home d-sm-none d-block"></i>
                          <span class="selected-language d-none d-sm-block">Home</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-edit d-sm-none d-block"></i>
                          <span class="d-none d-sm-block">About</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">
                          <i class="bx bx-link d-sm-none d-block"></i>
                          <span class="d-none d-sm-block">Contact</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-group d-sm-none d-block"></i>
                          <span class="d-none d-sm-block">User</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu bg-secondary navbar-dark mb-2">
              <div class="navbar-wrapper">
                <div class="navbar-container content">
                  <div class="navbar-collapse" id="navbar-mobile-3">
                    <ul class="nav navbar-nav left-menu mr-auto float-left">
                      <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle is-active" href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link navbar-brand" href="javascript:void(0);">
                          <span>Navbar</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Menu</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Link</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Link</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link disabled">
                          <span> Disabled </span>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav float-right right-menu align-items-center">
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Default Color</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link py-0" href="javascript:void(0);">
                          <div class="btn btn-icon btn-sm btn-primary glow">
                            <span class="d-none d-sm-block">Download</span>
                            <i class="d-sm-none d-block bx bx-cloud-download"></i>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu bg-success navbar-dark mb-2">
              <div class="navbar-wrapper">
                <div class="navbar-container content">
                  <div class="navbar-collapse" id="navbar-mobile-6">
                    <ul class="nav navbar-nav left-menu mr-auto float-left">
                      <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle is-active" href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link navbar-brand" href="javascript:void(0);">
                          <span>Navbar</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Success Color</span>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav right-menu float-right">
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-home d-inline-block"></i>
                          <span class="d-none d-sm-inline-block">Home</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-edit-alt d-inline-block"></i>
                          <span class="d-none d-sm-inline-block">About</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-user d-inline-block"></i>
                          <span class="d-sm-inline-block d-none">Profile</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-cloud-download d-inline-block"></i>
                          <span class="d-sm-inline-block d-none">Download</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu bg-danger navbar-dark mb-2">
              <div class="navbar-wrapper">
                <div class="navbar-container">
                  <div class="navbar-collapse" id="navbar-mobile-5">
                    <ul class="nav navbar-nav left-menu mr-auto float-left">
                      <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle is-active" href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link navbar-brand" href="javascript:void(0);">
                          <span>Navbar</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Danger Color</span>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav right-menu float-right">
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-cloud-download font-medium-3"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-mail-send font-medium-3"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-headphone font-medium-3"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-bell font-medium-3"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-aperture font-medium-3"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu bg-warning navbar-dark mb-2">
              <div class="navbar-wrapper">
                <div class="navbar-container content">
                  <div class="navbar-collapse" id="navbar-mobile-7">
                    <ul class="nav navbar-nav left-menu mr-auto float-left">
                      <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle is-active" href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link navbar-brand" href="javascript:void(0);">
                          <span>Navbar</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Warning Color</span>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav right-menu float-right">
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bxl-github"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bxl-instagram"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bxl-facebook"> </i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bxl-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu bg-info navbar-dark mb-2">
              <div class="navbar-wrapper">
                <div class="navbar-container content">
                  <div class="navbar-collapse" id="navbar-mobile-4">
                    <ul class="nav navbar-nav left-menu mr-auto float-left">
                      <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle is-active" href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link navbar-brand" href="javascript:void(0);">
                          <span>Navbar</span>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);">
                          <span>Info Color</span>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav right-menu float-right">
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-align-middle d-sm-none d-block"></i>
                          <span class="d-sm-block d-none">Menu</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-link d-block d-sm-none"></i>
                          <span class="d-sm-block d-none">Link</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                          <i class="bx bx-download d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Download</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Navbar Themes Ends -->

  <!-- Navbar Collapsed Starts -->
  <section id="navbar-collapsed">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Collapsed Navbar
            </h4>
          </div>
          <div class="card-body">
            <nav class="navbar navbar-dark bg-dark pl-2">
              <button class="navbar-toggler ml-50" type="button" data-toggle="collapse"
                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </nav>
            <div class="collapse" id="navbarToggleExternalContent">
              <div class="bg-dark p-1 pl-75">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link text-white active" href="javascript:void(0);">Active</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="javascript:void(0);">Link</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="javascript:void(0);">Link</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="javascript:void(0);" tabindex="-1"
                      aria-disabled="true">Disabled</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Navbar Collapse Ends -->

  <!-- Navbar Placement Starts -->
  <section id="navbar-placement">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Placement</h4>
          </div>
          <div class="card-body">
            <p class="mb-2">
              Use our position utilities to place navbars in non-static positions. Choose from fixed to the top, fixed
              to the bottom, or stickied to the top (scrolls with the page until it reaches the top, then stays
              there).for fixed top use <code>.fixed-top</code>, fixed bottom use <code>.fixed-footer</code>,sticky top
              use <code>.sticky-top</code>
            </p>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-dark bg-primary">
              <div class="navbar-wrapper">
                <div class="navbar-container content pl-lg-1">
                  <div class="navbar-collapse" id="navbar-mobile-8">
                    <ul class="nav navbar-nav bookmark-icons mr-auto float-left">
                      <li class="nav-item mobile-menu d-xl-none">
                        <a class="nav-link nav-menu-main hidden-xs menu-toggle mt-75 mt-lg-0"
                          href="javascript:void(0);">
                          <i class="ficon bx bx-menu"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Todo">
                          <i class="ficon bx bx-check-square"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Chat">
                          <i class="ficon bx bx-message-square"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Email">
                          <i class="ficon bx bx-mail-send"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                          title="Calendar">
                          <i class="ficon bx bx-calendar"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link">
                          <i class="ficon bx bx-star"></i>
                        </a>
                      </li>
                      <li class="nav-item d-none d-lg-block">
                        <a class="nav-link">
                          <i class="ficon bx bx-fullscreen"></i>
                        </a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                      <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag-3" href="javascript:void(0);"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="flag-icon flag-icon-us mr-50"></i>
                          <span class="selected-language">English</span>
                        </a>
                      </li>
                      <li class="nav-item nav-search">
                        <a class="nav-link nav-link-search">
                          <i class="ficon bx bx-search"></i>
                        </a>
                      </li>
                      <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="javascript:void(0);" data-toggle="dropdown">
                          <i class="ficon bx bx-bell"></i>
                          <span class="badge badge-pill badge-danger badge-up">5</span>
                        </a>
                      </li>
                      <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);"
                          data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                            <span class="user-name text-bold-600">John Doe</span>
                            <span class="user-status">Available</span>
                          </div>
                          <span>
                            <img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar"
                              height="40" width="40">
                          </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Navbar Placement Ends -->
</section>
@endsection
