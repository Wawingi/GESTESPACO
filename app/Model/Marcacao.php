<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Marcacao extends Model
{
    use Uuid;
    protected $table="marcacao";

    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    //retorna as marcações
    public static function getMarcacoes($now)
    {
        return DB::table('pessoa')
            ->join('marcacao', 'marcacao.id_pessoa', '=', 'pessoa.id')
            ->select('pessoa.nome','pessoa.genero','marcacao.id as id_marcacao','marcacao.data_entrada','marcacao.data_saida')
            ->Where('data_entrada', 'like', '%' . $now . '%')
            ->WhereNull('data_saida')
            ->orderBy('marcacao.created_at','ASC')
            ->get();
    }

    //retorna as marcações de um departamento
    public static function getMarcacoesDepartamento($departamento,$now)
    {
        return DB::table('pessoa')
            ->join('marcacao', 'marcacao.id_pessoa', '=', 'pessoa.id')
            ->join('atendimento', 'atendimento.id_marcacao', '=', 'marcacao.id')
            ->join('departamento', 'atendimento.id_departamento', '=', 'departamento.id')
            ->select('pessoa.nome','pessoa.genero','marcacao.id as id_marcacao','marcacao.data_entrada','marcacao.data_saida','atendimento.estado','departamento.nome as departamento')
            ->Where('atendimento.estado','=', 1)
            ->Where('departamento.nome','=',$departamento)
            ->Where('data_entrada', 'like', '%' . $now . '%')
            ->WhereNull('data_saida')
            ->orderBy('marcacao.created_at','ASC')
            ->get();
    }

    //retorna as marcações de um departamento
    public static function getHistoricoMarcacoesDepartamento($departamento)
    {
        return DB::table('pessoa')
            ->join('marcacao', 'marcacao.id_pessoa', '=', 'pessoa.id')
            ->join('atendimento', 'atendimento.id_marcacao', '=', 'marcacao.id')
            ->join('departamento', 'atendimento.id_departamento', '=', 'departamento.id')
            ->select('pessoa.nome','pessoa.genero','marcacao.id as id_marcacao','marcacao.data_entrada','marcacao.data_saida','atendimento.estado','departamento.nome as departamento')
            ->Where('departamento.nome','=',$departamento)
            ->WhereNull('data_saida')
            ->orderBy('marcacao.created_at','ASC')
            ->get();
    }

    //retorna os funcionários
    public static function getHistoricoVisita()
    {
        return DB::table('pessoa')
            ->join('marcacao', 'marcacao.id_pessoa', '=', 'pessoa.id')
            ->select('pessoa.nome','pessoa.genero','marcacao.id as id_marcacao','marcacao.data_entrada','marcacao.data_saida')
            ->Where('pessoa.tipo','=',2)
            ->orderBy('marcacao.created_at','DESC')
            ->get();
    }
}
