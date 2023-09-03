<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $table = 'alunos';

    protected $fillable = [
        'id', 'nome', 'idade', 'telefone', 'endereco', 'tp_faixa', "grau", "prof", "ativo", 'foto'
    ];

    public function faixa(){

        return $this->hasOne(Faixa::class, 'id');

    }

    public function Aula(){

        return $this->belongsTo(turma::class, 'id_aluno');

    }
    public $timestamps = false;
    use HasFactory;
}
