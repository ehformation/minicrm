<?php 

function storeRDV() {
    $errors = validate($_POST, [
        'date' => [ 'required' => true],
        'description' => [ 'required' => true, 'min' => 5],
        'client_id' => [ 'required' => true],
    ]);

    displayError($errors, "/clients");

    $path = "/clients/show/" . $_POST['client_id'];
    
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


class RdvController {

    public function store() {
        $errors = Helpers::validate($_POST, [
            'date' => [ 'required' => true],
            'description' => [ 'required' => true, 'min' => 5],
            'client_id' => [ 'required' => true],
        ]);

        Helpers::displayError($errors, "/clients");

        $path = "/clients/show/" . $_POST['client_id'];

        $rdvModel = new RdvModel();
        $exist = $rdvModel->exist($_POST['date']);
        
        if ($exist) {
            Helpers::notification('error', 'Ce créneau est déjà réservé.');
            Helpers::redirect($path);
        }

        $insert = $rdvModel->store($_POST);
        if(!$insert){
            Helpers::notification('error', 'Une erreur est survenue');
            Helpers::redirect($path);
        }

        Helpers::notification('success', 'Le rendez-vous a bien été crée');
        Helpers::redirect($path);
    }
}