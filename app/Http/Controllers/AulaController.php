<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Faixa;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $turma = Turma::all();
        $page = True;
        $usuario = User::all();

        if($search){
            $data = Aula::where(
                'nome_aula',
                'like', '%' . $search . '%'
            )->get();
            $page = False;
        }
        else{

            $data = Aula::paginate(10);
        }

        return view('actions.aula',[
            'page' => $page,
            'aulas' => $data,
            'turmas' => $turma,
            'professor' => $usuario
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $turma = Turma::all();
        $usuario = User::all();

        return view('actions.createAula',[
            'turmas' => $turma,
            'usuarios' => $usuario
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'turma',
            'nome',
        ]);

        $validator = Validator::make($data, [
            'turma' => ['required'],
            'nome' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->route('aula.create')
                ->withErrors($validator)
                ->withInput();
        };

        $aula = New Aula;

        $aula->nome_aula = $data['nome'];
        $aula->id_turma = $data['turma'];
        $aula->finalizada = 1;

        $aula->save();

        return redirect()->route('aula.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aula = Aula::find($id);
        $turma = Turma::all();

        return view('actions.editAula', [
            'turmas' => $turma,
            'aula' => $aula
        ]);

        return redirect()->route('aula.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aula = Aula::find($id);

        if($aula){
            $data = $request->only([
                'turma',
                'nome',
            ]);

            $validator = Validator::make($data, [
                'turma' => ['required'],
                'nome' => ['required']
            ]);

            if ($validator->fails()) {
                return redirect()->route('aula.create')
                    ->withErrors($validator)
                    ->withInput();
            };

            $aula->nome_aula = $data['nome'];
            $aula->id_turma = $data['turma'];

            $aula->save();

            return redirect()->route('aula.index');
        }






    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aula = Aula::find($id);
        $aula->finalizada = 2;

        $aula->update();

        return redirect()->route('aula.index');

    }
}
