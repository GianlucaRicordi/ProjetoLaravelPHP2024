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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('time_casa_id')
                    ->constrained('times')
                    ->onDelete('cascade');
            $table->foreignId('time_fora_id')
                    ->constrained('times')
                    ->onDelete('cascade');
            $table->date('data_jogo');
            $table->string('local');
            $table->string('placar_jogo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
