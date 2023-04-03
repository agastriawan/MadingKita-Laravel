<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;
use Illuminate\Support\Facades\Storage;

class ViewekskulController extends Controller
{
    public function index()
    {
        $ekskul = Ekskul::paginate(8);
        return view('ekskul.mading', compact('ekskul'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $ekskul = Ekskul::find($id);
        return view('ekskul.mading-detail', [
            'ekskuls' => $ekskul
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
        $ekskul = Ekskul::find($id);
        return view('ekskul.mading', [
            'ekskuls' => $ekskul,
        ]);
    }
}
