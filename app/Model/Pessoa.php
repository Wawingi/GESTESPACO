<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Pessoa extends Model
{
    use Uuid;
    protected $table="pessoa";

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

    //retorna os funcionários
    public static function getFuncionarios()
    {
        return DB::table('pessoa')
            ->join('funcionario', 'funcionario.id_pessoa', '=', 'pessoa.id')
            ->join('departamento', 'funcionario.id_departamento', '=', 'departamento.id')
            ->select('pessoa.nome','pessoa.genero','pessoa.telefone','pessoa.tipo','departamento.nome as departamento')
            ->orderBy('pessoa.nome')
            ->get();
    }
}
