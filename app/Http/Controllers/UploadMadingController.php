<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Upload_mading;
use Illuminate\Support\Facades\Storage;

class UploadMadingController extends Controller
{
    public function index()
    {
        $upload_mading = Upload_mading::paginate(10);
        return view('admin.upload_mading.upload_mading', compact('upload_mading'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.upload_mading.create', [
            'upload_madings' => Upload_mading::all()
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
            'whatsapp' => 'required',
            'email' => 'required',
            'link' => 'required',
            'tipe' => 'required',
            'nama_lengkap' => 'required',
            'kelas_jurusan' => 'required',
            'image' => 'image|file|max:6144',
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image');
        }

        // PANGGIL MODEL
        Upload_mading::create($validatedData);

        // REDIRECT
        return redirect('/admin/upload_mading')->with('success', 'Mading upload_mading berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\upload_mading  $upload_mading
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upload_mading = Upload_mading::find($id);
        return view('admin.upload_mading.show', [
            'upload_madings' => $upload_mading
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\upload_mading  $student
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $upload_mading = Upload_mading::find($id);
        return view('admin.upload_mading.edit', [
            'upload_madings' => $upload_mading,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\upload_mading  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upload_mading = Upload_mading::find($id);
        $rules = [
            'judul' => 'required|max:255',
            'whatsapp' => 'required',
            'email' => 'required',
            'link' => 'required',
            'tipe' => 'required',
            'nama_lengkap' => 'required',
            'kelas_jurusan' => 'required',
            'image' => 'image|file|max:6144',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('image');
        }

        Upload_mading::where('id', $upload_mading->id)->update($validatedData);

        // REDIRECT
        return redirect('/admin/upload_mading')->with('success', 'Data Mading upload_mading berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\upload_mading  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $upload_mading = Upload_mading::find($id);
        if ($upload_mading->image) {
            Storage::delete($upload_mading->image);
        }

        Upload_mading::destroy($upload_mading->id);
        return redirect('/admin/upload_mading')->with('success', 'Data Mading upload_mading berhasil dihapus!');
    }
}
