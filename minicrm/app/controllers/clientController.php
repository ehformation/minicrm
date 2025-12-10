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

    $errors = validate($_POST, [
        'nom' => [ 'required' => true, 'min' => 2 ],
        'email' => [ 'required' => true, 'email' => true ],
        'tel' => [ 'required' => true],
        'notes' => ['min' => 5 ],
    ]);

    displayError($errors, "/clients/create-form");

    if(!insertClientToBDD($_POST)) {
        notification('error', 'Une erreur est survenue');
        redirect("/clients/create-form");
    }

    notification('success', 'Le client a bien été ajouté');
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
