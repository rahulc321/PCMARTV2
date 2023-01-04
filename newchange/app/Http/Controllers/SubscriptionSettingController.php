<?php

namespace App\Http\Controllers;
require_once base_path().'/dbf/vendor/autoload.php';
use App\User;
use Illuminate\Http\Request;
use App\Models\SubscriptionSetting;
use App\Models\Cust;
use App\Models\Ictran;
use App\Models\Info;
use App\Models\CustomerInfo;
use App\Models\CustInfo;
use App\Models\CustomerSubscription;
use App\Helpers\Helper;
use XBase\Table;
use Carbon\Carbon;
session_start();

class SubscriptionSettingController extends Controller
{
	// for subscription module
    
    public function subscription(){
        $this->data['subscriptions']= SubscriptionSetting::get();
        return view('admin.subscription_setting.list',$this->data) ;
    }
    // for settind related
    public function subscriptionAdd(){ 
        return view('admin.subscription_setting.add') ;
    }

    public function subscriptionStore(Request $request){
        $subscription= new SubscriptionSetting();
        $subscription->code= $request->code;
        $subscription->first_user= $request->first_user;
        $subscription->description= $request->description;
        $subscription->add_user= $request->add_user;
        $subscription->tax= $request->tax;
        $subscription->save();

        return redirect('app/subscription/list')->withErrors(['Success', 'You have successfully added !!!']);
    }


    public function subscriptionEdit($id){
    $this->data['edit']= SubscriptionSetting::where('id',$id)->first();
     
    return view('admin.subscription_setting.edit',$this->data);
  }

  public function subscriptionUpdate(Request $request,$id){
        $subscription= SubscriptionSetting::where('id',$id)->first();
        $subscription->code= $request->code;
        $subscription->first_user= $request->first_user;
        $subscription->description= $request->description;
        $subscription->add_user= $request->add_user;
        $subscription->tax= $request->tax;
        $subscription->save();

        return redirect('app/subscription/list')->withErrors(['Success', 'You have successfully updated !!!']);
    }

    public function subscriptionDelete($id){
        

        $subscription = SubscriptionSetting::where('id',$id)->delete();
        if($subscription){ 
            return redirect('app/subscription/list')->withErrors(['Success', 'You have successfully deleted !!!']);
        }
    }

    public function uploadFile(Request $request){
    		 $logofile = $request->file('file');
            $fileD = fopen($logofile,"r");
            $rowDataN = array();
            $key = 0;
            while(!feof($fileD)){
              $singledata = fgetcsv($fileD);
              if( !empty($singledata) ){
	              $rowData[$key]['no']=@$singledata[0];
	              $rowData[$key]['sno_number']=@$singledata[1];
	              $rowData[$key]['expire']=@$singledata[2];
	              $rowData[$key]['invoice']=@$singledata[3];
	              $rowData[$key]['account_code']=@$singledata[4];
	              $rowData[$key]['remark']=@$singledata[5];
	              $rowData[$key]['email']=@$singledata[6];
	              $rowData[$key]['contact_no']=@$singledata[7];
	              $rowData[$key]['type']=@$singledata[8];
	              $rowData[$key]['product_name']=@$singledata[9];
	              $rowData[$key]['user']=@$singledata[10];
	              $rowData[$key]['licence_price']=@$singledata[11];
	              $rowData[$key]['cu_price']=@$singledata[12];
	              $rowData[$key]['total_price']=@$singledata[13];
	              $key++;
              }
              
            }
            foreach ($rowData as $key => $singleR) {
            	
            	$subscription = new CustomerSubscription();
              $subscription->account_code = $singleR['account_code'];
		          $subscription->invoice = $singleR['invoice'];
		          $subscription->sno_number = $singleR['sno_number'];
		          $subscription->user = $singleR['user'];
		          $subscription->expire = $singleR['expire'];
              $subscription->remark = $singleR['remark'];
		          $subscription->total_price = $singleR['total_price'];
		          $subscription->save();
            }
            \Session::flash('message', 'You have successfully uploaded !!!');
        	return redirect('app/uploads');
            #echo '<pre>';
            #print_r($rowData); die;
    }

    public function customerUpdate($id,Request $request){

        $all= $request->all();

        $checkCustI = CustInfo::where('cust_id',$request->Organization_Number)->get();
      
        foreach($checkCustI as $key=>$ids){
            $ids->delete();
        }
        foreach ($all['cname'] as $keyAI => $singleAI) {
          	  $subscription = new CustInfo();
	          $subscription->cust_id = $request->Organization_Number;
	          $subscription->name = $singleAI;
	          $subscription->email = @$all['cemail'][$keyAI];
	          $subscription->phone = @$all['cphone'][$keyAI];
	          $subscription->teamviewer_id = @$all['teamviewer_id'][$keyAI];
	          $subscription->status = @$all['status'][$keyAI];
	          $subscription->save();
        }

       // echo '<pre>';print_r($all);

        // die;

        
        $checkInfo = CustomerInfo::where('customer_id',$request->Organization_Number)->get();
        $checkSubs = CustomerSubscription::where('customer_id',$request->Organization_Number)->get();
      
        foreach($checkInfo as $key=>$ids){
            $ids->delete();
        }

        foreach($checkSubs as $key=>$idas){
            $idas->delete();
        }

        $updateIds=[];
        foreach($all['id'] as $key=>$ids){

            if($all['expcheck'][$key]==1){
                $updateIds[]=$all['id'][$key];
            }


            $otherInfo = new CustomerInfo();
            $otherInfo->customer_id=$request->Organization_Number;
            $otherInfo->setting_id=@$all['id'][$key];
            $otherInfo->exp_date_checkbox=@$all['expcheck'][$key];
            if($all['exp_date'][$key] != ""){
            $otherInfo->exp_date=@date('Y-m-d',strtotime($all['exp_date'][$key]));
            }
            $otherInfo->sno_number=@$all['sno'][$key];
            $otherInfo->user=@$all['user'][$key];
            if($all['sagecover'][$key] != ""){
            $otherInfo->sage_cover=@date('Y-m-d',strtotime($all['sagecover'][$key]));
            }
            $otherInfo->sage_cover_checkbox=@$all['sagecover_check'][$key];
            $otherInfo->info_type=@$all['title'][$key];
            $otherInfo->save();
          //  echo $ids.'>>>'.$all['title'][$key].'>>'.$all['sno'][$key].'>>'.$all['user'][$key].'>>'.$all['sagecover'][$key];echo '<br>';
        }

        foreach ($all['code'] as $keyA => $singleA) {
          $subscription = new CustomerSubscription();
          $subscription->customer_id = $request->Organization_Number;
          $subscription->code = $singleA;
          $subscription->activation_code = @$all['activation_code'][$keyA];
          $subscription->sno_number = @$all['sno_number'][$keyA];
          $subscription->user = @$all['sub_user'][$keyA];
          $subscription->start = @$all['start'][$keyA];
          $subscription->expire = @$all['expire'][$keyA];
          $subscription->location = @$all['location'][$keyA];
          $subscription->counter = @$all['counter'][$keyA];
          $subscription->remark = @$all['remark'][$keyA];
          $subscription->save();
        }

        // echo '<pre>';print_r($updateIds);

        // die;


        /*$ictran = Ictran::where('CUSTNO',$request->Organization_Number)->first();
        $ictran->product= implode(',',$updateIds);
        $ictran->save();*/

        $custUpdate= Cust::where('id',$id)->first();
        $custUpdate->Organization_Number= $request->Organization_Number;
        $custUpdate->Organization_Name= $request->Organization_Name;
        $custUpdate->Address1= $request->Address1;
        $custUpdate->Address2= $request->Address2;
        $custUpdate->Address3= $request->Address3;
        $custUpdate->Address4= $request->Address4;
        $custUpdate->Attention= $request->Attention;
        $custUpdate->Contact= $request->Contact;
        $custUpdate->Primary_Phone= $request->Primary_Phone;
        $custUpdate->Secondary_Phone= $request->Secondary_Phone;
        $custUpdate->Fax= $request->Fax;
        $custUpdate->Primary_Email= $request->Primary_Email;
        $custUpdate->Area= $request->Area;
        $custUpdate->Agent= $request->Agent;
        $custUpdate->ROC= $request->ROC;
        $custUpdate->GST= $request->GSTREGNO;
        $custUpdate->Blacklist= $request->Blacklist;
        $custUpdate->save();

        // Insert data in CustInfo table

        
        /* $checkCust= CustInfo::where('cust_id',$id)->first();

        if($checkCust){

          $checkCust->name= $request->cname;
          $checkCust->email= $request->email;
          $checkCust->phone= $request->phone;
          $checkCust->teamviewer_id= $request->teamviewer_id;
          $checkCust->save();
        }else{
          $cust= new CustInfo();
          $cust->cust_id= $id;
          $cust->name= $request->cname;
          $cust->email= $request->email;
          $cust->phone= $request->phone;
          $cust->teamviewer_id= $request->teamviewer_id;
          $cust->save();
        } */


        return redirect('app/customer')->withErrors(['Success', 'You have successfully updated !!!']);
    }

    public function customerSubscription(Request $request){

      $module='customer_subscription_edit';
      if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1 ){
      	$editDataC = 1;
      }else{
      	$editDataC = 0;
      }

      $module='customer_subscription_delete';
      if(in_array($module,Helper::checkPermission()) || Auth::user()->user_type==1 ){
      	$deleteDataC = 1;
      }else{
      	$deleteDataC = 0;
      }

         ## Read value
     $draw = $request->get('draw');
     $start = $request->get("start");
     $rowperpage = $request->get("length"); // Rows display per page

     $columnIndex_arr = $request->get('order');
     $columnName_arr = $request->get('columns');
     $order_arr = $request->get('order');
     $search_arr = $request->get('search');

     $columnIndex = $columnIndex_arr[0]['column']; // Column index
     $columnName = $columnName_arr[$columnIndex]['data']; // Column name
     $columnSortOrder = $order_arr[0]['dir']; // asc or desc
     $searchValue = $search_arr['value']; // Search value

      

    $records = CustomerSubscription::where(function ($query) use ($searchValue) {
        $query->where('arcust_subscription.customer_id', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust_subscription.account_code', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust_subscription.sno_number', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust_subscription.user', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust_subscription.remark', 'like', '%' .$searchValue . '%');
        });

         
       
    $records= $records->select('arcust_subscription.*');
        
   
    $recordr= $records->count();
    $records=   $records->skip($start)
   ->take($rowperpage)
    ->orderBy($columnName,$columnSortOrder)
    ->get()->toArray();

    $totalRecordswithFilter =$recordr;
    $totalRecords =$totalRecordswithFilter;

      
    $data_arr = array();
     foreach($records as $record){

        $data_arr[] = array(
          "id" => $record['id'],
          "invoice" => $record['invoice'],
          "customer_id" => $record['customer_id'],
          "account_code" => $record['account_code'],
          "sno_number" => $record['sno_number'],
          "user" => $record['user'],
          "editDataC" => $editDataC,
          "deleteDataC" => $deleteDataC,
          "checkStatus" => $record['status'],
          "price" => $record['total_price'],
          "btn" => '',
          "remark" => $record['remark']
        );
     }

     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "aaData" => $data_arr
     );

     echo json_encode($response);
     exit;

    }

    public function customerSubscriptionCreate(){
        $this->data['subscriptions']= SubscriptionSetting::get();
        return view('admin.subscription.add',$this->data);
    }

    public function customerSubscriptionStore(Request $request){
          $all= $request->all();

          $subscription = new CustomerSubscription();
          $subscription->customer_id = $request->customer_id;
          $subscription->invoice = $request->invoice;
          $subscription->account_code = $request->account_code;
          $subscription->code = $request->code;
          $subscription->activation_code = $request->activation_code;
          $subscription->sno_number = $request->sno_number;
          $subscription->user = $request->user;
          $subscription->start = $request->start;
          $subscription->expire = $request->expire;
          $subscription->location = $request->location;
          $subscription->counter = $request->counter;
          $subscription->remark = $request->remark;
          $subscription->save();


        return redirect('app/customer-subscription-list')->withErrors(['Success', 'You have successfully updated !!!']);
    }

    public function customerSubscriptionEdit($id){
        $this->data['edit']= CustomerSubscription::where('id',$id)->first()->toArray();
        $this->data['subscriptions']= SubscriptionSetting::get();
        return view('admin.subscription.edit',$this->data);
    }

    public function customerSubscriptionUpdate($id,Request $request){
        $all= $request->all();

          $subscription= CustomerSubscription::where('id',$id)->first();
          $subscription->customer_id = $request->customer_id;
          $subscription->invoice = $request->invoice;
          $subscription->account_code = $request->account_code;
          $subscription->code = $request->code;
          $subscription->activation_code = $request->activation_code;
          $subscription->sno_number = $request->sno_number;
          $subscription->user = $request->user;
          $subscription->start = $request->start;
          $subscription->expire = $request->expire;
          $subscription->location = $request->location;
          $subscription->counter = $request->counter;
          $subscription->remark = $request->remark;
          $subscription->save();


        return redirect('app/customer-subscription-list')->withErrors(['Success', 'You have successfully updated !!!']);
    }
    // For customerDelete module
    public function customerSubscriptionDelete($id){
        $deleteCustomer= CustomerSubscription::where('id',$id)->delete();
        if($deleteCustomer){
            return redirect('app/customer-subscription-list')->withErrors(['Success', 'You have successfully deleted !!!']);
        }
    }

    public function customerSubscriptionList(){
        $this->data['subscription']= CustomerSubscription::get();
        return view('admin.subscription.list',$this->data);
    }

    public function renew($id){
        
        $subscription= CustomerSubscription::where('id',$id)->first();
        $subscription->status= 1;
        $subscription->save();
        return \Redirect::back()->withErrors(['Success', 'You have successfully renew !!!']);

       // return redirect('app/service-contract')->withErrors(['Success', 'You have successfully renew !!!']);
     
    }
    public function agree($id){
        
        $subscription= CustomerSubscription::where('id',$id)->first();
        $subscription->status= 2;
        $subscription->save();

        return \Redirect::back()->withErrors(['Success', 'You have successfully agree !!!']);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully agree !!!']);
     
    }
    public function cancelled($id){
        
        $subscription= CustomerSubscription::where('id',$id)->first();
        $subscription->status= 3;
        $subscription->save();
        return \Redirect::back()->withErrors(['Success', 'You have successfully cancelled !!!']);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully cancelled !!!']);
     
    }

}