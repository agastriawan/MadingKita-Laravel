<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class ViewOrganisasiController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::paginate(8);
        return view('organisasi.mading', compact('organisasi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $organisasi = Organisasi::find($id);
        return view('organisasi.mading-detail', [
            'organisasis' => $organisasi
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
        $organisasi = Organisasi::find($id);
        return view('organisasi.mading', [
            'organisasis' => $organisasi,
        ]);
    }
}
