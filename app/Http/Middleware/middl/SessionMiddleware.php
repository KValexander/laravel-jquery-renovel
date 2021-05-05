<?php

namespace App\Http\Middleware\middl;

use Closure;
use Illuminate\Http\Request;

class SessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Если пользователь имеет значение авторизации 
        if(session("auth")) {
            // Если значение авторизации равно неавторизованности
            if(session("auth") == false) {
                // Прописываю значения неавторизованного пользователя в сессии
                session(["auth" => "false"]);
                session(["user_id" => 0]);
                session(["role" => "guest"]);
            }
        // Если пользователь не имеет значения авторизации
        } else {
            // Прописываю значения неавторизованного пользователя в сессии
            session(["auth" => "false"]);
            session(["user_id" => 0]);
            session(["role" => "guest"]);
        }
        
        // Продолжение исполнения кода
        return $next($request);
    }
}
