<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {
    protected $table = 'Secciones';
    protected $primaryKey = 'numero';
    public $timestamps = false;

    public function categoria() {
        return $this->belongsTo(Category::class, 'categoriaID');
    }

    public function subsecciones() {
        return $this->hasMany(Section::class, 'seccionPadreID');
    }
}
