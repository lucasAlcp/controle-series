@extends('layout')
@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')
    @if ($errors->any())
    <div class="alert alert-danger d-flex justify-content-between align-items-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input id="nome" type="text" class="form-control" name="nome">
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
