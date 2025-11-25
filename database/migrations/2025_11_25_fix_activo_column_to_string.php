<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Documentos', function (Blueprint $table) {
            // Cambiar columna boolean a string
            $table->string('activo')->default('activo')->change();
        });

        // Actualizar valores: si era true/1 -> 'activo', si era false/0 -> 'desactivo'
        DB::table('Documentos')->where('activo', 1)->orWhereNull('activo')->update(['activo' => 'activo']);
        DB::table('Documentos')->where('activo', 0)->update(['activo' => 'desactivo']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Documentos', function (Blueprint $table) {
            $table->boolean('activo')->default(true)->change();
        });
    }
};
