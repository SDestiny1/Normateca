<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'secciones';
    protected $primaryKey = 'numero';
    public $timestamps = false;

    protected $fillable = [
        'numero',
        'nombre',
        'categoriaID',
        'seccionPadreID'
    ];
}