<?php

namespace app\site\model;

use app\core\Model;

class GeneroModel {

    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(string $genero) {
        $sql = "INSERT INTO genero (DESCRICAO) VALUES (:descricao)";
        $params = [
            ":descricao" => $genero
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;
        return $this->pdo->getLastID();
    }

    public function update(int $id, string $genero) {
        $sql = "UPDATE genero SET descricao = :descricao WHERE id = :id";
        $params = [
            ":id" => $id,
            ":descricao" => $genero
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function delete(int $id) {
        $sql = "UPDATE genero SET D_E_L_E_T_E = '*' WHERE id = :id";

        return $this->pdo->executeNonQuery($sql,[":id" => $id]);
    }

    public function readById(int $generoId) {
        $sql = "SELECT * FROM genero WHERE id = :id";

        $dr = $this->pdo->executeQueryOneRow($sql, [":id" => $generoId]);

        return $this->collection($dr);
    }

    public function readAll() {
        $sql = "SELECT * FROM genero WHERE D_E_L_E_T_E IS NULL ORDER BY descricao ASC";

        $dt = $this->pdo->executeQuery($sql);
        $lista = [];

        foreach ($dt as $dr)
            $lista[] = $this->collection($dr);;

        return $lista;
    }

    private function collection($arr) {
        return (object) [
            "id" => $arr["ID"] ?? null,
            "descricao" => $arr["DESCRICAO"] ?? null
        ];
    }
}
