<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $userRolesPermissions = User::with('roles')->with('permissions')->get();
        $permissions = Permission::all();
        $users = User::whereNotNull('email_verified_at')->get();
        return view('roles.index', compact('roles', 'users', 'userRolesPermissions', 'permissions'));
    }

    public function store(Request $request)
    {
        $user = User::where('name', $request['user'])->get();
        if(isset($request['role']) && !empty($request['role']) && $request['role'] != 'Выбрать роль') {
            $user[0]->assignRole($request['role']);
        }
        if(isset($request['permissions']) && !empty($request['permissions']) && $request['permissions'] != 'Выбрать разрешение') {
            $user[0]->givePermissionTo($request['permissions']);
        }
        return redirect()->route('roles.index');
    }

    public function destroy(Request $request)
    {
        $user = User::where('name', $request['user'])->get();
        if(isset($request['role']) && !empty($request['role']) && $request['role'] != 'Выбрать роль') {
            $user[0]->removeRole($request['role']);
        }
        if(isset($request['permissions']) && !empty($request['permissions']) && $request['permissions'] != 'Выбрать разрешение') {
            $user[0]->revokePermissionTo($request['permissions']);
        }
        return redirect()->route('roles.index');
    }

}
