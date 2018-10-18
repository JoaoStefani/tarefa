<?php

namespace App\Http\Controllers;


use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index(){
        if(auth()->check()){
            return redirect('/admin/home');
        }else{
            return view('login');
        }
    }

    public function create(){
        $this->validate(request(), [
            'user' => 'required|max:20',
            'senha' => 'required'
        ]);

        auth()->logout();

        $user = User::login(\request('user'), \request('senha'));
        if(!empty($user)){
            $all_permissions = array_merge($user->getUserPermissoesNickname()->toArray());

            Session::put('user', $user);
            Session::put('permissoes', $all_permissions);
            Session::save();

            auth()->login($user);

            $redirect = Session::pull('last_url', '');

            return ['result' => 'true', 'msg' => '', 'redirect' => $redirect];
        }

        return ['result' => 'false', 'msg' => "Sorry, we couldn't find an account with this username. Please check you're using the right username and try again."];

    }

    public function destroy(){
        auth()->logout();
        return redirect('/admin/login');
    }
}
