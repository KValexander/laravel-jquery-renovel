<?php

namespace App\Http\Controllers\single;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// Подключение моделей
use App\Models\UserModel;

class AuthController extends Controller
{
	// Функция регистрации пользователя
	public function register(Request $request) {
		// Сообщения для валидации
		$message = [
			"string" => "Поле должно содерждать строку",
			"username.required" => "Имя пользователя должно быть заполнено",
			"username.max" => "Имя пользователя не должно содержать более :max символов",
			"email.required" => "Почта должна быть заполнено",
			"email.max" => "Почта не должна содержать более :max символов",
			"email.email" => "Почта должна соответствовать email формату (иметь @)",
			"login.required" => "Логин должен быть заполнен",
			"login.max" => "Логин не должен содержать более :max символов",
			"login.unique" => "Такой логин уже существует, введите новый",
			"password.required" => "Пароль должен быть заполнен",
			"password.same" => "Пароли не совпадают",
			"password.required_with" => "Пароли не совпадают",
			"password_check.required" => "Подтверждение пароля должно быть заполнено"
		];
		
		// Валидация
		$validator = Validator::make($request->all(), [
			"username" => "required|string|max:30",
			"email" => "required|string|email|max:50",
			"login" => "required|string|unique:users,login|max:30",
			"password" => "required|string|required_with:password_check|same:password_check",
			"password_check" => "required|string"
		], $message);

		// В случае наличия ошибок валидации
		if($validator->fails()) {
			return response()->json([
				"error" => [
					"code" => "422",
					"message" => "Ошибки валидации",
					"errors" => $validator->errors()
				]
			], 422);
		}

		// Создание экземпляра модели
		$user = new UserModel;
		// Ввод данных в экземпляр
		$user->username = $request->input("username");
		$user->email = $request->input("email");
		$user->login = $request->input("login");
		$user->password = Hash::make($request->input("password"));
		$user->d_role_id = "4";
		// Сохранение экземпляра в базе данных
		$user->save();

		// Успешная регистрация
		return response()->json()->setStatusCode(200);
	}

	// Функция авторизации пользователя
	public function login(Request $request) {
		// Запись в переменные полученных данных
		$login = $request->input("login");
		$password = $request->input("password");

		// Получение данных пользователя
		$user = UserModel::where("login", $login)->first();

		// Если пользователь не был найден
		if(empty((array)$user)) {
			return response()->json(
		        $data = [
		            "error" => [
		                "code" => "403",
		                "message" => "Ошибка логина или пароля 1",
		            ],
		        ], 403);
		}

		// Проверка пароля
		if(Hash::check($password, $user->password)) {
			// Генерация токена
			$token = Str::random(100);
			// Получение пользователя
			$user = UserModel::find($user->user_id);
			// Запись токена в базу
			$user->remember_token = $token;
			$user->save();

			// Получение роли пользователя (не работает)
			$role = UserModel::find($user->user_id)->role()->first();
			
			// Запись данных в сессии
			session(["token" => $token]);
			session(["user_id" => $user->user_id]);
			session(["role" => $role->code]);

			// Отправка положительного ответа
			return response()->json(
				$data = [
					"data" => [
						"token" => $token
					],
				], 200);
		} else {
			// Отправка отрицательного ответа
			return response()->json(
		        $data = [
		            "error" => [
		                "code" => "403",
		                "message" => "Ошибка логина или пароля 2",
		            ],
		        ], 403);
		}
	}

	// Функция выхода из авторизации
	public function logout(Request $request) {

	}
}
