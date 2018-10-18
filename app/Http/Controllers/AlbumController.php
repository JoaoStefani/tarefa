<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use \DB;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('album.index',
            [
                'data' => Album::getList($request),
            ]
        );
    }

     public function create()
    {
        $album = new Album();
        $artist = Artist::select('id', 'artist_name')->get();
    
        return view('album.form',
            [
                'data' => $album,
                'artist' => $artist
            ]
        );
    }

    public function edit($id)
    {
        $album = Album::find($id);
        $artist = Artist::select('id', 'artist_name')->get();

        return view('album.form',
            [
                'data' => $album,
                'artist' => $artist
            ]
        );
    }

     public function store(Request $request)
    {
        if(empty($request->get('id'))){
            $album = new Album();
        }else {
            $album = Album::find($request->get('id'));
        }

        $album->fill($request->toArray());

        try {
            DB::beginTransaction();

            $res = $album->save();

            if ($res === true) {
                DB::commit();
                return ['result' => 'true', 'msg' => ''];
            } else {
                DB::rollBack();
                return ['result' => 'false', 'msg' => ($res !== true) ? $res->getMessage() : $res2->getMessage()];
            }
        }catch (QueryException $e){
            DB::rollBack();
            return ['result' => 'false', 'msg' => $e->getMessage()];
        }
    }
}
