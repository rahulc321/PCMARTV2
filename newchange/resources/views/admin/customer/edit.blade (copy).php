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
 $read=0;
 if($read==1){
  $read='readonly';
 }else{
  $read='';
 }
 ?>
 <style type="text/css">
   @media (min-width: 300px) and (max-width: 991px){ 

 
.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    overflow-y: scroll;
}
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
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
             
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form class="form-validate" action="{{url('/app/customer/update')}}/{{$edit->id}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Number</label>
                            <input type="text" class="form-control" placeholder="Organization Number"
                                 " value="{{$edit->Organization_Number}}"
                                name="Organization_Number" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Name</label>
                            <input type="text" class="form-control" placeholder="Organization Name"
                                 " value="{{$edit->Organization_Name}}"
                                name="Organization_Name"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Address1</label>
                            <input type="text" class="form-control" placeholder="Address1"
                                 " value="{{$edit->Address1}}"
                                name="Address1"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Address2</label>
                            <input type="text" class="form-control" placeholder="Address2"
                                 " value="{{$edit->Address2}}"
                                name="Address2"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Address3</label>
                            <input type="text" class="form-control" placeholder="Address3"
                                 " value="{{$edit->Address3}}"
                                name="Address3"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Address4</label>
                            <input type="text" class="form-control" placeholder="Address4"
                                 " value="{{$edit->Address4}}"
                                name="Address4"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Attention</label>
                            <input type="text" class="form-control" placeholder="Attention"
                                 " value="{{$edit->Attention}}"
                                name="Attention"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Contact</label>
                            <input type="text" class="form-control" placeholder="Contact"
                                 " value="{{$edit->Contact}}"
                                name="Contact"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Primary Phone</label>
                            <input type="text" class="form-control" placeholder="Primary_Phone"
                                 " value="{{$edit->Primary_Phone}}"
                                name="Primary_Phone"  >
                        </div>
                      </div>
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">

                  <div class="form-group">
                        <div class="controls">
                            <label>Secondary Phone</label>
                            <input type="text" class="form-control" placeholder="Secondary_Phone"
                                 " value="{{$edit->Secondary_Phone}}"
                                name="Secondary_Phone"  >
                        </div>
                      </div>
                  <div class="form-group">
                        <div class="controls">
                            <label>Fax</label>
                            <input type="text" class="form-control" placeholder="Fax"
                                 " value="{{$edit->Fax}}"
                                name="Fax"  >
                        </div>
                  </div>
                  <div class="form-group">
                        <div class="controls">
                            <label>Primary Email</label>
                            <input type="text" class="form-control" placeholder="Primary_Email"
                                 " value="{{$edit->Primary_Email}}"
                                name="Primary_Email"  >
                        </div>
                  </div>

                      

                      <div class="form-group">
                        <div class="controls">
                            <label>Area</label>
                            <input type="text" class="form-control" placeholder="Area"
                                 " value="{{$edit->Area}}"
                                name="Area"  >
                        </div>
                      </div> 
                      <div class="form-group">
                        <div class="controls">
                            <label>Agent</label>
                            <input type="text" class="form-control" placeholder="Agent"
                                 " value="{{$edit->Agent}}"
                                name="Agent"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>ROC</label>
                            <input type="text" class="form-control" placeholder="ROC"
                                 " value="{{$edit->ROC}}"
                                name="ROC"  >
                        </div>
                      </div>
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>GST</label>
                            <input type="text" class="form-control" placeholder="GST"
                                 " value="{{$edit->GST}}"
                                name="GSTREGNO"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Blacklist</label>
                             <select class="form-control" name="Blacklist">
                             <option value="B" @if($edit->Blacklist=='B') {{'selected'}} @endif>Yes</option>
                             <option value="A" @if($edit->Blacklist !='B') {{'selected'}} @endif>No</option>
                               
                             </select>
                        </div>
                      </div>
                       

                       
                  </div>

                  <div class="additional_settings col-sm-12">
                  <h3>Additional Settings</h3>
                  <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Title</th>
                <th></th>
                <th>Exp Date</th>
                <th style="width: 200px !important">SNO Number</th>
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
              ?>

              <tr>
                <td>{{$product->title}}<input type="hidden" name="id[]" value="{{$product->id}}"><input type="hidden" name="title[]" value="{{$product->title}}" {{$read}}></td>
                <td><input type="checkbox"  class="expcheck" data="{{$key}}" {{$read}} @if($custoinfo['exp_date_checkbox']==1) {{'checked'}} @endif>
                <input type="hidden" name="expcheck[]" class="expcheck_{{$key}}" value="{{$val}}" >
                </td>
                <td><input type="text" style="width: 100px" name="exp_date[]" value="<?php echo $expDate?>" {{$read}}></td>
                <td><input type="text" name="sno[]" style="width: 178px" value="<?php echo $custoinfo['sno_number']?>" {{$read}}></td>
                <td><input type="text" name="user[]" style="width: 100px" value="<?php echo $custoinfo['user']?>" {{$read}}></td>

                <td><input type="checkbox" @if($custoinfo['sage_cover_checkbox']==1) {{'checked'}} @endif name="sagecover_checkbox[]" data="{{$key}}" class="sagecover" {{$read}}>

                <input type="hidden" name="sagecover_check[]" class="sagecover_{{$key}}" value="{{$val1}}" >
                </td>

                <td><input type="text" name="sagecover[]" style="width: 100px" value="<?php echo $sage_cover?>" {{$read}}></td>
                <!-- <td></td>
                <td></td> -->
              </tr>

              <?php }else{ ?>

              <tr>
                <td>{{$product->title}}<input type="hidden" name="id[]" value="{{$product->id}}"><input type="hidden" name="title[]" value="{{$product->title}}" {{$read}}></td>
                <td><input type="checkbox"  class="expcheck" data="{{$key}}" {{$read}} @if($custoinfo['exp_date_checkbox']==1) {{'checked'}} @endif>
                <input type="hidden" name="expcheck[]" class="expcheck_{{$key}}" value="{{$val}}" >
                </td>
                <td><input type="text" style="width: 100px" name="exp_date[]" value="<?php echo $custoinfo['exp_date']?>" {{$read}}></td>
                <td><input type="text" name="sno[]" style="width: 200px !important" value="<?php echo $custoinfo['sno_number']?>" {{$read}}></td>
                <td><input type="text" name="user[]" style="width: 100px" value="<?php echo $custoinfo['user']?>" {{$read}}></td>

                <td><input type="checkbox" @if($custoinfo['sage_cover_checkbox']==1) {{'checked'}} @endif name="sagecover_checkbox[]" data="{{$key}}" class="sagecover" {{$read}}>

                <input type="hidden" name="sagecover_check[]" class="sagecover_{{$key}}" value="{{$val1}}" >
                </td>

                <td><input type="text" name="sagecover[]" style="width: 100px" value="<?php echo $custoinfo['sage_cover']?>" {{$read}}></td>
                <!-- <td></td>
                <td></td> -->
              </tr>

              <?php } ?>
              @endforeach
               
               
            </tbody>
          </table>
                     
                  </div>
                  

                  
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                    @if($read !='readonly')
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit {{$read}}</button>
                    @endif
                      <button type="reset" class="btn btn-light" onclick="goBack()">Cancel</button>
                  </div>
                </div>
            </form>
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
