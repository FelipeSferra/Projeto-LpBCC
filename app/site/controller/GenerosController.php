<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\GeneroModel;

class GenerosController extends Controller {

    private $generoModel;

    public function __construct() {
        $this->generoModel = new GeneroModel();
    }

    public function index() {
        $this->load("generos/main", [
            "listaGenero" => $this->generoModel->readAll()
        ]);
    }

    public function adicionar() {
        $this->load("generos/adicionar");
    }

    public function editar($generoId = 0) {
        $generoId = filter_var($generoId, FILTER_SANITIZE_NUMBER_INT);

        if ($generoId <= 0) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "generos/editar" . $generoId
            );
            return;
        }

        $genero = $this->generoModel->readById($generoId);

        if ($genero->descricao == null) {
            $this->showMessage(
                "Gênero não encontrado",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "generos/editar" . $generoId
            );
            return;
        }

        $this->load("generos/editar", [
            "genero" => $genero,
            "generoId" => $generoId
        ]);
    }

    //----------------------------------------------------//

    public function inserir() {
        $genero = filter_input(INPUT_POST, "txtGen", FILTER_SANITIZE_STRING);

        if (strlen($genero) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "generos/adicionar"
            );
            return;
        }
        $result = $this->generoModel->insert($genero);
        if ($result <= 0) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar cadastrar, tente novamente mais tarde!",
                "generos/adicionar"
            );
            return;
        }

        redirect(BASE . "generos/");
    }

    public function alterar($generoId = 0) {
        $generoId = filter_var($generoId, FILTER_SANITIZE_NUMBER_INT);
        $genero = filter_input(INPUT_POST, "txtGen", FILTER_SANITIZE_STRING);

        if ($generoId <= 0 || strlen($genero) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "generos/editar" . $generoId
            );
            return;
        }

        if (!$this->generoModel->update($generoId, $genero)) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "generos/editar" . $generoId
            );
            return;
        }

        redirect(BASE . "generos/");
    }
}
