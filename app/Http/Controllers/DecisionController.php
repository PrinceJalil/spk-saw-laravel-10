<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function index()
    {
        $criteria = Kriteria::all();
        return view('decision.input', compact('criteria'));
    }

    public function store(Request $request)
    {
        foreach ($request->input('alternatives') as $altData) {
            $alternative = Alternative::create(['nama' => $altData['nama']]);
            foreach ($altData['nilai'] as $criteriaId => $value) {
                Nilai::create([
                    'alternative_id' => $alternative->id,
                    'criteria_id' => $criteriaId,
                    'value' => $value,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Sukses');
    }

    public function nilai()
    {
        $alternatives = Alternative::with('nilai')->get();
        $criteria = Kriteria::all();
        return view('tabel.alternatif', compact('alternatives', 'criteria'));
    }

    public function normalization()
    {
        $criteria = Kriteria::all();
        $alternatives = Alternative::with('nilai')->get();

        $normalized = [];
        foreach ($criteria as $crit) {
            $maxValue = $alternatives->max(fn ($alt) => $alt->nilai->where('criteria_id', $crit->id)->pluck('value')->max());
            foreach ($alternatives as $alt) {
                $nilai = $alt->nilai->where('criteria_id', $crit->id)->first();
                $normalized[$alt->id][$crit->id] = $nilai->value / $maxValue;
            }
        }

        return view('tabel.normalisasi', compact('normalized', 'criteria', 'alternatives'));
    }

    public function ranking()
    {
        $criteria = Kriteria::all();
        $alternatives = Alternative::with('nilai')->get();

        // Normalisasi
        $normalized = [];
        foreach ($criteria as $crit) {
            $maxValue = $alternatives->max(fn ($alt) => $alt->nilai->where('criteria_id', $crit->id)->pluck('value')->max());
            foreach ($alternatives as $alt) {
                $nilai = $alt->nilai->where('criteria_id', $crit->id)->first();
                $normalized[$alt->id][$crit->id] = $nilai->value / $maxValue;
            }
        }

        // Perhitungan SAW
        $results = [];
        foreach ($alternatives as $alt) {
            $results[$alt->id] = array_sum(array_map(
                fn ($critId) => $normalized[$alt->id][$critId] * $criteria->find($critId)->bobotkriteria,
                array_keys($normalized[$alt->id])
            ));
        }

        arsort($results);

        return view('tabel.rank', compact('results', 'alternatives'));
    }

    public function update(Request $request, $id)
{
    // Update nama alternatif
    $alternative = Alternative::findOrFail($id);
    $alternative->update(['nama' => $request->input('alternatives')[0]['nama']]);

    // Update nilai kriteria
    foreach ($request->input('nilai') as $criteriaId => $value) {
        $nilai = Nilai::where('alternative_id', $id)->where('criteria_id', $criteriaId)->first();
        if ($nilai) {
            $nilai->update(['value' => $value]);
        }
    }

    return redirect()->back()->with('menyala', 'Data berhasil diupdate!');
}

public function delete($id)
{
    $alternative = Alternative::findOrFail($id);
    $alternative->nilai()->delete(); // Hapus nilai kriteria
    $alternative->delete(); // Hapus alternatif

    return redirect()->back()->with('delete', 'Item deleted successfully');
}
    
}


