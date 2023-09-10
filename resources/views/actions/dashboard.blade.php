@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
    Dashboard
    <a></a>
    </h1>
@endsection


@section('content')

<div class="card">
    <div class="table-responsive-sm card-body">
        <table class="table table-hover">
            <thead>
                <tr>

                </tr>
                <tbody>

                <tr>

                    <td>
                    <a href="}}" class="btn btn-sm btn-info">Editar</a>
                        <form class="d-inline" action="" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esse aula?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>

                </tbody>
            </thead>
        </table>
    </div>
</div>

@endsection