<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'Secciones';
    protected $primaryKey = 'numero';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'categoriaID',
        'seccionPadreID'
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoriaID');
    }

    public function subsecciones()
    {
        return $this->hasMany(Section::class, 'seccionPadreID');
    }

    public function documentos()
    {
        return $this->hasMany(Docs::class, 'seccionID');
    }
}

