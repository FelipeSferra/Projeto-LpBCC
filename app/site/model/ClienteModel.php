<?php

namespace app\site\model;

use app\core\Model;
use app\site\entities\Cliente;

class ClienteModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(Cliente $cliente) {
        $sql = "INSERT INTO cliente (NOME,CEP,ENDERECO,NUMERO,CIDADE,UF) ";
        $sql .= " VALUES (:nome, :cep, :endereco, :numero, :cidade, :uf) ";
        $params = [
            ":nome" => $cliente->getNome(),
            ":cep" => $cliente->getCep(),
            ":endereco" => $cliente->getEndereco(),
            ":numero" => $cliente->getNumero(),
            ":cidade" => $cliente->getCidade(),
            ":uf" => $cliente->getUf()
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;
        return $this->pdo->getLastID();
    }

    public function update(Cliente $cliente) {
        $sql = "UPDATE cliente SET nome = :nome, cep = :cep, endereco = :endereco, ";
        $sql .= "  numero = :numero, cidade = :cidade, uf = :uf WHERE id = :id ";

        $params = [
            ":id" => $cliente->getId(),
            ":nome" => $cliente->getNome(),
            ":cep" => $cliente->getCep(),
            ":endereco" => $cliente->getEndereco(),
            ":numero" => $cliente->getNumero(),
            ":cidade" => $cliente->getCidade(),
            ":uf" => $cliente->getUf(),
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function delete(Cliente $cliente){
        $sql = "UPDATE cliente SET D_E_L_E_T_E = '*' WHERE id = :id";
        $params = [
            ":id" => $cliente->getId()
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function readById(int $clienteId) {
        $sql = "SELECT * FROM cliente WHERE id = :id AND D_E_L_E_T_E IS NULL";

        $dr = $this->pdo->executeQueryOneRow($sql, [":id" => $clienteId]);

        return $this->collection($dr);
    }

    public function readAll() {
        $sql = "SELECT * FROM cliente WHERE D_E_L_E_T_E IS NULL";

        $dt = $this->pdo->executeQuery($sql);
        $lista = [];

        foreach ($dt as $dr) {
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    private function collection($arr) {
        $cliente = new Cliente();
        $cliente->setId($arr["ID"] ?? null);
        $cliente->setNome($arr["NOME"] ?? null);
        $cliente->setCep($arr["CEP"] ?? null);
        $cliente->setEndereco($arr["ENDERECO"] ?? null);
        $cliente->setNumero($arr["NUMERO"] ?? null);
        $cliente->setCidade($arr["CIDADE"] ?? null);
        $cliente->setUf($arr["UF"] ?? null);
        $cliente->setQtde($arr["QTDE_EMPRESTIMOS"] ?? null);

        return $cliente;
    }
}
