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

</head>
<body>
	<header>
		<div class="content">
			<div class="logo">
				<img src="{{ asset('public/spa/images/logo.png') }}" alt="">
				<h1>Novel: re</h1>
			</div>
			<nav>
				<a onclick="route.redirect('index')">Главная</a>
				<a onclick="route.redirect('novels')">Визуальные новеллы</a>
				<a onclick="route.redirect('register')">Регистрация</a>
				<a onclick="route.redirect('login')">Авторизация</a>
			</nav>
		</div>
	</header>

	<!-- Блок, в который будет загружаться вся контентная часть страницы -->
	<div id="app"></div>

</body>
</html>