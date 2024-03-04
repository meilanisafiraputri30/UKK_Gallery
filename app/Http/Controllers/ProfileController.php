<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Auth::user();
        return view('user.author', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg',
            // 'about' => 'required|max:225'
        ],[
            'name.required'=>'nama harus diisi',
            'username.required'=> 'username harus diisi',
            'profile.required' => 'profile harus di isi',
            'profile.image' => 'Foto harus berupa file gambar (jpeg, png, jpg)',
            // 'about.required'=> 'Data harus di isi',
            // 'about.max' => 'Data melebihi 225 kata',

        ]);

        if ($request->hasFile('profile')) {
            // Hapus foto lama jika ada
            if ($user->profile) {
                unlink(storage_path('app/public/' . $user->profile));
            }
            // Simpan profile baru
            $filePath = $request->file('profile')->store('profile', 'public');
            $user->profile = $filePath;
        }


        $user->name = $request->input('name');
        $user->username = $request->input('username');
        // $user->about= $request->input('about');
        $user->save();
        return redirect()->route('Profile')->with('success', 'Profile berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
