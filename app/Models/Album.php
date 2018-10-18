<?php

namespace App\Models;

use App\Models\Helpers\CawHelpers;
use App\Models\Helpers\CawModelUser;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Album extends CawModelUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;

    protected $rememberTokenName = '';

    protected $table    =  'album';
    protected $fillable = [
        'id_artist',
        'album_name',
        'year'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public $timestamps = true;

    public static function getList(Request $request){

        $builder = Album::query();
        CawHelpers::addWhereLike($builder, 'album_name', $request['album_name']);

        $builder->orderBy('album.album_name');

        return $builder->paginate(config('app.list_count'))->appends($request->except('page'));
    }
}