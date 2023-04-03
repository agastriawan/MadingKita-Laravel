<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisasi = Organisasi::paginate(10);
        return view('admin.organisasi.organisasi', compact('organisasi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organisasi.create', [
            'organisasis' => Organisasi::all()
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
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'pengirim' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'instagram' => 'required',
            'link' => 'required',
            'image' => 'image|file|max:6144',
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image');
        }

        // PANGGIL MODEL
        Organisasi::create($validatedData);

        // REDIRECT
        return redirect('/admin/organisasi')->with('success', 'Mading Organisasi berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organisasi = Organisasi::find($id);
        return view('admin.organisasi.show', [
            'organisasis' => $organisasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organisasi  $student
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $organisasi = Organisasi::find($id);
        return view('admin.organisasi.edit', [
            'organisasis' => $organisasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\organisasi  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $organisasi = Organisasi::find($id);
        $rules = [
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'pengirim' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'instagram' => 'required',
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

        organisasi::where('id', $organisasi->id)->update($validatedData);

        // REDIRECT
        return redirect('/admin/organisasi')->with('success', 'Data Mading Organisasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\organisasi  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $organisasi = Organisasi::find($id);
        if ($organisasi->image) {
            Storage::delete($organisasi->image);
        }

        Organisasi::destroy($organisasi->id);
        return redirect('/admin/organisasi')->with('success', 'Data Mading Organisasi berhasil dihapus!');
    }
}
