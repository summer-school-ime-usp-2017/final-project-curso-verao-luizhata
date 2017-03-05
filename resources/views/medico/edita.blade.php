@extends('layouts.master')

@section('title', 'Editar Médico')

@section('page-header-content', 'Editar Médico')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Menu de Opções</h3>
        </div>
        <div class="panel-body">
          <a href="/medicos">
            <span class="glyphicon glyphicon-th-list"></span> Lista de Médicos
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
      <form action="/medicos/{{$medico->id}}" method="POST">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="form-group">
          <label for="nome">Nome</label>
          <input name="nome" id="nome" type="text" value="{{ old('nome', $medico->nome) }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="crm">CRM</label>
          <input name="crm" id="crm" type="text" value="{{old('crm', $medico->crm)}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input name="email" id="email" type="text" value="{{old('email', $medico->email)}}" class="form-control">
        </div>
        <button class="btn btn-primary">Salvar alterações</button>
      </form>
    </div>
  </div>
@endsection
