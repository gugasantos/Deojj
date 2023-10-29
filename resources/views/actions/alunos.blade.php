@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
    Alunos
    </h1>
@endsection


@section('content')

<div class="container-fluid">
    <div class="card">
        <form action="alunos" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar Aluno">
        </form>
    </div>

    <div class="card">
        <div class="table-responsive-sm card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width='250'>Foto</th>
                        <th width='250'>Nome</th>
                        <th width='250'>Data de Nascimento</th>
                        <th width='250'>Telefone</th>
                        <th width='250'>Endereço</th>
                        <th width='250'>Faixa</th>
                        <th width='250'>Grau</th>
                        <th width='250'>Turma</th>
                    </tr>
                    <tbody>

                    @foreach ($alunos as $aluno)
                    <tr>
                        <td>
                            @if ($aluno->foto)
                                        <img  width="85px" height="85px" src="/img/events/{{$aluno->foto}}" alt="foto">
                            @endif
                        </td>
                        <td>{{$aluno->name}}</td>
                        <td>{{date('d/m/y', strtotime($aluno->idade))}}</td>
                        <td>{{$aluno->telefone}}</td>
                        <td>{{$aluno->endereco}}</td>
                        <td>{{$faixa->find($aluno->tp_faixa)->nome}}</td>
                        <td>{{$aluno->grau}}</td>
                        @if ($aluno->id_turma)
                            <td>{{$turmas->find($aluno->id_turma)->nome}}</td>
                        @else
                            <td></td>
                        @endif
                        <td class="btn-group mr-2" role="group" aria-label="acoes">
                            <a href="" class="btn btn-warning btn-sm">Carteirinha</a>

                            <a href="{{route('alunos.edit',[$aluno->id])}}" class="btn btn-info btn-sm">Editar</a>
                            <form class="d-inline" action="{{route('alunos.destroy',[$aluno->id])}}" method="POST" onsubmit="return confirm('Tem certeza que deseja exluir esse Aluno?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
    <style>
        img    {
        border-radius: 50%;
    }
</style>
@if ($page)
    {{$alunos->links('pagination::bootstrap-5') }}
@endif

@endsection
