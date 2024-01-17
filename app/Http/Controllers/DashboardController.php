<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['active_class'] = 'Dashboard';
        return view('backend_master.dashboard',$data);

    }
}
