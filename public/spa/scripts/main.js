// После загрузки DOM
$(function() {
	// Исполнение код спустя 200 миллисекунд после загрузки DOM
	setTimeout(function() {
		
		// Подключение меню
		route.attach_module("public/spa/pages/modules/menu.html", "menu");

		// Вызов функции сокрытия экрана загрузки
		hide_ls();
	}, 250);

});

// Функция скрытия экрана загрузки
let hide_ls = function() {
	// Рандомное число
	let n = Math.floor(Math.random() * 4); // от 0 до 3
	n = 1;
	// Разные анимации сокрытия экрана
	switch(n) {
		case 0: $("#loading_screen").animate({width: "0px"}, 200, "linear", function() { $(this).css("display", "none"); }); break;
		case 1: $("#loading_screen").fadeOut(200); break;
		case 2: $("#loading_screen").hide(200); break;
		case 3: $("#loading_screen").slideUp(200); break;
		default: $("#loading_screen").fadeOut(200); break;
	};
}

// Функция приравнивания сайдбара к высоте контеной части
let height_sidebar = function() {
	$("#app .sidebar").css("min-height", $("#app").height() + "px");
}
