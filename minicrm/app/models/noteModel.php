<?php
require_once 'database.php';

function getNotesByClientId($client_id){
    $pdo = getPDO();
    $query = $pdo->prepare("SELECT * FROM client_notes WHERE client_id = ? ORDER BY created_at DESC");
    $query->execute([$client_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}