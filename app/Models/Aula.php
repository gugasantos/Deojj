<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aula';
    protected $fillable = [
        'id', 'nome_aula', 'id_aluno', 'id_turma', 'dia_aula'
    ];

    public function alunos(){

        return $this->hasMany(User::class, 'id_aluno');

    }
    public function turma(){

        return $this->hasMany(Turma::class, 'id_aluno');

    }

    public $timestamps = false;
    use HasFactory;
}
