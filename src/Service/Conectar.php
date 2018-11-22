<?php

namespace App\Service;

class Conectar
{
    public function connect()
    {
        try {
            $connection = new \PDO("mysql:host=localhost;dbname=teste","eduardo","ressaca31");
            return $connection;
        }
        catch(\PDOException $e) {
            return "Erro ao conectar:" . $e->getMessage();
        }
    }
}
