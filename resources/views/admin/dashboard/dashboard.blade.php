@extends('layouts.admin')
{{-- page Title --}}
@section('title','Dashboard')
 
 
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="box bg-gradient-primary">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div id="progressbar11" class="mx-auto w-80 position-relative"></div>
                </div>
                <div>
                  <h4 class="mt-0 text-white">Store Status</h4>
                  <h3 class="fw-500 my-0 text-white">Good</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
          <div class="box">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div class="w-80 h-80 rounded-circle bg-primary-light fs-40 text-center l-h-80">
                  <span class="icon-Equalizer"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                </div>
                <div>
                  <h4 class="mt-0">Total Sales</h4>
                  <h3 class="fw-500 my-0">$314k</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
          <div class="box">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div class="w-80 h-80 rounded-circle bg-success-light fs-40 text-center l-h-85">
                  <span class="icon-Dollar"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                </div>
                <div>
                  <h4 class="mt-0">Total Profit</h4>
                  <h3 class="fw-500 my-0">$90k</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
          <div class="box">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div class="w-80 h-80 rounded-circle bg-danger-light fs-40 text-center l-h-85">
                  <span class="icon-Money"><span class="path1"></span><span class="path2"></span></span>
                </div>
                <div>
                  <h4 class="mt-0">Total Revenue</h4>
                  <h3 class="fw-500 my-0">$9102k</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales Overview</h3>
            </div>
            <div class="box-body">
              <div class="d-flex mb-50 align-items-center justify-content-between max-w-300">
                <div>
                  <p class="mb-0 text-fade">Profit</p>
                  <h3 class="my-0">$25K</h3>
                  <p class="mb-0 text-success"><i class="fa fa-arrow-up me-5"></i>2.37%</p>
                </div>
                <div class="mx-30">
                  <p class="mb-0 text-fade">Expense</p>
                  <h3 class="my-0">$39K</h3>
                  <p class="mb-0 text-success"><i class="fa fa-arrow-up me-5"></i>1.74%</p>
                </div>
                <div>
                  <p class="mb-0 text-fade">Revenue</p>
                  <h3 class="my-0">$208B</h3>
                  <p class="mb-0 text-danger"><i class="fa fa-arrow-down me-5"></i>7.37%</p>
                </div>
              </div>
              <div id="sales_overview"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Production By Unit</h3>
            </div>
            <div class="box-body">              
              <div id="production_overview"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                Plant Productivity
              </h3>
            </div>
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <h1 class="my-0 fw-500 text-info">88.11%</h1>
                <div id="chart88"></div>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <div class="bg-light px-10 py-10 me-10 min-w-p65">
                  <h4 class="mb-0"><small class="me-30">Target:</small>85.00%</h4>
                </div>
                <div class="bg-success px-10 py-10 w-p100">
                  <h4 class="mb-0"><span class="text-white me-10"><i class="fa fa-arrow-up"></i></span>5.0%</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-12">
          <div class="box box-body">
            <div class="row">
              <div class="col-lg-8 col-12">
                <div class="box no-border mb-0 no-shadow">                  
                  <div class="box-header no-border">
                    <h3 class="box-title">Order Overview</h3>
                    <ul class="box-controls">
                      <li><button class="btn btn-xs btn-danger" href="#">Monthly</button></li>
                      <li><button class="btn btn-xs btn-info" href="#">Weeks</button></li>
                    </ul>
                  </div>
                  <div class="box-body p-0">
                    <div id="order-summary-chart"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-12">
                <div class="box mb-0 bg-lightest">
                  <div class="box-header no-border pb-0">
                    <h4 class="box-title">Top Products</h4>
                  </div>
                  <div class="box-body">
                    <div class="d-flex justify-content-between align-items-center mb-10">
                    <div>
                      <h5 class="mb-0">iPod</h5>
                    </div>
                    <div>
                      <h6 class="mb-0"><span class="text-success">+</span> $250</h6>
                    </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-10">
                    <div>
                      <h5 class="mb-0">iMac</h5>
                    </div>
                    <div>
                      <h6 class="mb-0"><span class="text-danger">-</span> $589</h6>
                    </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="mb-0">iPhone x</h5>
                    </div>
                    <div>
                      <h6 class="mb-0"><span class="text-success">+</span> $1292</h6>
                    </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <h4 class="mb-0">Total Sales</h4>
                    <p class="text-primary fs-18 fw-700">$8,459k</p>
                    <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (primary)</span>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-7 col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Regional Sales</h3>
            </div>
            <div class="box-body">              
              <div id="regional_sales" class="h-500"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales By Customer Location</h3>
            </div>
            <div class="box-body">              
              <div id="customer_location" class="h-500"></div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    <!-- /.content -->
    </div>
  </div>
@endsection
