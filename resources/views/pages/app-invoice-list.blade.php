@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Invoice List')
{{-- vendor style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.checkboxes.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection

@section('content')
<!-- invoice list -->
<section class="invoice-list-wrapper">
  <!-- create invoice button-->
  <div class="invoice-create-btn mb-1">
    <a href="{{asset('app-invoice-add')}}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true">Create
      Invoice</a>
  </div>
  <!-- Options and filter dropdown button-->
  <div class="action-dropdown-btn d-none">
    <div class="dropdown invoice-filter-action">
      <button class="btn border dropdown-toggle mr-1" type="button" id="invoice-filter-btn" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Filter Invoice
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="invoice-filter-btn">
        <a class="dropdown-item" href="javascript:;">Downloaded</a>
        <a class="dropdown-item" href="javascript:;">Sent</a>
        <a class="dropdown-item" href="javascript:;">Partial Payment</a>
        <a class="dropdown-item" href="javascript:;">Paid</a>
      </div>
    </div>
    <div class="dropdown invoice-options">
      <button class="btn border dropdown-toggle mr-2" type="button" id="invoice-options-btn" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Options
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="invoice-options-btn">
        <a class="dropdown-item" href="javascript:;">Delete</a>
        <a class="dropdown-item" href="javascript:;">Edit</a>
        <a class="dropdown-item" href="javascript:;">View</a>
        <a class="dropdown-item" href="javascript:;">Send</a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>
            <span class="align-middle">Invoice#</span>
          </th>
          <th>Amount</th>
          <th>Date</th>
          <th>Customer</th>
          <th>Tags</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00956</a>
          </td>
          <td><span class="invoice-amount">$459.30</span></td>
          <td><small class="text-muted">12-08-19</small></td>
          <td><span class="invoice-customer">Pixinvent PVT. LTD</span></td>
          <td>
            <span class="bullet bullet-success bullet-sm"></span>
            <small class="text-muted">Technology</small>
          </td>
          <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00349</a>
          </td>
          <td><span class="invoice-amount">$125.00</span></td>
          <td><small class="text-muted">08-08-19</small></td>
          <td><span class="invoice-customer">Volkswagen</span></td>
          <td>
            <span class="bullet bullet-primary bullet-sm"></span>
            <small class="text-muted">Car</small>
          </td>
          <td><span class="badge badge-light-success badge-pill">PAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00853</a>
          </td>
          <td><span class="invoice-amount">$10,503</span></td>
          <td><small class="text-muted">02-08-19</small></td>
          <td><span class="invoice-customer">Chevron Corporation</span></td>
          <td>
            <span class="bullet bullet-dark bullet-sm"></span>
            <small class="text-muted">Corporation</small>
          </td>
          <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00452</a>
          </td>
          <td><span class="invoice-amount">$90</span></td>
          <td><small class="text-muted">28-07-19</small></td>
          <td><span class="invoice-customer">Alphabet</span></td>
          <td>
            <span class="bullet bullet-info bullet-sm"></span>
            <small class="text-muted">Electronic</small>
          </td>
          <td><span class="badge badge-light-warning badge-pill">Partially Paid</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00123</a>
          </td>
          <td><span class="invoice-amount">$15,900</span></td>
          <td><small class="text-muted">23-07-19</small></td>
          <td><span class="invoice-customer">Toyota Motor</span></td>
          <td>
            <span class="bullet bullet-primary bullet-sm"></span>
            <small class="text-muted">Car</small>
          </td>
          <td><span class="badge badge-light-success badge-pill">PAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00853</a>
          </td>
          <td><span class="invoice-amount">$115.06</span></td>
          <td><small class="text-muted">24-06-19</small></td>
          <td><span class="invoice-customer">Samsung Electronics</span></td>
          <td>
            <span class="bullet bullet-info bullet-sm"></span>
            <small class="text-muted">Electronic</small>
          </td>
          <td><span class="badge badge-light-success badge-pill">PAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00153</a>
          </td>
          <td><span class="invoice-amount">$1,090</span></td>
          <td><small class="text-muted">23-05-19</small></td>
          <td><span class="invoice-customer">Pixinvent PVT. LTD</span></td>
          <td>
            <span class="bullet bullet-dark bullet-sm"></span>
            <small class="text-muted">Corporation</small>
          </td>
          <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00788</a>
          </td>
          <td><span class="invoice-amount">$555.50</span></td>
          <td><small class="text-muted">10-06-19</small></td>
          <td><span class="invoice-customer">ExxonMobil</span></td>
          <td>
            <span class="bullet bullet-warning bullet-sm"></span>
            <small class="text-muted">Mobile</small>
          </td>
          <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00326</a>
          </td>
          <td><span class="invoice-amount">$8,563</span></td>
          <td><small class="text-muted">06-01-19</small></td>
          <td><span class="invoice-customer">Wells Fargo</span></td>
          <td>
            <span class="bullet bullet-danger bullet-sm"></span>
            <small class="text-muted">Food</small>
          </td>
          <td><span class="badge badge-light-success badge-pill">PAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00759</a>
          </td>
          <td><span class="invoice-amount">$10,960.20</span></td>
          <td><small class="text-muted">22-05-19</small></td>
          <td><span class="invoice-customer">Ping An Insurance</span></td>
          <td>
            <span class="bullet bullet-dark bullet-sm"></span>
            <small class="text-muted">Corporation</small>
          </td>
          <td><span class="badge badge-light-warning badge-pill">Partially Paid</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00999</a>
          </td>
          <td><span class="invoice-amount">$886.90</span></td>
          <td><small class="text-muted">12-05-19</small></td>
          <td><span class="invoice-customer">Apple</span></td>
          <td>
            <span class="bullet bullet-success bullet-sm"></span>
            <small class="text-muted">Electronic</small>
          </td>
          <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="{{asset('app-invoice-view')}}">INV-00223</a>
          </td>
          <td><span class="invoice-amount">$459.30</span></td>
          <td><small class="text-muted">28-04-19</small></td>
          <td><span class="invoice-customer">Communications</span></td>
          <td>
            <span class="bullet bullet-success bullet-sm"></span>
            <small class="text-muted">Technology</small>
          </td>
          <td><span class="badge badge-light-success badge-pill">PAID</span></td>
          <td>
            <div class="invoice-action">
              <a href="{{asset('app-invoice-view')}}" class="invoice-action-view mr-1">
                <i class="bx bx-show-alt"></i>
              </a>
              <a href="{{asset('app-invoice-edit')}}" class="invoice-action-edit cursor-pointer">
                <i class="bx bx-edit"></i>
              </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/responsive.bootstrap4.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
