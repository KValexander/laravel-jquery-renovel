<?php

namespace App\Http\Controllers\single;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Подключение ресурсов
use App\Http\Resources\SessionResource;

class SessionController extends Controller
{
	// Функция передачи данных сессии
	public function session() {
		// Составление массива данных
		$data = (object)[
			"code" => "200",
			"data" => (object)[
				"auth" => session("auth"),
				"user_id" => session("user_id"),
				"role" => session("role"),
			],
		];

		// Возвращение данных с помощью response
		return response()->json($data, 200);
	}
}
