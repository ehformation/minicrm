<?php 

$router->get("/", [ClientController::class, "index"]);
$router->get("/clients", [ClientController::class, "index"]);
$router->get("/clients/show/{id}", [ClientController::class, "show"]);
$router->get("/clients/create-form", [ClientController::class, "create"]);
$router->post("/clients/store", [ClientController::class, "store"]);
$router->get("/clients/edit-form/{id}", [ClientController::class, "edit"]);
$router->post("/clients/update/{id}", [ClientController::class, "update"]);
$router->get("/clients/delete/{id}", [ClientController::class, "delete"]);

$router->post("/notes/store", [NoteController::class, "store"]);
$router->get("/notes/delete/{client_id}", [NoteController::class, "delete"]);

$router->post("/rdv/store", [RdvController::class, "store"]);