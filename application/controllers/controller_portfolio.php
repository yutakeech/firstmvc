<?php

class Controller_Portfolio extends Controller
{

	function __construct()
	{
		$this->model = new Model_Portfolio();
		$this->view = new View();
	}

	function action_index()
	{
        // Метод выборки данных из Model
        $data = $this->model->get_data();
        // Метод формирования вида с учётом модели
		$this->view->generate('portfolio_view.php', 'template_view.php', $data);
	}
}
