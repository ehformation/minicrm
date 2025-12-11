<?php

function storeNote() {
    $errors = validate($_POST, [
        'contenu' => [ 'required' => true, 'min' => 5],
        'client_id' => [ 'required' => true],
    ]);

    displayError($errors, "/clients/edit-form");

    $path = "/clients/show/" . $_POST['client_id'];

    if(!insertNoteToBDD($_POST)){
        notification('error', 'Une erreur est survenue');
        redirect($path);
    }

    notification('success', 'La note a bien été crée');
    redirect($path);
}

function deleteNote() {
    $errors = validate($_GET, [
        'id' => [ 'required' => true],
        'client_id' => [ 'required' => true],
    ]);

    displayError($errors, "/clients");

    $id = $_GET["id"];
    $client_id = $_GET["client_id"];
    $path = "/clients/show/$client_id";

    if(!deleteNoteToBDD($id)){
        notification('error', 'Une erreur est survenue');
        redirect($path);
    }

    notification('success', 'La note a bien été supprimé');
    redirect($path);
}
