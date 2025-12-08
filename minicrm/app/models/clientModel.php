<?php
require 'database.php';

function getClientsFromDB(){
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM clients ORDER BY updated_at DESC");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}