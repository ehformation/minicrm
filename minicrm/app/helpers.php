<?php

function render($viewName, $data = [], $title = ""){

    extract($data);
    $title = "miniCRM - " . $title;
    $view = "../app/views/" . $viewName;
    require "../app/views/layout.php";
}

function redirect($path) {
    header("Location: " . BASE_URL . $path);
    exit;
}

function url($path) {
    return BASE_URL . $path;
}

function validation() {
    return;
}