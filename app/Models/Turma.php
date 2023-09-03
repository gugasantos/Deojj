<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turma';
    protected $fillable = [
        'id_turma', 'prof_responsavel', 'qt_aluno', 'graduacao', 'foto'
    ];
    public function aula(){

        return $this->belongsTo(Aula::class, 'id_turma');

    }

    public $timestamps = false;
    use HasFactory;
}
