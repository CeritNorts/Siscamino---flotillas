<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Combustible extends Model
{
    use HasFactory;

    protected $fillable = [
        'viaje_id',
        'cantidad_litros',
        'costo',
        'fecha',
    ];

    protected $casts = [
        'cantidad_litros' => 'float',
        'costo' => 'decimal:2',
        'fecha' => 'datetime',
    ];

    /**
     * Relación con viaje
     */
    public function viaje(): BelongsTo
    {
        return $this->belongsTo(Viaje::class, 'viaje_id');
    }
}