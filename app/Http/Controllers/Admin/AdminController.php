<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function create()
    {
        return view('pages.admin.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);
        return redirect()->route('admin.index')->with('message', '店舗管理者を登録しました');
    }

    public function edit($user_id)
    {
        $user  = User::with('shops')->find($user_id);
        return view('pages.admin.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user_id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::find($user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('admin.show', $user->id)->with('message', '店舗管理者を更新しました');
    }
}
