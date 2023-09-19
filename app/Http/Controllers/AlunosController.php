<?php

namespace App\Http\Controllers;

use App\Models\Faixa;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $faixa = Faixa::all();

        if($search){
            $data = User::where(
                'name',
                'like', '%' . $search . '%'
            )->get();
        }
        else{
            $data = User::paginate(10);
        }

        return view('actions.alunos', [
            'alunos' => $data,
            'search' => $search,
            'faixa' => $faixa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faixa = Faixa::all();
        return view('actions.createAluno', [
            'faixas' => $faixa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = User::find($id);
        $faixa = faixa::all();

        return view('actions.editAluno', [
            'aluno' => $data,
            'faixas' => $faixa
        ]);

        return redirect()->route('alunos.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aluno = User::find($id);
        if ($aluno) {
            $data = $request->only([
                'name',
                'idade',
                'telefone',
                'endereco',
                'faixa',
                'grau',
            ]);
            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'idade' => ['required', 'string'],
                'telefone' => ['required', 'string'],
                'endereco' => ['required', 'string'],
                'faixa' => ['required', 'string'],
                'grau' => ['required', 'integer']

            ]);
            if ($validator->fails()) {
                return redirect()->route('alunos.edit', [$aluno->id])
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $aluno->name = $data['name'];
        $aluno->idade = $data['idade'];
        $aluno->telefone = $data['telefone'];
        $aluno->endereco = $data['endereco'];
        $aluno->tp_faixa = $data['faixa'];
        $aluno->grau = $data['grau'];


        if($request->foto){

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $aluno->foto = $imageName;
        }

        $aluno->save();

        return redirect()->route('alunos.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('alunos.index');
    }
}
