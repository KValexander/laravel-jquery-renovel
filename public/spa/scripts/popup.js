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
			// Сообщение об успешной регистрации
			case("reg_access"):
				this.path = "public/spa/pages/modules/reg_access.html";
				break;
		}
		// Вызов функции загрузки контента в pop-up окно
		route.attach_module(this.path, "popup");
		// Вызов функции отображения окна
		setTimeout(this.show, 100);
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
		let top = `calc(50% - ${ innHeight / 1.7 }px)`;
		let left = `calc(50% - ${ innWidth / 2 }px)`;
		// Присваивание стилей
		$("#popup").css({
			"top": top,
			"left": left
		});

		// Отступы для элемента закрытия pop-up окна
		top = `calc(50% - ${ innHeight / 1.7 + 15 }px)`;
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

	// Функция вывода небольшого всплывающего сообщения
	message: function(message, color) {
		// Отступы
		let left = (this.winInnWidth - 310) + "px";
		let top = "10px";
		// Добавление стилей
		$("#message").css({
			"left": left,
			"top": top,
			"border": "solid 2px " + color,
		});
		// Добавление контента в сообщение
		$("#message").html("<p>" + message + "</p><div></div>");
		// Линия сокращения времени вывода сообщения
		$("#message div").css({
			"position": "relative",
			"top": "5px",
			"height": "5px",
			"width": "100%",
			"border-radius": "5px",
			"background-color": "orange",
		});

		// Открытие сообщения
		$("#message").fadeIn(200, function() {
			$("#message div").animate({
				width: "0px",
			}, 5000);
			$(this).click(function() {
				popup.message_hide();
			});
		});

		// Скрытие сообщения через 5 секунд
		setTimeout(popup.message_hide, 5000);
	},

	// Функция скрытия окна сообщения
	message_hide: function() {
		// Скрытие окна сообщения
		$("#message").fadeOut(200, function() {
			$(this).html("");
		});
	}
};

// Постоянное обновление координат мыши для объекта popup
$(document).mousemove(function(e) {
	popup.clientX = e.clientX;
	popup.clientY = e.clientY;
});