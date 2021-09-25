<?php

namespace App\Http\Controllers;
require_once base_path().'/dbf/vendor/autoload.php';
use App\User;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\LoginTime;
use App\Models\UserPermission;
use App\Models\Role;
use App\Models\Product;
use App\Models\Cust;
use App\Models\Ictran;
use App\Models\Info;
use App\Models\CustomerInfo;
use App\Models\Ticket;
use App\Models\AssignTicket;
use App\Models\Feedback;
use App\Models\CustInfo;
use App\Models\SubscriptionSetting;
use App\Models\CustomerSubscription;
use App\Helpers\Helper;
use XBase\Table;
use Carbon\Carbon;
session_start();

class UsersController extends Controller
{


    //ecommerce
    public function dashboardEcommerce(Request $request){
      error_reporting(0);
     // die;
     // echo date('Y-m-d H:i:s');die;
        if(\Auth::user()->is_active!=1){
            return redirect('/admin');
        }
       // echo $request->userid;
        //dd($request->userid);
        if($request->userid ==""){
            $userId= \Auth::user()->id;
            $this->data['uuname']=\Auth::user()->name;
        }else{
            $userId=$request->userid;
            $this->data['uuname']=User::where('id',$userId)->first()->name;
        }


        $data= Ticket::get()->pluck('ictran_id');
        $userIdArray= AssignTicket::get()->pluck('user_id');
        $this->data['users']= User::whereIn('id',$userIdArray)->get()->toArray();
        $this->data['customers']= Ictran::whereIn('id',$data)->get()->toArray();

       //  $records =\DB::table('ticket');
       // //  ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
       // //  ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
       // //  ->join('users', 'users.id', '=', 'ticket_assign.user_id')
       // //  ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       // // ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*');
       // $records= $records->where('ticket.status',2)->get()->toArray();

       /*$recordOpen =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*')
       ->where('ticket.status',0)->get()->toArray();
       //echo count($recordOpen);die;

       // Particular user data
       $LoginUserData =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*');
       $LoginUserData= $LoginUserData->where('ticket.status',2)->where('ticket_assign.user_id',$userId)->get()->toArray();

       // Particular user data
       $ratings =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*');
       $ratings= $ratings->where('ticket.status',2)->where('ticket_assign.user_id',$userId)->pluck('ticket_assign.ticket_id')->toArray();
        
        $gtData= Feedback::whereIn('ticket_id',$ratings)->get();
       // List all user
        $allUser =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*','users.id as uid')->groupBy('users.name')->get();*/
       //dd($allUser);

    $this->data['recordOpen']= $recordOpen;
    $this->data['records']= $records;
    $this->data['LoginUserData']= $LoginUserData;
    $this->data['ratings']= $gtData;
    $this->data['allUser']= $allUser;


    // New  code
    $openTicket= Ticket::where('status',0)->count();
    $closedTicket= Ticket::where('status',2)->count();

    // 2 h grather
    $date = new \DateTime();
    $date->modify('-120 minutes');
    $formatted_date = $date->format('Y-m-d H:i:s');
    $twohgreather= Ticket::where('created_at', '>',$formatted_date)->where('status',0)->count();


    // 30 minutes less
    $date1 = new \DateTime();
    $date1->modify('-30 minutes');
    $formatted_date1 = $date1->format('Y-m-d H:i:s');
    $less30Minutes= Ticket::where('created_at', '>',$formatted_date1)->where('created_at', '<',$formatted_date)->where('status',0)->count();



      $this->data['openTicket']= $openTicket;
      $this->data['closedTicket']= $closedTicket;
      $this->data['twohgreather']= $twohgreather;
      $this->data['less30Minutes']= $less30Minutes;


        \Session::put('backUrl', url()->current());
        return view('admin.dashboard.dashboard',$this->data);
    }

     public function dashboardTicket(Request $request){

    $perm = Helper::checkPermission();
    $ticket_red_renew=0;
    if(in_array('ticket_red_renew',$perm)){
        $ticket_red_renew=1;
    }
    // Delete ticket
    $tickect_delete=0;
    if(in_array('tickect_delete',$perm)){
        $tickect_delete=1;
    }
    $tickect_edit=0;
    if(in_array('tickect_edit',$perm)){
        $tickect_edit=1;
    }
    $contract_edit=0;
    if(in_array('contract_edit',$perm)){
        $contract_edit=1;
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
     \Session::put('key',$searchValue);

      
     // for user only filter

     $status=0;
     if($_GET['status'] != ""){
        $status=$_GET['status'];
     }
     
     // Fetch records
    $records =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
                    
        
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*')
        ->where(function ($query) use ($searchValue) {
        $query->orwhere('ticket_assign.phone', 'like', '%' .$searchValue . '%')
        ->orwhere('ticket.ictran_id', 'like', '%' .$searchValue . '%')
        ->orwhere('ticket_assign.contact_person', 'like', '%' .$searchValue . '%')
        ->orwhere('ticket.created_at', 'like', '%' .$searchValue . '%')
        ->orwhere('users.name', 'like', '%' .$searchValue . '%')
        ->orwhere('ictran.Organization_Name', 'like', '%' .$searchValue . '%');
        //->orWhere('ticket.status', 'like', '%' .$searchValue . '%');
        });
        
       if($_GET['startDate'] != "" && $_GET['endDate']){

        $startDate= date('Y-m-d',strtotime($_GET['startDate']));
        $endDate= date('Y-m-d',strtotime($_GET['endDate']));
        $records= $records->whereBetween('ticket.created_at', [$startDate.' 00:00:00', $endDate.' 23:59:59']);
       }
       if($_GET['customer'] != ""){

            $records= $records->where('ictran.id',$_GET['customer']);
        }
        if($_GET['user'] != ""){

            $records= $records->where('users.id',$_GET['user']);
        }
        if($_GET['rating'] != ""){

            $records= $records->where('feedback.rate',$_GET['rating']);
        }

       $records = $records
       ->Where('ticket.status', '=',$status)
       ->skip($start)
       ->take($rowperpage)
       ->get();
       $recordsr= $records->count();

    $totalRecordswithFilter =$recordsr;
    $totalRecords =$totalRecordswithFilter;
    //echo count($records);die;
     $data_arr = array();
    //echo '<pre>';print_r($records);die;
     $close=0;
     foreach($records as $record){
      $actDate=$this->time_elapsed_string($record->cdate,true);
        if($record->status==2){
           $close++; 
        }
        
       //echo '<pre>';print_r(date('H:i:s'));
        $assignBy= User::where('id',$record->assigned_by)->first();
       //$time= $this->getDateAndTime(date('d-m-Y H:i:s',strtotime($record->created_at)));
        $endDate   = new \DateTime('now');
        if($record->status==2){
          $endDate   = new \DateTime($record->close_date);
        }

        

        $previousDate = $record->cdate;
        $startdate = new \DateTime($previousDate);
        
        $interval  = $endDate->diff($startdate);
        $time= $interval->format('%d:%H:%i:%s');
        $min= $interval->format('%i');
        $hours= $interval->format('%H');
        //$time= '2:10:0';
        if($min < '30' && $hours =='00'){
        $timeStatus=1;

        }elseif($min > '30' && $hours <= '02'){
         
        $timeStatus=2;
        }else{

        $timeStatus=3;
        }

      
        $data_arr[] = array(
          "id" => $record->id,
           
          "customer" => @$record->oname,
          "user" => $record->user,
          "phone" => @$record->phone,
          "contact" => @$record->contact_person,
          "description" => @$record->description,
          "assign" => @$assignBy->name,
          "time" =>  $time,
          "ticketstatus" => $record->tstatus,
          "timeStatus" => $timeStatus,
          "tickect_delete" => $tickect_delete,
          "contract_edit" => $contract_edit,
          "tickect_edit" => $tickect_edit,
          "created_at" => date('d-m-Y',strtotime($record->cdate))
        );
     }

     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "close" => $close,
        "aaData" => $data_arr
     );

     echo json_encode($response);
     exit;
   }

    public function dashboardView(Request $request){
    $perm = Helper::checkPermission();

    $due=0;
    if(in_array('contract_due_date',$perm)){
        $due=1;
    }
    $value=0;
    if(in_array('contract_hide_value',$perm)){
        $value=1;
    }
    $ticket_multiple=0;
    if(in_array('ticket_multiple',$perm)){
        $ticket_multiple=1;
    }
    $contract_delete=0;
    if(in_array('contract_delete',$perm)){
        $contract_delete=1;
    }
    $contract_edit=0;
    if(in_array('contract_edit',$perm)){
        $contract_edit=1;
    }
    $ticket_red_renew=0;
    if(in_array('ticket_red_renew',$perm)){
        $ticket_red_renew=1;
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

      
    $records = Ictran::where(function ($query) use ($searchValue) {
        $query->where('ictran.Organization_Name', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Contract_Number', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Support_Type', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Price_RM', 'like', '%' .$searchValue . '%');
        });

    if(@$_GET['startDate'] != "" && @$_GET['endDate']){

        $startDate= date('Y-m-d',strtotime($_GET['startDate']));
        $endDate= date('Y-m-d',strtotime($_GET['endDate']));
        $records= $records->whereBetween('ictran.Due_date', [$startDate, $endDate]);
       }
    //user for status not invoice name
    if(@$_GET['invoice'] != ""){

            $records= $records->where('ictran.renew_status',$_GET['invoice']);
        }
    if(@$_GET['customer'] != ""){

            $records= $records->where('ictran.product', 'like', '%' .$_GET['customer'] . '%');
        }
    if(@$_GET['type'] != ""){

            $records= $records->where('ictran.Support_Type',$_GET['type']);
        } 

  /*  if($_GET['value'] != ""){
            if($_GET['value']==1000){
                $records->where('ictran.Price_RM','>=', 1)
                    ->where('ictran.Price_RM','<=', (int)$_GET['value']);
            }else{
               $records->where('ictran.Price_RM','>', 1000);
                   // ->where('ictran.Price_RM','<=', (int)$_GET['value']);
            }
        } */   
       
    $records= $records->select('ictran.*');
        
   
    $recordr= $records->count();
    $useCount= $records->get();
    $records=   $records->skip($start)
   ->take($rowperpage)
    ->orderBy($columnName,$columnSortOrder)
    ->get()->toArray();

    $totalRecordswithFilter =$recordr;
    $totalRecords =$totalRecordswithFilter;

     

  
       // usort($records, array($this,'date_compare'));

        // echo '<pre>';print_r($records);

        // die;
     $data_arr = array();
     $renewSum=0;
     $agree=0;
     $cancell=0;
     $expire=0;

     foreach ($useCount as $key => $useCount1) {



        if($useCount1['renew_status']==1){

            $renewSum++;
        }
        if($useCount1['renew_status']==2){

            $agree++;
        }
        if($useCount1['renew_status']==3){

            $cancell++;
        }


        $dueDate= strtotime($useCount1['Due_date']);
        $toDayDate= strtotime(date('d-m-Y'));
        if($toDayDate > $dueDate){
         
        $expire++;
        }
         # code...
     }



     foreach($records as $record){
        
        $ticketCount= Ticket::where('ictran_id',$record['id'])->where('status',0)->count();
        // For Delete Btn
        $removeDeleteBtn=0;
        if($ticketCount > 0){
            $removeDeleteBtn=1;
        }

        // For Tiecket Btn
        $removeTiecket=0;
        if($ticketCount > 0){
            $removeTiecket=1;
        }

        $product=Product::whereIn('id',explode(',',$record['product']))->get()->pluck('title')->toArray();

        $dueDate= strtotime($record['Due_date']);
        $toDayDate= strtotime(date('d-m-Y'));

        $dueDateColor=0;
        if($toDayDate > $dueDate){
        $dueDateColor=1;
        //$expire++;
        }
        //echo $record['renew_status']; echo '<br>';

        $deleteRedTicket=0;
        if($dueDateColor==1 && $ticket_red_renew ==0){
          $deleteRedTicket=1;
        }

        

 
        $data_arr[] = array(
          "id" => $record['id'],
          "Contract_Number" => $record['Contract_Number'],
          "Organization_Name" => $record['Organization_Name'],
          "Support_Type" => $record['Support_Type'],
          "product" => implode(',',$product),
          "Price_RM" =>($value==0) ? 'None' :$record['Price_RM'],
          "button" => 'efsd',
          "removeDeleteBtn" => $removeDeleteBtn,
          "contract_delete" => $contract_delete,
          "removeTiecket" => $removeTiecket,
          "contract_edit" => $contract_edit,
          "ticket_red_renew" => $deleteRedTicket,
          "dueDateColor" => $dueDateColor,
          "ticket_multiple" => $ticket_multiple,
          "renew_status" => $record['renew_status'],
          "due_date" => ($due==0 || $ticket_red_renew==0) ? date('Y',strtotime($record['Due_date'])) : date('d-m-Y',strtotime($record['Due_date']))
        );
     }

     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "renewSum" => $renewSum,
        "cancell" => $cancell,
        "agree" => $agree,
        "expire" => $expire,
         
        "aaData" => $data_arr
     );

     echo json_encode($response);
     exit;
   }






  //user List
  public function listUser(){
    $this->data['users']= User::with('getUserRole')->orderBy('id','desc')->get();
    return view('pages.app-users-list',$this->data);
  }
    //user view
    public function viewUser(){
    return view('pages.app-users-view');
  }
   //user edit
   public function editUser(){
    $this->data['loginData']= User::where('id',\Auth::user()->id)->first();
    return view('pages.app-users-edit',$this->data);
  }



    public function addUser(){

        $this->data['allPermision'] = Module::with('getAllModuel')->get()->toArray();
        $this->data['roles'] = Role::where('status',1)->get()->toArray();
         
        return view('pages.add-user',$this->data);
    }
    public function userStore(Request $request){
        $allData= $request->all();
       // dd($allData);
        $checkUser= User::where('email',$request->email)->first();
        if($checkUser){
            return redirect('app/add-user')->withErrors(['Error', 'Email already Exists !!!']);
        }

        $user= new User();
        $user->name= $request->fname;
        //$user->profile_pic= $request->profile_pic;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->password= \Hash::make($request->password);
        $user->address= $request->address;
        $user->status= $request->is_active;
        $user->user_type= $request->user_type;
        //$user->user_type= 2;


        if($request->hasFile('file')) {
             

            $logofile = $request->file('file');
            // $destinationPath = public_path('/profile');
            // $name->move($destinationPath, $name);

            $destinationPath = public_path('profile/'); // upload path
            $outputImage =  "profile_".uniqid().".".$logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

             
            $user->profile_pic= $outputImage;
            //echo $logofile;die;
             
        }


        $user->save();
 
        return redirect('app/users/list')->withErrors(['Success', 'You have successfully added !!!']);
    }


  public function adminUpdate(Request $request){
    $user= User::where('id',\Auth::user()->id)->first();

    if($request->hasFile('file')) {
             

            $logofile = $request->file('file');
            // $destinationPath = public_path('/profile');
            // $name->move($destinationPath, $name);

            $destinationPath = public_path('profile/'); // upload path
            $outputImage =  "logo_".uniqid().".".$logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

             
            $user->profile_pic= $outputImage;
            //echo $logofile;die;
             
        }


    $user->name= $request->fname;
    //$user->profile_pic= $request->profile_pic;
    $user->email= $request->email;
    $user->phone= $request->phone;
    $user->address= $request->address;
    $user->company_name= $request->company_name;
    $user->update();

    return \Redirect::back()->withErrors(['Success', 'You have successfully updated !!!']);
     
  }


  // Edit user data and update permision
  public function editUserData($id){
    $this->data['edit']= User::where('id',$id)->first();
    $this->data['loginTime']= LoginTime::where('user_id',$id)->get()->toArray();
    //echo '<pre>';print_r($this->data['loginTime']);die;
    $this->data['allPermision'] = Module::with('getAllModuel')->get()->toArray();
    $allPerm = UserPermission::where('user_id',$id)->get();
    $this->data['roles'] = Role::where('status',1)->get()->toArray();
    $userKey=[];
    foreach ($allPerm as $key => $value) {
        $userKey[] = $value['module_key'];
    }



    return view('pages.users-edit',$this->data)->with('userKey',$userKey);
  }

  public function permstore(Request $request,$id){
        $allData= $request->all();
        
        $user= User::where('id',$id)->first();
        $user->name= $request->fname;
        //$user->profile_pic= $request->profile_pic;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->address= $request->address;
        $user->status= $request->is_active;
        $user->user_type= @$request->user_type;

        if($request->hasFile('file')) {
             

            $logofile = $request->file('file');
            // $destinationPath = public_path('/profile');
            // $name->move($destinationPath, $name);

            $destinationPath = public_path('profile/'); // upload path
            $outputImage =  "profile_".uniqid().".".$logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

             
            $user->profile_pic= $outputImage;
            //echo $logofile;die;
             
        }

        $user->save();


        return redirect('app/users/list')->withErrors(['Success', 'You have successfully updated !!!']);
   
    }

    public function deleteUser($id){
        $user= User::where('id',$id)->delete();

        $allPerm = UserPermission::where('user_id',$id)->get();
        $LoginTime = LoginTime::where('user_id',$id)->get();

            if($allPerm){
               foreach ($allPerm as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
                
                } 
            }

            if($LoginTime){
               foreach ($LoginTime as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
                
                } 
            }
            return redirect('app/users/list')->withErrors(['Success', 'You have successfully deleted !!!']);
    }

    // list Role
    public function roles(){
        $this->data['roles']= Role::with('checkRole')->orderBy('id','desc')->get();
        //echo '<pre>';print_r($this->data['roles']);die;
        return view('admin.role.list',$this->data);
    }
    // Add role
    public function addRole(){
        $this->data['allPermision'] = Module::with('getAllModuel')->get()->toArray();
        return view('admin.role.add',$this->data);
    }

    public function roleStore(Request $request){
        $allData= $request->all();

        $checkUser= Role::where('role',$request->role)->first();
        if($checkUser){
            return redirect('app/add-role')->withErrors(['Error', 'Role already Exists !!!']);
        }

        $role= new Role();
        $role->role= $request->role;
         
        $role->status= $request->status;
        $role->save();

         if(isset($allData['keyname'])){
            foreach ($allData['keyname'] as $key => $value) {
                $userPermission= new UserPermission();
                $userPermission->user_id= $role->id;
                $userPermission->module_key= $value;
                $userPermission->save();
            }

        }



            foreach ($allData['from_from'] as $key => $value) {
                $logintime= new LoginTime();
                $logintime->user_id= $role->id;;
                $logintime->day_id= $key;
                $logintime->start_time= $value;
                $logintime->end_time= $allData['from_to'][$key];
                $logintime->save();
            }


        


        return redirect('app/role/list')->withErrors(['Success', 'You have successfully added !!!']);
    }

    // For edit role
    public function roleEdit($id){
    $this->data['edit']= Role::where('id',$id)->first();
    $this->data['loginTime']= LoginTime::where('user_id',$id)->get()->toArray();
    //echo '<pre>';print_r($this->data['loginTime']);die;
    $this->data['allPermision'] = Module::with('getAllModuel')->get()->toArray();
    $allPerm = UserPermission::where('user_id',$id)->get();
    $userKey=[];
    foreach ($allPerm as $key => $value) {
        $userKey[] = $value['module_key'];
    }



    return view('admin.role.edit',$this->data)->with('userKey',$userKey);
  }

  public function roleDelete($id){
        $user= Role::where('id',$id)->delete();

        $allPerm = UserPermission::where('user_id',$id)->get();
        $LoginTime = LoginTime::where('user_id',$id)->get();

            if($allPerm){
               foreach ($allPerm as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
                
                } 
            }

            if($LoginTime){
               foreach ($LoginTime as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
                
                } 
            }
            return redirect('app/role/list')->withErrors(['Success', 'You have successfully deleted !!!']);
    }
    // Update Role
    public function roleUpdate(Request $request,$id){
        $allData= $request->all();
        //echo '<pre>';print_r($allData['keyname']);die;
        $allPerm = UserPermission::where('user_id',$id)->get();
        $LoginTime = LoginTime::where('user_id',$id)->get();

            if($allPerm){
               foreach ($allPerm as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
                
                } 
            }

            if($LoginTime){
               foreach ($LoginTime as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
                
                } 
            }


        if(isset($allData['keyname'])){
            foreach ($allData['keyname'] as $key => $value) {
                $user= new UserPermission();
                $user->user_id= $id;
                $user->module_key= $value;
                $user->save();
            }

        }



            foreach ($allData['from_from'] as $key => $value) {
                $user= new LoginTime();
                $user->user_id= $id;
                $user->day_id= $key;
                $user->start_time= $value;
                $user->end_time= $allData['from_to'][$key];
                $user->save();
            }


        $Role= Role::where('id',$id)->first();
        $Role->role= $request->role;
        
        $Role->status= $request->status;
        $Role->save();


        return redirect('app/role/list')->withErrors(['Success', 'You have successfully updated !!!']);
   
    }

    public function updateTheme(Request $request){

        $allData=  $request->all();
        $user = User::where('id',\Auth::user()->id)->first();
        $user->theme= $allData['theme'];
            if($user->save()){
                return true;
            }
    }

    // for setting module
    
    public function settings(){
        $this->data['products']= Product::get();
        return view('admin.product.list',$this->data) ;
    }
    // for settind related
    public function settingsAdd(){
        
        return view('admin.product.add') ;
    }
    public function settingsStore(Request $request){
        $setting= new Product();
        $setting->title= $request->title;
        $setting->first_user= $request->first_user;
        $setting->add_user= $request->add_user;
        $setting->new= $request->new;
        $setting->renew= $request->renew;
        $setting->description= $request->description;
        $setting->company_name= $request->company_name;
        $setting->tax= $request->tax;
        $setting->save();

        return redirect('app/settings/list')->withErrors(['Success', 'You have successfully added !!!']);
    }


    public function settingsEdit($id){
    $this->data['edit']= Product::where('id',$id)->first();
     
    return view('admin.product.edit',$this->data);
  }

  public function settingsUpdate(Request $request,$id){
        $setting= Product::where('id',$id)->first();
        $setting->title= $request->title;
        $setting->first_user= $request->first_user;
        $setting->add_user= $request->add_user;
        $setting->new= $request->new;
        $setting->renew= $request->renew;
        $setting->description= $request->description;
        $setting->company_name= $request->company_name;
        $setting->tax= $request->tax;
        $setting->save();

        return redirect('app/settings/list')->withErrors(['Success', 'You have successfully updated !!!']);
    }

    public function settingsDelete($id){
        

        $Product = Product::where('id',$id)->delete();
        if($Product){ 
            return redirect('app/settings/list')->withErrors(['Success', 'You have successfully deleted !!!']);
        }
    }

    // For uploads module
    public function uploads(){
        return view('admin.upload.add');
    }
    // For customerList module
    public function customerList(){
        $this->data['customers']= Cust::with('getDeleteCount')->get();
       // dd($this->data['customers']);

        $statusArray= [0,2];
        $allrecord= Ictran::whereDate('Due_date','>',date('Y-m-d'))->whereIn('renew_status',$statusArray)->get();

        $totalCount= Ictran::whereDate('Due_date','>',date('Y-m-d'))->whereIn('renew_status',$statusArray)->count();
         

        $nocontracts= Cust::get();
        $nocontract= 0;
        // foreach ($nocontracts as $key => $value) {
        //     $allrecord= Ictran::where('CUSTNO',$value->Organization_Number)->first();
        //     if($allrecord){
              
        //     }else{
        //       $nocontract++;
        //     }
        // }
        $date = \Carbon\Carbon::today()->subDays(365);
        // Expire contract
        $latyear=date('Y-m-d',strtotime(Carbon::now()->addYears(-1)));
        $expireContract= Ictran::whereDate('Due_date','>=',$date)->whereDate('Due_date','<=',date('Y-m-d'))->where('renew_status',0)->count();

        // Cancel Contract
         
        $cancelContract= Ictran::whereDate('Due_date','>=',$date)->where('renew_status',3)->count();
        // Pending contract
        $pendingContract= Ictran::where('renew_status',2)->count();

        $this->data['totalCount']= $totalCount;
        $this->data['expireContract']= $expireContract;
        $this->data['nocontract']= $nocontract;
        $this->data['cancelContract']= $cancelContract;
        $this->data['pendingContract']= $pendingContract;
        return view('admin.customer.list',$this->data);
    }

    public function cusomer2(Request $request){

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

      

    $records = Cust::with('getDeleteCount')->where(function ($query) use ($searchValue) {
        $query->where('arcust.Organization_Number', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust.Organization_Name', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust.Attention', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust.Secondary_Phone', 'like', '%' .$searchValue . '%')
       ->orwhere('arcust.Primary_Phone', 'like', '%' .$searchValue . '%');
        });

         
       
    $records= $records->select('arcust.*');
        
   
    $recordr= $records->count();
    $records=   $records->skip($start)
   ->take($rowperpage)
    ->orderBy($columnName,$columnSortOrder)
    ->get()->toArray();

    $totalRecordswithFilter =$recordr;
    $totalRecords =$totalRecordswithFilter;

      
    $data_arr = array();
     foreach($records as $record){
        $deleteCount=0;
        //echo '<pre>';print_r($record['get_delete_count']);
        if(count($record['get_delete_count']) > 0){
        $deleteCount=1;   
        }

        $data_arr[] = array(
          "id" => $record['id'],
          "Organization_Number" => $record['Organization_Number'],
          "Organization_Name" => $record['Organization_Name'],
          "Attention" => $record['Attention'],
          "Primary_Phone" => $record['Primary_Phone'],
          "btn" => '',
          "deleteCount" => $deleteCount,
          "Secondary_Phone" => $record['Secondary_Phone']
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

    // For edit customer customerEdit
    public function customerEdit_backup($id){
        $this->data['edit']= Cust::where('id',$id)->first();
       // dd($this->data['edit']['Organization_Number']);
        $this->data['products']= Product::get();
        $this->data['custInfo']= CustInfo::where('cust_id',$id)->first();
        $this->data['checkInfo'] = CustomerInfo::where('customer_id',$this->data['edit']['Organization_Number'])->get()->toArray();
        //echo '<pre>';print_r($this->data['checkInfo']);die;
        return view('admin.customer.edit',$this->data);
    }

    public function customerEdit($id){
        $this->data['edit']= Cust::where('id',$id)->first();
       // dd($this->data['edit']['Organization_Number']);
        $this->data['products']= Product::get();
        $this->data['custInfo']= CustInfo::where('cust_id',$id)->first();
        $this->data['checkInfo'] = CustomerInfo::where('customer_id',$this->data['edit']['Organization_Number'])->get()->toArray();
        $this->data['subscriptions']= SubscriptionSetting::get();
        #echo $this->data['edit']['Organization_Number']; die;
        $this->data['subscriptionsC']= CustomerSubscription::where('customer_id','=',$this->data['edit']['Organization_Number'])->get()->toArray();
        $this->data['custInfoDet']= CustInfo::where('cust_id','=',$this->data['edit']['Organization_Number'])->get()->toArray();

        if( count( $this->data['subscriptionsC'] ) > 0 ){
          if( count( $this->data['subscriptionsC'] ) > 1 ){
            #print_r($this->data['subscriptions']); die;
            $this->data['fsubA'] = $this->data['subscriptionsC'][0];
            unset($this->data['subscriptionsC'][0]);
            $this->data['fsubB'] = $this->data['subscriptionsC'];
          }else{
            $this->data['fsubA'] = $this->data['subscriptionsC'][0];
            $this->data['fsubB'] = array();
          }
        }else{
          $this->data['fsubA'] = array();
          $this->data['fsubB'] = array();
        }

        if( count( $this->data['custInfoDet'] ) > 0 ){
          if( count( $this->data['custInfoDet'] ) > 1 ){
            #print_r($this->data['subscriptions']); die;
            $this->data['fsubAI'] = $this->data['custInfoDet'][0];
            unset($this->data['custInfoDet'][0]);
            $this->data['fsubBI'] = $this->data['custInfoDet'];
          }else{
            $this->data['fsubAI'] = $this->data['custInfoDet'][0];
            $this->data['fsubBI'] = array();
          }
        }else{
          $this->data['fsubAI'] = array();
          $this->data['fsubBI'] = array();
        }
        //echo '<pre>';print_r($this->data['checkInfo']);die;
        return view('admin.customer.edit',$this->data);
    }
    public function customerUpdate($id,Request $request){
        $all= $request->all();
       // echo '<pre>';print_r($all);

        // die;

        
        $checkInfo = CustomerInfo::where('customer_id',$request->Organization_Number)->get();


        



        foreach($checkInfo as $key=>$ids){
            $ids->delete();
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

        /*$checkCust= CustInfo::where('cust_id',$id)->first();

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
        }*/


        return redirect('app/customer')->withErrors(['Success', 'You have successfully updated !!!']);
    }
    // For customerDelete module
    public function customerDelete($id){
        $deleteCustomer= Cust::where('id',$id)->delete();
        if($deleteCustomer){
            return redirect('app/customer')->withErrors(['Success', 'You have successfully deleted !!!']);
        }
    }

    public function infoList(){
        $this->data['info'] = Info::first();
        return view('admin.info.list',$this->data);
    }
    public function infoEdit(){
        $this->data['edit'] = Info::first();
        return view('admin.info.edit',$this->data);
    }

    public function infoUpdate(Request $request){
        $data= $request->all();
        //echo '<pre>';print_r($data);die;
        // dd($request->all());
        $info = Info::where('id',1)->first();
        $info->company_name= $data['company_name'];
        $info->company_number= $data['company_number'];
        $info->address= $data['address'];
        $info->phone= $data['phone'];
        $info->attention= $data['attention'];
        $info->email= $data['email'];
        $info->website= $data['website'];
        $info->fb= $data['fb'];
        $info->skype= $data['skype'];
        $info->other= $data['other'];
        $info->tax= $data['tax'];
        $info->tax_number= $data['tax_number'];
        $info->save();
        return redirect('app/info')->withErrors(['Success', 'You have successfully updated !!!']);
    }

    // delete records
    public function deleteRecord(Request $request){
        //echo '<pre>';print_r($request->all());die;
        foreach($request->checkOne as $value){
            $deleteCustomer= Cust::where('id',$value)->delete();

        }
        return redirect('app/customer')->withErrors(['Success', 'You have successfully deleted !!!']);
    }


    // For upload file
    public function arcust(Request $request){
      ini_set('memory_limit', '-1');
      ini_set('max_execution_time', 1200000);
        if($request->hasFile('file')) {
             

            $logofile = $request->file('file');
             $fileName= $logofile->getClientOriginalName();


             if($fileName !='arcust.dbf'){
                \Session::flash('error', 'Please choose only arcust.dbf file !!!');
                return redirect('app/uploads');
             }

            $destinationPath = public_path('arcust/'); // upload path
            $outputImage =  "arcust_".uniqid().".".$logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

             
            $path= public_path().'/arcust/'.$outputImage;


            $table = new Table($path);

            $actual_data = array();
            $keyVal = array();


            $actual_data = array();
            $keyVal = array();

            $i = 0;
            while ($record = $table->nextRecord()) {
                $row = array();
                
                foreach ($table->getColumns() as $i=>$c)
                {   


                    if($c->getType() != 'G'){
                        if($c->getName()=="CREATED_ON"){
                            $row[$c->getName()] = $record->getDateTime($c);
                        }else{
                            $row[$c->getName()] = $record->$c;
                        }
                    }
                }
                $keyI = count($keyVal);
            
                //$keyVal[$keyI] = array($row['custno'],$row['custno']);
                array_push($actual_data, $row);
            }

           // echo '<pre>';print_r($actual_data);die;

            foreach ($actual_data as $key => $value) {

             
                $checkCustNo = Cust::where('Organization_Number',$value['custno'])->first();

                if($checkCustNo){
                    //echo 'update'; echo '<br>';
                }else{ 
                echo $value['name']; echo '<br>--------';
                $values = new Cust;
                if($value['custno'] !=""){
                    $values->Organization_Number    = $value['custno'];
                }
                if($value['name'] !=""){
                    $values->Organization_Name    = $value['name'];
                }
                if($value['add1'] !=""){
                    $values->Address1    = $value['add1'];
                }
                if($value['add2'] !=""){
                    $values->Address2    = $value['add2'];
                }
                if($value['add3'] !=""){
                 
                    $values->Address3    = $value['add3'];
                }
                if($value['add4'] !=""){
                    $values->Address4    = $value['add4'];
                }
                
                if($value['attn'] !=""){
                    $values->Attention    = $value['attn'];
                }
                if($value['contact'] !=""){
                    $values->Contact    = $value['contact'];
                }
                if($value['phone'] !=""){
                   $values->Primary_Phone    = $value['phone'];
                }
                if($value['phonea'] !=""){
                   $values->Secondary_Phone    = $value['phonea'];
                }
                if($value['fax'] !=""){
                     $values->Fax    = $value['fax'];
                }
                if($value['e_mail'] !=""){
                    $values->Primary_Email    = $value['e_mail'];
                }
                if($value['area'] !=""){
                    $values->Area    = $value['area'];
                }
                if($value['agent'] !=""){
                   $values->Agent    = $value['agent'];
                }
                if($value['status'] !=""){
                   $values->Blacklist    = $value['status'];
                }
                if($value['comuen'] !=""){
                   $values->ROC    = $value['comuen'];
                }
                //echo $key.'-'.$value['comuen'];echo '<br>';
                if($value['gstregno'] !=""){
                    $values->GST    = $value['gstregno'];
                }
                if($value['date'] !=""){
                    $values->Created_Time = date('d-m-Y',strtotime($value['date']));
                }
                // if($value['name'] !=""){

                //     $actTime= $value['created_on']->format(\DateTime::ISO8601);
                //     $values->Created_Time = date('d-m-Y',strtotime($actTime));
                // }
                
                $values->save();

            }
        }
             
        }

        die;
        \Session::flash('message', 'You have successfully uploaded !!!');
        return redirect('app/uploads');
    }



    function find_closest($array, $date)
    {
    //$count = 0;
    foreach($array as $day)
    {
    //$interval[$count] = abs(strtotime($date) - strtotime($day));
    $interval[] = abs(strtotime($date) - strtotime($day));
    //$count++;
    }

    asort($interval);
    $closest = key($interval);

    return $array[$closest];
                }
    public function ictrain(Request $request){
      ini_set('memory_limit', '-1');
      ini_set('max_execution_time', 1200000);
        if($request->hasFile('file')) {
             

            $logofile = $request->file('file');
             $fileName= $logofile->getClientOriginalName();


             if($fileName !='ictran.dbf'){
                \Session::flash('error', 'Please choose only ictran.dbf file !!!');
                return redirect('app/uploads');
             }

            $destinationPath = public_path('ictrain/'); // upload path
            $outputImage =  "arcust_".uniqid().".".$logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

             
            $path= public_path().'/ictrain/'.$outputImage;


            $table = new Table($path);

            $actual_data = array();
            $keyVal = array();


            $actual_data = array();
            $keyVal = array();

            $i = 0;
            while ($record = $table->nextRecord()) {
                $row = array();
                
                foreach ($table->getColumns() as $i=>$c)
                {   


                    if($c->getType() != 'G'){
                        if($c->getName()=="CREATED_ON"){
                            $row[$c->getName()] = $record->getDateTime($c);
                        }else{
                            $row[$c->getName()] = $record->$c;
                        }
                    }
                }
                $keyI = count($keyVal);
            
                //$keyVal[$keyI] = array($row['custno'],$row['custno']);
                array_push($actual_data, $row);
            }

          //echo '<pre>';print_r($actual_data);die;

            foreach ($actual_data as $key => $value) {
                $checkCustNo = Ictran::where('Contract_Number',$value['refno'])->where('Support_Type',$value['itemno'])->first();

                if($checkCustNo){
                   // echo 'update'; echo '<br>';
                }else{ 

               // echo $value['itemno'];echo '<br>'; 


                  

                $action=0;
                if($request->start !="" && $request->to !="" && $request->start <= $value['itemno'] && $request->to >= $value['itemno']){

                echo $value['name']; echo '----------------'; echo '<br>';
                     
                $values = new Ictran;
                if($value['custno'] !=""){
                    $values->CUSTNO = $value['custno'];
                }

                if($value['name'] !=""){
                    $values->Organization_Name = $value['name'];
                }

                if($value['desp'] !=""){
                    $values->Subject = $value['desp'];
                }

                $new=Product::where('new',$value['itemno'])->first();
                $reNew=Product::where('renew',$value['itemno'])->first();
                 

                /********************************************************/
                if($new){
                     //echo 1;
                    if($value['date'] !=""){
                        $values->Start_Date = date('Y-m-d',strtotime($value['date']));
                    }
                    if($value['date'] !=""){
                        $values->invoice_date = date('Y-m-d',strtotime($value['date']));
                    }
                    if($value['date'] !=""){
                        $values->Due_date = date('Y-m-d', strtotime('+ 1 year', strtotime($value['date'])));
                    
                    }

                }

                if($reNew){

                  $date1=CustomerInfo::where('customer_id',$value['custno'])->orderBy('exp_date')->where('exp_date_checkbox',1)->get()->pluck('exp_date');
                  //echo '<pre>';print_r(count($date1));die;
                  if(count($date1) > 0){
                    $closetDate=  $this->find_closest($date1, date('Y-m-d'));
                  }else{
                    $closetDate="";
                  }

                    $date=CustomerInfo::where('customer_id',$value['custno'])->orderBy('exp_date')->where('exp_date_checkbox',1)->whereDate('exp_date',$closetDate)->get();
                   //echo '<pre>';print_r($date);die;
                    //echo '>>'.$value['custno'];echo '<br>';
                    $Ids=[];
                    foreach ($date as $key => $value1) {
                       /// echo '<pre>';print_r($value);
                        $Ids[]=$value1->setting_id;
                    }

                    //dd($Ids);
                    //die;
                    if($value['date'] !=""){
                        $values->invoice_date = date('Y-m-d',strtotime($value['date']));
                    }
                   // echo '<pre>';print_r($date[0]->exp_date);die;
                    if(count($date1) > 0){
                    $values->product = implode(',',@$Ids);
                    }

                    if($value['date'] !=""){
                    $values->Start_Date = date('Y-m-d', strtotime('+ 1 day', strtotime(@$date[0]->exp_date)));
                    }
                    
                    if($value['date'] !=""){
                        $values->Due_date = date('Y-m-d', strtotime('+ 1 year', strtotime(@$date[0]->exp_date)));
                         
                    }
                }

 
                if($value['refno'] !=""){
                    $values->Contract_Number = $value['refno'];
                }
                if($value['itemno'] !=""){
                    $values->Support_Type = $value['itemno'];
                }
                if($value['amt'] !=""){
                    $values->Price_RM = $value['amt'];
                }




                if($value['refno'] !=""){

                    $actTime= $value['created_on']->format(\DateTime::ISO8601);
                    $values->Created_Time = date('Y-m-d',strtotime($actTime));
                }
                $values->save();

                $action=1;
                } 

                //echo $action;die;
                if($request->start =="" && $request->to ==""){

                echo $value['name']; echo '----------------'; echo '<br>';

                $values = new Ictran;
                if($value['custno'] !=""){
                    $values->CUSTNO = $value['custno'];
                }

                if($value['name'] !=""){
                    $values->Organization_Name = $value['name'];
                }

                if($value['desp'] !=""){
                    $values->Subject = $value['desp'];
                }

              


                $new=Product::where('new',$value['itemno'])->first();
                $reNew=Product::where('renew',$value['itemno'])->first();
                //echo '<pre>';print_r($product);
                //echo $value['itemno']; echo '<br>';

                /********************************************************/
                if($new){
                    // echo 1;
                    if($value['date'] !=""){
                        $values->Start_Date = date('Y-m-d',strtotime($value['date']));
                    }
                    if($value['date'] !=""){
                        $values->invoice_date = date('Y-m-d',strtotime($value['date']));
                    }
                    if($value['date'] !=""){
                        $values->Due_date = date('Y-m-d', strtotime('+ 1 year', strtotime($value['date'])));
                    // $values->search_due_date = date('Y-m-d', strtotime('+ 1 year', strtotime($value['date'])));
                    }

                }

                
                if($reNew){
                 // echo 's';
                  $date1=CustomerInfo::where('customer_id',$value['custno'])->orderBy('exp_date')->where('exp_date_checkbox',1)->get()->pluck('exp_date');
                  if(count($date1) > 0){
                  $closetDate=  $this->find_closest($date1, date('Y-m-d'));
                  }else{
                    $closetDate="";
                  }

                    $date=CustomerInfo::where('customer_id',$value['custno'])->orderBy('exp_date')->where('exp_date_checkbox',1)->whereDate('exp_date',$closetDate)->get();
                    //echo '>>'.$value['custno'];echo '<br>';
                    $Ids=[];
                    foreach ($date as $key => $value1) {
                       /// echo '<pre>';print_r($value);
                        $Ids[]=$value1->setting_id;
                    }
                    //die;
                    if($value['date'] !=""){
                        $values->invoice_date = date('Y-m-d',strtotime($value['date']));
                    }
                   // echo '<pre>';print_r($date[0]->exp_date);die;
                    if(count($date1) > 0){
                    $values->product = implode(',',@$Ids);
                    }

                    if($value['date'] !=""){
                    $values->Start_Date = date('Y-m-d', strtotime('+ 1 day', strtotime(@$date[0]->exp_date)));
                    }
                    
                    if($value['date'] !=""){
                        $values->Due_date = date('Y-m-d', strtotime('+ 1 year', strtotime(@$date[0]->exp_date)));
                        /*$values->search_due_date = date('Y-m-d', strtotime('+ 1 year', strtotime(@$date[0])));*/
                    }
                }



               // die;

                /********************************************************/
                 
                if($value['refno'] !=""){
                    $values->Contract_Number = $value['refno'];
                }
                if($value['itemno'] !=""){
                    $values->Support_Type = $value['itemno'];
                }
                if($value['amt'] !=""){
                    $values->Price_RM = $value['amt'];
                }




                if($value['refno'] !=""){

                    $actTime= $value['created_on']->format(\DateTime::ISO8601);
                    $values->Created_Time = date('Y-m-d',strtotime($actTime));
                }
               $values->save();
                }

                

            }
        }
             
        }

          //die; 
        \Session::flash('message', 'You have successfully uploaded !!!');
        //return redirect('app/uploads');
    }

     public function search(Request $request){
        $ictran = Ictran::orderBy('CUSTNO','asc')
        ->orWhere('CUSTNO', 'like', '%' . $request->seacrh . '%')
        ->orWhere('Organization_Name', 'like', '%' . $request->seacrh . '%')
        ->orWhere('Support_Type', 'like', '%' . $request->seacrh . '%')

        ->Paginate(10);
        return view('admin.ictran.list')->with('ictran',$ictran);
     }

    
    public function ictranDelete($id){
        
         $delete= Ictran::where('id',$id)->delete();
         return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully deleted !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully deleted !!!']);
        return redirect('app/service-contract')->withErrors(['Success', 'You have successfully deleted !!!']);
     
    }
    public function renew($id){
        
        $renew= Ictran::where('id',$id)->first();
        $renew->renew_status= 1;
        $renew->save();
        return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully renew !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully renew !!!']);

       // return redirect('app/service-contract')->withErrors(['Success', 'You have successfully renew !!!']);
     
    }
    public function agree($id){
        
        $renew= Ictran::where('id',$id)->first();
        $renew->renew_status= 2;
        $renew->save();

        return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully agree !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully agree !!!']);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully agree !!!']);
     
    }
    public function cancelled($id){
        
        $renew= Ictran::where('id',$id)->first();
        $renew->renew_status= 3;
        $renew->save();
        return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully cancelled !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully cancelled !!!']);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully cancelled !!!']);
     
    }
    public function ictranEdit($id){
        
        $this->data['edit']= Ictran::where('id',$id)->first();
        $this->data['products']= Product::get();
        //dd(explode(',',$this->data['edit']['product']));
        /*if($this->data['edit']['product']==""){
        $this->data['CustomerInfo']=CustomerInfo::where('customer_id',$this->data['edit']['CUSTNO'])->where('exp_date_checkbox',1)->get()->pluck('setting_id')->toArray();
        }else{
            $this->data['CustomerInfo']=Product::whereIn('id',explode(',',$this->data['edit']['product']))->get()->pluck('id')->toArray();
        }*/

         $this->data['CustomerInfo']=Product::whereIn('id',explode(',',$this->data['edit']['product']))->get()->pluck('id')->toArray();
        //dd($this->data['date']);
        return view('admin.ictran.edit',$this->data); 
         
     
    }
    public function ictranUpdate($id, Request $request){
        
        $update= Ictran::where('id',$id)->first();
        $update->CUSTNO=$request->CUSTNO;
        $update->Organization_Name=$request->Organization_Name;
        $update->Start_Date=date('Y-m-d',strtotime($request->Start_Date));
        $update->Due_date=date('Y-m-d',strtotime($request->Due_date));
        /*$update->search_due_date=date('Y-m-d',strtotime($request->Due_date));*/
        $update->invoice_date=date('Y-m-d',strtotime($request->invoice_date));
        if(!empty($request->product)){
        $update->product=implode(',',$request->product);
      }else{
        $update->product="";
      }
        $update->Support_Type=$request->Support_Type;
        $update->Price_RM=$request->Price_RM;
        $update->save();


        // if(!empty($request->product)){
        //     foreach ($request->product as $key => $value) {
                
        //         $update->exp_date_checkbox=1;
        //         $update->save();
        //     }
        // }
        // $url = \Session::get('backUrl');
        // dd($url);
        return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully updated !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully updated !!!']);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully updated !!!']); 
         
     
    }

    public function convertDate(){
        $keyword=':';
        $Ictran= Ictran::where('invoice_date', 'like', '%' . $keyword . '%')->get();
         
        foreach ($Ictran as $key => $value) {

            //echo date('d-m-Y', strtotime($value->invoice_date));echo '<pre>';
            $actDtae= explode('+',$value->invoice_date)[0];

            if($value->Price_RM != ""){
            $tert= number_format(str_replace(',','',$value->Price_RM), 2);
            $convert= str_replace('.00','',@$tert);
            }
            $update= Ictran::where('id',$value->id)->first();
            $update->invoice_date= date('Y-m-d', strtotime($actDtae));
            //$update->Start_Date= date('d-m-Y', strtotime('- 1 year', strtotime($value->invoice_date)));
            $update->Start_Date=date('Y-m-d', strtotime($actDtae));
            $update->Due_date=date('Y-m-d', strtotime('+ 1 year', strtotime($actDtae)));
            /*$update->search_due_date=date('Y-m-d', strtotime('+ 1 year', strtotime($actDtae)));*/
             
            $update->Price_RM=@$convert;
            $update->save();
            //echo '<pre>';print_r($value);
            # code...
        }


        $keyword=',';
        $Ictran= Ictran::where('invoice_date', 'like', '%' . $keyword . '%')->get();
         
        foreach ($Ictran as $key => $value) {
            $invDate= date('Y-m-d', strtotime(str_replace(',','',$value->invoice_date)));
            $dueDate= date('Y-m-d', strtotime(str_replace(',','',$value->Due_date)));
            //echo $value->invoice_date;
            if($value->Price_RM != ""){
            $tert= number_format(str_replace(',','',$value->Price_RM), 2);
            $convert= str_replace('.00','',@$tert);
            }
            $update= Ictran::where('id',$value->id)->first();
            $update->invoice_date= $invDate;
            $update->Start_Date= date('Y-m-d', strtotime('- 365 day', strtotime($dueDate)));
            //$update->Start_Date=date('d-m-Y', strtotime($actDtae));
            $update->Due_date=date('Y-m-d', strtotime($dueDate));
            /*$update->search_due_date=date('Y-m-d', strtotime($dueDate));*/
             
            $update->Price_RM=@$convert;
            $update->save();
            //echo '<pre>';print_r($value);
            # code...
        }

        $keyword=',';
        $Price_RM= Ictran::where('Price_RM', 'like', '%' . $keyword . '%')->get();
        foreach ($Price_RM as $key => $value1) {
          $update= Ictran::where('id',$value1->id)->first();
          $update->Price_RM=str_replace(',','', $value1->Price_RM);
          $update->save();

        }

        // For Ticket
        $tickets= Ticket::where('created', '!=','')->where('modified','!=','')->where('conver_status',0)->get();
        foreach ($tickets as $key => $value) {
          $update= Ticket::where('id',$value->id)->first();
          if($value->created !=""){
            $update->created= date('Y-m-d H:i:s',$value->created);
          }
          if($value->modified !=""){
            $update->modified= date('Y-m-d H:i:s',$value->modified);
          }
          if($value->added_dt !=""){
            $update->added_dt= date('Y-m-d H:i:s',$value->added_dt);
          }
          $update->conver_status=1;
          $update->save();
        }

        // For Ticket
        $assignTicket= AssignTicket::where('assign_on','!=','')->where('conver_status',0)->get();
        foreach ($assignTicket as $key => $value2) {

          $update2= AssignTicket::where('id',$value2->id)->first();
          
          if($value2->assign_on !=""){
            $update2->assign_on= date('Y-m-d H:i:s',$value2->assign_on);
          }
          $update2->conver_status=1;
          $update2->save();
        }


       return redirect('/dashboard');
    }

    public function serviceContract (Request $request){
        \Session::put('backUrl', url()->current());

        /*$update = Ictran::where('id',1)->first();
        $update->search_due_date ='2020-12-12';
        $update->save();*/


        $this->data['invoice']= Ictran::get();
        $this->data['prodcucts']= Product::get();
        $this->data['customers']= Ictran::groupby('Organization_Name')->get();
        $this->data['Support_Type']= Ictran::groupby('Support_Type')->get();
        $invDates= Ictran::get()->pluck('invoice_date')->toArray();
        //dd(array_unique($invDate));
        $dateInv=[];
        foreach ($invDates as $key => $invDate) {
           $dateInv[]= date('Y',strtotime($invDate));
        }
        //dd(array_unique($dateInv));
        $this->data['invoice_date2']=array_unique($dateInv);
        //die;

       // echo count($this->data['invoice_date']);die;
        // valid contract
        $statusArray= [0,2];
        $allrecord= Ictran::whereDate('Due_date','>=',date('Y-m-d'))->whereIn('renew_status',$statusArray)->get();

        $totalCount= 0;
        $totalValue=0;
        foreach ($allrecord as $key => $value) {
            $totalValue+=str_replace(',','',$value->Price_RM);
            $totalCount++;
        }
        // Renew status invoice_date
        $renewAll= Ictran::whereMonth('invoice_date',04)->whereYear('invoice_date',2021)->get();
        $renewCount= 0;
        $renewValue=0;
        foreach ($renewAll as $key => $value1) {
            $renewValue+=str_replace(',','',$value1->Price_RM);
            $renewCount++;
        }
        //dd($renewValue);
        // Get %
        $lastMonth= date('m', strtotime(date('Y-m')." -1 year"));
        $lastYear= date('Y', strtotime(date('Y-m')." -1 year"));
        $renewAllPer= Ictran::whereMonth('invoice_date',$lastMonth)->whereYear('invoice_date',$lastYear)->get();
        $renewCountPer= 0;
        $renewValueLastMonth=0;
        foreach ($renewAllPer as $key => $value2) {
            $renewValueLastMonth+=str_replace(',','',$value2->Price_RM);
            $renewCountPer++;
        }
  if($request->month){
      $year=$request->month;
    $Lastyear=$request->month-1;

  }else{
    
    $year=date('Y');
    $Lastyear=date("Y",strtotime("-1 year"));
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

   $monthSum= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date',$i);
   if($type11){
    $monthSum= $monthSum->where('Support_Type',$type11);
   }
   $monthSum= $monthSum->sum('Price_RM');
   $currentYear[]=$monthSum;


   // Last Year
   $lastMonthSum= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date',$i);
    if($type11){
    $lastMonthSum= $lastMonthSum->where('Support_Type',$type11);
    }
   $lastMonthSum= $lastMonthSum->sum('Price_RM');
   $lastYear[]=$lastMonthSum;


  }

 
   
  // dd($currentYear);
  // die;
  // $jan= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','01')->sum('Price_RM');
  // $feb= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','02')->sum('Price_RM');
  // $mar= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','3')->sum('Price_RM');
  // $apr= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','04')->sum('Price_RM');
  // $may= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','05')->sum('Price_RM');
  // $jun= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','06')->sum('Price_RM');
  // $july= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','07')->sum('Price_RM');
  // $aug= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','08')->sum('Price_RM');
  // $sept= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','09')->sum('Price_RM');
  // $oct= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','10')->sum('Price_RM');
  // $nov= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','11')->sum('Price_RM');
  // $dec= Ictran::whereYear('invoice_date',$year)->whereMonth('invoice_date','12')->sum('Price_RM');




  

  /*$m1= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','01')->sum('Price_RM');
  $m2= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','02')->sum('Price_RM');
  $m3= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','03')->sum('Price_RM');
  $m4= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','04')->sum('Price_RM');
  $m5= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','05')->sum('Price_RM');
  $m6= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','06')->sum('Price_RM');
  $m7= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','07')->sum('Price_RM');
  $m8= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','08')->sum('Price_RM');
  $m9= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','09')->sum('Price_RM');
  $m10= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','10')->sum('Price_RM');
  $m11= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','11')->sum('Price_RM');
  $m12= Ictran::whereYear('invoice_date',$Lastyear)->whereMonth('invoice_date','12')->sum('Price_RM');*/



  //$currentYear= array($jan, $feb, $mar, $apr, $may, $jun, $july, $aug, $sept, $oct, $nov,$dec); 
  //$lastYear= array($m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12); 
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



        return view('admin.ictran.list',$this->data);
     
    }

         function date_compare($a, $b)
        {
            $t1 = strtotime($a['Due_date']);
            $t2 = strtotime($b['Due_date']);
            return $t1 - $t2;
        }  

    public function serviceContract1(Request $request){

    $perm = Helper::checkPermission();

    $due=0;
    if(in_array('contract_due_date',$perm)){
        $due=1;
    }
    $value=0;
    if(in_array('contract_hide_value',$perm)){
        $value=1;
    }
    $ticket_multiple=0;
    if(in_array('ticket_multiple',$perm)){
        $ticket_multiple=1;
    }
    $contract_delete=0;
    if(in_array('contract_delete',$perm)){
        $contract_delete=1;
    }
    $contract_edit=0;
    if(in_array('contract_edit',$perm)){
        $contract_edit=1;
    }
    $ticket_red_renew=0;
    if(in_array('ticket_red_renew',$perm)){
        $ticket_red_renew=1;
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

     // Total records
     /*$totalRecords = Ictran::select('count(*) as allcount')->count();
     $totalRecordswithFilter = Ictran::select('count(*) as allcount')
     ->where('Organization_Name', 'like', '%' .$searchValue . '%')
     ->orwhere('Contract_Number', 'like', '%' .$searchValue . '%')
     ->orwhere('Support_Type', 'like', '%' .$searchValue . '%')
     ->orwhere('Price_RM', 'like', '%' .$searchValue . '%')
     ->count();*/

     // Fetch records
     /*$records = Ictran::orderBy($columnName,$columnSortOrder)
       ->where('ictran.Organization_Name', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Contract_Number', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Support_Type', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Price_RM', 'like', '%' .$searchValue . '%')
       ->select('ictran.*')
       ->skip($start)
       ->take($rowperpage)
       ->get()->toArray();*/

    $records = Ictran::where(function ($query) use ($searchValue) {
        $query->where('ictran.Organization_Name', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Contract_Number', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Support_Type', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Price_RM', 'like', '%' .$searchValue . '%');
        });

    if($_GET['startDate'] != "" && $_GET['endDate']){

        $startDate= date('Y-m-d',strtotime($_GET['startDate']));
        $endDate= date('Y-m-d',strtotime($_GET['endDate']));
        $records= $records->whereBetween('ictran.Due_date', [$startDate, $endDate]);
       }
    //user for status not invoice name
    if($_GET['invoice'] != ""){

            $records= $records->where('ictran.renew_status',$_GET['invoice']);
        }
    if($_GET['customer'] != ""){

            $records= $records->where('ictran.product', 'like', '%' .$_GET['customer'] . '%');
        }
    if($_GET['type'] != ""){

            $records= $records->where('ictran.Support_Type',$_GET['type']);
        } 

    if($_GET['value'] != ""){

            if($_GET['value']=='999'){
                $records->where('ictran.Price_RM','>=', 1)
                    ->where('ictran.Price_RM','<=', (int)$_GET['value']);
            }elseif($_GET['value']=='1000-1999'){
                $records->where('ictran.Price_RM','>=', 1000)
                    ->where('ictran.Price_RM','<=', 1999);

            }elseif($_GET['value']=='2000-2999'){
                $records->where('ictran.Price_RM','>=', 2000)
                    ->where('ictran.Price_RM','<=', 2999);
            }elseif($_GET['value']=='3000-3999'){
                $records->where('ictran.Price_RM','>=', 3000)
                    ->where('ictran.Price_RM','<=', 3999);
            }elseif($_GET['value']=='4000'){
               $records->where('ictran.Price_RM','>', 4000);
                   // ->where('ictran.Price_RM','<=', (int)$_GET['value']);
            }
        }    
       
    $records= $records->select('ictran.*');
        
   
    $recordr= $records->count();
    $useCount= $records->get();
    $records=   $records->skip($start)
   ->take($rowperpage)
    ->orderBy($columnName,$columnSortOrder)
    ->get()->toArray();

    $totalRecordswithFilter =$recordr;
    $totalRecords =$totalRecordswithFilter;

     

  
       // usort($records, array($this,'date_compare'));

        // echo '<pre>';print_r($records);

        // die;
     $data_arr = array();
     $renewSum=0;
     $agree=0;
     $cancell=0;
     $expire=0;

     foreach ($useCount as $key => $useCount1) {



        if($useCount1['renew_status']==1){

            $renewSum++;
        }
        if($useCount1['renew_status']==2){

            $agree++;
        }
        if($useCount1['renew_status']==3){

            $cancell++;
        }


        $dueDate= strtotime($useCount1['Due_date']);
        $toDayDate= strtotime(date('d-m-Y'));
        if($toDayDate > $dueDate){
         
        $expire++;
        }
         # code...
     }
     foreach($records as $record){

        $ticketCount= Ticket::where('ictran_id',$record['id'])->where('status',0)->count();
        // For Delete Btn
        $removeDeleteBtn=0;
        if($ticketCount > 0){
            $removeDeleteBtn=1;
        }

        // For Tiecket Btn
        $removeTiecket=0;
        if($ticketCount > 0){
            $removeTiecket=1;
        }
        
        // $username = $record->username;
        // $name = $record->name;
        // $email = $record->email;

        /*if($record['product']==""){
        $product=CustomerInfo::where('customer_id',$record['CUSTNO'])->where('exp_date_checkbox',1)->get()->pluck('info_type')->toArray();
        }else{
        $product=Product::whereIn('id',explode(',',$record['product']))->get()->pluck('title')->toArray();
        }*/

        $product=Product::whereIn('id',explode(',',$record['product']))->get()->pluck('title')->toArray();

        $dueDate= strtotime($record['Due_date']);
        $toDayDate= strtotime(date('d-m-Y'));

        $dueDateColor=0;
        if($toDayDate > $dueDate){
        $dueDateColor=1;
        //$expire++;
        }

        $deleteRedTicket=0;
        if($dueDateColor==1 && $ticket_red_renew ==0){
          $deleteRedTicket=1;
        }
 
 
        $data_arr[] = array(
          "id" => $record['id'],
          "Contract_Number" => $record['Contract_Number'],
          "Organization_Name" => $record['Organization_Name'],
          "Support_Type" => $record['Support_Type'],
          "product" => implode(',',$product),
          "Price_RM" =>($value==0) ? 'None' :$record['Price_RM'],
          "button" => 'efsd',
          "removeDeleteBtn" => $removeDeleteBtn,
          "contract_delete" => $contract_delete,
          "removeTiecket" => $removeTiecket,
          "contract_edit" => $contract_edit,
          "dueDateColor" => $dueDateColor,
          "ticket_red_renew" => $deleteRedTicket,
          "ticket_multiple" => $ticket_multiple,
          "renew_status" => $record['renew_status'],
          "due_date" => ($due==0 || $ticket_red_renew==0) ? date('Y',strtotime($record['Due_date'])) : date('d-m-Y',strtotime($record['Due_date']))
        );/*$data_arr[] = array(
          "id" => $record['id'],
          "Contract_Number" => $record['Contract_Number'],
          "Organization_Name" => $record['Organization_Name'],
          "Support_Type" => $record['Support_Type'],
          "product" => implode(',',$product),
          "Price_RM" => $record['Price_RM'],
          "button" => 'efsd',
          "dueDateColor" => $dueDateColor,
          "renew_status" => $record['renew_status'],
          "due_date" => date('d-m-Y',strtotime($record['Due_date']))
        );*/
     }

     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "renewSum" => $renewSum,
        "cancell" => $cancell,
        "agree" => $agree,
        "expire" => $expire,
         
        "aaData" => $data_arr
     );

     echo json_encode($response);
     exit;
   }

   // For assign ticket
   public function ictranTicket($id){

 

        $this->data['adminUser'] =User::with('getUserCount')->get();
        //echo '<pre>';print_r($this->data['adminUser']);die;
        $this->data['id'] =$id;
        $getInfo1= Ictran::where('id',$id)->first();
        $this->data['custInfo'] =Cust::where('Organization_Number',$getInfo1->CUSTNO)->first();
        return view('admin.ictran.ticket',$this->data);
   }
   public function ticketStore($id, Request $request){
        $ticket= new Ticket();
        $ticket->ictran_id=$id;
        $ticket->status=0;
        $ticket->save();

        $assignTicket= new AssignTicket();
        $assignTicket->ticket_id= $ticket->id;
        $assignTicket->user_id= $request->user_id;
        $assignTicket->description= $request->description;
        $assignTicket->status= 0;
        $assignTicket->phone= $request->phone;
        $assignTicket->contact_person= $request->contact_person;
        $assignTicket->assigned_by= \Auth::user()->id;
        $assignTicket->updated_by= \Auth::user()->id;
        $assignTicket->save();
         
         return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully assign ticket !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully assign ticket !!!']);

        // return redirect('app/service-contract')->withErrors(['Success', 'You have successfully assign ticket !!!']); 
   }


   public function ticket (Request $request){

        \Session::put('backUrl', url()->current());
        $data= Ticket::get()->pluck('ictran_id');
        $userIdArray= AssignTicket::get()->pluck('user_id');


        /***************************************************************/
        //  For Graph and pi chart

        if($request->userid ==""){
            $userId= \Auth::user()->id;
            $this->data['uuname']=\Auth::user()->name;
        }else{
            $userId=$request->userid;
            $this->data['uuname']=User::where('id',$userId)->first()->name;
        }


        $records =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*');
       $records= $records->where('ticket.status',2)->get()->toArray();

       $recordOpen =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*')
       ->where('ticket.status',0)->get()->toArray();
       //echo count($recordOpen);die;

       // Particular user data
       $LoginUserData =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*');
       $LoginUserData= $LoginUserData->where('ticket.status',2)->where('ticket_assign.user_id',$userId)->get()->toArray();

       // Particular user data
       $ratings =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*');
       $ratings= $ratings->where('ticket.status',2)->where('ticket_assign.user_id',$userId)->pluck('ticket_assign.ticket_id')->toArray();
        
        $gtData= Feedback::whereIn('ticket_id',$ratings)->get();
       // List all user
        $allUser =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*','users.id as uid')->groupBy('users.name')->get();


        $this->data['recordOpen']= $recordOpen;
        $this->data['records']= $records;
        $this->data['LoginUserData']= $LoginUserData;
        $this->data['ratings']= $gtData;
        $this->data['allUser']= $allUser;



        /********************************************************************/





        $this->data['users']= User::whereIn('id',$userIdArray)->get()->toArray();
        $this->data['customers']= Ictran::whereIn('id',$data)->get()->toArray();

         
        return view('admin.ticket.list',$this->data);
     
    }


    function time_elapsed_string($datetime, $full = false) {
      $now = new \DateTime;
      $ago = new \DateTime($datetime);
      $diff = $now->diff($ago);

      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;

      $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'm',
      's' => '',
      );
      foreach ($string as $k => &$v) {
      if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
      unset($string[$k]);
      }
      }

      if (!$full) $string = array_slice($string, 0, 1);
      return $string ? implode(', ', $string) . ' ago' : 'just now';
    }



    public function ticket2(Request $request){
    $perm = Helper::checkPermission();
    $ticket_red_renew=0;
    if(in_array('ticket_red_renew',$perm)){
        $ticket_red_renew=1;
    }
    // Delete ticket
    $tickect_delete=0;
    if(in_array('tickect_delete',$perm)){
        $tickect_delete=1;
    }
    $tickect_edit=0;
    if(in_array('tickect_edit',$perm)){
        $tickect_edit=1;
    }
    $contract_edit=0;
    if(in_array('contract_edit',$perm)){
        $contract_edit=1;
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
     \Session::put('key',$searchValue);

      
     // for user only filter

     $status=0;
     if($_GET['status'] != ""){
        $status=$_GET['status'];
     }
     
     // Fetch records
    $records =\DB::table('ticket')
        ->join('ticket_assign', 'ticket_assign.ticket_id', '=', 'ticket.id')
        ->join('ictran', 'ictran.id', '=', 'ticket.ictran_id')
        ->join('users', 'users.id', '=', 'ticket_assign.user_id')
        ->leftjoin('feedback', 'feedback.ticket_id', '=', 'ticket.id')
                    
        
       ->select('ticket.*','ticket_assign.*','ictran.Organization_Name as oname','users.name as user','ticket.created_at as cdate','ticket.status as tstatus','feedback.*','ticket.id as tid')
        ->where(function ($query) use ($searchValue) {
        $query->orwhere('ticket_assign.phone', 'like', '%' .$searchValue . '%')
        ->orwhere('ticket.ictran_id', 'like', '%' .$searchValue . '%')
        ->orwhere('ticket_assign.contact_person', 'like', '%' .$searchValue . '%')
        ->orwhere('ticket.created_at', 'like', '%' .$searchValue . '%')
        ->orwhere('users.name', 'like', '%' .$searchValue . '%')
        ->orwhere('ictran.Organization_Name', 'like', '%' .$searchValue . '%');
        //->orWhere('ticket.status', 'like', '%' .$searchValue . '%');
        });
        
       if($_GET['startDate'] != "" && $_GET['endDate']){

        $startDate= date('Y-m-d',strtotime($_GET['startDate']));
        $endDate= date('Y-m-d',strtotime($_GET['endDate']));
        $records= $records->whereBetween('ticket.created_at', [$startDate.' 00:00:00', $endDate.' 23:59:59']);
       }
       if($_GET['customer'] != ""){

            $records= $records->where('ictran.id',$_GET['customer']);
        }
        if($_GET['user'] != ""){

            $records= $records->where('users.id',$_GET['user']);
        }
        if($_GET['rating'] != ""){

            $records= $records->where('feedback.rate',$_GET['rating']);
        }

       $records = $records
       ->Where('ticket.status', '=',$status)
       ->skip($start)
       ->take($rowperpage)
       ->orderBy($columnName,$columnSortOrder)
       ->get();
       $recordsr= $records->count();

    $totalRecordswithFilter =$recordsr;
    $totalRecords =$totalRecordswithFilter;
    //echo count($records);die;
     $data_arr = array();
    //echo '<pre>';print_r($records);die;
     foreach($records as $record){
        $actDate=$this->time_elapsed_string($record->cdate,true);
       //echo '<pre>';print_r(date('H:i:s'));
        $assignBy= User::where('id',$record->assigned_by)->first();
       //$time= $this->getDateAndTime(date('d-m-Y H:i:s',strtotime($record->created_at)));

        $endDate   = new \DateTime('now');
        if($record->status==2){
          $endDate   = new \DateTime($record->close_date);
        }
        $previousDate = $record->cdate;
        $startdate = new \DateTime($previousDate);
        //$endDate   = new \DateTime('now');
        $interval  = $endDate->diff($startdate);
        $time= $interval->format('%d:%H:%i:%s');
        $min= $interval->format('%i');
        $hours= $interval->format('%H');
        //$time= '2:10:0';
        if($min < '30' && $hours =='00'){
        $timeStatus=1;

        }elseif($min > '30' && $hours <= '02'){
         
        $timeStatus=2;
        }else{

        $timeStatus=3;
        }

      
        $data_arr[] = array(
          "tid" => $record->id,
           
          "oname" => @$record->oname,
          "user" => $record->user,
          "phone" => @$record->phone,
          "contact_person" => @$record->contact_person,
          "description" => @$record->description,
          "assign" => @$assignBy->name,
          "time" =>  $time,
          "ticketstatus" => $record->tstatus,
          "timeStatus" => $timeStatus,
          "tickect_delete" => $tickect_delete,
          "contract_edit" => $contract_edit,
          "tickect_edit" => $tickect_edit,
          "btn" => 'btn',
          "cdate" => date('d-m-Y',strtotime($record->cdate))
        );/*$data_arr[] = array(
          "tid" => $record->tid,
           
          "oname" => @$record->oname,
          "user" => $record->user,
          "phone" => @$record->phone,
          "contact_person" => @$record->contact_person,
          "description" => @$record->description,
          "assign" => $assignBy->name,
          "time" => $time,
          "ticketstatus" => $record->tstatus,
          "timeStatus" => $timeStatus,
          "btn" => 'btn',
          "cdate" => date('d-m-Y',strtotime($record->cdate))
        );*/
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


   public function getDateAndTime($date1){
    // Declare and define two dates 
        $date1 = strtotime($date1);  
        $date2 = strtotime(date('d-m-Y H:i:s'));  
          
        // Formulate the Difference between two dates 
        $diff = abs($date2 - $date1);  
          
          
        // To get the year divide the resultant date into 
        // total seconds in a year (365*60*60*24) 
        $years = floor($diff / (365*60*60*24));  
          
          
        // To get the month, subtract it with years and 
        // divide the resultant date into 
        // total seconds in a month (30*60*60*24) 
        $months = floor(($diff - $years * 365*60*60*24) 
                                       / (30*60*60*24));  
          
          
        // To get the day, subtract it with years and  
        // months and divide the resultant date into 
        // total seconds in a days (60*60*24) 
        $days = floor(($diff - $years * 365*60*60*24 -  
                     $months*30*60*60*24)/ (60*60*24)); 
          
          
        // To get the hour, subtract it with years,  
        // months & seconds and divide the resultant 
        // date into total seconds in a hours (60*60) 
        $hours = floor(($diff - $years * 365*60*60*24  
               - $months*30*60*60*24 - $days*60*60*24) 
                                           / (60*60));  
          
          
        // To get the minutes, subtract it with years, 
        // months, seconds and hours and divide the  
        // resultant date into total seconds i.e. 60 
        $minutes = floor(($diff - $years * 365*60*60*24  
                 - $months*30*60*60*24 - $days*60*60*24  
                                  - $hours*60*60)/ 60);  
          
          
        // To get the minutes, subtract it with years, 
        // months, seconds, hours and minutes  
        $seconds = floor(($diff - $years * 365*60*60*24  
                 - $months*30*60*60*24 - $days*60*60*24 
                        - $hours*60*60 - $minutes*60));  
          
        // Print the result 
        return $hours.':'.$minutes.':'.$seconds; 
   }


   // for edit ticket
   public function ticketEdit($id){
    $this->data['edit']= AssignTicket::where('ticket_id',$id)->first();
    return view('admin.ticket.ticket',$this->data);
   }
   // for ticketReassign
   public function ticketReassign($id){
    $this->data['ticket']= Ticket::where('id',$id)->first();
    $this->data['assign']= AssignTicket::where('ticket_id',$id)->first();
    $this->data['adminUser'] =User::with('getUserCount')->get();
    return view('admin.ticket.ticket-assign',$this->data);
   }
   // For update ticket
   public function ticketUpdate($id, Request $request){
    $update= AssignTicket::where('id',$id)->first();
    $update->description=$request->description;
    $update->phone=$request->phone;
    $update->contact_person=$request->contact_person;
    $update->save();

    return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully updated !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully updated !!!']);

    return redirect('app/ticket')->withErrors(['Success', 'You have successfully updated !!!']);
   }
   //  Ticket resaasign
   public function assignUpdate($id, Request $request){

    /*$ticketCheck= AssignTicket::where('id',$id)->where('status',1)->first();
    if($ticketCheck){
        return redirect('app/ticket')->withErrors(['Success', 'Ticket Already Assign !!!']);
    }else{*/
    $update= AssignTicket::where('id',$id)->first();
    $update->user_id=$request->user_id;
    $update->description=$request->description;
    $update->phone=$request->phone;
    $update->status=1;
    $update->contact_person=$request->contact_person;
    $update->save();


    return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully updated !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully updated !!!']);

    return redirect('app/ticket')->withErrors(['Success', 'You have successfully updated !!!']);
    // }
   }

   // for ticket delete
   
   public function ticketDelete($id){
    $ticketDelete= Ticket::where('id',$id)->delete();
    if($ticketDelete){
        AssignTicket::where('ticket_id',$id)->delete();
        return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully deleted !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully deleted !!!']);
        // return redirect('app/ticket')->withErrors(['Success', 'You have successfully deleted !!!']);
    }
    }

// For close ticket

 public function ticketClose($id){
     $this->data['webInfo'] = Info::first();
     $ictranId = Ticket::where('id',$id)->first()->ictran_id;
     $this->data['ictran'] = Ictran::where('id',$ictranId)->first();
     $this->data['cust'] = Cust::where('Organization_Number',$this->data['ictran']->CUSTNO)->first();
     $this->data['ticket_number'] = $id;
     $email = $this->data['cust']->Primary_Email;
     // echo '<pre>';print_r($this->data['cust']->Primary_Email);die;
      //echo '<pre>';print_r($this->data['cust']->Attention);die;

    \Mail::send('emails.close-ticket', $this->data, function($message) use ($email){
    $message->to($email)->subject
    ('Ticket Feedback');
    $message->from('sales@pcmart.com.my','Ticket Feedback');
    });

    $tk = Ticket::where('id',$id)->first();
    $tk->status= 2;
    $tk->close_date= date('Y-m-d H:i:s');
    $tk->save();
    $tka= AssignTicket::where('id',$id)->first();
    $tka->status= 2;
    $tka->save();
    return ($url = \Session::get('backUrl')) 
                ? \Redirect::to($url)->withErrors(['Success', 'You have successfully closed ticket !!!']) 
                : \Redirect::back()->withErrors(['Success', 'You have successfully closed ticket !!!']);
    return redirect('app/ticket')->withErrors(['Success', 'You have successfully closed ticket !!!']);
    }

    public function feedback($id){
      $this->data['id']=$id;
    
     return view('admin.ticket.feedback',$this->data);
    }

    public function feedbackSubmit($id,Request $request){
      $data= base64_decode($id);
      $check= Feedback::where('ticket_id',explode('_', $data)[1])
      ->where('CUST_NO',explode('_', $data)[0])->first();
      if($check){
        return view('pages.page-not-authorized');
      }else{
      $feedback= new Feedback();
      $feedback->ticket_id = explode('_', $data)[1];       
      $feedback->CUST_NO= explode('_', $data)[0];
      $feedback->rate= $request->rating;
      $feedback->save();
      }

     return redirect('/thankyou');
    }

    // email marketing
    public function emailMarketing(){

     
    return view('admin.market.list');
    }
    public function emailMarket(Request $request){

    
    $info= Info::first();
    $id=1;
    \DB::update('update filter_Setting set month = '.$_GET['month'].', year='.$_GET['year'].' where id = '.$id);
    
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

     // Total records
     /*$totalRecords = Ictran::select('count(*) as allcount')->count();
     $totalRecordswithFilter = Ictran::select('count(*) as allcount')
     ->where('Organization_Name', 'like', '%' .$searchValue . '%')
     ->orwhere('Contract_Number', 'like', '%' .$searchValue . '%')
     ->orwhere('Support_Type', 'like', '%' .$searchValue . '%')
     ->orwhere('Price_RM', 'like', '%' .$searchValue . '%')
     ->count();*/

     // Fetch records
     /*$records = Ictran::orderBy($columnName,$columnSortOrder)
       ->where('ictran.Organization_Name', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Contract_Number', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Support_Type', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Price_RM', 'like', '%' .$searchValue . '%')
       ->select('ictran.*')
       ->skip($start)
       ->take($rowperpage)
       ->get()->toArray();*/

    $records = Ictran::where(function ($query) use ($searchValue) {
        $query->where('ictran.Organization_Name', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Contract_Number', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Support_Type', 'like', '%' .$searchValue . '%')
       ->orwhere('ictran.Price_RM', 'like', '%' .$searchValue . '%');
        });

    if($_GET['month'] != "" && $_GET['year']){

        $records= $records->whereYear('ictran.Due_date', $_GET['year'])
        ->whereMonth('ictran.Due_date', $_GET['month']);
       }
    //user for status not invoice name
    /*if($_GET['invoice'] != ""){

            $records= $records->where('ictran.renew_status',$_GET['invoice']);
        }
    if($_GET['customer'] != ""){

            $records= $records->where('ictran.Organization_Name',$_GET['customer']);
        }
    if($_GET['type'] != ""){

            $records= $records->where('ictran.Support_Type',$_GET['type']);
        } 

    if($_GET['value'] != ""){
            if($_GET['value']==1000){
                $records->where('ictran.Price_RM','>=', 1)
                    ->where('ictran.Price_RM','<=', (int)$_GET['value']);
            }else{
               $records->where('ictran.Price_RM','>', 1000);
                   // ->where('ictran.Price_RM','<=', (int)$_GET['value']);
            }
        }*/    
       
    $records= $records->select('ictran.*')->where('ictran.renew_status',0);
        
   
    $recordr= $records->count();
    if($_GET['btnclick']==0){
    $records=   $records->skip($start)
   ->take($rowperpage)
    ->orderBy($columnName,$columnSortOrder)
    ->get()->toArray();
    }else{
      $records=   $records->get();
    }

    $totalRecordswithFilter =$recordr;
    $totalRecords =$totalRecordswithFilter;




     $data_arr = array();
     $ids1=[];
     foreach($records as $record){

        

        /******************************************************/
        $Product= Product::whereIn('id',explode(',',$record['product']))->get();
        $custInfo= CustomerInfo::where('customer_id',$record['CUSTNO'])->whereIn('setting_id',explode(',',$record['product']))->get();

        $sum=0;

        foreach($Product as $key=>$prod){


        if(count($custInfo) > 0){  
        $getMonth= date('m',strtotime($custInfo[$key]['exp_date']));
        $getYear= date('Y',strtotime($custInfo[$key]['exp_date']));
         
        $price=$prod->first_user;
        $add_user=$prod->add_user;
        $tax=$prod->tax;

        $custUser= $custInfo[$key]->user;
        $actUsr=$custUser-1;
        $actPrice=0;
        if($actUsr > 0){
            $actPrice=$actUsr*$add_user;
        } 

        $realPrice= $actPrice+$price;

        if($tax==1){
            $tax=($realPrice*$info->tax)/100;
            $realPrice=$tax+$realPrice;
        }

        $sum+=$realPrice;

        }

        }




        /**************************************************/



        $custInfo= Cust::where('Organization_Number',$record['CUSTNO'])->first();
        $email="";
        if($custInfo){
            $email= $custInfo->Primary_Email;
            $ids1[]=$record['CUSTNO'];
        }
        // $username = $record->username;
        // $name = $record->name;
        // $email = $record->email;

        $tax= (str_replace(',','',$record['Price_RM'])*$info->tax)/100;

        $valueAfterTax= $tax+str_replace(',','',$record['Price_RM']);

         
        $product=Product::whereIn('id',explode(',',$record['product']))->get()->pluck('title')->toArray();
        

        $dueDate= strtotime($record['Due_date']);
        $toDayDate= strtotime(date('d-m-Y'));

        $dueDateColor=0;
        if($toDayDate > $dueDate){
        $dueDateColor=1;
        }




        $data_arr[] = array(
          "id" => $record['id'],
          "Subject" => $record['Subject'],
          "Organization_Name" => $record['Organization_Name'],
          "Support_Type" => $record['Support_Type'],
          "product" => implode(',',$product),
          "Price_RM" => $record['Price_RM'],
          "sum" => $sum,
          "email" => $email,
          "custInfo" => $custInfo,
          "button" => 'efsd',
          "dueDateColor" => $dueDateColor,
          "renew_status" => $record['renew_status'],
          "due_date" => date('d-m-Y',strtotime($record['Due_date']))
        );
     }
     if($searchValue !=""){
     $_SESSION['ids']=array_unique($ids1);
    }else{
      $_SESSION['ids']=array();
    }
     //print_r(\Session::get('ids'));
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "aaData" => $data_arr,
        "ids" => $_SESSION['ids']
     );


         

     echo json_encode($response);
     exit; 
    
    }

    // update filter settings
   // updateSetting

public function sendEmail(Request $request){

        $all= $request->all();

        $ids=$_SESSION['ids'];
        // dd($ids);

        $this->data['info']= Info::first();
        $this->data['month']= $request->month;
        $this->data['year']= $request->year;
        $this->data['priceType']= $request->priceType;
        
        $this->data['info']= Info::first();
        $records = new Ictran();
        if(!empty($ids)){
          $records=$records->whereIn('CUSTNO',$ids);
        }
        $records= $records->whereYear('Due_date', $request->year)
        ->whereMonth('Due_date', $request->month);
       /* $this->data['m'] = $request->month;
        $this->data['y']= $request->year;*/
        $records=$records/*->groupBy('CUSTNO')*/->where('renew_status',0)->get()->toArray();
        // echo count($records);die;
        $productIds="";
        foreach ($records as $key => $value) {

           
            $this->data['ictran']=$value;

            $cust= Cust::where('Organization_Number',$value['CUSTNO'])->first();

            /*if($request->testmode==1){
                $email= $request->email;
            }else{
            $email= $cust['Primary_Email'];
            }*/

            $email= 'rahul@yopmail.com';

            /*$Product= Product::whereIn('id',explode(',',$value['product']))->get();
            $custInfo= CustomerInfo::where('customer_id',$value['CUSTNO'])->whereIn('setting_id',explode(',',$value['product']))->get();*/
           // foreach($Product as $key=>$prod){
            /*                 
            $getMonth= date('m',strtotime($custInfo[$key]['exp_date']));
            $getYear= date('Y',strtotime($custInfo[$key]['exp_date']));*/
           // echo $key; echo '<br>';
          //return view('emails.marketing',$this->data);die;
            // if($request->month==$getMonth && $request->year==$getYear){
           //return view('emails.marketing',$this->data);


            \Mail::send('emails.marketing', $this->data, function($message) use ($email){
            $message->to($email)->subject
            ('Software Renewal - Quotation');
            $message->from('sales@pcmart.com.my','UBS Software Support - Quotation');
            });

            if( count(\Mail::failures()) > 0 ) {

             foreach(\Mail::failures as $email_address) {
                 echo "$email_address <br />";
              }

              } else {
                  echo "Mail sent successfully!";
              }


              //echo $key; echo '<br>';

            //}
            }
       

       

       return redirect('app/email-marketing')->withErrors(['Success', 'You have successfully sent email !!!']); 
    }


}