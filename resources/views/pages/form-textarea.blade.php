@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Textarea')

@section('content')
<!-- Basic Textarea start -->
<section class="basic-textarea">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Default</h4>
          </div>
          <div class="card-body">
              <p>To add a Textarea we have the component <code>textarea</code>.</p>
              <div class="row">
                  <div class="col-12">
                      <fieldset class="form-group">
                          <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea"></textarea>
                      </fieldset>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Textarea end -->

<!-- Horizontal Textarea start -->
<section id="horizontal-textarea">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Horizontal Input</h4>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <p>To make label in center of form-control, use <code>.col-form-label</code> class with <code>&lt;label&gt;</code> element. This is default bootstrap class.</p>
                </div>
                <div class="col-12">
                  <div class="form-group row align-items-center">
                      <div class="col-sm-1 col-4">
                        <label class="col-form-label">Description</label>
                      </div>
                      <div class="col-sm-11 col-8">
                          <textarea class="form-control" id="horizontalTextarea" rows="3" placeholder="Textarea"></textarea>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- Horizontal Textarea end -->

<!-- Floating Label Textarea start -->
<section class="floating-label-textarea">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Floating Label</h4>
          </div>
          <div class="card-body">
              <p class="mb-2">Use <code>.form-label-group</code> to add a Floating Label with Textarea.</p>
              <div class="row">
                  <div class="col-12">
                      <fieldset class="form-label-group">
                          <textarea class="form-control" id="label-textarea" rows="3" placeholder="Label in Textarea"></textarea>
                          <label for="label-textarea">Label in Textarea</label>
                      </fieldset>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- Floating Label Textarea end -->

<!-- Counter Textarea start -->
<section class="counter-textarea">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Counter</h4>
          </div>
          <div class="card-body">
              <p class="mb-2">There are times when we need the user to only enter a certain number of characters for it, we have the property counter, the value is a number and determines the maximum. Use <code>.char-textarea</code> with <code>&lt;textarea&gt;</code>tag for counting text-length.</p>
              <div class="row">
                  <div class="col-12">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=20 class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="Counter"></textarea>
                          <label for="textarea-counter">Counter</label>
                      </fieldset>
                      <small class="counter-value float-right"><span class="char-count">0</span> / 20 </small>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- Counter Textarea end -->
@endsection

