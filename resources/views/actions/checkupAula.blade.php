@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
    Presença da turma
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
                        <td>{{$faixa->find($aluno->tp_faixa)->name}}</td>
                        <td>{{$aluno->grau}}</td>
                        <td class="btn-group mr-2" role="group" aria-label="acoes">
                            <button id ='presente' href="" class="btn btn-warning btn-sm">Ausente</button>
                        </td>

                        <script>
                            const botao = document.getElementById('presente');
                            let presente = false; // Variável para rastrear o estado do botão
                            document.getElementById('presente').addEventListener('click', function() {
                                if (presente) {
                                    this.classList.remove('btn-warning');
                                    this.classList.add('btn-primary');
                                    this.textContent = 'Presente'; // Mudar o texto do botão
                                } else {
                                    botao.classList.remove('btn-primary');
                                    botao.classList.add('btn-warning');
                                    botao.textContent = 'Ausente';
                                }

                                presente = !presente;
                            });
                        </script>
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
