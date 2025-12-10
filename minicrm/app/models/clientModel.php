<?php
require_once 'database.php';

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

function insertClientToBDD($data){
    $pdo = getPDO();

    $query = $pdo->prepare("INSERT INTO clients (nom, email, tel, statut, notes, created_at, updated_at)
                           VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
    
    return $query->execute([
        $data['nom'],
        $data['email'],
        $data['tel'],
        $data['statut'],
        $data['notes']
    ]);
}

function deleteClientToBDD($id)
{
    $pdo = getPDO();
    $query = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    return $query->execute([$id]);
}

function updateClientToBDD($data){
       
    $pdo = getPDO();
    $query = $pdo->prepare("
        UPDATE clients 
        SET nom = ?, email = ?, tel = ?, statut = ?, notes = ?, updated_at = NOW()
        WHERE id = ?
    ");

    return $query->execute([
        $data['nom'],
        $data['email'],
        $data['tel'],
        $data['statut'],
        $data['notes'],
        $data['client_id']
    ]);
}