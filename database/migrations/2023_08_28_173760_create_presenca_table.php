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

        Schema::create('presenca', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_aluno')->nullable();
            $table->bigInteger('id_aula');
            $table->bigInteger('presente')->nullable();
            $table->foreign('id_aluno')->references('id')->on('users');
            $table->foreign('id_aula')->references('id')->on('aula');

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
