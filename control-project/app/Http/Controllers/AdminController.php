<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('admin.index', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
            'role'     => ['required', 'in:admin,user'],
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'role'  => ['required', 'in:admin,user'],
        ]);

        $user->update(['name' => $request->name, 'email' => $request->email, 'role' => $request->role]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', Password::min(6)],
            ]);
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
