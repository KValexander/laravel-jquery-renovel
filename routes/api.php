<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Подключение api контроллеров
use App\Http\Controllers\api\MainController;

// Подключение single контроллеров
use App\Http\Controllers\single\AuthController;
use App\Http\Controllers\single\UserController;
use App\Http\Controllers\single\NovelController;
use App\Http\Controllers\single\SessionController;
use App\Http\Controllers\single\ModerationController;


// Ко все маршрутам в файле api.php добавляется префикс /api

// Группа маршрутов с проверкой сессии
Route::group(["middleware" => "session"], function() {

	// Маршруты для обычных контроллеров
	// Получение сессии (не используется)
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
	Route::group(["middleware" => "auth"], function() {

		// Личный кабинет
		Route::post("/personal_area", [UserController::class, "personal_area"]);
		// Данные для страницы пользователя
		Route::get("/user", [UserController::class, "user"]);

		// Группа маршрутов с доступом только для администрации сайта
		Route::group(["middleware" => "moderation"], function() {

			// Данные для главной страницы модерации
			Route::get("/moderation/main", [ModerationController::class, "moderation_main"]);

			// Данные для страницы добавления аниме
			Route::get("/novel/directory", [NovelController::class, "novel_directory"]);

		});
		
	});

});
