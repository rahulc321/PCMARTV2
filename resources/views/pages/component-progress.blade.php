@extends('layouts.contentLayoutMaster')
{{-- title--}}
@section('title','Progress')

@section('content')
<!-- default Progress start -->
<section id="default-progress">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Progress Default</h4>
        </div>
        <div class="card-body">
          <p>Use class <code>.progress-bar-{color-name}</code> to add different colors to progressbar.</p>
          <div class="progress progress-bar-primary mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100"
              style="width:20%"></div>
          </div>
          <div class="progress progress-bar-secondary mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="20" aria-valuemax="100"
              style="width:55%"></div>
          </div>
          <div class="progress progress-bar-success mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100"
              style="width:40%"></div>
          </div>
          <div class="progress progress-bar-danger mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100"
              style="width:60%"></div>
          </div>
          <div class="progress progress-bar-warning mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="75" aria-valuemax="100"
              style="width:75%"></div>
          </div>
          <div class="progress progress-bar-info mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="100"
              style="width:80%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- default Progress end -->
<!-- Labeled Progress start -->
<section id="labeled-progress">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Labeled Progress</h4>
        </div>
        <div class="card-body">
          <p class="mb-3">Use class <code>progress-label</code>. to add label.</p>
          <div class="progress progress-bar-primary mb-2 ">
            <div class="progress-bar progress-label" role="progressbar" aria-valuenow="20" aria-valuemin="20"
              aria-valuemax="100" style="width:20%"></div>
          </div>
          <div class="progress progress-bar-success mb-2 ">
            <div class="progress-bar progress-label" role="progressbar" aria-valuenow="40" aria-valuemin="40"
              aria-valuemax="100" style="width:40%"></div>
          </div>
          <div class="progress progress-bar-danger mb-2 ">
            <div class="progress-bar progress-label" role="progressbar" aria-valuenow="60" aria-valuemin="60"
              aria-valuemax="100" style="width:60%"></div>
          </div>
          <div class="progress progress-bar-info mb-2 ">
            <div class="progress-bar progress-label" role="progressbar" aria-valuenow="80" aria-valuemin="80"
              aria-valuemax="100" style="width:80%"></div>
          </div>
          <div class="progress progress-bar-warning mb-2 ">
            <div class="progress-bar progress-label" role="progressbar" aria-valuenow="100" aria-valuemin="100"
              aria-valuemax="100" style="width:100%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Labeled Progress end -->

<!-- Striped Progress start -->
<section id="striped-progress">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Striped Progress</h4>
        </div>
        <div class="card-body">
          <p>Add <code class="highlighter-rouge">.progress-bar-striped</code> to any <code
              class="highlighter-rouge">.progress-bar</code> to apply a stripe via CSS gradient over the progress
            bar’s background color.</p>
          <div class="progress progress-bar-primary mb-2">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="20"
              aria-valuemax="100" style="width:20%"></div>
          </div>
          <div class="progress progress-bar-success mb-2">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="40"
              aria-valuemax="100" style="width:40%"></div>
          </div>
          <div class="progress progress-bar-danger mb-2">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="60"
              aria-valuemax="100" style="width:60%"></div>
          </div>
          <div class="progress progress-bar-info mb-2">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="80"
              aria-valuemax="100" style="width:80%"></div>
          </div>
          <div class="progress progress-bar-warning mb-2">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="100"
              aria-valuemax="100" style="width:100%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Striped Progress end -->

<!-- Animated Progress start -->
<section id="animated-progress">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Animated Progress</h4>
        </div>
        <div class="card-body">
          <p>To get progressbar with animated effect, add <code>.progress-bar-animated</code> with
            <code>.progress-bar</code> class.</p>
          <div class="progress progress-bar-primary mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20"
              aria-valuemin="20" aria-valuemax="100" style="width:20%"></div>
          </div>
          <div class="progress progress-bar-success mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40"
              aria-valuemin="40" aria-valuemax="100" style="width:40%"></div>
          </div>
          <div class="progress progress-bar-danger mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="60"
              aria-valuemin="60" aria-valuemax="100" style="width:60%"></div>
          </div>
          <div class="progress progress-bar-info mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="80"
              aria-valuemin="80" aria-valuemax="100" style="width:80%"></div>
          </div>
          <div class="progress progress-bar-warning mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100"
              aria-valuemin="100" aria-valuemax="100" style="width:100%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Animated Progress end -->

<!-- Progress Sizes start -->
<section id="progress-sizes">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Progress Sizes</h4>
        </div>
        <div class="card-body">
          <p>For Default progress, No size class needed. you can use class <code>.progress-sm</code>
            with <code>.progress</code> to change size of your progress bar.
          </p>
          <div class="progress progress-bar-primary mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100"
              style="width:20%;"></div>
          </div>
          <div class="progress progress-bar-info mb-1 progress-sm">
            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="80" aria-valuemax="100"
              style="width:50%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Progress Sizes end -->
@endsection
