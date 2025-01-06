<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = ['alternative_id', 'criteria_id', 'value'];
    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }
    public function criteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
