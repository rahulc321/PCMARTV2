<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconsController extends Controller
{
    //live icons
    public function liveIcons(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Icons"],["name" => "LivIcons"]
      ];
      return view('pages.icons-livicons',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
     //Box icons
     public function boxIcons(){
      $pageConfigs = ['pageHeader' => true];

      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Icons"],["name" => "Boxicons"]
      ];
      return view('pages.icons-boxicons',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
}
