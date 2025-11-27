<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_versions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo'); // Referencia al documento original
            $table->longBlob('archivo')->nullable(); // El archivo de la versión anterior
            $table->integer('version_number'); // Número de versión
            $table->string('cambios_descripcion')->nullable(); // Descripción de los cambios
            $table->integer('usuarioID'); // Quién hizo el cambio
            $table->timestamp('created_at')->useCurrent();

            // Relaciones
            $table->foreign('codigo')
                ->references('codigo')
                ->on('Documentos')
                ->onDelete('cascade');

            $table->foreign('usuarioID')
                ->references('numero')
                ->on('Usuarios')
                ->onDelete('restrict');

            // Índices
            $table->index('codigo');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_versions');
    }
};
