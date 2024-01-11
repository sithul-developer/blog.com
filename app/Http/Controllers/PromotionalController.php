<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionalRequest;
use App\Http\Requests\UpdatePromotionalRequest;
use App\Models\Category;
use App\Models\Promotionals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PromotionalController extends Controller
{
    //
    //
    public function CurseSearch(Request $request)
    {
        $search = $request->input('search');
        // Perform a search using Eloquent
        $courses = Promotionals::where('name', 'like', "%$search%")
            /* ->orWhere('content', 'like', "%$search%") */
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();

        // Pass the results to a view
        return view('backend_master.courses.index', ['courses' => $courses]);
    }
    public function index_promotional()
    {
            /* $courses = Promotional::where('Is_deleted', 0)->get() */;
        $categories = Category::where('Is_deleted', 0)->get();
        $promotionals = Promotionals::where('Is_deleted', 0)->latest()->paginate(5); /* ::where('Is_deleted', 0)->get() */;
        $data['active_class'] = 'Promotional';
        return view('backend_master.promotional.index', $data, ['promotionals' => $promotionals, 'categories' => $categories]);
    }
    public function create_promotional()
    {
        $promotional = Promotionals::where('Is_deleted', 0)->get();
        $data['active_class'] = 'Promotional';
        return view('backend_master.promotional.create',  $data, ['promotional' => $promotional]);
    }

    // store
    public function  store_promotional(StorePromotionalRequest $request)
    {

        DB::beginTransaction();
        try {
            $promotional = new Promotionals();
            $promotional->title = $request->input('title');
            $promotional->order = $request->input('order');
            $promotional->options = $request->input('options');

            if (!empty($request->file('image'))) {
                $image  = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->storeAs('/public/media/', $filename);
                $promotional->image = $request->file('image')->getClientOriginalName();
            }
            /*      dd($request->all()); */
            /*  return redirect()->back()->withSuccess('You have successfully upload image.')->with('image',$imageNams); */



            $promotional->save();
            DB::commit();
            return redirect('/panel/dashboard/promotional')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            /*    DB::rollback();
             return redirect()->back()->with('error', "User added successfully!"); */

            dd($e->getMessage());
        }
    }

    public function edit_promotional($id)
    {
        $promotional = Promotionals::find($id);
        $data['active_class'] = 'Promotional';
        return view('backend_master.promotional.edit', $data, ['promotional' => $promotional]);
    }
    public function update_promotional(UpdatePromotionalRequest $request, $id)
    {
        //update
        DB::beginTransaction();
        try {
            $promotional = Promotionals::findOrFail($id);
            $promotional->title = $request->input('title');
            $promotional->order = $request->input('order');
            $promotional->options = $request->input('options');

            if ($request->has('image')) {
                $request->validate([
                    'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
                ]);
                if ($promotional->image) {
                    Storage::delete('/public/media/' . $promotional->image);
                }
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->storeAs('/public/media/', $filename);
                $promotional->image = $request->file('image')->getClientOriginalName();
            }
            $promotional->save();
            /*     dd($request->all()); */
            DB::commit();
            return redirect('/panel/dashboard/promotional')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }


    public function delete_promotional(Request $request)
    {
        $promotional_id = $request->input('promotional');
        $promotional_id = Promotionals::findOrFail($promotional_id);
        $promotional_id->Is_deleted = 1;
        $promotional_id->save();
        return redirect()->back()->with('success', ' Category is delete successfully!');
    }

    public function disable($courseId)
    {

        $Courses = Promotionals::find($courseId);
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
