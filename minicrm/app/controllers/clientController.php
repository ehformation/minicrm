<?php 

class ClientController 
{
    public function index()
    {
        $clientModel = new ClientModel();
        $clients = $clientModel->getAll();

        View::render('client/index', [
            'title' => "Liste des clients",
            'clients' => $clients
        ]);
    }

    public function show($id) {

        $clientModel = new ClientModel();
        $noteModel = new NoteModel();
        $rdvModel = new RdvModel();

        $client = $clientModel->getById($id);
        $notes = $noteModel->getByClientId($id);
        $rdvs = $rdvModel->getByClientId($id);

        View::render('client/show', [
            'title' => "Infos sur le client " . $client['nom'],
            'client' => $client,
            'notes' => $notes,
            'rdvs' => $rdvs
        ]);
    }

    public function create() {
        View::render('client/create-form', [
            'title' => "Ajouter un client"
        ]);
    }

    public function store()
    {
        $errors = Helpers::validate($_POST, [
            'nom'   => ['required' => true, 'min' => 2],
            'email' => ['required' => true, 'email' => true],
            'tel'   => ['required' => true, 'tel' => true, 'max' => 30],
            'notes' => ['min' => 5],
        ]);

        Helpers::displayError($errors, "/clients/create");

        $clientModel = new ClientModel();
        $insert = $clientModel->store($_POST);

        if (!$insert) {
            Helpers::notification('error', "Une erreur est survenue lors de l'ajout du client.");
            Helpers::redirect("/clients/create");
            return;
        }

        Helpers::notification('success', "Le client a bien été ajouté !");
        Helpers::redirect("/clients");
    }

    public function edit($id)
    {
        $clientModel = new ClientModel();
        $client = $clientModel->getById($id);

        if (!$client) {
            Helpers::notification('error', "Client introuvable.");
            Helpers::redirect("/clients");
            return;
        }

        View::render("client/edit-form", [
            "title"  => "Modifier le client " . $client["nom"],
            "client" => $client
        ]);
    }

    public function update($id)
    {
        $errors = Helpers::validate($_POST, [
            'nom'       => ['required' => true, 'min' => 2],
            'email'     => ['required' => true, 'email' => true],
            'tel'       => ['required' => true],
            'notes'     => ['min' => 5],
        ]);

        // si erreurs → notification + redirect automatique
        Helpers::displayError($errors, "/clients/edit/$id");

        $clientModel = new ClientModel();

        $ok = $clientModel->update($id, $_POST);

        if (!$ok) {
            Helpers::notification('error', "Une erreur est survenue.");
            Helpers::redirect("/clients/edit/$id");
            return;
        }

        Helpers::notification('success', "Le client a bien été modifié !");
        Helpers::redirect("/clients");
    }


    public function delete($id)
    {
        // Validation
        if (empty($id)) {
            Helpers::notification('error', "ID manquant.");
            Helpers::redirect("/clients");
            return;
        }

        $clientModel = new ClientModel();

        $ok = $clientModel->delete($id);

        if (!$ok) {
            Helpers::notification('error', "Une erreur est survenue.");
            Helpers::redirect("/clients");
            return;
        }

        Helpers::notification('success', "Le client a bien été supprimé !");
        Helpers::redirect("/clients");
    }

}