<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Подключение api контроллеров
use App\Http\Controllers\api\MainController;

// Подключение singel контроллеров
use App\Http\Controllers\single\SessionController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Ко все маршрутам в файле api.php добавляется префикс /api

// Группа маршрутов с проверкой сессии
Route::group(["middleware" => ["session"]], function() {

	// Маршруты для обычных контроллеров
	Route::get("/session", [SessionController::class, "session"]);

	// Маршруты для api контроллеров
	Route::apiResources([
		"main" => MainController::class
	]);

});
