<?php

namespace App\Http\Controllers;

use App\Models\likefoto;
use App\Models\foto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikefotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function Liked($fotoId)
    {
        $liked = likefoto::where('post_id', $fotoId)->where('user_id', Auth::user()->id)->exists();

        return  $liked;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $cek = Likefoto::where('user_id', Auth::user()->id)->where('foto_id', $id)->count();

        if ($cek >= 1) {
            // Jika pengguna sudah menyukai foto ini, hapus data like
            likefoto::where('user_id', Auth::user()->id)->where('foto_id', $id)->delete();
        } else {
            // Jika pengguna belum menyukai foto ini, tambahkan data like
            likefoto::create([
                'user_id' => Auth::user()->id,
                'foto_id' => $id
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(likefoto $likefoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(likefoto $likefoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, likefoto $likefoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(likefoto $likefoto)
    {
        //
    }
}
