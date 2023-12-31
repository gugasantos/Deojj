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
        Schema::disableForeignKeyConstraints();

        Schema::create('aula', function (Blueprint $table) {
            $table->id();
            $table->string('nome_aula', 100);
            $table->bigInteger('id_turma');
            $table->foreign('id_turma')->references('id')->on('turma');
            $table->date('dia_aula')->nullable();;
            $table->bigInteger('finalizada')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aula');
    }
};
