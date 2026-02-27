<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Actualizar las imágenes existentes para que apunten a la ruta correcta en public storage
        DB::table('servicios')->whereNotNull('imagen')->get()->each(function($servicio) {
            // Si aún contiene la ruta privada, actualizarla
            if (strpos($servicio->imagen, 'private') !== false) {
                $filename = basename($servicio->imagen);
                DB::table('servicios')->where('id', $servicio->id)->update([
                    'imagen' => 'servicios/' . $filename
                ]);
            }
        });
    }

    public function down(): void
    {
        // No hacer nada en rollback
    }
};
