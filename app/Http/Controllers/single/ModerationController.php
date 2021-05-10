<?php

namespace App\Http\Controllers\single;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Подключение моделей
use App\Models\UserModel;

class ModerationController extends Controller
{
    // Данные для главной страницы модерирования
    public function moderation_main(Request $request) {
    	// Получение всех пользователей
    	$users = UserModel::all();
    	// Составление объекта
    	$data = (object)[
    		"users" => $users,
    	];
    	// Отправка данных
    	return response()->json($data, 200);
    }
    // Удаление пользователей
    // Блокировка пользователей

	// Редактирование пользователей

    // Добавление новелл
    // Одобрение новелл
    // Блокировка новелл
    // Удаление новелл

	// Данные для страницы справочников
    // Добавление справочников
    // Удаление справочников

}
