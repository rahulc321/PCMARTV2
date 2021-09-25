<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
  //Basic Tables
  public function basicTable(){
    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["name" => "Bootstrap Tables"]
    ];
    return view('pages.table',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
    //extended table
    public function extendedTable(){
      $pageConfigs = ['pageHeader' => true];
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["name" => "Bootstrap Tables Extended"]
      ];
      return view('pages.table-extended',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //datatable
   public function dataTable(){
    $pageConfigs = ['pageHeader' => true];
    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["name" => "Datatable"]
    ];
    return view('pages.table-datatable',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
}
