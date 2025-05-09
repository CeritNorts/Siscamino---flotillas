<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'camion_id',
        'tipo',
        'url',
        'vencimiento',
    ];

    protected $casts = [
        'vencimiento' => 'datetime',
    ];

    /**
     * Relación con camión
     */
    public function camion(): BelongsTo
    {
        return $this->belongsTo(Camion::class, 'camion_id');
    }
}