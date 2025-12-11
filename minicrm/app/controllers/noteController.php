<?php




class NoteController {
    public function store() {
        $errors = Helpers::validate($_POST, [
            'contenu' => [ 'required' => true, 'min' => 5],
            'client_id' => [ 'required' => true],
        ]);

        Helpers::displayError($errors, "/clients/edit-form");

        $path = "/clients/show/" . $_POST['client_id'];

        $noteModel = new NoteModel();
        $insert = $noteModel->store($_POST);

        if(!$insert){
            Helpers::notification('error', 'Une erreur est survenue');
            Helpers::redirect($path);
        }

        Helpers::notification('success', 'La note a bien été crée');
        Helpers::redirect($path);
    }

    function delete() {
        $errors = Helpers::validate($_GET, [
            'id' => [ 'required' => true],
            'client_id' => [ 'required' => true],
        ]);

        Helpers::displayError($errors, "/clients");

        $id = $_GET["id"];
        $client_id = $_GET["client_id"];
        $path = "/clients/show/$client_id";

        $noteModel = new NoteModel();
        $delete = $noteModel->delete($id);

        if(!$delete){
            Helpers::notification('error', 'Une erreur est survenue');
            Helpers::redirect($path);
        }

        Helpers::notification('success', 'La note a bien été supprimé');
        Helpers::redirect($path);
    }
}