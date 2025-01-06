<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'bobotkriteria' => 'required',
        ]);

        // Cari item berdasarkan ID
        $item = Kriteria::findOrFail($id);

        $item->update([
            'nama' => $request->nama,
            'bobotkriteria' => $request->bobotkriteria,
            
        ]);

        return redirect()->back()->with('menyala', 'Data berhasil diupdate!');
    }
}
