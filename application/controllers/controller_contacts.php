<?php

class Controller_contacts extends Controller
{
    function action_index()
    {
        // Общий шаблон и вид с контентом страницы передаётся в метод generate экземпляра класса View
        $this->view->generate('contacts_view.php', 'template_view.php');
    }
}
