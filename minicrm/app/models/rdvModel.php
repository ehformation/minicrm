<?php
class RdvModel extends Database {

    protected $table = "rdv";

    function getByClientId($client_id){
        $query = $this->query("SELECT * FROM {$this->table} WHERE client_id = ?", [$client_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($data){
        return $this->query(
            "INSERT INTO {$this->table} (client_id, date, description) VALUES (?, ?, ?)",
            [
                $data['client_id'], 
                $data['date'], 
                $data['description']
            ]
        );
    }

    public function exist($date) {
        $start = $date;
        $end   = date("Y-m-d H:i:s", strtotime($date . " +1 hour"));

        $query = $this->query("SELECT COUNT(*) FROM rdv WHERE date < ? AND DATE_ADD(date, INTERVAL 1 HOUR) > ?", [$end, $start]);

        return $query->fetchColumn() > 0;
    }

}