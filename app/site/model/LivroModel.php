<?php

namespace app\site\model;

use app\core\Model;
use app\site\entities\Livro;

class LivroModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new Model();
    }

    public function insert(Livro $livro) {
        $sql = "INSERT INTO livro (TITULO,SLUG,SINOPSE,THUMB,STATUS,GENERO_ID,AUTOR_ID,EDITORA_ID) ";
        $sql .= " VALUES (:titulo, :slug, :sinopse, :thumb, :status, :generoId, :autorId, :editoraId)";
        $params = [
            ":titulo" => $livro->getTitulo(),
            ":slug" => $livro->getSlug(),
            ":sinopse" => $livro->getSinopse(),
            ":thumb" => $livro->getThumb(),
            ":status" => $livro->getStatus(),
            ":generoId" => $livro->getGeneroId(),
            ":autorId" => $livro->getAutorId(),
            ":editoraId" => $livro->getEditoraId()
        ];

        if (!$this->pdo->executeNonQuery($sql, $params))
            return -1;
        return $this->pdo->getLastID();
    }

    public function update(Livro $livro) {
        $sql = "UPDATE livro SET titulo = :titulo, slug = :slug, sinopse = :sinopse, thumb = :thumb, status = :status, genero_id = :generoId, ";
        $sql .= " autor_id = :autorId, editora_id = :editoraId WHERE id = :id";
        $params = [
            ":id" => $livro->getId(),
            ":titulo" => $livro->getTitulo(),
            ":slug" => $livro->getSlug(),
            ":sinopse" => $livro->getSinopse(),
            ":thumb" => $livro->getThumb(),
            ":status" => $livro->getStatus(),
            ":generoId" => $livro->getGeneroId(),
            ":autorId" => $livro->getAutorId(),
            ":editoraId" => $livro->getEditoraId()
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function delete(Livro $livro){
        $sql = "UPDATE livro SET D_E_L_E_T_E = '*' WHERE id = :id";
        $params = [
            ":id" => $livro->getId()
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    public function readById(int $livroId) {
        $sql = "SELECT * FROM livro WHERE id = :id AND D_E_L_E_T_E IS NULL";

        $dr = $this->pdo->executeQueryOneRow($sql, [
            ":id" => $livroId
        ]);

        return $this->collection($dr);
    }

    public function readBySlug(string $livroSlug) {
        $sql = "SELECT * FROM livro WHERE slug = :slug AND D_E_L_E_T_E IS NULL";

        $dr = $this->pdo->executeQueryOneRow($sql, [
            ":slug" => $livroSlug
        ]);
        return $this->collection($dr);
    }

    public function readLast($limit = 10) {
        $sql = "SELECT l.*, g.descricao as genDesc FROM livro l INNER JOIN genero g ON g.id = l.genero_id LIMIT :limit";

        $dt = $this->pdo->executeQuery($sql, [
            ":limit" => $limit
        ]);

        $lista = [];

        foreach($dt as $dr){
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    public function readAll() {
        $sql = "SELECT * FROM livro WHERE D_E_L_E_T_E IS NULL ORDER BY titulo ASC";

        $dt = $this->pdo->executeQuery($sql);

        $lista = [];

        foreach($dt as $dr){
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    public function readAllByGenre(int $generoId) {
        $sql = "SELECT l.*, g.descricao as genDesc FROM livro l INNER JOIN genero g ON g.id = l.genero_id WHERE l.genero_id = :generoId AND l.D_E_L_E_T_E IS NULL";

        $dt = $this->pdo->executeQuery($sql, [
            ":generoId" => $generoId
        ]);

        $lista = [];

        foreach($dt as $dr){
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    public function search(string $termo) {
        $sql = "SELECT l.*, g.descricao as genDesc FROM livro l INNER JOIN genero g ON g.id = l.genero_id WHERE UPPER(l.titulo) LIKE :titulo AND l.D_E_L_E_T_E IS NULL ORDER BY l.titulo DESC";

        $dt = $this->pdo->executeQuery($sql, [
            ":titulo" => strtoupper("%{$termo}%")
        ]);

        $lista = [];

        foreach($dt as $dr){
            $lista[] = $this->collection($dr);
        }

        return $lista;
    }

    private function collection($arr) {
        $livro = new Livro();
        $livro->setId($arr["ID"] ?? null);
        $livro->setTitulo($arr["TITULO"] ?? null);
        $livro->setSlug($arr["SLUG"] ?? null);
        $livro->setSinopse($arr["SINOPSE"] ?? null);
        $livro->setThumb($arr["THUMB"] ?? null);
        $livro->setStatus($arr["STATUS"] ?? null);
        $livro->setGeneroId($arr["GENERO_ID"] ?? null);
        $livro->setGenero($arr["genDesc"] ?? null);
        $livro->setAutorId($arr["AUTOR_ID"] ?? null);
        $livro->setAutor($arr["autorNome"] ?? null);
        $livro->setEditoraId($arr["EDITORA_ID"] ?? null);
        $livro->setEditora($arr["editoraNome"] ?? null);

        return $livro;
    }
}
