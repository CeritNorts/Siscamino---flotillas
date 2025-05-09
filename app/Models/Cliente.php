<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'contacto',
        'contrato',
    ];

    /**
     * Relación con viajes
     */
    public function viajes(): HasMany
    {
        return $this->hasMany(Viaje::class, 'cliente_id');
    }
}