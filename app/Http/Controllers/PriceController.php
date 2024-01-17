<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriceRequest;
use App\Imports\PricesImport;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PriceController extends Controller
{


    public function multiDelete(Request $request)
    {
        try {
            $selectedIds = $request->input('selected');
            Price::whereIn('id', $selectedIds)->delete();
            return redirect()->back()->with('success', 'Selected records deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ' Please review your selections and ensure all required checkboxes are checked.');
        }
    }
    //

    public function importExcel(Request $request)
    {
        try {
            $request->validate([
                'excel_file' => 'required|file|mimes:xlsx,csv'
            ]);
            Excel::import(new PricesImport, $request->file('excel_file'));
            return redirect()->back()->with('success', 'Data imported successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', ' Please review your selections and ensure all required checkboxes are checked.');
        }
    }
    //
    public function index_prices()
    {
        //
        $prices = Price::where('created_at', '>', Carbon::now()->subDays(10))->latest()->paginate();
        $data['active_class'] = 'Price';
        return view('backend_master.price.index', $data,  compact('prices'));
    }
    public function  create_prices()
    {
        //
        $data['active_class'] = 'Price';
        return view('backend_master.price.create', $data);
    }
    public function store_prices(StorePriceRequest $request)
    {
        DB::beginTransaction();
        try {
            $prices = new Price();
            $prices->product_name = $request->input('product_name');
            $prices->compay_name = $request->input('compay_name');
            $prices->time_effect = $request->input('time_effect');
            $prices->price_usd = $request->input('price_usd');
            $prices->price_khr = $request->input('price_khr');
            $prices->order_price = $request->input('order_price');

            DB::commit();
            $prices->save();
            return redirect('/panel/dashboard/prices')->with('success', "User added successfully!");
        } catch (\Exception $e) {

            DB::rollback();
            Excel::import(new PricesImport, $request->file('excel_file'));
            return redirect()->back()->with('success', 'Data imported successfully!');
        }
    }
    public function edit_prices($id)
    {
        $data['active_class'] = 'Price';
        $price = Price::find($id);
        return view('backend_master.price.edit', $data, compact('price'));
    }

    public function update_prices(StorePriceRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $prices = Price::findOrFail($id);
            $prices->product_name = $request->input('product_name');
            $prices->compay_name = $request->input('compay_name');
            $prices->time_effect = $request->input('time_effect');
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

   /*  public function view_course_category($id)
    {
        $course_category = Price::find($id);
        $data['header_title'] = 'Edit User |';
        return view('backend_master.course_cate.view', $data, compact('course_category',));
    } */
}
