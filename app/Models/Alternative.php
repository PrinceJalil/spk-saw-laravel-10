<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;
    protected $table = 'alternatives';
    protected $fillable = ['nama'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
