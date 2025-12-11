<?php 

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
    $rdvs = getRDVByClientId($id);

    render('client/show.php', [
        'client' => $client,
        'notes' => $notes,
        'rdvs' => $rdvs
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
        'tel' => [ 'required' => true, 'tel' => true, 'max' => 30],
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
    $errors = validate($_POST, [
        'nom' => [ 'required' => true, 'min' => 2 ],
        'email' => [ 'required' => true, 'email' => true ],
        'tel' => [ 'required' => true],
        'notes' => ['min' => 5 ],
        'client_id' => [ 'required' => true],
    ]);

    displayError($errors, "/clients/edit-form");

    if(!updateClientToBDD($_POST)){
        notification('error', 'Une erreur est survenue');
        redirect("/clients/edit-form");
    }

    notification('success', 'Le client a bien été modifié');
    redirect("/clients");
}

function deleteClient() {
    

    $errors = validate($_GET, [
        'id' => [ 'required' => true],
    ]);

    displayError($errors, "/clients");

    $id = $_GET["id"];

    if(!deleteClientToBDD($id)){
        notification('error', 'Une erreur est survenue');
        redirect("/clients");
    }

    notification('success', 'Le client a bien été supprimé');
    redirect("/clients");
}
