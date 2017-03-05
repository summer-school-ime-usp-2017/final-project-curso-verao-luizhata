<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exame;

class ExameController extends Controller
{
    // Retorna todos os exames
    public function index(){
      $exames = Exame::all();
      return view('exame.index', compact('exames'));
    }

    // Retorna pra view de Criacao de Exames
    public function cria() {
      return view('exame.cria');
    }

    // Retorna pra view de Edicao de Exames
    public function edita(Exame $exame) {
      return view('exame.edita', compact('exame'));
    }

    // Executa a validacao e armazena um exame
    public function armazena() {
      $this->validate(request(), [
        'nome' => 'required|min:2|max:195',
        'metodo' => 'required|min:2|max:195',
      ]);
      Exame::create(request()->all());
      request()->session()->flash('alert-success', 'Exame inserido com sucesso!');
      return redirect('/exames');
    }

    // Executa a validacao e atualiza um exame
    public function atualiza(Exame $exame) {
      $this->validate(request(), [
        'nome' => 'required|min:2|max:195',
        'metodo' => 'required|min:2|max:195',
      ]);
      $exame->fill(request()->all());
      $exame->save();
      request()->session()->flash('alert-success', 'Exame atualizado com sucesso!');
      return redirect('/exames');
    }
}
