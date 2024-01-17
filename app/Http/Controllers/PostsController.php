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
    public function SearchPost(Request $request)
    {
        $search = $request->input('search');
        $posts = Posts::where('sub_title', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->latest()->paginate(10);
        $data['active_class'] = 'Post';
        return view('backend_master.posts.index', $data, ['posts' => $posts]);
    }
    public function index_posts()
    {
            //
            /* $courses = Posts::where('Is_deleted', 0)->get() */;
        /*    $data['active_class'] = 'post'; */
        $categories = Category::where('Is_deleted', 0)->get();
        $posts = Posts::where('Is_deleted', 0)->latest()->paginate();
        $data['active_class'] = 'Post';
        return view('backend_master.posts.index', $data, ['posts' => $posts, 'categories' => $categories]);
    }
    public function create_posts()
    {
        $categories = Category::where('Is_deleted', 0)->get();

        $data['active_class'] = 'Post';
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

           
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $originalImagePath = $posts->image;
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage//media/'), $filename);
                $posts->image = $filename;
            }
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
       
    }


    public function edit_posts($id)
    {
        $categories = Category::all();
        $posts = Posts::find($id);
        $data['active_class'] = 'Post';

        return view('backend_master.posts.edit', $data, ['posts' => $posts, 'categories' => $categories]);
    }
    public function update_posts(UpdatePostsRequest $request, $id)
    {
        //update
        DB::beginTransaction();
        try {
            $posts = Posts::findOrFail($id);
            $posts->title = $request->input('title');
            $posts->sub_title = $request->input('sub_title');
            $posts->content = $request->input('content');
            $posts->description = $request->input('description');
            $posts->category_id = $request->input('category_id');


            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $originalImagePath = $posts->image;
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage//media/'), $filename);
                $posts->image = $filename;

                if ($originalImagePath && file_exists(public_path('storage//media/' . $originalImagePath))) {
                    unlink(public_path('storage//media/' . $originalImagePath));
                }
            }
            $posts->save();
            /*     dd($request->all()); */
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
        return redirect()->back()->with('success', ' Post is delete successfully!');
    }

    public function disable($postId)
    {

        $post = Posts::find($postId);
        if ($post) {
            if ($post->status) {
                $post->status = 0;
            } else {
                $post->status = 1;
            }
        }
        $post->save();
        return back();
    }
}
