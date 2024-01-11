<?php

namespace App\Http\Controllers;

use App\Models\Promotionals;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    //
    public function getFooter(Request $request)
    {
       /*  $footer = Promotionals::when("Is_deleted" , 0)
        ->where('order' , 2)->get(); */
        $getFooter = Promotionals::where("Is_deleted" , 0)->get();
        return view('home_master.footer.footer' , ['getFooter' => $getFooter ]);
    }
}
