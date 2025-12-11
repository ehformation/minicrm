<?php

function getRDVByClientId($client_id) {
    $pdo = getPDO();
    $query = $pdo->prepare("SELECT * FROM rdv WHERE client_id = ? ORDER BY date ASC");
    $query->execute([$client_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertRDVToBDD($data) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("INSERT INTO rdv (client_id, date, description) VALUES (?, ?, ?)");
    return $stmt->execute([$data['client_id'], $data['date'], $data['description']]);
}

function rdvExists($date) {
    $pdo = getPDO();

    $start = $date;
    $end   = date("Y-m-d H:i:s", strtotime($date . " +1 hour"));

    $query = $pdo->prepare("
        SELECT COUNT(*) 
        FROM rdv
        WHERE 
            date < ?
        AND 
            DATE_ADD(date, INTERVAL 1 HOUR) > ?
    ");

    $query->execute([$end, $start]);
    return $query->fetchColumn() > 0;
}