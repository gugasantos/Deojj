@extends('adminlte::page')

@section('title', 'Novo Aluno')

@section('content_header')
    <h1>
    Novo Aluno
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

            <form action="{{route('alunos.store')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Idade</label>
                    <div class="col-sm-10">
                        <input type="number" name="idade" value="{{old('idade')}}" class="form-control @error('idade') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Celular</label>
                    <div class="col-sm-10">
                        <input type="tel" name="telefone" value="{{old('telefone"')}}" class="form-control @error('telefone') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                        <textarea name="endereco" class="form-control" >{{old('endereco')}}</textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipo de Faixa</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-single col-sm-1 col-form-label" name="faixa">
                            @foreach($faixas as $p)
                                 <option value="{{ $p->id }}">{{ $p->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Grau</label>
                    <div class="col-sm-1">
                        <input type="number" name="grau" value="{{old('grau"')}}" class="form-control @error('grau') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <textarea name="foto" class="form-control" >{{old('foto')}}</textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Criar" class="btn btn-success">
                        <a href="{{route('alunos.index')}}" class="btn btn-danger">Voltar</a>
                    </div>
                </div>


            </form>

        </div>

    </div>

@endsection
