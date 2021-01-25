<?php

namespace App\Model;

use File;
use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Support\Facades\DB;

class Produto extends Model
{
    use Uuid;
    protected $table="produto";

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

    public static function moverFicheiro($ficheiro)
    {
        $novoNome = $ficheiro->getClientOriginalName();
        $novoNome = 'NOTA'.date('d-m-Y H:i:s').'.pdf';
        $novoNome = Str_replace(' ','', $novoNome);
        $novoNome = Str_replace('-','', $novoNome);
        $novoNome = Str_replace(':','', $novoNome);

        $ficheiro->storeAs('anexos', $novoNome);

        return $novoNome;
    }

    public static function getProduct($id_produto)
    {
        return DB::table('produto')
            ->join('categoria','categoria.id','=','produto.id_categoria')
            ->select('produto.id','produto.designacao','produto.quantidade','produto.nota_entrega','produto.created_at','categoria.nome as categoria')
            ->where('produto.id','=',$id_produto)
            ->first();
    }
}
