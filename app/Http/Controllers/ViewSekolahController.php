<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class ViewSekolahController extends Controller
{
 public function index()
    {
        $sekolah = Sekolah::paginate(8);
        return view('sekolah.mading', compact('sekolah'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $sekolah = Sekolah::find($id);
        return view('sekolah.mading-detail', [
            'sekolahs' => $sekolah,
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
        return view('sekolah.mading', [
            'sekolahs' => $sekolah,
        ]);
    }

}
