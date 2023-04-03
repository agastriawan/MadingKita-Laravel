<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;


class ViewSiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::paginate(8);
        return view('siswa.mading', compact('siswa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.mading-detail', [
            'siswas' => $siswa
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
        $siswa = Siswa::find($id);
        return view('siswa.mading', [
            'siswas' => $siswa,
        ]);
    }
}
