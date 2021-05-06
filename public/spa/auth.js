// Файл для работы с авторизацией пользователей
class Auth {

	// Инициализация класса
	constructor() {
		// Получение сессии
		this.session();
	}

	// Метод получения данных сессии и их запись
	session() {
		// AJAX запрос
		$.ajax({
			url: "/api/session", // путь
			method: "GET", // метод
			// В случае успеха
			success: function(data) {
				// Запись данных сессии в переменные
				auth.token = data.data.token;
				auth.user_id = data.data.user_id;
				auth.role = data.data.role;
			}
		});
	}

	// Проверка на авторизацию пользователя
	auth_check() {
		// Если пользователь не авторизован
		if(this.token == "0") route.get_page("public/spa/pages/err/auth.html", "auth_err");
	}

	// Проверка является ли пользователь модератором или администратором
	moderation_check() {
		if(this.role != "admin" || this.role != "moderator") {
			route.get_page("public/spa/pages/err/moderation.html", "moderation_err");
		}
	}

	// Метод регистрации на сайте
	register() {
		// Получение и сериализация данных формы регистрации
		let form = $("#register_form").serialize();

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
	}

	// Метод авторизации на сайте
	login() {
		// Получение и сериализация данных формы авторизации
		let form = $("#login_form").serialize();

		// Запрос на авторизацию, метод post, класс Request
		request.post(function(data) {
			// Если не отрицательный ответ
			if(data.responseText == undefined) {

				// Обновляю данные сессии
				auth.session();
				// Скрываю pop-up окно
				popup.hide();
				// Включаю страницу личного кабинета
				route.redirect("personal_area");

			// Если отрицательный
			} else {
				data = JSON.parse(data.responseText);
				console.log(data);
			}


		}, form, "api/login");
	}

	// Выход из авторизации
	logout() {
		// Запрос на выход из авторизации, метод get, класс Request
		request.get(function(data) {
			console.log(data);
		}, null, "api/logout");
	}
}

// Создание экземпляра класса
let auth = new Auth;
