<?php 

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if(strpos($uri, 'public/index.php') !== false) {
    $uri = substr($uri, strpos($uri, 'public/index.php') + strlen('public/index.php'));
}

if($uri === '') {
    $uri = '/';
}

$uri = rtrim($uri, '/');

switch ($uri) {
    case '/':
    case '/clients': 
        require "../app/controllers/clientController.php";
        getClients();
        break;
    case '/clients/show' :    
        require "../app/controllers/clientController.php";
        getClientById();
        break;
    case '/clients/create-form' : 
        require "../app/controllers/clientController.php";
        createFormClients();
        break;
    default:
        echo 'Erreur 404 - Page non trouvé';
}