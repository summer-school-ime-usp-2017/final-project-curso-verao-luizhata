@extends('layouts.master')

@section('title', 'Pedidos')

@section('page-header-content', 'Lista de Pedidos')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Menu de Opções</h3>
        </div>
        <div class="panel-body">
          <a href="/pedidos/cria">
            <span class="glyphicon glyphicon-plus"></span> Cadastrar Pedido
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
            <th>Médico</th>
            <th>Paciente</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pedidos as $pedido)
          <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->medico->nome }}</td>
            <td>{{ $pedido->paciente->nome }}</td>
            <td><a href="/pedidos/show/{{$pedido->id}}">Detalhes</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
