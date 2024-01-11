<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Courses;
use App\Models\User;
use App\Models\Videos;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class TrashController extends Controller
{
    //

    public function index_trash()
    {
        $users = User::where('Is_deleted', 1)->get();
        $category = Category::where('Is_deleted', 1)->get();
        $permission = Permission::where('Is_deleted', 1)->get();
        $data['active_class'] = 'Trash';
        return view("backend_master.trash.index", $data, [ "users"=>$users, "category" => $category,  'permission' => $permission]);
    }

    //
    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        // redirect to route
        return redirect()->back()->with("success", " dfd");
    }
    //
   
//
public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // redirect to route
        return redirect()->back()->with("success", " dfd");
    }

    //
    public function delete_per( $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return back()->with('success', ' Category is delete successfully!');
    }
}
