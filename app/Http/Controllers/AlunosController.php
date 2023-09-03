<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Faixa;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');

        if($search){
            $data = Alunos::where(
                'name',
                'like', '%' . $search . '%'
            )->get();
        }
        else{
            $data = Alunos::paginate(10);
        }

        return view('actions.alunos', [
            'alunos' => $data,
            'search' => $search
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
