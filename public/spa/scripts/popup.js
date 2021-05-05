// Объект работы c pop-up окном
let popup = {
	// Переменная пути
	path: "",
	// Размеры внутреннего экрана браузера
	winInnWidth: document.documentElement.clientWidth,
	winInnHeight: document.documentElement.clientHeight,
	// Координаты мыши
	clientX: "",
	clientY: "",
	// Состояние pop-up окна. true - открыт, false - закрыт;
	popup_state: false,

	// Функция распределения загрузки контента в pop-up окно
	// в зависимости от названия страницы
	pagename: function(pagename) {
		// Прогон по именам
		switch(pagename) {
			// Авторизация
			case("login"):
				this.path = "public/spa/pages/modules/login.html";
				break;
			// Регистрация
			case("register"):
				this.path = "public/spa/pages/modules/register.html";
				break;
		}
		// Вызов функции загрузки контента в pop-up окно
		route.attach_module(this.path, "popup");
		// Вызов функции отображения окна
		setTimeout(this.show, 10);
	},

	// Функция отображения pop-up окна
	show: function() {
		// Отображение элементов
		$("#popup").fadeIn(200);
		$("#popup_close").fadeIn(200);
		$("#mask").fadeIn(200);

		// Размеры окна pop-up
		let innWidth = $("#popup").innerWidth();
		let innHeight = $("#popup").innerHeight();
		// Изменение отступов слева и сверху для центрирования окна
		let top = `calc(50% - ${ innHeight / 1.5 }px)`;
		let left = `calc(50% - ${ innWidth / 2 }px)`;
		// Присваивание стилей
		$("#popup").css({
			"top": top,
			"left": left
		});

		// Отступы для элемента закрытия pop-up окна
		top = `calc(50% - ${ innHeight / 1.5 + 15 }px)`;
		left = `calc(50% + ${ innWidth / 2 - 10 }px)`;
		// Присваивание стилей
		$("#popup_close").css({
			"top": top,
			"left": left
		});

		// Присваивание события скрытия pop-up окна
		$("#mask").click(function() {
			popup.hide();
		});
		$("#popup_close").click(function() {
			popup.hide();
		});

		// Изменение состояния pop-up окна
		this.popup_state = true;
	},

	// Функция сокрытия pop-up окна
	hide: function() {
		// Скрытие pop-up окна с последующим удаление контента внутри
		$("#popup").fadeOut(200, function() {
			$(this).html("");
		});
		// Скрытие остальных элементов pop-up окна
		$("#popup_close").fadeOut(200);
		$("#mask").fadeOut(200);

		// Изменение состояния pop-up окна
		this.popup_state = false;
	},
};

// Постоянное обновление координат мыши для объекта popup
$(document).mousemove(function(e) {
	popup.clientX = e.clientX;
	popup.clientY = e.clientY;
});