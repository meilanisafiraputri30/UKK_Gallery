<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::all();
        $foto = Foto::with('user')->get();
        return view('user.create', compact('foto', 'album'));
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
                'lokasifile' => 'required|image|mimes:jpeg,png,jpg',
                'judulfoto' => 'required|max:100',
                'deskripsifoto' => 'required|max:225',
            ], [
                'lokasifile.required' => 'Wajib di isi',
                'lokasifile.image' => 'Foto harus berupa file gambar (jpeg, png, jpg)',
                'judulfoto.required' => 'Wajib di isi',
                'judulfoto.max' => 'Judul melebihi maximal',
                'deskripsifoto.required' => 'Wajib di isi',
                'deskripsifoto.max' => 'Deskripsi melebihi maximal',
            ]);

            $image = $request->file('lokasifile');
            $path = 'foto';
            $imageName = $image->hashName();

            $image->storeAs($path, $imageName);

            foto::create([
                'owner_id' => Auth::user()->id,
                'album_id' => $request->album_id,
                'lokasifile' => $imageName,
                'judulfoto' => $request->judulfoto,
                'deskripsifoto' => $request->deskripsifoto,
                'tanggalUnggah' => now(),
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
    public function show(foto $foto, $id)
    {
        $foto = foto::findOrFail($id);
        $album = Album::all();
        return view('user.update', compact('foto', 'album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'lokasifile' => 'image|mimes:jpeg,png,jpg', // Foto tidak wajib diisi
                'judulfoto' => 'required|max:100',
                'deskripsifoto' => 'required|max:225',
            ], [
                'lokasifile.image' => 'Foto harus berupa file gambar (jpeg, png, jpg)',
                'judulfoto.required' => 'Wajib di isi',
                'judulfoto.max' => 'Judul melebihi maximal',
                'deskripsifoto.required' => 'Wajib di isi',
                'deskripsifoto.max' => 'Deskripsi melebihi maximal',
            ]);

            $foto = foto::findOrFail($id);
            $foto->judulfoto = $request->judulfoto;
            $foto->album_id = $request->album_id;
            $foto->deskripsifoto = $request->deskripsifoto;
            $foto->tanggalUnggah = now();

            if ($request->hasFile('lokasifile')) {
                // Hapus foto lama jika ada dan simpan foto baru
                $oldPhoto = $foto->lokasifile;
                if ($oldPhoto) {
                    Storage::delete('foto/' . $oldPhoto);
                }

                $image = $request->file('lokasifile');
                $imageName = $image->hashName();
                $image->storeAs('foto', $imageName);
                $foto->lokasifile = $imageName;
            }

            $foto->save();

            return back()->with('success', 'Berhasil mengupdate data');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengupdate data. Silakan coba lagi.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(foto $foto)
    {
        //
    }
}
