<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\Notifikasi;
// use App\Http\Controllers\Str;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


class AuthController extends Controller
{

    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginproses(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ], [
            'email.required' => 'email tidak boleh kosong',
            'email.exists' => 'email tidak terdaftar',
            'email.email' => 'silahkan masukan email yang valid',
            'password' => 'Password yang anda masukan salah',
        ]);

        $infologin = $request->only('email', 'password');

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            // dd($user);
            if ($user->role === 'user') {
                return redirect()->route('Home.index', ['id' => $user->id])->with('success', 'Anda Berhasil Login');
            }
        } else {
            return redirect()->back()->with('error', 'Akun Tidak Ditemukan');
        }
        return redirect()->route('login')->with('error', 'Email Atau Kata Sandi Yang Anda Masukan Salah');
    }


    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'berhasil logout');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function createregis(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            're-password' => 'required|same:password',
            'username' => 'required|max:25',
            'alamat' => 'required|max:225'
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.unique' => 'Nama sudah digunakan.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            're-password.required' => 'Konfirmasi password harus diisi.',
            're-password.same' => 'Konfirmasi password tidak cocok dengan password.',
            'username.required' => 'Username tidak boleh kosong.',
            'username.max' => 'Username melebihi 25 kata.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
            'alamat.max' => 'Alamat melebihi 225 kata.',
        ]);

        // $user  = $request->all();
        // $user['password'] = Hash::make($user['password']);
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ];
        // dd('sad');
        User::create($user);
        // return view('auth.guru');

        return redirect()->route('login')->with('success', 'Anda Berhasil Registrasi');
    }
}
