<?php

namespace App\Http\Controllers\single;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SessionController extends Controller
{
	// Функция передачи данных сессии
	public function Session(Request $request) {
		// Составление массива данных
		$data = (object)[
			"code" => "200",
			"data" => (object)[
				"token" => session("token"),
				"user_id" => session("user_id"),
				"role" => session("role"),
			],
		];

		// Возвращение данных с помощью response
		return response()->json($data, 200);
	}
}
