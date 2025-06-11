<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class RegistroLuchador extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'estatus',
        'cedula',
        'nombre',
        'apellido',
        'fecha_nac',
        'telefono',
        'correo',
        'avanzada_id',
        'genero_id',
        'nivel_academico_id',
        'responsabilidad_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'direccion',
        'letra',
        'edad',
        'inactivo',
        'hijos',
        'nivel_id',
        'pertenece_al_psuv',
        'cargo',
        'vocero',
        'cargo_popular',
        'nivel_responsabilidad_id'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function avanzada()
    {
        return $this->belongsTo(Avanzada::class);
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
    public function nivelAcademico()
    {
        return $this->belongsTo(NivelAcademico::class);
    }
    public function responsabilidad()
    {
        return $this->belongsTo(Responsabilidad::class);
    }
    public function nbc()
    {
        return $this->belongsTo(NBC::class);
    }
}
