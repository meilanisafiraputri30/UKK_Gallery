<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        $album = Album::with('owner')->get();
        return view('user.album', compact('album', 'auth'));
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
    public function store(Request $request)
    {
        try {
            $request->validate([
                'namaAlbum' => 'required|max:100',
                'deskripsi' => 'required|max:225',
            ], [
                'namaAlbum.required' => 'Wajib di isi',
                'namaAlbum.max' => 'Judul melebihi maximal',
                'deskripsi.required' => 'Wajib di isi',
                'deskripsi.max' => 'Deskripsi melebihi maximal',
            ]);

            Album::create([
                'owner_id' => Auth::user()->id,
                'namaAlbum' => $request->namaAlbum,
                'deskripsi' => $request->deskripsi,
                'tanggaldibuat' => now(),
            ]);

            return back()->with('success', 'Berhasil menambahkan data');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput()->with('error', 'Gagal menambahkan data. Terdapat kesalahan validasi. Silakan coba lagi.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, album $album, $id)
    {
        try {
            $request->validate([
                'namaAlbum' => 'required|max:100',
                'deskripsi' => 'required|max:225',
            ], [
                'namaAlbum.required' => 'Wajib di isi',
                'namaAlbum.max' => 'Judul melebihi maximal',
                'deskripsi.required' => 'Wajib di isi',
                'deskripsi.max' => 'Deskripsi melebihi maximal',
            ]);

            $album = album::findOrFail($id);
            $album->namaAlbum = $request->namaAlbum;
            $album->deskripsi = $request->deskripsi;
            $album->tanggaldibuat = now();

            $album->save();

            return back()->with('success', 'Berhasil mengupdate data');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengupdate data. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(album $album)
    {
        $album->delete();
        return redirect()->back()->with('success', 'data berhasil di hapus');
    }
}
