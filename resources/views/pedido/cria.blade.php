@extends('layouts.master')

@section('title', 'Cadastrar Pedido')

@section('page-header-content', 'Cadastrar Pedido')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Menu de Opções</h3>
        </div>
        <div class="panel-body">
          <a href="/pedidos">
            <span class="glyphicon glyphicon-th-list"></span> Lista de Pedidos
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
      <form action="/pedidos" method="POST">
        {{csrf_field()}}
        <div class="form-group">
          <label for="medico_id">Selecione um médico: </label>
          <select name="medico_id" id="medico_id" class="form-control">
            @foreach ($medicos as $medico)
              <option value="{{$medico->id}}">{{$medico->nome}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="paciente_id">Selecione um paciente: </label>
          <select name="paciente_id" id="paciente_id" class="form-control">
            @foreach ($pacientes as $paciente)
              <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <h4>Listagem de Exames</h4>
          @foreach ($exames as $exame)
            <label class="checkbox-inline"><input name="exames[]" id="exame_{{$exame->id}}" type="checkbox" value="{{$exame->id}}">{{$exame->nome}}</label>
            <br>
          @endforeach
        </div>
        <br/>
        <button class="btn btn-primary">Cadastrar Pedido</button>
      </form>
    </div>
  </div>
@endsection
