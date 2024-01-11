<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    //
    public function index_prices()
    {
        //
        $prices = Price::where('Is_deleted', 0)->latest()->paginate(10); 
        $data['active_class'] = 'Price';
        return view('backend_master.price.index', $data,  compact('prices'));
    }
    public function  create_prices()
    {
        //
        $data['active_class'] = 'Price';
        return view('backend_master.price.create' ,$data);
    }
    public function store_prices(StorePriceRequest $request)
    {

        DB::beginTransaction();

        try {
            $prices = new Price();
            $prices->product_name = $request->input('product_name');
            $prices->compay_name = $request->input('compay_name');
            $prices->order = $request->input('order');
            $prices->time_effect = $request->input('time_effect');
            $prices->price_usd = $request->input('price_usd');
            $prices->price_khr = $request->input('price_khr');

            DB::commit();
            $prices->save();
            return redirect('/panel/dashboard/prices')->with('success', "User added successfully!");
        } catch (\Exception $e) {

            DB::rollback();
            return redirect()->back()->with('error', "User added successfully!");
        }
    }
    public function edit_prices($id)
    {
        $data['active_class'] = 'Price';
        
        $price = Price::find($id);
        return view('backend_master.price.edit',$data, compact('price'));
    }

    public function update_prices(StorePriceRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $prices = Price::findOrFail($id);
            $prices->product_name = $request->input('product_name');
            $prices->compay_name = $request->input('compay_name');
            $prices->order = $request->input('order');
            $prices->time_effect = $request->input('time_effect');
            $prices->price_usd = $request->input('price_usd');
            $prices->price_khr = $request->input('price_khr');

            $prices->save();
            DB::commit();
            return redirect('/panel/dashboard/prices')->with('success', 'Category update successfully!');
        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
    //destroy
    public function delete_prices(Request $request)
    {
        DB::beginTransaction();
        try {
            $price = $request->input('price');
            $price = Price::find($price);
            $price->Is_deleted = 1;

            $price->save();
            DB::commit();
            return redirect()->back()->with('success', ' Category is delete successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', ' Category is delete successfully!');
        }
    }

    public function view_course_category($id)
    {
        $course_category = Price::find($id);
        $data['header_title'] = 'Edit User |';
        return view('backend_master.course_cate.view', $data, compact('course_category',));
    }
}
