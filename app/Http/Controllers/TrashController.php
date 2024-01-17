<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class TrashController extends Controller
{
    /* Index trash */
    public function index_trash()
    {
        $users = User::where('Is_deleted', 1)->get();
        $category = Category::where('Is_deleted', 1)->get();
        $permission = Permission::where('Is_deleted', 1)->get();
        $posts = Posts::where('Is_deleted', 1)->get();
        $data['active_class'] = 'Trash';
        return view("backend_master.trash.index", $data, ['posts' => $posts, "users" => $users, "category" => $category,  'permission' => $permission]);
    }

    /* Category Delete */
    public function delete_cate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with("success", "Cagegory is delete successfully!'");
    }
    public function restor_cate(Request $request)
    {
        try {
            $cate_id = $request->input('category_id');
            $cate_id = Category::findOrFail($cate_id);
            $cate_id->Is_deleted = 0;
            $cate_id->save();
            return redirect()->back()->with('success', ' Category is restore successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ' Category is unrestore successfully!');
        }
    }

    /* User Delete*/
    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with("success", "User is delete successfully!'");
    }
    public function restore_user(Request $request)
    {
        try {
            $user_id = $request->input('user_id');
            $user_id = User::findOrFail($user_id);
            $user_id->Is_deleted = 0;
            $user_id->save();
            return redirect()->back()->with('success', ' User is restore successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ' User is unrestore successfully!');
        }
    }


    /* Permission​ Delele ​*/
    public function delete_per($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return back()->with('success', ' Permission is delete successfully!');
    }
    public function restore_per(Request $request)
    {
        try {
            $per_id = $request->input('per_id');
            $per_id = Permission::findOrFail($per_id);
            $per_id->Is_deleted = 0;
            $per_id->save();
            return redirect()->back()->with('success', ' Permission is restore successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ' Permission is unrestore successfully!');
        }
    }


    /*   Posts Delete */
    public function delete_post($id)
    {
        $posts = Posts::findOrFail($id);
        $posts->delete();
        return back()->with('success', 'Post is delete successfully!');
    }
    public function restore_post(Request $request)
    {
        try {
            $post_id = $request->input('post_id');
            $post_id = Posts::findOrFail($post_id);
            $post_id->Is_deleted = 0;
            $post_id->save();
            return redirect()->back()->with('success', ' Posts is restore successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ' Posts is unrestore successfully!');
        }
    }
}
