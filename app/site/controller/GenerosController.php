<?php

namespace app\site\controller;

use app\core\Controller;

class GenerosController extends Controller {

    public function __construct() {
    }

    public function index() {
        $this->load("generos/main");
    }

    public function adicionar() {
        $this->load("generos/adicionar");
    }

    public function editar() {
    }

    public function inserir() {
        $genero = filter_input(INPUT_POST, "txtGen",FILTER_SANITIZE_STRING);

        if (strlen($genero) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "generos/adicionar"
            );
            return;
        }
    }
}
