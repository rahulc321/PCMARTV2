@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Lock Screen')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- lock screen starts -->
<section class="row flexbox-container">
    <div class="col-xl-7 col-10">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left lock screen section -->
                <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="text-center mb-2">Your Session is locked</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/')}}">
                                <div class="form-group mb-50">
                                    <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Email address"></div>
                                <div class="form-group">
                                    <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="text-center mb-1">
                                  <a href="{{asset('auth/login')}}" class="card-link">
                                    <small>Are you not John Doe ?</small>
                                  </a>
                                </div>
                                <button type="submit" class="btn btn-primary glow position-relative w-100">Unlock<i
                                        id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- right image section -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center">
                    <img class="img-fluid" src="{{asset('images/pages/lock-screen.png')}}" alt="branding logo"
                        width="350">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- lock screen ends -->

@endsection
