<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $table = 'Categorias';
    protected $primaryKey = 'numero';
    public $timestamps = false;

    public function secciones() {
        return $this->hasMany(Section::class, 'categoriaID');
    }
}
