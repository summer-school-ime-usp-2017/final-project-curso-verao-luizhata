@extends('layouts.master')

@section('title', 'Exames')

@section('page-header-content', 'Exames Cadastrados')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Menu de Opções</h3>
        </div>
        <div class="panel-body">
          <a href="/exames/cria">
            <span class="glyphicon glyphicon-plus"></span> Cadastrar Exame
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
            <th>Método</th>
          </tr>
        </thead>
        <tbody>
          @foreach($exames as $exame)
          <tr>
            <td>{{ $exame->id }}</td>
            <td>{{ $exame->nome }}</td>
            <td>{{ $exame->metodo }}</td>
            <td><a href="/exames/edita/{{$exame->id}}">Editar</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
