// Класс для работы с запросами к серверу
class Request {

	// Функция установки заголовков для ajax запросов
	setup() {
		// AJAXSetup
		$.ajaxSetup({
			// Заголовки
			headers: {
				// Токен формы
				"X-CSRF-TOKEN": $("meta[meta='_token']").attr("content"),
				// Токен авторизации
				"Authorization": "Bearer " + auth.token,
				// "Content-Type": "application/json",
			}
		});
	}

	// Метод с AJAX запросом для отправки данных методом get
	get(callback, data, url) {
		// Установка заголовков для ajax запроса
		this.setup();

		// AJAX запрос
		$.ajax({
			url: url, // путь
			method: "GET", // метод
			cache: false, // отсутсвие кеша
			// contentType: "application/json", // тип данных
			data: data, // отправляемые данные
			// В случае успеха
			success: function(data) {
				// Возвращение данных
				callback(data);
			},
			// В случае неудачи
			error: function(jqXHR) {
				// Возвращение данных
				callback(jqXHR);
			}
		});
	}

	// Метод с AJAX запросом для отправки данных методом post
	post(callback, data, url) {
		// Установка заголовков для ajax запроса
		this.setup();

		// AJAX запрос
		$.ajax({
			url: url, // путь
			method: "POST", // метод
			cache: false, // отсутсвие кеша
			// contentType: "json", // тип данных
    		processData: false, // отмена обработки данных
			data: data, // отправляемые данные
			// В случае успеха
			success: function(data) {
				// Возвращение данных
				// return data;
				callback(data);
			},
			// В случае неудачи
			error: function(jqXHR) {
				// Возвращение данных
				callback(jqXHR);
			}
		});
	}
}

// Создание экземпляра класса
let request = new Request;