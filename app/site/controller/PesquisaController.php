<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\LivroModel;

class PesquisaController extends Controller {
    public function index() {
        $this->showMessage(
            "Página não existe",
            "Está página não existe ou não foi encontrada!",
            "",
            404
        );
        return;
    }

    public function p(string $termo) {

        $termo = filter_var($termo, FILTER_UNSAFE_RAW);
        $termo = strip_tags($termo);

        if(strlen(trim($termo)) <= 2){
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                ""
            );
            return;
        }

        $livros = (new LivroModel())->search($termo);

        $this->load("pesquisa/main", [
            "listaLivros" => $livros,
            "termo" => $termo,
            "qtdeResultado" => count($livros)
        ]);
    }
}
