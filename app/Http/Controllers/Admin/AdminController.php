<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users  = User::with('roles')->where('role_id', 2)->paginate(20);
        return view('pages.admin.index', compact('users'));
    }

    public function show($user_id)
    {
        $user  = User::with('shops')->find($user_id);
        return view('pages.admin.show', compact('user'));
    }

    public function edit($user_id)
    {
        $user  = User::with('shops')->find($user_id);
        return view('pages.admin.edit', compact('user'));
    }
}
