<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');

    }


    //ecommerce
    public function dashboardEcommerce(){
    	if(\Auth::user()->is_active!=1){
    		return redirect('/admin');
    	}
        return view('pages.dashboard-ecommerce');
    }
    // analystic
    public function dashboardAnalytics(){
        return view('pages.dashboard-analytics');
    }
}
