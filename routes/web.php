<?php

use Illuminate\Support\Facades\Route;

// Подключение контроллеров
use App\Http\Controllers\SpaController;

// Маршрут по которому будет находится страница SPA
Route::get("/{any}", [SpaController::class, "index"])->where('any', '.*');
