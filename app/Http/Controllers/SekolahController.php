<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Storage;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = Sekolah::paginate(10);
        return view('admin.sekolah.sekolah', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sekolah.create', [
            'sekolahs' => Sekolah::all()
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
            'email' => 'required',
            'instagram' => 'required',
            'link' => 'required',
            'image' => 'image|file|max:6144',
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image');
        }

        // PANGGIL MODEL
        Sekolah::create($validatedData);

        // REDIRECT
        return redirect('/admin/sekolah')->with('success', 'Mading Sekolah berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sekolah = Sekolah::find($id);
        return view('admin.sekolah.show', [
            'sekolahs' => $sekolah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $student
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $sekolah = Sekolah::find($id);
        return view('admin.sekolah.edit', [
            'sekolahs' => $sekolah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sekolah = Sekolah::find($id);
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

        Sekolah::where('id', $sekolah->id)->update($validatedData);

        // REDIRECT
        return redirect('/admin/sekolah')->with('success', 'Data Mading Sekolah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $sekolah = Sekolah::find($id);
        if ($sekolah->image) {
            Storage::delete($sekolah->image);
        }

        Sekolah::destroy($sekolah->id);
        return redirect('/admin/sekolah')->with('success', 'Data Mading Sekolah berhasil dihapus!');
    }
}
