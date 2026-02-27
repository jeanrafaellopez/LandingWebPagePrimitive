<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_presentations', function (Blueprint $table) {
            $table->id();
            $table->longText('contenido')->nullable();
            $table->timestamps();
        });

        // Crear un registro inicial
        \DB::table('company_presentations')->insert([
            'contenido' => 'Bienvenido a nuestro sitio. Aquí va el texto de presentación de la empresa.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_presentations');
    }
};
