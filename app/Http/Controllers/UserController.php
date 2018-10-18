<?php

namespace App\Http\Controllers;

use App\Models\Permissao;
use App\Models\Pessoa;
use App\Models\User;
use App\Models\UserGrupo;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(Request $request)
    {

        return view('user.index',
            [
                'data' => User::getList($request),
                'params' => $request->all(),
            ]
        );
    }

    public function create()
    {
        $user = new User();
        $user->ativo = 1;
        $user['permissoes'] = [];

        return view('user.form',
            [
                'data' => $user,
                'permissoes' => Permissao::orderBy("nome")->get(),
            ]
        );
    }

    public function edit($id)
    {
        $user = User::find($id);
        $user['permissoes'] = $user->getUserPermissoes();

        return view('user.form',
            [
                'data' => $user,
                'permissoes' => Permissao::orderBy("nome")->get(),
            ]
        );
    }


    public function store(Request $request)
    {
        if(empty($request->get('id'))){
            $user = new User();
        }else {
            $user = User::find($request->get('id'));
        }

        $user->fill($request->toArray());

        try {
            DB::beginTransaction();

            //Senha esta no formato de MD5
            if (!empty($request->input('password'))) {
                $senha = $request->input('password');
                $user->senha = MD5($senha);
            }

            $res = $user->save();
            $res2 = $user->setUserPermissoes($request->get('permissoes'));

            if ($res === true && $res2 === true) {
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

    public function indexPassword(){
        return view('password.form');
    }

    public function alterarSenha(Request $request){

        try {
            $senha = User::alterarSenha($request);

            if($senha == true) {
                DB::beginTransaction();

                $nova_senha = $request->get('new_password');
                $senha_md5 = MD5($nova_senha);

                $userAuth = Auth::id();

                $res = DB::update("update `user` set senha = '".$senha_md5."' where id = ".$userAuth);

                if ($res === 1) {
                    DB::commit();
                    return ['result' => 'true', 'msg' => ''];
                } else {
                    DB::rollBack();
                    return ['result' => 'false', 'msg' => 'New password and confirm password are not the same.'];
                }

            }else{
                DB::rollBack();
                return ['result' => 'false', 'msg' => $senha->getMessage()];
            }

        }catch (QueryException $e){
            DB::rollBack();
            return ['result' => 'false', 'msg' => $e->getMessage()];
        }
    }
}
