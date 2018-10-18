<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use \DB;

class ArtistController extends Controller
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
        return view('artist.index',
            [
                'data' => Artist::getList($request),
            ]
        );
    }

     public function create()
    {
        $artist = new Artist();
    
        return view('artist.form',
            [
                'data' => $artist,
            ]
        );
    }

    public function edit($id)
    {
        $artist = Artist::find($id);

        return view('artist.form',
            [
                'data' => $artist,
            ]
        );
    }

     public function store(Request $request)
    {
        if(empty($request->get('id'))){
            $artist = new Artist();
        }else {
            $artist = Artist::find($request->get('id'));
        }

        $artist->fill($request->toArray());

        try {
            DB::beginTransaction();

            $res = $artist->save();

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
