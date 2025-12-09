<?php 

require '../app/models/clientModel.php';

function getClients() {
    $clients = getClientsFromDB();
    $title = "Liste des clients";
    $view = '../app/views/client/index.php';
    require "../app/views/layout.php";
}

function getClientById() {
    $id = $_GET['id'];
    $client = getClientByIdFromDB($id);
    $title = "Infos sur le client " . $client['nom'];
    $view = '../app/views/client/show.php';
    require "../app/views/layout.php";
}

function createFormClients() {
    $title = "Ajouter un client";
    $view = '../app/views/client/create-form.php';
    require "../app/views/layout.php";
}

function storeClient() {
    insertClientToBDD($_POST);
    header("Location: " . BASE_URL . "/clients");
}

