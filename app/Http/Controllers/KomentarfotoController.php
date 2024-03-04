<?php

namespace App\Http\Controllers;

use App\Models\komentarfoto;
use App\Models\foto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class KomentarfotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $auth = Auth::user();
        $foto = Foto::where('id', $id)->first();
        $Komentar = komentarfoto::where('foto_id', $foto->id)->orderBy('created_at', 'desc')->paginate(25);
        return view('user.post', compact('Komentar', 'foto', 'auth'));
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
                'isikomentar' => 'required'
            ], [
                'isikomentar.required' => 'Komentar harus di isi'
            ]);

            komentarfoto::create([
                'user_id' => Auth::user()->id,
                'foto_id' => $request->foto_id,
                'isikomentar' => $request->isikomentar,
                'tanggalkomentar' => now()
            ]);

            return back()->with('success', 'Berhasil menambahkan komentar');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput()->with('error', 'Gagal menambahkan komentar. Terdapat kesalahan validasi. Silakan coba lagi.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan komentar. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(komentarfoto $komentarfoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komentarfoto $komentarfoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komentarfoto $komentarfoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(komentarfoto $komentarfoto)
    {
        $komentarfoto->delete();
        return redirect()->back()->with('success','berhasil menghapus komentar.');
    }
}
