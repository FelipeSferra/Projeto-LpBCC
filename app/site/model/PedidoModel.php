<?php

namespace app\site\model;

use app\core\Model;
use app\site\entities\Cliente;
use app\site\entities\Livro;

class PedidoModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insertPedido(int $livroId, int $clienteId, $dataEmp, $dataDev) {
        $sql = "INSERT INTO pedido_livro (DATA_EMPRESTIMO,DATA_DEVOLUCAO,LIVRO_ID,CLIENTE_ID) ";
        $sql .= " VALUES (:dataEmp, :dataDev, :livroId, :clienteId)";

        $params = [
            ":dataEmp" => $dataEmp,
            ":dataDev" => $dataDev,
            ":livroId" => $livroId,
            ":clienteId" => $clienteId
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;

        return $this->pdo->getLastID();
    }

    public function updateStatus(Livro $livro) {
        $sql = "UPDATE livro SET status = :status, qtde = :qtde where id = :id";

        if ($livro->getStatus() === "Disponivel") {
            $qtde = ($livro->getQtde() - 1);
            $status = "Disponivel";
            if ($qtde == 0) {
                $status = "Indisponivel";
            }
        }
        $params = [
            ":id" => $livro->getId(),
            ":status" => $status,
            ":qtde" => $qtde
        ];
        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function updateDevolucao(Livro $livro, int $pedidoId) {
        $sql = "UPDATE livro, pedido_livro SET livro.status = :status, livro.qtde = :qtde, pedido_livro.D_E_L_E_T_E = '*' WHERE livro.id = :id AND pedido_livro.id_pedido = :idPedido";

        if ($livro->getStatus() === "Indisponivel") {
            $qtde = ($livro->getQtde() + 1);
            $status = "Disponivel";
        } else {
            $status = "Disponivel";
            $qtde = ($livro->getQtde() + 1);
        }

        $params = [
            ":id" => $livro->getId(),
            ":status" => $status,
            ":qtde" => $qtde,
            ":idPedido" => $pedidoId
        ];
        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function update(Cliente $cliente) {
        $sql = "UPDATE cliente SET qtde_emprestimos = :qtde_emprestimos where id = :id";
        $params = [
            ":id" => $cliente->getId(),
            ":qtde_emprestimos" => ($cliente->getQtde() + 1)
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function readById(int $pedidoId) {
        $sql = "SELECT * FROM pedido_livro WHERE id_pedido = :id AND D_E_L_E_T_E IS NULL";

        $dr = $this->pdo->executeQueryOneRow($sql, [
            ":id" => $pedidoId
        ]);

        return $this->collection($dr);
    }

    public function readAll() {
        $sql = "SELECT * FROM pedido_livro WHERE D_E_L_E_T_E IS NULL ORDER BY ID_PEDIDO ASC";

        $dt = $this->pdo->executeQuery($sql);

        $lista = [];

        foreach ($dt as $dr) {
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    private function collection($arr) {
        return (object) [
            "id" => $arr["ID_PEDIDO"] ?? null,
            "data_emprestimo" => $arr["DATA_EMPRESTIMO"] ?? null,
            "data_devolucao" => $arr["DATA_DEVOLUCAO"] ?? null,
            "livroId" => $arr["LIVRO_ID"] ?? null,
            "clienteId" => $arr["CLIENTE_ID"] ?? null
        ];
    }
}
