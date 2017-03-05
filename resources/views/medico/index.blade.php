@extends('layouts.master')

@section('title', 'Medicos')

@section('page-header-content', 'Médicos Cadastrados')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Menu de Opções</h3>
        </div>
        <div class="panel-body">
          <a href="/medicos/cria">
            <span class="glyphicon glyphicon-plus"></span> Cadastrar Médico
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
         @if(Session::has('alert-' . $msg))
           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
         @endif
      @endforeach
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Identificação</th>
            <th>Nome</th>
            <th>CRM</th>
            <th>Email</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($medicos as $medico)
          <tr>
            <td>{{ $medico->id }}</td>
            <td>{{ $medico->nome }}</td>
            <td>{{ $medico->crm }}</td>
            <td>{{ $medico->email }}</td>
            <td><a href="/medicos/edita/{{$medico->id}}">Editar</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
