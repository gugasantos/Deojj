@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
    Aula
    <a href="{{route('aula.create')}}" class="btn btn-sm btn-success">Gerar nova Aula</a>
    </h1>
@endsection


@section('content')


<div class="container-fluid">
    <div class="card">
        <form action="/" method="GET">
            <input type="text" 0id="search" name="search" class="form-control" placeholder="Procurar Aula">
        </form>
    </div>

    <div class="card">
        <div class="table-responsive-sm card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width='250'>Foto</th>
                        <th width='250'>Conteúdo</th>
                        <th width='250'>Horario</th>
                        <th width='250'>Descricao</th>
                        <th width='250'>Professor Responsável</th>
                        <th width='250'>Nº de alunos</th>
                    </tr>
                    <tbody>

                    @foreach ($aulas as $aula)
                        @if ($aula->finalizada == False)
                            <tr>
                                <td>
                                    @if ($turmas->find($aula->id_turma)->foto)
                                            <img  width="85px" height="85px" src="/img/events/{{$turmas->find($aula->id_turma)->foto}}" alt="foto">
                                    @endif
                                </td>
                                <td>{{$aula->nome_aula}}</td>
                                <td>{{$turmas->find($aula->id_turma)->horario}}</td>
                                <td>{{$turmas->find($aula->id_turma)->descricao}}</td>
                                <td>{{$professor->find($turmas->find($aula->id_turma)->prof_responsavel)->name}}</td>
                                <td>{{$turmas->find($aula->id_turma)->qt_aluno}}</td>
                                <td class="btn-group mr-2" role="group" aria-label="acoes">
                                    <a href="{{route('check_up',[$aula->id])}}" style="white-space: nowrap;" class="btn btn-warning btn-sm style="white-space: nowrap; >Check-Up</a>
                                    <a href="{{route('aula.edit',[$aula->id])}}" class="btn btn-info btn-sm">Editar</a>
                                    <form class="d-inline" action="{{route('aula.destroy',[$aula->id])}}" method="POST" onsubmit="return confirm('Tem certeza que deseja finalizar essa Aula?')">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Finalizar</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
{{--
@if ($page)
    {{$turmas->links('pagination::bootstrap-5') }}
@endif --}}

@endsection
