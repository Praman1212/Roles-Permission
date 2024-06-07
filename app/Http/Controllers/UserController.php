<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
        ]);
        
        $user = User::create($data);
        $user->syncRoles($request->roles);
        return redirect()->route('user.index')->with('status', 'User create successfully');
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
        $roles = Role::pluck('name','name')->all();
        $user = User::findOrFail($id);
        $userRole = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = $request->only([
            'name',
            'email',
        ]);
        $data['password'] = Hash::make($request->input('password'));
        $user->update($data);
        $user->syncRoles($request->roles);
        return redirect()->route('user.index')->with('status','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('delete','User delete successfully');
    }
}
