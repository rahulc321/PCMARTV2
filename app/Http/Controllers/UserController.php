<?php
namespace Application\Controller;

use Application\Model\Product;
use Application\Packages\chat\Model\ChatMessage;
use Application\Packages\user\Model\User;
use MRPHPSDK\MRController\MRController;
use MRPHPSDK\MRDatabase\MRDatabase;
use MRPHPSDK\MRRequest\MRRequest;

class UserController extends AuthController{

	function __construct(){
		parent::__construct();
	}

	public function getAll(MRRequest $request){
		$page = 1;
		if($request->input("page") != "" && $request->input("page") > 1) {
			$page = $request->input("page");
		}

//		$users = User::where("status", "1")->orderBy("id", "DESC")->page($page)->get();
        $pageSize = 20;
        $users = MRDatabase::select("SELECT * FROM User WHERE status=1 AND firstName!='' AND lastName!='' AND address!='' LIMIT ".(($page - 1) * $pageSize).", $pageSize");
		$paging = User::paging("status=1 AND firstName!='' AND lastName!='' AND address!=''", $page);

		$this->loadPage("users", ["users"=>$users, "paging"=>$paging]);
	}

	public function getAds(MRRequest $request) {
		$params = $request->getUrlParams();
		if(isset($params[0]) && $params[0] != null) {
			$user = User::where("id", $params[0])->selectField(["id", "firstName", "lastName", "countryCode","mobile"])->first();
			$products = Product::where("userId", $params[0])->orderBy("id", "DESC")->get();
			$this->loadPage("ads", ["adsUser"=> $user, "products"=>$products]);
		} else {
			$this->redirect("/admin/webuser/all", [], "GET");
		}
	}

    /**
     * Enable / Disable the user
     *
     * @param MRRequest $request
     */
    public function getStatus(MRRequest $request)
    {
        $id = $request->input("id");
        $disable = $request->input("disable");
        if ($id > 0) {
            $user = User::where("id", $id)->first();
            $user->disable = ($disable == 1) ? 1 : 0;
            $user->save();

            $message = "User " . (($disable == 1) ? 'enabled' : 'disabled') . " successfully.";

            $_SESSION['flash_message'] =  $message;
            $this->redirect("/admin/webuser/all", [], "GET");
        } else {
            $_SESSION['flash_error'] =  "something went wrong";
            $this->redirect("/admin/webuser/all", [], "GET");

        }
    }

	public function getChatRooms(MRRequest $request) {
		$params = $request->getUrlParams();
		if(isset($params[0]) && $params[0] != null) {
			$userId = $params[0];
			$chatRoom = MRDatabase::select("SELECT id as chatRoomId, userId, toUserId FROM ChatRoom WHERE userId=".$userId." OR toUserId = ".$userId);
			$allChatRooms = [];
			foreach($chatRoom as $room) {
				if($room["userId"] != $userId) {
					$room["otherUser"] = User::where("id", $room["userId"])->selectField(["id as userId", "firstName", "lastName", "profileImage", "mobile"])->first();
				} elseif($room["toUserId"] != $userId) {
					$room["otherUser"] = User::where("id", $room["toUserId"])->selectField(["id as userId", "firstName", "lastName", "profileImage", "mobile"])->first();
				} else {
					continue;
				}

				unset($room["otherUser"]->updatedAt);

				$unread = MRDatabase::select("SELECT COUNT(id) as count FROM ChatMessage WHERE chatRoomId=".$room["chatRoomId"]." AND isRead=0 AND senderUserId != ".$userId);
				if(count($unread) > 0){
					$room["unreadCount"] = $unread[0]["count"];
				} else {
					$room["unreadCount"] = 0;
				}

				$room["lastMessage"] = ChatMessage::where("chatRoomId", $room["chatRoomId"])->orderBy("id", "DESC")->first();
				if($room["otherUser"] != null) {
					$allChatRooms[] = $room;
				}
			}
			$user = User::where("id", $params[0])->selectField(["id", "firstName", "lastName", "countryCode","mobile"])->first();
			$this->loadPage("chat", ["adsUser"=> $user, "rooms"=>$allChatRooms]);
		} else {
			$this->redirect("/webuser/all", [], "GET");
		}
	}

	public function getAllChat(MRRequest $request) {
		$params = $request->getUrlParams();
		if(isset($params[0]) && isset($params[1]) && $params[0] != null) {
			$chatRoomId = $params[0];
			$userId = $params[1];

			$query = "SELECT * FROM ChatRoom WHERE id=".$chatRoomId;
			$chatRoom = MRDatabase::select($query);

			if(count($chatRoom) <= 0) {
				$this->loadPage("allMessage", []); return;
			}

			$toUser = User::where("id", $chatRoom[0]["userId"])->selectField(["id as userId", "firstName", "lastName", "profileImage", "mobile"])->first();
			if($toUser->userId != $userId) {
				$otherUser = $toUser;
				$toUser = User::where("id", $chatRoom[0]["toUserId"])->selectField(["id as userId", "firstName", "lastName", "profileImage", "mobile"])->first();
			} else {
				$otherUser = User::where("id", $chatRoom[0]["toUserId"])->selectField(["id as userId", "firstName", "lastName", "profileImage", "mobile"])->first();
			}

			$unread = MRDatabase::select("SELECT COUNT(id) as count FROM ChatMessage WHERE chatRoomId=".$chatRoomId." AND isRead=0 AND senderUserId != ".$toUser->userId);
			if(count($unread) > 0){
				$unreadCount = $unread[0]["count"];
			} else {
				$unreadCount = 0;
			}

			$messages = ChatMessage::where("chatRoomId", $chatRoomId)->orderBy("id", "DESC")->get();

			$this->loadPage("allMessage", ["messages"=>$messages,"toUser"=>$toUser, "otheruser"=>$otherUser, "unreadCount"=>$unreadCount]);
		} else {
			$this->redirect("/webuser/all", [], "GET");
		}
	}

}
