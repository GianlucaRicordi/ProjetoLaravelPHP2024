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
        Schema::create('jogador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('time_id')
                    ->constrained('times')
                    ->onDelete('cascade');
                    $table->string('nome');
                    $table->date('data_de_nascimento');
                    $table->string('posicao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogador');
    }
};