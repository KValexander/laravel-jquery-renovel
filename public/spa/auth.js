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
				auth.auth = data.data.auth;
				auth.user_id = data.data.user_id;
				auth.role = data.data.role;
			}
		});
	}

	// Проверка на авторизацию пользователя
	auth_check() {
		// Если пользователь не авторизован
		if(this.auth != true) route.get_page("public/spa/pages/err/auth.html", "auth_err");
	}

	// Проверка является ли пользователь модератором или администратором
	moderation_check() {
		if(this.role != "admin" || this.role != "moderator") {
			route.get_page("public/spa/pages/err/moderation.html", "moderation_err");
		}
	}

	// Выход из авторизации
	logout() {

	}
}

// Создание экземпляра класса
let auth = new Auth;
