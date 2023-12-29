<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Faixa;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckUpController extends Controller
{
    public function check_up(string $id)
    {
        $search = request('search');
        $faixa = Faixa::all();
        $page = True;
        $turma = Turma::all();


        if($search){
            $data = User::where(
                'name',
                'like', '%' . $search . '%',
            )->where('id_turma', $id);


            $page = False;
        }
        else{
            $data = User::where('id_turma',$id)->paginate(10);
        }



        return view('actions.checkupAula', [
            'page' => $page,
            'alunos' => $data,
            'search' => $search,
            'faixa' => $faixa,
            'turmas' => $turma
        ]);
    }

    public function check_up_save(Request $request, string $id)
    {
        
    }
}
