<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Posts;
use App\Models\Promotionals;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {/* increment */
        Posts::query()->increment('views');
        $getPosts = Posts::where("Is_deleted" , 0)->latest()->paginate(5); 
 
        return view('home_master.index' , compact('getPosts'));
       
    }


    public function  Article($id)
    {
        $data['header_title'] = 'Article';
        $article = Posts::findOrFail($id);
        $article->incrementViewsCount();
        return view('home_master.article', $data, ['article'=>$article] );
    }
    



}
