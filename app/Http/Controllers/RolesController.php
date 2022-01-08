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
        $userRoles = User::with('roles')->get();
        $users = User::whereNotNull('email_verified_at')->get();
        return view('roles.index', compact('roles', 'users', 'userRoles'));
    }

    public function store(Request $request)
    {
        $user = User::where('name', $request['user'])->get();
        $user[0]->assignRole($request['role']);
        return redirect()->route('roles.index');
    }

    public function destroy(Request $request)
    {
        $user = User::where('name', $request['user'])->get();
        $user[0]->removeRole($request['role']);
        return redirect()->route('roles.index');
    }

}
