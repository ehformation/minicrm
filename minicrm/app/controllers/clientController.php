<?php 

require_once '../app/models/clientModel.php';

function getClients() {
    $clients = getClientsFromDB();
    require '../app/views/client/index.php';
}