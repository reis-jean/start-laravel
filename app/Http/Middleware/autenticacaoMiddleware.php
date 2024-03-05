<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class autenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {

        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }else{

            return redirect()->route('site.login', ['erro' => 2]);

        }
        // return $next($request);
        // echo $metodo_autenticacao . '<br>';

        // if($metodo_autenticacao == 'padrao'){
        //     echo 'Verificar o usuario e senha no banco' . '<br>';
        // }

        // if($metodo_autenticacao == 'ldap'){
        //     echo 'Verificar o usuario e senha no banco' . '<br>'; 
        // }


        // if(false){
        //     return $next($request);
        // }else{
        //     return response('Acesso negado! rota! Rota Exige Autenticação!!!');
        // }
        // return response('Acesso Negado! rota exige autenticação!!!');
    }
}
