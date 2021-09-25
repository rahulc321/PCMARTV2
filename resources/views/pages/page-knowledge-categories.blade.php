@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Categories')
{{-- page-styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-knowledge-base.css')}}">
@endsection

@section('content')
<!-- Knowledge base categories Content start  -->
<section class="kb-categories">
    <div class="row">
        <!-- left side menubar section -->
        <div class="col-md-3">
            <div class="kb-sidebar">
                <i class="bx bx-x font-medium-5 d-md-none kb-close-icon cursor-pointer"></i>
                <h6 class="mb-2">Categories</h6>
                <ul class="list-unstyled">
                    <li class="mb-1"><a href="javascript:void(0)" class="kb-effect"> All (564)</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect"> Transection Fees
                            (64)</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect"> Worldwide Good Support
                            (5)</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect"> Refund Policy (54)</a>
                    </li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect"> Bank Transfer (4)</a>
                    </li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect"> Personal Details
                            (20)</a></li>
                    <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect"> Security (64)</a></li>
                </ul>
            </div>
        </div>
        <!-- right side section -->
        <div class="col-md-9">
            <button class="btn btn-primary mb-1 kb-menu d-md-none"><i class="bx bx-menu mr-50"></i>Categories</button>
            <div class="row match-height">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Free Philippine Real Estate Ads Forums</h5>
                                <p class="card-text text-muted kb-ellipsis">Using Laravel, no worries we have that
                                    convered as
                                    well.
                                    We bundled Laravel Starter Kit with this template.</p>
                                <ul class="list-unstyled users-list m-0 d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-1.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Lilian Nenez" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-2.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+40 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Advertising on Budget Real Estate Ads Forums</h5>
                                <p class="card-text text-muted kb-ellipsis">Ready to use athentications with
                                    Firebase,
                                    social
                                    media
                                    lightning fast search and discovery experiences.</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-3.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Alberto Glotzbach" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-4.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+70 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Adword Keywords Real Estate Ads Forums</h5>
                                <p class="card-text text-muted kb-ellipsis">Carefully crafted, clean, smart & easy
                                    theme
                                    navigation
                                    with collapsible option. lightning and discovery experiences.</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Lilian Nenez" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Alberto Glotzbach" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Alberto Glotzbach" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+10 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Internet Banner Most Reliable Forms </h5>
                                <p class="card-text text-muted kb-ellipsis">Easy & smart fuzzy search functionality
                                    which
                                    enables
                                    users to search quickly.</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-8.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Lilian Nenez" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Alberto Glotzbach" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-10.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+9 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">How To Write Better Copy With White Ron</h5>
                                <p class="card-text text-muted kb-ellipsis">Bookmarks allows users to select their
                                    favourite
                                    pages/apps and navigate quickly.!</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Lilian Nenez" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-12.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+20 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Research Philippine Real Estate Ads Forums</h5>
                                <p class="card-text text-muted kb-ellipsis">Frest comes with built-in light and
                                    dark
                                    layouts, select as per your preference.</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-13.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Alberto Glotzbach" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-14.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+12 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Listing Philippine Real Estate Ads Forums</h5>
                                <p class="card-text text-muted kb-ellipsis">Unlimited color options allows you to
                                    set
                                    your
                                    application color as per your branding.</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-15.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Lilian Nenez" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Alberto Glotzbach" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-17.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+10 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Media Mix Estate Ads Forums Ready To Go</h5>
                                <p class="card-text text-muted kb-ellipsis">Lifetime updates with new demos and
                                    features
                                    is
                                    fast search and discovery experiences.</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-18.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Lilian Nenez" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-19.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Alberto Glotzbach" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+40 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <a href="{{url('page/knowledge-base/categories/question')}}">
                            <div class="card-body">
                                <h5 class="card-title">Fianlly A top Secret Estate Ads Forums</h5>
                                <p class="card-text text-muted kb-ellipsis">Get access to premium customer support
                                    from
                                    the
                                    actual
                                    people who have created.!</p>
                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Trina Lynes" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-21.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                        title="Lilian Nenez" class="avatar pull-up">
                                        <img src="{{asset('images/portrait/small/avatar-s-22.jpg')}}"
                                            alt="Avatar" height="30" width="30">
                                    </li>
                                    <li class="d-inline-block pl-50">
                                        <p class="text-muted mb-0 font-small-3">+10 more</p>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mt-2">
                    <li class="page-item previous disabled"><a class="page-link" href="javascript:void(0)">
                            <i class="bx bx-chevron-left"></i>
                        </a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link"
                            href="javascript:void(0)">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">6</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">7</a></li>
                    <li class="page-item next"><a class="page-link" href="javascript:void(0)">
                            <i class="bx bx-chevron-right"></i>
                        </a></li>
                </ul>
            </nav>
        </div>
        <div class="kb-overlay"></div>
    </div>
</section>
<!-- Knowledge base categories Content ends -->
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-knowledge-base.js')}}"></script>
@endsection
