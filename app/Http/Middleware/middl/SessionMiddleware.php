<?php

namespace App\Http\Middleware\middl;

use Closure;
use Illuminate\Http\Request;

// Подключение моделей
use App\Models\UserModel;

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
        // Ни session, ни cookie не работают
        // Поэтому сохранение данных авторизации происходит на стороне клиента

        // Продолжение исполнения кода
        return $next($request);
    }
}
