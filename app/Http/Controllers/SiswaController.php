<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate(10);
        return view('admin.siswa.siswa', compact('siswa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create', [
            'siswas' => Siswa::all()
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
        Siswa::create($validatedData);

        // REDIRECT
        return redirect('/admin/siswa')->with('success', 'Mading siswa berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.show', [
            'siswas' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $student
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.edit', [
            'siswas' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
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

        siswa::where('id', $siswa->id)->update($validatedData);

        // REDIRECT
        return redirect('/admin/siswa')->with('success', 'Data Mading siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $siswa = Siswa::find($id);
        if ($siswa->image) {
            Storage::delete($siswa->image);
        }

        Siswa::destroy($siswa->id);
        return redirect('/admin/siswa')->with('success', 'Data Mading siswa berhasil dihapus!');
    }
}
