<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
