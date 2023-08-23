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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso')->unique();
            $table->text('descripcion_curso');
            $table->string('imagen_curso');
            $table->integer('precio_curso');
            $table->string('url_video_curso')->unique();
            $table->integer('calificacion_curso')->nullable();
            $table->string('categoria_curso');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
