@extends('adminlte::page')

@section('title', 'Novo Aluno')

@section('content_header')
    <h1>
    Editars Aluno
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

            <form action="{{route('alunos.update',[$aluno->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{$aluno->name}}" class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Idade</label>
                    <div class="col-sm">
                       <input id="idade" class="form-control" type="date" name="idade" value="{{substr($aluno->idade,0,10)}}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Celular</label>
                    <div class="col-sm-10">
                        <input type="tel" name="telefone" value="{{$aluno->telefone}}" class="form-control @error('telefone') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                        <textarea name="endereco" class="form-control" >{{$aluno->endereco}}</textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipo de Faixa</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-single col-sm-1 col-form-label" name="faixa">
                            <option value="{{ $aluno->tp_faixa }}" >{{ $faixas->find($aluno->tp_faixa)->nome}}</option>
                            @foreach($faixas as $f )
                                <option value="{{$f->id}}">{{$f->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Grau</label>
                    <div class="col-sm-1">
                        <input type="number" name="grau" value="{{$aluno->grau}}" class="form-control @error('grau') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm col-form-label">Foto</label>
                    <div class="col-sm-10">
                        @if ($aluno->foto)
                            <img  width="150px" height="150px" src="/img/events/{{$aluno->foto}}" alt="foto">
                            <input type="file" name="foto" id="foto" class="form-control-file" class="form-control-file" accept=".jpg, .jpeg, .png"/>
                        @else
                            <input type="file" name="foto" id="foto" class="form-control-file"  accept=".jpg, .jpeg, .png"/>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Atualizar" class="btn btn-success">
                        <a href="{{route('alunos.index')}}" class="btn btn-danger">Voltar</a>
                    </div>
                </div>


            </form>

        </div>

    </div>



@endsection
