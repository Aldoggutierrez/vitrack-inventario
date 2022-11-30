<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'marca',
        'numero_serie',
        'ubicacion_id',
        'fecha_garantia',
    ];
    
    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
    
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
