<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index(Request $request)
    {
         $setting = Setting::where('Is_deleted', 0)
         ->orderBy('id', 'desc')->take(1)->get();
        $data['active_class'] = 'Setting';
        return view('backend_master.setting.index',  $data, ['setting' => $setting]);
    }
    public function store_setting(StoreSettingRequest $request)
    {
        DB::beginTransaction();
        try {
            $setting = new Setting();
            if ($request->hasFile('logo')) {
           
                $originalImagePath = $setting->logo;
                $logo = $request->file('logo');
                $filename = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('storage//media/'), $filename);
                $setting->logo = $filename;
                
                if ($originalImagePath && file_exists(public_path('storage//media/' . $originalImagePath))) {
                    unlink(public_path('storage//media/' . $originalImagePath));
                }
            }
            
            if ($request->hasFile('favaicon')) {
       
                $originalImagePath = $setting->favaicon;
                $favaicon = $request->file('favaicon');
                $filename = time() . '.' . $favaicon->getClientOriginalExtension();
                $favaicon->move(public_path('storage//media/'), $filename);
                $setting->favaicon = $filename;
                if ($originalImagePath && file_exists(public_path('storage//media/' . $originalImagePath))) {
                    unlink(public_path('storage//media/' . $originalImagePath));
                }
            }

          
            $setting->save();
            DB::commit();
            return redirect('/panel/dashboard/setting')->with('success', "User added successfully!");
        } catch (\Exception $e) {
  
            DB::rollback();
            return redirect()->back()->with('error', "User added successfully!");
        }
    }

}
