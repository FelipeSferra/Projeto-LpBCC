<?php

namespace app\site\model;

use app\core\Model;

class AutorModel {

    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(string $autor) {
        $sql = "INSERT INTO autor (NOME) VALUES (:nome)";
        $params = [
            ":nome" => $autor
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;
        return $this->pdo->getLastID();
    }

    public function update(int $id, string $autor) {
        $sql = "UPDATE autor SET nome = :nome WHERE id = :id";
        $params = [
            ":id" => $id,
            ":nome" => $autor
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function delete(int $id){
        $sql = "UPDATE autor SET D_E_L_E_T_E = '*' WHERE id=:id";
        
        return $this->pdo->executeNonQuery($sql, [":id" => $id]);
    }

    public function readById(int $autorId) {
        $sql = "SELECT * FROM autor WHERE id = :id AND D_E_L_E_T_E IS NULL";

        $dr = $this->pdo->executeQueryOneRow($sql, [":id" => $autorId]);

        return $this->collection($dr);
    }

    public function readAll() {
        $sql = "SELECT * FROM autor WHERE D_E_L_E_T_E IS NULL ORDER BY nome ASC";

        $dt = $this->pdo->executeQuery($sql);
        $lista = [];

        foreach ($dt as $dr) {
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    private function collection($arr) {
        return (object) [
            "id" => $arr["ID"] ?? null,
            "nome" => $arr["NOME"] ?? null
        ];
    }
}
