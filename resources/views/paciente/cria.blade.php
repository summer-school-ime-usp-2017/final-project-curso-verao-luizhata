@extends('layouts.master')

@section('title', 'Cadastrar Paciente')

@section('page-header-content', 'Cadastrar Paciente')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Menu de Opções</h3>
        </div>
        <div class="panel-body">
          <a href="/pacientes">
            <span class="glyphicon glyphicon-th-list"></span> Lista de Pacientes
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
      <form action="/pacientes" method="POST">
        {{csrf_field()}}
        <div class="form-group">
          <label for="nome">Nome</label>
          <input name="nome" id="nome" type="text" value="{{old('nome')}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="cpf">CPF</label>
          <input name="cpf" id="cpf" type="number" value="{{old('cpf')}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input name="email" id="email" type="text" value="{{old('email')}}" class="form-control">
        </div>
        <button class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
@endsection
