<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Atendimento;

class AtendimentoController extends Controller
{
    public function registarAtendimento(Request $request){
        $validatedData = $request->validate([
            'assunto' => ['required', 'string', 'max:200'],
        ],[
            //Mensagens de validação de erros
            'assunto.required'=>'Por favor, informe o nome',
        ]);

        $atendimento = new Atendimento;
        $atendimento->assunto = $request->assunto;
        $atendimento->estado = $request->estado; //1: Encaminhar ao departamento, 2: Atendido
        $atendimento->id_marcacao = $request->id_marcacao;
        $atendimento->id_departamento = $request->departamento;

        if($atendimento->save()){
            return back()->with('sucesso','Visitante atendido com sucesso.');  
        }        
    }
}
