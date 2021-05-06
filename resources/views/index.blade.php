<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Мета для передачи токена ajax запросам -->
	<meta name="_token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Подключение стилей
	=========================================-->
	<!-- Подключение основных стилей -->
	<link rel="stylesheet" href="{{ asset('public/spa/style/style.css') }}">

	<!-- Подключение библиотек
	=========================================-->
	<!-- Подключение библиотеки jquery -->
	<script src="{{ asset('public/spa/library/jquery-3.6.0.min.js') }}"></script>

	<!-- Подключение классов
	=========================================-->
	<!-- Подключение класса маршрутизации -->
	<script src="{{ asset('public/spa/route.js') }}"></script>
	<!-- Подключение класса для отправки запросов серверу -->
	<script src="{{ asset('public/spa/request.js') }}"></script>
	<!-- Подключение класса проверок авторизации -->
	<script src="{{ asset('public/spa/auth.js') }}"></script>

	<!--
		* Занятые переменные:
		* route - экземпляр класса Route
				для работы с маршрутизацией на клиента
		* 	Методы:
			* route.redirect(htmlfilename) - загрузка кода страницы в контентую часть сайта с измением адресной строки
				путь получения файла "public/spa/pages/" + htmlfilename +".html";
			* route.attach_module(path_to_htmlfilename, element_id) - загрузка кода страницы в указанный элемент
				путь указывается в формате "public/spa/pages/htmlfilename.html"

		* auth - экземпляр класса Auth
				для работы с авторизацией и подобным
		* 	Методы:
			* auth.session() - получение данных сессии и запись их в переменные
				* auth.token - переменная токена сессии
				* auth.user_id - переменная идентификатора пользователя
				* auth.role - переменная роли пользователя
			* auth.auth_check() - проверка на то, является ли пользователь авторизованным, или нет
				в случае неавторизованности перенаправление на страницу ошибки авторизации
			* auth.moderation_check() - проверка на то, является ли пользователь администратором/модератором, или нет
				в случае неавторизованности перенаправление на страницу ошибки модерации

		* request - экземпляр класса Request
				для работы с запросами к серверу
		* 	Методы:
			* request.get(function(data) {}, data, url) - отправка данных серверу методом GET
			* request.post(function(data) {}, data, url) - отправка данных серверу методом POST
				явлются функциями обратного вызова из-за медленной скорости ajax запросов
	-->

	<!-- Подключение объектов
	=========================================-->
	<!-- Подключение объекта работы с popup окном -->
	<script src="{{ asset('public/spa/scripts/popup.js') }}"></script>
	<!-- Подключение объекта посимвольного вывода текста -->
	<script src="{{ asset('public/spa/scripts/gto.js') }}"></script>

	<!-- 
		* popup - объект работы с pop-up окном
			находится в отдельном файле по пути public/spa/scripts/popup.js
		*	Функции:
			* popup.pagename(pagename) - вызов pop-up окна по зарезервированному имени с сответствующим контентом

		* gto - объект для посимвольного вывода текста
			находится в отдельном файле по пути public/spa/scripts/gto.js
		*	Функции:
			* gto.receiving_text(arrtext, element_id) - посимвольно выводит указанные массив текста в указанный элемент страницы
	-->

	<!-- Подключение скриптов
	=========================================-->
	<!-- Подключение файла основного скрипта -->
	<script src="{{ asset('public/spa/scripts/main.js') }}"></script>

</head>
<body>
	<header>
		<div class="content">
			<div class="logo">
				<img src="{{ asset('public/spa/images/logo.png') }}" alt="">
				<h1 onclick="route.redirect('index')">Novel: re</h1>
			</div>
			<nav id="menu">
			</nav>
		</div>
	</header>

	<!-- Блок, в который будет загружаться вся контентная часть страницы -->
	<div id="app"></div>

	<!-- Подключаемый модуль для popup окна -->
	<div id="popup"></div>
	<!-- Элемент закрытия popup окна -->
	<div id="popup_close"></div>
	<!-- Маска для заднего фона при включении popup окна -->
	<div id="mask"></div>

	<!-- Блок для экрана загрузки -->
	<div id="loading_screen"></div>

</body>
</html>