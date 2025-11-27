<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentVersion extends Model
{
    protected $table = 'document_versions';

    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'archivo',
        'version_number',
        'cambios_descripcion',
        'usuarioID',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Relación: Una versión pertenece a un documento
     */
    public function documento(): BelongsTo
    {
        return $this->belongsTo(Docs::class, 'codigo', 'codigo');
    }

    /**
     * Relación: Una versión fue creada por un usuario
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuarioID', 'numero');
    }

    /**
     * Obtener todas las versiones de un documento ordenadas por versión (descendente)
     */
    public static function getVersionsForDocument($codigo)
    {
        return self::where('codigo', $codigo)
            ->orderBy('version_number', 'desc')
            ->get();
    }

    /**
     * Obtener la última versión de un documento
     */
    public static function getLatestVersion($codigo)
    {
        return self::where('codigo', $codigo)
            ->orderBy('version_number', 'desc')
            ->first();
    }

    /**
     * Obtener el número de la próxima versión
     */
    public static function getNextVersionNumber($codigo)
    {
        $lastVersion = self::where('codigo', $codigo)
            ->orderBy('version_number', 'desc')
            ->first();

        return $lastVersion ? $lastVersion->version_number + 1 : 1;
    }
}
