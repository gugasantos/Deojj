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

        Schema::create('turma', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('horario');
            $table->string('dias_da_semana');
            $table->string('descricao')->nullable();
            $table->bigInteger('prof_responsavel');
            $table->foreign('prof_responsavel')->references('id')->on('users');
            $table->bigInteger('qt_aluno')->nullable();
            $table->string('foto')->nullable();
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
