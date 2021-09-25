@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Todo Application')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/dragula.min.css')}}">
@endsection
{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-todo.css')}}">
@endsection
{{-- sidebar --}}
@include('pages.app-todo-sidebar')
{{-- page content --}}
@section('content')
<div class="app-content-overlay"></div>
<div class="todo-app-area">
  <div class="todo-app-list-wrapper">
    <div class="todo-app-list">
      <div class="todo-fixed-search d-flex justify-content-between align-items-center">
        <div class="sidebar-toggle d-block d-lg-none">
          <i class="bx bx-menu"></i>
        </div>
        <fieldset class="form-group position-relative has-icon-left m-0 flex-grow-1">
          <input type="text" class="form-control todo-search" id="todo-search" placeholder="Search Task">
          <div class="form-control-position">
            <i class="bx bx-search"></i>
          </div>
        </fieldset>
        <div class="todo-sort dropdown mr-1">
          <button class="btn dropdown-toggle sorting" type="button" id="sortDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-filter"></i>
            <span>Sort</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropdown">
            <a class="dropdown-item ascending" href="javascript:void(0);">Ascending</a>
            <a class="dropdown-item descending" href="javascript:void(0);">Descending</a>
          </div>
        </div>
      </div>
      <div class="todo-task-list list-group">
        <!-- task list start -->
        <ul class="todo-task-list-wrapper list-unstyled" id="todo-task-list-drag">
          <li class="todo-item" data-name="David Smith">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox1">
                  <label for="checkbox1"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Effective Hypnosis Quit Smoking Methods</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-primary badge-pill">Frontend</span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-1.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="John Doe">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox2">
                  <label for="checkbox2"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">How To Protect Your Computer Very Useful Tips</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-2.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75 warning'><i class="bx bx-star bxs-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="James Smith">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox14">
                  <label for="checkbox14"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">It is a good idea to think of your PC as an office.</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-primary badge-pill">Frontend</span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-3.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Maria Garcia">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox4">
                  <label for="checkbox4"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Don't Let The Outtakes Take You Out</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-danger badge-pill ml-50">Issue</span>
                  <span class="badge badge-light-success badge-pill ml-50">Backend</span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-4.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75 warning'><i class="bx bx-star bxs-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Maria Rodrigu">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox5">
                  <label for="checkbox5"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Sony laptops are among the most well known laptops on today</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-5.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Marry Smith">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox6">
                  <label for="checkbox6"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Success Steps For Your Personal Or Business Life</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Maria Hern">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox7">
                  <label for="checkbox7"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Believing Is The Absence Of Doubt</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-7.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Jamesh Jackson">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox8">
                  <label for="checkbox8"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Are You Struggling In Life</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-danger badge-pill ml-50">Issue</span>
                  <span class="badge badge-light-success badge-pill ml-50">Backend</span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-8.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="David Smith">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox9">
                  <label for="checkbox9"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Hypnotherapy For Motivation Getting The Drive Back</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <span class=" badge badge-circle badge-light-primary">DS</span>
                <a class='todo-item-favorite ml-75 warning'><i class="bx bx-star bxs-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="John Doe">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox10">
                  <label for="checkbox10"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Fix Responsiveness</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-warning badge-pill ml-50">Design</span>
                  <span class="badge badge-light-primary badge-pill ml-50">Frontend</span>
                  <span class="badge badge-light-secondary badge-pill ml-50" data-tag="ISSUE,BACKEND"
                    data-toggle="tooltip" data-placement="bottom" title="ISSUE,BACKEND">
                    <i class='bx bx-dots-horizontal-rounded font-small-1'></i>
                  </span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-10.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="James Smith">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox11">
                  <label for="checkbox11"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Buying Used Electronic Test Equipment.</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Marry Smith">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox12">
                  <label for="checkbox12"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Get The Boot A Birds Eye Look Into Mcse Boot Camps</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-warning badge-pill">Design</span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-12.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Maria Garcia">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox13">
                  <label for="checkbox13"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Dealing With Technical Support 10 Useful Tips</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-success badge-pill">Backend</span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-13.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="Maria Rodrigu">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox15">
                  <label for="checkbox15"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">How Hypnosis Can Help You</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <span class="badge badge-circle badge-light-success">MR</span>
                <a class='todo-item-favorite ml-75 warning'><i class="bx bx-star bxs-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="David Smith">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox16">
                  <label for="checkbox16"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">Effective Hypnosis Quit Smoking Methods</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex">
                  <span class="badge badge-light-primary badge-pill">Frontend</span>
                </div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-1.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
          <li class="todo-item" data-name="John Doe">
            <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
              <div class="todo-title-area d-flex">
                <i class='bx bx-grid-vertical handle'></i>
                <div class="checkbox">
                  <input type="checkbox" class="checkbox-input" id="checkbox17">
                  <label for="checkbox17"></label>
                </div>
                <p class="todo-title mx-50 m-0 truncate">How To Protect Your Computer Very Useful Tips</p>
              </div>
              <div class="todo-item-action d-flex align-items-center">
                <div class="todo-badge-wrapper d-flex"></div>
                <div class="avatar ml-1">
                  <img src="{{asset('images/portrait/small/avatar-s-2.jpg')}}" alt="avatar" height="30"
                    width="30">
                </div>
                <a class='todo-item-favorite ml-75'><i class="bx bx-star"></i></a>
                <a class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </li>
        </ul>
        <!-- task list end -->
        <div class="no-results">
          <h5>No Items Found</h5>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-scripts')
    <script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/dragula.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-todo.js')}}"></script>
@endsection
