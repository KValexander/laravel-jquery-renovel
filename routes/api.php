<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Подключение api контроллеров
use App\Http\Controllers\api\MainController;

// Подключение single контроллеров
use App\Http\Controllers\single\SessionController;
use App\Http\Controllers\single\AuthController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Ко все маршрутам в файле api.php добавляется префикс /api

// Группа маршрутов с проверкой сессии
Route::group(["middleware" => ["session"]], function() {

	// Маршруты для обычных контроллеров
	// Получение сессии
	Route::get("/session", [SessionController::class, "session"]);

	// Регистрация
	Route::post("/register", [AuthController::class, "register"]);
	// Авторизация
	Route::post("/login", [AuthController::class, "login"]);

	// Маршруты для api контроллеров
	Route::apiResources([
		"main" => MainController::class
	]);

	// Группа маршрутов с проверкой на авторизацию
	Route::group(["middleware" => ["auth"]], function() {

	});

});
