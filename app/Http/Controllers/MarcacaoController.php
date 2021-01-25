<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Model\Marcacao;
use App\Model\Pessoa;
use App\Model\Atendimento;
use App\Model\Departamento;

class MarcacaoController extends Controller
{
    public function listarMarcacaoVisitante(){
        $now = Carbon::now()->toDateString();        
        $marcacoes = Marcacao::getMarcacoes($now);
        return view('pages.marcacoesTable',compact('marcacoes'));
    }

    public function getAllMarcacaoVisita(){
        $marcacoes = Marcacao::getHistoricoVisita();
        return view('pages.listarMarcacaoAllVisita',compact('marcacoes'));
    }

    public function registarMarcacao(Request $request){
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:200'],
        ],[
            //Mensagens de validação de erros
            'nome.required'=>'Por favor, informe o nome',
        ]);

        //Verificar se não tiver documento
        if($request->tipo_documento==4)
            $numero_documento = "Sem Documento";
        else
            $numero_documento = $request->numero_documento;

        $now = date('Y-m-d H:i:s');

        //Inicio da transação
        DB::beginTransaction();

        //Regista a pessoa e retorna o ID gerado
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->telefone = $request->telefone;  
        $pessoa->email = $request->email;
        $pessoa->genero = $request->genero;
        $pessoa->tipo = $request->tipo;
        $pessoa->tipo_documento = $request->tipo_documento;
        $pessoa->numero_documento = $numero_documento;

        if($pessoa->save()){
            $sucesso1 = 1;
            $idPessoa = $pessoa->id;
        }

        $marcacao = new Marcacao;
        $marcacao->data_entrada = $now;
        $marcacao->id_pessoa = $idPessoa;
        
        if($marcacao->save()){
            $sucesso2 = 1;
        }

        if($sucesso1==1 && $sucesso2){
            DB::commit();
            return back()->with('sucesso','Marcação efectuada com sucesso.');
        } else
            DB::rollBack();
    }

    public function verVisitante($id){
        $marcacao = DB::table('pessoa')
            ->leftJoin('marcacao', 'marcacao.id_pessoa', '=', 'pessoa.id')
            ->leftJoin('atendimento', 'marcacao.id', '=', 'atendimento.id_marcacao')
            ->leftJoin('departamento', 'departamento.id', '=', 'atendimento.id_departamento')
            ->select('pessoa.nome','pessoa.genero','pessoa.telefone','pessoa.email','pessoa.numero_documento','marcacao.id as id_marcacao','marcacao.data_entrada','marcacao.data_saida','atendimento.id as id_atendimento','atendimento.assunto','atendimento.estado','atendimento.created_at','departamento.nome as departamento')
            ->where('pessoa.tipo','=',2)
            ->where('marcacao.id','=',$id)
            ->first();    
       if($marcacao->genero==1)
           $marcacao->genero='MASCULINO';
       else
           $marcacao->genero='FEMININO';

        if($marcacao->estado==1)
            $marcacao->estado='Encaminhado ao Departamento';
        if($marcacao->estado==2)
            $marcacao->estado='Atendido';
        if($marcacao->estado==3)
            $marcacao->estado='Agendado';

        return view('pages.verVisitante',compact('marcacao'));
    }

    public function marcarSaida($id_marcacao){
        $marcacao = Marcacao::find($id_marcacao);
        $marcacao->data_saida = date('Y-m-d H:i:s');

        $atendimento = DB::table('atendimento')->where('id_marcacao','=',$marcacao->id)->first();
        if(is_object($atendimento)){
            DB::table('atendimento')
                ->where('id_marcacao', '=', $marcacao->id)
                ->update(['estado' => 2]);
        }else{
            $dpto = DB::table('departamento')->where('sigla','SG')->first();
            $atendimento = new Atendimento;
            $atendimento->assunto = 'Esclarecimento rápido';
            $atendimento->estado = 2;
            $atendimento->id_marcacao = $marcacao->id;
            $atendimento->id_departamento = $dpto->id;
            $atendimento->save();
        }
        
        if($marcacao->save()){
            return back()->with('sucesso','Saída efectuada com sucesso.');
        };
    }
}
