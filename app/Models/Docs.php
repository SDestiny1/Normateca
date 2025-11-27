<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docs extends Model
{
    protected $table = 'Documentos';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['codigo', 'titulo', 'url', 'archivo', 'usuarioID', 'categoriaID', 'seccionID', 'estado'];


    protected $casts = [
        'fechaCreacion' => 'datetime',
    ];



    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuarioID', 'numero');
    }

    public function categoria()
    {
        return $this->belongsTo(\App\Models\Category::class, 'categoriaID', 'numero');
    }

    public function seccion()
    {
        return $this->belongsTo(\App\Models\Section::class, 'seccionID', 'numero');
    }

    /**
     * Relación: Un documento tiene muchas versiones
     */
    public function versiones(): HasMany
    {
        return $this->hasMany(DocumentVersion::class, 'codigo', 'codigo');
    }

    /**
     * Obtener el número total de versiones
     */
    public function getTotalVersionsCount()
    {
        return $this->versiones()->count();
    }
}

