@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Treeview')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/bootstrap-treeview.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/ext-component-treeview.css')}}">
@endsection

@section('content')
<!-- Bootstrap Treeview start here -->
<section id="bootstrap-treeview" class="bootstraptreeview">
  <div class="row">
    <!-- default tree view -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Default
          </h6>
        </div>
        <div class="card-body">
          <div id="default-treeview"></div>
        </div>
      </div>
    </div>
    <!-- collapse treeview -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Collapsed
          </h6>
        </div>
        <div class="card-body">
          <div id="collapsed-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Expanded treeview -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Expanded
          </h6>
        </div>
        <div class="card-body">
          <div id="expanded-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Color Treeview  -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title"> Color Treeview
          </h6>
        </div>
        <div class="card-body">
          <div id="primary-color-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Custom Icon treeview -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Custom Icon
          </h6>
        </div>
        <div class="card-body">
          <div id="custom-icon-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Tags As Badges treeview-->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Tags As Badges
          </h6>
        </div>
        <div class="card-body">
          <div id="tags-badge-treeview"></div>
        </div>
      </div>
    </div>
    <!-- No Border treeview -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">No Border
          </h6>
        </div>
        <div class="card-body">
          <div id="no-border-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Colorful backgroud treeview -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Colorful Background
          </h6>
        </div>
        <div class="card-body">
          <div id="colorful-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Node Override treeview -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Node Override
          </h6>
        </div>
        <div class="card-body">
          <div id="node-override-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Link Enabled treeview -->
    <div class="col-md-6  col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Link Enabled
          </h6>
        </div>
        <div class="card-body">
          <div id="link-enabled-treeview"></div>
        </div>
      </div>
    </div>
    <!-- json Data treeview -->
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Json Data
          </h6>
        </div>
        <div class="card-body">
          <div id="data-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Expandible Tree -->
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Expandible Tree
          </h6>
        </div>
        <div class="card-body">
          <div class="form-group text-center">
            <button type="button" class="btn btn-primary mb-1 mr-1" id="btn-expand-all">Expand All</button>
            <button type="button" class="btn btn-warning mb-1" id="btn-collapse-all">Collapse All</button>
          </div>
          <div id="expandible-tree"></div>
        </div>
      </div>
    </div>
    <!-- Checkable Tree -->
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Checkable Tree
          </h6>
        </div>
        <div class="card-body">
          <div class="form-group text-center">
            <button type="button" class="btn btn-primary mb-1 mr-1" id="btn-check-all">Check All</button>
            <button type="button" class="btn btn-warning mb-1" id="btn-uncheck-all">Uncheck All</button>
          </div>
          <div id="checkable-tree"></div>
        </div>
      </div>
    </div>
    <!-- Disabled treeview -->
    <div class="col-md-6  col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Disabled
          </h6>
        </div>
        <div class="card-body">
          <div class="form-group text-center">
            <button type="button" class="btn btn-danger mb-1 mr-1" id="btn-disable-all">Disable All</button>
            <button type="button" class="btn btn-success mb-1" id="btn-enable-all">Enable All</button>
          </div>
          <div id="disabled-treeview"></div>
        </div>
      </div>
    </div>
    <!-- Searchable Tree treeview -->
    <div class="col-lg-6  col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="card-title">Searchable Tree
          </h6>
        </div>
        <div class="card-body">
          <div class="form-group">
            <div class="seachbox mb-2">
              <input type="text" class="form-control" placeholder="Search" id="input-search" name="input-search">
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-sm-12">
              <div class="form-group d-flex flex-wrap align-items-center mb-0">
                <div class="checkbox mr-1 mb-50">
                  <input type="checkbox" class="checkbox__input" id="chk-ignore-case" value="false">
                  <label for="chk-ignore-case">Ignore Case</label>
                </div>
                <div class="checkbox mr-1 mb-50">
                  <input type="checkbox" class="checkbox__input" id="chk-exact-match" value="false">
                  <label for="chk-exact-match">Exact Match</label>
                </div>
                <div class="checkbox mr-1 mb-50">
                  <input type="checkbox" class="checkbox__input" id="chk-reveal-results" value="false">
                  <label for="chk-reveal-results">Reveal Results</label>
                </div>
                <div class="searchable-action">
                  <button type="button" class="btn btn-primary btn-sm mr-1 mb-50" id="btn-search">
                    Search
                  </button>
                  <button type="button" class="btn btn-light-primary btn-sm mb-50" id="btn-clear-search">
                    Clear
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 col-sm-12">
              <div id="searchable-tree"></div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div id="search-output"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/bootstrap-treeview.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/extensions/ext-component-treeview.js')}}"></script>
@endsection
