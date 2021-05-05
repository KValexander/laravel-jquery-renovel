<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Мета для передачи токена ajax запросам -->
	<meta name="_token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Подключение стилей -->
	<link rel="stylesheet" href="{{ asset('public/spa/style/style.css') }}">

	<!-- Подключение библиотеки jquery -->
	<script src="{{ asset('public/spa/library/jquery-3.6.0.min.js') }}"></script>
	<!-- Подключение класса маршрутизации -->
	<script src="{{ asset('public/spa/route.js') }}"></script>
	<!-- Подключение класса проверок авторизации -->
	<script src="{{ asset('public/spa/auth.js') }}"></script>
	<!-- Подключение объекта работы с popup окном -->
	<script src="{{ asset('public/spa/scripts/popup.js') }}"></script>
	<!-- Подключение файла основного скрипта -->
	<script src="{{ asset('public/spa/scripts/main.js') }}"></script>

</head>
<body>
	<header>
		<div class="content">
			<div class="logo">
				<img src="{{ asset('public/spa/images/logo.png') }}" alt="">
				<h1>Novel: re</h1>
			</div>
			<nav id="menu">
			</nav>
		</div>
	</header>

	<!-- Блок, в который будет загружаться вся контентная часть страницы -->
	<div id="app"></div>

	<!-- Подключаемый модуль для popup окна -->
	<div id="popup"></div>

	<!-- Блок для экрана загрузки -->
	<div id="loading_screen"></div>

</body>
</html>