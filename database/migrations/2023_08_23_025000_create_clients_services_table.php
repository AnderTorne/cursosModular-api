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
        Schema::create('clients_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); //client_id is the foreign key
            $table->foreign('client_id')->references('id')->on('clients'); //references('id') is the primary key of the table clients
            
            $table->unsignedBigInteger('service_id'); //service_id is the foreign key
            $table->foreign('service_id')->references('id')->on('services'); //references('id') is the primary key of the table services

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_services');
    }
};
