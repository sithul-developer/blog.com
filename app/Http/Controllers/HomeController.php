<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Posts;
use App\Models\Promotionals;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class HomeController extends Controller
{
    //
    public function index(Request $request)
    {/* increment */
      /*   Posts::query()->increment('views'); */

        $getPosts = Posts::where("Is_deleted" , 0)
        ->where('status' ,0)
        ->where('category_id',3)
        ->orderBy('id' ,'DESC' )->latest()->paginate(5); 
        return view('home_master.content' , compact('getPosts'));
       
    }

/*  */
    public function  Article($id)
    {
        $articleId = decrypt($id);
        $data['header_title'] = 'article';
        $article = Posts::findOrFail($articleId);
        $article->incrementViewsCount();
    /*     dd($article); */
        return view('home_master.article', $data, ['article'=>$article] );
    }
    



}
