<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chofer extends Model
{
    use HasFactory;

    protected $table = 'choferes';

    protected $fillable = [
        'nombre',
        'telefono',
        'licencia',
    ];

    /**
     * Relación con viajes
     */
    public function viajes(): HasMany
    {
        return $this->hasMany(Viaje::class, 'chofer_id');
    }
}