@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Invoice Edit')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection

@section('content')
<!-- app invoice View Page -->
<section class="invoice-edit-wrapper">
  <div class="row">
    <!-- invoice view page -->
    <div class="col-xl-9 col-md-8 col-12">
      <div class="card">
        <div class="card-body pb-0 mx-25">
          <!-- header section -->
          <div class="row mx-0">
            <div class="col-xl-4 col-md-12 d-flex align-items-center pl-0">
              <h6 class="invoice-number mb-0 mr-75">Invoice#</h6>
              <input type="text" class="form-control pt-25 w-50" value="000756">
            </div>
            <div class="col-xl-8 col-md-12 px-0 pt-xl-0 pt-1">
              <div class="invoice-date-picker d-flex align-items-center justify-content-xl-end flex-wrap">
                <div class="d-flex align-items-center">
                  <small class="text-muted mr-75">Issue Date: </small>
                  <fieldset class="d-flex">
                    <input type="text" class="form-control pickadate mr-2 mb-50 mb-sm-0" value="08/10/2019">
                  </fieldset>
                </div>
                <div class="d-flex align-items-center">
                  <small class="text-muted mr-75">Due Date: </small>
                  <fieldset class="d-flex">
                    <input type="text" class="form-control pickadate mb-50 mb-sm-0" value="08/10/2019">
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <!-- logo and title -->
          <div class="row my-2 py-50">
            <div class="col-sm-6 col-12 order-2 order-sm-1">
              <h4 class="text-primary">Invoice</h4>
              <input type="text" class="form-control" value="Admin Template">
            </div>
            <div class="col-sm-6 col-12 order-1 order-sm-1 d-flex justify-content-end">
              <img src="{{asset('images/pages/pixinvent-logo.png')}}" alt="logo" height="46" width="164">
            </div>
          </div>
          <hr>
          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <div class="col-lg-6 col-md-12 mt-25">
              <h6 class="invoice-to">Bill To</h6>
              <fieldset class="invoice-address form-group">
                <input type="text" class="form-control" value="Clevision PVT. LTD.">
              </fieldset>
              <fieldset class="invoice-address form-group">
                <textarea class="form-control" rows="4"
                  placeholder="9205 Whitemarsh Street New York, NY 10002"></textarea>
              </fieldset>
              <fieldset class="invoice-address form-group">
                <input type="email" class="form-control" value="hello@clevision.net">
              </fieldset>
              <fieldset class="invoice-address form-group">
                <input type="number" class="form-control" placeholder="601-678-8022">
              </fieldset>
            </div>
          </div>
          <hr>
        </div>
        <div class="card-body pt-50">
          <!-- product details table-->
          <div class="invoice-product-details ">
            <form class="form invoice-item-repeater">
              <div data-repeater-list="group-a">
                <div data-repeater-item>
                  <div class="row mb-50">
                    <div class="col-3 col-md-4 invoice-item-title">Item</div>
                    <div class="col-3 invoice-item-title">Cost</div>
                    <div class="col-3 invoice-item-title">Qty</div>
                    <div class="col-3 col-md-2 invoice-item-title">Price</div>
                  </div>
                  <div class="invoice-item d-flex border rounded mb-1">
                    <div class="invoice-item-filed row pt-1 px-1">
                      <div class="col-12 col-md-4 form-group">
                        <select class="form-control invoice-item-select">
                          <option value="Frest Admin Template">Frest Admin Template</option>
                          <option value="Stack Admin Template">Stack Admin Template</option>
                          <option value="Robust Admin Template">Robust Admin Template</option>
                          <option value="Apex Admin Template">Apex Admin Template</option>
                          <option value="Modern Admin Template">Modern Admin Template</option>
                        </select>
                      </div>
                      <div class="col-md-3 col-12 form-group">
                        <input type="text" class="form-control" value="24">
                      </div>
                      <div class="col-md-3 col-12 form-group">
                        <input type="text" class="form-control" value="1">
                      </div>
                      <div class="col-md-2 col-12 form-group">
                        <strong class="text-primary align-middle">$24.00</strong>
                      </div>
                      <div class="col-md-4 col-12 form-group">
                        <input type="text" class="form-control invoice-item-desc"
                          value="The most developer friendly & highly customisable HTML5 Admin">
                      </div>
                      <div class="col-md-8 col-12 form-group">
                        <span>Discount: </span><span class="discount-value mr-1">0%</span>
                        <span class="mr-1 tax1">0%</span>
                        <span class="mr-1 tax2">0%</span>
                      </div>
                    </div>
                    <div class="invoice-icon d-flex flex-column justify-content-between border-left p-25">
                      <span class="cursor-pointer" data-repeater-delete>
                        <i class="bx bx-x"></i>
                      </span>
                      <div class="dropdown">
                        <i class="bx bx-cog cursor-pointer dropdown-toggle" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false" role="button"></i>
                        <div class="dropdown-menu p-1">
                          <div class="row">
                            <div class="col-12 form-group">
                              <label for="discount">Discount(%)</label>
                              <input type="number" class="form-control" id="discount" placeholder="0">
                            </div>
                            <div class="col-6 form-group">
                              <label for="Tax1">Tax1</label>
                              <fieldset>
                                <select name="tax1" id="Tax1" class="form-control invoice-tax">
                                  <option value="1%" selected>1%</option>
                                  <option value="10%">10%</option>
                                  <option value="18%">18%</option>
                                  <option value="40%">40%</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-6 form-group">
                              <label for="Tax2">Tax2</label>
                              <fieldset>
                                <select name="tax1" id="Tax2" class="form-control invoice-tax">
                                  <option value="1%" selected>1%</option>
                                  <option value="10%">10%</option>
                                  <option value="18%">18%</option>
                                  <option value="40%">40%</option>
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <hr>
                          <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary invoice-apply-btn">
                              <span>Apply</span>
                            </button>
                            <button type="button" class="btn btn-light-primary ml-1">
                              <span>Cancel</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col p-0">
                  <button class="btn btn-light-primary btn-sm" data-repeater-create type="button">
                    <i class="bx bx-plus"></i>
                    <span class="invoice-repeat-btn">Add Item</span>
                  </button>
                </div>
              </div>
            </form>
          </div>
          <!-- invoice subtotal -->
          <hr>
          <div class="invoice-subtotal pt-50">
            <div class="row">
              <div class="col-md-5 col-12">
                <div class="form-group">
                  <input type="text" class="form-control" value="Partial Payment">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" value="Happy to give you a 10% discount.">
                </div>
              </div>
              <div class="col-lg-5 col-md-7 offset-lg-2 col-12">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                    <span class="invoice-subtotal-title">Subtotal</span>
                    <h6 class="invoice-subtotal-value mb-0">$72.00</h6>
                  </li>
                  <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                    <span class="invoice-subtotal-title">Discount</span>
                    <h6 class="invoice-subtotal-value mb-0">- $09.60</h6>
                  </li>
                  <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                    <span class="invoice-subtotal-title">Tax</span>
                    <h6 class="invoice-subtotal-value mb-0">21%</h6>
                  </li>
                  <li class="list-group-item py-0 border-0 mt-25">
                    <hr>
                  </li>
                  <li class="list-group-item d-flex justify-content-between border-0 py-0">
                    <span class="invoice-subtotal-title">Invoice Total</span>
                    <h6 class="invoice-subtotal-value mb-0">$61.40</h6>
                  </li>
                  <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                    <span class="invoice-subtotal-title">Paid to date</span>
                    <h6 class="invoice-subtotal-value mb-0">$00.00</h6>
                  </li>
                  <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                    <span class="invoice-subtotal-title">Balance (USD)</span>
                    <h6 class="invoice-subtotal-value mb-0">$10,953</h6>
                  </li>
                  <li class="list-group-item border-0 pb-0">
                    <button class="btn btn-primary btn-block subtotal-preview-btn">Preview</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- invoice action  -->
    <div class="col-xl-3 col-md-4 col-12">
      <div class="card invoice-action-wrapper shadow-none border">
        <div class="card-body">
          <div class="invoice-action-btn mb-1">
            <button class="btn btn-primary btn-block invoice-send-btn">
              <i class="bx bx-send"></i>
              <span>Send Invoice</span>
            </button>
          </div>
          <div class="invoice-action-btn mb-1">
            <button class="btn btn-light-primary btn-block">
              <span>Download Invoice</span>
            </button>
          </div>
          <div class="invoice-action-btn mb-1">
            <button class="btn btn-light-primary btn-block">Preview</button>
          </div>
          <div class="invoice-action-btn mb-1">
            <button class="btn btn-light-primary btn-block">Save</button>
          </div>
          <div class="invoice-action-btn mb-1">
            <button class="btn btn-success btn-block">
              <i class='bx bx-dollar'></i>
              <span>Add Payment</span>
            </button>
          </div>
        </div>
      </div>
      <div class="invoice-payment">
        <div class="invoice-payment-option mb-2">
          <p>Accept payments via</p>
          <select name="payment" id="paymentOption" class="form-control bg-transparent">
            <option value="DebitCard">Debit Card</option>
            <option value="DebitCard">Credit Card</option>
            <option value="DebitCard">Paypal</option>
            <option value="DebitCard">Internet Banking</option>
            <option value="DebitCard">UPI Transfer</option>
          </select>
        </div>
        <div class="invoice-terms">
          <div class="d-flex justify-content-between py-50">
            <span class="invoice-terms-title">Payment Terms</span>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" checked id="paymentTerms">
              <label class="custom-control-label" for="paymentTerms">
              </label>
            </div>
          </div>
          <div class="d-flex justify-content-between py-50">
            <span class="invoice-terms-title">Client Notes</span>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" checked id="clientNotes">
              <label class="custom-control-label" for="clientNotes">
              </label>
            </div>
          </div>
          <div class="d-flex justify-content-between py-50">
            <span class="invoice-terms-title">Payment Stub</span>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="paymentStub">
              <label class="custom-control-label" for="paymentStub">
              </label>
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
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
