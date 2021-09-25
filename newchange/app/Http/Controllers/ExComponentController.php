<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExComponentController extends Controller
{
  // Alert Componenet
  public function avatarComponent(){

    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Extra Components"],["name" => "Avatar"]
    ];
    return view('pages.ex-component-avatar',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  // Chips Componenet
  public function chipsComponent(){

    $pageConfigs = ['pageHeader' => true];
    
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Extra Components"],["name" => "Chips"]
    ];
    return view('pages.ex-component-chips',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  // divider Componenet
  public function dividerComponent(){

    $pageConfigs = ['pageHeader' => true];
    
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Extra Components"],["name" => "Divider"]
    ];

    return view('pages.ex-component-divider',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
}
