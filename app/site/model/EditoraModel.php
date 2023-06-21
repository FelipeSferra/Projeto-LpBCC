<?php

namespace app\site\model;

use app\core\Model;

class EditoraModel {

    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(string $editora) {
        $sql = "INSERT INTO editora (NOME) values (:nome)";
        $params = [
            ":nome" => $editora
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;
        return $this->pdo->getLastID();
    }

    public function update(int $id, string $editora) {
        $sql = "UPDATE editora SET nome = :nome WHERE id = :id";
        $params = [
            ":id" => $id,
            ":nome" => $editora
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function delete(int $id){
        $sql = "UPDATE editora SET D_E_L_E_T_E = '*' WHERE id = :id";

        return $this->pdo->executeNonQuery($sql, [":id" => $id]);
    }

    public function readById(int $editoraId) {
        $sql = "SELECT * FROM editora WHERE id = :id";

        $dr = $this->pdo->executeQueryOneRow($sql, [":id" => $editoraId]);

        return $this->collection($dr);
    }

    public function readAll() {
        $sql = "SELECT * FROM editora WHERE D_E_L_E_T_E IS NULL ORDER BY nome ASC";

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
