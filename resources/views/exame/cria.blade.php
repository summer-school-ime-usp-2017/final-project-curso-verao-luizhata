@extends('layouts.master')

@section('title', 'Cadastrar Exame')

@section('page-header-content', 'Cadastro de Exame')

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
      <form action="/exames" method="POST">
        {{csrf_field()}}
        <div class="form-group">
          <label for="nome">Nome</label>
          <input name="nome" id="nome" type="text" value="{{old('nome')}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="metodo">Método</label>
          <input name="metodo" id="metodo" type="text" value="{{old('metodo')}}" class="form-control">
        </div>
        <button class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
@endsection
