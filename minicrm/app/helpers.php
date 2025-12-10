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

function notification($type, $message) {

    /**
     * Exemple
     * $_SESSION = [
     *   'notification' => [
     *      'error' => 'Le numero de tel est invalide',
     *   ]
     * ]
     * 
     * 
     */ 
    $_SESSION['notification'][$type] = $message;
}

function displayNotification(){
    if(!isset($_SESSION['notification'])){
        return;
    }

    foreach ($_SESSION['notification'] as $type => $message ){

        $color = match($type){
            'success' => 'bg-green-100 text-green-800 border-green-300',
            'error' => 'bg-red-100 text-red-800 border-red-300',
            'info' => 'bg-blue-100 text-blue-800 border-blue-300',
            default => 'bg-gray-100 text-gray-800 border-gray-300'
        };

        echo " <div class='border $color px-4 py-3 rounded mb-4'> $message </div>";
    }

    unset($_SESSION['notification']);

}