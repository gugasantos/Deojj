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

        Schema::create('alunos_aula', function (Blueprint $table) {
            $table->id();
            $table->string('nome_aula', 100);
            $table->bigInteger('id_aluno');
            $table->foreign('id_aluno')->references('id_aluno')->on('alunos');
            $table->bigInteger('id_aula');
            $table->foreign('id_aula')->references('id_aula')->on('aula');
            $table->date('dia_aula');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos_aula');
    }
};
