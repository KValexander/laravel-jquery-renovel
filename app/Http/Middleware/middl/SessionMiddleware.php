<?php

namespace App\Http\Middleware\middl;

use Closure;
use Illuminate\Http\Request;
use DB;

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
        // Если пользователь имеет токен 
        if(session("token")) {
            // Получение токена авторизованного пользователя
            $token = DB::table("users")
                ->where("user_id", "=", session("user_id"))
                ->select("remember_token")
                ->first();
            // Если значение токена сессии не совпадает со значением токена в базе данных
            if(session("token") != $token->token) {
                // Прописываю значения неавторизованного пользователя в сессии
                session(["token" => "0"]);
                session(["user_id" => 0]);
                session(["role" => "guest"]);
            }
        // Если пользователь не имеет токена
        } else {
            // Прописываю значения неавторизованного пользователя в сессии
            session(["token" => "0"]);
            session(["user_id" => 0]);
            session(["role" => "guest"]);
        }
        
        // Продолжение исполнения кода
        return $next($request);
    }
}
