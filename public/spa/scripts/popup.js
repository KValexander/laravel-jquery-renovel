// Объект работы c pop-up окном
let popup = {
	// Функция распределения загрузки контента в pop-up окно
	// в зависимости от названия страницы
	pagename: function(pagename) {
		// Вызов функции отображения окна
		this.show();
		// Прогон по именам
		switch(pagename) {
			// Авторизация
			case("login"):
				break;
			// Регистрация
			case("register"):
				break;
		}
	},

	// Функция отображения pop-up окна
	show: function() {

	},

	// Функция сокрытия pop-up окна
	hide: function() {

	},

	// Функция загрузки контента в pop-up окно
	content: function() {

	}

};