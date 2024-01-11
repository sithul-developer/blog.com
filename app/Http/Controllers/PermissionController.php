<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    function __construct()
    {
        /* $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]); */
        /*   $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]); */
    }


    public function index()
    {    $data['active_class'] = 'Permission'; 
        $permissions = Permission::where('Is_deleted', 0)->latest()->paginate(9); 
        return view('backend_master.permission.index', $data, ['permissions' => $permissions]);
    }


    public function create()
    {
        $data['active_class'] = 'Permission'; 
        $permissions = Permission::orderBy('id', 'DESC')->where('Is_deleted', 0)->paginate(7);
        return view('backend_master.permission.create ',$data, ['permissions' => $permissions]);
    }
    /* public function create_permission()
    {
        $permissions = Permission::orderBy('id', 'DESC')->where('Is_deleted', 0)->paginate(7);
        return view('backend_master.permission.create', ['permissions' => $permissions]);
    } */


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::create(['name' => $request->input('name')]);
        return redirect('/panel/dashboard/permission')->with('success', 'Permission created successfully.');
    }


    public function show($id)
    {
        $permission = Permission::find($id);

        return view('backend_master.permission.index ', compact('permission'));
    }


    public function edit($id)
    {
        $data['active_class'] = 'Permission'; 
        
        $permission = Permission::find($id);
        return view('backend_master.permission.edit',$data, compact('permission'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect('/panel/dashboard/permission')
            ->with('success', 'Permission updated successfully.');
    }

    public function delete(Request $request)
    {
        $permission_id = $request->input('permission');
        $permission_id = Permission::findOrFail($permission_id);
        $permission_id->Is_deleted = 1;
        $permission_id->save();
        return back()->with('success', ' Category is delete successfully!');
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permissions.index')
            ->with('success', 'Permission deleted successfully');
    }
}
