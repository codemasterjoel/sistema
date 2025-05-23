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
        Schema::create('electores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centro_id')->nullable()->references('id')->on('centros');
            $table->string('cedula');
            $table->string('nombre');
            $table->integer('vpp')->nullable();
            $table->integer('psuv')->nullable();
            $table->integer('n21')->nullable();
            $table->integer('cc2018')->nullable();
            $table->integer('cc2024')->nullable();
            $table->integer('jef_familia')->nullable();
            $table->integer('milicia')->nullable();
            $table->integer('epa')->nullable();
            $table->integer('paz')->nullable();
            $table->integer('bicentenario')->nullable();
            $table->integer('pensionado')->nullable();
            $table->integer('vjoven')->nullable();
            $table->integer('estructura')->nullable();
            $table->integer('tipologia')->nullable();
            $table->integer('cantidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electores');
    }
};
