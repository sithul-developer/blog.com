<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index_category()
    {
        //
        $category = Category::where('Is_deleted', 0)->get();
        $data['active_class'] = 'Category';
        return view('backend_master.category.index',$data, compact('category'));
    }
    public function  create_category()
    {
        //
        $data['active_class'] = 'Category';
        return view('backend_master.category.create' ,$data);
    }
    public function store_category(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            $category = new Category();
            $category->name = trim($request->name);
            $category->description = trim($request->description);
            $category->save();
            DB::commit();
            return redirect('/panel/dashboard/category')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            $request->validate([
                'name' => 'required',
                'description' => 'required',

            ]);
            return redirect()->back()->with('error', "User added successfully!");
        }
    }
    public function edit_category($id)
    {
        $data['active_class'] = 'Category';


        $category = Category::find($id);
        return view('backend_master.category.edit',$data, compact('category'));
    }

    public function update_category(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();
            DB::commit();
            return redirect('/panel/dashboard/category')->with('success', 'Category update successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
      /*   dd($request->all()); */
    }
     //destroy
     public function delete_category(Request $request)
     {

         $category_id = $request->input('Courses_Category');
         $category_id = Category::find($category_id);
         $category_id->Is_deleted = 1;
         $category_id->save();
         return redirect()->back()->with('success', ' Category is delete successfully!');
     }

     public function view_category($id)
     {
         $category = Category::find($id);
         $data['header_title'] = 'Edit User |';
         return view('backend_master.category.view', $data, compact('category', ));
     }




}
