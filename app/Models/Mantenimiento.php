<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'camion_id',
        'tipo',
        'descripcion',
        'fecha',
        'costo',
        'proveedor',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'costo' => 'decimal:2',
    ];

    /**
     * Relación con camión
     */
    public function camion(): BelongsTo
    {
        return $this->belongsTo(Camion::class, 'camion_id');
    }
}