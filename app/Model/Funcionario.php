<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Funcionario extends Model
{
    //use Uuid;
    protected $table="funcionario";

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
}
