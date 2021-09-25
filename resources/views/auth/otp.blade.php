@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Login Page')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- login page start -->
<section id="auth-login" class="row flexbox-container">
  <div class="col-xl-8 col-11">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-login -->
        <div class="col-md-6 col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">Welcome Back</h4>
              </div>
            </div>
            <div class="card-body">
             <!--  <div class="d-flex flex-md-row flex-column justify-content-around">
                  <a href="javascript:void(0);"
                      class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">
                      <i class="bx bxl-google font-medium-3"></i><span
                          class="pl-50 d-block text-center">Google</span></a>
                  <a href="javascript:void(0);" class="btn btn-social btn-block mt-0 btn-facebook font-small-3">
                      <i class="bx bxl-facebook-square font-medium-3"></i><span
                          class="pl-50 d-block text-center">Facebook</span></a>
              </div> -->
              <div class="divider">
                  <div class="divider-text text-uppercase text-muted"><small>login with
                          email</small>
                  </div>
              </div>


       @if (Session::has('errors'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
         
            <p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
              <form action="{{url('/verify-otp')}}" method="post">
                @csrf
                  <div class="form-group mb-50">
                      <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1"
                          placeholder="Email address" name="email" value="{{Auth::user()->email}}" readonly=""></div>
                  <div class="form-group">
                      <label class="text-bold-600" for="exampleInputPassword1">OTP</label>
                      <input type="text" class="form-control" id="exampleInputPassword1"
                          placeholder="OTP" name="otp" re>
                  </div>
                  <div
                      class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                      
                     <!--  <div class="text-right"><a href="{{asset('auth/forgot/password')}}"
                              class="card-link"><small>Forgot Password?</small></a></div> -->
                  </div>
                  <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i
                          id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
              </form>
              <hr>
              <!-- <div class="text-center">
                <small class="mr-25">Don't have an account?</small>
                <a href="{{asset('auth/register')}}"><small>Sign up</small></a>
              </div> -->
            </div>
          </div>
        </div>
        <!-- right section image -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
          <img class="img-fluid" src="{{asset('images/pages/login.png')}}" alt="branding logo">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- login page ends -->

@endsection
