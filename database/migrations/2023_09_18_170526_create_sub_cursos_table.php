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
        Schema::create('sub_cursos', function (Blueprint $table) {
            $table->id();
            $table->string('subtitulo');
            $table->text('descripcion');
            $table->string('imagen');
            $table->string('video');
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')->references('id')->on('cursos')
            ->onDelete('set null');//llave foranea, haciendo referencia al campo id de la tabla curso
            // $table->tinyInteger('activo')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_cursos');
    }
};
