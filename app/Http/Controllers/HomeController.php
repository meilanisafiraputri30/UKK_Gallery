<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Likefoto;
use App\Models\foto;
use App\Models\album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Komentarfoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = Auth::user();
        $foto = Foto::with('owner')->find($id);
        $like = Likefoto::where('user_id', $user->id)->pluck('foto_id')->toArray();

        return view('user.home', compact('foto', 'user', 'like'));
    }


    public function mypost()
    {
        $userId = Auth::id();
        $foto = Foto::where('owner_id', $userId)->with('owner')->get();
        return view('user.mypost', compact('foto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tampilan($id)
    {
        $user = Auth::user();
        $foto = Foto::with('owner')->findOrFail($id);
        // dd($post->user);

        $posting = Foto::with('user')->get();
        $like = Likefoto::where('user_id', $user->id)->pluck('foto_id')->toArray();
        $Komentar = komentarfoto::where('foto_id', $foto->id)->orderBy('created_at', 'desc')->paginate(25);

        return view('user.post', compact('foto', 'Komentar', 'posting', 'user', 'like'));
    }

    public function folder()
    {
        $album = album::with('owner')->get();
        // $foto = foto::findOrFail($id);
        return view('user.folder', compact('album'));
    }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Home $home)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Home $home)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Home $home)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Home $home)
    // {
    //     //
    // }
}
