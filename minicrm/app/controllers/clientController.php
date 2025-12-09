<?php 

require '../app/models/clientModel.php';
require '../app/models/noteModel.php';
require '../app/helpers.php';

function getClients() {
    $clients = getClientsFromDB();
    $title = "Liste des clients";

    render('client/index.php', [
        'clients' => $clients
    ], $title);
}

function getClientById() {
    $id = $_GET['id'];
    $client = getClientByIdFromDB($id);
    $title = "Infos sur le client " . $client['nom'];
    $notes = getNotesByClientId($id);

    render('client/show.php', [
        'client' => $client,
        'notes' => $notes
    ], $title);

}

function createFormClients() {
    $title = "Ajouter un client";
    render('client/create-form.php', [], $title);
}

function storeClient() {
    insertClientToBDD($_POST);
    redirect("/clients");
}

function editFormClients() {
    $id = $_GET["id"];
    $client = getClientByIdFromDB($id);
    $title = "Modifier le client " . $client['nom'];

    render('client/edit-form.php', [
        'client' => $client
    ], $title);
}

function updateClient() {
    updateClientToBDD($_POST);
    redirect("/clients");
}

function deleteClient() {
    $id = $_GET["id"];
    deleteClientToBDD($id);
    redirect("/clients");
}
