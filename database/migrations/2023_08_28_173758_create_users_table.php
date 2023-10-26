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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->dateTime('idade');
            $table->string('telefone', 255);
            $table->string('endereco', 255);
            $table->bigInteger('tp_faixa');
            $table->foreign('tp_faixa')->references('id')->on('faixas');
            $table->bigInteger('grau')->nullable();
            $table->bigInteger('id_turma')->nullable();
            $table->foreign('id_turma')->references('id')->on('turma');
            $table->boolean('ativo')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
