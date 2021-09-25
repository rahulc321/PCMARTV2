@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Not-authorized')

@section('content')
<!-- not authorized start -->
<section class="row flexbox-container">
  <div class="col-xl-7 col-md-8 col-12">
    <div class="card bg-transparent shadow-none">
      <div class="card-body text-center bg-transparent">
        <img src="{{asset('images/pages/not-authorized.png')}}" class="img-fluid" alt="not authorized" width="400">
        <h1 class="my-2 error-title">You are not authorized!</h1>
        <p>You are already give rating an revirew, Thanks</p>
         
      </div>
    </div>
  </div>
</section>
<!-- not authorized end -->

@endsection
