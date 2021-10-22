@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Role Edit')
{{-- vendor styles --}}
@section('vendor-styles')
<?php error_reporting(0); ?>
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection

@section('content')
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
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Edit Role</span>
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
            <form class="form-validate" action="{{url('/app/role/update')}}/{{$edit->id}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Role Name</label>
                            <input type="text" class="form-control" placeholder="Name"
                                value="{{$edit->role}}"
                                name="role">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" @if($edit->status==1) {{'selected'}} @endif>Active</option>
                             
                            <option value="0" @if($edit->status==0) {{'selected'}} @endif>Deactive</option>
                        </select>
                      </div>
                       
                  </div>
                   
                  <div class="col-12">
                       
                       {{-- <table class="table mt-1">
                            <thead>
                                <tr>
                                  <th>Module</th>
                                  <th>Show</th>
                                  <th>Add</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($allPermision as $key=>$value)
                              <?php
                             // echo '<pre>';print_r($value['get_all_moduel']);
                              ?>
                                <tr>
                                  <td>{{$value['module_name']}}</td>
                                  @foreach($value['get_all_moduel'] as $t=>$data)
                                  <td>
                                      <div class="checkbox"><input type="checkbox"
                                            id="users-checkbox{{$data['module_key']}}" class="checkbox-input" name="keyname[]" value="{{$data['module_key']}}" <?php if(in_array($data['module_key'],$userKey)){ echo 'checked'; } ?>> 
                                        <label for="users-checkbox{{$data['module_key']}}"></label>
                                      </div>
                                  </td>
                                   @endforeach
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>--}}

                        <table class="table table-striped table-bordered bootstrap-datatable" 
                  style="width:100%;">

                    <tr>
                                            <th width="16%">Module</th>
                                            <th width="16%">List</th>
                                            <th width="10%">Add</th>
                                            <th width="16%">Edit/Send</th>
                                            <th width="10%">Delete</th>
                                            <th width="16%">&nbsp;</th>
                    </tr>

                    <tr>

                      <th>Dashboard</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="dashboard_show" <?php if(in_array('dashboard_show',$userKey)){ echo 'checked'; } ?>>

                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <th>Role</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="Role_show" <?php if(in_array('Role_show',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="Role_add" <?php if(in_array('Role_add',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="Role_edit" <?php if(in_array('Role_edit',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="Role_delete" <?php if(in_array('Role_delete',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td></td>

                    </tr>

                    <tr>

                      <th>User</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="User_show" <?php if(in_array('User_show',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="User_add" <?php if(in_array('User_add',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="User_edit" <?php if(in_array('User_edit',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="User_delete" <?php if(in_array('User_delete',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td></td>

                    </tr>


                     <tr>

                      <th>Settings</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="setting_show" <?php if(in_array('setting_show',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="setting_add" <?php if(in_array('setting_add',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="setting_edit" <?php if(in_array('setting_edit',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="setting_delete" <?php if(in_array('setting_delete',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td></td>

                    </tr>

                    <tr>

                      <th>Website Info</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="web_info" <?php if(in_array('web_info',$userKey)){ echo 'checked'; } ?>>

                      </td>
                      <td></td>
                      <td><input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="web_edit" <?php if(in_array('web_edit',$userKey)){ echo 'checked'; } ?>></td>
                      <td></td>
                      <td></td>
                    </tr>


                    <tr>

                      <th>Convert Date Format</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="date_format_show" <?php if(in_array('date_format_show',$userKey)){ echo 'checked'; } ?>>

                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <th>Upload</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="admin_user_list" name="keyname[]" value="upload_show" <?php if(in_array('upload_show',$userKey)){ echo 'checked'; } ?>>

                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <th>Customers</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="customer_show" <?php if(in_array('customer_show',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>
                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="customer_add" <?php if(in_array('customer_add',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                      <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="customer_edit" <?php if(in_array('customer_edit',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="customer_delete" <?php if(in_array('customer_delete',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td></td>

                    </tr>

                    <tr>

                      <th>Service Contracts</th>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="contract_show" <?php if(in_array('contract_show',$userKey)){ echo 'checked'; } ?>> 

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="contract_add" <?php if(in_array('contract_add',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="contract_edit" <?php if(in_array('contract_edit',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="contract_delete" <?php if(in_array('contract_delete',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                       <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="contract_due_date" <?php if(in_array('contract_due_date',$userKey)){ echo 'checked'; } ?>> &nbsp;Due Date 

                        <br><br>
                          <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="contract_hide_value" <?php if(in_array('contract_hide_value',$userKey)){ echo 'checked'; } ?>> Value(GST) 

                      </td>

                    </tr>

                    <tr>

                      <th>Ticketing</th>

                      <td>

                       <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="tickect_show" <?php if(in_array('tickect_show',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="tickect_add" <?php if(in_array('tickect_add',$userKey)){ echo 'checked'; } ?>>
 
                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="tickect_edit" <?php if(in_array('tickect_edit',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="tickect_delete" <?php if(in_array('tickect_delete',$userKey)){ echo 'checked'; } ?>>

                      </td>

                      <td>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="ticket_multiple" <?php if(in_array('ticket_multiple',$userKey)){ echo 'checked'; } ?>> &nbsp;Multiple

                        <br><br>

                        <input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="ticket_red_renew" <?php if(in_array('ticket_red_renew',$userKey)){ echo 'checked'; } ?>> &nbsp;Red Renew

                      </td>

                    </tr>

                    <tr>

                      <th>Email Marketing</th>

                      <td><input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="email_marketing_show" <?php if(in_array('email_marketing_show',$userKey)){ echo 'checked'; } ?>></td>

                      <td></td>

                      <td><input type="checkbox" class="i-checks" id="dashboard" name="keyname[]" value="email_marketing_send" <?php if(in_array('email_marketing_send',$userKey)){ echo 'checked'; } ?>></td>

                      <td></td>
                      <td></td>
                    </tr>

                    
                  </table>
                      

                      <div class="col-12">
                      <h3>Day wise Permission</h3>
                      <?php
                            error_reporting(0);
                             $tarr = array("01:00:00","01:30:00",
                                        "02:00:00","02:30:00",
                                        "03:00:00","03:30:00",
                                        "04:00:00","04:30:00",
                                        "05:00:00","05:30:00",
                                        "06:00:00","06:30:00",
                                        "07:00:00","07:30:00",
                                        "08:00:00","08:30:00",
                                        "09:00:00","09:30:00",
                                        "10:00:00","10:30:00",
                                        "11:00:00","11:30:00",
                                        "12:00:00","12:30:00",
                                        "13:00:00","13:30:00",
                                        "14:00:00","14:30:00",
                                        "15:00:00","15:30:00",
                                        "16:00:00","16:30:00",
                                        "17:00:00","17:30:00",
                                        "18:00:00","18:30:00",
                                        "19:00:00","19:30:00",
                                        "20:00:00","20:30:00",
                                        "21:00:00","21:30:00",
                                        "22:00:00","22:30:00",
                                        "23:00:00","23:30:00",
                                        "23:30:00","24:00:00"
                                    );
                    //echo $count = count($tarr);
                    
                    $dayArray= ['0'=>'Sunday','1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday'];
                    for($i=0; $i<count($dayArray);$i++){

                      //echo '<pre>';print_r($loginTime[$i]['start_time']);die;

                    ?>
                      <div class="col-sm-4" style="float: left;padding: 4px;">
                      <?=$dayArray[$i]?>
                      </div>
                      <div class="col-sm-4" style="float: left;padding: 4px;">
                                <select class="form-control input-sm" name="from_from[]" id="sunday_from">
                                    <option value=" ">From time</option>
                                    <?php foreach($tarr as $key => $value) { ?>
                                    <option value="<?php echo  $value; ?>"
                                    <?php if($value == $loginTime[$i]['start_time']){echo "selected";} ?>>
                                    <?php echo  $value; ?></option>
                                    <?php } ?>
                                </select>
                      </div>
                      <div class="col-sm-4" style="float: left;padding: 4px;">
                          <select class="form-control input-sm" name="from_to[]" id="sunday_to">
                                    <option value=" ">To time</option>
                                    <?php foreach($tarr as $key => $value) { ?>
                                    <option value="<?php echo  $value; ?>"
                                    <?php if($value == $loginTime[$i]['end_time']){echo "selected";} ?>>
                                    <?php echo  $value; ?></option>
                                    <?php } ?>
                                </select>
                      </div>
                    <?php } ?>



                      </div>
                  </div>
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                        changes</button>
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
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection
