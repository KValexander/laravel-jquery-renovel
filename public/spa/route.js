// Файл класса работы с маршрутами
class Route {

	// Метод инициализации класса
	counstruct() {
		// Находимся на главной странице
		window.history.pushState('route', '', '/');
	}

	// Функция проверки адресной строки при загрузке проверки
	check_pathname() {
		// Получение текущего пути 
		let pathname = location.pathname;
		// Если мы не на главной странице
		if(pathname != "/") {
			// Находим название нашего пути
			pathname = pathname.split("/");
			// Переходим на страницу нашего пути
			route.redirect(pathname[1]);
		// Если на главной
		} else {
			// Переходим на главную страницу
			route.redirect('index');
		}
	}

	// Метод распределения маршрутов
	redirect(page) {
		// Путь до страницы
		let path = "public/spa/pages/" + page + ".html";
		// Название url строки
		let url = "/" + page;
		// Если переходим на главную страницу
		if(page == "index") url = "/"
		// Вызов метода перенправления на нужную страницу
		this.route(path, url);
	}

	// Перенаправление на нужную страницу с изменением адресной строки
	// и без перезагрузки страницы
	route(path, url) {
		// Изменение маршрута адресной строки
		window.history.replaceState('route', '', url);

		// AJAX запрос
		$.ajax({
			url: path, // путь
			type: "GET", // метод
			success: function(data) {
				// Загрузка данных полученной страницы
				$("#app").html(data);
			}
		});
	}

	// Метод с AJAX запросом для отправки данных методом get
	get(data, path, type) {
		// AJAX запрос
		$.ajax({
			url: path, // путь
			method: "GET", // метод
			contentType: "application/json", // тип данных
			data: data, // отправленные данные
			// В случае успеха
			success: function(data) {
				// Возвращение данных
				return data;
			},
			// В случае неудачи
			error: function(jqXHR) {
				// Возвращение данных
				return jqXHR;
			}
		});
	}

	// Метод с AJAX запросом для отправки данных методом post
	post(data, path, type) {
		// AJAXSetup
		$.ajaxSetup({
			// Заголовки
			headers: {
				// Токен
				"X-CSRF-TOKEN": $("meta[meta='_token']").attr("content")
			}
		});

		// AJAX запрос
		$.ajax({
			url: path, // путь
			method: "POST", // метод
			contentType: "application/json", // тип данных
			data: data, // данные
			// В случае успеха
			success: function(data) {
				// Возвращение данных
				return data;
			},
			// В случае неудачи
			error: function(jqXHR) {
				// Возвращение данных
				return jqXHR;
			}
		});
	}
}

// Создание экземпляра класса
let route = new Route;

// Код срабатывает при загрузке страницы
$(function() {
	// Вызов функции проверки текущего пути
	route.check_pathname()
});