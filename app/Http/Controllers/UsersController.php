<?php

namespace App\Http\Controllers;
require_once base_path() . "/dbf/vendor/autoload.php";
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
use App\Models\Transaction;
use App\Models\Training;
use App\Models\Trainer;
use App\Models\ProductCat;
use App\Models\Notification;
use App\Models\ScheduleSession;
use App\Models\trainingSetting;
use App\Models\SubscriptionSetting;
use App\Models\CustomerSubscription;
use App\Helpers\Helper;

use XBase\Table;
use Carbon\Carbon;
session_start();

class UsersController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        //$this->getCountData();
    }

    public function getCountData()
    {
        // dd(3532);
        $records = Ictran::with("getCountInvoice")
            ->get()
            ->toArray();
        foreach ($records as $key => $value1) {
            $records1 = Ictran::where("id", $value1["id"])->first();
            // echo '<pre>';print_r($value1['get_count_invoice']);die;
            $records1->count = count($value1["get_count_invoice"]);
            $records1->save();
        }
    }

    //ecommerce
    public function dashboardEcommerce(Request $request)
    {
        error_reporting(0);
        // die;
        //\ echo date('Y-m-d H:i:s');die;
        if (\Auth::user()->is_active != 1) {
            return redirect("/admin");
        }
        // echo $request->userid;
        //dd($request->userid);
        $dd = 1;
        if ($request->userid == "") {
            $userId = \Auth::user()->id;
            $this->data["uuname"] = \Auth::user()->name;
        } else {
            $dd = 0;
            $userId = $request->userid;
            $this->data["uuname"] = User::where("id", $userId)->first()->name;
        }
        $dd1 = 1;
        if ($request->rate == "") {
            $userId1 = \Auth::user()->id;
            $this->data["uuname"] = \Auth::user()->name;
        } else {
            $dd1 = 0;
            $userId1 = $request->rate;
            $this->data["uuname"] = User::where("id", $userId)->first()->name;
        }

        $data = Ticket::get()->pluck("ictran_id");
        $userIdArray = AssignTicket::get()->pluck("user_id");
        $this->data["users"] = User::whereIn("id", $userIdArray)
            ->get()
            ->toArray();
        $this->data["customers"] = Ictran::whereIn("id", $data)
            ->get()
            ->toArray();

        //echo '<pre>';print_r($this->data['users']);die;
        $arrayChart = [];
        foreach ($this->data["users"] as $key => $value) {
            $ticketCount = \DB::table("ticket")
                //->select('league_name')
                ->join(
                    "ticket_assign",
                    "ticket_assign.ticket_id",
                    "=",
                    "ticket.id"
                )
                ->where("ticket_assign.user_id", $value["id"])
                ->where("ticket.status", 2)
                ->count();

            $arrayChart[]["name"] = $value["name"];
            $arrayChart[$key]["tcount"] = $ticketCount;
        }
        $this->data["arrayChart"] = $arrayChart;

        $this->data["recordOpen"] = $recordOpen;
        $this->data["records"] = $records;
        $this->data["LoginUserData"] = $LoginUserData;
        $this->data["ratings"] = $gtData;
        $this->data["allUser"] = $allUser;

        // New  code
        $openTicket = Ticket::where("status", 0)->count();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        // echo date('d-m-Y H:i:s');die;
        $closedTicket = Ticket::where("status", 2)->count();
        $this->data["closedTicket1"] = Ticket::where("status", 2)
            ->whereDate("close_date", date("Y-m-d"))
            ->count();

        $totalDays = \DB::table("ticket as w")
            ->select([\DB::Raw("DATE(w.created_at) day")])
            ->groupBy("day")
            ->orderBy("w.created_at")
            ->get();
        //echo count($totalDays);die;
        $this->data["tday"] = count($totalDays);

        // 2 h grather
        $twohgreather = Ticket::where(
            "created_at",
            "<",
            Carbon::now()
                ->subMinutes(120)
                ->toDateTimeString()
        )
            ->where("status", 0)
            ->count();

        // 30 minutes greates and 2 hours less
        $greater30MinutesG = Ticket::where(
            "created_at",
            "<",
            Carbon::now()
                ->subMinutes(30)
                ->toDateTimeString()
        )
            ->where(
                "created_at",
                ">",
                Carbon::now()
                    ->subMinutes(120)
                    ->toDateTimeString()
            )
            ->where("status", 0)
            ->count();

        // 30 minutes less
        $less30Minutes = Ticket::where(
            "created_at",
            ">",
            Carbon::now()
                ->subMinutes(30)
                ->toDateTimeString()
        )
            // ->where('created_at', '<',$formatted_date)
            ->where("status", 0)
            ->count();

        /***************************************************************************************************/
        /****************************************************************************************************/
        // show chart data

        // 2 h grather
        /*$twohgreatherChart= Ticket::where('created_at', '<',Carbon::now()->subMinutes(120)->toDateTimeString())
      ->where('status',2)
      ->count();

      // 30 minutes greates and 2 hours less
      $greater30MinutesGChart= Ticket::
      where('created_at', '<',Carbon::now()->subMinutes(30)->toDateTimeString())
      ->where('created_at', '>',Carbon::now()->subMinutes(120)->toDateTimeString())
      ->where('status',2)
      ->count();


      // 30 minutes less
      $less30MinutesChart= Ticket::where('created_at', '>',Carbon::now()->subMinutes(30)->toDateTimeString())
      // ->where('created_at', '<',$formatted_date)
      ->where('status',2)
      ->count();*/

        if ($dd == 1) {
            $less30MinutesChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `created_at`, `close_date`) AS difference FROM `ticket` WHERE `status`=2 HAVING difference < 30"
            );

            $twohgreatherChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `created_at`, `close_date`) AS difference FROM `ticket` WHERE `status`=2 HAVING difference > 120"
            );

            $greater30MinutesGChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `created_at`, `close_date`) AS difference FROM `ticket` WHERE `status`=2 HAVING difference > 30 AND difference < 120"
            );

            $this->data["twohgreatherChart"] = count($twohgreatherChart);
            $this->data["less30MinutesChart"] = count($less30MinutesChart);
            $this->data["greater30MinutesGChart"] = count(
                $greater30MinutesGChart
            );
        } else {
            /*****************************************************************************************************/
            // For current user data
            // SELECT HOUR(SEC_TO_TIME(TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(t.`created`),FROM_UNIXTIME(t.`modified`)))) as `hours` FROM `ticket` t LEFT JOIN ticket_assign ta ON ta.ticket_id=t.id WHERE ta.user_id='".$user_for_filter."' HAVING `hours`<0.5

            $less30MinutesChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `ticket`.`created_at`, `ticket`.`close_date`) AS difference FROM `ticket`   LEFT JOIN ticket_assign  ON `ticket_assign`.`ticket_id`=`ticket`.`id` WHERE `ticket_assign`.`user_id`=" .
                    $userId .
                    " and `ticket`.`status`=2 HAVING difference < 30"
            );

            $twohgreatherChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `ticket`.`created_at`, `ticket`.`close_date`) AS difference FROM `ticket`   LEFT JOIN ticket_assign  ON `ticket_assign`.`ticket_id`=`ticket`.`id` WHERE `ticket_assign`.`user_id`=" .
                    $userId .
                    " and `ticket`.`status`=2 HAVING difference > 120"
            );

            $greater30MinutesGChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `ticket`.`created_at`, `ticket`.`close_date`) AS difference FROM `ticket`   LEFT JOIN ticket_assign  ON `ticket_assign`.`ticket_id`=`ticket`.`id` WHERE `ticket_assign`.`user_id`=" .
                    $userId .
                    " and `ticket`.`status`=2 HAVING difference > 30 AND difference < 120"
            );

            $this->data["twohgreatherChart"] = count($twohgreatherChart);
            $this->data["less30MinutesChart"] = count($less30MinutesChart);
            $this->data["greater30MinutesGChart"] = count(
                $greater30MinutesGChart
            );
        }
        //echo '<pre>';print_r($this->data);die;
        //echo count($less30MinutesChartLogin);die;
        /*****************************************************************************************************/

        // For rating
        if ($dd1 == 1) {
            $rating = \DB::select(
                "SELECT COUNT(CASE WHEN rate=5 THEN 1 END) as rating_5, COUNT(CASE WHEN rate=4 THEN 1 END) as rating_4, COUNT(CASE WHEN rate=3 THEN 1 END) as rating_3, COUNT(CASE WHEN rate=2 THEN 1 END) as rating_2, COUNT(CASE WHEN rate=1 THEN 1 END) as rating_1 FROM feedback"
            );

            $this->data["ratel5"] = $rating[0]->rating_5;
            $this->data["ratel4"] = $rating[0]->rating_4;
            $this->data["ratel3"] = $rating[0]->rating_3;
            $this->data["ratel2"] = $rating[0]->rating_2;
            $this->data["ratel1"] = $rating[0]->rating_1;
        } else {
            $individual_feeback_sql = \DB::select(
                "SELECT COUNT(CASE WHEN f.rate=5 THEN 1 END) as rating_5, COUNT(CASE WHEN f.rate=4 THEN 1 END) as rating_4, COUNT(CASE WHEN f.rate=3 THEN 1 END) as rating_3, COUNT(CASE WHEN f.rate=2 THEN 1 END) as rating_2, COUNT(CASE WHEN f.rate=1 THEN 1 END) as rating_1 FROM feedback f LEFT JOIN ticket_assign ta ON ta.ticket_id=f.ticket_id WHERE ta.user_id='" .
                    $userId1 .
                    "'"
            );

            $this->data["ratel5"] = $individual_feeback_sql[0]->rating_5;
            $this->data["ratel4"] = $individual_feeback_sql[0]->rating_4;
            $this->data["ratel3"] = $individual_feeback_sql[0]->rating_3;
            $this->data["ratel2"] = $individual_feeback_sql[0]->rating_2;
            $this->data["ratel1"] = $individual_feeback_sql[0]->rating_1;
        }

        // echo '<pre>';print_r($rating);die;

        $this->data["openTicket"] = $openTicket;
        $this->data["closedTicket"] = $closedTicket;
        $this->data["twohgreather"] = $twohgreather;
        $this->data["less30Minutes"] = $less30Minutes;
        $this->data["greater30MinutesG"] = $greater30MinutesG;

        \Session::put("backUrl", url()->current());
        return view("admin.dashboard.dashboard", $this->data);
    }

    public function dashboardTicket(Request $request)
    {
        $perm = Helper::checkPermission();
        $ticket_red_renew = 0;
        if (in_array("ticket_red_renew", $perm)) {
            $ticket_red_renew = 1;
        }
        // Delete ticket
        $tickect_delete = 0;
        if (in_array("tickect_delete", $perm)) {
            $tickect_delete = 1;
        }
        $tickect_edit = 0;
        if (in_array("tickect_edit", $perm)) {
            $tickect_edit = 1;
        }
        $contract_edit = 0;
        if (in_array("contract_edit", $perm)) {
            $contract_edit = 1;
        }
        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value
        \Session::put("key", $searchValue);

        // for user only filter

        $status = 0;
        if ($_GET["status"] != "") {
            $status = $_GET["status"];
        }

        // Fetch records
        $records = \DB::table("ticket")
            ->join("ticket_assign", "ticket_assign.ticket_id", "=", "ticket.id")
            ->join("ictran", "ictran.id", "=", "ticket.ictran_id")
            ->join("users", "users.id", "=", "ticket_assign.user_id")
            ->join("users as a1", "a1.id", "=", "ticket_assign.assigned_by")
            ->leftjoin("feedback", "feedback.ticket_id", "=", "ticket.id")
            ->leftjoin("cust_info", "cust_info.id", "=", "ticket_assign.otherCustomerId")

            ->select(
                "ticket.*",
                "ticket.id as tid",
                "ticket_assign.*",
                "ictran.Organization_Name as oname",
                "users.name as user",
                "ticket.created_at as cdate",
                "ticket.status as tstatus",
                "feedback.*",
                "cust_info.phone as coPhone",
                "cust_info.name as coName",
                "a1.name as asignName"
            )
            ->where(function ($query) use ($searchValue) {
                $query
                    ->orwhere(
                        "cust_info.phone",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "ticket.ictran_id",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "cust_info.name",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "ticket.created_at",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere("users.name", "like", "%" . $searchValue . "%")
                    ->orwhere(
                        "ictran.Organization_Name",
                        "like",
                        "%" . $searchValue . "%"
                    );
                //->orWhere('ticket.status', 'like', '%' .$searchValue . '%');
            });

        if ($_GET["startDate"] != "" && $_GET["endDate"]) {
            $startDate = date("Y-m-d", strtotime($_GET["startDate"]));
            $endDate = date("Y-m-d", strtotime($_GET["endDate"]));
            $records = $records->whereBetween("ticket.created_at", [
                $startDate . " 00:00:00",
                $endDate . " 23:59:59",
            ]);
        }
        if ($_GET["customer"] != "") {
            $records = $records->where("ictran.id", $_GET["customer"]);
        }
        if ($_GET["user"] != "") {
            $records = $records->where("users.id", $_GET["user"]);
        }
        if ($_GET["rating"] != "") {
            $records = $records->where("feedback.rate", $_GET["rating"]);
        }

        $records = $records->Where("ticket.status", "=", $status);
        $recordsr = $records->count();
        $records = $records
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();
        //$recordsr= $records->count();

        $totalRecordswithFilter = $recordsr;
        $totalRecords = $totalRecordswithFilter;
        //echo count($records);die;
        $data_arr = [];
        // echo '<pre>';print_r($records);die;
        $close = 0;
        foreach ($records as $record) {
            $actDate = $this->time_elapsed_string($record->cdate, true);
            if ($record->tstatus == 2) {
                $close++;
            }

            //echo '<pre>';print_r(date('H:i:s'));
            $assignBy = User::where("id", $record->assigned_by)->first();
            //$time= $this->getDateAndTime(date('d-m-Y H:i:s',strtotime($record->created_at)));
            $endDate = new \DateTime("now");
            $now = date("Y-m-d H:i:s");
            if ($record->tstatus == 2) {
                $endDate = new \DateTime($record->close_date);
                $now = date("Y-m-d H:i:s", strtotime($record->close_date));
            }

            $previousDate = $record->cdate;
            $startdate = new \DateTime($previousDate);

            $interval = $endDate->diff($startdate);
            $time = $interval->format("%dd:%Hh:%ii:%ss");
            $min = $interval->format("%i");
            $hours = $interval->format("%H");

            $difference = strtotime($now) - strtotime($previousDate);
            //$time= '2:10:0';
            $totalMinutes = floor($difference / 60);
            // echo $totalMinutes; echo '>>';
            if ($totalMinutes < 30) {
                $timeStatus = 1;
            } elseif ($totalMinutes > 30 && $totalMinutes < 120) {
                $timeStatus = 2;
            } elseif ($totalMinutes > 120) {
                $timeStatus = 3;
            }

            $data_arr[] = [
                "tid" => $record->tid,

                "oname" => @$record->oname,
                "user" => $record->user,
                "phone" => @$record->coPhone,
                "contact_person" => @$record->coName,
                "description" => @$record->description,
                "asignName" => @$record->asignName,
                "time" => ($record->tstatus == 2) ? $time : $this->time_elapsed_string($record->cdate, true),
                "ticketstatus" => $record->tstatus,
                "timeStatus" => $timeStatus,
                "tickect_delete" => $tickect_delete,
                "contract_edit" => $contract_edit,
                "tickect_edit" => $tickect_edit,
                "cdate" => date("d-m-Y", strtotime($record->cdate)),
            ];
        }

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "close" => $close,
            "aaData" => $data_arr,
        ];

        echo json_encode($response);
        exit();
    }

    public function dashboardView(Request $request)
    {
        $perm = Helper::checkPermission();

        $due = 0;
        if (in_array("contract_due_date", $perm)) {
            $due = 1;
        }
        $value = 0;
        if (in_array("contract_hide_value", $perm)) {
            $value = 1;
        }
        $ticket_multiple = 0;
        if (in_array("ticket_multiple", $perm)) {
            $ticket_multiple = 1;
        }
        $contract_delete = 0;
        if (in_array("contract_delete", $perm)) {
            $contract_delete = 1;
        }
        $contract_edit = 0;
        if (in_array("contract_edit", $perm)) {
            $contract_edit = 1;
        }
        $ticket_red_renew = 0;
        if (in_array("ticket_red_renew", $perm)) {
            $ticket_red_renew = 1;
        }

        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value

        $records = Ictran::with("getCountInvoice")->where(function (
            $query
        ) use ($searchValue) {
            $query
                ->where(
                    "ictran.Organization_Name",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere(
                    "ictran.Contract_Number",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere(
                    "ictran.Support_Type",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere("ictran.Price_RM", "like", "%" . $searchValue . "%");
        });

        if (@$_GET["startDate"] != "" && @$_GET["endDate"]) {
            $startDate = date("Y-m-d", strtotime($_GET["startDate"]));
            $endDate = date("Y-m-d", strtotime($_GET["endDate"]));
            $records = $records->whereBetween("ictran.Due_date", [
                $startDate,
                $endDate,
            ]);
        }
        //user for status not invoice name
        if (@$_GET["invoice"] != "") {
            $records = $records->where("ictran.renew_status", $_GET["invoice"]);
        }
        if (@$_GET["customer"] != "") {
            $records = $records->where(
                "ictran.product",
                "like",
                "%" . $_GET["customer"] . "%"
            );
        }
        if (@$_GET["type"] != "") {
            $records = $records->where("ictran.Support_Type", $_GET["type"]);
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

        $records = $records->select("ictran.*");

        $recordr = $records->count();
        $useCount = $records->get();
        $records = $records
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get()
            ->toArray();

        $totalRecordswithFilter = $recordr;
        $totalRecords = $totalRecordswithFilter;

        // usort($records, array($this,'date_compare'));

        // echo '<pre>';print_r($records);

        // die;
        $data_arr = [];
        $renewSum = 0;
        $agree = 0;
        $cancell = 0;
        $expire = 0;

        foreach ($useCount as $key => $useCount1) {
            if ($useCount1["renew_status"] == 1) {
                $renewSum++;
            }
            if ($useCount1["renew_status"] == 2) {
                $agree++;
            }
            if ($useCount1["renew_status"] == 3) {
                $cancell++;
            }

            $dueDate = strtotime($useCount1["Due_date"]);
            $toDayDate = strtotime(date("d-m-Y"));
            if ($toDayDate > $dueDate) {
                $expire++;
            }
            # code...
        }

        foreach ($records as $record) {
            $ticketCount11 = count($record["get_count_invoice"]);
            $ticketCount = Ticket::where("ictran_id", $record["id"])
                ->where("status", 0)
                ->count();
            // For Delete Btn
            $removeDeleteBtn = 0;
            if ($ticketCount > 0) {
                $removeDeleteBtn = 1;
            }

            // For Tiecket Btn
            $removeTiecket = 0;
            if ($ticketCount > 0) {
                $removeTiecket = 1;
            }

            $product = Product::whereIn("id", explode(",", $record["product"]))
                ->get()
                ->pluck("title")
                ->toArray();

            $dueDate = strtotime($record["Due_date"]);
            $toDayDate = strtotime(date("d-m-Y"));

            $dueDateColor = 0;
            if ($toDayDate > $dueDate) {
                $dueDateColor = 1;
                //$expire++;
            }
            //echo $record['renew_status']; echo '<br>';

            $deleteRedTicket = 0;
            if ($dueDateColor == 1 && $ticket_red_renew == 0) {
                $deleteRedTicket = 1;
            }

            $data_arr[] = [
                "id" => $record["id"],
                "Contract_Number" => $record["Contract_Number"],
                "Organization_Name" => $record["Organization_Name"],
                "Support_Type" => $record["Support_Type"],
                "product" => implode(",", $product),
                "Price_RM" => $value == 0 ? "None" : $record["Price_RM"],
                "button" => "efsd",
                "removeDeleteBtn" => $removeDeleteBtn,
                "contract_delete" => $contract_delete,
                "removeTiecket" => $removeTiecket,
                "contract_edit" => $contract_edit,
                "ticket_red_renew" => $deleteRedTicket,
                "dueDateColor" => $dueDateColor,
                "ticket_multiple" => $ticket_multiple,
                "count" => $record["count"],
                "renew_status" => $record["renew_status"],
                "due_date" =>
                    $due == 0
                        ? date("Y", strtotime($record["Due_date"]))
                        : date("d-m-Y", strtotime($record["Due_date"])),
            ];
        }

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "renewSum" => $renewSum,
            "cancell" => $cancell,
            "agree" => $agree,
            "expire" => $expire,

            "aaData" => $data_arr,
        ];

        echo json_encode($response);
        exit();
    }

    //user List
    public function listUser()
    {
        $this->data["users"] = User::with("getUserRole")
            ->orderBy("id", "desc")
            ->get();
        return view("pages.app-users-list", $this->data);
    }
    //user view
    public function viewUser()
    {
        return view("pages.app-users-view");
    }
    //user edit
    public function editUser()
    {
        $this->data["loginData"] = User::where(
            "id",
            \Auth::user()->id
        )->first();
        return view("pages.app-users-edit", $this->data);
    }

    public function addUser()
    {
        $this->data["allPermision"] = Module::with("getAllModuel")
            ->get()
            ->toArray();
        $this->data["roles"] = Role::where("status", 1)
            ->get()
            ->toArray();

        return view("pages.add-user", $this->data);
    }
    public function userStore(Request $request)
    {
        $allData = $request->all();
        // dd($allData);
        $checkUser = User::where("email", $request->email)->first();
        if ($checkUser) {
            return redirect("app/add-user")->withErrors([
                "Error",
                "Email already Exists !!!",
            ]);
        }

        $user = new User();
        $user->name = $request->fname;
        //$user->profile_pic= $request->profile_pic;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password != "") {
            $user->password = \Hash::make($request->password);
        }
        $user->address = $request->address;
        $user->status = $request->is_active;
        $user->user_type = $request->user_type;
        //$user->user_type= 2;

        if ($request->hasFile("file")) {
            $logofile = $request->file("file");
            // $destinationPath = public_path('/profile');
            // $name->move($destinationPath, $name);

            $destinationPath = public_path("profile/"); // upload path
            $outputImage =
                "profile_" .
                uniqid() .
                "." .
                $logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

            $user->profile_pic = $outputImage;
            //echo $logofile;die;
        }

        $user->save();

        return redirect("app/users/list")->withErrors([
            "Success",
            "You have successfully added !!!",
        ]);
    }

    public function adminUpdate(Request $request)
    {
        $user = User::where("id", \Auth::user()->id)->first();

        if ($request->hasFile("file")) {
            $logofile = $request->file("file");
            // $destinationPath = public_path('/profile');
            // $name->move($destinationPath, $name);

            $destinationPath = public_path("profile/"); // upload path
            $outputImage =
                "logo_" .
                uniqid() .
                "." .
                $logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

            $user->profile_pic = $outputImage;
            //echo $logofile;die;
        }

        $user->name = $request->fname;
        //$user->profile_pic= $request->profile_pic;
        $user->email = $request->email;
        if ($request->password != "") {
            $user->password = \Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->company_name = $request->company_name;
        $user->update();

        return \Redirect::back()->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    // Edit user data and update permision
    public function editUserData($id)
    {
        $this->data["edit"] = User::where("id", $id)->first();
        $this->data["loginTime"] = LoginTime::where("user_id", $id)
            ->get()
            ->toArray();
        //echo '<pre>';print_r($this->data['loginTime']);die;
        $this->data["allPermision"] = Module::with("getAllModuel")
            ->get()
            ->toArray();
        $allPerm = UserPermission::where("user_id", $id)->get();
        $this->data["roles"] = Role::where("status", 1)
            ->get()
            ->toArray();
        $userKey = [];
        foreach ($allPerm as $key => $value) {
            $userKey[] = $value["module_key"];
        }

        return view("pages.users-edit", $this->data)->with("userKey", $userKey);
    }

    public function permstore(Request $request, $id)
    {
        $allData = $request->all();

        $user = User::where("id", $id)->first();
        $user->name = $request->fname;
        //$user->profile_pic= $request->profile_pic;
        $user->email = $request->email;
        if ($request->password != "") {
            $user->password = \Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->is_active;
        $user->user_type = @$request->user_type;

        if ($request->hasFile("file")) {
            $logofile = $request->file("file");
            // $destinationPath = public_path('/profile');
            // $name->move($destinationPath, $name);

            $destinationPath = public_path("profile/"); // upload path
            $outputImage =
                "profile_" .
                uniqid() .
                "." .
                $logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

            $user->profile_pic = $outputImage;
            //echo $logofile;die;
        }

        $user->save();

        return redirect("app/users/list")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::where("id", $id)->delete();

        $allPerm = UserPermission::where("user_id", $id)->get();
        $LoginTime = LoginTime::where("user_id", $id)->get();

        if ($allPerm) {
            foreach ($allPerm as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
            }
        }

        if ($LoginTime) {
            foreach ($LoginTime as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
            }
        }
        return redirect("app/users/list")->withErrors([
            "Success",
            "You have successfully deleted !!!",
        ]);
    }

    // list Role
    public function roles()
    {
        $this->data["roles"] = Role::with("checkRole")
            ->orderBy("id", "desc")
            ->get();
        //echo '<pre>';print_r($this->data['roles']);die;
        return view("admin.role.list", $this->data);
    }
    // Add role
    public function addRole()
    {
        $this->data["allPermision"] = Module::with("getAllModuel")
            ->get()
            ->toArray();
        return view("admin.role.add", $this->data);
    }

    public function roleStore(Request $request)
    {
        $allData = $request->all();

        $checkUser = Role::where("role", $request->role)->first();
        if ($checkUser) {
            return redirect("app/add-role")->withErrors([
                "Error",
                "Role already Exists !!!",
            ]);
        }

        $role = new Role();
        $role->role = $request->role;

        $role->status = $request->status;
        $role->save();

        if (isset($allData["keyname"])) {
            foreach ($allData["keyname"] as $key => $value) {
                $userPermission = new UserPermission();
                $userPermission->user_id = $role->id;
                $userPermission->module_key = $value;
                $userPermission->save();
            }
        }

        foreach ($allData["from_from"] as $key => $value) {
            $logintime = new LoginTime();
            $logintime->user_id = $role->id;
            $logintime->day_id = $key;
            $logintime->start_time = $value;
            $logintime->end_time = $allData["from_to"][$key];
            $logintime->save();
        }

        return redirect("app/role/list")->withErrors([
            "Success",
            "You have successfully added !!!",
        ]);
    }

    // For edit role
    public function roleEdit($id)
    {
        $this->data["edit"] = Role::where("id", $id)->first();
        $this->data["loginTime"] = LoginTime::where("user_id", $id)
            ->get()
            ->toArray();
        //echo '<pre>';print_r($this->data['loginTime']);die;
        $this->data["allPermision"] = Module::with("getAllModuel")
            ->get()
            ->toArray();
        $allPerm = UserPermission::where("user_id", $id)->get();
        $userKey = [];
        foreach ($allPerm as $key => $value) {
            $userKey[] = $value["module_key"];
        }

        return view("admin.role.edit", $this->data)->with("userKey", $userKey);
    }

    public function roleDelete($id)
    {
        $user = Role::where("id", $id)->delete();

        $allPerm = UserPermission::where("user_id", $id)->get();
        $LoginTime = LoginTime::where("user_id", $id)->get();

        if ($allPerm) {
            foreach ($allPerm as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
            }
        }

        if ($LoginTime) {
            foreach ($LoginTime as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
            }
        }
        return redirect("app/role/list")->withErrors([
            "Success",
            "You have successfully deleted !!!",
        ]);
    }
    // Update Role
    public function roleUpdate(Request $request, $id)
    {
        $allData = $request->all();
        //echo '<pre>';print_r($allData['keyname']);die;
        $allPerm = UserPermission::where("user_id", $id)->get();
        $LoginTime = LoginTime::where("user_id", $id)->get();

        if ($allPerm) {
            foreach ($allPerm as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
            }
        }

        if ($LoginTime) {
            foreach ($LoginTime as $key => $value) {
                //$allPerm = UserPermission::where('id',\Auth::user()->id)->get();
                $value->delete();
            }
        }

        if (isset($allData["keyname"])) {
            foreach ($allData["keyname"] as $key => $value) {
                $user = new UserPermission();
                $user->user_id = $id;
                $user->module_key = $value;
                $user->save();
            }
        }

        foreach ($allData["from_from"] as $key => $value) {
            $user = new LoginTime();
            $user->user_id = $id;
            $user->day_id = $key;
            $user->start_time = $value;
            $user->end_time = $allData["from_to"][$key];
            $user->save();
        }

        $Role = Role::where("id", $id)->first();
        $Role->role = $request->role;

        $Role->status = $request->status;
        $Role->save();

        return redirect("app/role/list")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    public function updateTheme(Request $request)
    {
        $allData = $request->all();
        $user = User::where("id", \Auth::user()->id)->first();
        $user->theme = $allData["theme"];
        if ($user->save()) {
            return true;
        }
    }

    // for setting module

    public function settings()
    {
        $this->data["products"] = Product::get();
        return view("admin.product.list", $this->data);
    }
    // for settind related
    public function settingsAdd()
    {
        return view("admin.product.add");
    }
    public function settingsStore(Request $request)
    {
        $setting = new Product();
        $setting->title = $request->title;
        $setting->first_user = $request->first_user;
        $setting->add_user = $request->add_user;
        $setting->new = $request->new;
        $setting->renew = $request->renew;
        $setting->cat = $request->cat;
        $setting->description = $request->description;
        $setting->company_name = $request->company_name;
        $setting->tax = $request->tax;
        $setting->save();

        return redirect("app/settings/list")->withErrors([
            "Success",
            "You have successfully added !!!",
        ]);
    }

    public function settingsEdit($id)
    {
        $this->data["info"] = Info::get();
        $this->data["edit"] = Product::where("id", $id)->first();

        return view("admin.product.edit", $this->data);
    }

    public function settingsUpdate(Request $request, $id)
    {
        $setting = Product::where("id", $id)->first();
        $setting->title = $request->title;
        $setting->first_user = $request->first_user;
        $setting->add_user = $request->add_user;
        $setting->new = $request->new;
        $setting->renew = $request->renew;
        $setting->cat = $request->cat;
        $setting->description = $request->description;
        $setting->company_name = $request->company_name;
        $setting->tax = $request->tax;
        $setting->save();

        return redirect("app/settings/list")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    public function settingsDelete($id)
    {
        $Product = Product::where("id", $id)->delete();
        if ($Product) {
            return redirect("app/settings/list")->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ]);
        }
    }

    // For uploads module
    public function uploads()
    {
        return view("admin.upload.add");
    }
    // For customerList module
    public function customerList()
    {
        $this->data["customers"] = Cust::with("getDeleteCount")->get();
        // dd($this->data['customers']);

        $statusArray = [0, 2];
        $allrecord = Ictran::whereDate("Due_date", ">", date("Y-m-d"))
            ->whereIn("renew_status", $statusArray)
            ->get();

        $totalCount = Ictran::whereDate("Due_date", ">", date("Y-m-d"))
            ->whereIn("renew_status", $statusArray)
            ->count();

        $nocontracts = Cust::get();
        $nocontract = 0;
        // foreach ($nocontracts as $key => $value) {
        //     $allrecord= Ictran::where('CUSTNO',$value->Organization_Number)->first();
        //     if($allrecord){

        //     }else{
        //       $nocontract++;
        //     }
        // }
        $date = \Carbon\Carbon::today()->subDays(365);
        // Expire contract
        $latyear = date("Y-m-d", strtotime(Carbon::now()->addYears(-1)));
        $expireContract = Ictran::whereDate("Due_date", ">=", $date)
            ->whereDate("Due_date", "<=", date("Y-m-d"))
            ->where("renew_status", 0)
            ->count();

        // Cancel Contract

        $cancelContract = Ictran::whereDate("Due_date", ">=", $date)
            ->where("renew_status", 3)
            ->count();
        // Pending contract
        $pendingContract = Ictran::where("renew_status", 2)->count();

        $this->data["totalCount"] = $totalCount;
        $this->data["expireContract"] = $expireContract;
        $this->data["nocontract"] = $nocontract;
        $this->data["cancelContract"] = $cancelContract;
        $this->data["pendingContract"] = $pendingContract;
        return view("admin.customer.list", $this->data);
    }

    public function cusomer2(Request $request)
    {
        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value

        $records = Cust::with("getDeleteCount")->where(function ($query) use (
            $searchValue
        ) {
            $query
                ->where(
                    "arcust.Organization_Number",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere(
                    "arcust.Organization_Name",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere("arcust.Attention", "like", "%" . $searchValue . "%")
                ->orwhere(
                    "arcust.Secondary_Phone",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere(
                    "arcust.Primary_Phone",
                    "like",
                    "%" . $searchValue . "%"
                );
        });

        $records = $records->select("arcust.*");

        $recordr = $records->count();
        $records = $records
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get()
            ->toArray();

        $totalRecordswithFilter = $recordr;
        $totalRecords = $totalRecordswithFilter;

        $data_arr = [];
        foreach ($records as $record) {
            $deleteCount = 0;
            //echo '<pre>';print_r($record['get_delete_count']);
            if (count($record["get_delete_count"]) > 0) {
                $deleteCount = 1;
            }

            $data_arr[] = [
                "id" => $record["id"],
                "Organization_Number" => $record["Organization_Number"],
                "Organization_Name" => $record["Organization_Name"],
                "Attention" => $record["Attention"],
                "Primary_Phone" => $record["Primary_Phone"],
                "btn" => "",
                "deleteCount" => $deleteCount,
                "Secondary_Phone" => $record["Secondary_Phone"],
            ];
        }

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        ];

        echo json_encode($response);
        exit();
    }

    // For edit customer customerEdit
    public function customerEdit_backup($id)
    {
        $this->data["edit"] = Cust::where("id", $id)->first();
        // dd($this->data['edit']['Organization_Number']);
        $this->data["products"] = Product::get();
        $this->data["custInfo"] = CustInfo::where("cust_id", $id)->first();
        $this->data["checkInfo"] = CustomerInfo::where(
            "customer_id",
            $this->data["edit"]["Organization_Number"]
        )
            ->get()
            ->toArray();

        $data = Ticket::get()->pluck("ictran_id");
        $userIdArray = AssignTicket::get()->pluck("user_id");

        $this->data["users"] = User::whereIn("id", $userIdArray)
        ->get()
        ->toArray();
        $this->data["customers"] = Ictran::whereIn("id", $data)
        ->get()
        ->toArray();


        echo '<pre>';print_r($this->data);die;
        return view("admin.customer.edit", $this->data);
    }

    public function customerEdit($id)
    {
        $this->data["edit"] = Cust::where("id", $id)->first();
        //dd($this->data['edit']['Organization_Number']);
        $this->data["products"] = Product::get();
        $this->data["custInfo"] = CustInfo::where("cust_id", $id)->first();
        $this->data["checkInfo"] = CustomerInfo::where(
            "customer_id",
            $this->data["edit"]["Organization_Number"]
        )
            ->get()
            ->toArray();
        $this->data["subscriptions"] = SubscriptionSetting::get();
        #echo $this->data['edit']['Organization_Number']; die;
        $this->data["subscriptionsC"] = CustomerSubscription::where(
            "customer_id",
            "=",
            $this->data["edit"]["Organization_Number"]
        )
            ->get()
            ->toArray();
        $this->data["custInfoDet"] = CustInfo::where(
            "cust_id",
            "=",
            $this->data["edit"]["Organization_Number"]
        )
            ->get()
            ->toArray();

        if (count($this->data["subscriptionsC"]) > 0) {
            if (count($this->data["subscriptionsC"]) > 1) {
                #print_r($this->data['subscriptions']); die;
                $this->data["fsubA"] = $this->data["subscriptionsC"][0];
                unset($this->data["subscriptionsC"][0]);
                $this->data["fsubB"] = $this->data["subscriptionsC"];
            } else {
                $this->data["fsubA"] = $this->data["subscriptionsC"][0];
                $this->data["fsubB"] = [];
            }
        } else {
            $this->data["fsubA"] = [];
            $this->data["fsubB"] = [];
        }

        if (count($this->data["custInfoDet"]) > 0) {
            if (count($this->data["custInfoDet"]) > 1) {
                #print_r($this->data['subscriptions']); die;
                $this->data["fsubAI"] = $this->data["custInfoDet"][0];
                unset($this->data["custInfoDet"][0]);
                $this->data["fsubBI"] = $this->data["custInfoDet"];
            } else {
                $this->data["fsubAI"] = $this->data["custInfoDet"][0];
                $this->data["fsubBI"] = [];
            }
        } else {
            $this->data["fsubAI"] = [];
            $this->data["fsubBI"] = [];
        }

        $data = Ticket::get()->pluck("ictran_id");
        $userIdArray = AssignTicket::get()->pluck("user_id");

         $this->data["users"] = User::whereIn("id", $userIdArray)
        ->get()
        ->toArray();
        $this->data["customers"] = Ictran::whereIn("id", $data)
        ->get()
        ->toArray();
        $this->data["prodcucts"] = Product::get()->toArray();
        $this->data["Support_Type"] = Ictran::groupby("Support_Type")->get();
        $this->data["invoicesU"] = Transaction::get()->toArray();
        $this->data["Support_TypeU"] = Transaction::groupby("code")->get();

        
          // echo '<pre>';print_r($this->data);die;

        $allDta = $this->customerTraining($this->data['edit']['Organization_Number']);
        //echo '<pre>';print_r($dataCust);die;

        $this->data["training"] = $allDta;
          
        \Session::put("backUrl", url()->current());
        return view("admin.customer.edit", $this->data);
    }


    public function customerTraining($number)
    {
      //dd($number);
      $trainingId = Schedulesession::get()
            ->pluck("trainingId")
            ->toArray();

        //dd($sess);
        $this->data["none"] = Training::whereNotIn("id", $trainingId)->count();
        $ses = [1];
        $trainingId = Schedulesession::where("sessionId", $ses)
            ->get()
            ->pluck("trainingId")
            ->toArray();
        //dd($trainingId);
        //$this->data['session2']= Training::whereIn('id',$trainingId)->count();
        $this->data["thisMonth"] = Training::whereMonth(
            "invoice_date",
            date("m")
        )
            ->whereYear("invoice_date", date("Y"))
            ->count();
        $this->data["thisMonthValue"] = Training::whereMonth(
            "invoice_date",
            date("m")
        )
            ->whereYear("invoice_date", date("Y"))
            ->sum("value");

        $this->data["product"] = trainingSetting::get();
        $session2 = Training::where("session1", "c")
            ->where("noOfSession", 2)
            ->get();
        $k = 0;
        foreach ($session2 as $key => $value) {
            if (
                count($value["getCountDta"]) == "1_2" ||
                $value["getCountDta"] == "none"
            ) {
                $k++;
            }
        }

        $this->data["session2"] = $k;

        // echo '<pre>';print_r(count($aa));die;
        $this->data["trainers"] = Trainer::get();

        $allDta = Training::where('customer',$number)->with("getCountDta");

        // if ($request->startDate != "" && $request->endDate) {
        //     $startDate = date("Y-m-d", strtotime($request->startDate));
        //     $endDate = date("Y-m-d", strtotime($request->endDate));
        //     $allDta = $allDta->whereBetween("invoice_date", [
        //         $startDate . " 00:00:00",
        //         $endDate . " 23:59:59",
        //     ]);
        // }

        // if ($request->product != "") {
        //     $allDta = $allDta->orwhere(
        //         "product",
        //         "like",
        //         "%" . $request->product . "%"
        //     );
        // }

        // if ($request->trainer != "") {
        //     $trainingId = Schedulesession::where("trainerId", $request->trainer)
        //         ->get()
        //         ->pluck("trainingId")
        //         ->toArray();
        //     $allDta = $allDta->whereIn("id", $trainingId);
        // }
        // if ($request->status != "") {
        //     $trainingId = Schedulesession::where("status", $request->status)
        //         ->get()
        //         ->pluck("trainingId")
        //         ->toArray();
        //     $allDta = $allDta->whereIn("id", $trainingId);
        // }

        // if ($request->session != "" && $request->session != "none") {
        //     if ($request->session == "1_2") {
        //         $allDta = $allDta
        //             ->where("session1", "c")
        //             ->where("session2", "")
        //             ->where("noOfSession", 2);
        //     } else {
        //         $allDta = $allDta->where("noOfSession", $request->session);
        //     }
        // }

       return $allDta = $allDta->orderBy("invoice_date", "asc")->get();
    }




    public function customerUpdate($id, Request $request)
    {
        $all = $request->all();
        // echo '<pre>';print_r($all);

        // die;

        $checkInfo = CustomerInfo::where(
            "customer_id",
            $request->Organization_Number
        )->get();

        foreach ($checkInfo as $key => $ids) {
            $ids->delete();
        }
        $updateIds = [];
        foreach ($all["id"] as $key => $ids) {
            if ($all["expcheck"][$key] == 1) {
                $updateIds[] = $all["id"][$key];
            }

            $otherInfo = new CustomerInfo();
            $otherInfo->customer_id = $request->Organization_Number;
            $otherInfo->setting_id = @$all["id"][$key];
            $otherInfo->exp_date_checkbox = @$all["expcheck"][$key];
            if ($all["exp_date"][$key] != "") {
                $otherInfo->exp_date = @date(
                    "Y-m-d",
                    strtotime($all["exp_date"][$key])
                );
            }
            $otherInfo->sno_number = @$all["sno"][$key];
            $otherInfo->user = @$all["user"][$key];
            if ($all["sagecover"][$key] != "") {
                $otherInfo->sage_cover = @date(
                    "Y-m-d",
                    strtotime($all["sagecover"][$key])
                );
            }
            $otherInfo->sage_cover_checkbox = @$all["sagecover_check"][$key];
            $otherInfo->info_type = @$all["title"][$key];
            $otherInfo->save();
            //  echo $ids.'>>>'.$all['title'][$key].'>>'.$all['sno'][$key].'>>'.$all['user'][$key].'>>'.$all['sagecover'][$key];echo '<br>';
        }
        // echo '<pre>';print_r($updateIds);

        // die;

        /*$ictran = Ictran::where('CUSTNO',$request->Organization_Number)->first();
        $ictran->product= implode(',',$updateIds);
        $ictran->save();*/

        $custUpdate = Cust::where("id", $id)->first();
        $custUpdate->Organization_Number = $request->Organization_Number;
        $custUpdate->Organization_Name = $request->Organization_Name;
        $custUpdate->Address1 = $request->Address1;
        $custUpdate->Address2 = $request->Address2;
        $custUpdate->Address3 = $request->Address3;
        $custUpdate->Address4 = $request->Address4;
        $custUpdate->Attention = $request->Attention;
        $custUpdate->Contact = $request->Contact;
        $custUpdate->Primary_Phone = $request->Primary_Phone;
        $custUpdate->Secondary_Phone = $request->Secondary_Phone;
        $custUpdate->Fax = $request->Fax;
        $custUpdate->Primary_Email = $request->Primary_Email;
        $custUpdate->Area = $request->Area;
        $custUpdate->Agent = $request->Agent;
        $custUpdate->ROC = $request->ROC;
        $custUpdate->GST = $request->GSTREGNO;
        $custUpdate->Blacklist = $request->Blacklist;
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

        return redirect("app/customer")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }
    // For customerDelete module
    public function customerDelete($id)
    {
        $deleteCustomer = Cust::where("id", $id)->delete();
        if ($deleteCustomer) {
            return redirect("app/customer")->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ]);
        }
    }

    public function infoList()
    {
        $this->data["info"] = Info::get();
        return view("admin.info.list", $this->data);
    }
    public function infoEdit($id)
    {
        $this->data["edit"] = Info::where("id", $id)->first();
        return view("admin.info.edit", $this->data);
    }

    public function deleteInfo($id)
    {
        $delete = Info::where("id", $id)->delete();
        return redirect("app/info")->withErrors([
            "Success",
            "You have successfully Deleted !!!",
        ]);
    }

    // Add info
    public function addInfo(Request $request)
    {
        $data = $request->all();

        if (!empty($data)) {
            $info = new Info();
            $info->company_name = $data["company_name"];
            $info->company_number = $data["company_number"];
            $info->address = $data["address"];
            $info->phone = $data["phone"];
            $info->attention = $data["attention"];
            $info->email = $data["email"];
            $info->website = $data["website"];
            $info->fb = $data["fb"];
            $info->skype = $data["skype"];
            $info->other = $data["other"];
            $info->tax = $data["tax"];
            $info->tax_number = $data["tax_number"];
            $info->save();
            return redirect("app/info")->withErrors([
                "Success",
                "You have successfully Added !!!",
            ]);
        } else {
            return view("admin.info.add");
        }
    }

    public function infoUpdate(Request $request, $id)
    {
        $data = $request->all();
        //echo '<pre>';print_r($data);die;
        // dd($request->all());
        $info = Info::where("id", $id)->first();
        $info->company_name = $data["company_name"];
        $info->company_number = $data["company_number"];
        $info->address = $data["address"];
        $info->phone = $data["phone"];
        $info->attention = $data["attention"];
        $info->email = $data["email"];
        $info->website = $data["website"];
        $info->fb = $data["fb"];
        $info->skype = $data["skype"];
        $info->other = $data["other"];
        $info->tax = $data["tax"];
        $info->tax_number = $data["tax_number"];
        $info->save();
        return redirect("app/info")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    // delete records
    public function deleteRecord(Request $request)
    {
        //echo '<pre>';print_r($request->all());die;
        foreach ($request->checkOne as $value) {
            $deleteCustomer = Cust::where("id", $value)->delete();
        }
        return redirect("app/customer")->withErrors([
            "Success",
            "You have successfully deleted !!!",
        ]);
    }

    // For upload file
    public function arcust(Request $request)
    {
        ini_set("memory_limit", "-1");
        ini_set("max_execution_time", 1200000);
        if ($request->hasFile("file")) {
            $logofile = $request->file("file");
            $fileName = $logofile->getClientOriginalName();

            /*if($fileName !='arcust.dbf'){
                \Session::flash('error', 'Please choose only arcust.dbf file !!!');
                return redirect('app/uploads');
             }*/

            $destinationPath = public_path("arcust/"); // upload path
            $outputImage =
                "arcust_" .
                uniqid() .
                "." .
                $logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

            $path = public_path() . "/arcust/" . $outputImage;

            $table = new Table($path);

            $actual_data = [];
            $keyVal = [];

            $actual_data = [];
            $keyVal = [];

            $i = 0;
            while ($record = $table->nextRecord()) {
                $row = [];

                foreach ($table->getColumns() as $i => $c) {
                    if ($c->getType() != "G") {
                        if ($c->getName() == "CREATED_ON") {
                            $row[$c->getName()] = $record->getDateTime($c);
                        } else {
                            $row[$c->getName()] = $record->$c;
                        }
                    }
                }
                $keyI = count($keyVal);

                //$keyVal[$keyI] = array($row['custno'],$row['custno']);
                array_push($actual_data, $row);
            }

            //echo '<pre>';print_r($table->nextRecord());die;

            foreach ($actual_data as $key => $value) {
                $checkCustNo = Cust::where(
                    "Organization_Number",
                    $value["custno"]
                )->first();

                if ($checkCustNo) {
                    //echo 'update'; echo '<br>';
                } else {
                    echo $value["name"];
                    echo "<br>--------";
                    $values = new Cust();
                    if ($value["custno"] != "") {
                        $values->Organization_Number = $value["custno"];
                    }
                    if ($value["name"] != "") {
                        $values->Organization_Name = $value["name"];
                    }
                    if ($value["add1"] != "") {
                        $values->Address1 = $value["add1"];
                    }
                    if ($value["add2"] != "") {
                        $values->Address2 = $value["add2"];
                    }
                    if ($value["add3"] != "") {
                        $values->Address3 = $value["add3"];
                    }
                    if ($value["add4"] != "") {
                        $values->Address4 = $value["add4"];
                    }

                    if ($value["attn"] != "") {
                        $values->Attention = $value["attn"];
                    }
                    if ($value["contact"] != "") {
                        $values->Contact = $value["contact"];
                    }
                    if ($value["phone"] != "") {
                        $values->Primary_Phone = $value["phone"];
                    }
                    if ($value["phonea"] != "") {
                        $values->Secondary_Phone = $value["phonea"];
                    }
                    if ($value["fax"] != "") {
                        $values->Fax = $value["fax"];
                    }
                    if ($value["e_mail"] != "") {
                        $values->Primary_Email = $value["e_mail"];
                    }
                    if ($value["area"] != "") {
                        $values->Area = $value["area"];
                    }
                    if ($value["agent"] != "") {
                        $values->Agent = $value["agent"];
                    }
                    if ($value["status"] != "") {
                        $values->Blacklist = $value["status"];
                    }
                    if ($value["comuen"] != "") {
                        $values->ROC = $value["comuen"];
                    }
                    //echo $key.'-'.$value['comuen'];echo '<br>';
                    if ($value["gstregno"] != "") {
                        $values->GST = $value["gstregno"];
                    }
                    if ($value["date"] != "") {
                        $values->Created_Time = date(
                            "d-m-Y",
                            strtotime($value["date"])
                        );
                    }
                    // if($value['name'] !=""){

                    //     $actTime= $value['created_on']->format(\DateTime::ISO8601);
                    //     $values->Created_Time = date('d-m-Y',strtotime($actTime));
                    // }

                    $values->save();
                }
            }
        }

        die();
        \Session::flash("message", "You have successfully uploaded !!!");
        return redirect("app/uploads");
    }

    function find_closest($array, $date)
    {
        //$count = 0;
        foreach ($array as $day) {
            //$interval[$count] = abs(strtotime($date) - strtotime($day));
            $interval[] = abs(strtotime($date) - strtotime($day));
            //$count++;
        }

        asort($interval);
        $closest = key($interval);

        return $array[$closest];
    }

    public function trainingUpload(Request $request)
    {
        ini_set("memory_limit", "-1");
        ini_set("max_execution_time", 1200000);
        if ($request->hasFile("file")) {
            $logofile = $request->file("file");
            $fileName = $logofile->getClientOriginalName();

            if ($fileName != "ictran.dbf") {
                \Session::flash(
                    "error",
                    "Please choose only ictran.dbf file !!!"
                );
                return redirect("app/uploads");
            }

            $destinationPath = public_path("ictrain/"); // upload path
            $outputImage =
                "arcust_" .
                uniqid() .
                "." .
                $logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

            $path = public_path() . "/ictrain/" . $outputImage;

            $table = new Table($path);

            $actual_data = [];
            $keyVal = [];

            $actual_data = [];
            $keyVal = [];

            $i = 0;
            while ($record = $table->nextRecord()) {
                $row = [];

                foreach ($table->getColumns() as $i => $c) {
                    if ($c->getType() != "G") {
                        if ($c->getName() == "CREATED_ON") {
                            $row[$c->getName()] = $record->getDateTime($c);
                        } else {
                            $row[$c->getName()] = $record->$c;
                        }
                    }
                }
                $keyI = count($keyVal);

                //$keyVal[$keyI] = array($row['custno'],$row['custno']);
                array_push($actual_data, $row);
            }

            //  echo '<pre>';print_r($actual_data);die;
            $success = [];
            $error = [];
            foreach ($actual_data as $key => $value) {
                $checkCustNo = Training::where("Invoice", $value["refno"])
                    ->where("code", $value["itemno"])
                    ->first();

                if ($checkCustNo) {
                    // echo $value['itemno'].'--'.$value['brem2'];echo '<br>';
                } else {
                    $action = 0;
                    if (
                        $request->start != "" &&
                        $request->to != "" &&
                        $request->start <= $value["itemno"] &&
                        $request->to >= $value["itemno"]
                    ) {
                        // / if($value['refno']=='TI107806'){
                        //echo 'not Imported--'.$value['brem2'];echo '<br>';

                        $custName = Cust::where(
                            "Organization_Number",
                            $value["custno"]
                        )->first();
                        $trainingSetting = TrainingSetting::where(
                            "code",
                            $value["itemno"]
                        )->first();
                        echo $value["refno"] .
                            "--" .
                            @$custName->Organization_Name;
                        echo "<br>";
                        $values = new Training();
                        if ($value["refno"] != "") {
                            $values->Invoice = $value["refno"];
                        }
                        if ($value["custno"] != "") {
                            $values->customer = $value["custno"];
                            $values->customer_name = @$custName->Organization_Name;
                        }
                        if ($value["amt"] != "") {
                            $values->value = $value["amt"];
                        }
                        if ($value["itemno"] != "") {
                            $values->code = $value["itemno"];
                            $values->noOfSession = 2;
                        }

                        // This code used only No of trainee
                        $sett = TrainingSetting::where(
                            "code",
                            $value["itemno"]
                        )->first();
                        $tVal = $value["amt"] - $sett->first_user;

                        if ($tVal == 0) {
                            $count = 1;
                        }

                        // echo $value['amt'].'--'.$sett->first_user.'-'.$tVal.'count'.$count.'count'.$tVal/$sett->add_user;echo '<br>';

                        $trainne1 = @$count + $tVal / $sett->add_user;
                        // echo $trainne1; echo '<br>';
                        $a = floor($trainne1);
                        if ($a < 0) {
                            $a = 1;
                        }
                        $values->trainee = $a;

                        $values->invoice_date = date(
                            "Y-m-d",
                            strtotime($value["date"])
                        );
                        if ($trainingSetting) {
                            $values->product = $trainingSetting->description;
                            //$values->trainee = $trainingSetting->no_of_session;
                        }
                        $values->save();
                    }

                    // }
                }
            }
            // echo 'Success'; echo '<br>';
            // foreach ($success as $key => $succ) {
            //   echo $succ; echo '<br>';
            // }

            // echo 'Failed'; echo '<br>';
            // foreach ($error as $key => $err) {
            //   echo $err; echo '<br>';
            // }
        }

        //die;
        \Session::flash("message", "You have successfully uploaded !!!");
        //return redirect('app/uploads');
    }
    public function subscriptionictran(Request $request)
    {
        ini_set("memory_limit", "-1");
        ini_set("max_execution_time", 1200000);
        if ($request->hasFile("file")) {
            $logofile = $request->file("file");
            $fileName = $logofile->getClientOriginalName();

            if ($fileName != "ictran.dbf") {
                \Session::flash(
                    "error",
                    "Please choose only ictran.dbf file !!!"
                );
                return redirect("app/uploads");
            }

            $destinationPath = public_path("ictrain/"); // upload path
            $outputImage =
                "arcust_" .
                uniqid() .
                "." .
                $logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

            $path = public_path() . "/ictrain/" . $outputImage;

            $table = new Table($path);

            $actual_data = [];
            $keyVal = [];

            $actual_data = [];
            $keyVal = [];

            $i = 0;
            while ($record = $table->nextRecord()) {
                $row = [];

                foreach ($table->getColumns() as $i => $c) {
                    if ($c->getType() != "G") {
                        if ($c->getName() == "CREATED_ON") {
                            $row[$c->getName()] = $record->getDateTime($c);
                        } else {
                            $row[$c->getName()] = $record->$c;
                        }
                    }
                }
                $keyI = count($keyVal);

                //$keyVal[$keyI] = array($row['custno'],$row['custno']);
                array_push($actual_data, $row);
            }

            // echo '<pre>';print_r($actual_data);die;
            $success = [];
            $error = [];
            foreach ($actual_data as $key => $value) {
                // $checkCustNo = Transaction::orwhere('sno_number',$value['brem2'])->first();

                $checkCustNo = Transaction::where("invoice", $value["refno"])
                    ->where("sno_number", $value["brem2"])
                    ->first();

                if ($checkCustNo) {
                    // echo $value['itemno'].'--'.$value['brem2'];echo '<br>';
                } else {
                    $action = 0;
                    if (
                        $request->start != "" &&
                        $request->to != "" &&
                        $request->start <= $value["itemno"] &&
                        $request->to >= $value["itemno"] &&
                        $value["type"] != "RC"
                    ) {
                        //echo 'not Imported--'.$value['brem2'];echo '<br>';
                        //  echo $value['itemno']; echo '<br>';

                        $values = new Transaction();
                        if ($value["refno"] != "") {
                            $values->invoice = $value["refno"];
                        }
                        if ($value["custno"] != "") {
                            $values->customer_id = $value["custno"];
                        }

                        // echo $value['itemno']; echo '<br>';
                        //  echo $value['brem2'];

                        //echo '<pre>';print_r($value);

                        $new = CustomerSubscription::where(
                            "code",
                            $value["itemno"]
                        )
                            ->where("sno_number", $value["brem2"])
                            ->first();
                        // $reNew=Product::where('renew',$value['itemno'])->first();
                        //echo '<pre>';print_r($product);
                        //echo $value['itemno']; echo '<br>';
                        //echo '<pre>';print_r($new);
                        /********************************************************/
                        // echo '<pre>';print_r($new);die;

                        if ($new) {
                            //  echo date('Y-m-d',strtotime($value['date']));
                            // echo '<pre>';print_r($new->id);
                            $custName = Cust::where(
                                "Organization_Number",
                                $value["custno"]
                            )->first();
                            $new1 = CustomerSubscription::where(
                                "id",
                                $new->id
                            )->first();
                            //$new1->start = date('Y-m-d',strtotime($value['date']));
                            $new1->expire = date(
                                "Y-m-d",
                                strtotime("+ 1 year", strtotime($new->expire))
                            );
                            $new1->save();
                            if ($value["type"] != "RC") {
                                $success[] =
                                    $value["refno"] . " - " . $value["brem2"];
                            }
                            //echo $value['brem2']; echo '----------------'; echo '<br>';
                            $values->sno_number = $new->sno_number;
                            $values->Organization_Name = @$custName->Organization_Name;
                            $values->user = $new->user;
                            $values->code = $new->code;
                            $values->start = date(
                                "Y-m-d",
                                strtotime($value["date"])
                            );
                            $values->expire = date(
                                "Y-m-d",
                                strtotime("+ 1 year", strtotime($new->expire))
                            );

                            if ($new->user > 1) {
                                $values->total_price =
                                    $value["amt"] * $new->user;
                            } else {
                                $values->total_price = $value["amt"];
                            }

                            if ($value["refno"] != "") {
                                $actTime = $value["created_on"]->format(
                                    \DateTime::ISO8601
                                );
                                $values->Created_Time = date(
                                    "Y-m-d",
                                    strtotime($actTime)
                                );
                            }

                            $values->save();
                        } else {
                            if ($value["type"] != "RC") {
                                $error[] =
                                    $value["refno"] . " - " . $value["brem2"];
                            }
                        }
                        /********************************************************/
                    }
                }
            }
            echo "Success";
            echo "<br>";
            foreach ($success as $key => $succ) {
                echo $succ;
                echo "<br>";
            }

            echo "Failed";
            echo "<br>";
            foreach ($error as $key => $err) {
                echo $err;
                echo "<br>";
            }
        }

        //die;
        \Session::flash("message", "You have successfully uploaded !!!");
        //return redirect('app/uploads');
    }

    public function ictrain(Request $request)
    {
        ini_set("memory_limit", "-1");
        ini_set("max_execution_time", 1200000);
        if ($request->hasFile("file")) {
            $logofile = $request->file("file");
            $fileName = $logofile->getClientOriginalName();

            if ($fileName != "ictran.dbf") {
                \Session::flash(
                    "error",
                    "Please choose only ictran.dbf file !!!"
                );
                return redirect("app/uploads");
            }

            $destinationPath = public_path("ictrain/"); // upload path
            $outputImage =
                "arcust_" .
                uniqid() .
                "." .
                $logofile->getClientOriginalExtension();
            $logofile->move($destinationPath, $outputImage);

            $path = public_path() . "/ictrain/" . $outputImage;

            $table = new Table($path);

            $actual_data = [];
            $keyVal = [];

            $actual_data = [];
            $keyVal = [];

            $i = 0;
            while ($record = $table->nextRecord()) {
                $row = [];

                foreach ($table->getColumns() as $i => $c) {
                    if ($c->getType() != "G") {
                        if ($c->getName() == "CREATED_ON") {
                            $row[$c->getName()] = $record->getDateTime($c);
                        } else {
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
                $checkCustNo = Ictran::where("Contract_Number", $value["refno"])
                    ->where("Support_Type", $value["itemno"])
                    ->first();

                if ($checkCustNo) {
                    // echo 'update'; echo '<br>';
                } else {
                    // echo $value['itemno'];echo '<br>';

                    $action = 0;
                    if (
                        $request->start != "" &&
                        $request->to != "" &&
                        $request->start <= $value["itemno"] &&
                        $request->to >= $value["itemno"]
                    ) {
                        echo $value["name"];
                        echo "----------------";
                        echo "<br>";

                        $values = new Ictran();
                        if ($value["custno"] != "") {
                            $values->CUSTNO = $value["custno"];
                        }

                        if ($value["name"] != "") {
                            $values->Organization_Name = $value["name"];
                        }

                        if ($value["desp"] != "") {
                            $values->Subject = $value["desp"];
                        }

                        $new = Product::where("new", $value["itemno"])->first();
                        $reNew = Product::where(
                            "renew",
                            $value["itemno"]
                        )->first();

                        /********************************************************/
                        if ($new) {
                            //echo 1;
                            if ($value["date"] != "") {
                                $values->Start_Date = date(
                                    "Y-m-d",
                                    strtotime($value["date"])
                                );
                            }
                            if ($value["date"] != "") {
                                $values->invoice_date = date(
                                    "Y-m-d",
                                    strtotime($value["date"])
                                );
                            }
                            if ($value["date"] != "") {
                                $values->Due_date = date(
                                    "Y-m-d",
                                    strtotime(
                                        "+ 1 year",
                                        strtotime($value["date"])
                                    )
                                );
                            }
                        }

                        if ($reNew) {
                            $date1 = CustomerInfo::where(
                                "customer_id",
                                $value["custno"]
                            )
                                ->orderBy("exp_date")
                                ->where("exp_date_checkbox", 1)
                                ->get()
                                ->pluck("exp_date");
                            //echo '<pre>';print_r(count($date1));die;
                            if (count($date1) > 0) {
                                $closetDate = $this->find_closest(
                                    $date1,
                                    date("Y-m-d")
                                );
                            } else {
                                $closetDate = "";
                            }

                            $date = CustomerInfo::where(
                                "customer_id",
                                $value["custno"]
                            )
                                ->orderBy("exp_date")
                                ->where("exp_date_checkbox", 1)
                                ->whereDate("exp_date", $closetDate)
                                ->get();
                            //echo '<pre>';print_r($date);die;
                            //echo '>>'.$value['custno'];echo '<br>';
                            $Ids = [];
                            foreach ($date as $key => $value1) {
                                /// echo '<pre>';print_r($value);
                                $Ids[] = $value1->setting_id;
                            }

                            //dd($Ids);
                            //die;
                            if ($value["date"] != "") {
                                $values->invoice_date = date(
                                    "Y-m-d",
                                    strtotime($value["date"])
                                );
                            }
                            // echo '<pre>';print_r($date[0]->exp_date);die;
                            if (count($date1) > 0) {
                                $values->product = implode(",", @$Ids);
                            }

                            if ($value["date"] != "") {
                                $values->Start_Date = date(
                                    "Y-m-d",
                                    strtotime(
                                        "+ 1 day",
                                        strtotime(@$date[0]->exp_date)
                                    )
                                );
                            }

                            if ($value["date"] != "") {
                                $values->Due_date = date(
                                    "Y-m-d",
                                    strtotime(
                                        "+ 1 year",
                                        strtotime(@$date[0]->exp_date)
                                    )
                                );
                            }
                        }

                        if ($value["refno"] != "") {
                            $values->Contract_Number = $value["refno"];
                        }
                        if ($value["itemno"] != "") {
                            $values->Support_Type = $value["itemno"];
                        }
                        if ($value["amt"] != "") {
                            $values->Price_RM = $value["amt"];
                        }

                        if ($value["refno"] != "") {
                            $actTime = $value["created_on"]->format(
                                \DateTime::ISO8601
                            );
                            $values->Created_Time = date(
                                "Y-m-d",
                                strtotime($actTime)
                            );
                        }
                        $values->save();

                        $action = 1;
                    }

                    //echo $action;die;
                    if ($request->start == "" && $request->to == "") {
                        echo $value["name"];
                        echo "----------------";
                        echo "<br>";

                        $values = new Ictran();
                        if ($value["custno"] != "") {
                            $values->CUSTNO = $value["custno"];
                        }

                        if ($value["name"] != "") {
                            $values->Organization_Name = $value["name"];
                        }

                        if ($value["desp"] != "") {
                            $values->Subject = $value["desp"];
                        }

                        $new = Product::where("new", $value["itemno"])->first();
                        $reNew = Product::where(
                            "renew",
                            $value["itemno"]
                        )->first();
                        //echo '<pre>';print_r($product);
                        //echo $value['itemno']; echo '<br>';

                        /********************************************************/
                        if ($new) {
                            // echo 1;
                            if ($value["date"] != "") {
                                $values->Start_Date = date(
                                    "Y-m-d",
                                    strtotime($value["date"])
                                );
                            }
                            if ($value["date"] != "") {
                                $values->invoice_date = date(
                                    "Y-m-d",
                                    strtotime($value["date"])
                                );
                            }
                            if ($value["date"] != "") {
                                $values->Due_date = date(
                                    "Y-m-d",
                                    strtotime(
                                        "+ 1 year",
                                        strtotime($value["date"])
                                    )
                                );
                                // $values->search_due_date = date('Y-m-d', strtotime('+ 1 year', strtotime($value['date'])));
                            }
                        }

                        if ($reNew) {
                            // echo 's';
                            $date1 = CustomerInfo::where(
                                "customer_id",
                                $value["custno"]
                            )
                                ->orderBy("exp_date")
                                ->where("exp_date_checkbox", 1)
                                ->get()
                                ->pluck("exp_date");
                            if (count($date1) > 0) {
                                $closetDate = $this->find_closest(
                                    $date1,
                                    date("Y-m-d")
                                );
                            } else {
                                $closetDate = "";
                            }

                            $date = CustomerInfo::where(
                                "customer_id",
                                $value["custno"]
                            )
                                ->orderBy("exp_date")
                                ->where("exp_date_checkbox", 1)
                                ->whereDate("exp_date", $closetDate)
                                ->get();
                            //echo '>>'.$value['custno'];echo '<br>';
                            $Ids = [];
                            foreach ($date as $key => $value1) {
                                /// echo '<pre>';print_r($value);
                                $Ids[] = $value1->setting_id;
                            }
                            //die;
                            if ($value["date"] != "") {
                                $values->invoice_date = date(
                                    "Y-m-d",
                                    strtotime($value["date"])
                                );
                            }
                            // echo '<pre>';print_r($date[0]->exp_date);die;
                            if (count($date1) > 0) {
                                $values->product = implode(",", @$Ids);
                            }

                            if ($value["date"] != "") {
                                $values->Start_Date = date(
                                    "Y-m-d",
                                    strtotime(
                                        "+ 1 day",
                                        strtotime(@$date[0]->exp_date)
                                    )
                                );
                            }

                            if ($value["date"] != "") {
                                $values->Due_date = date(
                                    "Y-m-d",
                                    strtotime(
                                        "+ 1 year",
                                        strtotime(@$date[0]->exp_date)
                                    )
                                );
                                /*$values->search_due_date = date('Y-m-d', strtotime('+ 1 year', strtotime(@$date[0])));*/
                            }
                        }

                        // die;

                        /********************************************************/

                        if ($value["refno"] != "") {
                            $values->Contract_Number = $value["refno"];
                        }
                        if ($value["itemno"] != "") {
                            $values->Support_Type = $value["itemno"];
                        }
                        if ($value["amt"] != "") {
                            $values->Price_RM = $value["amt"];
                        }

                        if ($value["refno"] != "") {
                            $actTime = $value["created_on"]->format(
                                \DateTime::ISO8601
                            );
                            $values->Created_Time = date(
                                "Y-m-d",
                                strtotime($actTime)
                            );
                        }
                        $values->save();
                    }
                }
            }
        }

        //die;
        \Session::flash("message", "You have successfully uploaded !!!");
        //return redirect('app/uploads');
    }

    public function search(Request $request)
    {
        $ictran = Ictran::orderBy("CUSTNO", "asc")
            ->orWhere("CUSTNO", "like", "%" . $request->seacrh . "%")
            ->orWhere("Organization_Name", "like", "%" . $request->seacrh . "%")
            ->orWhere("Support_Type", "like", "%" . $request->seacrh . "%")

            ->Paginate(10);
        return view("admin.ictran.list")->with("ictran", $ictran);
    }

    public function ictranDelete($id)
    {
        $delete = Ictran::where("id", $id)->delete();
        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ]);
        return redirect("app/service-contract")->withErrors([
            "Success",
            "You have successfully deleted !!!",
        ]);
    }
    public function renew($id)
    {
        $renew = Ictran::where("id", $id)->first();
        $renew->renew_status = 1;
        $renew->save();
        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully renew !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully renew !!!",
            ]);

        // return redirect('app/service-contract')->withErrors(['Success', 'You have successfully renew !!!']);
    }
    public function agree($id)
    {
        $renew = Ictran::where("id", $id)->first();
        $renew->renew_status = 2;
        $renew->save();

        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully agree !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully agree !!!",
            ]);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully agree !!!']);
    }
    public function cancelled($id)
    {
        $renew = Ictran::where("id", $id)->first();
        $renew->renew_status = 3;
        $renew->save();
        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully cancelled !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully cancelled !!!",
            ]);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully cancelled !!!']);
    }
    public function ictranEdit($id)
    {
        $this->data["edit"] = Ictran::where("id", $id)->first();
        $this->data["products"] = Product::get();
        //dd(explode(',',$this->data['edit']['product']));
        /*if($this->data['edit']['product']==""){
        $this->data['CustomerInfo']=CustomerInfo::where('customer_id',$this->data['edit']['CUSTNO'])->where('exp_date_checkbox',1)->get()->pluck('setting_id')->toArray();
        }else{
            $this->data['CustomerInfo']=Product::whereIn('id',explode(',',$this->data['edit']['product']))->get()->pluck('id')->toArray();
        }*/

        $this->data["CustomerInfo"] = Product::whereIn(
            "id",
            explode(",", $this->data["edit"]["product"])
        )
            ->get()
            ->pluck("id")
            ->toArray();
        //dd($this->data['date']);
        return view("admin.ictran.edit", $this->data);
    }
    public function ictranUpdate($id, Request $request)
    {
        $update = Ictran::where("id", $id)->first();
        $update->CUSTNO = $request->CUSTNO;
        $update->Organization_Name = $request->Organization_Name;
        $update->Start_Date = date("Y-m-d", strtotime($request->Start_Date));
        $update->Due_date = date("Y-m-d", strtotime($request->Due_date));
        /*$update->search_due_date=date('Y-m-d',strtotime($request->Due_date));*/
        $update->invoice_date = date(
            "Y-m-d",
            strtotime($request->invoice_date)
        );
        if (!empty($request->product)) {
            $update->product = implode(",", $request->product);
        } else {
            $update->product = "";
        }
        $update->Support_Type = $request->Support_Type;
        $update->Price_RM = $request->Price_RM;
        $update->save();

        // if(!empty($request->product)){
        //     foreach ($request->product as $key => $value) {

        //         $update->exp_date_checkbox=1;
        //         $update->save();
        //     }
        // }
        // $url = \Session::get('backUrl');
        // dd($url);
        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully updated !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully updated !!!",
            ]);
        //return redirect('app/service-contract')->withErrors(['Success', 'You have successfully updated !!!']);
    }

    public function copyCompanyname()
    {
        $transaction = Transaction::get();
        foreach ($transaction as $key => $value) {
            $transactionUpdate = Transaction::where("id", $value->id)->first();
            $custName = Cust::where(
                "Organization_Number",
                @$value->customer_id
            )->first();
            if ($custName) {
                $transactionUpdate->Organization_Name = @$custName->Organization_Name;
                $transactionUpdate->save();
            }
        }
        return redirect("/dashboard");
    }
    public function convertDate()
    {
        $keyword = ":";
        $Ictran = Ictran::where(
            "invoice_date",
            "like",
            "%" . $keyword . "%"
        )->get();

        foreach ($Ictran as $key => $value) {
            //echo date('d-m-Y', strtotime($value->invoice_date));echo '<pre>';
            $actDtae = explode("+", $value->invoice_date)[0];

            if ($value->Price_RM != "") {
                $tert = number_format(
                    str_replace(",", "", $value->Price_RM),
                    2
                );
                $convert = str_replace(".00", "", @$tert);
            }
            $update = Ictran::where("id", $value->id)->first();
            $update->invoice_date = date("Y-m-d", strtotime($actDtae));
            //$update->Start_Date= date('d-m-Y', strtotime('- 1 year', strtotime($value->invoice_date)));
            $update->Start_Date = date("Y-m-d", strtotime($actDtae));
            $update->Due_date = date(
                "Y-m-d",
                strtotime("+ 1 year", strtotime($actDtae))
            );
            /*$update->search_due_date=date('Y-m-d', strtotime('+ 1 year', strtotime($actDtae)));*/

            $update->Price_RM = @$convert;
            $update->save();
            //echo '<pre>';print_r($value);
            # code...
        }

        $keyword = ",";
        $Ictran = Ictran::where(
            "invoice_date",
            "like",
            "%" . $keyword . "%"
        )->get();

        foreach ($Ictran as $key => $value) {
            $invDate = date(
                "Y-m-d",
                strtotime(str_replace(",", "", $value->invoice_date))
            );
            $dueDate = date(
                "Y-m-d",
                strtotime(str_replace(",", "", $value->Due_date))
            );
            //echo $value->invoice_date;
            if ($value->Price_RM != "") {
                $tert = number_format(
                    str_replace(",", "", $value->Price_RM),
                    2
                );
                $convert = str_replace(".00", "", @$tert);
            }
            $update = Ictran::where("id", $value->id)->first();
            $update->invoice_date = $invDate;
            $update->Start_Date = date(
                "Y-m-d",
                strtotime("- 365 day", strtotime($dueDate))
            );
            //$update->Start_Date=date('d-m-Y', strtotime($actDtae));
            $update->Due_date = date("Y-m-d", strtotime($dueDate));
            /*$update->search_due_date=date('Y-m-d', strtotime($dueDate));*/

            $update->Price_RM = @$convert;
            $update->save();
            //echo '<pre>';print_r($value);
            # code...
        }

        $keyword = ",";
        $Price_RM = Ictran::where(
            "Price_RM",
            "like",
            "%" . $keyword . "%"
        )->get();
        foreach ($Price_RM as $key => $value1) {
            $update = Ictran::where("id", $value1->id)->first();
            $update->Price_RM = str_replace(",", "", $value1->Price_RM);
            $update->save();
        }

        // For Ticket
        $tickets = Ticket::where("created", "!=", "")
            ->where("modified", "!=", "")
            ->where("conver_status", 0)
            ->get();
        foreach ($tickets as $key => $value) {
            $update = Ticket::where("id", $value->id)->first();
            if ($value->created != "") {
                $update->created = date("Y-m-d H:i:s", $value->created);
            }
            if ($value->modified != "") {
                $update->modified = date("Y-m-d H:i:s", $value->modified);
            }
            if ($value->added_dt != "") {
                $update->added_dt = date("Y-m-d H:i:s", $value->added_dt);
            }
            $update->conver_status = 1;
            $update->save();
        }

        // For Ticket
        $assignTicket = AssignTicket::where("assign_on", "!=", "")
            ->where("conver_status", 0)
            ->get();
        foreach ($assignTicket as $key => $value2) {
            $update2 = AssignTicket::where("id", $value2->id)->first();

            if ($value2->assign_on != "") {
                $update2->assign_on = date("Y-m-d H:i:s", $value2->assign_on);
            }
            $update2->conver_status = 1;
            $update2->save();
        }

        return redirect("/dashboard");
    }

    public function serviceContract(Request $request)
    {
        \Session::put("backUrl", url()->current());

        /*$update = Ictran::where('id',1)->first();
        $update->search_due_date ='2020-12-12';
        $update->save();*/

        $prod = ProductCat::where("type", 1)
            ->get()
            ->toArray();

        //echo '<pre>';print_r($prod);die;
        $arrayChart = [];
        foreach ($prod as $key => $value) {
            $statusArray = [0, 2];
            $prod = Product::where("cat", $value["id"])
                ->get()
                ->toArray();

            $cC = [];
            foreach ($prod as $pr) {
                $cC[] = $pr["new"];
                $cC[] = $pr["renew"];
            }
            //echo '<pre>';print_r(array_unique($cC));

            //echo '<pre>';print_r(array_unique($prod));
            $sum = Ictran::whereDate("Due_date", ">=", date("Y-m-d"))
                ->whereIn("renew_status", $statusArray)
                ->whereIn("Support_Type", array_unique($cC))
                ->sum("Price_RM");
            //echo '<pre>';print_r($prod);
            $arrayChart[]["name"] = $value["cat_name"];
            $arrayChart[$key]["sum"] = $sum;
        }
        //echo '<pre>';print_r($arrayChart);die;
        $this->data["arrayChart"] = $arrayChart;

        // $cat=[];
        // $sum=0;
        //  foreach ($arrayChart as $key => $value) {

        //    # code...
        //   $cat[]['name']=$value['name'].'--'.$value['sum'];
        //   $sum+=$value['sum'];

        //  }
        //  echo '<pre>';print_r($cat);
        //  echo $sum;
        // die;

        $this->data["invoice"] = Ictran::get();
        $this->data["prodcucts"] = Product::get();
        $this->data["customers"] = Ictran::groupby("Organization_Name")->get();
        $this->data["Support_Type"] = Ictran::groupby("Support_Type")->get();
        $invDates = Ictran::orderBy("invoice_date")
            ->get()
            ->pluck("invoice_date")
            ->toArray();
        //dd(array_unique($invDate));
        $dateInv = [];
        foreach ($invDates as $key => $invDate) {
            $dateInv[] = date("Y", strtotime($invDate));
        }
        //dd(array_unique($dateInv));
        $this->data["invoice_date2"] = array_unique($dateInv);
        //die;

        // echo count($this->data['invoice_date']);die;
        // valid contract
        $statusArray = [0, 2];
        $allrecord = Ictran::whereDate("Due_date", ">=", date("Y-m-d"))
            ->whereIn("renew_status", $statusArray)
            ->get();

        $totalCount = 0;
        $totalValue = 0;
        foreach ($allrecord as $key => $value) {
            $totalValue += (int) str_replace(",", "", $value->Price_RM);
            $totalCount++;
        }

        // Renew status invoice_date
        $renewAll = Ictran::whereMonth("invoice_date", date("m"))
            ->whereYear("invoice_date", date("Y"))
            ->get();
        $renewCount = 0;
        $renewValue = 0;
        foreach ($renewAll as $key => $value1) {
            if ($value1->Price_RM != "") {
                $renewValue += str_replace(",", "", $value1->Price_RM);
            }
            $renewCount++;
        }
        //dd($renewValue);
        // Get %
        $lastMonth = date("m", strtotime(date("Y-m") . " -1 year"));
        $lastYear = date("Y", strtotime(date("Y-m") . " -1 year"));
        $renewAllPer = Ictran::whereMonth("invoice_date", $lastMonth)
            ->whereYear("invoice_date", $lastYear)
            ->get();
        $renewCountPer = 0;
        $renewValueLastMonth = 0;
        foreach ($renewAllPer as $key => $value2) {
            $renewValueLastMonth += str_replace(",", "", $value2->Price_RM);
            $renewCountPer++;
        }
        if ($request->month) {
            $year = $request->month;
            $Lastyear = $request->month - 1;
            $Last3year = $request->month - 2;
        } else {
            $year = date("Y");
            $Lastyear = date("Y", strtotime("-1 year"));
            $Last3year = date("Y", strtotime("-2 year"));
        }
        //echo $Lastyear=date("Y",strtotime("-1 year"));echo '<br>';
        // echo $year; echo '<br>';
        // echo $Lastyear; echo '<br>';
        //die;
        if ($request->typeww) {
            $type11 = $request->typeww;
        } else {
            $type11 = "";
        }

        $lastYear = [];
        $lst3Year = [];
        $currentYear = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthSum = Ictran::whereYear("invoice_date", $year)->whereMonth(
                "invoice_date",
                $i
            );
            if ($type11) {
                $monthSum = $monthSum->where("Support_Type", $type11);
            }
            $monthSum = $monthSum->sum("Price_RM");
            $currentYear[] = $monthSum;

            // Last Year
            $lastMonthSum = Ictran::whereYear(
                "invoice_date",
                $Lastyear
            )->whereMonth("invoice_date", $i);
            $lst3Year[] = Ictran::whereYear("invoice_date", $Last3year)
                ->whereMonth("invoice_date", $i)
                ->sum("Price_RM");
            if ($type11) {
                $lastMonthSum = $lastMonthSum->where("Support_Type", $type11);
            }
            $lastMonthSum = $lastMonthSum->sum("Price_RM");
            $lastYear[] = $lastMonthSum;
        }

        $totalCount1 = $renewCount - $renewCountPer;
        $totalvaluePer = $renewValue - $renewValueLastMonth;
        $this->data["totalPercentage"] =
            $renewCountPer == 0 ? 0 : ($totalCount1 * 100) / $renewCountPer;
        $this->data["totalvaluePer"] =
            $renewValueLastMonth == 0
                ? 0
                : ($totalvaluePer * 100) / $renewValueLastMonth;

        $this->data["renewCount"] = $renewCount;
        $this->data["renewValue"] = $renewValue;

        $this->data["totalCount"] = $totalCount;
        $this->data["totalValue"] = $totalValue;
        $this->data["currentYear"] = $currentYear;
        $this->data["lastYear"] = $lastYear;
        $this->data["lst3Year"] = $lst3Year;
        //echo '<pre>';print_r($this->data);die;

        return view("admin.ictran.list", $this->data);
    }

    function date_compare($a, $b)
    {
        $t1 = strtotime($a["Due_date"]);
        $t2 = strtotime($b["Due_date"]);
        return $t1 - $t2;
    }

    public function serviceContract1(Request $request)
    {
        $perm = Helper::checkPermission();

        $due = 0;
        if (in_array("contract_due_date", $perm)) {
            $due = 1;
        }
        $value = 0;
        if (in_array("contract_hide_value", $perm)) {
            $value = 1;
        }
        $ticket_multiple = 0;
        if (in_array("ticket_multiple", $perm)) {
            $ticket_multiple = 1;
        }
        $contract_delete = 0;
        if (in_array("contract_delete", $perm)) {
            $contract_delete = 1;
        }
        $contract_edit = 0;
        if (in_array("contract_edit", $perm)) {
            $contract_edit = 1;
        }
        $ticket_red_renew = 0;
        if (in_array("ticket_red_renew", $perm)) {
            $ticket_red_renew = 1;
        }

        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value

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

        $records = Ictran::with("getCountInvoice")->where(function (
            $query
        ) use ($searchValue) {
            $query
                ->where(
                    "ictran.Organization_Name",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere(
                    "ictran.Contract_Number",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere(
                    "ictran.Support_Type",
                    "like",
                    "%" . $searchValue . "%"
                )
                ->orwhere("ictran.Price_RM", "like", "%" . $searchValue . "%");
        });

        if ($_GET["startDate"] != "" && $_GET["endDate"]) {
            $startDate = date("Y-m-d", strtotime($_GET["startDate"]));
            $endDate = date("Y-m-d", strtotime($_GET["endDate"]));
            $records = $records->whereBetween("ictran.Due_date", [
                $startDate,
                $endDate,
            ]);
        }
        //user for status not invoice name
        if ($_GET["invoice"] != "") {
            $records = $records->where("ictran.renew_status", $_GET["invoice"]);
        }
        if ($_GET["customer"] != "") {
            $records = $records->where(
                "ictran.product",
                "like",
                "%" . $_GET["customer"] . "%"
            );
        }
        if ($_GET["type"] != "") {
            $records = $records->where("ictran.Support_Type", $_GET["type"]);
        }

        if (@$_GET["searchUser"] != "") {
            $records = $records->where("ictran.Organization_Name", "like", "%" . $_GET["searchUser"] . "%");
        }

        if ($_GET["value"] != "") {
            if ($_GET["value"] == "999") {
                $records
                    ->where("ictran.Price_RM", ">=", 1)
                    ->where("ictran.Price_RM", "<=", (int) $_GET["value"]);
            } elseif ($_GET["value"] == "1000-1999") {
                $records
                    ->where("ictran.Price_RM", ">=", 1000)
                    ->where("ictran.Price_RM", "<=", 1999);
            } elseif ($_GET["value"] == "2000-2999") {
                $records
                    ->where("ictran.Price_RM", ">=", 2000)
                    ->where("ictran.Price_RM", "<=", 2999);
            } elseif ($_GET["value"] == "3000-3999") {
                $records
                    ->where("ictran.Price_RM", ">=", 3000)
                    ->where("ictran.Price_RM", "<=", 3999);
            } elseif ($_GET["value"] == "4000") {
                $records->where("ictran.Price_RM", ">", 4000);
                // ->where('ictran.Price_RM','<=', (int)$_GET['value']);
            }
        }

        $records = $records->select("ictran.*");

        $recordr = $records->count();
        $useCount = $records->get();
        $records = $records->skip($start)->take($rowperpage);
        if ($columnName == "Price_RM") {
            $records = $records->orderBy(
                \DB::raw("CAST(Price_RM AS SIGNED INTEGER)"),
                $columnSortOrder
            );
        } else {
            $records = $records->orderBy($columnName, $columnSortOrder);
        }
        $records = $records->get()->toArray();

        $totalRecordswithFilter = $recordr;
        $totalRecords = $totalRecordswithFilter;

        // usort($records, array($this,'date_compare'));

        //echo '<pre>';print_r($records);

        // die;
        $data_arr = [];
        $renewSum = 0;
        $agree = 0;
        $cancell = 0;
        $expire = 0;

        foreach ($useCount as $key => $useCount1) {
            if ($useCount1["renew_status"] == 1) {
                $renewSum++;
            }
            if ($useCount1["renew_status"] == 2) {
                $agree++;
            }
            if ($useCount1["renew_status"] == 3) {
                $cancell++;
            }

            $dueDate = strtotime($useCount1["Due_date"]);
            $toDayDate = strtotime(date("d-m-Y"));
            if ($toDayDate > $dueDate) {
                $expire++;
            }
            # code...
        }
        foreach ($records as $record) {
            //error_reporting(0);
            //echo '<pre>';print_r($record['get_count_invoice']);
            $ticketCount11 = count($record["get_count_invoice"]);
            $ticketCount = Ticket::where("ictran_id", $record["id"])
                ->where("status", 0)
                ->count();
            // For Delete Btn
            $removeDeleteBtn = 0;
            if ($ticketCount > 0) {
                $removeDeleteBtn = 1;
            }

            // For Tiecket Btn
            $removeTiecket = 0;
            if ($ticketCount > 0) {
                $removeTiecket = 1;
            }

            // $username = $record->username;
            // $name = $record->name;
            // $email = $record->email;

            /*if($record['product']==""){
        $product=CustomerInfo::where('customer_id',$record['CUSTNO'])->where('exp_date_checkbox',1)->get()->pluck('info_type')->toArray();
        }else{
        $product=Product::whereIn('id',explode(',',$record['product']))->get()->pluck('title')->toArray();
        }*/

            $product = Product::whereIn("id", explode(",", $record["product"]))
                ->get()
                ->pluck("title")
                ->toArray();

            $dueDate = strtotime($record["Due_date"]);
            $toDayDate = strtotime(date("d-m-Y"));

            $dueDateColor = 0;
            if ($toDayDate > $dueDate) {
                $dueDateColor = 1;
                //$expire++;
            }

            $deleteRedTicket = 0;
            if ($dueDateColor == 1 && $ticket_red_renew == 0) {
                $deleteRedTicket = 1;
            }

            $data_arr[] = [
                "id" => $record["id"],
                "Contract_Number" => $record["Contract_Number"],
                "Organization_Name" => $record["Organization_Name"],
                "Support_Type" => $record["Support_Type"],
                "product" => implode(",", $product),
                "Price_RM" => $value == 0 ? "None" : $record["Price_RM"],
                "button" => "efsd",
                "removeDeleteBtn" => $removeDeleteBtn,
                "contract_delete" => $contract_delete,
                "removeTiecket" => $removeTiecket,
                "contract_edit" => $contract_edit,
                "dueDateColor" => $dueDateColor,
                "ticket_red_renew" => $deleteRedTicket,
                "ticket_multiple" => $ticket_multiple,
                "renew_status" => $record["renew_status"],
                "count" => $record["count"],
                "due_date" =>
                    $due == 0
                        ? date("Y", strtotime($record["Due_date"]))
                        : date("d-m-Y", strtotime($record["Due_date"])),
            ]; /*$data_arr[] = array(
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

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "renewSum" => $renewSum,
            "cancell" => $cancell,
            "agree" => $agree,
            "expire" => $expire,

            "aaData" => $data_arr,
        ];

        echo json_encode($response);
        exit();
    }

    // For assign ticket
    public function ictranTicket($id)
    {
        $this->data["adminUser"] = User::with("getUserCount")->get();
        //echo '<pre>';print_r($this->data['adminUser']);die;
        $this->data["id"] = $id;
        $getInfo1 = Ictran::where("id", $id)->first();
        $this->data["custInfo"] = Cust::where(
            "Organization_Number",
            $getInfo1->CUSTNO
        )->first();

        // Get all user Info
        $this->data["customerInfo"] = CustInfo::where('cust_id',$getInfo1->CUSTNO)->where('status',1)->get();

        return view("admin.ictran.ticket", $this->data);
    }
    public function ticketStore($id, Request $request)
    {
        $getInfo1 = Ictran::where("id", $id)->first();
        $ticket = new Ticket();
        $ticket->ictran_id = $id;
        $ticket->invoice_no = $getInfo1->Contract_Number;
        $ticket->status = 0;

        if ($ticket->save()) {
            $assignTicket = new AssignTicket();
            $assignTicket->ticket_id = $ticket->id;
            $assignTicket->user_id = $request->user_id;
            $assignTicket->description = $request->description;
            $assignTicket->status = 0;
            $assignTicket->phone = $request->phone;
            $assignTicket->otherCustomerId = $request->otherCustomerId;
            $assignTicket->contact_person = $request->contact_person;
            $assignTicket->assigned_by = \Auth::user()->id;
            $assignTicket->updated_by = \Auth::user()->id;
            $assignTicket->save();
        } else {
            echo "Please Try again";
            die();
        }

        // For notification
        $record = \DB::table("ticket")
            ->join("ticket_assign", "ticket_assign.ticket_id", "=", "ticket.id")
            ->join("ictran", "ictran.id", "=", "ticket.ictran_id")
            ->join("users", "users.id", "=", "ticket_assign.user_id")

            ->select(
                "ticket.*",
                "ticket.id as tid",
                "ticket_assign.*",
                "ictran.Organization_Name as oname",
                "users.name as user",
                "ticket.created_at as cdate",
                "ticket.status as tstatus"
            )
            ->where("ticket.id", $ticket->id)
            ->first();

        $ticketId = $record->id;
        $oname = $record->oname;
        $phone = $record->phone;
        $contact_person = $record->contact_person;
        $cdate = $record->cdate;

        $not = new Notification();
        $not->user_id = $request->user_id;
        $not->ticket_id = $ticket->id;
        $not->Organization_Name = $oname;
        $not->Organization_Name = $oname;
        $not->contact_person = $contact_person;
        $not->phone = $phone;
        $not->contact_person = $contact_person;
        $not->cdate = $cdate;
        $not->status = 0;
        $not->save();

        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully assign ticket !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully assign ticket !!!",
            ]);

        // return redirect('app/service-contract')->withErrors(['Success', 'You have successfully assign ticket !!!']);
    }

    // Get Count
    public function getCount()
    {
        // $records = Ictran::with('getCountInvoice')->get()->toArray();
        // foreach ($records as $key => $value1) {

        //   echo '<pre>';print_r($value1['get_count_invoice']);die;
        //   // $value->count=count($value['get_count_invoice']);
        //   // $value->save();
        // }

        // $notCount= Notification::where('user_id',\Auth::Id())->where('status',0)->count();
        $Notification = Notification::join(
            "ticket",
            "ticket.id",
            "=",
            "notification.ticket_id"
        );
        // if(\Auth::user()->user_type != 1){
        $Notification = $Notification->where(
            "notification.user_id",
            \Auth::Id()
        );
        //}

        $notCount = $Notification
            ->where("ticket.status", 0)
            ->where("notification.status", 0)
            ->select(
                "notification.*",
                "ticket.status as tstatus",
                "ticket.id as tid"
            )
            ->orderBy("ticket.id", "desc")
            ->count();
        echo $notCount;
    }

    public function seen(Request $request)
    {
        $all = $request->all();
        $uu = Notification::where("id", $all["ticketId"])->first();
        //echo '<pre>';print_r($request);
        $uu->status = 1;
        if ($uu->save()) {
            echo 1;
        }
    }
    public function getNotification()
    {
        $Notification = Notification::join(
            "ticket",
            "ticket.id",
            "=",
            "notification.ticket_id"
        );
        if (\Auth::user()->user_type != 1) {
            $Notification = $Notification->where(
                "notification.user_id",
                \Auth::Id()
            );
        }

        $Notification = $Notification
            ->where("ticket.status", 0)
            ->select(
                "notification.*",
                "ticket.status as tstatus",
                "ticket.id as tid"
            )
            ->orderBy("ticket.id", "desc")
            ->get();
        // echo '<pre>';print_r(count($Notification));die;
        if (count($Notification) > 0) {
            foreach ($Notification as $key => $value) {

                $assignTicket = AssignTicket::where(
                    "ticket_id",
                    $value->tid
                )->first();
                //echo '<pre>';print_r($assignTicket->user_id);

                $user = User::where("id", $assignTicket->user_id)->first();

                $color = "";
                $bg = "";
                $tick = "";
                if ($value["status"] == 0) {
                    $color = "#97a0aa;";
                    $bg = "#bf5555";
                } else {
                    $bg = "#BAE8BE";
                    $tick = '<span class="rrr">&#10003;</span>';
                }
                ?>
      <style type="text/css">
        .rrr {
      content: "\2713";

      font-size: 15px;
      color: green;
      }
      </style>

        <li class="scrollable-container media-list" style="background-color:<?= @$bg ?> ">
          <a class="<?php if (
              \Auth::user()->user_type != 1 ||
              \Auth::Id() == $value->user_id
          ) {
              echo "seen";
          } ?> d-flex justify-content-between" href="javascript:;" data="<?= $value->id ?>">
              <div class="media d-flex align-items-center">
                <div class="media-left pr-0">
                  <div class="avatar mr-1 m-0"><img src="<?php echo asset(
                      "profile"
                  ) .
                      "/" .
                      $user->profile_pic; ?>" alt="avatar" height="39" width="39"></div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"><span class="text-bold-500" style="color: <?= @$color ?>"><?= $value->Organization_Name ?> </span> 
                    <?= @$tick ?>
                  </h6>
                  <span><small class="notification-text"><?= $value->contact_person ?></small></span>,
                  <span><small class="notification-text"><?= $value->phone ?></small></span>,
                  <span><small class="notification-text"><?= date(
                      "d-m-Y",
                      strtotime($value->cdate)
                  ) ?></small></span>

                </div>
              </div></a>
             
          </li>



    <?php

                # code...


            }
        } else {
             ?>
  <li class="scrollable-container media-list">
<span style="color:red">No Record Found.</span>
</li>

<?php
        }
    }
    public function ticket(Request $request)
    {
        error_reporting(0);
        \Session::put("backUrl", url()->current());
        $data = Ticket::get()->pluck("ictran_id");
        $userIdArray = AssignTicket::get()->pluck("user_id");

        $allUser = User::whereIn("id", $userIdArray)
            ->get()
            ->toArray();

        /***************************************************************/
        //  For Graph and pi chart
        $dd = 1;
        if ($request->userid == "") {
            $userId = \Auth::user()->id;
            $this->data["uuname"] = \Auth::user()->name;
        } else {
            $dd = 0;
            $userId = $request->userid;
            $this->data["uuname"] = User::where("id", $userId)->first()->name;
        }
        $dd1 = 1;
        if ($request->rate == "") {
            $userId1 = \Auth::user()->id;
            $this->data["uuname"] = \Auth::user()->name;
        } else {
            $dd1 = 0;
            $userId1 = $request->rate;
            $this->data["uuname"] = User::where("id", $userId)->first()->name;
        }

        $data = Ticket::get()->pluck("ictran_id");
        $userIdArray = AssignTicket::get()->pluck("user_id");
        $this->data["users"] = User::whereIn("id", $userIdArray)
            ->get()
            ->toArray();
        $this->data["customers"] = Ictran::whereIn("id", $data)
            ->get()
            ->toArray();

        //echo '<pre>';print_r($this->data['users']);die;
        $arrayChart = [];
        foreach ($this->data["users"] as $key => $value) {
            $ticketCount = \DB::table("ticket")
                //->select('league_name')
                ->join(
                    "ticket_assign",
                    "ticket_assign.ticket_id",
                    "=",
                    "ticket.id"
                )
                ->where("ticket_assign.user_id", $value["id"])
                ->where("ticket.status", 2)
                ->count();

            $arrayChart[]["name"] = $value["name"];
            $arrayChart[$key]["tcount"] = $ticketCount;
        }
        $this->data["arrayChart"] = $arrayChart;

        $this->data["recordOpen"] = $recordOpen;
        $this->data["records"] = $records;
        $this->data["LoginUserData"] = $LoginUserData;
        $this->data["ratings"] = $gtData;
        $this->data["allUser"] = $allUser;

        // New  code
        $openTicket = Ticket::where("status", 0)->count();

        $closedTicket = Ticket::where("status", 2)->count();
        $this->data["closedTicket1"] = Ticket::where("status", 2)
            ->whereDate("close_date", date("Y-m-d"))
            ->count();

        $totalDays = \DB::table("ticket as w")
            ->select([\DB::Raw("DATE(w.created_at) day")])
            ->groupBy("day")
            ->orderBy("w.created_at")
            ->get();
        //echo count($totalDays);die;
        $this->data["tday"] = count($totalDays);

        // 2 h grather
        $twohgreather = Ticket::where(
            "created_at",
            "<",
            Carbon::now()
                ->subMinutes(120)
                ->toDateTimeString()
        )
            ->where("status", 0)
            ->count();

        // 30 minutes greates and 2 hours less
        $greater30MinutesG = Ticket::where(
            "created_at",
            "<",
            Carbon::now()
                ->subMinutes(30)
                ->toDateTimeString()
        )
            ->where(
                "created_at",
                ">",
                Carbon::now()
                    ->subMinutes(120)
                    ->toDateTimeString()
            )
            ->where("status", 0)
            ->count();

        // 30 minutes less
        $less30Minutes = Ticket::where(
            "created_at",
            ">",
            Carbon::now()
                ->subMinutes(30)
                ->toDateTimeString()
        )
            // ->where('created_at', '<',$formatted_date)
            ->where("status", 0)
            ->count();

        /***************************************************************************************************/
        /****************************************************************************************************/
        // show chart data

        // 2 h grather
        /*$twohgreatherChart= Ticket::where('created_at', '<',Carbon::now()->subMinutes(120)->toDateTimeString())
      ->where('status',2)
      ->count();

      // 30 minutes greates and 2 hours less
      $greater30MinutesGChart= Ticket::
      where('created_at', '<',Carbon::now()->subMinutes(30)->toDateTimeString())
      ->where('created_at', '>',Carbon::now()->subMinutes(120)->toDateTimeString())
      ->where('status',2)
      ->count();


      // 30 minutes less
      $less30MinutesChart= Ticket::where('created_at', '>',Carbon::now()->subMinutes(30)->toDateTimeString())
      // ->where('created_at', '<',$formatted_date)
      ->where('status',2)
      ->count();*/

        if ($dd == 1) {
            $less30MinutesChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `created_at`, `close_date`) AS difference FROM `ticket` WHERE `status`=2 HAVING difference < 30"
            );

            $twohgreatherChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `created_at`, `close_date`) AS difference FROM `ticket` WHERE `status`=2 HAVING difference > 120"
            );

            $greater30MinutesGChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `created_at`, `close_date`) AS difference FROM `ticket` WHERE `status`=2 HAVING difference > 30 AND difference < 120"
            );

            $this->data["twohgreatherChart"] = count($twohgreatherChart);
            $this->data["less30MinutesChart"] = count($less30MinutesChart);
            $this->data["greater30MinutesGChart"] = count(
                $greater30MinutesGChart
            );
        } else {
            /*****************************************************************************************************/
            // For current user data
            // SELECT HOUR(SEC_TO_TIME(TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(t.`created`),FROM_UNIXTIME(t.`modified`)))) as `hours` FROM `ticket` t LEFT JOIN ticket_assign ta ON ta.ticket_id=t.id WHERE ta.user_id='".$user_for_filter."' HAVING `hours`<0.5

            $less30MinutesChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `ticket`.`created_at`, `ticket`.`close_date`) AS difference FROM `ticket`   LEFT JOIN ticket_assign  ON `ticket_assign`.`ticket_id`=`ticket`.`id` WHERE `ticket_assign`.`user_id`=" .
                    $userId .
                    " and `ticket`.`status`=2 HAVING difference < 30"
            );

            $twohgreatherChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `ticket`.`created_at`, `ticket`.`close_date`) AS difference FROM `ticket`   LEFT JOIN ticket_assign  ON `ticket_assign`.`ticket_id`=`ticket`.`id` WHERE `ticket_assign`.`user_id`=" .
                    $userId .
                    " and `ticket`.`status`=2 HAVING difference > 120"
            );

            $greater30MinutesGChart = \DB::select(
                "SELECT TIMESTAMPDIFF(MINUTE, `ticket`.`created_at`, `ticket`.`close_date`) AS difference FROM `ticket`   LEFT JOIN ticket_assign  ON `ticket_assign`.`ticket_id`=`ticket`.`id` WHERE `ticket_assign`.`user_id`=" .
                    $userId .
                    " and `ticket`.`status`=2 HAVING difference > 30 AND difference < 120"
            );

            $this->data["twohgreatherChart"] = count($twohgreatherChart);
            $this->data["less30MinutesChart"] = count($less30MinutesChart);
            $this->data["greater30MinutesGChart"] = count(
                $greater30MinutesGChart
            );
        }
        //echo '<pre>';print_r($this->data);die;
        //echo count($less30MinutesChartLogin);die;
        /*****************************************************************************************************/

        // For rating
        if ($dd1 == 1) {
            $rating = \DB::select(
                "SELECT COUNT(CASE WHEN rate=5 THEN 1 END) as rating_5, COUNT(CASE WHEN rate=4 THEN 1 END) as rating_4, COUNT(CASE WHEN rate=3 THEN 1 END) as rating_3, COUNT(CASE WHEN rate=2 THEN 1 END) as rating_2, COUNT(CASE WHEN rate=1 THEN 1 END) as rating_1 FROM feedback"
            );

            $this->data["ratel5"] = $rating[0]->rating_5;
            $this->data["ratel4"] = $rating[0]->rating_4;
            $this->data["ratel3"] = $rating[0]->rating_3;
            $this->data["ratel2"] = $rating[0]->rating_2;
            $this->data["ratel1"] = $rating[0]->rating_1;
        } else {
            $individual_feeback_sql = \DB::select(
                "SELECT COUNT(CASE WHEN f.rate=5 THEN 1 END) as rating_5, COUNT(CASE WHEN f.rate=4 THEN 1 END) as rating_4, COUNT(CASE WHEN f.rate=3 THEN 1 END) as rating_3, COUNT(CASE WHEN f.rate=2 THEN 1 END) as rating_2, COUNT(CASE WHEN f.rate=1 THEN 1 END) as rating_1 FROM feedback f LEFT JOIN ticket_assign ta ON ta.ticket_id=f.ticket_id WHERE ta.user_id='" .
                    $userId1 .
                    "'"
            );

            $this->data["ratel5"] = $individual_feeback_sql[0]->rating_5;
            $this->data["ratel4"] = $individual_feeback_sql[0]->rating_4;
            $this->data["ratel3"] = $individual_feeback_sql[0]->rating_3;
            $this->data["ratel2"] = $individual_feeback_sql[0]->rating_2;
            $this->data["ratel1"] = $individual_feeback_sql[0]->rating_1;
        }

        // echo '<pre>';print_r($rating);die;

        $this->data["openTicket"] = $openTicket;
        $this->data["closedTicket"] = $closedTicket;
        $this->data["twohgreather"] = $twohgreather;
        $this->data["less30Minutes"] = $less30Minutes;
        $this->data["greater30MinutesG"] = $greater30MinutesG;

        /********************************************************************/

        /****************************Start Bar Chart**********************************/
        $invDates = Ticket::whereNotNull("close_date")
            ->orderBy("close_date")
            ->get()
            ->pluck("close_date")
            ->toArray();
        //dd(array_unique($invDate));
        $dateInv = [];
        foreach ($invDates as $key => $invDate) {
            $dateInv[] = date("Y", strtotime($invDate));
        }
        //dd(array_unique($dateInv));
        // $this->data['Support_Type']= Training::groupby('product')->get();
        $this->data["invoice_date2"] = array_unique($dateInv);
        //echo '<pre>';print_r($this->data['Support_Type']);die;

        if ($request->month) {
            $year = $request->month;
            $Lastyear = $request->month - 1;
            $Last3year = $request->month - 2;
        } else {
            $year = date("Y");
            $Lastyear = date("Y", strtotime("-1 year"));
            $Last3year = date("Y", strtotime("-2 year"));
        }

        if ($request->typeww) {
            $type11 = $request->typeww;
        } else {
            $type11 = "";
        }

        $lastYear = [];
        $lst3Year = [];
        $currentYear = [];
        // echo $year; echo '<br>';
        // echo $Lastyear;die;
        for ($i = 1; $i <= 12; $i++) {
            // $monthSum= Ticket::where('status',2)->whereYear('close_date',$year)->whereMonth('close_date',$i);

            $monthSum = \DB::table("ticket")
                ->join(
                    "ticket_assign",
                    "ticket_assign.ticket_id",
                    "=",
                    "ticket.id"
                )
                ->join("users", "users.id", "=", "ticket_assign.user_id");

            if ($type11) {
                $monthSum = $monthSum->where("ticket_assign.user_id", $type11);
            }

            $monthSum = $monthSum
                ->where("ticket.status", 2)
                ->whereYear("ticket.close_date", $year)
                ->whereMonth("ticket.close_date", $i);

            $monthSum = $monthSum->count();
            $currentYear[] = $monthSum;

            // Last Year
            // $lastMonthSum= Ticket::where('status',2)->whereYear('close_date',$Lastyear)->whereMonth('close_date',$i);

            $lastMonthSum = \DB::table("ticket")
                ->join(
                    "ticket_assign",
                    "ticket_assign.ticket_id",
                    "=",
                    "ticket.id"
                )
                ->join("users", "users.id", "=", "ticket_assign.user_id")
                ->select("ticket.*", "ticket_assign.user_id as uuid");

            $three = \DB::table("ticket")
                ->join(
                    "ticket_assign",
                    "ticket_assign.ticket_id",
                    "=",
                    "ticket.id"
                )
                ->join("users", "users.id", "=", "ticket_assign.user_id")
                ->select("ticket.*", "ticket_assign.user_id as uuid");

            if ($type11) {
                $lastMonthSum = $lastMonthSum->where(
                    "ticket_assign.user_id",
                    $type11
                );
                $three = $three->where("ticket_assign.user_id", $type11);
            }

            //three
            $three = $three
                ->where("ticket.status", 2)
                ->whereYear("ticket.close_date", $Last3year)
                ->whereMonth("ticket.close_date", $i);

            $lst3Year[] = $three->count();
            $lastMonthSum = $lastMonthSum
                ->where("ticket.status", 2)
                ->whereYear("ticket.close_date", $Lastyear)
                ->whereMonth("ticket.close_date", $i);

            // if($type11){
            // $lastMonthSum= $lastMonthSum->where('product',$type11);
            // }
            $lastMonthSum = $lastMonthSum->count();
            $lastYear[] = $lastMonthSum;
        }

        $this->data["currentYear"] = $currentYear;
        $this->data["lastYear"] = $lastYear;
        $this->data["lst3Year"] = $lst3Year;
        // echo '<pre>';print_r($this->data);die;
        /****************************End Bar Chart**********************************/

        $this->data["users"] = User::whereIn("id", $userIdArray)
            ->get()
            ->toArray();
        $this->data["customers"] = Ictran::whereIn("id", $data)
            ->get()
            ->toArray();

        return view("admin.ticket.list", $this->data);
    }

    function time_elapsed_string($datetime, $full = false)
    {
        $start_date = new \DateTime($datetime);
        $since_start = $start_date->diff(new \DateTime(date('Y-m-d H:i:s')));
        return $since_start->days.'d:'.$since_start->h.'h:'.$since_start->i.'m:'.$since_start->s.'s';
    }

    public function ticket2(Request $request)
    {   
      //error_reporting(0);
        $perm = Helper::checkPermission();
        $ticket_red_renew = 0;
        if (in_array("ticket_red_renew", $perm)) {
            $ticket_red_renew = 1;
        }
        // Delete ticket
        $tickect_delete = 0;
        if (in_array("tickect_delete", $perm)) {
            $tickect_delete = 1;
        }
        $tickect_edit = 0;
        if (in_array("tickect_edit", $perm)) {
            $tickect_edit = 1;
        }
        $contract_edit = 0;
        if (in_array("contract_edit", $perm)) {
            $contract_edit = 1;
        }

        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value
        \Session::put("key", $searchValue);

        // for user only filter

        $status = 0;
        if ($_GET["status"] != "") {
            $status = $_GET["status"];
        }

        // Fetch records
        $records = \DB::table("ticket")
            ->join("ticket_assign", "ticket_assign.ticket_id", "=", "ticket.id")
            ->join("ictran", "ictran.id", "=", "ticket.ictran_id")
            ->join("users", "users.id", "=", "ticket_assign.user_id")
            ->join("users as a1", "a1.id", "=", "ticket_assign.assigned_by")
            ->leftjoin("feedback", "feedback.ticket_id", "=", "ticket.id")
            ->leftjoin("cust_info", "cust_info.id", "=", "ticket_assign.otherCustomerId")
            //->leftjoin('ticket_assign', 'ticket_assign.assigned_by', '=', 'users.id')
            //->join('users', 'users.id', '=', 'ticket_assign.assigned_by')

            ->select(
                "ticket.*",
                "ticket.id as tid",
                "ticket_assign.*",
                "ictran.Organization_Name as oname",
                "users.name as user",
                "ticket.created_at as cdate",
                "ticket.status as tstatus",
                "feedback.*",
                "ticket.id as tid",
                "cust_info.phone as coPhone",
                "cust_info.name as coName",
                "a1.name as asignName"
            )
            ->where(function ($query) use ($searchValue) {
                $query
                    ->orwhere(
                        "cust_info.phone",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "ticket.ictran_id",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "cust_info.name",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "ticket.created_at",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere("users.name", "like", "%" . $searchValue . "%")
                    ->orwhere(
                        "ictran.Organization_Name",
                        "like",
                        "%" . $searchValue . "%"
                    );
                //->orWhere('ticket.status', 'like', '%' .$searchValue . '%');
            });

        if ($_GET["startDate"] != "" && $_GET["endDate"]) {
            $startDate = date("Y-m-d", strtotime($_GET["startDate"]));
            $endDate = date("Y-m-d", strtotime($_GET["endDate"]));
            if ($status == 2) {
                $records = $records->whereBetween("ticket.close_date", [
                    $startDate . " 00:00:00",
                    $endDate . " 23:59:59",
                ]);
            } else {
                $records = $records->whereBetween("ticket.created_at", [
                    $startDate . " 00:00:00",
                    $endDate . " 23:59:59",
                ]);
            }
        }

        if (@$_GET["searchUser"] != "") {
            $records = $records->where(
                        "ictran.Organization_Name",
                        "like",
                        "%" . $_GET["searchUser"] . "%"
                    );
        }

        if (@$_GET["customer"] != "") {
            $records = $records->where("ictran.id", $_GET["customer"]);
        }
        if ($_GET["user"] != "") {
            $records = $records->where("users.id", $_GET["user"]);
        }
        if ($_GET["rating"] != "") {
            $records = $records->where("feedback.rate", $_GET["rating"]);
        }

        $records = $records->Where("ticket.status", "=", $status);

        $recordsr = $records->count();
        $records = $records
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();
        //$recordsr= $records->count();

        $totalRecordswithFilter = $recordsr;
        $totalRecords = $totalRecordswithFilter;
        //echo count($records);die;
        $data_arr = [];
        //echo '<pre>';print_r($records);die;
        foreach ($records as $record) {
            $actDate = $this->time_elapsed_string($record->cdate, true);
            //echo '<pre>';print_r(date('H:i:s'));
            $assignBy = User::where("id", $record->assigned_by)->first();
            //$time= $this->getDateAndTime(date('d-m-Y H:i:s',strtotime($record->created_at)));

            $endDate = new \DateTime("now");
            if ($record->tstatus == 2) {
                $endDate = new \DateTime($record->close_date);
            }
            $previousDate = $record->cdate;
            $startdate = new \DateTime($previousDate);
            //$endDate   = new \DateTime('now');
            $interval = $endDate->diff($startdate);
            $time = $interval->format("%dd:%H:h%i:%ss");
            $min = $interval->format("%i");
            $hours = $interval->format("%H");
            //$time= '2:10:0';
            if ($min < "30" && $hours == "00") {
                $timeStatus = 1;
            } elseif ($min > "30" && $hours <= "02") {
                $timeStatus = 2;
            } else {
                $timeStatus = 3;
            }


            $data_arr[] = [
                "tid" => $record->tid,

                "oname" => @$record->oname,
                "user" => $record->user,
                "phone" => @$record->coPhone,
                "contact_person" => @$record->coName,
                "description" => @$record->description,
                "asignName" => @$record->asignName,
                "time" => ($record->tstatus == 2) ? $time : $this->time_elapsed_string($record->cdate),
                "ticketstatus" => $record->tstatus,
                "timeStatus" => $timeStatus,
                "tickect_delete" => $tickect_delete,
                "contract_edit" => $contract_edit,
                "tickect_edit" => $tickect_edit,
                "btn" => "btn",
                "cdate" => date("d-m-Y", strtotime($record->cdate)),
            ]; /*$data_arr[] = array(
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

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        ];

        echo json_encode($response);
        exit();
    }

    public function getDateAndTime($date1)
    {
        // Declare and define two dates
        $date1 = strtotime($date1);
        $date2 = strtotime(date("d-m-Y H:i:s"));

        // Formulate the Difference between two dates
        $diff = abs($date2 - $date1);

        // To get the year divide the resultant date into
        // total seconds in a year (365*60*60*24)
        $years = floor($diff / (365 * 60 * 60 * 24));

        // To get the month, subtract it with years and
        // divide the resultant date into
        // total seconds in a month (30*60*60*24)
        $months = floor(
            ($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24)
        );

        // To get the day, subtract it with years and
        // months and divide the resultant date into
        // total seconds in a days (60*60*24)
        $days = floor(
            ($diff -
                $years * 365 * 60 * 60 * 24 -
                $months * 30 * 60 * 60 * 24) /
                (60 * 60 * 24)
        );

        // To get the hour, subtract it with years,
        // months & seconds and divide the resultant
        // date into total seconds in a hours (60*60)
        $hours = floor(
            ($diff -
                $years * 365 * 60 * 60 * 24 -
                $months * 30 * 60 * 60 * 24 -
                $days * 60 * 60 * 24) /
                (60 * 60)
        );

        // To get the minutes, subtract it with years,
        // months, seconds and hours and divide the
        // resultant date into total seconds i.e. 60
        $minutes = floor(
            ($diff -
                $years * 365 * 60 * 60 * 24 -
                $months * 30 * 60 * 60 * 24 -
                $days * 60 * 60 * 24 -
                $hours * 60 * 60) /
                60
        );

        // To get the minutes, subtract it with years,
        // months, seconds, hours and minutes
        $seconds = floor(
            $diff -
                $years * 365 * 60 * 60 * 24 -
                $months * 30 * 60 * 60 * 24 -
                $days * 60 * 60 * 24 -
                $hours * 60 * 60 -
                $minutes * 60
        );

        // Print the result
        return $hours . ":" . $minutes . ":" . $seconds;
    }

    // for edit ticket
    public function ticketEdit($id)
    {
        $this->data["edit"] = AssignTicket::where("ticket_id", $id)->first();
        $ticket = Ticket::where("id", $id)->first();
        $ictran_id = Ictran::where("id", $ticket->ictran_id)->first();

        $this->data["oname"] = $ictran_id;
        //echo '<pre>';print_r($this->data['edit']);die;
        return view("admin.ticket.ticket", $this->data);
    }
    // for ticketReassign
    public function ticketReassign($id)
    {
        $this->data["ticket"] = Ticket::where("id", $id)->first();
        $this->data["assign"] = AssignTicket::where("ticket_id", $id)->first();
        $this->data["adminUser"] = User::with("getUserCount")->get();
        

        $getCustId  = Ictran::where('id',$this->data["ticket"]->ictran_id)->first();
        $this->data["customerInfo"] = CustInfo::where('cust_id',$getCustId->CUSTNO)->where('status',1)->get();

       // echo '<pre>';print_r($getCustId->CUSTNO);die;

        return view("admin.ticket.ticket-assign", $this->data);
    }
    // For update ticket
    public function ticketUpdate($id, Request $request)
    {
        // echo $id;die;
        // echo $request->ictran_id;die;
        $tUpdate = Ticket::where("id", $id)->first();
        $tUpdate->ictran_id = $request->ictran_id;
        $tUpdate->save();

        $update = AssignTicket::where("ticket_id", $id)->first();
        $update->description = $request->description;
        $update->phone = $request->phone;
        
        $update->contact_person = $request->contact_person;
        $update->save();

        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully updated !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully updated !!!",
            ]);

        return redirect("app/ticket")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }
    //  Ticket resaasign
    public function assignUpdate($id, Request $request)
    {
        /*$ticketCheck= AssignTicket::where('id',$id)->where('status',1)->first();
    if($ticketCheck){
        return redirect('app/ticket')->withErrors(['Success', 'Ticket Already Assign !!!']);
    }else{*/

        // check Notification
        $updateNotification = Notification::where("ticket_id", $id)->first();
        $updateNotification->user_id = $request->user_id;
        $updateNotification->status = 0;
        $updateNotification->save();

        $update = AssignTicket::where("id", $id)->first();
        $update->user_id = $request->user_id;
        $update->description = $request->description;
        $update->phone = $request->phone;
        $update->otherCustomerId = $request->otherCustomerId;
        $update->status = 1;
        $update->contact_person = $request->contact_person;
        $update->save();

        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully updated !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully updated !!!",
            ]);

        return redirect("app/ticket")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
        // }
    }

    // for ticket delete

    public function ticketDelete($id)
    {
        $ticketDelete = Ticket::where("id", $id)->delete();
        if ($ticketDelete) {
            AssignTicket::where("ticket_id", $id)->delete();
            return ($url = \Session::get("backUrl"))
                ? \Redirect::to($url)->withErrors([
                    "Success",
                    "You have successfully deleted !!!",
                ])
                : \Redirect::back()->withErrors([
                    "Success",
                    "You have successfully deleted !!!",
                ]);
            // return redirect('app/ticket')->withErrors(['Success', 'You have successfully deleted !!!']);
        }
    }

    // For close ticket

    public function ticketClose($id)
    {
        $this->data["webInfo"] = Info::first();
        $ictranId = Ticket::where("id", $id)->first()->ictran_id;
        //dd($ictranId);

        // update ticket Count
        $updateCount = Ictran::where("id", $ictranId)->first();
        $updateCount->count = $updateCount->count + 1;
        $updateCount->save();

        //die;
        $this->data["ictran"] = Ictran::where("id", $ictranId)->first();
        $this->data["cust"] = Cust::where(
            "Organization_Number",
            $this->data["ictran"]->CUSTNO
        )->first();
        $this->data["ticket_number"] = $id;
        $email = $this->data["cust"]->Primary_Email;
        //$email = 'rahul@yopmail.com';

        // $prd= Product::where('id',explode(',',$value['product'])[0])->first();
        // $rinfo= Info::where('id',$prd->company_name)->first();

        // echo '<pre>';print_r($this->data['ictran'])
        // echo '<pre>';print_r($email);die;
        // echo '<pre>';print_r($this->data['cust']->Primary_Email);die;
        //echo '<pre>';print_r($this->data['cust']->Attention);die;
        // return view('emails.close-ticket',$this->data);die;
        \Mail::send("emails.close-ticket", $this->data, function (
            $message
        ) use ($email) {
            $message->to($email)->subject("Ticket Feedback");
            $message->from("sales@pcmart.com.my", "Ticket Feedback");
        });

        $tk = Ticket::where("id", $id)->first();
        $tk->status = 2;
        $tk->close_date = date("Y-m-d H:i:s");
        $tk->save();
        $tka = AssignTicket::where("ticket_id", $tk->id)->first();
        $tka->status = 2;
        $tka->save();
        return ($url = \Session::get("backUrl"))
            ? \Redirect::to($url)->withErrors([
                "Success",
                "You have successfully closed ticket !!!",
            ])
            : \Redirect::back()->withErrors([
                "Success",
                "You have successfully closed ticket !!!",
            ]);
        return redirect("app/ticket")->withErrors([
            "Success",
            "You have successfully closed ticket !!!",
        ]);
    }

    public function feedback($id)
    {
        $this->data["id"] = $id;

        return view("admin.ticket.feedback", $this->data);
    }

    public function feedbackSubmit($id, Request $request)
    {
        $data = base64_decode($id);
        $check = Feedback::where("ticket_id", explode("_", $data)[1])
            ->where("CUST_NO", explode("_", $data)[0])
            ->first();
        if ($check) {
            return view("pages.page-not-authorized");
        } else {
            $feedback = new Feedback();
            $feedback->ticket_id = explode("_", $data)[1];
            $feedback->CUST_NO = explode("_", $data)[0];
            $feedback->rate = $request->rating;
            $feedback->save();
        }

        // Get Dynamic info
        $ictranId = Ticket::where("id", explode("_", $data)[1])->first()
            ->ictran_id;
        $ictran = Ictran::where("id", $ictranId)->first();

        $prd = Product::where(
            "id",
            explode(",", $ictran["product"])[0]
        )->first();
        $rinfo = Info::where("id", $prd->company_name)->first();

        \Session::put("info", $rinfo);
        return redirect("/thankyou");
    }

    // email marketing
    public function emailMarketing()
    {
        return view("admin.market.list");
    }

    // Subscription Email
    public function subsEmailMarketing()
    {
        return view("admin.subs-email.list");
    }

    public function subsEmailMarketing2(Request $request)
    {
        $info = Info::first();
        $id = 1;
        \DB::update(
            "update filter_Setting set month = " .
                $_GET["month"] .
                ", year=" .
                $_GET["year"] .
                " where id = " .
                $id
        );

        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value

        $records = new Transaction();

        $records = $records->where(function ($query) use ($searchValue) {
            $query
                ->where("Organization_Name", "like", "%" . $searchValue . "%")
                ->orwhere("code", "like", "%" . $searchValue . "%")
                ->orwhere("sno_number", "like", "%" . $searchValue . "%")
                ->orwhere("total_price", "like", "%" . $searchValue . "%")
                ->orwhere("expire", "like", "%" . $searchValue . "%");
        });

        if ($_GET["month"] != "" && $_GET["year"]) {
            $records = $records
                ->whereYear("expire", $_GET["year"])
                ->whereMonth("expire", $_GET["month"]);
        }

        $records = $records->where("status", 0);

        $recordr = $records->count();
        if ($_GET["btnclick"] == 0) {
            $records = $records->skip($start)->take($rowperpage);
            if ($columnName == "total_price") {
                $records = $records->orderBy(
                    \DB::raw("CAST(Price_RM AS SIGNED INTEGER)"),
                    $columnSortOrder
                );
            } else {
                $records = $records->orderBy($columnName, $columnSortOrder);
            }
            $records = $records->get()->toArray();
        } else {
            $records = $records->get();
        }

        $totalRecordswithFilter = $recordr;
        $totalRecords = $totalRecordswithFilter;

        // echo '<pre>';print_r($records);die;
        $data_arr = [];
        $ids1 = [];
        foreach ($records as $record) {
            $ids1[] = $record["id"];

            $data_arr[] = [
                "id" => $record["id"],
                "Organization_Name" => $record["Organization_Name"],
                "code" => $record["code"],
                "sno_number" => $record["sno_number"],
                "total_price" => $record["total_price"],
                "invoice" => $record["invoice"],
                "user" => $record["user"],

                "expire" => date("d-m-Y", strtotime($record["expire"])),
            ];
        }
        if ($searchValue != "") {
            $_SESSION["ids"] = array_unique($ids1);
        } else {
            $_SESSION["ids"] = [];
        }
        //print_r(\Session::get('ids'));
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
            "ids" => $_SESSION["ids"],
        ];

        echo json_encode($response);
        exit();
    }

    public function emailMarket(Request $request)
    {
        $info = Info::first();
        $id = 1;
        \DB::update(
            "update filter_Setting set month = " .
                $_GET["month"] .
                ", year=" .
                $_GET["year"] .
                " where id = " .
                $id
        );

        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value

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

        $records = Ictran::leftjoin(
            "arcust",
            "arcust.Organization_Number",
            "=",
            "ictran.CUSTNO"
        )

            ->select("ictran.*", "arcust.Primary_Email as Primary_Email")

            ->where(function ($query) use ($searchValue) {
                $query
                    ->where(
                        "ictran.Organization_Name",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "ictran.Contract_Number",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere("ictran.Support_Type", "like", $searchValue . "%")
                    ->orwhere(
                        "ictran.Price_RM",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "arcust.Primary_Email",
                        "like",
                        "%" . $searchValue . "%"
                    );
            });

        if ($_GET["month"] != "" && $_GET["year"]) {
            $records = $records
                ->whereYear("ictran.Due_date", $_GET["year"])
                ->whereMonth("ictran.Due_date", $_GET["month"]);
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

        $records = $records /*->select('ictran.*')*/
            ->where("ictran.renew_status", 0);

        $recordsEmail = $records->get();
        $recordr = $records->count();
        if ($_GET["btnclick"] == 0) {
            $records = $records->skip($start)->take($rowperpage);
            if ($columnName == "Price_RM") {
                $records = $records->orderBy(
                    \DB::raw("CAST(Price_RM AS SIGNED INTEGER)"),
                    $columnSortOrder
                );
            } else {
                $records = $records->orderBy($columnName, $columnSortOrder);
            }
            $records = $records->get()->toArray();
        } else {
            $records = $records->get();
        }

        $totalRecordswithFilter = $recordr;
        $totalRecords = $totalRecordswithFilter;

        // echo '<pre>';print_r($records);die;
        $data_arr = [];

        $ids1 = [];
        foreach ($recordsEmail as $record) {
            $custInfo = Cust::where(
                "Organization_Number",
                $record["CUSTNO"]
            )->first();
            $email = "";
            if ($custInfo) {
                $email = $custInfo->Primary_Email;
                $ids1[] = $record["CUSTNO"];
            }
        }

        foreach ($records as $record) {
            /******************************************************/
            $Product = Product::whereIn(
                "id",
                explode(",", $record["product"])
            )->get();
            $custInfo = CustomerInfo::where("customer_id", $record["CUSTNO"])
                ->whereIn("setting_id", explode(",", $record["product"]))
                ->get();

            $sum = 0;

            foreach ($Product as $key => $prod) {
                if (count($custInfo) > 0) {
                    $getMonth = date(
                        "m",
                        strtotime($custInfo[$key]["exp_date"])
                    );
                    $getYear = date(
                        "Y",
                        strtotime($custInfo[$key]["exp_date"])
                    );

                    $price = $prod->first_user;
                    $add_user = $prod->add_user;
                    $tax = $prod->tax;

                    $custUser = $custInfo[$key]->user;
                    $actUsr = $custUser - 1;
                    $actPrice = 0;
                    if ($actUsr > 0) {
                        $actPrice = $actUsr * $add_user;
                    }

                    $realPrice = $actPrice + $price;

                    if ($tax == 1) {
                        $tax = ($realPrice * $info->tax) / 100;
                        $realPrice = $tax + $realPrice;
                    }

                    $sum += $realPrice;
                }
            }

            /**************************************************/

            $custInfo = Cust::where(
                "Organization_Number",
                $record["CUSTNO"]
            )->first();
            $email = "";
            if ($custInfo) {
                $email = $custInfo->Primary_Email;
                //$ids1[]=$record['CUSTNO'];
            }
            // $username = $record->username;
            // $name = $record->name;
            // $email = $record->email;

            $tax =
                (str_replace(",", "", $record["Price_RM"]) * $info->tax) / 100;

            $valueAfterTax = $tax + str_replace(",", "", $record["Price_RM"]);

            $product = Product::whereIn("id", explode(",", $record["product"]))
                ->get()
                ->pluck("title")
                ->toArray();

            $dueDate = strtotime($record["Due_date"]);
            $toDayDate = strtotime(date("d-m-Y"));

            $dueDateColor = 0;
            if ($toDayDate > $dueDate) {
                $dueDateColor = 1;
            }

            $data_arr[] = [
                "id" => $record["id"],
                "Subject" => $record["Subject"],
                "Organization_Name" => $record["Organization_Name"],
                "Support_Type" => $record["Support_Type"],
                "product" => implode(",", $product),
                "Price_RM" => $record["Price_RM"],
                "sum" => $sum,
                "Primary_Email" => @$record["Primary_Email"],
                "custInfo" => $custInfo,
                "button" => "efsd",
                "dueDateColor" => $dueDateColor,
                "renew_status" => $record["renew_status"],
                "due_date" => date("d-m-Y", strtotime($record["Due_date"])),
            ];
        }
        if ($searchValue != "") {
            $_SESSION["ids"] = array_unique($ids1);
        } else {
            $_SESSION["ids"] = [];
        }
        //print_r(\Session::get('ids'));
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
            "ids" => $_SESSION["ids"],
        ];

        echo json_encode($response);
        exit();
    }

    // update filter settings
    // updateSetting

    public function sendEmail(Request $request)
    {
        $e = Info::first();
        $all = $request->all();

        $ids = $_SESSION["ids"];
        //  dd($all);

        // echo '<pre>';print_r($ids);die;

        $this->data["month"] = $request->month;
        $this->data["year"] = $request->year;
        $this->data["priceType"] = $request->priceType;

        $this->data["info"] = Info::first();
        $records = new Ictran();
        if (!empty($ids)) {
            $records = $records->whereIn("CUSTNO", $ids);
        }
        $records = $records
            ->whereYear("Due_date", $request->year)
            ->whereMonth("Due_date", $request->month);
        /* $this->data['m'] = $request->month;
         $this->data['y']= $request->year;*/
        $records = $records /*->groupBy('CUSTNO')*/
            ->where("renew_status", 0)
            ->get()
            ->toArray();

        // get company id from product table

        //echo '<pre>'; print_r($this->data['info']);die;

        if ($request->sendtype == 0) {
            $productIds = "";
            foreach ($records as $key => $value) {
                $prd = Product::where(
                    "id",
                    explode(",", $value["product"])[0]
                )->first();

                $this->data["info"] = Info::where(
                    "id",
                    $prd->company_name
                )->first();

                $this->data["ictran"] = $value;
                $this->data["sendtype"] = $request->sendtype;

                $cust = Cust::where(
                    "Organization_Number",
                    $value["CUSTNO"]
                )->first();

                if ($request->testmode == 1) {
                    $email = trim($request->email);
                } else {
                    $email = trim($cust["Primary_Email"]);
                }

                if ($email == "") {
                    $email = $e->email;
                }

                //  echo '<pre>';print_r($this->data['info']['other']);

                //return view('emails.marketing',$this->data);die;
                $nData = $this->data["info"]["other"];
                $nDataemail = $this->data["info"]["email"];
                try {
                    //echo '<pre>';print_r($value['Organization_Name']);die;
                    echo "<p >" .
                        $value["Organization_Name"] .
                        " - " .
                        $email .
                        ' - <span style="color:green"> Success</span></p>';

                    \Mail::send("emails.marketing", $this->data, function (
                        $message
                    ) use ($email, $nData, $nDataemail) {
                        $message
                            ->to($email)
                            ->subject("Software Renewal - Quotation");
                        $message->from($nDataemail, $nData);
                    });
                } catch (\Exception $e) {
                    if (count(\Mail::failures()) > 0) {
                        foreach (\Mail::failures() as $email_address) {
                            echo "<p >" .
                                $value["Organization_Name"] .
                                " - " .
                                $email_address .
                                ' - <span style="color:red"> Error</span></p>';
                        }
                    }
                }
            }

            die();
        } else {
            //300A/035
            // echo 'asds';die;
            $records = new Transaction();

            if (!empty($ids)) {
                $records = $records->whereIn("id", $ids);
            }

            $records = $records
                ->whereYear("expire", $request->year)
                ->whereMonth("expire", $request->month);
            // ->where('customer_id','30AE/004');
            /* $this->data['m'] = $request->month;
             $this->data['y']= $request->year;*/
            $records = $records /*->groupBy('CUSTNO')*/
                ->where("status", 0)
                ->get()
                ->toArray();
            // dd($records);
            $actArray = [];
            foreach ($records as $key => $value) {
                $value["CUSTNO"] = $value["customer_id"];
                unset($value["customer_id"]);
                $actArray[] = $value;
            }

            //  echo '<pre>';print_r($actArray);die;
            foreach ($actArray as $key => $value) {
                //echo '<pre>';print_r($value);die;

                $this->data["ictran"] = $value;
                $this->data["sendtype"] = $request->sendtype;
                $cust = Cust::where(
                    "Organization_Number",
                    $value["CUSTNO"]
                )->first();

                if ($request->testmode == 1) {
                    $email = trim($request->email);
                } else {
                    $email = trim($cust["Primary_Email"]);
                }

                if ($email == "") {
                    $email = trim($e->email);
                }
                // echo '<pre>';print_r($this->data);
                // return view('emails.marketing',$this->data);die;
                $nData = $this->data["info"]["other"];
                $nDataemail = $this->data["info"]["email"];

                try {
                    echo "<p >" .
                        $value["Organization_Name"] .
                        " - " .
                        $email .
                        ' - <span style="color:green"> Success</span></p>';

                    \Mail::send("emails.marketing", $this->data, function (
                        $message
                    ) use ($email, $nData, $nDataemail) {
                        $message
                            ->to($email)
                            ->subject("Software Renewal - Quotation");
                        $message->from($nDataemail, $nData);
                    });
                } catch (\Exception $e) {
                    if (count(\Mail::failures()) > 0) {
                        foreach (\Mail::failures() as $email_address) {
                            echo "<p >" .
                                $value["Organization_Name"] .
                                " - " .
                                $email_address .
                                ' - <span style="color:red"> Error</span></p>';
                        }
                    }
                }
            }
        }

        die();
        return redirect("app/email-marketing")->withErrors([
            "Success",
            "You have successfully sent email !!!",
        ]);
    }

    /****************************************/
    // For category
    public function category()
    {
        $this->data["products"] = ProductCat::get();
        return view("admin.cat.list", $this->data);
    }
    // for settind related
    public function categoryAdd()
    {
        return view("admin.cat.add");
    }

    public function categoryStore(Request $request)
    {
        $setting = new ProductCat();
        $setting->cat_name = $request->cat_name;
        $setting->type = $request->type;

        $setting->save();

        return redirect("app/category")->withErrors([
            "Success",
            "You have successfully added !!!",
        ]);
    }

    public function categoryEdit($id)
    {
        $this->data["edit"] = ProductCat::where("id", $id)->first();

        return view("admin.cat.edit", $this->data);
    }

    public function categoryUpdate(Request $request, $id)
    {
        $setting = ProductCat::where("id", $id)->first();
        $setting->cat_name = $request->cat_name;
        $setting->type = $request->type;
        $setting->save();

        return redirect("app/category")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    public function categoryDelete($id)
    {
        $Product = ProductCat::where("id", $id)->delete();
        if ($Product) {
            return redirect("app/category")->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ]);
        }
    }

    /****************************************/
    // For Training Settings
    public function trainingSetting()
    {
        $this->data["products"] = trainingSetting::get();
        return view("admin.training_setting.list", $this->data);
    }
    // for settind related
    public function trainingSettingAdd()
    {
        return view("admin.training_setting.add");
    }

    public function trainingSettingStore(Request $request)
    {
        $setting = new trainingSetting();
        $setting->code = $request->code;
        $setting->description = $request->description;
        $setting->first_user = $request->first_user;
        $setting->add_user = $request->add_user;
        $setting->no_of_session = $request->no_of_session;

        $setting->save();

        return redirect("app/trainingSetting")->withErrors([
            "Success",
            "You have successfully added !!!",
        ]);
    }

    public function trainingSettingEdit($id)
    {
        $this->data["edit"] = trainingSetting::where("id", $id)->first();

        return view("admin.training_setting.edit", $this->data);
    }

    public function trainingSettingUpdate(Request $request, $id)
    {
        $setting = trainingSetting::where("id", $id)->first();
        $setting->code = $request->code;
        $setting->description = $request->description;
        $setting->first_user = $request->first_user;
        $setting->add_user = $request->add_user;
        $setting->no_of_session = $request->no_of_session;

        $setting->save();

        return redirect("app/trainingSetting")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    public function trainingSettingDelete($id)
    {
        $Product = trainingSetting::where("id", $id)->delete();
        if ($Product) {
            return redirect("app/trainingSetting")->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ]);
        }
    }

    /****************************************/
    // For Training
    public function training(Request $request)
    {
        //echo '<pre>';print_r($request->all());die;

        $trainingId = Schedulesession::get()
            ->pluck("trainingId")
            ->toArray();

        //dd($sess);
        $this->data["none"] = Training::whereNotIn("id", $trainingId)->count();
        $ses = [1];
        $trainingId = Schedulesession::where("sessionId", $ses)
            ->get()
            ->pluck("trainingId")
            ->toArray();
        //dd($trainingId);
        //$this->data['session2']= Training::whereIn('id',$trainingId)->count();
        $this->data["thisMonth"] = Training::whereMonth(
            "invoice_date",
            date("m")
        )
            ->whereYear("invoice_date", date("Y"))
            ->count();
        $this->data["thisMonthValue"] = Training::whereMonth(
            "invoice_date",
            date("m")
        )
            ->whereYear("invoice_date", date("Y"))
            ->sum("value");

        $this->data["product"] = trainingSetting::get();
        $session2 = Training::where("session1", "c")
            ->where("noOfSession", 2)
            ->get();
        $k = 0;
        foreach ($session2 as $key => $value) {
            if (
                count($value["getCountDta"]) == "1_2" ||
                $value["getCountDta"] == "none"
            ) {
                $k++;
            }
        }

        $this->data["session2"] = $k;

        // echo '<pre>';print_r(count($aa));die;
        $this->data["trainers"] = Trainer::get();

        $allDta = Training::with("getCountDta");

        if ($request->startDate != "" && $request->endDate) {
            $startDate = date("Y-m-d", strtotime($request->startDate));
            $endDate = date("Y-m-d", strtotime($request->endDate));
            $allDta = $allDta->whereBetween("invoice_date", [
                $startDate . " 00:00:00",
                $endDate . " 23:59:59",
            ]);
        }

        if ($request->product != "") {
            $allDta = $allDta->orwhere(
                "product",
                "like",
                "%" . $request->product . "%"
            );
        }

        if ($request->trainer != "") {
            $trainingId = Schedulesession::where("trainerId", $request->trainer)
                ->get()
                ->pluck("trainingId")
                ->toArray();
            $allDta = $allDta->whereIn("id", $trainingId);
        }
        if ($request->status != "") {
            $trainingId = Schedulesession::where("status", $request->status)
                ->get()
                ->pluck("trainingId")
                ->toArray();
            $allDta = $allDta->whereIn("id", $trainingId);
        }

        if ($request->session != "" && $request->session != "none") {
            if ($request->session == "1_2") {
                $allDta = $allDta
                    ->where("session1", "c")
                    ->where("session2", "")
                    ->where("noOfSession", 2);
            } else {
                $allDta = $allDta->where("noOfSession", $request->session);
            }
        }

        $allDta = $allDta->orderBy("invoice_date", "asc")->get();

        /*********************Start pi chart*****************************/
        $prod = TrainingSetting::get()->toArray();

        //echo '<pre>';print_r($prod);die;
        $arrayChart = [];
        foreach ($prod as $key => $value) {
            if ($request->form3Year) {
                $sum = Training::whereYear("invoice_date", $request->form3Year)
                    ->where("product", $value["description"])
                    ->sum("value");
            } else {
                $sum = Training::/*whereDate('invoice_date','>=',date('Y-m-d'))*/ where(
                    "product",
                    $value["description"]
                )->sum("value");
            }

            //echo '<pre>';print_r($prod);
            $arrayChart[]["name"] = $value["description"];
            $arrayChart[$key]["sum"] = $sum;
        }
        //echo '<pre>';print_r($arrayChart);die;
        $this->data["arrayChart"] = $arrayChart;
        // echo '<pre>';print_r($this->data['arrayChart']);die;
        /*******************End Pi Chart ******************************************/

        /****************************Start Bar Chart**********************************/
        $invDates = Training::orderBy("invoice_date")
            ->get()
            ->pluck("invoice_date")
            ->toArray();
        //dd(array_unique($invDate));
        $dateInv = [];
        foreach ($invDates as $key => $invDate) {
            $dateInv[] = date("Y", strtotime($invDate));
        }
        //dd(array_unique($dateInv));
        $this->data["Support_Type"] = Training::groupby("product")->get();
        $this->data["invoice_date2"] = array_unique($dateInv);
        //echo '<pre>';print_r($this->data['Support_Type']);die;

        if ($request->month) {
            $year = $request->month;
            $Lastyear = $request->month - 1;
            $Last3year = $request->month - 2;
        } else {
            $year = date("Y");
            $Lastyear = date("Y", strtotime("-1 year"));
            $Last3year = date("Y", strtotime("-2 year"));
        }

        if ($request->typeww) {
            $type11 = $request->typeww;
        } else {
            $type11 = "";
        }

        $lastYear = [];
        $lst3Year = [];
        $currentYear = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthSum = Training::whereYear("invoice_date", $year)->whereMonth(
                "invoice_date",
                $i
            );
            if ($type11) {
                $monthSum = $monthSum->where("product", $type11);
            }
            $monthSum = $monthSum->sum("value");
            $currentYear[] = $monthSum;

            // Last Year
            $lastMonthSum = Training::whereYear(
                "invoice_date",
                $Lastyear
            )->whereMonth("invoice_date", $i);
            $last3yr = Training::whereYear(
                "invoice_date",
                $Last3year
            )->whereMonth("invoice_date", $i);
            if ($type11) {
                $lastMonthSum = $lastMonthSum->where("product", $type11);
            }
            $lastMonthSum = $lastMonthSum->sum("value");
            $lastYear[] = $lastMonthSum;
            $lst3Year[] = $last3yr->sum("value");
        }

        $this->data["currentYear"] = $currentYear;
        $this->data["lastYear"] = $lastYear;

        /****************************End Bar Chart**********************************/

        $this->data["training"] = $allDta;
        $this->data["lst3Year"] = $lst3Year;
        $this->data["c"] = $request->session;
        //echo '<pre>';print_r($this->data['training']);die;
        return view("admin.training.list", $this->data);
    }

    public function trainingEdit($id)
    {
        $this->data["edit"] = Training::where("id", $id)->first();

        return view("admin.training.edit", $this->data);
    }

    public function trainingUpdate(Request $request, $id)
    {
        $cust = Cust::where("Organization_Number", $request->customer)->first();
        $setting = Training::where("id", $id)->first();
        $setting->Invoice = $request->Invoice;
        $setting->customer = $request->customer;
        $setting->customer_name = @$cust->Organization_Name;
        $setting->code = $request->code;
        $setting->product = $request->product;
        $setting->noOfSession = $request->noOfSession;
        $setting->value = $request->value;
        $setting->trainee = $request->trainee;
        $setting->invoice_date = date(
            "Y-m-d",
            strtotime($request->invoice_date)
        );

        $setting->save();

        return redirect("app/training")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    public function trainingDelete($id)
    {
        $Product = Training::where("id", $id)->delete();
        if ($Product) {
            return redirect("app/training")->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ]);
        }
    }

    // For Trainer
    public function trainer()
    {
        $this->data["trainer"] = Trainer::get();
        return view("admin.trainer.list", $this->data);
    }

    public function trainerAdd()
    {
        return view("admin.trainer.add");
    }

    public function trainerStore(Request $request)
    {
        $trainer = new Trainer();
        $trainer->name = $request->fname;
        $trainer->email = $request->email;
        $trainer->trainerType = implode(",", $request->trainerType);
        $trainer->phone = $request->phone;
        $trainer->status = $request->status;
        //$setting->no_of_session= $request->no_of_session;

        $trainer->save();

        return redirect("app/trainer")->withErrors([
            "Success",
            "You have successfully added !!!",
        ]);
    }

    public function trainerEdit($id)
    {
        $this->data["edit"] = Trainer::where("id", $id)->first();

        return view("admin.trainer.edit", $this->data);
    }

    public function trainerUpdate(Request $request, $id)
    {
        $trainer = Trainer::where("id", $id)->first();
        $trainer->name = $request->fname;
        $trainer->email = $request->email;
        $trainer->trainerType = implode(",", $request->trainerType);
        $trainer->phone = $request->phone;
        $trainer->status = $request->status;

        $trainer->save();

        return redirect("app/trainer")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    public function trainerDelete($id)
    {
        $Product = Trainer::where("id", $id)->delete();
        if ($Product) {
            return redirect("app/trainer")->withErrors([
                "Success",
                "You have successfully deleted !!!",
            ]);
        }
    }

    // Create session session 1 and session 2 ScheduleSession
    public function session($id, $sId)
    {
        $this->data["trainers"] = Trainer::get();
        $this->data["edit"] = Training::where("id", $id)->first();
        $this->data["sId"] = $sId;

        return view("admin.training.createsession", $this->data);
    }
    public function sessionView($id, $sId)
    {
        $this->data["trainers"] = Trainer::get();
        $this->data["sId"] = $sId;
        $this->data["id"] = $id;
        $this->data["edit"] = ScheduleSession::where("trainingId", $id)
            ->where("sessionId", $sId)
            ->first();
        // $this->data['sId']= $sId;

        return view("admin.training.viewsession", $this->data);
    }

    public function ScheduleSession(Request $request, $id, $sId)
    {
        $all = $request->all();
        // echo $id. $sId;
        //echo '<pre>';print_r($all);die;

        //echo '<pre>';print_r(explode('-',$request->datetimes));die;

        $sess = new ScheduleSession();
        $sess->trainingId = $id;
        $sess->sessionId = $sId;
        $sess->customerId = $request->customer;
        $sess->trainerId = $request->trainerId;
        $sess->product = $request->Product;
        $sess->remark = $request->remark;
        $sess->status = $request->status;
        $sess->customerName = $request->customer_name;
        $sess->date = date("Y-m-d", strtotime($request->datetimes));
        //$sess->end_dateTime= date('Y-m-d H:i',strtotime(explode('-',$request->datetimes)[1]));
        $sess->startTime = date("H:i:s", strtotime($request->startTime));
        $sess->endTime = date("H:i:s", strtotime($request->endTime));
        $sess->save();

        $trainingUpdateSession = Training::where("id", $id)->first();
        if ($sId == 1) {
            $trainingUpdateSession->session1 = "c";
        } else {
            $trainingUpdateSession->session2 = "c";
        }

        $trainingUpdateSession->save();

        return redirect("app/training")->withErrors([
            "Success",
            "You have successfully create session !!!",
        ]);
        // $this->data['trainers']= Trainer::get();
        // $this->data['edit']= Training::where('id',$id)->first();
        // $this->data['sId']= $sId;

        //  return view('admin.training.createsession',$this->data);
    }
    public function updatesession(Request $request, $id, $sId)
    {
        $all = $request->all();
        // echo $id. $sId;
        // echo '<pre>';print_r($all);die;

        //echo '<pre>';print_r(explode('-',$request->datetimes));die;

        $sess = ScheduleSession::where("trainingId", $id)
            ->where("sessionId", $sId)
            ->first();
        // $sess->trainingId= $id;
        // $sess->sessionId= $sId;
        $sess->customerId = $request->customer;
        $sess->trainerId = $request->trainerId;
        $sess->product = $request->Product;
        $sess->remark = $request->remark;
        $sess->status = $request->status;
        $sess->customerName = $request->customer_name;
        $sess->date = date("Y-m-d", strtotime($request->datetimes));
        //$sess->end_dateTime= date('Y-m-d H:i',strtotime(explode('-',$request->datetimes)[1]));
        $sess->startTime = date("H:i:s", strtotime($request->startTime));
        $sess->endTime = date("H:i:s", strtotime($request->endTime));
        $sess->save();
        return redirect("app/training")->withErrors([
            "Success",
            "You have successfully create session !!!",
        ]);
        // $this->data['trainers']= Trainer::get();
        // $this->data['edit']= Training::where('id',$id)->first();
        // $this->data['sId']= $sId;

        //  return view('admin.training.createsession',$this->data);
    }

    public function scheduling(Request $request)
    {
        $this->data["customers"] = Cust::get();
        $this->data["trainsers"] = Trainer::get();
        $this->data["training"] = Trainer::where("trainerType", 1)->get();
        $this->data["onsite"] = Trainer::where("trainerType", 2)->get();
        $this->data["demo"] = Trainer::where("trainerType", 3)->get();
        $this->data["trainingSetting"] = trainingSetting::get();

        $this->data["schedules"] = ScheduleSession::get();
        $this->data["schedulesList"] = ScheduleSession::get();

        if (@$_REQUEST["trainerName"]) {
            $this->data["schedules"] = ScheduleSession::where(
                "trainerId",
                $_REQUEST["trainerName"]
            )->get();
            $this->data["schedulesList"] = ScheduleSession::where(
                "trainerId",
                $_REQUEST["trainerName"]
            )->get();
        }

        return view("pages.app-calendar", $this->data);
    }

    //
    public function schedulingDelete($id)
    {
        $ss = ScheduleSession::where("id", $id)->delete();
        return redirect("app/scheduling")->withErrors([
            "Success",
            "You have successfully deleted !!!",
        ]);
    }

    // Create schedule
    public function createSchedule(Request $request)
    {
        $all = $request->all();

        if ($request->check) {
            $ccc = 1;
        } else {
            $ccc = 0;
        }

        if ($request->trainerType == 4 || $request->trainerType == 5) {
            $ccc = 1;
        }

        $checkSession = ScheduleSession::where(
            "trainerId",
            $request->trainerTypeName
        )
            ->whereDate("date", date("Y-m-d", strtotime($request->startDate)))
            ->whereTime(
                "startTime",
                ">=",
                date("H:i:s", strtotime($request->startTime))
            ) // or use $request->strtotime('time_start')
            ->whereTime(
                "endTime",
                "<=",
                date("H:i:s", strtotime($request->endTime))
            )

            ->first();

        if ($checkSession) {
            \Session::flash(
                "error",
                "This schedule is already booked for this person please choose another date and time."
            );
            return \Redirect::back();
            die();
        }

        // echo '<pre>';print_r($request->all());die;

        $ss = new ScheduleSession();
        $ss->trainerType = $request->trainerType;
        $ss->trainerId =
            $request->trainerTypeName != "" ? $request->trainerTypeName : "";

        if ($ccc == 0) {
            $custInfo = Cust::where(
                "Organization_Number",
                $all["companyName"]
            )->first();
            $ss->customerName = @$custInfo->Organization_Name
                ? @$custInfo->Organization_Name
                : "";
            $ss->companyName = @$custInfo->custometName;
            $ss->customerId =
                @$custInfo->Organization_Number != ""
                    ? @$custInfo->Organization_Number
                    : "";
            $ss->address = @$custInfo->Address1;
            $ss->contactPerson = @$custInfo->Attention;
            $ss->contactNumber = @$custInfo->Primary_Phone;
        } else {
            $ss->customerName = $request->custometName;
            $ss->companyName =
                @$request->companyNamec != "" ? @$request->companyNamec : "";
            $ss->customerId = "";
            $ss->address = $request->address;
            $ss->contactPerson = $request->contactPerson;
            $ss->contactNumber = $request->contactNumber;
        }
        $ss->checkStatus = $ccc;
        $ss->product =
            $request->product != "" ? implode(",", $request->product) : "";
        $ss->remark = $request->remark;
        $ss->date = date("Y-m-d", strtotime($request->startDate));
        //$sess->end_dateTime= date('Y-m-d H:i',strtotime(explode('-',$request->datetimes)[1]));
        $ss->startTime = date("H:i:s", strtotime($request->startTime));
        $ss->endTime = date("H:i:s", strtotime($request->endTime));
        $ss->save();

        return redirect("app/scheduling")->withErrors([
            "Success",
            "You have successfully addedd !!!",
        ]);
    }

    public function getDataCal(Request $request)
    {
        $all = $request->all();

        $scheduleSession = ScheduleSession::where("id", $all["id"])
            ->first()
            ->toArray();
        $trainer = Trainer::where("id", $scheduleSession["trainerId"])->first();

        //echo '<pre>';print_r($scheduleSession['checkStatus']);die;

        $custInfo = Cust::where(
            "Organization_Number",
            $scheduleSession["customerId"]
        )->first();
        ?> 

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.js"></script>

  <link rel="stylesheet" href="https://www.jonthornton.com/jquery-timepicker/jquery.timepicker.css">


  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );


  $(document).ready(function() {

     $('.js-example-basic-multiple').select2();
  
    $('.js-example-basic-single').select2();
});

  $(document).on('change','.newClass', function(){


  //alert();

  var CUSTNO= $(this).val();
  $('.cname').val(' ');
  $('.address').val(' ');
  $.ajax({
            url:"<?= url("/") ?>/app/getcustInfo2",
            dataType: "json", // data type of response
            data:{"_token":"<?= csrf_token() ?>",'CUSTNO':CUSTNO},
            method:"post",
            success:function(res){
                    
                  $('.cname').val(res.Attention);
                  $('.address').val(res.Address1);
                  $('.cnumber').val(res.Primary_Phone);
            }
        });

});

  /******************************************************/
function interval() {

}

$(function () {
  for (var i = 5; i <= 60; i += 5) {
    $('#meeting').append('<option value="' + i + '">' + i + '   min' + '</option>');
  }

  function setEndTime() {
     var meetingLength = parseInt($('#meeting').find('option:selected').val() || 0),
         selectedTime = $('#start1').timepicker('getTime');
      selectedTime.setMinutes(selectedTime.getMinutes() + parseInt(meetingLength, 10), 0);
      $('#end1').timepicker('setTime', selectedTime);
  }
  
  $('#start1').timepicker({
    'minTime': '8:00 AM',
    'maxTime': '9:00 PM',
    'step': 5
  }).on('changeTime', function () {
    setEndTime();
  });

  $('#end1').timepicker({
    'minTime': '8:00 AM',
    'maxTime': '9:00 PM',
    'step': 5
  });
  
  $('#meeting').bind('change', function () {
     setEndTime();
  });
});






/*******************************************************/




  </script>

      

          <div class="col-sm-12">

          <?php
          if (
              $scheduleSession["trainerType"] == 1 ||
              $scheduleSession["trainerType"] == 0 ||
              $scheduleSession["trainerType"] == ""
          ) {
              $t = 1;
          } elseif ($scheduleSession["trainerType"] == 2) {
              $t = 2;
          } elseif ($scheduleSession["trainerType"] == 4) {
              $t = 4;
          } elseif ($scheduleSession["trainerType"] == 5) {
              $t = 5;
          } else {
              $t = 3;
          }

          $allData = Trainer::where("id", $scheduleSession["trainerId"])->get();
          ?>
   <style type="text/css">
     span.select2-selection.select2-selection--single {
    width: 192px;
     
}
.form-group {
    margin-bottom: 1rem;
    height: 33px;
}

span.select2-dropdown.select2-dropdown--above {
    width: 191px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 1px;
    right: -79px !important;
    width: -77px;
}
.hide{
  display: none;
}
   </style>
            
 
    <form action="<?= url(
        "/app/updateschedule"
    ) ?>/<?= $all["id"] ?>" method="post" id="pf">
     <input type="hidden" name="_token" value="<?= csrf_token() ?>">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title ap1">Schedule Session</h4>
      </div>
      <div class="modal-body">

      <?php
      error_reporting(0);
      if ($scheduleSession["checkStatus"] == 1) {
          $check = "checked";
          $val = 1;
      } else {
          $check = "";
          $val = 0;
      }

      if ($t == 4) {
          $hide = "hide";
          $dis = "readonly";
      }

      if ($t == 5) {
          $hide5 = "hide";
          $dis = "readonly";
      }
      ?>
          
          <div class="form-group">
              <p><input type="checkbox" name="check" class="check" style="margin-left: 15px;" value="<?= $val ?>"  <?= $check ?>> Add Manually</p>
            </div>

          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <select name="trainerType" class="form-control cc" <?= $dis ?>>
            <option value="1" <?php if ($t == 1) {
                echo "selected";
            } ?>>Training</option>
            <option value="2" <?php if ($t == 2) {
                echo "selected";
            } ?>>Onsite</option>
            <option value="3" <?php if ($t == 3) {
                echo "selected";
            } ?>>Demo</option>
            <option value="4" <?php if ($t == 4) {
                echo "selected";
            } ?>>Public Holiday</option>
            <option value="5" <?php if ($t == 5) {
                echo "selected";
            } ?>>On Leave</option>
              
            </select>
            </div>
          </div>
        
          <div class="col-sm-6 <?= $hide ?>" style="float: left;">
          <div class="form-group training appdat">
              <select name="trainerTypeName" class="form-control">
              <?php foreach ($allData as $trainer) { ?>
              <option value="<?= $trainer->id ?>"><?= $trainer->name ?></option>
               <?php } ?>
              </select>
            </div>
          </div>





          <div class="col-sm-6 <?= $hide ?> <?= $hide5 ?>" style="float: left;">
          <?php if ($scheduleSession["checkStatus"] == 0) { ?>
          <div class="form-group trainingselect">
            <!-- <input type="text" name="companyName"   class="form-control" placeholder="Company Name" value="<?= $scheduleSession[
                "customerName"
            ] ?>"> -->
            
            <select class="form-control js-example-basic-single oname newClass" name="ictran_id">
                        <option value="">--Select--</option>
                        <option value="<?= $scheduleSession[
                            "customerId"
                        ] ?>" selected><?= @$custInfo->Organization_Name ?></option>
                        


                         
            </select>


            </div>

            <!-- <div class="form-group onsiteDemo" style="display: none">
           <input type="text" class="form-control" name="companyNamec" placeholder="Company Name13">
          </div> -->

            <?php } else { ?>
            <!--  -->
            <div class="form-group onsiteDemo">
            <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="<?= $scheduleSession[
                "companyName"
            ] ?>">
            </div>
            <!--  -->
            <?php } ?>

          </div>
        
          

          

          <div class="col-sm-6 <?= $hide5 ?>" style="float: left;">
          <div class="form-group">
            <input type="text" name="custometName"  class="form-control cname" placeholder="Customer Name" value="<?= $scheduleSession[
                "checkStatus"
            ] == 0
                ? @$custInfo->Attention
                : $scheduleSession["customerName"] ?>">
            </div>
          </div>

          <div class="col-sm-6 <?= $hide ?> <?= $hide5 ?>" style="float: left;display: none">
          <div class="form-group">
            <input type="text" name="contactPerson"  class="form-control cname" placeholder="Contact Person" value="<?= $scheduleSession[
                "contactPerson"
            ] ?>">
            </div>
          </div>

          <div class="col-sm-6 <?= $hide ?> <?= $hide5 ?>" style="float: left;">
          <div class="form-group">
           <!--  <input type="text" name="address"   class="form-control address" placeholder="Address" value="<?= $scheduleSession[
               "checkStatus"
           ] == 0
               ? @$custInfo->Address1
               : $scheduleSession["address"] ?>"> -->
            
            <textarea rows="1"  name="address" class="form-control address" placeholder="Address"><?= $scheduleSession[
                "checkStatus"
            ] == 0
                ? @$custInfo->Address1
                : $scheduleSession["address"] ?></textarea>

            </div>
          </div>

          

          <div class="col-sm-6 <?= $hide ?> <?= $hide5 ?>" style="float: left;">
          <div class="form-group">
            <input type="text" name="contactNumber"  class="form-control cnumber" placeholder="Contact Number" value="<?= $scheduleSession[
                "checkStatus"
            ] == 0
                ? @$custInfo->Primary_Phone
                : $scheduleSession["contactNumber"] ?>">
            </div>
          </div>


         



          <div class="col-sm-6" style="float: left;">
          <div class="form-group">
            <input type="text" name="startDate" class="form-control" id="datepicker1" placeholder="Choose Date" value="<?= date(
                "d-m-Y",
                strtotime($scheduleSession["date"])
            ) ?>">
            </div>
          </div>

          <div class="col-sm-6 <?= $hide ?>" style="float: left;">
          <div class="form-group">
            <input type="text" name="startTime"  class="form-control" id="start1" placeholder="Start Time" value="<?= $scheduleSession[
                "startTime"
            ] ?>" />
            </div>
          </div>



          <div class="col-sm-6 <?= $hide ?>" style="float: left;">
          <div class="form-group">
            <input type="text" name="endTime"  class="form-control" id="end1" placeholder="End Time" value="<?= $scheduleSession[
                "endTime"
            ] ?>" />
            </div>
          </div>

           <div class="col-sm-6 <?= $hide ?> <?= $hide5 ?>" style="float: left;">
          <div class="form-group">
            <input type="text" name="remark" class="form-control" placeholder="Remark" value="<?= $scheduleSession[
                "remark"
            ] ?>" >
            </div>
          </div>

          <!-- Product -->
          <div class="col-sm-6 <?= $hide ?> <?= $hide5 ?>" style="float: left;">
          <div class="form-group">
              <select class="form-control js-example-basic-multiple"  multiple="multiple" name="product[]">
                        <option value="">Select Product</option>
                        <?php
                        $getP = explode(",", $scheduleSession["product"]);

                        $trainingSetting = trainingSetting::get();
                        foreach ($trainingSetting as $setProduct) { ?>
                          <option value="<?= $setProduct->description ?>" <?php if (
    in_array($setProduct->description, $getP)
) {
    echo "selected";
} ?>><?= $setProduct->description ?></option>
                      <?php }
                        ?>
                         
            </select>
            </div>
          </div>
          <!-- Product -->


          <div class="col-sm-6" style="float: left;">
          <div class="form-group">

          <?php
          // check current time greater or not scheduling date
          $scheduleDate = strtotime($scheduleSession["date"]);
          $currentDate = strtotime(date("d-m-Y"));
          $perm = Helper::checkPermission();

          // echo '<pre>';print_r($perm);
          //  For Past button condition
          if (in_array("schedule_past_edit", $perm)) {
              if ($scheduleDate < $currentDate) {
                  echo '<button type="submit" class="btn btn-success pf">Update</button>';
              }
          }
          //  For future button condition
          if (in_array("schedule_future_edit", $perm)) {
              if ($scheduleDate >= $currentDate) {
                  echo '<button type="submit" class="btn btn-success pf">Update</button>';
              }
          }

          // For delete btn condition
          if (in_array("schedule_past_delete", $perm)) {
              if ($scheduleDate < $currentDate) { ?>

            <a onclick="return confirm('Are you sure?')" href="<?= url(
                "/app/deleteSchedule"
            ) ?>/<?= $all["id"] ?>" class="btn btn-danger">Delete</a>
          <?php }
          }
          //  For future button condition
          if (in_array("schedule_future_delete", $perm)) {
              if ($scheduleDate >= $currentDate) { ?>

            <a onclick="return confirm('Are you sure?')" href="<?= url(
                "/app/deleteSchedule"
            ) ?>/<?= $all["id"] ?>" class="btn btn-danger">Delete</a>
            
           <?php }
          }
          ?>


          



           
            </div>
          </div>


          </div>

           </div>

           
          
            
        </div>  
      </div>

      </form>


      <script>
        $(document).ready(function() {
  // $('.js-example-basic-single').select2();
    

   $('.js-example-basic-single').select2({
    ajax: {
      url:"<?= url("/") ?>/app/getcustInfo",
      dataType: 'json',
      data: (params) => {
        return {
          q: params.term,
        }
      },
      processResults: (data, params) => {
      //alert();
        // if(data.length ==0){
        //     $('.cname').val(' ');
        //     $('.address').val(' ');
        //     $('.cnumber').val(' ');
        // }

        const results = data.map(item => {

          
          return {
            id: item.custid,
            text: item.Organization_Name,
          };
        });
        return {
          results: results,
        }
      },
    },
  });



});
      </script>


     <?php
    }

    public function updateschedule($id, Request $request)
    {
        $ss = ScheduleSession::where("id", $id)->first();

        //echo '<pre>';print_r($request->all());die;
        // echo $id;
        // die;

        if ($request->check) {
            $ccc = 1;
        } else {
            $ccc = 0;
        }

        if ($request->trainerType == 4 || $request->trainerType == 5) {
            $ccc = 1;
        }

        $ss->trainerType = $request->trainerType;
        $ss->trainerId = $request->trainerTypeName;
        if ($ccc == 0) {
            $custInfo = Cust::where(
                "Organization_Number",
                $request->ictran_id
            )->first();
            ///echo '<pre>';print_r($request['trainerType']);die;
            $ss->customerName =
                @$custInfo->Organization_Name != ""
                    ? $custInfo->Organization_Name
                    : "";
            $ss->companyName =
                @$custInfo->custometName != "" ? $custInfo->custometName : "";
            $ss->customerId =
                @$custInfo->Organization_Number != ""
                    ? $custInfo->Organization_Number
                    : "";
            $ss->address = @$custInfo->Address1;
            $ss->contactPerson = @$custInfo->Attention;
            $ss->contactNumber = @$custInfo->Primary_Phone;
        } else {
            //echo $request['contactNumber'];die;
            $ss->customerName = $request["custometName"];
            $ss->companyName = $request["companyName"];
            $ss->customerId = "";
            $ss->address = $request["address"];
            $ss->contactPerson = $request["contactPerson"];
            $ss->contactNumber = $request["contactNumber"];
        }
        $ss->remark = $request->remark;
        $ss->product =
            $request->product != "" ? implode(",", $request->product) : "";
        $ss->checkStatus = $request->check;
        $ss->date = date("Y-m-d", strtotime($request->startDate));
        //$sess->end_dateTime= date('Y-m-d H:i',strtotime(explode('-',$request->datetimes)[1]));
        $ss->startTime = date("H:i:s", strtotime($request->startTime));
        $ss->endTime = date("H:i:s", strtotime($request->endTime));
        $ss->save();

        return redirect("app/scheduling")->withErrors([
            "Success",
            "You have successfully updated !!!",
        ]);
    }

    //

    public function getTType(Request $request)
    {
        $all = $request->all();
        $id = $all["id"];

        //$allData= Trainer::where('trainerType',$all['id'])->get();
        $allData = \DB::table("trainer")
            ->whereRaw("find_in_set($id,trainerType)")
            ->get();
        // echo '<pre>';print_r($allData);die;
        ?>

            <div class="form-group training">
              <select name="trainerTypeName" class="form-control">
              <?php foreach ($allData as $trainer) { ?>
              <option value="<?= $trainer->id ?>"><?= $trainer->name ?></option>
               <?php } ?>
              </select>
            </div>



<?php
    }

    //

    public function deleteSchedule($id)
    {
        $ss = ScheduleSession::where("id", $id)->delete();
        return redirect("app/scheduling")->withErrors([
            "Success",
            "You have successfully Deleted !!!",
        ]);
    }

    public function schedulingData1(Request $request)
    {
        $perm = Helper::checkPermission();
        $ticket_red_renew = 0;
        if (in_array("ticket_red_renew", $perm)) {
            $ticket_red_renew = 1;
        }
        // Delete ticket
        $tickect_delete = 0;
        if (in_array("schedule_delete", $perm)) {
            $tickect_delete = 1;
        }
        $tickect_edit = 0;
        if (in_array("tickect_edit", $perm)) {
            $tickect_edit = 1;
        }
        $contract_edit = 0;
        if (in_array("contract_edit", $perm)) {
            $contract_edit = 1;
        }

        ## Read value
        $draw = $request->get("draw");
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get("order");
        $columnName_arr = $request->get("columns");
        $order_arr = $request->get("order");
        $search_arr = $request->get("search");

        $columnIndex = $columnIndex_arr[0]["column"]; // Column index
        $columnName = $columnName_arr[$columnIndex]["data"]; // Column name
        $columnSortOrder = $order_arr[0]["dir"]; // asc or desc
        $searchValue = $search_arr["value"]; // Search value
        \Session::put("key", $searchValue);

        // for user only filter

        // $status=0;
        // if($_GET['status'] != ""){
        //    $status=$_GET['status'];
        // }

        // Fetch records
        $records = \DB::table("schedulesession")
            ->leftjoin(
                "trainer",
                "trainer.id",
                "=",
                "schedulesession.trainerId"
            )

            ->select("schedulesession.*", "trainer.name as name")
            ->where(function ($query) use ($searchValue) {
                $query
                    ->orwhere("trainer.name", "like", "%" . $searchValue . "%")
                    ->orwhere(
                        "schedulesession.product",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "schedulesession.companyName",
                        "like",
                        "%" . $searchValue . "%"
                    )
                    ->orwhere(
                        "schedulesession.customerName",
                        "like",
                        "%" . $searchValue . "%"
                    );
                //->orwhere('schedulesession.date', 'like', '%' .$searchValue . '%')

                //->orWhere('ticket.status', 'like', '%' .$searchValue . '%');
            });

        if ($_GET["startDate"] != "" && $_GET["endDate"]) {
            $startDate = date("Y-m-d", strtotime($_GET["startDate"]));
            $endDate = date("Y-m-d", strtotime($_GET["endDate"]));
            $records = $records->whereBetween("schedulesession.date", [
                $startDate,
                $endDate,
            ]);
        }

        if ($request->type != "") {
            // echo $request->type;die;
            if ($request->type == 1) {
                // echo 'sda';
                $records = $records
                    ->whereNull("schedulesession.trainerType")
                    ->orWhereIn("schedulesession.trainerType", [1]);
            } else {
                $records = $records->where(
                    "schedulesession.trainerType",
                    $request->type
                );
            }
        }

        if ($request->trainer != "") {
            // echo $request->trainer;die;

            $records = $records->where("trainer.id", $request->trainer);
        }

        if ($request->product != "") {
            $p = $request->product;
            $records = $records->whereRaw(
                'find_in_set("' . $p . '",`schedulesession`.`product`)'
            );
        }

        $recordsr = $records->count();
        $records = $records
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();
        //$recordsr= $records->count();

        $totalRecordswithFilter = $recordsr;
        $totalRecords = $totalRecordswithFilter;
        //echo count($records);die;
        $data_arr = [];
        //echo '<pre>';print_r($records);die;
        foreach ($records as $record) {
            //echo '<pre>';print_r($record);die;

            if (
                $record->trainerType == 1 ||
                $record->trainerType == "" ||
                $record->trainerType == 0
            ) {
                $tt = "Training";
            } elseif ($record->trainerType == 2) {
                $tt = "Onsite";
            } elseif ($record->trainerType == 4) {
                $tt = "Public Holiday";
            } elseif ($record->trainerType == 5) {
                $tt = "On Leave";
            } else {
                $tt = "Demo";
            }

            //$tt=$record->trainerType;

            $customerName = $record->customerName;
            if ($record->checkStatus == 1) {
                $customerName = $record->companyName;
            }

            $data_arr[] = [
                "id" => $record->id,
                "name" => $record->name,
                "customerName" => $customerName,
                "product" => $record->product,
                "trainerType" => $tt,

                "date" => date("d-m-Y", strtotime($record->date)),
                "starttime" => $record->startTime,
                "endtime" => $record->endTime,
            ]; /*$data_arr[] = array(
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

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        ];

        echo json_encode($response);
        exit();
    }

    public function scheduleEdit($id)
    {
        $this->data["edit"] = ScheduleSession::where("id", $id)->first();
        $this->data["trainers"] = Trainer::get();

        return view("admin.scheduling.edit", $this->data);
    }

    public function updateschedulesession($id, Request $request)
    {
        // dd($request->all());
        $update = ScheduleSession::where("id", $id)->first();
        if ($update->companyName == "") {
            $update->customerName = $request->companyName;
        } else {
            $update->companyName = $request->companyName;
        }
        $update->trainerId = $request->trainerId;
        $update->date = date("Y-m-d", strtotime($request->datetimes));
        $update->startTime = date("H:i:s", strtotime($request->startTime));
        $update->endTime = date("H:i:s", strtotime($request->endTime));
        $update->remark = $request->remark;
        $update->product = $request->Product;
        $update->trainerType = $request->trainerType;
        $update->save();

        return redirect("app/scheduling")->withErrors([
            "Success",
            "You have successfully Updared !!!",
        ]);
    }

    public function getOname(Request $request)
    {
        $oname = $request->oname;
        //$oname= 'international';

        $records = Ictran::where(
            "Organization_Name",
            "like",
            "%" . $oname . "%"
        )
            ->orderBy("Due_date", "desc")
            ->whereDate("Due_date", "> ", date("Y-m-d"))
            ->get();

        $perm = Helper::checkPermission();
        $read = 0;
        if (in_array("contract_due_date", $perm)) {
            $read = 1;
        }
        ?>
     
    <?php
    $oData = [];
    $is1 = "";
    foreach ($records as $key => $record) {

        if ($key == 0) {
            $is1 = $record->id;
        }

        if ($read == 0) {
            $exp = date("Y", strtotime($record->Due_date));
        } else {
            $exp = date("d-m-Y", strtotime($record->Due_date));
        }

        $product = Product::whereIn("id", explode(",", $record->product))
            ->get()
            ->pluck("title")
            ->toArray();

        $productName = implode(",", $product);
        //echo '<pre>';print_r(implode(',',$product));die;

        $oData[$key]["id"] = $record->id;
        $oData[$key]["Organization_Name"] = $record->Organization_Name;
        $oData[$key]["exp"] = $exp;
        $oData[$key]["productName"] = $productName;
        ?>

      
      
<?php
    }

    $array = ["is1" => $is1, "oData" => $oData];

    echo json_encode($array);
    }

    public function getcustInfo(Request $request)
    {
        $oname = $request->oname;
        //$oname= 'international';
        //dd($request->q);

        $data = [];
        if ($request->q != "") {
            $records = Cust::where(
                "Organization_Name",
                "like",
                $request->q . "%"
            )->get();

            foreach ($records as $key => $record) {
                $data[]["custid"] = $record->Organization_Number;
                $data[$key]["Organization_Name"] =
                    $record->Organization_Name .
                    "-" .
                    $record->Organization_Number;
            }
        }

        //$data= ['id'=>1,'name'=>'rahul'];

        echo json_encode($data);
    }

    public function getInfo1(Request $request)
    {
        $all = $request->all();
        $info = Ictran::where("id", $all["id"])->first();

        $custInfo = Cust::where("Organization_Number", $info->CUSTNO)->first();

        echo json_encode($custInfo);
    }

    public function getcustInfo2(Request $request)
    {
        $all = $request->all();

        //echo $all['CUSTNO'];die;
        $custInfo = Cust::where("Organization_Number", $all["CUSTNO"])->first();

        echo json_encode($custInfo);
    }
}
