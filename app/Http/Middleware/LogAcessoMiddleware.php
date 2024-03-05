<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // LogAcesso::create(['log'=>'Ip xyz Requisitou a rota ABCD']);
        // LogAcesso::create(['log'=> 'IP xyz requisitou a rota abcd']);
        
        // dd($request); //para dar um print_r no Request e ver todos os atribudos
        
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=> "IP $ip requisitou a rota $rota"]);
        // return Response('Chegamos ao middleware e finalizamos aqui'); 
        return $next($request);

        // $resposta =  $next ($request);
        // $resposta->setStatusCode(201, '0 status da respota e o texto foram modificados');

        // dd($resposta);

        // return $resposta;
    }
}
