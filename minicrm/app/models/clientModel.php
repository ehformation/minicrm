<?php

class ClientModel extends Database
{
    protected $table = "clients";

    public function getById($id)
    {
        $query = $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $query = $this->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($data)
    {
        return $this->query(
            "INSERT INTO {$this->table} (nom, email, tel, statut, notes, created_at, updated_at)
             VALUES (?, ?, ?, ?, ?, NOW(), NOW())",
            [
                $data['nom'],
                $data['email'],
                $data['tel'],
                $data['statut'],
                $data['notes']
            ]
        );
    }

    public function update($id, $data)
    {
        return $this->query(
            "UPDATE {$this->table}
             SET nom = ?, email = ?, tel = ?, statut = ?, notes = ?, updated_at = NOW()
             WHERE id = ?",
            [
                $data['nom'],
                $data['email'],
                $data['tel'],
                $data['statut'],
                $data['notes'],
                $id
            ]
        );
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
