<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turma';
    protected $fillable = [
        'id_turma', 'nome','horario','dias_da_semana','descricao', 'prof_responsavel', 'qt_aluno', 'foto'
    ];
    public function aula(){

        return $this->belongsTo(Aula::class, 'id_turma');

    }

    public function turma(){

        return $this->hasOne(Turma::class, 'prof_responsavel');

    }

    public $timestamps = false;
    use HasFactory;
}
