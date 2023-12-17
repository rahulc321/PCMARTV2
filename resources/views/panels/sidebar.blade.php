{{-- vertical-menu --}}
@if($configData['mainLayoutType'] == 'vertical-menu')

<?php
$perm = Helper::checkPermission();

?>
<style type="text/css">
  .main-menu .navbar-header .navbar-brand .brand-logo .logo {
    height: 35px !important;
  }
</style>
<div class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
    <li class="nav-item mr-auto">
      <a class="navbar-brand" href="{{url('/dashboard')}}">
      <div class="brand-logo">
        <img src="{{asset('/logo/pcmart-gold.png')}}" class="logo" alt="">
      </div>
      
      </a>
    </li>
        <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
          <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i>
        </a>
        </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
       {{--  @if(!empty($menuData[0]) && isset($menuData[0]))
        @foreach ($menuData[0]->menu as $menu)
            @if(isset($menu->navheader))
                <li class="navigation-header text-truncate"><span>{{$menu->navheader}}</span></li>
            @else
            <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
            <a href="@if(isset($menu->url)){{asset($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
                @if(isset($menu->icon))
                    <i class="menu-livicon" data-icon="{{$menu->icon}}"></i>
                @endif
                @if(isset($menu->name))
                    <span class="menu-title text-truncate">{{ __('locale.'.$menu->name)}}</span>
                @endif
                @if(isset($menu->tag))
                <span class="{{$menu->tagcustom}} ml-auto">{{$menu->tag}}</span>
                @endif
            </a>
            @if(isset($menu->submenu))
                @include('panels.sidebar-submenu',['menu' => $menu->submenu])
            @endif
            </li>
            @endif
        @endforeach
        @endif   --}}


        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">

        <?php $module='dashboard_show'; ?>
        @if(in_array($module,$perm) || Auth::user()->user_type==1)
        <!-- <li class="nav-item has-sub {{ (request()->is('dashboard')) ? 'sidebar-group-active' : '' }} " >
        <a href="{{url('/dashboard')}}">
        <i class="bx bxs-dashboard"></i>
        <span class="menu-title text-truncate">Dashboard</span>
        <span class="badge badge-light-danger badge-pill badge-round float-right mr-50 ml-auto"></span>
        </a>
          <ul class="menu-content" style="display: none">
        <li class="">
        <a href="{{url('/dashboard')}}" class="d-flex align-items-center">
        <i class="bx bxs-home"></i>
        <span class="menu-item text-truncate">Dashboard</span>
        </a>
        </li>
       
        </ul> 
        </li> -->

        <?php 
           if(\Request::route()->getName()=='dashboard-ecommerce'){
            $class="active";
           }else{
            $class="";
           }

        ?>
        <li class="nav-item {{ $class}}">
        <a href="{{url('/dashboard')}}" class="d-flex align-items-center">
        <i class="bx bxs-home"></i>
        <span class="menu-item text-truncate">Dashboard</span>
        </a>
        </li>

        @endif

         <li class="navigation-header text-truncate"><span>Apps</span></li>
          <!-- <li class="nav-item">
            <a href="{{url('/app/users/list')}}">
            <i class="menu-livicon livicon-evo-holder livicon-evo-error" data-icon="envelope-pull"></i>
            <span class="menu-title text-truncate">Permission</span>
            </a>
          </li> -->

          <?php $module='Role_show'; 
          $showPerm="";
          ?>
            @if(in_array($module,$perm) )
            <?php $showPerm=1; ?>
            @endif

            <?php $module='User_show'; ?>
              @if(in_array($module,$perm) )
              <?php $showPerm=1; ?>
            @endif  

          @if($showPerm ==1 )
          <li class="nav-item has-sub {{ (request()->is('app/role/list')) ? 'sidebar-group-active' : '' }}">
            <a href="# ">
            <i class="bx bx-detail"></i>
            <span class="menu-title text-truncate">Permission</span>
            <span class="badge badge-light-danger badge-pill badge-round float-right mr-50 ml-auto"></span>
            </a>
            <ul class="menu-content">
            <?php $module='Role_show'; ?>
            @if(in_array($module,$perm) )
              <li class="nav-item {{ (request()->is('app/role/list')) ? 'active' : '' }}">
              <a href="{{url('/app/role/list')}}">
              <i class="bx bxs-check-shield"></i>
              <span class="menu-title text-truncate">Roles</span>
              </a>
              </li>
            @endif  
              <?php $module='User_show'; ?>
              @if(in_array($module,$perm) )
              <li class="nav-item {{ (request()->is('app/users/list')) ? 'active' : '' }}">
              <a href="{{url('/app/users/list')}}">
              <i class="bx bxs-user-detail"></i>
              <span class="menu-title text-truncate">Users</span>
              </a>
            </li>
            @endif

          </ul> 
          </li>
          @endif

          <?php $module='setting_show'; 
          $showPerm="";
          ?>
            @if(in_array($module,$perm) )
            <?php $showPerm=1; ?>
            @endif

            <?php $module='web_info'; ?>
              @if(in_array($module,$perm) )
              <?php $showPerm=1; ?>
            @endif

          @if($showPerm ==1 )
          <li class="nav-item has-sub {{ (request()->is('app/settings/list')) ? 'sidebar-group-active' : '' }}">
            <a href="# ">
             
             <i class="bx bx-category"></i>
            <span class="menu-title text-truncate">Settings</span>
            <span class="badge badge-light-danger badge-pill badge-round float-right mr-50 ml-auto"></span>
            </a>
            <ul class="menu-content">
            <?php $module='setting_show'; ?>
              @if(in_array($module,$perm) )
              <li class="nav-item {{ (request()->is('app/settings/list')) ? 'active' : '' }}">
              <a href="{{url('/app/settings/list')}}">
              <i class="bx bx-cart"></i>
              <span class="menu-title text-truncate">Support</span>
              </a>
            </li>
            @endif
            <?php $module='subscription_show'; ?>
              @if(in_array($module,$perm) )
              <li class="nav-item {{ (request()->is('app/subscription/list')) ? 'active' : '' }}">
              <a href="{{url('/app/subscription/list')}}">
              <i class="bx bx-message-square-detail"></i>
              <span class="menu-title text-truncate">Subscription</span>
              </a>
            </li>
            @endif 
            <?php $module='training_set_show'; ?>
              @if(in_array($module,$perm))
              <li class="nav-item {{ (request()->is('app/trainingSetting')) ? 'active' : '' }}">
              <a href="{{url('/app/trainingSetting')}}">
              <i class="bx bx-message-square-detail"></i>
              <span class="menu-title text-truncate">Training</span>
              </a>
            </li>
            @endif

            <?php $module='trainer_show'; ?>
              @if(in_array($module,$perm))
              <li class="nav-item {{ (request()->is('app/trainer')) ? 'active' : '' }}">
              <a href="{{url('/app/trainer')}}">
              <i class="bx bx-user"></i>
              <span class="menu-title text-truncate">Trainer</span>
              </a>
            </li>
            @endif

              <?php $module='web_info'; ?>
              @if(in_array($module,$perm) )
              <li class="nav-item {{ (request()->is('app/info')) ? 'active' : '' }}">
              <a href="{{url('/app/info')}}">
              <i class="bx bx-info-circle"></i>
              <span class="menu-title text-truncate">Company Info </span>
              </a>
            </li>
            @endif
            <?php $module='convert_date'; ?>
              @if(in_array($module,$perm) )
          <li class="nav-item {{ (request()->is('app/convert-date')) ? '' : '' }}" style="display: none">
            <a href="{{url('/app/convert-date')}}">
            <i class="bx bx-calendar-alt"></i>
            <span class="menu-title text-truncate">Convert Date Format</span>
            </a>
          </li>

          <li class="nav-item {{ (request()->is('app/copyCompanyname')) ? '' : '' }}" style="display: none">
            <a href="{{url('/app/copyCompanyname')}}">
            <i class="bx bx-copy"></i>
            <span class="menu-title text-truncate">Copy Companyname</span>
            </a>
          </li>
          @endif
          <?php $module='Category_show'; ?>
              @if(in_array($module,$perm))
          <li class="nav-item {{ (request()->is('app/category')) ? 'active' : '' }}">
            <a href="{{url('/app/category')}}">
            <i class="bx bx-copy"></i>
            <span class="menu-title text-truncate">Category</span>
            </a>
          </li>
          @endif
          </ul> 
          </li>
          
          @endif


          <li class="nav-item {{ (request()->is('app/prospect')) ? 'active' : '' }}">
            <a href="{{route('prospect.index')}}">
           <!--  <i class="menu-livicon livicon-evo-holder livicon-evo-error" data-icon="envelope-pull"></i> -->
            <i class="bx bx-category"></i>
            <span class="menu-title text-truncate">Prospect Management</span>
            </a>
          </li>




           

          <?php $module='upload_show'; ?>
              @if(in_array($module,$perm) )
           <li class="nav-item {{ (request()->is('app/uploads')) ? 'active' : '' }}">
            <a href="{{url('/app/uploads')}}">
           <!--  <i class="menu-livicon livicon-evo-holder livicon-evo-error" data-icon="envelope-pull"></i> -->
            <i class="bx bx-upload"></i>
            <span class="menu-title text-truncate">Upload</span>
            </a>
          </li>
          @endif
          <?php $module='customer_show'; ?>
              @if(in_array($module,$perm) )
          <li class="nav-item {{ (request()->is('app/customer')) ? 'active' : '' }}">
            <a href="{{url('/app/customer')}}">
            <i class="bx bxs-user-detail"></i>
            <span class="menu-title text-truncate">Customers</span>
            </a>
          </li>
          @endif

          <?php $module='customer_subscription_show'; ?>
          @if(in_array($module,$perm))
            <li class="nav-item {{ (request()->is('app/customer-subscription-list')) ? 'active' : '' }}">
              <a href="{{url('/app/customer-subscription-list')}}">
              <i class="bx bxs-user-detail"></i>
              <span class="menu-title text-truncate">Subscription</span>
              </a>
            </li>
          @endif

          <?php $module='training_show'; ?>
          @if(in_array($module,$perm))
            <li class="nav-item {{ (request()->is('app/training')) ? 'active' : '' }}">
              <a href="{{url('/app/training')}}">
              <i class="bx bxs-user-detail"></i>
              <span class="menu-title text-truncate">Training</span>
              </a>
            </li>
          @endif
          <?php $module='schedule_show'; ?>
          @if(in_array($module,$perm))
          <li class="nav-item {{ (request()->is('app/scheduling')) ? 'active' : '' }}">
            <a href="{{url('/app/scheduling')}}">
            <i class="bx bx-calendar-event"></i>
            <span class="menu-title text-truncate">Scheduling</span>
            </a>
          </li>
          @endif

          <?php $module='contract_show'; ?>
              @if(in_array($module,$perm) )
          <li class="nav-item {{ (request()->is('app/service-contract')) ? 'active' : '' }}">
            <a href="{{url('/app/service-contract')}}">
            <i class="bx bxs-receipt"></i>
            <span class="menu-title text-truncate">Service Contract</span>
            </a>
          </li>
          @endif
          <?php $module='tickect_show'; ?>
              @if(in_array($module,$perm) )
          <li class="nav-item {{ (request()->is('app/ticket')) ? 'active' : '' }}">
            <a href="{{url('/app/ticket')}}">
            <i class="bx bxs-purchase-tag"></i>
            <span class="menu-title text-truncate">Ticketing</span>
            </a>
          </li>
          @endif
          <?php $module='email_marketing_show'; ?>
              @if(in_array($module,$perm) || in_array('Subscription_show',$perm))
         <!--  <li class="nav-item {{ (request()->is('app/email-marketing')) ? '' : '' }}">
            <a href="{{url('/app/email-marketing')}}">
            <i class="bx bx-mail-send"></i>
            <span class="menu-title text-truncate">Email Marketing</span>
            </a>
          </li>


          <li class="nav-item {{ (request()->is('app/subs-email-marketing')) ? '' : '' }}">
            <a href="{{url('/app/subs-email-marketing')}}">
            <i class="bx bx-mail-send"></i>
            <span class="menu-title text-truncate">Subscription Email</span>
            </a>
          </li> -->


          <li class="nav-item">
            <a href="# ">
             
             <i class="bx bx-mail-send"></i>
            <span class="menu-title text-truncate">Email Marketing</span>
            <span class="badge badge-light-danger badge-pill badge-round float-right mr-50 ml-auto"></span>
            </a>
            <ul class="menu-content" >
              @if(in_array($module,$perm))
              <li class="nav-item {{ (request()->is('app/email-marketing')) ? 'active' : '' }}">
              <a href="{{url('/app/email-marketing')}}">
              <i class="bx bx-mail-send"></i>
              <span class="menu-title text-truncate">Support</span>
              </a>
              </li>

              @endif
              @if(in_array('Subscription_show',$perm))
              <li class="nav-item {{ (request()->is('app/subs-email-marketing')) ? 'active' : '' }}">
            <a href="{{url('/app/subs-email-marketing')}}">
            <i class="bx bx-mail-send"></i>
            <span class="menu-title text-truncate">Subscription</span>
            </a>
          </li>
          @endif
           
          </ul> 
          </li>




          @endif
          

          
          
    </ul>


  </div>
</div>
@endif
{{-- horizontal-menu --}}
@if($configData['mainLayoutType'] == 'horizontal-menu')
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-light navbar-without-dd-arrow
@if($configData['navbarType'] === 'navbar-static') {{'navbar-sticky'}} @endif" role="navigation" data-menu="menu-wrapper">
  <div class="navbar-header d-xl-none d-block">
      <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
          <a class="navbar-brand" href="{{asset('/')}}">
          <div class="brand-logo">
            <img src="{{asset('images/logo/logo.svg')}}" class="logo" alt="">
          </div>
          <h2 class="brand-text mb-0">
            @if(!empty($configData['templateTitle']) && isset($configData['templateTitle']))
            {{$configData['templateTitle']}}
            @else
            Frest
            @endif
          </h2>
          </a>
      </li>
      <li class="nav-item nav-toggle">
          <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
          </a>
      </li>
      </ul>
  </div>
  <div class="shadow-bottom"></div>
  <!-- Horizontal menu content-->
  <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="filled">
      @if(!empty($menuData[1]) && isset($menuData[1]))
          @foreach ($menuData[1]->menu as $menu)
          <li class="@if(isset($menu->submenu)){{'dropdown'}} @endif nav-item" data-menu="dropdown">
          <a class="@if(isset($menu->submenu)){{'dropdown-toggle'}} @endif nav-link" href="{{asset($menu->url)}}"
            @if(isset($menu->submenu)){{'data-toggle=dropdown'}} @endif @if(isset($menu->newTab)){{"target=_blank"}}@endif>
              <i class="menu-livicon" data-icon="{{$menu->icon}}"></i>
              <span>{{ __('locale.'.$menu->name)}}</span>
          </a>
          @if(isset($menu->submenu))
              @include('panels.sidebar-submenu',['menu'=>$menu->submenu])
          @endif
          </li>
          @endforeach
      @endif
      </ul>
  </div>
  <!-- /horizontal menu content-->
  </div>
@endif

{{-- vertical-box-menu --}}
@if($configData['mainLayoutType'] == 'vertical-menu-boxicons')
<div class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
    <li class="nav-item mr-auto">
      <a class="navbar-brand" href="{{asset('/')}}">
        <div class="brand-logo">
          <img src="{{asset('images/logo/logo.svg')}}" class="logo" alt="">
        </div>
        <h2 class="brand-text mb-0">
          @if(!empty($configData['templateTitle']) && isset($configData['templateTitle']))
          {{$configData['templateTitle']}}
          @else
          Frest
          @endif
        </h2>
      </a>
    </li>
    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
      @if(!empty($menuData[2]) && isset($menuData[2]))
      @foreach ($menuData[2]->menu as $menu)
          @if(isset($menu->navheader))
              <li class="navigation-header text-truncate"><span>{{$menu->navheader}}</span></li>
          @else
          <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
            <a href="@if(isset($menu->url)){{asset($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
            @if(isset($menu->icon))
              <i class="{{$menu->icon}}"></i>
            @endif
            @if(isset($menu->name))
              <span class="menu-title text-truncate">{{ __('locale.'.$menu->name)}}</span>
            @endif
            @if(isset($menu->tag))
              <span class="{{$menu->tagcustom}} ml-auto">{{$menu->tag}}</span>
            @endif
           </a>
          @if(isset($menu->submenu))
            @include('panels.sidebar-submenu',['menu' => $menu->submenu])
          @endif
          </li>
          @endif
      @endforeach
      @endif
  </ul>
  </div>
</div>
@endif
