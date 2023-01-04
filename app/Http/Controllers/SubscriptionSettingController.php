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
use App\Models\Transaction;
use App\Models\ProductCat;
use App\Models\CustomerSubscription;
use App\Helpers\Helper;
use XBase\Table;
use Carbon\Carbon;
session_start();

class SubscriptionSettingController extends Controller
{
	// for subscription module


  public function __construct()
  {
      date_default_timezone_set("Asia/Kuala_Lumpur");
  }

    
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
        $subscription->description_second= $request->description2;
        $subscription->add_user= $request->add_user;
        $subscription->cat= $request->cat;
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
        $subscription->description_second= $request->description2;
        $subscription->cat= $request->cat;
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
              if( !empty($singledata) && $singledata[1] !="" && $singledata[1] != 'MyAppID No.'){
              // echo $singledata[10];
             //echo '<pre>';print_r($singledata);
	              $rowData[$key]['no']=@$singledata[0];
	              $rowData[$key]['sno_number']=@$singledata[1];
	              $rowData[$key]['expire']=@$singledata[2];
	              $rowData[$key]['invoice']=@$singledata[3];
	              $rowData[$key]['account_code']=@$singledata[4];
	              $rowData[$key]['remark']=@$singledata[5];
	              $rowData[$key]['email']=@$singledata[6];
	              $rowData[$key]['contact_no']=@$singledata[7];
	              $rowData[$key]['type']=@$singledata[8];
	              //$rowData[$key]['product_name']=@$singledata[9];
	              $rowData[$key]['user']=@$singledata[9];
	             // $rowData[$key]['licence_price']=@$singledata[11];
	              //$rowData[$key]['cu_price']=@$singledata[12];
	              $rowData[$key]['total_price']=@$singledata[12];
	              $key++;
              }
              
            }

          //die;  
            $kk=1;
            foreach ($rowData as $key => $singleR) {
            	if($singleR['sno_number'] !="" && $singleR['sno_number'] != 'MyAppID No.'){
                // echo '<pre>';print_r($singleR['type']);
              	$subscription = new Transaction();
               
  		         // $subscription->invoice = $singleR['invoice'];
                $checkTransaction= Transaction::orwhere('sno_number',$singleR['sno_number'])->where('expire',date('Y-m-d',strtotime($singleR['expire'])))->first();
                if($checkTransaction){

                }else{
                  $SubscriptionSetting= SubscriptionSetting::where('description',$singleR['type'])->first();

                  echo $kk.'--'.$singleR['sno_number']; echo '<br>';

                  $checkSubscription= CustomerSubscription::where('sno_number',$singleR['sno_number'])->first();

                  if($checkSubscription){
                    $check2= CustomerSubscription::where('sno_number',$singleR['sno_number'])->get();

                    foreach ($check2 as $key => $value1) {
                    
                    $checkSubscription1= CustomerSubscription::where('id',$value1->id)->first();
                  //   echo $singleR['expire'];
                  // echo '<pre>';print_r($checkSubscription);die;
                    $checkSubscription1->expire = date('Y-m-d',strtotime($singleR['expire']));
                    $checkSubscription1->update();

                    }
                  
                  }

                  $cust = Cust::where('Organization_Number',@$checkSubscription->customer_id)->first();
                  $subscription->Organization_Name = @$cust->Organization_Name;
                  $subscription->customer_id = @$cust->Organization_Number;

                  $subscription->code = @$SubscriptionSetting->code;
    		          $subscription->sno_number = $singleR['sno_number'];
    		          $subscription->user = $singleR['user'];
    		          //$subscription->expire = date('Y-m-d',strtotime($singleR['expire']));

                  $subscription->start = date('Y-m-d', strtotime('- 1 year', strtotime($singleR['expire'])));
                  $subscription->expire = date('Y-m-d',strtotime($singleR['expire']));

                 /* $subscription->start = date('Y-m-d',strtotime($singleR['expire']));
                  $subscription->expire = date('Y-m-d', strtotime('+ 1 year', strtotime($singleR['expire'])));*/

                  $subscription->remark = $singleR['remark'];
    		          $subscription->total_price = $singleR['total_price'];
    		          $subscription->save();
                  $kk++;
                }
              }
            }

            //die;
         //    \Session::flash('message', 'You have successfully uploaded !!!');
        	// return redirect('app/uploads');
            #echo '<pre>';
            #print_r($rowData); die;
    }

    public function customerUpdate($id,Request $request){

        $all= $request->all();
       // / echo $request->Organization_Number;die;
        $checkCustI = CustInfo::where('cust_id',$request->Organization_Number)->get();
        $expDateArray= [];
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
          $expDateArray[] =  $ids->exp_date;
            $ids->delete();
        }


       //echo '<pre>';print_r($expDateArray);die;

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

            $perm = Helper::checkPermission();
                //  echo '<pre>';print_r($expDateArray);die;

             
               

              if(in_array('contract_due_date',$perm)){
                if($all['exp_date'][$key] != ''){
                $otherInfo->exp_date=@date('Y-m-d',strtotime($all['exp_date'][$key]));
                }
              }else{
                if(@$expDateArray[$key] != ''){
                $otherInfo->exp_date=@date('Y-m-d',strtotime($expDateArray[$key]));
                }
                
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
          $subscription->start = @date('Y-m-d',strtotime($all['start'][$keyA]));
          $subscription->expire = @date('Y-m-d',strtotime($all['expire'][$keyA]));
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
      if(in_array($module,Helper::checkPermission())){
      	$editDataC = 1;
      }else{
      	$editDataC = 0;
      }

      $module='customer_subscription_delete';
      if(in_array($module,Helper::checkPermission())){
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

      

    $records = Transaction::where(function ($query) use ($searchValue) {
        $query->where('Organization_Name', 'like', '%' .$searchValue . '%')
       ->orwhere('code', 'like', '%' .$searchValue . '%')
       ->orwhere('sno_number', 'like', '%' .$searchValue . '%')
       ->orwhere('user', 'like', '%' .$searchValue . '%')
       ->orwhere('invoice', 'like', '%' .$searchValue . '%')
       ->orwhere('total_price', 'like', '%' .$searchValue . '%')
       ->orwhere('customer_id', 'like', '%' .$searchValue . '%')
       ->orwhere('sno_number', 'like', '%' .$searchValue . '%')
       // ->orwhere('expire', 'like', '%' .date('Y-m-d',strtotime($searchValue)) . '%');
        ->orwhere('remark', 'like', '%' .$searchValue . '%');
        });


      if($_GET['startDate'] != "" && $_GET['endDate']){

        $startDate= date('Y-m-d',strtotime($_GET['startDate']));
        $endDate= date('Y-m-d',strtotime($_GET['endDate']));
        $records= $records->whereBetween('expire', [$startDate, $endDate]);
       }

       if($_GET['type'] != ""){

            $records= $records->where('code',$_GET['type']);
        }

        if($_GET['customer'] != ""){

            $records= $records->where('invoice', 'like', '%' .$_GET['customer'] . '%');
        }

        if($_GET['invoice'] != ""){

            $records= $records->where('status',$_GET['invoice']);
        }

         
       
    $records= $records->select('transaction.*');
        
   
    $recordr= $records->count();
    $records=   $records->skip($start)
   ->take($rowperpage);
    if($columnName=='total_price'){
      $records=$records->orderBy(\DB::raw('CAST(total_price AS SIGNED INTEGER)'),$columnSortOrder);
    }else{
      $records=$records->orderBy($columnName,$columnSortOrder);
    }
    $records=$records->get()->toArray();

    $totalRecordswithFilter =$recordr;
    $totalRecords =$totalRecordswithFilter;

      
    $data_arr = array();
     foreach($records as $record){


        $dueDate= strtotime($record['expire']);
        $toDayDate= strtotime(date('d-m-Y'));

        $dueDateColor=0;
        if($toDayDate > $dueDate){
        $dueDateColor=1;
        }


        // Get customer name
        $custNo= CustomerSubscription::where('sno_number',$record['sno_number'])->first();
        $custName= Cust::where('Organization_Number',@$custNo->customer_id)->first();
        $data_arr[] = array(
          "id" => $record['id'],
          "invoice" => $record['invoice'],
          "customer_id" => $record['Organization_Name'],
          "account_code" => $record['code'],
          "sno_number" => $record['sno_number'],
          "user" => $record['user'],
          "editDataC" => $editDataC,
          "deleteDataC" => $deleteDataC,
          "checkStatus" => $record['status'],
          "total_price" => $record['total_price'],
          "expire" => date('d-m-Y',strtotime($record['expire'])),
          "dueDateColor" => $dueDateColor,
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
        $this->data['edit']= Transaction::where('id',$id)->first()->toArray();
        //dd($this->data['edit']['customer_id']);
        $this->data['Organization_Name']= Cust::where('Organization_Number',$this->data['edit']['customer_id'])->first();
        $this->data['subscriptions']= SubscriptionSetting::get();
        return view('admin.subscription.edit',$this->data);
    }

    public function customerSubscriptionUpdate($id,Request $request){
        $all= $request->all();
          $cust= Cust::where('Organization_Number',$request->customer_id)->first();
          $subscription= Transaction::where('id',$id)->first();
          $subscription->customer_id = $request->customer_id;
          $subscription->Organization_Name = $cust->Organization_Name;
          $subscription->invoice = $request->invoice;
          $subscription->total_price = $request->total_price;
          $subscription->code = $request->code;
          $subscription->activation_code = $request->activation_code;
          $subscription->sno_number = $request->sno_number;
          $subscription->user = $request->user;
          $subscription->start = date('Y-m-d',strtotime($request->start));
          $subscription->expire = date('Y-m-d',strtotime($request->expire));
          $subscription->location = $request->location;
          $subscription->counter = $request->counter;
          $subscription->remark = $request->remark;
          $subscription->save();


        return redirect('app/customer-subscription-list')->withErrors(['Success', 'You have successfully updated !!!']);
    }
    // For customerDelete module
    public function customerSubscriptionDelete($id){
        $deleteCustomer= Transaction::where('id',$id)->delete();
        if($deleteCustomer){
            return redirect('app/customer-subscription-list')->withErrors(['Success', 'You have successfully deleted !!!']);
        }
    }

    public function customerSubscriptionList(Request $request){


          $prod= ProductCat::where('type',2)->get()->toArray();

          //echo '<pre>';print_r($prod);die;
          $arrayChart=[];
          foreach ($prod as $key => $value) {
            $statusArray= [0,2];
          $prod= SubscriptionSetting::where('cat',$value['id'])->get()->pluck('code')->toArray();
          $sum= Transaction::whereDate('expire','>=',date('Y-m-d'))->whereIn('status',$statusArray)->whereIn('code',$prod)->sum('total_price');
          //echo '<pre>';print_r($prod);
          $arrayChart[]['name']= $value['cat_name'];
          $arrayChart[$key]['sum']= $sum;

          }
          //echo '<pre>';print_r($arrayChart);die;
           $this->data['arrayChart']= $arrayChart;
         // die;


        $this->data['subscription']= Transaction::get();

        $this->data['Support_Type']= Transaction::groupby('code')->get();
        $invDates= Transaction::orderBy('expire')->get()->pluck('expire')->toArray();
        //dd(array_unique($invDate));
        $dateInv=[];
        foreach ($invDates as $key => $invDate) {
           $dateInv[]= date('Y',strtotime($invDate));
        }
        //dd(array_unique($dateInv));
        $this->data['invoice_date2']=array_unique($dateInv);

        // valid contract
        $statusArray= [0,2];
        $allrecord= Transaction::whereDate('expire','>=',date('Y-m-d'))->whereIn('status',$statusArray)->get();

        $totalCount= 0;
        $totalValue=0;
        foreach ($allrecord as $key => $value) {
            $totalValue+=str_replace(',','',$value->total_price);
            $totalCount++;
        }

      if($request->month){
        $year=$request->month;
        $Lastyear=$request->month-1;

      }else{

        $year=date('Y');
        $Lastyear=date("Y",strtotime("-1 year"));
      }

        
        // Renew status invoice_date
        $renewAll= Transaction::where('status',0)->whereMonth('expire',date('m'))->whereYear('expire',$year)->get();

        $renewCount= 0;
        $renewValue=0;
        foreach ($renewAll as $key => $value1) {
            $renewValue+=str_replace(',','',$value1->total_price);
            $renewCount++;
        }
        //dd($renewValue);
        // Get %
        $lastMonth= date('m', strtotime(date('Y-m')." -1 year")); 
        $lastYear= $Lastyear;
        $renewAllPer= Transaction::whereMonth('expire',$lastMonth)->whereYear('expire',$Lastyear)->get();
        $renewCountPer= 0;
        $renewValueLastMonth=0;
        foreach ($renewAllPer as $key => $value2) {
            $renewValueLastMonth+=str_replace(',','',$value2->total_price);
            $renewCountPer++;
        }
  
  //echo $Lastyear=date("Y",strtotime("-1 year"));echo '<br>';
  // echo $year; echo '<br>';
  // echo $Lastyear; echo '<br>';
  //die;
   if($request->typeww){
      $type11=$request->typeww;
   }else{
    $type11='';
   }

  $lastYear=[];
  $currentYear=[];
  
  for ($i=1; $i <=12 ; $i++) { 

   $monthSum= Transaction::whereYear('expire',$year)->whereMonth('expire',$i);
   if($type11){
    $monthSum= $monthSum->where('code',$type11);
   }
   $monthSum= $monthSum->sum('total_price');
   $currentYear[]=$monthSum;


   // Last Year
   $lastMonthSum= Transaction::whereYear('expire',$Lastyear)->whereMonth('expire',$i);
    if($type11){
    $lastMonthSum= $lastMonthSum->where('code',$type11);
    }
   $lastMonthSum= $lastMonthSum->sum('total_price');
   $lastYear[]=$lastMonthSum;


  }
 
        $totalCount1= $renewCount-$renewCountPer;
        $totalvaluePer= $renewValue-$renewValueLastMonth;
        $this->data['totalPercentage']= ($renewCountPer==0) ? 0 : $totalCount1*100/$renewCountPer;
        $this->data['totalvaluePer']= ($renewValueLastMonth==0) ? 0 : $totalvaluePer*100/$renewValueLastMonth;

        $this->data['renewCount']=$renewCount;
        $this->data['renewValue']=$renewValue;

        $this->data['totalCount']=$totalCount;
        $this->data['totalValue']=$totalValue;
        $this->data['currentYear']=$currentYear;
        $this->data['lastYear']=$lastYear;


        return view('admin.subscription.list',$this->data);
    }

    public function renew($id){
        
        $subscription= Transaction::where('id',$id)->first();
        $subscription->status= 1;
        $subscription->save();
        return \Redirect::back()->withErrors(['Success', 'You have successfully renew !!!']);

       // return redirect('app/service-contract')->withErrors(['Success', 'You have successfully renew !!!']);
     
    }
    public function agree($id){
        
        $subscription= Transaction::where('id',$id)->first();
        $subscription->status= 2;
        $subscription->save();

        return \Redirect::back()->withErrors(['Success', 'You have successfully agree !!!']);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully agree !!!']);
     
    }
    public function cancelled($id){
        
        $subscription= Transaction::where('id',$id)->first();
        $subscription->status= 3;
        $subscription->save();
        return \Redirect::back()->withErrors(['Success', 'You have successfully cancelled !!!']);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully cancelled !!!']);
     
    }

}