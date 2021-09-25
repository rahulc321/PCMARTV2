{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
          </ul>
          <ul class="nav navbar-nav bookmark-icons">
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/email')}}" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon bx bx-envelope"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/chat')}}" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon bx bx-chat"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/todo')}}" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon bx bx-check-circle"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/calendar')}}" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon bx bx-calendar-alt"></i></a></li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon bx bx-star warning"></i></a>
              <div class="bookmark-input search-input">
                <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                <input class="form-control input" type="text" placeholder="Explore Frest..." tabindex="0" data-search="template-search">
                <ul class="search-list"></ul>
              </div>
            </li>
          </ul>
        </div>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-language nav-item">
            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              <a class="dropdown-item" href="{{url('lang/en')}}" data-language="en">
                <i class="flag-icon flag-icon-us mr-50"></i> English
              </a>
              <a class="dropdown-item" href="{{url('lang/fr')}}" data-language="fr">
                <i class="flag-icon flag-icon-fr mr-50"></i> French
              </a>
              <a class="dropdown-item" href="{{url('lang/de')}}" data-language="de">
                <i class="flag-icon flag-icon-de mr-50"></i> German
              </a>
              <a class="dropdown-item" href="{{url('lang/pt')}}" data-language="pt">
                <i class="flag-icon flag-icon-pt mr-50"></i> Portuguese
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
          <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
            <div class="search-input">
              <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
              <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1" data-search="template-search">
              <div class="search-input-close"><i class="bx bx-x"></i></div>
              <ul class="search-list"></ul>
            </div>
          </li>
          <li id="cc"  class="dropdown dropdown-notification nav-item"><a onclick="myFunction1();"  class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i   class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">0</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right" style="display: none1">
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">Notification</span><span class="text-bold-400 cursor-pointer"></span></div>
              </li>
              <div class="res">
             
              </div>
              <!-- <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li> -->
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name">{{Auth::user()->name}}</span>
                <span class="user-status text-muted">Available</span>
              </div>
              <span><img class="round" src="{{asset('profile')}}/{{Auth::user()->profile_pic}}" alt="avatar" height="40" width="40"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              <a class="dropdown-item" href="{{url('/app/users/edit')}}">
                <i class="bx bx-user mr-50"></i> Edit Profile
              </a>
             <!--  <a class="dropdown-item" href="{{asset('app/email')}}">
                <i class="bx bx-envelope mr-50"></i> My Inbox
              </a>
              <a class="dropdown-item" href="{{asset('app/todo')}}">
                <i class="bx bx-check-square mr-50"></i> Task</a>
                <a class="dropdown-item" href="{{asset('app/chat')}}"><i class="bx bx-message mr-50"></i> Chats
              </a> -->
              <div class="dropdown-divider mb-0"></div>
              <a class="dropdown-item" href="{{url('/logout1')}}"><i class="bx bx-power-off mr-50"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
 
