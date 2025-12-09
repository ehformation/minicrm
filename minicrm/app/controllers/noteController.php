<?php
require_once "../app/models/noteModel.php";

function storeNote() {
    insertNoteToBDD($_POST);
    header("Location: " . BASE_URL . "/clients/show?id=" . $_POST['client_id']);
}

