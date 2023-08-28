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
            $table->bigInteger('id_aula')->primary();
            $table->bigInteger('prof_responsavel');
            $table->bigInteger('qt_aluno');
            $table->bigInteger('graduacao');
            $table->binary('foto');
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
