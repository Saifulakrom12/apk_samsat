<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    // Menampilkan data user
    public function index() {
        $users = User::all();
        return view('layout.config.admin.user.index', compact('users'));
    }

    // Menampilkan formulir tambah user
    public function user_create() {
        return view('layout.config.admin.user.create');
    }

    // Menyimpan data user baru
    public function user_simpan(Request $request): RedirectResponse {
        $validator = \Validator::make($request->all(), [
            'nama'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name     = $request->nama;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan formulir edit user
    public function user_edit($id) {
        $user = User::findOrFail($id);
        return view('layout.config.admin.user.edit', compact('user'));
    }

    // Mengupdate data user
    public function user_update(Request $request, $id) {
        $user = User::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'nama'     => 'required',
            'email'    => 'required|email',
            'password' => 'nullable', // Password bersifat opsional
            'role'     => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user->name    = $request->nama;
        $user->email   = $request->email;
        $user->role    = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
