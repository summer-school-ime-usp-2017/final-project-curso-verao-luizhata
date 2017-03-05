<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medico;

class MedicoController extends Controller
{
    // Exibe todos os medicos cadastrados
    public function index(){
      $medicos = Medico::all();
      return view('medico.index', compact('medicos'));
    }

    // Retorna pra view de Criacao de Medicos
    public function cria() {
      return view('medico.cria');
    }

    // Retorna pra view de Edicao de Medicos
    public function edita(Medico $medico) {
      return view('medico.edita', compact('medico'));
    }

    // Executa a validacao e armazena um medico
    public function armazena() {
      $this->validate(request(), [
        'nome' => 'required|min:2|max:195',
        'crm' => 'required',
        'email' => 'required|email'
      ]);
      Medico::create(request()->all());
      request()->session()->flash('alert-success', 'Médico inserido com sucesso!');
      return redirect('/medicos');
    }

    // Executa a validacao e atualiza um medico
    public function atualiza(Medico $medico) {
      $this->validate(request(), [
        'nome' => 'required|min:2|max:195',
        'crm' => 'required',
        'email' => 'required|email'
      ]);
      $medico->fill(request()->all());
      $medico->save();
      request()->session()->flash('alert-success', 'Dados do Médico atualizados com sucesso!');
      return redirect('/medicos');
    }
}
