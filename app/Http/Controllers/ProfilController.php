<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function edit()
    {
        return view('profil.edit', [
            'user' => Auth::user(),
        ]);
    }

  public function update(Request $request)
{
    $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'no_hp'         => 'nullable|string|max:20',
        'tanggal_lahir' => 'nullable|date',
        'gender'        => 'nullable|in:Laki-laki,Perempuan',
        'alamat'        => 'nullable|string|max:500',
        'foto'          => 'nullable|image|max:2048',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    if ($request->hasFile('foto')) {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->foto = $request->file('foto')->store('profil', 'public');
    }

    $user->name          = $request->name;
    $user->email         = $request->email;
    $user->no_hp         = $request->no_hp;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->gender        = $request->gender;
    $user->alamat        = $request->alamat;
    $user->save();

    return redirect()->route('profil.edit')->with('success', 'Profil berhasil diperbarui.');
}
}
