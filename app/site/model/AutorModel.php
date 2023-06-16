<?php

namespace app\site\model;

use app\core\Model;

class AutorModel {

    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(string $autor) {
        $sql = "INSERT INTO autor (NOME) values (:nome)";
        $params = [
            ":nome" => $autor
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;
        return $this->pdo->getLastID();
    }

    public function update(int $id, string $autor) {
        $sql = "UPDATE autor SET nome = :nome where id = :id";
        $params = [
            ":id" => $id,
            ":nome" => $autor
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function readById(int $autorId) {
        $sql = "SELECT * FROM autor WHERE id = :id";

        $dr = $this->pdo->executeQueryOneRow($sql, [":id" => $autorId]);

        return $this->collection($dr);
    }

    public function readAll() {
        $sql = "SELECT * FROM autor ORDER BY nome ASC";

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
