<?php
require_once "../app/models/noteModel.php";

function storeNote() {
    insertNoteToBDD($_POST);
    $path = "/clients/show?id=" . $_POST['client_id'];
    redirect($path);
}

function deleteNote() {
    $id = $_GET["id"];
    deleteNoteToBDD($id);
    $path = "/clients/show?id=" . $_POST['client_id'];
    redirect($path);
}
