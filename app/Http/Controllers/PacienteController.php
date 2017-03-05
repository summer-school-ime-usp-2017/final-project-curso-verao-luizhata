<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{

    // Retorna todos os pacientes cadastrados
    public function index(){
      $pacientes = Paciente::all();
      return view('paciente.index', compact('pacientes'));
    }

    // Retorna pra view de Criacao de paciente
    public function cria() {
      return view('paciente.cria');
    }

    // Retorna pra view de Edicao de paciente
    public function edita(Paciente $paciente) {
      return view('paciente.edita', compact('paciente'));
    }

    // Executa a validacao e armazena um paciente
    public function armazena() {
      $this->validate(request(), [
        'nome' => 'required|min:2|max:195',
        'cpf' => 'required|numeric',
        'email' => 'required|email'
      ]);
      Paciente::create(request()->all());
      request()->session()->flash('alert-success', 'Paciente inserido com sucesso!');
      return redirect('/pacientes');
    }

    // Executa a validacao e atualiza um paciente
    public function atualiza(Paciente $paciente) {
      $this->validate(request(), [
        'nome' => 'required|min:2|max:195',
        'cpf' => 'required|numeric|min:11|max:11',
        'email' => 'required|email'
      ]);
      $paciente->fill(request()->all());
      $paciente->save();
      request()->session()->flash('alert-success', 'Dados do Paciente atualizados com sucesso!');
      return redirect('/pacientes');
    }
}
