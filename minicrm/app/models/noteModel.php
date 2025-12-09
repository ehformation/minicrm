<?php
require_once 'database.php';

function getNotesByClientId($client_id){
    $pdo = getPDO();
    $query = $pdo->prepare("SELECT * FROM client_notes WHERE client_id = ? ORDER BY created_at DESC");
    $query->execute([$client_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertNoteToBDD($data){
    $pdo = getPDO();

    $query = $pdo->prepare("INSERT INTO client_notes (client_id, contenu, created_at)
                           VALUES (?, ?, NOW())");
    
    return $query->execute([
        $data['client_id'],
        $data['contenu'],
    ]);
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