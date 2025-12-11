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

    public function getAllByMonth($month = null, $year = null) {

        $month = $month ?? date("m");
        $year  = $year ?? date("Y");

        $start = "$year-$month-01";
        $end   = date("Y-m-t", strtotime($start));


        $query = $this->query("
            SELECT {$this->table}.id, {$this->table}.date, {$this->table}.description, {$this->table}.client_id, 
                clients.nom AS client_nom
            FROM {$this->table}
            JOIN clients ON clients.id = {$this->table}.client_id
            WHERE {$this->table}.date BETWEEN ? AND ?
            ORDER BY {$this->table}.date ASC
        ", [
            $start . " 00:00:00",
            $end   . " 23:59:59"
        ]);

        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $byDate = [];

        foreach ($results as $rdv) {

            $date = substr($rdv["date"], 0, 10);
            $heure = substr($rdv["date"], 11, 5);

            $byDate[$date][] = [
                "id"         => $rdv["id"],
                "client_nom"=> $rdv["client_nom"],
                "heure"      => $heure,
                "commentaire"=> $rdv["description"]
            ];
        }

        return $byDate;


    }

}