<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permission.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);
        $role = $request->only([
            'name'
        ]);
        Role::create($role);
        return redirect()->route('role.index')->with('status', 'Role create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('role-permission.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'name'
        ]);
        $role = Role::find($id)->update($data);
        
        return redirect()->route('role.index')->with('status', 'Role update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with('delete', 'Role deleted successfully');
    }

    public function givePermissionToRole($id)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($id);

        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id');

        return view('role-permission.role.givePermission', compact('role', 'permissions','rolePermissions'));
    }
    public function updatePermissionToRole(Request $request, $id)
    {
        $permissions = $request->only([
            'permission'
        ]);

        $role = Role::findOrFail($id);
        $role->syncPermissions($permissions);

        return redirect()->back()->with('status', 'Permission added to role');
    }
}
