<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Produto;
use App\Model\Saida;
use App\Model\ProdutoSaida;
use App\Model\Destino;
use PDF;
use Dompdf\Dompdf;

class ProdutoController extends Controller
{
    public function listarProdutosGeral(){
        $produtos = Produto::all();
        return view('pages.listarProdutos',compact('produtos'));
    }

    public function registarProduto(Request $request){
        /*$request->validate([
            'designacao' => ['required', 'string', 'max:200'],
            'categoria' => ['required', 'string'],
            'quantidade' => ['required', 'integer','min:1'],
        ],[
            //Mensagens de validação de erros
            'designacao.required'=>'Por favor, informe a designação do produto',
            'quantidade.required'=>'Por favor, informe a quantidade',
        ]);*/

        //Verificar a extensão e o tamanho do ficheiro a anexar
        if ($request->file('nota_entrega')->isValid()) {
            $nova_nota_entrega = Produto::moverFicheiro($request->nota_entrega);  
            
            foreach ($request->produto as $prod) {
                $produto = new Produto;
                $produto->designacao = $prod['designacao'];
                $produto->id_categoria = $prod['id_categoria'];
                $produto->quantidade = $prod['quantidade'];
                $produto->nota_entrega = $nova_nota_entrega;
                $produto->created_at = date('Y-m-d H:i:s');
                
                if($produto->save()){
                    $saved=true; 
                }else{
                    $saved=false;
                }
            } 
            if($saved){
                return back()->with('sucesso','Produto registado com sucesso.');
            }   
        }else{
            return back()->with('error','Erro a registar produto, verifique o anexo da nota de entrega.'); 
        }          
    }

    //Ver produtos no stock
    public function verProduto($id_produto){
        $produto = Produto::getProduct($id_produto);//dd($produto);
        return view ('pages.verProduto',compact('produto'));
    }

    //decrementar produto
    public function decrementarProduto($id_produto,$qtd_informado){
        $retorno=0;
        $produto = Produto::find($id_produto);
        if($produto->quantidade>=$qtd_informado){
            $produto->quantidade=$produto->quantidade-$qtd_informado;
            if($produto->save()){
                $retorno=1;
                return $retorno;
            }
        }else{
            return $retorno;
        }
    }

    //Dar abate de uma quantidade de produto dentro de produtos
    public function registarSaida(Request $request){
        //Gerar Referência de saída
        $destino = Destino::find($request->recebedor);

        $now = date('Y-m-d H:i:s');
        $data1 = date('d-m-Y');
        $recebedor = Str_replace(' ','-',$destino->nome);
        $referencia = 'NE-'.$data1.'-'.$recebedor;

        foreach ($request->produto as $prod) {
            if(is_null($prod['quantidade'])){
                return back()->with('error','Produto informado sem quantidade.');
            }else{
                //Salva a saida e recupera a sua ID
                $saida = new Saida;
                $saida->ordenante = $request->ordenante;
                $saida->recebedor = $request->recebedor;
                $saida->motorista = $request->motorista;
                $saida->matricula = $request->matricula;
                $saida->viatura = $request->viatura;
                $saida->quantidade = $prod['quantidade'];
                $saida->referencia = $referencia;
                $saida->created_at = $now;
                $saida->save();

                //Associar Produto a Saída
                $ps = new ProdutoSaida;
                $ps->id_produto = $prod['id_produto']; 
                $ps->id_saida = $saida->id;
                if($this->decrementarProduto($prod['id_produto'],$prod['quantidade'])==1){
                    if($ps->save()){                
                        $saved=true;
                    }
                }else{
                    $produto = Produto::find($prod['id_produto']);
                    return back()->with('error','A quantidade do produto <<'.$produto->designacao.'>> pretendida é superior a existente no stock.');
                }
            }
        }

        if($saved){
            return back()->with('sucesso','Saída registada com sucesso.');
        }   
    }

    //Listar as saidas de um determinado produto
    public function listarSaidasProduto($idProduto){
        $saidas = DB::table('saida')
                ->join('produto_saida','saida.id','=','produto_saida.id_saida')
                ->join('produto','produto.id','=','produto_saida.id_produto')
                ->join('destino','destino.id','=','saida.recebedor')
                ->select('saida.ordenante','saida.recebedor','saida.quantidade','saida.created_at','destino.nome as recebedor')
                ->where('produto.id','=',$idProduto)
                ->get();
        return view('pages.saidasTable',compact('saidas'));
    }

    public function listarSaidas(){
        $saidas = DB::table('saida')
                ->select('id','referencia')
                //->groupBy('referencia')
                ->get();

        return view('pages.listarSaidas',compact('saidas'));
    }

    public function verNotaEntrega($id,$referencia){
        //Cabeça PDF
        $saida=DB::table('saida')
                ->join('destino','destino.id','=','saida.recebedor')
                ->where('saida.id','=',$id)
                ->first();

        //Tabela PDF Produtos
        $produtos=DB::table('saida')
                ->join('produto_saida','produto_saida.id_saida','=','saida.id')
                ->join('produto','produto.id','=','produto_saida.id_produto')
                ->select('produto.designacao','saida.quantidade')
                ->where('saida.referencia','=',$referencia)
                ->get();
            //dd($produtos);

        $image1 = base64_encode(file_get_contents(public_path('/images/mpla.png')));
        $image2 = base64_encode(file_get_contents(public_path('/images/mpla2.png')));
    
        $pdf = PDF::loadView('pages.pdfNotaEntrega',compact('saida','produtos','image1','image2'))->setOptions(['debugKeepTemp' => true, 'defaultFont' => 'sans-serif']);
        return $pdf->setPaper('a4')->stream('Relatorio.pdf');
    }

}
