<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel' => ['required', 'regex:/^\+998\d{9}$/'],
            'email' => 'required|email|unique:users',
            'manzili' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'Foydalanuvchi qo‘shildi.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'manzili' => 'required',
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'Foydalanuvchi yangilandi.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Foydalanuvchi o‘chirildi.');
    }
}
