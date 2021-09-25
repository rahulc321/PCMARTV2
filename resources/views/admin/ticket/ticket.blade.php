@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Edit Ticket')
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
<!-- users edit start -->
<style type="text/css">
 
</style>
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit Ticket</span>
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
            <form class="form-validate" action="{{url('/app/ticket/update')}}/{{$edit->id}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                  
                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Name <span style="color:red"> (Please Type Slowly Slowly...)</span></label>
                             
                        <select class="js-example-basic-single oname form-control" name="ictran_id">
                        <option value="">--Select--</option>
                        <option value="{{$oname->id}}" selected>{{$oname->Organization_Name}}</option>
                        <!--  @foreach($records as $record)
                         <option value="">{{$record->Organization_Name.' - '.$record->Due_date}}</option>
                         @endforeach -->
                        </select>
                        </div>
                      </div>

                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Description</label>
                             
                        <textarea id="w3review" class="form-control" name="description" rows="4" cols="50">{{$edit->description}}</textarea>
                        </div>
                      </div>

                      
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">
                  <div class="form-group">
                        <div class="controls">
                            <label>Phone</label>
                            <input type="text" class="form-control p" placeholder="Phone"
                                 "
                                name="phone" required="" value="{{$edit->phone}}">
                        </div>
                      </div>
                   

                      

                      <div class="form-group">
                        <div class="controls">
                            <label>Contact Person</label>
                            <input type="text" class="form-control c" placeholder="Contact Person
                                 "
                                name="contact_person" required="" value="{{$edit->contact_person}}">
                        </div>
                      </div>

                       
                  </div>
                  

                  
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
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

<script>
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
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">

$(document).on('keyup','.select2-search__field', function(){
     var oname = $(this).val();
    // alert(oname);
    $('.oname').html(' ');
    $('.select2-search__field').html(' ');
       $.ajax({
            url:"{{url('/')}}/app/getOname",
            data:{"_token":"{{csrf_token()}}",'oname':oname},
            method:"post",
            dataType : "json",
            success:function(res){
            var dd=  res.oData;
            var firstId=  res.is1;
           // console.log(dd);     
            $.each(dd, function(key, value) {
            
            $('.oname')
            .append($('<option>', { value : value.id })
            .text(value.Organization_Name +' - '+value.exp+' ('+value.productName+')')); 
            });

            // After grtting response and then hit ajax

        $('.c').val(' ');
        $('.p').val(' ');
        $.ajax({
            url:"{{url('/')}}/app/getInfo",
            dataType: "json", // data type of response
            data:{"_token":"{{csrf_token()}}",'id':firstId},
            method:"post",
            success:function(res){
                    
                  $('.c').val(res.Contact);
                  $('.p').val(res.Primary_Phone);
            }
        });





            }
        });
    });


 
$(document).on('change','.oname', function(){

  var id= $(this).val();
  $('.c').val(' ');
  $('.p').val(' ');
  $.ajax({
            url:"{{url('/')}}/app/getInfo",
            dataType: "json", // data type of response
            data:{"_token":"{{csrf_token()}}",'id':id},
            method:"post",
            success:function(res){
                    
                  $('.c').val(res.Contact);
                  $('.p').val(res.Primary_Phone);
            }
        });

});

  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {


  
    $('.js-example-basic-single').select2();
});
</script>
@endsection
