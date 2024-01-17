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
    public function SearchPromo(Request $request)
    {
        $search = $request->input('search');
        $promotionals = Promotionals::where('order', 'like', "%$search%")
            ->orWhere('options', 'like', "%$search%")
          ->latest()->paginate(10);
            $data['active_class'] = 'Promotional';
        // Pass the results to a view
        return view('backend_master.promotional.index',$data, ['promotionals' => $promotionals]);
    }
    public function index_promotional()
    {
            /* $courses = Promotional::where('Is_deleted', 0)->get() */;
        $categories = Category::where('Is_deleted', 0)->get();
        $promotionals = Promotionals::where('Is_deleted', 0)
        ->orderBy('id', 'ASC')->latest()->paginate(7);
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

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $originalImagePath = $promotional->image;
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage//media/'), $filename);
                $promotional->image = $filename;
            }
              
            $promotional->save();
            DB::commit();
            return redirect('/panel/dashboard/promotional')->with('success', "User added successfully!");
        } catch (\Exception $e) {
               DB::rollback();
             return redirect()->back()->with('error', "User added successfully!");

           /*  dd($e->getMessage()); */
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

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $originalImagePath = $promotional->image;
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage//media/'), $filename);
                $promotional->image = $filename;

                if ($originalImagePath && file_exists(public_path('storage//media/' . $originalImagePath))) {
                    unlink(public_path('storage//media/' . $originalImagePath));
                }
            }
            $promotional->save();
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

    public function disable($promoId)
    {

        $promo = Promotionals::find($promoId);
        if ($promo) {
            if ($promo->status) {
                $promo->status = 0;
            } else {
                $promo->status = 1;
            }
        }
        $promo->save();
        return back();
    }
}
