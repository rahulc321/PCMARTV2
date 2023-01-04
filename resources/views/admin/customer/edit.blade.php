@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Edit Customer')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
<?php error_reporting(0); ?>
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection

@section('content')
 <?php
    $perm = Helper::checkPermission();
    $read=0;
    if(in_array('contract_due_date',$perm)){
    $read=1;
    }

    $perm1 = Helper::checkPermission();
    $read1=0;
    if(in_array('customer_edit',$perm1)){
    $read1=1;
    }

    $perm1 = Helper::checkPermission();
   // echo '<pre>';print_r($perm1);die;
    $c_subscription=0;
    if(in_array('c_subscription',$perm1)){
    $c_subscription=1;
    }

 
 if($read==0){
  $read='read only';
 }else{
  $read='';
 }

 if($read1==0){
  $read1="readonly";
  //$dd= 'disabled';
 }else{
  $read1='';
  $dd= '';
 }

 if($c_subscription == 0){
  $r="readonly";
 }else{
  $r='';
 }


    $oinfo=0;
    if(in_array('other_info',$perm1)){
      $oinfo=1;
    }

    if($oinfo == 0){
      $o="readonly";
    }else{
      $o='';
    }

    $s="readonly";;
    if(in_array('Support',$perm1)){
      $s="";
    }

     
 ?>
 <style type="text/css">
    .cstmFormC{
      width: 75px;
      display: inline-block;
      margin-right: 10px;
    }
    .cstmFormCWd{
      width: 109px;
      display: inline-block;
      margin-right: 10px;
    }
    .cstmFormCO{
      width: 160px;
      display: inline-block;
      margin-right: 10px;
    }
    .messg-tab{
      width: 100%;
      display: inline-block;
    }
    .messg-tab h4{
      float: left;
    }
    .messg-tab .addMoreBtn, .addMoreBtnIn{
      float: right;
    }
    span.addRemoveBtn, .addRemoveBtnIN {
    font-size: 16px;
    color: red;
    cursor: pointer;
    }
    p.other-info-error {
        color: red;
        text-align: center;
        margin: 0;
        display: none;
    }
   @media (min-width: 300px) and (max-width: 991px){ 
  }
  }
  }

 
.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    overflow-y: scroll;
}
  }

  .controls.kk {
  margin-left: -14px !important;
  }
  .controls {
  margin-left: 35px;
  }

  .form-group.cstmFormC.act {
  margin-left: 30px;
  }
  .controls.kk {
  margin-left: -11px;
  }
 </style>
<!-- users edit start -->
<section class="users-edit">
  <div class="card">
    <div class="card-body">
      @if (count($errors) > 0)
            <div class="alert alert-success">
                
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
            href="#account" aria-controls="account" role="tab" aria-selected="true">
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit Customer</span>
        </a>
        </li>
        <li class="nav-item">
        <!-- <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
            href="#information" aria-controls="information" role="tab" aria-selected="false">
          <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Information</span>
        </a> -->
        </li>
      </ul>

    <form class="form-validate" id="customerUpdate" action="{{url('/app/customer-detail/update')}}/{{$edit->id}}" method="post">
                
                @csrf

        <div class="row">
        <div class="col-12 col-sm-6">

        <div class="form-group">
          <div class="controls">
          <label>Organization Number</label>
          <input type="text" class="form-control" placeholder="Organization Number"
          " value="{{$edit->Organization_Number}}"
          name="Organization_Number" required="" {{$read1}}>
          </div>
          </div>

          </div>
          <div class="col-12 col-sm-6">
          <div class="form-group">
          <div class="controls">
          <label>Organization Name</label>
          <input type="text" class="form-control" placeholder="Organization Name"
          " value="{{$edit->Organization_Name}}"
          name="Organization_Name"  {{$read1}}>
          </div>
        </div>
        </div>
        </div>

      <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#home" class="nav-link active" data-toggle="tab">Detail</a>
        </li>
        <li class="nav-item">
            <a href="#profile" class="nav-link" data-toggle="tab">Support</a>
        </li>
        <li class="nav-item">
            <a href="#messages" class="nav-link" data-toggle="tab">Subscription</a>
        </li>

        <li class="nav-item">
            <a href="#other-info" class="nav-link" data-toggle="tab">Other Info</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="home">
           
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      

                      <div class="form-group">
                        <div class="controls">
                            <label>Address1</label>
                            <input type="text" class="form-control" placeholder="Address1"
                                 " value="{{$edit->Address1}}"
                                name="Address1"  {{$read1}}>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Address2</label>
                            <input type="text" class="form-control" placeholder="Address2"
                                 " value="{{$edit->Address2}}"
                                name="Address2"  {{$read1}}>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Address3</label>
                            <input type="text" class="form-control" placeholder="Address3"
                                 " value="{{$edit->Address3}}"
                                name="Address3"  {{$read1}}>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Address4</label>
                            <input type="text" class="form-control" placeholder="Address4"
                                 " value="{{$edit->Address4}}"
                                name="Address4" {{$read1}} >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Attention</label>
                            <input type="text" class="form-control" placeholder="Attention"
                                 " value="{{$edit->Attention}}"
                                name="Attention"  {{$read1}}>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Contact</label>
                            <input type="text" class="form-control" placeholder="Contact"
                                 " value="{{$edit->Contact}}"
                                name="Contact"  {{$read1}}>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Primary Phone</label>
                            <input type="text" class="form-control" placeholder="Primary_Phone"
                                 " value="{{$edit->Primary_Phone}}"
                                name="Primary_Phone"  {{$read1}}>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Secondary Phone</label>
                            <input type="text" class="form-control" placeholder="Secondary_Phone"
                                 " value="{{$edit->Secondary_Phone}}"
                                name="Secondary_Phone"  {{$read1}}>
                        </div>
                      </div>
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">

                  
                  <div class="form-group">
                        <div class="controls">
                            <label>Fax</label>
                            <input type="text" class="form-control" placeholder="Fax"
                                 " value="{{$edit->Fax}}"
                                name="Fax"  {{$read1}}>
                        </div>
                  </div>
                  <div class="form-group">
                        <div class="controls">
                            <label>Primary Email</label>
                            <input type="text" class="form-control" placeholder="Primary_Email"
                                 " value="{{$edit->Primary_Email}}"
                                name="Primary_Email"  {{$read1}}>
                        </div>
                  </div>

                      

                      <div class="form-group">
                        <div class="controls">
                            <label>Area</label>
                            <input type="text" class="form-control" placeholder="Area"
                                 " value="{{$edit->Area}}"
                                name="Area" {{$read1}} >
                        </div>
                      </div> 
                      <div class="form-group">
                        <div class="controls">
                            <label>Agent</label>
                            <input type="text" class="form-control" placeholder="Agent"
                                 " value="{{$edit->Agent}}"
                                name="Agent"  {{$read1}}>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>ROC</label>
                            <input type="text" class="form-control" placeholder="ROC"
                                 " value="{{$edit->ROC}}"
                                name="ROC"  {{$read1}}>
                        </div>
                      </div>
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>GST</label>
                            <input type="text" class="form-control" placeholder="GST"
                                 " value="{{$edit->GST}}"
                                name="GSTREGNO" {{$read1}} >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Blacklist</label>
                             <select class="form-control" name="Blacklist" {{$read1}}>
                             <option value="B" @if($edit->Blacklist=='B') {{'selected'}} @endif>Yes</option>
                             <option value="A" @if($edit->Blacklist !='B') {{'selected'}} @endif>No</option>
                               
                             </select>
                        </div>
                      </div>
                       

                       
                  </div>

                  
                  

                  
                  
                </div>
            
        </div>
        <div class="tab-pane fade" id="profile">
            <div class="additional_settings col-sm-12">
                 <!--  <h3>Additional Settings</h3> -->
                  <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th></th>
                <th>Exp Date</th>
                <th style="width: 200px !important">SNO</th>
                <th>User</th>
                <th></th>
                <th >Sage Cover</th>
                <!-- <th>Attention</th>
                <th>Phone</th> -->
                 
              </tr>
            </thead>
            <tbody>
              @foreach($products as $key=>$product)
              <?php

             $custoinfo= App\Models\CustomerInfo::where('customer_id',$edit->Organization_Number)
             ->where('setting_id',$product->id)
             ->first();


              $val=0;
              if($custoinfo->exp_date_checkbox==1){
                $val=$custoinfo->exp_date_checkbox;
              }

              $val1=0;
              if($custoinfo->sage_cover_checkbox==1){
                $val1=$custoinfo->sage_cover_checkbox;
              }
              if($product->id==$custoinfo->setting_id){

                $expDate="";
                if($custoinfo['exp_date']){
                  $expDate=date('d-m-Y',strtotime($custoinfo['exp_date']));
                }

                $sage_cover="";
                if($custoinfo['sage_cover']){
                  $sage_cover=date('d-m-Y',strtotime($custoinfo['sage_cover']));
                }

                

                $due=0;
                if(in_array('contract_due_date',$perm)){
                $due=1;
                }
               // echo '>>'.$custoinfo['exp_date'];
                  if($due==0){
                  if($custoinfo['exp_date'] !=" "){
                  $ex= date('Y',strtotime($expDate));
                  }

                  if($ex == 1970){
                    $ex='';
                  }else{
                    $ex= $ex;
                  }
                }else{
                  $ex=$expDate;
                }


              ?>

              <tr>
                <td>{{$product->title}}<input type="hidden" name="id[]" value="{{$product->id}}"><input type="hidden" name="title[]" value="{{$product->title}}"  ></td>
                <td><input type="checkbox"  class="expcheck" data="{{$key}}" {{$read}} {{$s}} @if($custoinfo['exp_date_checkbox']==1) {{'checked'}} @endif>
                <input type="hidden" name="expcheck[]" class="expcheck_{{$key}}" value="{{$val}}" {{$s}}>
                </td>
                <td><input type="text" style="width: 100px" name="exp_date[]" value="<?php echo $ex?>" {{$read}} {{$s}}></td>
                <td><input type="text" name="sno[]" style="width: 178px" value="<?php echo $custoinfo['sno_number']?>"  {{$s}}></td>
                <td><input type="text" name="user[]" style="width: 100px" value="<?php echo $custoinfo['user']?>" {{$s}} ></td>

                <td><input type="checkbox" @if($custoinfo['sage_cover_checkbox']==1) {{'checked'}} @endif name="sagecover_checkbox[]" data="{{$key}}" class="sagecover" {{$s}} >

                <input type="hidden" name="sagecover_check[]" class="sagecover_{{$key}}" value="{{$val1}}" {{$s}}>
                </td>

                <td><input type="text" name="sagecover[]" style="width: 100px" value="<?php echo $sage_cover?>"  {{$s}}></td>
                <!-- <td></td>
                <td></td> -->
              </tr>

              <?php }else{ ?>

              <tr>
                <td>{{$product->title}}<input type="hidden" name="id[]" value="{{$product->id}}"><input type="hidden" name="title[]" value="{{$product->title}}" {{$read}} {{$s}}></td>
                <td><input type="checkbox"  class="expcheck" data="{{$key}}" {{$read}} @if($custoinfo['exp_date_checkbox']==1) {{'checked'}} @endif>
                <input type="hidden" name="expcheck[]" class="expcheck_{{$key}}" value="{{$val}}" {{$s}}>
                </td>
                <td><input {{$s}} type="text" style="width: 100px" name="exp_date[]" value="<?php echo $custoinfo['exp_date']?>" {{$read}}></td>
                <td><input {{$s}} type="text" name="sno[]" style="width: 200px !important" value="<?php echo $custoinfo['sno_number']?>" {{$read}}></td>
                <td><input {{$s}} type="text" name="user[]" style="width: 100px" value="<?php echo $custoinfo['user']?>" {{$read}}></td>

                <td><input {{$s}} type="checkbox" @if($custoinfo['sage_cover_checkbox']==1) {{'checked'}} @endif name="sagecover_checkbox[]" data="{{$key}}" class="sagecover" {{$read}}>

                <input {{$s}} type="hidden" name="sagecover_check[]" class="sagecover_{{$key}}" value="{{$val1}}" >
                </td>

                <td><input {{$s}} type="text" name="sagecover[]" style="width: 100px" value="<?php echo $custoinfo['sage_cover']?>" {{$read}}></td>
                <!-- <td></td>
                <td></td> -->
              </tr>

              <?php } ?>
              @endforeach
               
               
            </tbody>
          </table>
                     
                  </div>
        </div>
        <div class="tab-pane fade" id="messages">
            <div class="messg-tab">
            <!-- <h4 class="">Messages tab content</h4> -->
            <button type="button" class="btn btn-primary addMoreBtn" {{$s}}>Add More</button>
            </div>
            <div class="clone-class-cstm">
            <div class="custmRow">
            <div class="row">
              <div class="col-12 col-sm-12">

                      <div class="form-group cstmFormC">
                        <div class="controls kk">
                            <label>Code</label>
                            <select class="selectSubs" name="code[]" style="width: 131px !important;
    padding: 3px !important;" {{$r}}>
                              <option>Select</option>
                              @foreach($subscriptions as $key=>$subscription)
                                <option {{$r}} @if( $fsubA['code'] == $subscription->code ){{'selected'}}@endif value="{{$subscription->code}}">{{$subscription->code}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>

                      <div class="form-group cstmFormCWd">
                        <div class="controls">
                            <label>SNO</label>
                            <input type="text" style="width: 146px;"  class="" placeholder="SNO" name="sno_number[]" value="{{$fsubA['sno_number']}}" {{$r}} >
                        </div>
                      </div>

                      <div class="form-group cstmFormC act" >
                        <div class="controls">
                            <label>Activation</label>
                            <input type="text" class="" style="width: 85px;" placeholder="Activation" name="activation_code[]" value="{{$fsubA['activation_code']}}" {{$r}}>
                        </div>
                      </div>
                      

                      <div class="form-group cstmFormC" style="margin-left: 5px;">
                        <div class="controls">
                            <label>User</label>
                            <input type="text" class="" style="width: 45px;" placeholder="User" name="sub_user[]" value="{{$fsubA['user']}}" maxlength="3" {{$r}}>
                        </div>
                      </div>
                      <div class="form-group cstmFormC" style="margin-left: -39px;">
                        <div class="controls" >
                            <label>Start</label>
                            <input type="text" class="" style="width: 85px;" placeholder="Start" name="start[]" value="{{ ($fsubA['start']=='0000-00-00' || $fsubA['start'] =='' || $fsubA['start'] == '1970-01-01') ? ''  : date('d-m-Y',strtotime($fsubA['start']))}}" {{$r}}>
                        </div>
                      </div>



            
                      <div class="form-group cstmFormC">
                        <div class="controls">
                            <label>Expire</label>
                            <input type="text" class="" style="width: 85px;" placeholder="Expire" name="expire[]" value="{{ ($fsubA['expire']=='0000-00-00' || $fsubA['expire'] =='' || $fsubA['expire'] == '1970-01-01') ? ''  : date('d-m-Y',strtotime($fsubA['expire']))}}" {{$r}}>
                        </div>
                      </div>

                      <div class="form-group cstmFormC" >
                        <div class="controls">
                            <label>Location</label>
                            <input type="text" class="" style="width: 85px;" placeholder="Location" name="location[]" value="{{$fsubA['location']}}" {{$r}}>
                        </div>
                      </div>

                      <div class="form-group cstmFormC">
                        <div class="controls">
                            <label>Counter</label>
                            <input type="text" class="" style="width: 85px;" placeholder="Counter" name="counter[]" value="{{$fsubA['counter']}}" {{$r}}>
                        </div>
                      </div>
                      <div class="form-group cstmFormCWd">
                        <div class="controls">
                            <label>Remark</label>
                            <input type="text" class="" style="width: 85px;" placeholder="Remark" name="remark[]" value="{{$fsubA['remark']}}" {{$r}}>
                        </div>
                      </div>
                    </div>
            </div>
            </div>
                
            </div> 
            <div class="append-new-sectn">
              @if( !empty( $fsubB ) )
                @foreach( $fsubB as $singleB )
                  <div class="singleNewH">
                    <div class="row">
                      <div class="col-12 col-sm-12">
                          <style type="text/css">
                         


                          </style>
                              <div class="form-group cstmFormC">
                                <div class="controls kk">
                                    <!--label>Code</label-->
                                    <select class="selectSubs" name="code[]" style="width: 131px !important;
    padding: 3px !important;">
                                      <option>Select Code</option>
                                      @foreach($subscriptions as $key=>$subscription)
                                        <option @if( $singleB['code'] == $subscription->code ){{'selected'}}@endif value="{{$subscription->code}}">{{$subscription->code}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="form-group cstmFormCWd">
                                <div class="controls">
                                    <!--label>Sno Number</label-->
                                    <input type="text" class="" placeholder="SNO" name="sno_number[]" style="width: 146px;" value="{{$singleB['sno_number']}}" {{$r}}>
                                </div>
                              </div>
                              <div class="form-group cstmFormC act">
                                <div class="controls">
                                    <!--label>Activation Code</label-->
                                    <input type="text"  class="" style="width: 85px;" placeholder="Activation" name="activation_code[]" value="{{$singleB['activation_code']}}" {{$r}}>
                                </div>
                              </div>
                              

                              <div class="form-group cstmFormC" style="margin-left: 5px;">
                                <div class="controls">
                                    <!--label>User</label-->
                                    <input type="text" style="width: 45px;" class="" placeholder="User" name="sub_user[]" value="{{$singleB['user']}}" maxlength="3" {{$r}}>
                                </div>
                              </div>
                              <div class="form-group cstmFormC" style="margin-left: -39px;">
                                <div class="controls">
                                    <!--label>Start</label-->
                                    <input type="text" class="" style="width: 85px;" placeholder="Start" name="start[]" value="{{ ($singleB['start']=='0000-00-00' || $singleB['start']=='' || $singleB['start'] == '1970-01-01') ? ''  : date('d-m-Y',strtotime($singleB['start']))}}" {{$r}}>
                                </div>
                              </div>


                              <div class="form-group cstmFormC" >
                                <div class="controls">
                                    <!--label>Expire</label-->
                                    <input type="text" class="" style="width: 85px;" placeholder="Expire" name="expire[]" value="{{ ($singleB['expire']=='0000-00-00' ||  $singleB['expire']=='' || $singleB['expire'] == '1970-01-01') ? ''  : date('d-m-Y',strtotime($singleB['expire']))}}" {{$r}}>
                                </div>
                              </div>

                              <div class="form-group cstmFormC">
                                <div class="controls">
                                    <!--label>Location</label-->
                                    <input type="text" class="" style="width: 85px;" placeholder="Location" name="location[]" value="{{$singleB['location']}}" {{$r}}>
                                </div>
                              </div>

                              <div class="form-group cstmFormC">
                                <div class="controls">
                                    <!--label>Counter</label-->
                                    <input type="text" class="" style="width: 85px;" placeholder="Counter" name="counter[]" value="{{$singleB['counter']}}" {{$r}}>
                                </div>
                              </div>
                              <div class="form-group cstmFormCWd">
                                <div class="controls">
                                    <!--label>Remark</label-->
                                    <input type="text" class="" style="width: 85px;" placeholder="Remark" name="remark[]" value="{{$singleB['remark']}}" {{$r}}>
                                </div>
                              </div>
                              <?php
                              $perm = Helper::checkPermission();
                               
                              if(in_array('customer_subscription_delete',$perm)){ ?>
                              <span class="addRemoveBtn"><i class="bx bx-trash-alt"></i></span>
                              <?php } ?>
                    </div>
                    
                    </div>
                    <!--div class="col-12 d-flex flex-sm-row flex-column justify-content-end mb-1">
                      <button type="button" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 addRemoveBtn">Remove</button>
                    </div-->

                    </div>
                @endforeach
              @endif
            </div> 
        </div>
        <div class="tab-pane fade" id="other-info">
          <p class="other-info-error">Please enter unique email !!!</p>
          <div class="messg-tab">
            <h4 class="">Other Info</h4>
            <button type="button" class="btn btn-primary addMoreBtnIn" {{$o}}>Add More</button>
          </div>
          <div class="clone-class-cstm-in">
            <div class="custmRowIn">
              <div class="row">
                <div class="col-12 col-sm-12">
                      <style type="text/css"
                      >
                        
                      input.j {
                      width: 166px;
                      }
                      select.j {
                      width: 122px;
                      }
                      </style>
                        <div class="form-group cstmFormCO">
                          <div class="controls">
                              <label>Name</label>
                              <input type="text" class="j"  placeholder="Name" name="cname[]" value="{{$fsubAI['name']}}" {{$o}}>
                          </div>
                        </div>
                        <div class="form-group cstmFormCO" >
                          <div class="controls">
                              <label>Phone</label>
                              <input type="text"  class="j" placeholder="Phone" name="cphone[]" value="{{$fsubAI['phone']}}" {{$o}}>
                          </div>
                        </div>

                        <div class="form-group cstmFormCO">
                          <div class="controls">
                              <label>Email</label>
                              <input type="text" class="j" placeholder="Email" name="cemail[]" value="{{$fsubAI['email']}}" {{$o}}>
                          </div>
                        </div>

                        <div class="form-group cstmFormCO">
                          <div class="controls">
                              <label>Teamviewer Id</label>
                              <input type="text" class="j" placeholder="Teamviewer Id" name="teamviewer_id[]" value="{{$fsubAI['teamviewer_id']}}" {{$o}}>
                          </div>
                        </div>

                        <div class="form-group cstmFormCO">
                          <div class="controls">
                              <label>Status</label>
                              <select class="j" name="status[]" {{$o}}>
                                <option @if( $fsubAI['status'] == 1 ){{'selected'}}@endif value="1">Active</option>
                                <option @if( $fsubAI['status'] == 0 ){{'selected'}}@endif value="0">Non-Active</option>
                              </select>
                          </div>
                        </div>

                 </div>
                </div>
            </div>
          </div>
          <div class="append-new-sectn-in">
            @if( !empty( $fsubBI ) )
                @foreach( $fsubBI as $singleBI )
                  <div class="singleNewHIn">
                    <div class="row">
                      <div class="col-12 col-sm-12">

                              <div class="form-group cstmFormCO">
                                <div class="controls">
                                    <input type="text" class="j"  placeholder="Name" name="cname[]" value="{{$singleBI['name']}}" {{$o}}>
                                </div>
                              </div>
                              <div class="form-group cstmFormCO" >
                                <div class="controls">
                                    <input type="text" class="j"   placeholder="Phone" name="cphone[]" value="{{$singleBI['phone']}}" {{$o}}>
                                </div>
                              </div>

                              <div class="form-group cstmFormCO"  >
                                <div class="controls">
                                    <input type="text" class="j" placeholder="Email" name="cemail[]" value="{{$singleBI['email']}}" {{$o}}>
                                </div>
                              </div>
                              <div class="form-group cstmFormCO">
                                <div class="controls">
                                    <input type="text" class="j" placeholder="Teamviewer Id" name="teamviewer_id[]" value="{{$singleBI['teamviewer_id']}}" {{$o}}>
                                </div>
                              </div>

                              <div class="form-group cstmFormCO">
                                <div class="controls">
                                    <select class="j" name="status[]" {{$o}}>
                                      <option @if( $singleBI['status'] == 1 ){{'selected'}}@endif value="1">Active</option>
                                      <option @if( $singleBI['status'] == 0 ){{'selected'}}@endif value="0">Non-Active</option>
                                    </select>
                                </div>
                              </div>
                              <?php
                              $perm = Helper::checkPermission();
                               
                              if(in_array('customer_subscription_delete',$perm)){ ?>
                              <span class="addRemoveBtn"><i class="bx bx-trash-alt"></i></span>
                              <?php } ?>
                    </div>
                    
                    </div>

                    </div>
                @endforeach
              @endif
          </div>
        </div>
    </div>
    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                    @if($read !='readonly')
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 customerSubmit">Submit </button>
                    @endif
                      <button type="reset" class="btn btn-light" onclick="goBack()">Cancel</button>
                  </div>
</form>


      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
             
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            
            <!-- users edit account form ends -->
        </div>
         
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
    $('.expcheck').click(function(){
      var atr= $(this).attr('data');
      if($(this).prop("checked") == true){
        var check =1;
      }
      else if($(this).prop("checked") == false){
        var check =0;
      }
      $('.expcheck_'+atr).val(check);
    });
    $('.sagecover').click(function(){
      var atr= $(this).attr('data');
      if($(this).prop("checked") == true){
        var check =1;
      }
      else if($(this).prop("checked") == false){
        var check =0;
      }
      $('.sagecover_'+atr).val(check);
    });
    $('.customerSubmit').on('click',function(event){
      $('.other-info-error').hide();
      event.preventDefault();
      var values = $("input[name='cemail\\[\\]']").map(function(){return $(this).val();}).get();
      var unique = values.filter((item, i, ar) => ar.indexOf(item) === i);
     // alert(unique);
     $('#customerUpdate').submit();
      if( values.length == unique.length ){
        $('#customerUpdate').submit();
      }else{
       // $('.other-info-error').show();
      }
    });

    $(document).on('click','.addMoreBtn',function(event){
      event.preventDefault();
      var appendHtml = '';
      appendHtml += '<div class="singleNewH">';
      appendHtml += $('.clone-class-cstm .custmRow').html();
      //appendHtml += '<div class="col-12 d-flex flex-sm-row flex-column justify-content-end mb-1">';
      // appendHtml += '<button type="button" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 addRemoveBtn">Remove</button>';
      //appendHtml += '</div>';    
      appendHtml += '</div>';
      $('.append-new-sectn').append(appendHtml);
      $('.singleNewH:last').find('input').val(''); 
      $('.singleNewH:last').find('select').prop('selectedIndex',0);
      $('.singleNewH:last').find('label').remove();
      $('.singleNewH:last').find('.row .col-12').append('<span class="addRemoveBtn"><i class="bx bx-trash-alt"></i></span>');
    });

     $(document).on('click','.addMoreBtnIn',function(event){
      event.preventDefault();
      var appendHtml = '';
      appendHtml += '<div class="singleNewHIn">';
      appendHtml += $('.clone-class-cstm-in .custmRowIn').html();   
      appendHtml += '</div>';
      $('.append-new-sectn-in').append(appendHtml);
      $('.singleNewHIn:last').find('input').val('');
      $('.singleNewHIn:last').find('label').remove();
      $('.singleNewHIn:last').find('.row .col-12').append('<span class="addRemoveBtn"><i class="bx bx-trash-alt"></i></span>');
    });

    $(document).on('click','.addRemoveBtn',function(){
      $(this).parent().parent().remove();
    });

});


function goBack() {
  window.history.back();
}
</script>

<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection
