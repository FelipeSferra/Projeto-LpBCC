<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\AutorModel;

class AutoresController extends Controller {

    private $autorModel;

    public function __construct() {
        $this->autorModel = new AutorModel();
    }

    public function index() {
        $this->load("autores/main", [
            "listaAutor" => $this->autorModel->readAll()
        ]);
    }

    public function adicionar() {
        $this->load("autores/adicionar");
    }

    public function editar($autorId = 0) {
        $autorId = filter_var($autorId, FILTER_SANITIZE_NUMBER_INT);

        if ($autorId <= 0) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "autores/"
            );
            return;
        }

        $autor = $this->autorModel->readById($autorId);

        if ($autor->nome == null) {
            $this->showMessage(
                "Autor não encontrado",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "autores/"
            );
            return;
        }

        $this->load("autores/editar", [
            "autor" => $autor,
            "autorId" => $autorId
        ]);
    }

    //----------------------------------------------------//

    public function inserir() {
        $autor = filter_input(INPUT_POST, "txtAut", FILTER_SANITIZE_STRING);

        if (strlen($autor) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "autores/adicionar"
            );
            return;
        }

        $result = $this->autorModel->insert($autor);

        if ($result <= 0) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar cadastrar, tente novamente mais tarde!",
                "autores/adicionar"
            );
            return;
        }

        redirect(BASE . "autores/");
    }

    public function alterar($autorId = 0) {
        $autorId = filter_var($autorId, FILTER_SANITIZE_NUMBER_INT);
        $autor = filter_input(INPUT_POST, "txtAut", FILTER_SANITIZE_STRING);

        if ($autorId <= 0 || strlen($autor) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "autores/"
            );
            return;
        }

        if (!$this->autorModel->update($autorId, $autor)) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "autores/"
            );
            return;
        }

        redirect(BASE . "autores/");
    }
}
