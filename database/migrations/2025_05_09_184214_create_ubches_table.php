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
        Schema::create('ubches', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias');
            $table->integer('electores');
            $table->boolean('aperturo')->nullable();
            $table->integer('parte8')->nullable();
            $table->integer('parte9')->nullable();
            $table->integer('parte10')->nullable();
            $table->integer('parte11')->nullable();
            $table->integer('parte12')->nullable();
            $table->integer('parte1')->nullable();
            $table->integer('parte2')->nullable();
            $table->integer('parte3')->nullable();
            $table->integer('parte4')->nullable();
            $table->integer('parte5')->nullable();
            $table->integer('parte6')->nullable();
            $table->integer('parte7')->nullable();
            $table->integer('meta');
            $table->integer('final')->nullable();
            $table->boolean('cerro')->nullable();
            $table->boolean('cumplido')->default(false);

            $table->integer('mesas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubches');
    }
};
