@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Form Repeater')

@section('content')
<section id="form-repeater-wrapper">
  <!-- form default repeater -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            Repeating Forms
          </h4>
        </div>
        <div class="card-body">
          <form class="form repeater-default">
            <div data-repeater-list="group-a">
              <div data-repeater-item>
                <div class="row justify-content-between">
                  <div class="col-md-2 col-sm-12 form-group">
                    <label for="Email">Email </label>
                    <input type="email" class="form-control" id="Email" placeholder="Enter email id">
                  </div>
                  <div class="col-md-2 col-sm-12 form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                  </div>
                  <div class="col-md-2 col-sm-12 form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="Male">Male</option>
                      <option value="Female">female</option>
                    </select>
                  </div>
                  <div class="col-md-2 col-sm-12 form-group">
                    <label for="Profession">Profession</label>
                    <select name="profession" id="Profession" class="form-control">
                      <option value="FontEnd Developer">Designer</option>
                      <option value="BackEnd Developer">Developer</option>
                      <option value="Bussiness Analystic">Tester</option>
                      <option value="Project Cordinator">Manager</option>
                    </select>
                  </div>
                  <div class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                    <button class="btn btn-danger text-nowrap px-1" data-repeater-delete type="button"> <i
                        class="bx bx-x"></i>
                      Delete
                    </button>
                  </div>
                </div>
                <hr>
              </div>
            </div>
            <div class="form-group">
              <div class="col p-0">
                <button class="btn btn-primary" data-repeater-create type="button"><i class="bx bx-plus"></i>
                  Add
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ form default repeater -->
</section>
<section id="form-control-repeater">
  <div class="row">
    <!-- file repeater  -->
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Project Info</h4>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col-md-6 col-sm-12 form-group">
                <input type="text" class="form-control" placeholder="Name">
              </div>
              <div class="col-md-6 col-sm-12 form-group">
                <input type="text" class="form-control" placeholder="Company">
              </div>
              <div class="col-md-6 col-sm-12 form-group">
                <input type="email" class="form-control" placeholder="Email">
              </div>
              <div class="col-md-6 col-sm-12 form-group">
                <input type="number" class="form-control" placeholder="Phone">
              </div>
              <div class="col-md-6 col-sm-12 form-group">
                <select name="Interested_in" class="form-control">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="col-md-6 col-sm-12 form-group">
                <select name="budget" class="form-control">
                  <option value="Budget">Budget</option>
                  <option value="less than $500">Less than $500</option>
                  <option value="$500 - $1000">$500 - $1000</option>
                  <option value="$1000 - $1500">$1000 - $1500</option>
                </select>
              </div>
              <div class="col-12 form-group file-repeater">
                <div data-repeater-list="repeater-list">
                  <div data-repeater-item>
                    <div class="row mb-2">
                      <div class="col-9 col-lg-8 mb-1">
                        <input type="file">
                      </div>
                      <div class="col-3 col-lg-4 text-lg-right">
                        <button class="btn btn-icon btn-danger" type="button" data-repeater-delete>
                          <i class="bx bx-x"></i>
                          <span class="d-lg-inline-block d-none">Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col form-group p-0">
                  <button class="btn btn-primary" data-repeater-create type="button">
                    <i class="bx bx-plus"></i>Add
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /file repeater -->
    <!-- phone repeater -->
    <div class="col-xl-6 col-lg -12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">User Profile</h4>
        </div>
        <div class="card-body">
          <form action="#" class="contact-repeater">
            <div data-repeater-list="contact">
              <div class="row">
                <div class="col-12 mb-2">
                  <button class="btn btn-icon rounded-circle btn-primary" type="button" data-repeater-create>
                    <i class="bx bx-plus"></i>
                  </button>
                  <span class="ml-1 font-weight-bold text-primary">ADD NEW</span>
                </div>
                <div class="col-md-3 col-4 mb-50">
                  <label class="text-nowrap">First Name</label>
                </div>
                <div class="col-md-3 col-4 mb-50">
                  <label class="text-nowrap">Last Name</label>
                </div>
                <div class="col-md-6 col-4 mb-50">
                  <label  class="text-nowrap">Phone</label>
                </div>
              </div>
              <div class="row justify-content-between" data-repeater-item>
                <div class="col-md-3 col-12 form-group d-flex align-items-center">
                  <i class="bx bx-menu mr-1"></i>
                  <input type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <input type="text" class="form-control" placeholder="Last Name">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <input type="text" class="form-control" placeholder="Phone">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete>
                    <i class="bx bx-x"></i>
                  </button>
                </div>
              </div>
              <div class="row justify-content-between" data-repeater-item>
                <div class="col-md-3 col-12 form-group d-flex align-items-center">
                  <i class="bx bx-menu mr-1"></i>
                  <input type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <input type="text" class="form-control" placeholder="Last Name">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <input type="text" class="form-control" placeholder="Phone">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete>
                    <i class="bx bx-x"></i>
                  </button>
                </div>
              </div>
              <div class="row justify-content-between" data-repeater-item>
                <div class="col-md-3 col-12 form-group d-flex align-items-center">
                  <i class="bx bx-menu mr-1"></i>
                  <input type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <input type="text" class="form-control" placeholder="Last Name">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <input type="text" class="form-control" placeholder="Phone">
                </div>
                <div class="col-md-3 col-12 form-group">
                  <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete>
                    <i class="bx bx-x"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /phone repeater -->
  </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/form-repeater.js')}}"></script>
@endsection
