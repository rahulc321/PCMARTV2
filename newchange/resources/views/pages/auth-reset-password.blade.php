@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Reset Password')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- reset password start -->
<section class="row flexbox-container">
    <div class="col-xl-7 col-10">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-login -->
                <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right d-flex justify-content-center mb-0 p-2 h-100">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="text-center mb-2">Reset your Password</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="mb-2" action="{{url('/')}}">
                                <div class="form-group">
                                    <label class="text-bold-600" for="exampleInputPassword1">New Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter a new password"></div>
                                <div class="form-group mb-2">
                                    <label class="text-bold-600" for="exampleInputPassword2">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                        placeholder="Confirm your new password"></div>
                                <button type="submit" class="btn btn-primary glow position-relative w-100">Reset my
                                    password<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- right section image -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <img class="img-fluid" src="{{asset('images/pages/reset-password.png')}}"
                        alt="branding logo">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- reset password ends -->
@endsection
