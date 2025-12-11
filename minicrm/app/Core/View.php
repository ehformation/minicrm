<?php

abstract class View {
    
    public static function render($view, $params = []){
        extract($params);

        $helpers = new Helpers();

        $viewFile = "../app/Views/" . $view . ".php";

        if (!file_exists($viewFile)) {
            die("Vue introuvable : " . $viewFile);
        }

        require "../app/Views/layout.php";
    }
}