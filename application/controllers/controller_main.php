<?php

// namespace Application\Core; - не работает с указанием

class Controller_Main extends Controller
{
    function action_index()
    {
        // Общий шаблон и вид с контентом страницы передаётся в метод generate экземпляра класса View
        $this->view->generate('main_view.php', 'template_view.php');
    }
    // Помимо индексного действия могут быть ещё и другие действия
}
