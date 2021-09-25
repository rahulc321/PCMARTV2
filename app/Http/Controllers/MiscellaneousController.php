<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
  //Coming Soon
  public function comingSoonPage(){
    $pageConfigs = ['bodyCustomClass'=> 'bg-full-screen-image'];
    return view('pages.page-coming-soon',['pageConfigs' => $pageConfigs]);
  }
  //404 error
  public function error404Page(){
    $pageConfigs = ['bodyCustomClass'=> 'bg-full-screen-image'];
    return view('pages.error-404',['pageConfigs' => $pageConfigs]);
  }
   //500 error
   public function error500Page(){
    $pageConfigs = ['bodyCustomClass'=> 'bg-full-screen-image'];
    return view('pages.error-500',['pageConfigs' => $pageConfigs]);
  }
  //not Authorized
  public function notAuthPage(){
    $pageConfigs = ['bodyCustomClass'=> 'bg-full-screen-image'];
    return view('pages.page-not-authorized',['pageConfigs' => $pageConfigs]);
  }
  //Maintenance
  public function maintenancePage(){
    $pageConfigs = ['bodyCustomClass'=> 'bg-full-screen-image'];
    return view('pages.page-maintenance',['pageConfigs' => $pageConfigs]);
  }
}
