<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function beranda()
    {
        $jumlah_user = User::count();
        $surat_masuk = SuratMasuk::count();
        $surat_keluar = SuratKeluar::count();
        return view('Administrator.beranda', compact('jumlah_user', 'surat_masuk', 'surat_keluar'));
    }
    public function pengaturan()
    {
        $users = User::all();
        return view('Administrator.pengaturan_page', compact('users'));
    }
    public function tambah_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'unique:users,username'],
            'name' => 'required',
            'email' => ['required', 'unique:users,email'],
        ]);


        if ($validator->fails()) {
            return redirect()->route('beranda')->with('failed', 'Masukan semua data')->withInput();
        }

        if (Auth::user()->hasRole('admin')) {
            $user = new User;
            $user->username = $request->username;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->email);
            $user->save();
            $user->attachRole($request->role);
        }
        return redirect()->route('pengaturan')->with('success', 'Data berhasil ditambbahkan');
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('Administrator.edit_user', compact('user'));
    }

    public function edit_user_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'name' => 'required',
            'email' => ['required'],
            'role' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->route('edit_user', $request->id)->with('failed', 'Masukan semua data')->withInput()->withErrors($validator);
        }

        $user = User::find($request->id);
        if (Auth::user()->hasRole('admin')) {
            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($user->hasRole('admin')) {
                $user->detachRole('admin');
            } else {
                $user->detachRole('user');
            }
            $user->attachRole($request->role);
        }
        return redirect()->route('pengaturan')->with('success', 'Data berhasil di ubah');
    }

    public function hapus_user($id){
        if (Auth::user()->hasRole('admin')) {
            User::find($id)->delete();
            return redirect()->back()->with('success', 'User berhasil di hapus');
        } else {
            return redirect()->route('login_view');
        }
    }
}
