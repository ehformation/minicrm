<?php
class NoteModel extends Database
{
    protected $table = "client_notes";

    public function store($data){
        return $this->query(
            "INSERT INTO {$this->table} (client_id, contenu, created_at)
             VALUES (?, ?, NOW())",
            [
                $data['client_id'],
                $data['contenu'],
            ]
        );
    }

    public function deleteByClientId($client_id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE client_id = ?", [$client_id]);
    }

    function getByClientId($client_id){
        $query = $this->query("SELECT * FROM {$this->table} WHERE client_id = ?", [$client_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}