<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\EditoraModel;

class EditorasController extends Controller {

    private $editoraModel;

    public function __construct() {
        $this->editoraModel = new EditoraModel();
    }

    public function index() {
        $this->load("editoras/main", [
            "listaEditora" => $this->editoraModel->readAll()
        ]);
    }

    public function adicionar() {
        $this->load("editoras/adicionar");
    }

    public function editar($editoraId = 0) {
        $editoraId = filter_var($editoraId, FILTER_SANITIZE_NUMBER_INT);

        if ($editoraId <= 0) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "editoras/"
            );
            return;
        }

        $editora = $this->editoraModel->readById($editoraId);

        if ($editora->nome == null) {
            $this->showMessage(
                "Editora não encontrada",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "editoras/"
            );
            return;
        }

        $this->load("editoras/editar", [
            "editora" => $editora,
            "editoraId" => $editoraId
        ]);
    }

    public function visualizar($editoraId = 0){
        $editoraId = filter_var($editoraId, FILTER_SANITIZE_NUMBER_INT);

        $editora = $this->editoraModel->readById($editoraId);

        if ($editora->nome == null) {
            $this->showMessage(
                "Editora não encontrada",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "editoras/"
            );
            return;
        }

        $this->load("editoras/visualizar", [
            "editora" => $editora,
            "editoraId" => $editoraId
        ]);
    }

    //----------------------------------------------------//

    public function inserir() {
        $editora = filter_input(INPUT_POST, "txtEdt", FILTER_SANITIZE_STRING);

        if (strlen($editora) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "editoras/adicionar"
            );
            return;
        }
        $result = $this->editoraModel->insert($editora);
        if ($result <= 0) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar cadastrar, tente novamente mais tarde!",
                "editoras/adicionar"
            );
            return;
        }

        redirect(BASE . "editoras/");
    }

    public function alterar($editoraId = 0) {
        $editoraId = filter_var($editoraId, FILTER_SANITIZE_NUMBER_INT);
        $editora = filter_input(INPUT_POST, "txtEdt", FILTER_SANITIZE_STRING);

        if ($editoraId <= 0 || strlen($editora) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "editoras/"
            );
            return;
        }

        if (!$this->editoraModel->update($editoraId, $editora)) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "editoras/"
            );
            return;
        }

        redirect(BASE . "editoras/");
    }

    public function excluir($editoraId){
        $editoraId = filter_var($editoraId, FILTER_SANITIZE_NUMBER_INT);

        if (!$this->editoraModel->delete($editoraId)) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "editoras/"
            );
            return;
        }

        redirect(BASE . "editoras/");
    }
}
