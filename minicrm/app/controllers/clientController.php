<?php 

require '../app/models/clientModel.php';

function getClients() {
    $clients = getClientsFromDB();
    require '../app/views/client/index.php';
}

function getClientById() {
    $id = $_GET['id'];
    $client = getClientByIdFromDB($id);
    require '../app/views/client/show.php';
}

function createFormClients() {
    require '../app/views/client/create-form.php';
}

function storeClient() {
    insertClientToBDD($_POST);
    header("Location: " . BASE_URL . "/clients");
}

