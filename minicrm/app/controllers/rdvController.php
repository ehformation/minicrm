<?php 

require '../app/models/rdvModel.php';

function storeRDV() {
    $errors = validate($_POST, [
        'date' => [ 'required' => true],
        'description' => [ 'required' => true, 'min' => 5],
        'client_id' => [ 'required' => true],
    ]);

    displayError($errors, "/clients");

    $path = "/clients/show?id=" . $_POST['client_id'];
    
    if (rdvExists($_POST['date'])) {
        notification('error', 'Ce créneau est déjà réservé.');
        redirect($path);
    }
    if(!insertRDVToBDD($_POST)){
        notification('error', 'Une erreur est survenue');
        redirect($path);
    }

    notification('success', 'Le rendez-vous a bien été crée');
    redirect($path);
}
