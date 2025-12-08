<?php
require 'database.php';

function getClientsFromDB(){
    $pdo = getPDO();
    $query = $pdo->query("SELECT * FROM clients ORDER BY updated_at DESC");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getClientByIdFromDB($id){
    $pdo = getPDO();
    $query = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}