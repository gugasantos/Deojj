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

        Schema::create('alunos', function (Blueprint $table) {
            $table->bigInteger('id_aluno')->primary();
            $table->string('nome', 100);
            $table->bigInteger('idade');
            $table->string('telefone', 255);
            $table->string('endereco', 255);
            $table->foreignId('tp_faixa')->references('id')->on('faixas');
            $table->bigInteger('grau');
            $table->boolean('prof');
            $table->boolean('ativo');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
