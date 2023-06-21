<?php

namespace app\site\model;

use app\core\Model;

class LivroModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(string $titulo, string $slug, int $status, int $qtde, int $generoId, int $autorId, int $editoraId) {
        $sql = "INSERT INTO livro (TITULO,SLUG,STATUS,QTDE,GENERO_ID,AUTOR_ID,EDITORA_ID) ";
        $sql .= " VALUES (:titulo, :slug, :status, :qtde, :generoId, :autorId, :editoraId)";
        $params = [
            ":titulo" => $titulo,
            ":slug" => $slug, 
            ":status" => $status, 
            ":qtde" => $qtde,
            ":generoId" => $generoId,
            ":autorId" => $autorId,
            ":editoraId" => $editoraId
            
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }
}
