<!-- BEGIN: Body-->
<?php $configData['theme']= \Auth::user()->theme; ?>
<body class="vertical-layout vertical-menu-modern 2-columns
@if($configData['isMenuCollapsed'] == true){{'menu-collapsed'}}@endif
@if($configData['theme'] == 'dark'){{'dark-layout'}} @elseif($configData['theme'] == 'semi-dark'){{'semi-dark-layout'}} @else {{'light-layout'}} @endif
@if($configData['isContentSidebar'] === true) {{'content-left-sidebar'}} @endif @if(isset($configData['navbarType'])){{$configData['navbarType']}}@endif
@if(isset($configData['footerType'])) {{$configData['footerType']}} @endif
{{$configData['bodyCustomClass']}}
@if($configData['mainLayoutType'] === 'vertical-menu-boxicons'){{'boxicon-layout'}}@endif
@if($configData['isCardShadow'] === false){{'no-card-shadow'}}@endif"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-framework="laravel">

<style type="text/css">
  table.dataTable tbody tr {
    /* background-color: #fff; */
    background-color: transparent;
}
rect {
    fill: transparent;
}
</style>

  <!-- BEGIN: Header-->
  @include('panels.navbar')
  <!-- END: Header-->

  <!-- BEGIN: Main Menu-->
  @include('panels.sidebar')
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  <div class="app-content content">
  {{-- Application page structure --}}
	@if($configData['isContentSidebar'] === true)
		<div class="content-area-wrapper">
			<div class="sidebar-left">
				<div class="sidebar">
					@yield('sidebar-content')
				</div>
			</div>
			<div class="content-right">
          <div class="content-overlay"></div>
				<div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
            @yield('content')
          </div>
        </div>
			</div>
		</div>
	@else
    {{-- others page structures --}}
    <div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
        @if($configData['pageHeader']=== true && isset($breadcrumbs))
          @include('panels.breadcrumbs')
        @endif
			</div>
			<div class="content-body">
				@yield('content')
			</div>
		</div>
	@endif
  </div>
  <!-- END: Content-->
  @if($configData['isCustomizer'] === true && isset($configData['isCustomizer']))
  <!-- BEGIN: Customizer-->
  <div class="customizer d-none d-md-block">
    <a class="customizer-toggle" href="#"><i class="bx bx-cog bx bx-spin white"></i></a>
    @include('pages.customizer-content')
  </div>
  <!-- End: Customizer-->

  <!-- Buynow Button-->
  <div class="buy-now">
    @include('pages.buy-now')
  </div>
  @endif
  <!-- demo chat-->
  <div class="widget-chat-demo">
    @include('pages.widget-chat')
  </div>

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
 
  <!-- BEGIN: Footer-->
    @include('panels.footer')
  <!-- END: Footer-->

  @include('panels.scripts')
 <!--  <div class="ht"></div>
   <input type="text" name="" class="ttt" value="0">  -->

  <!-- <audio id="foobar" src="{{Request::root()}}/notification/goes-without-saying-608.mp3" load="auto"> -->
  <input type="hidden" class="ttt1" name="" value="0">
  <div class="beep"></div>
    <script type="text/javascript">
    
    $(document).on('click','.seen', function(){
     var ticketId = $(this).attr('data');
       $.ajax({
            url:"{{url('/')}}/app/seen",
            data:{"_token":"{{csrf_token()}}",'ticketId':ticketId},
            method:"post",
            success:function(res){
                   
                    window.location = '{{ url("/dashboard") }}';
            }
        });
    });
    var url= "{{Request::root()}}/notification/goes-without-saying-608.mp3";

    // var audio = new Audio(url);
     
    // audio.play(); 

    function getCount(){
      var c1= $('.ttt1').val();
      $.ajax({
            url:"{{url('/')}}/app/getCount",
            data:{"_token":"{{csrf_token()}}"},
            method:"post",
            success:function(res){
                  $('.badge-up').text(res);

                   
                  // alert(c1);
                  // alert(res);
                  //if(c1 !=0){
                   if(c1 != res){
                  //  alert();
                    $('.beep').html('<iframe width="560" height="315" src="'+url+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="display: none"></iframe>');
                    
                  }
                  //}
                  $('.ttt1').val(res);
            }
        });
    }

      
     
      // function play1() {
      // var audio = new Audio(url);
      // audio.play();
      // }


    function myFunction1() {
    $.ajax({
            url:"{{url('/')}}/app/getNotification",
            data:{"_token":"{{csrf_token()}}"},
            method:"post",
            success:function(res){
                  $('.res').html(res);
                  $('.dd').css('display','block');

            }
        });
    }

     

    $(document).ready(function(){

      getCount();

      // setInterval(function(){ 


      //   getCount();


      //  }, 2000);
 
    });
    </script>

     <script type="text/javascript">
                    // $(document).ready(function(){
                    //     $('#radio-light').click(function(){
                    //         myFunction('light')
                    //     });
                    //     $('#radio-dark').click(function(){
                    //         myFunction('dark')
                    //     });
                    //     $('#radio-semi-dark').click(function(){
                    //         myFunction('semi-dark')
                    //     });
                    // });

                    $(document).on('click','#radio-light', function(){
                      myFunction('light')
                    });
                    $(document).on('click','#radio-dark', function(){
                      myFunction('dark')
                    });
                    $(document).on('click','#radio-semi-dark', function(){
                      myFunction('semi-dark')
                    });

                    function myFunction(data) {
                        $.ajax({
                            url:"{{url('/')}}/app/update-theme",
                            data:{"_token":"{{csrf_token()}}","theme":data},
                            method:"post",
                            success:function(res){
                                 location.reload();

                            }
                        });
                    }
      </script>
</body>
<!-- END: Body-->
