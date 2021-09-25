@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Form Validation')

@section('vendor-styles')
<link rel="stylesheet" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
@endsection
{{-- page-styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
@endsection

@section('content')
<!-- Simple Validation start -->
<section class="simple-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">jQuery Validation</h4>
        </div>
        <div class="card-body">
          <form id="jquery-val-form" action="javascript:void(0)">
            <div class="form-group">
              <label class="form-label" for="basic-default-name">Name</label>
              <input
                type="text"
                class="form-control"
                id="basic-default-name"
                name="basic-default-name"
                placeholder="John Doe"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="basic-default-email">Email</label>
              <input
                type="text"
                id="basic-default-email"
                name="basic-default-email"
                class="form-control"
                placeholder="john.doe@email.com"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="basic-default-password">Password</label>
              <input
                type="password"
                id="basic-default-password"
                name="basic-default-password"
                class="form-control"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="confirm-password">Confirm Password</label>
              <input
                type="password"
                id="confirm-password"
                name="confirm-password"
                class="form-control"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              />
            </div>
            <div class="form-group">
              <label for="select-country">Country</label>
              <select class="form-control select2" id="select-country" name="select-country">
                <option value="">Select Country</option>
                <option value="usa">USA</option>
                <option value="uk">UK</option>
                <option value="france">France</option>
                <option value="australia">Australia</option>
                <option value="spain">Spain</option>
              </select>
            </div>
            <div class="form-group">
              <label>Profile pic</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="customFile" />
                <label class="custom-file-label" for="customFile">Choose profile pic</label>
              </div>
            </div>
            <div class="form-group">
              <label class="d-block">Gender</label>
              <div class="custom-control custom-radio my-50">
                <input type="radio" id="validationRadiojq1" name="validationRadiojq" class="custom-control-input" />
                <label class="custom-control-label" for="validationRadiojq1">Male</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="validationRadiojq2" name="validationRadiojq" class="custom-control-input" />
                <label class="custom-control-label" for="validationRadiojq2">Female</label>
              </div>
            </div>
            <div class="form-group">
              <label class="d-block" for="validationBio">Bio</label>
              <textarea class="form-control" id="validationBio" name="validationBiojq" rows="3"></textarea>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="validationCheck" name="validationCheck" />
                <label class="custom-control-label" for="validationCheck">Agree to our terms and conditions</label>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Input Validation end -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset  ('js/scripts/forms/validation/form-validation.js')}}"></script>
@endsection
