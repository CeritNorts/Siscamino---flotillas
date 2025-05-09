<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Camion extends Model
{
    use HasFactory;

    protected $table = 'camiones';

    protected $fillable = [
        'placa',
        'modelo',
        'anio',
        'capacidad_carga',
        'estado',
    ];

    /**
     * Relación con viajes
     */
    public function viajes(): HasMany
    {
        return $this->hasMany(Viaje::class, 'camion_id');
    }

    /**
     * Relación con mantenimientos
     */
    public function mantenimientos(): HasMany
    {
        return $this->hasMany(Mantenimiento::class, 'camion_id');
    }

    /**
     * Relación con documentos
     */
    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class, 'camion_id');
    }
}