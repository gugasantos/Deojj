@extends('adminlte::page')

@section('title', 'Nova Pizza')

@section('content_header')
    <h1>
    Gerar Aula
    </h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5>
                    <i class="icon fas fa-ban"></i>
                    Ocorreu um erro
                </h5>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="card">
        <div class="card-body">

            <form action="{{route('aula.store')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Turma</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-single col-sm-10 col-form-label" name="turma">
                            <option></option>
                            @foreach ($turmas as $turma)
                                <option value="{{$turma->id}}">{{$turma->nome}}</option>
                            @endforeach
                        </select>

                        {{-- script que é sempre necessário --}}
                        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
                        <script>
                             $(document).ready(function() {
                                $('.js-example-basic-single').select2({
                                    allowClear: true,
                                    theme: "classic",
                                    align-items: center,
                             });
                            });
                        </script>
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome da Aula</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" value="{{old('nome')}}" class="form-control @error('nome') is-invalid @enderror">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Criar" class="btn btn-success">
                        <a href="{{route('aula.index')}}" class="btn btn-danger">Voltar</a>
                    </div>
                </div>


            </form>

        </div>

    </div>
    {{-- {{$pizzas->links('pagination::bootstrap-5') }} --}}
@endsection
