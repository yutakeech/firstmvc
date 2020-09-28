<?php

// namespace Application\Core; - не нужен, поскольку в файле bootstrap.php через require_once подключены все файлы ядра

class Controller_Main extends Controller
{
    function action_index()
    {
        // Общий шаблон и вид с контентом страницы передаётся в метод generate экземпляра класса View
        $this->view->generate('main_view.php', 'template_view.php');
    }
    // Помимо индексного действия могут быть ещё и другие действия
}
