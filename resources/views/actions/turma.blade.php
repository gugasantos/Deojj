@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
    Turma
    <a href="{{route('turma.create')}}" class="btn btn-sm btn-success">Gerar nova Turma</a>
    </h1>
@endsection


@section('content')


<div class="container-fluid">
    <div class="card">
        <form action="alunos" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar Turma">
        </form>
    </div>

    <div class="card">
        <div class="table-responsive-sm card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width='250'>Foto</th>
                        <th width='250'>Nome</th>
                        <th width='250'>Dias da Semana</th>
                        <th width='250'>Horario</th>
                        <th width='250'>Descricao</th>
                        <th width='250'>Professor</th>
                        <th width='250'>Nº de alunos</th>
                    </tr>
                    <tbody>

                    @foreach ($turmas as $turma)
                    <tr>
                        <td>
                            @if ($turma->foto)
                                    <img  width="85px" height="85px" src="/img/events/{{$turma->foto}}" alt="foto">
                            @endif
                        </td>
                        <td>{{$turma->nome}}</td>
                        <td>{{$turma->dias_da_semana}}</td>
                        <td>{{$turma->horario}}</td>
                        <td>{{$turma->descricao}}</td>
                        <td>{{$professor->find($turma->prof_responsavel)->name}}</td>
                        <td>{{$turma->qt_aluno}}</td>
                        <td class="btn-group mr-2" role="group" aria-label="acoes">
                            <a href="#" class="btn btn-info btn-sm">Editar</a>
                            <form class="d-inline" action="{{route('turma.destroy',[$turma->id])}}" method="POST" onsubmit="return confirm('Tem certeza que deseja exluir essa Turma?')">
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

@if ($page)
    {{$turmas->links('pagination::bootstrap-5') }}
@endif

@endsection
