<?php

namespace App\Models;

use App\Models\Helpers\CawHelpers;
use App\Models\Helpers\CawModelUser;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Artist extends CawModelUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;

    protected $rememberTokenName = '';

    protected $table    =  'artist';
    protected $fillable = [
        'artist_name',
        'twitter_handle'
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

        $builder = Artist::query();
        CawHelpers::addWhereLike($builder, 'artist_name', $request['artist_name']);

        $builder->orderBy('artist.artist_name');

        return $builder->paginate(config('app.list_count'))->appends($request->except('page'));
    }
}