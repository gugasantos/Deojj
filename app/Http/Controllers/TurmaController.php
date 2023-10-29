<?php

namespace App\Http\Controllers;

use App\Models\Faixa;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $search = request('search');
        $page = True;
        $aluno = User::all();
        if($search){
            $data = Turma::where(
                'nome',
                'like', '%' . $search . '%'
            )->get();
            $page = False;
        }
        else{
            $data = Turma::paginate(10);
        }

        // dd(gettype($data[0]->dias_da_semana));
        return view('actions.turma',[
            'prof_responsavel' => User::all(),
            'turmas' => $data,
            'page' => $page,
            'aluno' => $aluno
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('actions.createTurma',[
            'prof_responsavel' => User::where('tp_faixa', 5)->orwhere('tp_faixa',10)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'nome',
            'dias',
            'horario',
            'descricao',
            'prof_responsavel',
            'foto'
        ]);

        $validator = Validator::make($data, [
            'nome' => ['required', 'string'],
            'dias' => ['required'],
            'horario' => ['required'],
            'prof_responsavel' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->route('turma.create')
                ->withErrors($validator)
                ->withInput();
        };




        $turma = new Turma;

        if($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $turma->nome = $data['nome'];
            $turma->dias_da_semana = implode(', ',$data['dias']);
            $turma->horario = $data['horario'];
            $turma->descricao = $data['descricao'];
            $turma->prof_responsavel = $data['prof_responsavel'];
            $turma->foto = $imageName;

        }
        else{
            $turma->nome = $data['nome'];
            $turma->dias_da_semana = implode(',',$data['dias']);
            $turma->horario = $data['horario'];
            $turma->descricao = $data['descricao'];
            $turma->prof_responsavel = $data['prof_responsavel'];
        }

        $turma->save();

        return redirect()->route('turma.index');

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
        $turma = Turma::find($id);
        $professor = User::where('tp_faixa', 5)->orwhere('tp_faixa', 10)->get();

        return view('actions.editTurma', [
            'turmas' => $turma,
            'prof_responsavel' => $professor
        ]);

        return redirect()->route('turma.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $turma = Turma::find($id);

        if($turma){
            $data = $request->only([
                'nome',
                'dias',
                'horario',
                'descricao',
                'prof_responsavel',
                'foto'
            ]);

            $validator = Validator::make($data, [
                'nome' => ['required', 'string'],
                'dias' => ['required'],
                'horario' => ['required'],
                'prof_responsavel' => ['required']
            ]);

            if ($validator->fails()) {
                return redirect()->route('turma.edit')
                    ->withErrors($validator)
                    ->withInput();
            };
        };

        if($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $turma->nome = $data['nome'];
            $turma->dias_da_semana = implode(', ',$data['dias']);
            $turma->horario = $data['horario'];
            $turma->descricao = $data['descricao'];
            $turma->prof_responsavel = $data['prof_responsavel'];
            $turma->foto = $imageName;

        }
        else{
            $turma->nome = $data['nome'];
            $turma->dias_da_semana = implode(',',$data['dias']);
            $turma->horario = $data['horario'];
            $turma->descricao = $data['descricao'];
            $turma->prof_responsavel = $data['prof_responsavel'];
        }
    $turma->save();

        return redirect()->route('turma.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Turma::find($id);

        try {
            $registro = Turma::find($id);
            $registro->delete();
            return redirect()->back();
        } catch (QueryException $e) {
            if ($e->getCode() === '23503') {
                return redirect()->back()->withErrors('Não é possível excluir a turma, pois ela está sendo referenciada por Alunos.');
            } else {
                throw $e; // Re-lança a exceção se não for um erro de chave estrangeira.
            }
        }


        return redirect()->route('turma.index');
    }
}
