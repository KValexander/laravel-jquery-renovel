// Объект работы с посимвольным выводом текста на экран
let gto = {
	count_line: 0, // количество линий
	current_line: 0, // текущая линия
	count_symbol: 0, // количество символов в линии
	current_symbol: 0, // текущая линия
	el_out: "", // элемент для вывода символов
	arr_lines: [], // массив текста
	arr_symbols: [], // массив с символами линнии
	gto_state: false, // состояние работы
	// Функция первичной работы с текстом
	receiving_text: function(arr_lines, element_id) {
		// Если состояние работы активное, то не начинаем работу
		if (gto.gto_state == true) return;
		// Начинаем работу
		gto.gto_state = true;

		// Получение количества линий текста
		gto.count_line = arr_lines.length;
		gto.el_out = "#" + element_id;
		gto.arr_lines = arr_lines;

		// Вызов функции работы с последовательностью вывода
		gto.work_with_sequence(gto.current_line = 0);
	},
	// Функция работы с последовательностью вывода
	work_with_sequence: function(s) {
		// Если количество линий закончилось, то заканчиваем работу кода
		if(gto.current_line >= gto.count_line) return gto.gto_state = false;

		// Получение символов строки
		gto.arr_symbols = gto.arr_lines[gto.current_line].split("");
		// Количество символов в строке
		gto.count_symbol = gto.arr_symbols.length;
		// Текущий символ
		gto.current_symbol = 0;

		// Вызов функции вывода символов
		gto.gradual_text_out();
	},
	// Для нового вызова функции через определённое время
	self_callback: function() {
		gto.work_with_sequence(gto.current_line += 1)
	},
	// Функция посимвольного вывода
	gradual_text_out: function() {
		// Если символ строки первый, то выводим в начало текущий символ
		if(gto.current_symbol == 0) $(gto.el_out).html(gto.arr_symbols[gto.current_symbol])
		// Иначе добавляем символы последовательно
		else $(gto.el_out).append(gto.arr_symbols[gto.current_symbol]);

		// Увеличение текущего символа на 1
		gto.current_symbol += 1;

		// Если все символы выведены, то переходим на следующую строку
		if(gto.current_symbol >= gto.count_symbol)
			setTimeout(gto.self_callback, 1000);
		// Иначе ещё вновь вызываем саму себя через определённое время 
		else setTimeout(gto.gradual_text_out, 70);
	},
};