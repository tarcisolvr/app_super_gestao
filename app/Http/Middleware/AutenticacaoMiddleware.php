<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil, $param3, $param4)
    {
       session_start();

       if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
           return $next($request);
       } else {
           return redirect()->route('site.login', ['erro' => 2]);
       }
    }
}