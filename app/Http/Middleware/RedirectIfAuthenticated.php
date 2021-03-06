<?php

namespace App\Http\Middleware;

use App\Models\Permissao;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {

            if($request->ajax()){
                return response()->json(['result' => 'false', 'msg' => 'Tempo da sessão expirou, faça login novamente.', 'redirect' => '/admin/login']);
            }

            Session::put('last_url', $request->getRequestUri());
            return redirect('/admin/home');
        }

        $path = explode("/", strtolower($request->getPathInfo()));

        //$path[0] = "/" | $path[1] = "pessoa"  |  $path[2] = "create"...
        //usuario/lista/create
        //dd($path);
        switch ($path[2]){
            case 'cep':
                return $next($request);
                break;

            case 'home':
                return $next($request);
                break;

            case 'user':
                if(Permissao::userHasPermissao('USER')) {
                    return $next($request);
                }
                break;
        }

        //o que não cair nas regras acima, retorna erro!
        return response()->view('errors.404', [], 404);
    }
}
