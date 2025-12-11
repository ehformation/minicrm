<?php

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

function deleteNoteToBDD($id)
{
    $pdo = getPDO();
    $query = $pdo->prepare("DELETE FROM client_notes WHERE id = ?");
    return $query->execute([$id]);
}