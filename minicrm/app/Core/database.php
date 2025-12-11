<?php 

// function getPDO()
// {
//     static $pdo = null;

//     if (!$pdo) {
//         $pdo = new PDO("mysql:host=localhost;dbname=minicrm_bdd;charset=utf8", "root", "root");
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     }

//     return $pdo;
// }

class Database {

    protected function db() {
        static $pdo = null;

        if($pdo === null){
            $pdo = new PDO("mysql:host=localhost;dbname=minicrm_bdd;charset=utf8", "root", "root");
        }

        return $pdo;
    }

    protected function query($sql, $params = []){
        $query = $this->db()->prepare($sql);
        $query->execute($params);
        return $query;
    }

}