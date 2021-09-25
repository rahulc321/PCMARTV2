@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Forgot Password')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- forgot password start -->
<section class="row flexbox-container">
  <div class="col-xl-7 col-md-9 col-10  px-0">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-forgot password -->
        <div class="col-md-6 col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">Forgot Password?</h4>
              </div>
            </div>
            <div class="form-group d-flex justify-content-between align-items-center mb-2">
              <div class="text-left">
                  <div class="ml-3 ml-md-2 mr-1"><a href="{{asset('auth/login')}}"  class="card-link btn btn-outline-primary text-nowrap">Sign in</a></div>
              </div>
              <div class="mr-3">
                <a href="{{asset('auth/register')}}" class="card-link btn btn-outline-primary text-nowrap">Sign up</a>
              </div>
            </div>
            <div class="card-body">
              <div class="text-muted text-center mb-2"><small>Enter the email or phone number you used
              when you joined and we will send you temporary password</small></div>
              <form class="mb-2">
                <div class="form-group mb-2">
                  <label class="text-bold-600" for="exampleInputEmailPhone1">Email or Phone</label>
                  <input type="text" class="form-control" id="exampleInputEmailPhone1" placeholder="Email or Phone"></div>
                <a href="{{asset('/')}}" class="btn btn-primary glow position-relative w-100">SEND PASSWORD
                  <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                </a>
              </form>
              <div class="text-center mb-2">
                <a href="{{asset('auth/login')}}"><small class="text-muted">I remembered my password</small></a>
              </div>
              <div class="divider mb-2">
                  <div class="divider-text">Or Sign in as</div>
              </div>
              <div class="d-flex flex-md-row flex-column">
                <a href="#" class="btn btn-social btn-google btn-block font-small-3 mb-1 mb-sm-1 mb-md-0 mr-md-1 text-center">
                  <i class="bx bxl-google font-medium-3"></i><span class="pl-1">Google</span>
                </a>
                <a href="#" class="btn btn-social btn-facebook btn-block font-small-3 text-center mt-0">
                  <i class="bx bxl-facebook-square font-medium-3"></i><span class="pl-1">Facebook</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- right section image -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center">
          <img class="img-fluid" src="{{asset('images/pages/forgot-password.png')}}" alt="branding logo" width="300">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- forgot password ends -->
@endsection
