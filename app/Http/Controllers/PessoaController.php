<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Model\Pessoa;
use App\Model\Funcionario;
use App\User;


class PessoaController extends Controller
{
    public function listarFuncionarios(){
        $funcionarios = Pessoa::getFuncionarios();
        return view('pages.listarFuncionarios',compact('funcionarios'));
    }


    public function registarFuncionario(Request $request){
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pessoa'],
            'telefone' => ['required','min:9', 'max:9'],
            'genero' => ['required'],
            'username' => ['required'],
        ],[
            //Mensagens de validação de erros
            'nome.required'=>'Por favor, informe o nome',
            'email.required'=>'Por favor, informe o email',
			'email.unique'=>'O email já foi informado',
            'telefone.required'=>'Por favor, informe o contacto telefónico',
            'telefone.min'=>'A quantidade de digítos telefonicos é inferior',
            'telefone.max'=>'A quantidade de digítos telefonicos é superior',
        ]);

        //Inicio da transação
        DB::beginTransaction();

        //Regista a pessoa e retorna o ID gerado
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->telefone = $request->telefone;  
        $pessoa->email = $request->email;
        $pessoa->tipo = $request->perfil;
        $pessoa->genero = $request->genero;
        $pessoa->tipo_documento = $request->tipo_documento;
        $pessoa->numero_documento = $request->numero_documento;

        if($pessoa->save()){
            $sucesso1 = 1;
        }
        $idPessoa = $pessoa->id;

        //Regista o funcionario e retorna o ID gerado
        $funcionario = new Funcionario;
        $funcionario->id_pessoa = $idPessoa;
        $funcionario->id_departamento = $request->departamento;  
        
        if($funcionario->save()){
            $sucesso2 = 1;
        }   

        //Regista o utilizador
        $user = new User;
        $user->name = strtolower($request->username);
        $user->email = $request->email;
        $user->password = bcrypt(123456);
        $user->tipo = $request->perfil; //tipo 0 - todos privilegios ; tipo: 1 - portaria ; tipo: 2 - secretaria geral ; tipo: 3 - secretaria dpto 
        $user->estado = 1;
        $user->id_funcionario = $idPessoa;

        if($user->save()){
            $sucesso3 = 1;
        }

        if($sucesso1==1 && $sucesso2 && $sucesso3){
            DB::commit();
            return back()->with('sucesso','Registado com sucesso.');
        } else
            DB::rollBack();
        
    }
}
