<?php

namespace App\Models;

use App\Models\Helpers\CawModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissao extends CawModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;

    protected $table    =  'permissao';
    protected $fillable = [
        'nome',
        'nickname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
    public $timestamps = false;

    //$permissao_nickname = string ou array
    public static function userHasPermissao($permissao_nickname){

        if(empty(session('permissoes'))){
            return false;
        }

        if(is_array($permissao_nickname)){
            foreach ($permissao_nickname as $item) {
                if(in_array(strtoupper($item), session('permissoes'))){
                    return true;
                }
            }
        }else{
            if(in_array(strtoupper($permissao_nickname), session('permissoes'))){
                return true;
            }
        }

        return false;
    }

}