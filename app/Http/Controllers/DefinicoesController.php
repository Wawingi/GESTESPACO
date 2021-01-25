<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Departamento;
use App\Model\Destino;
use App\Model\Categoria;

class DefinicoesController extends Controller
{
    public function listarDepartamentos(){
        $departamentos = Departamento::all();
        return view('pages.listarDepartamentos',compact('departamentos'));
    }

    public function registarDepartamento(){
        $departamento = new Departamento;
        $departamento->nome = 'Secretaria Geral';
        $departamento->sigla = 'SG';
        $departamento->secretario = 'Solange Wassola';
        $departamento->telefone = '925556677';

        if($departamento->save()){
            echo 'Sucesso';
        }
    }

    //Destinos (Municipios e Comitê Provincial)
    public function registarDestino(){
        $destino = new Destino;
        $destino->nome = 'Município da Quiçama';
        $destino->telefone = '999111113';
        $destino->responsavel = 'Costa Silvestre';

        if($destino->save()){
            echo 'Sucesso';
        }
    }

    //Categorias de produto
    public function registarCategoria(){
        $categoria = new Categoria;
        $categoria->nome = 'Camisolas';

        if($categoria->save()){
            echo 'Sucesso';
        }
    }
}
