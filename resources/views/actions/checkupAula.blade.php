@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
    Presença da turma
    </h1>
@endsection


@section('content')

<style>
        .presente {
            background-color: blue;
            color: white;
        }

        .ausente {
            background-color: red;
            color: white;
        }
    </style>
<div class="container-fluid">
    <div class="card">
        <form action="check_up" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar Aluno">
        </form>
    </div>

    <form action="{{route('check_up_save')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
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
                            <button id="botaoPresenca" class="ausente btn btn-sm"  onclick="alternarPresenca()">Ausente</button>
                            <script src="{{ asset('js/app.js') }}"></script>
                            <script>
                                function alternarPresenca() {
                                    var botao = document.getElementById('botaoPresenca');
                                    
                                    // Determina se o botão está atualmente marcado como presente
                                    var presenteAtualmente = botao.classList.contains('presente');

                                    // Atualiza o estilo do botão e o estado na tabela presenca
                                    if (presenteAtualmente) {
                                        botao.innerText = 'Ausente';
                                        botao.classList.remove('presente');
                                        botao.classList.add('ausente');
                                        
                                    } else {
                                        botao.innerText = 'Presente';
                                        botao.classList.remove('ausente');
                                        botao.classList.add('presente');
                                    
                                    }
                                }

                        
                            </script>
                            </td>
                        </tr>
                        @endforeach
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var btnPresenca = document.getElementById('btnPresenca');
                                var usuarioId = btnPresenca.getAttribute('data-usuario-id');
                                var presenca = btnPresenca.getAttribute('data-presenca');

                                btnPresenca.addEventListener('click', function () {
                                    // Faça uma solicitação AJAX para alternar a presença no servidor
                                    axios.post(`/usuarios/${usuarioId}/alternar-presenca`)
                                        .then(function (response) {
                                            // Atualize o texto do botão e o atributo de presença
                                            presenca = response.data.presenca;
                                            btnPresenca.setAttribute('data-presenca', presenca);
                                            btnPresenca.innerText = presenca ? 'Presente' : 'Ausente';
                                        })
                                        .catch(function (error) {
                                            console.error('Erro ao alternar presença:', error);
                                        });
                                });
                            });
                        </script>
                        </tbody>
                    </thead>
                    <input type="submit" value="Salvar" class="btn btn-success">
                </table>
            </div>
        </div>
    </form>
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
