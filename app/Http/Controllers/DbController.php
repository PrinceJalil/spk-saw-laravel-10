<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;

use Illuminate\Http\Request;

class DbController extends Controller
{
    public function kriteriadata()
    {
        $kriteriadata = Kriteria::all();
        return view('tabel.kriteriatabel', compact('kriteriadata'));
    }
}
