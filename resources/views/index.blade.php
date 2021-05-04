<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Мета для передачи токена ajax запросам -->
	<meta name="_token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Подключение библиотеки jquery -->
	<script src="{{ asset('public/spa/library/jquery-3.6.0.min.js') }}"></script>

	<!-- Подключение класса маршрутизации -->
	<script src="{{ asset('public/spa/route.js') }}"></script>

</head>
<body>
		
	<!-- Блок, в который будет загружаться вся контентная часть страницы -->
	<div id="app"></div>



</body>
</html>