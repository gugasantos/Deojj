<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('faixas')->insert([
            'nome' => 'Branca'
        ]);
        DB::table('faixas')->insert([
            'nome' => 'Azul'
        ]);
        DB::table('faixas')->insert([
            'nome' => 'Roxa'
        ]);
        DB::table('faixas')->insert([
            'nome' => 'Marrom'
        ]);
        DB::table('faixas')->insert([
            'nome' => 'Preta'
        ]);
    }
}
