<?php

namespace app\site\model;

use app\core\Model;

class LoginModel {

    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(string $usuario, string $senha) {
        $sql = "INSERT INTO login (usuario,senha) VALUES (:usuario, :senha)";
        $params = [
            ":usuario" => $usuario,
            ":senha" => $senha
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;
        return $this->pdo->getLastID();
    }

    public function update(int $id, string $senha) {
        $sql = "UPDATE login SET senha = :senha WHERE id = :id";
        $params = [
            ":id" => $id,
            ":senha" => $senha
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function readById(int $loginId) {
        $sql = "SELECT * FROM login WHERE id = :id AND D_E_L_E_T_E IS NULL";

        $dr = $this->pdo->executeQueryOneRow($sql, [":id" => $loginId]);

        return $this->collection($dr);
    }

    public function readByUser(string $usuario) {
        $sql = "SELECT * FROM login WHERE usuario = :usuario";

        $dr = $this->pdo->executeQueryOneRow($sql, [":usuario" => $usuario]);

        return $this->collection($dr);
    }

    public function readAll() {
        $sql = "SELECT * FROM login WHERE D_E_L_E_T_E IS NULL ORDER BY usuario ASC";

        $dt = $this->pdo->executeQuery($sql);
        $lista = [];

        foreach ($dt as $dr) {
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    private function collection($arr) {
        return (object) [
            "id" => $arr["id"] ?? null,
            "usuario" => $arr["usuario"] ?? null,
            "senha" => $arr["senha"] ?? null
        ];
    }
}
