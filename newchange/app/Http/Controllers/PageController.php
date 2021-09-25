<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  //Basic Tables
  public function userProfilePage(){
    $pageConfigs = ['bodyCustomClass' => 'menu-collapsed'];

    return view('pages.page-user-profile',['pageConfigs'=>$pageConfigs]);
  }
  //Page FAQ
  public function faqPage(){

    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Pages"],["name" => "FAQ"]
    ];
    return view('pages.page-faq',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  //Page Knowledge Base
  public function knowledgeBasePage(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Pages"],["name" => "Knowledge-base"]
    ];
    return view('pages.page-knowledge-base',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
    //Page Knowledge Base
    public function knowledgeCatPage(){

      $pageConfigs = ['pageHeader' => true];
  
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Pages"],["link" => "page-knowledge-base", "name" => "Knowledge Base"],["name" => "Categories"]
      ];
      return view('pages.page-knowledge-categories',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
       //Page Knowledge Base
       public function knowledgeQuestionPage(){

        $pageConfigs = ['pageHeader' => true];
    
        $breadcrumbs = [
          ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Pages"],["link" => "page-knowledge-base", "name" => "Knowledge Base"],["link" => "page-knowledge-base/categories", "name" => "Categories"],["name" => "Question"]
        ];
        return view('pages.page-knowledge-question',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
      }
      //Page search
      public function searchPage(){

      $pageConfigs = ['pageHeader' => true];
  
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Pages"],["name" => "Search"]
      ];
      return view('pages.page-search',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
     //Page account setting
     public function accountSettingPage(){

      $pageConfigs = ['pageHeader' => true];
  
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Pages"],["name" => "Account Settings"]
      ];
      return view('pages.page-account-settings',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
}
