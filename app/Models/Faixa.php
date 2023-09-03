<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faixa extends Model
{
    protected $table = 'faixas';
    protected $fillable = [
        'id','nome'
    ];
    public function alunos(){

        return $this->belongsTo(Alunos::class, 'tp_faixa');

    }

    public $timestamps = false;
    use HasFactory;
}
