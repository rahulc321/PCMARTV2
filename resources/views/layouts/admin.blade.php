<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{Request::root()}}/images/favicon.ico">

    <title>@yield('title')</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{Request::root()}}/src/css/vendors_css.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/morris.js/morris.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/OwlCarousel2/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/OwlCarousel2/dist/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/horizontal-timeline/css/horizontal-timeline.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/flexslider/flexslider.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/prism/prism.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/datatable/datatables.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/gallery/css/animated-masonry-gallery.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/lightbox-master/dist/ekko-lightbox.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-markdown-master/css/bootstrap-markdown.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/dropzone/dropzone.css">
	  
	<!-- Style-->    
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/raty-master/lib/jquery.raty.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/ion-rangeSlider/css/ion.rangeSlider.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/ion-rangeSlider/css/ion.rangeSlider.skinModern.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/gridstack/gridstack.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/nestable/nestable.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/bootstrap-switch/switch.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/c3/c3.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/chartist-js-develop/chartist.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_plugins/bootstrap-slider/slider.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_plugins/iCheck/all.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_plugins/pace/pace.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/fullcalendar/fullcalendar.print.min.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/weather-icons/weather-icons.css">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/weather-icons/weathericons-regular-webfont.eot">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/weather-icons/weathericons-regular-webfont.eot?#iefix">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/weather-icons/weathericons-regular-webfont.woff">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/weather-icons/weathericons-regular-webfont.ttf">
	<link rel="stylesheet" href="{{Request::root()}}/assets/vendor_components/weather-icons/weathericons-regular-webfont.svg#weathericons-regular-webfontRg">






















	 
	<link rel="stylesheet" href="{{Request::root()}}/src/css/horizontal-menu.css"> 
	<link rel="stylesheet" href="{{Request::root()}}/src/css/style.css">
	<link rel="stylesheet" href="{{Request::root()}}/src/css/skin_color.css">
     
  </head>

<body class="layout-top-nav light-skin theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
  <header class="main-header">
	  <div class="inside-header">
		<div class="d-flex align-items-center logo-box justify-content-start">
			<!-- Logo -->
			<a href="index.html" class="logo">
			  <!-- logo-->
			  <div class="logo-mini w-30">
				  <span class="light-logo"><img src="{{Request::root()}}/images/logo-letter.png" alt="logo"></span>
				  <span class="dark-logo"><img src="{{Request::root()}}/images/logo-letter-white.png" alt="logo"></span>
			  </div>
			  <div class="logo-lg">
				  <span class="light-logo"><img src="{{Request::root()}}/images/logo-dark-text.png" alt="logo"></span>
				  <span class="dark-logo"><img src="{{Request::root()}}/images/logo-light-text.png" alt="logo"></span>
			  </div>
			</a>	
		</div>  
		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top">
		  <!-- Sidebar toggle button-->
		  <div class="app-menu">
			<ul class="header-megamenu nav">
				<li class="btn-group d-lg-inline-flex d-none">
					<div class="app-menu">
						<div class="search-bx mx-5">
							<form>
								<div class="input-group">
								  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
								  <div class="input-group-append">
									<button class="btn" type="submit" id="button-addon3"><i class="icon-Search"><span class="path1"></span><span class="path2"></span></i></button>
								  </div>
								</div>
							</form>
						</div>
					</div>
				</li>
			</ul> 
		  </div>

		  <div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">
				<li class="dropdown notifications-menu btn-group nav-item">
					<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
						<i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
						<div class="pulse-wave"></div>
					</a>
					<ul class="dropdown-menu animated bounceIn">
					  <li class="header">
						<div class="p-20">
							<div class="flexbox">
								<div>
									<h4 class="mb-0 mt-0">Notifications</h4>
								</div>
								<div>
									<a href="#" class="text-danger">Clear All</a>
								</div>
							</div>
						</div>
					  </li>
					  <li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu sm-scrol">
						  <li>
							<a href="#">
							  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
							</a>
						  </li>
						</ul>
					  </li>
					  <li class="footer">
						  <a href="#">View all</a>
					  </li>
					</ul>
				</li>
				<li class="btn-group nav-item">
					<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="" data-bs-toggle="modal" data-bs-target="#quick_actions_toggle">
						<i class="icon-Layout-arrange"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>
				<li class="btn-group nav-item d-xl-inline-flex d-none">
					<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="" data-bs-toggle="modal" data-bs-target="#quick_panel_toggle">
						<i class="icon-Notification"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>
				<li class="btn-group nav-item d-xl-inline-flex d-none">
					<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="" data-bs-toggle="modal" data-bs-target="#quick_shop_toggle">
						<i class="icon-Cart1"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>
				<li class="btn-group nav-item d-xl-inline-flex d-none">
					<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="" id="live-chat">
						<i class="icon-Chat"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>

				<li class="btn-group">
					<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon dropdown-toggle" data-bs-toggle="dropdown">
						<img class="rounded" src="{{Request::root()}}/images/svg-icon/usa.svg" alt="">
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="{{Request::root()}}/images/svg-icon/usa.svg" alt=""> English</a>
						<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="{{Request::root()}}/images/svg-icon/spain.svg" alt=""> Spanish</a>
						<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="{{Request::root()}}/images/svg-icon/ger.svg" alt=""> German</a>
						<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="{{Request::root()}}/images/svg-icon/jap.svg" alt=""> Japanese</a>
						<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="{{Request::root()}}/images/svg-icon/fra.svg" alt=""> French</a>
					</div>
				</li>

				<li class="btn-group nav-item d-xl-inline-flex d-none">
					<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
						<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>

				<li class="btn-group nav-item">
				<a href="{{url('/logout1')}}" class="waves-effect waves-light nav-link bg-primary btn-primary w-auto fs-14" onclick="return confirm('Are you sure, you want to logout?')" title="Full Screen">
					Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
			    </a>
			</li>

			</ul>
		  </div>
		</nav>
	  </div>
  </header>
  <nav class="main-nav" role="navigation">

    <!-- Mobile menu toggle button (hamburger/x icon) -->
    <input id="main-menu-state" type="checkbox" />
    <label class="main-menu-btn" for="main-menu-state">
    <span class="main-menu-btn-icon"></span> Toggle main menu visibility
    </label>

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue"> 
    <li><a href="{{url('/dashboard')}}"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>
    <li><a href="reports.html"><i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>Reports</a></li>
    <li><a href="expenses.html"><i class="icon-Wallet"><span class="path1"></span><span class="path2"></span></i>Expenses</a></li>  
    <li><a href="extra_app_ticket.html"><i class="icon-User"><span class="path1"></span><span class="path2"></span></i>Support</a></li>
    <li><a href="contact_app_chat.html"><i class="icon-Chat2"></i>Chat</a></li>
    <li><a href="contact_userlist_grid.html"><i class="icon-Add-user"><span class="path1"></span><span class="path2"></span></i>Contacts</a></li>
    <li><a href="#"><i class="icon-Air-ballon"><span class="path1"></span><span class="path2"></span></i>Apps</a>
      <ul> 
        <li><a href="extra_calendar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Calendar</a></li>
        <li><a href="contact_app.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Contact List</a></li>       
        <li><a href="extra_taskboard.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Todo</a></li>
        <li><a href="mailbox.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Mailbox</a></li>
      </ul>
    </li>
    <li><a href="#"><i class="icon-Globe"><span class="path1"></span><span class="path2"></span></i>Widgets</a>
      <ul>
      <li><a href="widgets_blog.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Blog</a></li>
            <li><a href="widgets_chart.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chart</a></li>
            <li><a href="widgets_list.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a></li>
            <li><a href="widgets_social.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Social</a></li>
            <li><a href="widgets_statistic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Statistic</a></li>
            <li><a href="widgets_weather.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Weather</a></li>
            <li><a href="widgets.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Widgets</a></li>        
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Modals</a>
        <ul>
        <li><a href="component_modals.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Modals</a></li>
        <li><a href="component_sweatalert.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sweet Alert</a></li>
        <li><a href="component_notification.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Toastr</a></li>
        </ul>       
      </li>  
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maps</a>
        <ul>
        <li><a href="map_google.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Google Map</a></li>
              <li><a href="map_vector.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Vector Map</a></li>
        </ul>       
      </li>
      </ul>
    </li>
    <li><a href="#"><i class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></i>Login &amp; Error</a>
      <ul>
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Authentication</a>
        <ul>
        <li><a href="auth_login.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Login</a></li>
        <li><a href="auth_register.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Register</a></li>
        <li><a href="auth_lockscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lockscreen</a></li>
        <li><a href="auth_user_pass.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Recover password</a></li>  
        </ul>       
      </li>
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Miscellaneous</a>
        <ul>
        <li><a href="error_404.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 404</a></li>
        <li><a href="error_500.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 500</a></li>
        <li><a href="error_maintenance.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maintenance</a></li>
        </ul>       
      </li>
      </ul>     
    </li>
    <li><a href="#"><i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>UI</a>      
      <ul>
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Utilities</a>
        <ul>
        <li><a href="ui_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Grid System</a></li>
        <li><a href="ui_badges.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Badges</a></li>
        <li><a href="ui_border_utilities.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Border</a></li>
        <li><a href="ui_buttons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Buttons</a></li> 
        <li><a href="ui_color_utilities.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Color</a></li>
        <li><a href="ui_dropdown.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropdown</a></li>
        <li><a href="ui_dropdown_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropdown Grid</a></li>
        <li><a href="ui_progress_bars.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Progress Bars</a></li>
        <li><a href="ui_ribbons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ribbons</a></li>
        <li><a href="ui_sliders.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sliders</a></li>
        <li><a href="ui_typography.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Typography</a></li>
        <li><a href="ui_tab.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tabs</a></li>
        <li><a href="ui_timeline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Timeline</a></li>
        <li><a href="ui_timeline_horizontal.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Horizontal Timeline</a></li>
        </ul>       
      </li>
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card</a>
        <ul>
        <li><a href="box_cards.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>User Card</a></li>
        <li><a href="box_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Advanced Card</a></li>
        <li><a href="box_basic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Basic Card</a></li>
        <li><a href="box_color.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card Color</a></li>
        <li><a href="box_group.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card Group</a></li>
        </ul>       
      </li>     
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Icons</a>
        <ul>
        <li><a href="icons_fontawesome.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Font Awesome</a></li>
        <li><a href="icons_glyphicons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Glyphicons</a></li>
        <li><a href="icons_material.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Material Icons</a></li>  
        <li><a href="icons_themify.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Themify Icons</a></li>
        <li><a href="icons_simpleline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Simple Line Icons</a></li>
        <li><a href="icons_cryptocoins.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Cryptocoins Icons</a></li>
        <li><a href="icons_flag.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flag Icons</a></li>
        <li><a href="icons_weather.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Weather Icons</a></li>
        </ul>       
      </li>   
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Components</a>
        <ul>
        <li><a href="component_bootstrap_switch.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bootstrap Switch</a></li>
        <li><a href="component_date_paginator.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Date Paginator</a></li>
        <li><a href="component_media_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Advanced Medias</a></li>
        <li><a href="component_rangeslider.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Range Slider</a></li>
        <li><a href="component_rating.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ratings</a></li>
        <li><a href="component_animations.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Animations</a></li>
        <li><a href="extension_fullscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Fullscreen</a></li>
        <li><a href="extension_pace.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pace</a></li>
        <li><a href="component_nestable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nestable</a></li>
        <li><a href="component_portlet_draggable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Draggable Portlets</a></li>
        </ul>       
      </li>
      </ul>     
    </li>
    <li><a href="#"><i class="icon-Box2"><span class="path1"></span><span class="path2"></span></i>Forms & Table</a>
      <ul>
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Forms</a>        
        <ul>
        <li><a href="forms_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Elements</a></li>
        <li><a href="forms_general.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Layout</a></li>
        <li><a href="forms_wizard.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Wizard</a></li> 
        <li><a href="forms_validation.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Validation</a></li>
        <li><a href="forms_mask.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Formatter</a></li>
        <li><a href="forms_xeditable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Xeditable Editor</a></li>
        <li><a href="forms_dropzone.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropzone</a></li>
        <li><a href="forms_code_editor.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Code Editor</a></li>
        <li><a href="forms_editors.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editor</a></li>
        <li><a href="forms_editor_markdown.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Markdown</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tables</a>       
        <ul>
        <li><a href="tables_simple.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Simple tables</a></li>
        <li><a href="tables_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data tables</a></li>
        <li><a href="tables_editable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editable Tables</a></li>
        <li><a href="tables_color.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Table Color</a></li>
        </ul>
      </li>     
      </ul>       
    </li>
    <li><a href="#"><i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>Charts</a>
      <ul>
      <li><a href="charts_chartjs.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ChartJS</a></li>
      <li><a href="charts_flot.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flot</a></li>
      <li><a href="charts_inline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Inline charts</a></li>
      <li><a href="charts_morris.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Morris</a></li>
      <li><a href="charts_peity.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Peity</a></li>
      <li><a href="charts_chartist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chartist</a></li>
      <li><a href="charts_c3_axis.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Axis Chart</a></li>
      <li><a href="charts_c3_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
      <li><a href="charts_c3_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data Chart</a></li>
      <li><a href="charts_c3_line.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Line Chart</a></li>
      <li><a href="charts_echarts_basic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Basic Charts</a></li>
      <li><a href="charts_echarts_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
      <li><a href="charts_echarts_pie_doughnut.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pie & Doughnut Chart</a></li>
      </ul>   
    </li>
    <li><a href="#"><i class="icon-Selected-file"><span class="path1"></span><span class="path2"></span></i>Pages</a>
      <ul>
      <li><a href="invoice.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Invoice</a></li>
      <li><a href="invoicelist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Invoice List</a></li> 
      <li><a href="extra_profile.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>User Profile</a></li>
      <li><a href="contact_userlist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Userlist</a></li>  
      <li><a href="sample_faq.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>FAQs</a></li>
      <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Extra Pages</a>
        <ul>
        <li><a href="sample_blank.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Blank</a></li>
        <li><a href="sample_coming_soon.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Coming Soon</a></li>
        <li><a href="sample_custom_scroll.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Custom Scrolls</a></li>
        <li><a href="sample_gallery.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Gallery</a></li>
        <li><a href="sample_lightbox.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lightbox Popup</a></li>
        <li><a href="sample_pricing.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pricing</a></li>
        </ul>       
      </li>
      </ul>     
    </li>     
    <li><a href="#"><i class="icon-Cart2"><span class="path1"></span><span class="path2"></span></i>Ecommerce</a>
      <ul>
      <li><a href="ecommerce_products.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products</a></li>
            <li><a href="ecommerce_cart.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Cart</a></li>
            <li><a href="ecommerce_products_edit.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Edit</a></li>
            <li><a href="ecommerce_details.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Details</a></li>
            <li><a href="ecommerce_orders.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Orders</a></li>
            <li><a href="ecommerce_checkout.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Checkout</a></li>
      </ul>
    </li>
    <li><a href="email_index.html"><i class="icon-Mailbox"><span class="path1"></span><span class="path2"></span></i>Emails</a></li>
    </ul>
  </nav>
  
  @yield('content')
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="https://themeforest.net/item/crmi-bootstrap-admin-dashboard-template/33405709" target="_blank">Purchase Now</a>
		  </li>
		</ul>
    </div>
	  &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
  </footer>
  <!-- Side panel --> 
  <!-- quick_actions_toggle -->
  <div class="modal modal-right fade" id="quick_actions_toggle" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content slim-scroll">
		  <div class="modal-body bg-white p-30">
			<div class="d-flex align-items-center justify-content-between pb-30">
				<h4 class="m-0">Quick Actions<br>
				<small class="badge fs-12 badge-primary mt-10">23 tasks pending</small></h4>
				<a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
					<span class="fa fa-close"></span>
				</a>
			</div>
            <div class="row">
                <div class="col-6">
                    <a class="waves-effect waves-light btn btn-app btn btn-primary-light btn-flat mx-0 mb-20 no-shadow py-35 h-auto d-block" href="accounting.html">
                        <i class="icon-Euro fs-36"><span class="path1"></span><span class="path2"></span></i>
                        <span class="fs-16">Accounting</span>
                    </a>
                </div>
                <div class="col-6">
                    <a class="waves-effect waves-light btn btn-app btn btn-primary-light btn-flat mx-0 mb-20 no-shadow py-35 h-auto d-block" href="contact_userlist_grid.html">
                        <i class="icon-Mail-attachment fs-36"><span class="path1"></span><span class="path2"></span></i>
                        <span class="fs-16">Members</span>
                    </a>
                </div>
                <div class="col-6">
                    <a class="waves-effect waves-light btn btn-app btn btn-primary-light btn-flat mx-0 mb-20 no-shadow py-35 h-auto d-block" href="projects.html">
                        <i class="icon-Box2 fs-36"><span class="path1"></span><span class="path2"></span></i>
                        <span class="fs-16">Projects</span>
                    </a>
                </div>
                <div class="col-6">
                    <a class="waves-effect waves-light btn btn-app btn btn-primary-light btn-flat mx-0 mb-20 no-shadow py-35 h-auto d-block" href="contact_userlist.html">
                        <i class="icon-Group fs-36"><span class="path1"></span><span class="path2"></span></i>
                        <span class="fs-16">Customers</span>
                    </a>
                </div>
                <div class="col-6">
                    <a class="waves-effect waves-light btn btn-app btn btn-primary-light btn-flat mx-0 mb-20 no-shadow py-35 h-auto d-block" href="mailbox.html">
                        <i class="icon-Chart-bar fs-36"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                        <span class="fs-16">Email</span>
                    </a>
                </div>
                <div class="col-6">
                    <a class="waves-effect waves-light btn btn-app btn btn-primary-light btn-flat mx-0 mb-20 no-shadow py-35 h-auto d-block" href="setting.html">
                        <i class="icon-Color-profile fs-36"><span class="path1"></span><span class="path2"></span></i>
                        <span class="fs-16">Settings</span>
                    </a>
                </div>
                <div class="col-6">
                    <a class="waves-effect waves-light btn btn-app btn btn-primary-light btn-flat mx-0 mb-20 no-shadow py-35 h-auto d-block" href="ecommerce_orders.html">
                        <i class="icon-Euro fs-36"><span class="path1"></span><span class="path2"></span></i>
                        <span class="fs-18">Orders</span>
                    </a>
                </div>
			</div>
		  </div>
		</div>
	  </div>
  </div>
  <!-- /quick_actions_toggle -->    
    
  <!-- quick_panel_toggle -->
  <div class="modal modal-right fade" id="quick_panel_toggle" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content slim-scroll2">
		  <div class="modal-body bg-white py-20 px-0">
			<div class="d-flex align-items-center justify-content-between pb-30">
				<ul class="nav nav-tabs customtab3 px-30" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#quick_panel_logs">Audit Logs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#quick_panel_notifications">Notifications</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#quick_panel_settings">Settings</a>
					</li>
				</ul>
                <div class="offcanvas-close">
                    <a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
						<span class="fa fa-close"></span>
					</a>
                </div>
			</div>
              <div class="px-30">
                <div class="tab-content">
                    <div class="tab-pane active" id="quick_panel_logs" role="tabpanel">
                        <div class="mb-30">
                            <h5 class="fw-500 mb-15">System Messages</h5>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                      <img src="{{Request::root()}}/images/svg-icon/color-svg/001-glass.svg" class="h-30" alt="">
                                </div>
                                <div class="d-flex flex-column flex-grow-1 me-2 fw-500">
                                    <a href="#" class="text-dark hover-primary mb-1 fs-16">Duis faucibus lorem</a>
                                    <span class="text-fade">Pharetra, Nulla</span>
                                </div>
                                <span class="badge badge-xl badge-light"><span class="fw-600">+125$</span></span>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                      <img src="{{Request::root()}}/images/svg-icon/color-svg/002-google.svg" class="h-30" alt="">
                                </div>
                                <div class="d-flex flex-column flex-grow-1 me-2 fw-500">
                                    <a href="#" class="text-dark hover-danger mb-1 fs-16">Mauris varius augue</a>
                                    <span class="text-fade">Pharetra, Nulla</span>
                                </div>
                                <span class="badge badge-xl badge-light"><span class="fw-600">+125$</span></span>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                      <img src="{{Request::root()}}/images/svg-icon/color-svg/003-settings.svg" class="h-30" alt="">
                                </div>
                                <div class="d-flex flex-column flex-grow-1 me-2 fw-500">
                                    <a href="#" class="text-dark hover-success mb-1 fs-16">Aliquam in magna</a>
                                    <span class="text-fade">Pharetra, Nulla</span>
                                </div>
                                <span class="badge badge-xl badge-light"><span class="fw-600">+125$</span></span>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                      <img src="{{Request::root()}}/images/svg-icon/color-svg/004-dad.svg" class="h-30" alt="">
                                </div>
                                <div class="d-flex flex-column flex-grow-1 me-2 fw-500">
                                    <a href="#" class="text-dark hover-info mb-1 fs-16">Phasellus venenatis nisi</a>
                                    <span class="text-fade">Pharetra, Nulla</span>
                                </div>
                                <span class="badge badge-xl badge-light"><span class="fw-600">+125$</span></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="me-15 bg-lightest h-50 w-50 l-h-50 rounded text-center">
                                      <img src="{{Request::root()}}/images/svg-icon/color-svg/005-paint-palette.svg" class="h-30" alt="">
                                </div>
                                <div class="d-flex flex-column flex-grow-1 me-2 fw-500">
                                    <a href="#" class="text-dark hover-warning mb-1 fs-16">Vivamus consectetur</a>
                                    <span class="text-fade">Pharetra, Nulla</span>
                                </div>
                                <span class="badge badge-xl badge-light"><span class="fw-600">+125$</span></span>
                            </div>
                        </div>
                        <div class="mb-30">
                            <h5 class="fw-500 mb-15">Tasks Overview</h5>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
                                      <span class="icon-Library fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="#" class="text-dark hover-primary mb-1 fs-16">Project Briefing</a>
                                    <span class="text-fade">Project Manager</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-danger-light h-50 w-50 l-h-60 rounded text-center">
                                    <span class="icon-Write fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="#" class="text-dark hover-danger mb-1 fs-16">Concept Design</a>
                                    <span class="text-fade">Art Director</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
                                    <span class="icon-Group-chat fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="#" class="text-dark hover-success mb-1 fs-16">Functional Logics</a>
                                    <span class="text-fade">Lead Developer</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
                                    <span class="icon-Attachment1 fs-24"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="#" class="text-dark hover-info mb-1 fs-16">Development</a>
                                    <span class="text-fade">DevOps</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="me-15 bg-warning-light h-50 w-50 l-h-60 rounded text-center">
                                    <span class="icon-Shield-user fs-24"></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="#" class="text-dark hover-warning mb-1 fs-16">Testing</a>
                                    <span class="text-fade">QA Managers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="quick_panel_notifications" role="tabpanel">
                        <div>
                            <div class="media-list">
                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">10:10</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-primary">
                                    <p>Morbi quis ex eu arcu auctor sagittis.</p>
                                    <span class="text-fade">by Johne</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">08:40</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-success">
                                    <p>Proin iaculis eros non odio ornare efficitur.</p>
                                    <span class="text-fade">by Amla</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">07:10</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-info">
                                    <p>In mattis mi ut posuere consectetur.</p>
                                    <span class="text-fade">by Josef</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">01:15</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-danger">
                                    <p>Morbi quis ex eu arcu auctor sagittis.</p>
                                    <span class="text-fade">by Rima</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">23:12</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-warning">
                                    <p>Morbi quis ex eu arcu auctor sagittis.</p>
                                    <span class="text-fade">by Alaxa</span>
                                  </div>
                                </a>
                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">10:10</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-primary">
                                    <p>Morbi quis ex eu arcu auctor sagittis.</p>
                                    <span class="text-fade">by Johne</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">08:40</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-success">
                                    <p>Proin iaculis eros non odio ornare efficitur.</p>
                                    <span class="text-fade">by Amla</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">07:10</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-info">
                                    <p>In mattis mi ut posuere consectetur.</p>
                                    <span class="text-fade">by Josef</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">01:15</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-danger">
                                    <p>Morbi quis ex eu arcu auctor sagittis.</p>
                                    <span class="text-fade">by Rima</span>
                                  </div>
                                </a>

                                <a class="media media-single px-0" href="#">
                                  <h4 class="w-50 text-gray fw-500">23:12</h4>
                                  <div class="media-body ps-15 bs-5 rounded border-warning">
                                    <p>Morbi quis ex eu arcu auctor sagittis.</p>
                                    <span class="text-fade">by Alaxa</span>
                                  </div>
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="quick_panel_settings" role="tabpanel">
                        <div>
                            <form class="form">
							<!--begin::Section-->
							<div>
								<h5 class="fw-500 mb-15">Customer Care</h5>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Enable Notifications:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-primary active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Enable Case Tracking:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-primary" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Support Portal:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-primary active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
							</div>
							<!--end::Section-->
							<div class="dropdown-divider"></div>
							<!--begin::Section-->
							<div class="pt-2">
								<h5 class="fw-500 mb-15">Reports</h5>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Generate Reports:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-danger active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Enable Report Export:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-danger active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Allow Data Collection:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-danger active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
							</div>
							<!--end::Section-->
							<div class="dropdown-divider"></div>
							<!--begin::Section-->
							<div class="pt-2">
								<h5 class="fw-500 mb-15">Memebers</h5>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Enable Member singup:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-warning active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Allow User Feedbacks:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-warning active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
								<div class="form-group mb-0 row align-items-center">
									<label class="col-8 col-form-label">Enable Customer Portal:</label>
									<div class="col-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-toggle btn-warning active" data-bs-toggle="button" >
                                            <span class="handle"></span>
                                        </button>
									</div>
								</div>
							</div>
							<!--end::Section-->
						</form>
                        </div>
                    </div>
                </div>
              </div>
		  </div>
		</div>
	  </div>
  </div>
  <!-- /quick_panel_toggle -->
  
  <!-- quick_shop_toggle -->
  <div class="modal modal-right fade" id="quick_shop_toggle" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			  <div class="px-15 d-flex w-p100 align-items-center justify-content-between">
				<h4 class="m-0">Shopping Cart</h4>
				<a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
					<span class="fa fa-close"></span>
				</a>
			  </div>
		  </div>
		  <div class="modal-body px-30 pb-30 bg-white slim-scroll4">
				<div class="d-flex align-items-center justify-content-between pb-15">
					<div class="d-flex flex-column me-2">
						<a href="#" class="fw-600 fs-18 text-hover-primary">Product Name</a>
						<span class="text-muted">When an unknown printer</span>
						<div class="d-flex align-items-center mt-2">
							<span class="fw-600 me-5 fs-18">$ 125</span>
							<span class="text-muted me-5">for</span>
							<span class="fw-600 me-2 fs-18">4</span>
							<a href="#" class="btn btn-sm btn-success-light btn-icon me-2">
								<i class="fa fa-minus"></i>
							</a>
							<a href="#" class="btn btn-sm btn-success-light btn-icon">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<a href="#" class="flex-shrink-0">
						<img src="{{Request::root()}}/images/product/product-1.png" class="avatar h-100 w-100" alt="" />
					</a>
				</div>
			  <div class="dropdown-divider"></div>
				<div class="d-flex align-items-center justify-content-between py-15">
					<div class="d-flex flex-column me-2">
						<a href="#" class="fw-600 fs-18 text-hover-primary">Product Name</a>
						<span class="text-muted">When an unknown printer</span>
						<div class="d-flex align-items-center mt-2">
							<span class="fw-600 me-5 fs-18">$ 125</span>
							<span class="text-muted me-5">for</span>
							<span class="fw-600 me-2 fs-18">4</span>
							<a href="#" class="btn btn-sm btn-success-light btn-icon me-2">
								<i class="fa fa-minus"></i>
							</a>
							<a href="#" class="btn btn-sm btn-success-light btn-icon">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<a href="#" class="flex-shrink-0">
						<img src="{{Request::root()}}/images/product/product-2.png" class="avatar h-100 w-100" alt="" />
					</a>
				</div>
			  <div class="dropdown-divider"></div>
				<div class="d-flex align-items-center justify-content-between py-15">
					<div class="d-flex flex-column me-2">
						<a href="#" class="fw-600 fs-18 text-hover-primary">Product Name</a>
						<span class="text-muted">When an unknown printer</span>
						<div class="d-flex align-items-center mt-2">
							<span class="fw-600 me-5 fs-18">$ 125</span>
							<span class="text-muted me-5">for</span>
							<span class="fw-600 me-2 fs-18">4</span>
							<a href="#" class="btn btn-sm btn-success-light btn-icon me-2">
								<i class="fa fa-minus"></i>
							</a>
							<a href="#" class="btn btn-sm btn-success-light btn-icon">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<a href="#" class="flex-shrink-0">
						<img src="{{Request::root()}}/images/product/product-3.png" class="avatar h-100 w-100" alt="" />
					</a>
				</div>
			  <div class="dropdown-divider"></div>
				<div class="d-flex align-items-center justify-content-between py-15">
					<div class="d-flex flex-column me-2">
						<a href="#" class="fw-600 fs-18 text-hover-primary">Product Name</a>
						<span class="text-muted">When an unknown printer</span>
						<div class="d-flex align-items-center mt-2">
							<span class="fw-600 me-5 fs-18">$ 125</span>
							<span class="text-muted me-5">for</span>
							<span class="fw-600 me-2 fs-18">4</span>
							<a href="#" class="btn btn-sm btn-success-light btn-icon me-2">
								<i class="fa fa-minus"></i>
							</a>
							<a href="#" class="btn btn-sm btn-success-light btn-icon">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<a href="#" class="flex-shrink-0">
						<img src="{{Request::root()}}/images/product/product-4.png" class="avatar h-100 w-100" alt="" />
					</a>
				</div>
			  <div class="dropdown-divider"></div> 
				<div class="d-flex align-items-center justify-content-between py-15">
					<div class="d-flex flex-column me-2">
						<a href="#" class="fw-600 fs-18 text-hover-primary">Product Name</a>
						<span class="text-muted">When an unknown printer</span>
						<div class="d-flex align-items-center mt-2">
							<span class="fw-600 me-5 fs-18">$ 125</span>
							<span class="text-muted me-5">for</span>
							<span class="fw-600 me-2 fs-18">4</span>
							<a href="#" class="btn btn-sm btn-success-light btn-icon me-2">
								<i class="fa fa-minus"></i>
							</a>
							<a href="#" class="btn btn-sm btn-success-light btn-icon">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<a href="#" class="flex-shrink-0">
						<img src="{{Request::root()}}/images/product/product-5.png" class="avatar h-100 w-100" alt="" />
					</a>
				</div>
			  <div class="dropdown-divider"></div> 
				<div class="d-flex align-items-center justify-content-between py-15">
					<div class="d-flex flex-column me-2">
						<a href="#" class="fw-600 fs-18 text-hover-primary">Product Name</a>
						<span class="text-muted">When an unknown printer</span>
						<div class="d-flex align-items-center mt-2">
							<span class="fw-600 me-5 fs-18">$ 125</span>
							<span class="text-muted me-5">for</span>
							<span class="fw-600 me-2 fs-18">4</span>
							<a href="#" class="btn btn-sm btn-success-light btn-icon me-2">
								<i class="fa fa-minus"></i>
							</a>
							<a href="#" class="btn btn-sm btn-success-light btn-icon">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					<a href="#" class="flex-shrink-0">
						<img src="{{Request::root()}}/images/product/product-6.png" class="avatar h-100 w-100" alt="" />
					</a>
				</div>  
		  </div>
		  <div class="modal-footer modal-footer-uniform">
			  <div class="d-flex align-items-center justify-content-between mb-10">
				<span class="fw-600 text-muted fs-16 me-2">Total</span>
				<span class="fw-600 text-end">$1248.00</span>
			  </div>
			  <div class="d-flex align-items-center justify-content-between mb-15">
				<span class="fw-600 text-muted fs-16 me-2">Sub total</span>
				<span class="fw-600 text-primary text-end">$4125.00</span>
			  </div>
			  <div class="text-end">
				<button type="button" class="btn btn-primary">Place Order</button>
			  </div>
		  </div>
		</div>
	  </div>
  </div>
  <!-- /quick_shop_toggle -->

  
  
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	<div class="sticky-toolbar">	    
	    <a href="https://themeforest.net/item/crmi-bootstrap-admin-dashboard-template/33405709" data-bs-toggle="tooltip" data-bs-placement="left" title="Buy Now" class="waves-effect waves-light btn btn-success btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Money"><span class="path1"></span><span class="path2"></span></span>
		</a>
	    <a href="https://themeforest.net/user/multipurposethemes/portfolio" data-bs-toggle="tooltip" data-bs-placement="left" title="Portfolio" class="waves-effect waves-light btn btn-danger btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Image"></span>
		</a>
	    <a id="chat-popup" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Live Chat" class="waves-effect waves-light btn btn-warning btn-flat btn-sm">
			<span class="icon-Group-chat"><span class="path1"></span><span class="path2"></span></span>
		</a>
	</div>
	<!-- Sidebar -->
		
	<div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-sm btn-warning l-h-50">
            <div id="chat-overlay"></div>
            <span class="icon-Group-chat fs-18"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
            <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-bs-toggle="dropdown">
                      <span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
                  </button>
                  <div class="dropdown-menu min-w-200">
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Color me-15"></span>
                        New Group</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                        Contacts</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
                        Groups</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
                        Calls</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
                        Settings</a>
                    <div class="dropdown-divider"></div>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
                        Help</a>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span> 
                        Privacy</a>
                  </div>
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark fs-18">Mayra Sibley</div>
                    <div>
                        <span class="badge badge-sm badge-dot badge-primary"></span>
                        <span class="text-muted fs-12">Active</span>
                    </div>
                </div>
                <div class="chat-box-toggle">
                    <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" type="button">
                      <span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
                    </button>                    
                </div>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="{{Request::root()}}/images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">2 Hours</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Hi there, I'm Jesse and you?
                        </div>
                    </div>
                    <div class="chat-msg self">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">You</a>
                                <p class="text-muted fs-12 mb-0">3 minutes</p>
                            </div>
                            <span class="msg-avatar">
                                <img src="{{Request::root()}}/images/avatar/3.jpg" class="avatar avatar-lg">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="{{Request::root()}}/images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">40 seconds</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Nice to meet you Anne.<br>How can i help you?
                        </div>
                    </div>
                </div><!--chat-log -->
            </div>
            <div class="chat-input">      
                <form>
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send fs-22"></span>
                    </button>
                </form>      
            </div>
		</div>
	</div>
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="{{Request::root()}}/src/js/vendors.min.js"></script>
	<script src="{{Request::root()}}/src/js/pages/chat-popup.js"></script>
    <script src="{{Request::root()}}/assets/icons/feather-icons/feather.min.js"></script>	

	<script src="{{Request::root()}}/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="{{Request::root()}}/assets/vendor_components/progressbar.js-master/dist/progressbar.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>	
	<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
	
	<!-- CRMi App -->
	<script src="{{Request::root()}}/src/js/jquery.smartmenus.js"></script>
	<script src="{{Request::root()}}/src/js/menus.js"></script>
	<script src="{{Request::root()}}/src/js/template.js"></script>
	<script src="{{Request::root()}}/src/js/pages/dashboard.js"></script>
	
</body>
</html>
