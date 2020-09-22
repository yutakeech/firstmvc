<?php

class Route
{
	static function start()
	{
		// Контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		// Разбивает строку маршрута после ".com" контроллер/экшн
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// Получаем имя контроллера. Если не пустая: (тут беру 2, ибо после .com/tinymvc/)
		if ( !empty($routes[2]) )
		{
			$controller_name = $routes[2];
		}

		// Получаем имя экшена
		if ( !empty($routes[3]) )
		{
			$action_name = $routes[3];
		}

		// Добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// Подцепляем файл с классом модели (файла модели может и не быть)

        // Получаем имя модели
		$model_file = strtolower($model_name).'.php';
        // Путь к модели
        $model_path = "application/models/".$model_file;
        // Если в нём есть такой путь
        if(file_exists($model_path))
		{
            // Включаем и выполняем указанный файл
			include "application/models/".$model_file;
		}

		// Подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}

		// Создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			// Вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}

	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
