// Файл для работы с авторизацией пользователей
class Auth {

	// Инициализация класса
	constructor() {
		this.auth = {
			"token": 0,
			"user_id": 0,
			"role": "guest"
		};
		this.get_auth();
	}

	// Метод получения данных авторизации
	get_auth() {
		// Если есть данные авторизации
		// localStorage.clear();
		let check = localStorage.getItem("auth");
		if(check != null) this.auth = JSON.parse(check);
	}

	// Проверка на авторизацию пользователя
	auth_check(callback) {
		// Если пользователь не авторизован
		if(this.auth.role == "guest") route.get_page("public/spa/pages/err/auth.html", "auth_err");
		else callback();
	}

	// Проверка является ли пользователь модератором или администратором
	moderation_check(callback) {
		switch(this.auth.role) {
			case("guest"):
			case("user"):
			case("editor"):
				route.get_page("public/spa/pages/err/moderation.html", "moderation_err");
				break;
			default:
				callback();
				break;
		}
	}

	// Метод регистрации на сайте
	register() {
		// Получение и преобразование данных формы регистрации
		let form = JSON.stringify({
			"username": $("#register_form input[name=username]").val(),
			"email": $("#register_form input[name=email]").val(),
			"login": $("#register_form input[name=login]").val(),
			"password": $("#register_form input[name=password]").val(),
			"password_check": $("#register_form input[name=password_check]").val(),
		});

		// Запрос на регистрацию, метод post, класс Request
		request.post(function(data) {
			// Если положительный ответ
			if(data.responseText == undefined) {
				popup.pagename("reg_access");

			// Если отрицательный
			} else {
				// Преобразование данных из строки в объект
				data = JSON.parse(data.responseText);
				let errors = data.error.errors;
					
				// Очистка ошибок
				for(let i = 0; i < $("#register_form input").length; i++) {
					$("#register_form p.error").html("");
					$("#register_form input").removeClass("error");
				}
				// Цикл вывода ошибок валидации
				for(let val in errors) {
					$("#register_form p#"+val).html(errors[val]);
					$("#register_form input[name="+val+"]").addClass("error");
				}
			}
		}, form, "api/register");
		return false;
	}

	// Метод авторизации на сайте
	login() {
		// Получение и преобразование данных формы авторизации
		let form = JSON.stringify({
			"login": $("#login_form input[name=login]").val(),
			"password": $("#login_form input[name=password]").val(),
		});

		// Запрос на авторизацию, метод post, класс Request
		request.post(function(data) {
			// Если положительный ответ
			if(data.responseText == undefined) {
				// Запись полученных данных
				auth.auth = {
					"token": data.data.token,
					"user_id": data.data.user_id,
					"role": data.data.role,
				};

				// Сохранение данных авторизации в localStorage
				localStorage.setItem("auth", JSON.stringify(auth.auth));

				// Скрытие pop-up окна
				popup.hide();
				// Сообщение о входе
				popup.message("Вы вошли");
				// Обновление данных меню
				route.attach_module("public/spa/pages/modules/menu.html", "menu");
				// Вывод страницы личного кабинета
				route.redirect("personal_area");

			// Если отрицательный
			} else {
				// Получаю сообщение об ошибке
				data = JSON.parse(data.responseText);
				// Вывожу
				$("#login_form #login_error").html(data.error.message);
				$("#login_form input").addClass("error");
			}
		}, form, "api/login");
		return false;
	}

	// Выход из авторизации
	logout() {
		// Очистка данных авторизации
		auth.auth = {
			"token": 0,
			"user_id": 0,
			"role": "guest"
		};
		// Удаление данных авторизации
		localStorage.removeItem("auth");
		// Обновление данных меню
		route.attach_module("public/spa/pages/modules/menu.html", "menu");
		// Сообщение о выходе
		popup.message("Вы вышли");
		// Переход на главную страницу
		route.redirect("index");
	}
}

// Создание экземпляра класса
let auth = new Auth;