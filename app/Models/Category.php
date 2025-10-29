<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'numero';
    public $timestamps = false;

    protected $fillable = [
        'numero',
        'nombre'
    ];
}