<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $userList = User::latest()->get();
        return view('user', compact('userList'));
    }

    public function create()
    {
        return view('user-create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // hash password baru

        User::create($data);

        return redirect()->route('user')
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();

        if (empty($data['password'])) {
            unset($data['password']); // kalau kosong, jangan diubah
        } else {
            $data['password'] = Hash::make($data['password']); // hash password baru
        }

        $user->update($data);
        return redirect()->route('user')
            ->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')
            ->with('success', 'User berhasil dihapus!');
    }
}