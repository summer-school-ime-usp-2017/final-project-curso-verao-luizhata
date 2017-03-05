@extends('layouts.master')

@section('title', 'Editar Exame')

@section('page-header-content', 'Editar Exame')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Menu de Opções</h3>
        </div>
        <div class="panel-body">
          <a href="/exames">
            <span class="glyphicon glyphicon-th-list"></span> Lista de Exames
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $message)
              <li>{{ $message }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="/exames/{{$exame->id}}" method="POST">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="form-group">
          <label for="nome">Nome</label>
          <input name="nome" id="nome" type="text" value="{{ old('nome', $exame->nome) }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="metodo">Método</label>
          <input name="metodo" id="metodo" type="text" value="{{old('metodo', $exame->metodo)}}" class="form-control">
        </div>
        <button class="btn btn-primary">Salvar alterações</button>
      </form>
    </div>
  </div>
@endsection
