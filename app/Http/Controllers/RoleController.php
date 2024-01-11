<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        /*          $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]); */
        /*    $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]); */
    }


    public function index()
    {
        $data['active_class'] = 'Role'; 
        $roles = Role::orderBy('id', 'DESC')->where('Is_deleted', 0)->paginate(7);
        return view('backend_master.users.role.index', $data, compact('roles'));
    }


    public function create()
    {

        $permissions = Permission::get();
        $data['active_class'] = 'Role'; 

        return view('backend_master.users.role.create',$data, compact('permissions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect('/panel/dashboard/role')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }


    public function edit($id)
    {
        $data['active_class'] = 'Role'; 

        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('backend_master.users.role.edit',$data, compact('role', 'permissions', 'rolePermissions'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect('/panel/dashboard/role')
            ->with('success', 'Role updated successfully.');
        /*   dd($request->all()); */
    }


    public function delete(Request $request)
    {
        $role_id = $request->input('role');
        $role_id = Role::findOrFail($role_id);
        $role_id->Is_deleted = 1;
        $role_id->save();
        return back()->with('success', ' Category is delete successfully!');
    }

      public function destroy($id)
    {
        Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
