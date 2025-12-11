<?php 

// $uri = parse_$helpers->url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// if(strpos($uri, 'public/index.php') !== false) {
//     $uri = substr($uri, strpos($uri, 'public/index.php') + strlen('public/index.php'));
// }

// if($uri === '') {
//     $uri = '/';
// }

// $uri = rtrim($uri, '/');

// switch ($uri) {
//     case '/':
//     case '/clients': 
//         require "../app/controllers/clientController.php";
//         getClients();
//         break;
//     case '/clients/show' :    
//         require "../app/controllers/clientController.php";
//         getClientById();
//         break;
//     case '/clients/create-form' : 
//         require "../app/controllers/clientController.php";
//         createFormClients();
//         break;
//     case '/clients/store' : 
//         require "../app/controllers/clientController.php";
//         storeClient();
//         break;
//     case '/clients/edit-form' : 
//         require "../app/controllers/clientController.php";
//         editFormClients();
//         break;
//     case '/clients/update' : 
//         require "../app/controllers/clientController.php";
//         updateClient();
//         break;
//     case '/clients/delete':
//         require "../app/controllers/clientController.php";
//         deleteClient();
//         break;
//     case '/notes/store' : 
//         require "../app/controllers/noteController.php";
//         storeNote();
//         break;
//     case '/notes/delete' : 
//         require "../app/controllers/noteController.php";
//         deleteNote();
//         break;
//     case '/rdv/store' : 
//         require "../app/controllers/rdvController.php";
//         storeRDV();
//         break;
//     default:
//         echo 'Erreur 404 - Page non trouvé';
// }

$router->get("/clients", [ClientController::class, "index"]);