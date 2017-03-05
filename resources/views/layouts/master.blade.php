<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css" type="text/css" />
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row content">
        <div class="col-md-12 panel panel-body">
          <ul class="nav nav-pills">
            <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">Inicio</a></li>
            <li {{ (Request::is('exames') ||  Request::is('exames/*') ? 'class=active' : '') }}><a href="/exames">Exames</a></li>
            <li {{ (Request::is('medicos')|| Request::is('medicos/*') ? 'class=active' : '') }}><a href="/medicos">Médicos</a></li>
            <li {{ (Request::is('pacientes') || Request::is('pacientes/*') ? 'class=active' : '') }}><a href="/pacientes">Pacientes</a></li>
            <li {{ (Request::is('pedidos') || Request::is('pedidos/*') ? 'class=active' : '') }}><a href="/pedidos">Pedidos</a></li>
          </ul>
        </div>
        <div class="col-md-12">
          <h3>@yield('page-header-content')</h3>
          <br/>
          @yield('content')
        </div>
      </div>
    </div>

    <script src="/js/app.js" type="text/javascript"></script>
  </body>
</html>
