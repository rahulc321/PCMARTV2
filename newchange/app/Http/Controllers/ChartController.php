<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
  //Apex chart
  public function apexChart(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Charts & Maps"],["name" => "Apex"]
    ];
    return view('pages.chart-apex',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  //chartjs chart
  public function chartJs(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Charts & Maps"],["name" => "Chartjs"]
    ];
    return view('pages.chart-chartjs',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  //Chartist chart
  public function chartist(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Charts & Maps"],["name" => "Chartist"]
    ];
    return view('pages.chart-chartist',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  //Map
  public function leafletMap(){
    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Maps"],["name" => "Leaflet Maps"]
    ];
    return view('pages.maps-leaflet',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
}
