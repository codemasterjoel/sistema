<?php

namespace App\Models;
use App\Models\Parroquia;

use Illuminate\Database\Eloquent\Model;

class ubch extends Model
{
        protected $fillable = [
        'aperturo',
        'parte8',
        'parte9',
        'parte10',
        'parte11',
        'parte12',
        'parte1',
        'parte2',
        'parte3',
        'parte4',
        'parte5',
        'parte6',
        'parte7',
        'cerro',
        'final',
        'meta',
        'cumplido',
    ];
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
}
