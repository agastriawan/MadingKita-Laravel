<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::paginate(10);
        return view('admin.artikel.artikel', compact('artikel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel', [
            'artikels' => Artikel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'tipe' => 'required',
            'judul' => 'required|max:255',
            'pengirim' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'link' => 'required',
            'image' => 'image|file|max:6144',
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image');
        }

        // PANGGIL MODEL
        Artikel::create($validatedData);

        // REDIRECT
        return redirect('/artikel')->with('success', 'Mading artikel berhasil di kirim, silahkan tunggu konfirmasi admin');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);
        return view('admin.artikel.show', [
            'artikels' => $artikel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artikel  $student
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $artikel = Artikel::find($id);
        return view('admin.artikel.edit', [
            'artikels' => $artikel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artikel  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $rules = [
            'nama' => 'required',
            'kelas' => 'required',
            'tipe' => 'required',
            'judul' => 'required|max:255',
            'pengirim' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'link' => 'required',
            'image' => 'image|file|max:6144',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('image');
        }

        Artikel::where('id', $artikel->id)->update($validatedData);

        // REDIRECT
        return redirect('/admin/artikel')->with('success', 'Data Mading artikel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artikel  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $artikel = artikel::find($id);
        if ($artikel->image) {
            Storage::delete($artikel->image);
        }

        Artikel::destroy($artikel->id);
        return redirect('/admin/artikel')->with('success', 'Data Mading artikel berhasil dihapus!');
    }
}
