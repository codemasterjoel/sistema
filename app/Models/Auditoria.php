<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'accion',
        'model_type',
        'model_id',
        'user_id',
        'cambios'
    ];

    protected $cast = [
        'cambios' => 'json'
    ];
}