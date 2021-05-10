<?php

namespace App\Http\Middleware\middl;

use Closure;
use Illuminate\Http\Request;

class ModerationMiddleware
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
        // Получение токена авторизации
        $token = $request->bearerToken();
        // Продолжение исполнения кода
        return $next($request);
    }
}
