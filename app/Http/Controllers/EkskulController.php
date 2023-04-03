<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
      public function index()
    {
        $ekskul = Ekskul::paginate(10);
        return view('admin.ekskul.ekskul', compact('ekskul'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ekskul.create', [
            'ekskuls' => Ekskul::all()
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
        Ekskul::create($validatedData);

        // REDIRECT
        return redirect('/admin/ekskul')->with('success', 'Mading ekskul berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ekskul = Ekskul::find($id);
        return view('admin.ekskul.show', [
            'ekskuls' => $ekskul
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ekskul  $student
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $ekskul = Ekskul::find($id);
        return view('admin.ekskul.edit', [
            'ekskuls' => $ekskul,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ekskul  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ekskul = Ekskul::find($id);
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

        Ekskul::where('id', $ekskul->id)->update($validatedData);

        // REDIRECT
        return redirect('/admin/ekskul')->with('success', 'Data Mading ekskul berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ekskul  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $ekskul = Ekskul::find($id);
        if ($ekskul->image) {
            Storage::delete($ekskul->image);
        }

        Ekskul::destroy($ekskul->id);
        return redirect('/admin/ekskul')->with('success', 'Data Mading ekskul berhasil dihapus!');
    }
}
