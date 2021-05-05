// После загрузки DOM
$(function() {
	// Исполнение код спустя 200 миллисекунд после загрузки DOM
	setTimeout(function() {

		// Подключение меню к хедеру
		route.attach_module("public/spa/pages/modules/menu.html", "menu");


		// Вызов функции сокрытия экрана загрузки
		hide_ls();
	}, 250);

});

// Функция скрытия экрана загрузки
let hide_ls = function() {
	// Рандомное число
	let n = 2;
	// Разные анимации сокрытия экрана
	switch(n) {
		case 1: $("#loading_screen").animate({width: "0px"}, 200, "linear", function() { $(this).css("display", "none"); }); break;
		case 2: $("#loading_screen").fadeOut(200); break;
		case 3: $("#loading_screen").hide(200); break;
		case 4: $("#loading_screen").slideUp(200); break;
		default: $("#loading_screen").fadeOut(200); break;
	};
}

// Функция посимвольного вывода текста на экран
function gradual_text_out(arr_text, id_element) {
	
}