<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function upload(Request $request)
    {

        if ($request->hasFile('upload')) {
            $originName = optional($request->file('upload'))->getClientOriginalName();
            // $originName =  $request->file('upload'->getClientOriginalName());
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('/public/media/'), $fileName);
            $url = asset('/public/media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
        /* =================End_function_upload_photo_for_CkEdit5=============t*/
    }
    //
    /*  public function CurseSearch(Request $request)
    {
        $search = $request->input('search');
        // Perform a search using Eloquent
        $courses = Posts::where('name', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();

        // Pass the results to a view
        return view('backend_master.courses.index', ['courses' => $courses]);
    } */
    public function index_posts()
    {
            //
            /* $courses = Posts::where('Is_deleted', 0)->get() */;
     /*    $data['active_class'] = 'post'; */
        $categories = Category::where('Is_deleted', 0)->get();
        $posts = Posts::where('Is_deleted', 0)->latest()->paginate(6);;
        $data['active_class'] = 'Post' ;
        return view('backend_master.posts.index', $data, ['posts' => $posts, 'categories' => $categories]);
    }
    public function create_posts()
    {
        $categories = Category::where('Is_deleted', 0)->get();

        $data['active_class'] = 'Post' ;
        return view('backend_master.posts.create',  $data, ['categories' => $categories]);
    }

    // store
    public function  store_posts(StorePostsRequest $request)
    {

        DB::beginTransaction();
        try {


            $posts = new Posts();
            $posts->title = $request->input('title');
            $posts->sub_title = $request->input('sub_title');
            $posts->content = $request->input('content');
            $posts->description = $request->input('description');
            $posts->category_id = $request->input('category_id');

            if (!empty($request->file('image'))) {
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->storeAs('/public/media/', $filename);
                $posts->image = $request->file('image')->getClientOriginalName();
            }
            /*   dd($request->all()); */
            $posts->save();
            DB::commit();
            return redirect('/panel/dashboard/posts')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            if (empty($request->file('image'))) {
                return redirect()->back()->with('error', "Invalid image format. Please upload a JPEG, PNG, or GIF file.");
            }
            return redirect()->back()->with('error', "oops something went worng.please try again later!");
        }
        /*   $product = new Posts($request->all());
        dd($product); // Inspect the created product object
        return  view('backend_master.posts.index');
        */
    }


    public function edit_posts($id)
    {
        $categories = Category::all();
        $posts = Posts::find($id);
        $data['active_class'] = 'Post' ;

        return view('backend_master.posts.edit', $data, ['posts' => $posts, 'categories' => $categories]);
    }
    public function update_posts(UpdatePostsRequest $request, $id)
    {
        //update
        DB::beginTransaction();
        try {
            /*   $request->validate([
                'title' => 'required|max:191',
                'description' => 'required|max:191',
                'prices' => 'required|nullable|numeric',
                'name' => 'required|nullable|string',

            ]); */

            $posts = Posts::findOrFail($id);
            $posts->title = $request->input('title');
            $posts->sub_title = $request->input('sub_title');
            $posts->content = $request->input('content');
            $posts->description = $request->input('description');
            $posts->category_id = $request->input('category_id');

            if ($request->has('image')) {
                $request->validate([
                    'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
                ]);
                if ($posts->image) {
                    Storage::delete('media/' . $posts->image);
                } else {
                    $image = $request->file('image');
                    $filename = $image->getClientOriginalName();
                    $image->storeAs('/public/media/', $filename);
                    $posts->image = $request->file('image')->getClientOriginalName();
                }
            }
            $posts->save();
            /*    dd($request->all()); */
            DB::commit();
            return redirect('/panel/dashboard/posts')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }


    public function delete_posts(Request $request)
    {
        $post_id = $request->input('posts');
        $post_id = Posts::findOrFail($post_id);
        $post_id->Is_deleted = 1;
        $post_id->save();
        return redirect()->back()->with('success', ' Category is delete successfully!');
    }

    public function disable($courseId)
    {

        $Courses = Posts::find($courseId);
        if ($Courses) {
            if ($Courses->status) {
                $Courses->status = 0;
            } else {
                $Courses->status = 1;
            }
        }
        $Courses->save();
        return back();
    }
}
