<?php

class NoteController {
    public function store() {
        $errors = Helpers::validate($_POST, [
            'contenu' => [ 'required' => true, 'min' => 5],
            'client_id' => [ 'required' => true],
        ]);

        $path = "/clients/show/" . $_POST['client_id'];

        Helpers::displayError($errors, $path);

        $noteModel = new NoteModel();
        $insert = $noteModel->store($_POST);

        if(!$insert){
            Helpers::notification('error', 'Une erreur est survenue');
            Helpers::redirect($path);
        }

        Helpers::notification('success', 'La note a bien été crée');
        Helpers::redirect($path);
    }

    function delete($client_id) {

        $path = "/clients/show/$client_id";

        $noteModel = new NoteModel();
        $delete = $noteModel->deleteByClientId($client_id);

        if(!$delete){
            Helpers::notification('error', 'Une erreur est survenue');
            Helpers::redirect($path);
        }

        Helpers::notification('success', 'La note a bien été supprimé');
        Helpers::redirect($path);
    }
}