@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Maintenance')

@section('content')
<!-- maintenance start -->
<section class="row flexbox-container">
  <div class="col-xl-7 col-md-8 col-12">
    <div class="card bg-transparent shadow-none">
      <div class="card-body text-center bg-transparent">
        <img src="{{asset('images/pages/maintenance-2.png')}}" class="img-fluid" alt="under maintenance" width="400">
        <h1 class="error-title my-1">Under Maintenance!</h1>
        <p class="px-2">Sorry for the inconvenience but we're performing some maintenance at the moment. If you need you can always <a href="mailto:hello@help.com">contact us</a>, otherwise we'll be back online shortly!</p>
        <a href="{{url('/')}}" class="btn btn-primary round glow mt-2">BACK TO HOME</a>
      </div>
    </div>
  </div>
</section>
<!-- maintenance end -->

@endsection
