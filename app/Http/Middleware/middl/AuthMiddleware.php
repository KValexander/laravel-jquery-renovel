<?php

namespace App\Http\Middleware\middl;

use Closure;
use Illuminate\Http\Request;
use DB;

class AuthMiddleware
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
        // Если токен сессии совпадает с токеном запроса
        if(session("token") == $request->bearerToken()) {
            // Получение токена с базы данных
            $token = DB::table("users")
                ->where("user_id", "=", session("user_id"))
                ->select("remember_token")
                ->first();
            // Если токен в базе совпадает с токеном запрос
            if($token == $request->bearerToken()) {
                // Идём дальше
                return $next($request);
            }
        }

        // Объект ошибки
        $data = [
            "error" => [
                "code" => "403",
                "message" => "Токены авторизации не совпадают",
            ],
        ];

        // Возвращение объекта ошибки
        return response()->json($data, 403);
    }
}
