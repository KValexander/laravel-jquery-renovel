<?php

namespace App\Http\Controllers\single;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Подключение моделей
use App\Models\UserModel;

class UserController extends Controller
{
    // Функция передачи данных личного кабинета
    public function personal_area(Request $request) {
    	// Получаю пользователя с ролью
    	$user_id = $request->input("user_id");
    	$user = UserModel::find($user_id);
    	$role = $user->role()->select("role", "code")->first();

    	// Возвращаю обратно
    	return response()->json($data = [
    		"data" => [
    			"user" => $user,
    			"role" => $role
    		],
    	], 200);

    }
}
