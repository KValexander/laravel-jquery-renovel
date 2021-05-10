// Объект с запросами на:
// 	* query.personal_area(callback) - получение данных о пользователе для личного кабинета,
// 	* query.user_page(id) - получение данных о пользователе для страницы другого пользователя
let query = {
	send: "", // для отправки данных

	// Запрос на получение данных авторизованного пользователя
	personal_area: function(callback) {
		// Отправляемые данные
		this.send = JSON.stringify({
			"user_id": auth.auth.user_id
		});

		// Запрос
		request.post(function(data) {
			callback(data);
		}, this.send, "api/personal_area");
	},

	// Для страницы другого пользователя
	user_page: function(id) {

	},

	// Запрос на получение данных для страницы модерации
	moderation_page: function(callback) {
		// Запрос
		request.get(function(data) {
			callback(data);
		}, null, "api/moderation/main") 
	}

};