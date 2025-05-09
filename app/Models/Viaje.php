<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Viaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'camion_id',
        'chofer_id',
        'cliente_id',
        'ruta',
        'fecha_salida',
        'fecha_llegada',
        'estado',
    ];

    protected $casts = [
        'fecha_salida' => 'datetime',
        'fecha_llegada' => 'datetime',
    ];

    /**
     * Relación con camión
     */
    public function camion(): BelongsTo
    {
        return $this->belongsTo(Camion::class, 'camion_id');
    }

    /**
     * Relación con chofer
     */
    public function chofer(): BelongsTo
    {
        return $this->belongsTo(Chofer::class, 'chofer_id');
    }

    /**
     * Relación con cliente
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    /**
     * Relación con combustibles
     */
    public function combustibles(): HasMany
    {
        return $this->hasMany(Combustible::class, 'viaje_id');
    }
}