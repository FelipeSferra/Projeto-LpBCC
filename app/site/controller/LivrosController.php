<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\EditoraModel;
use app\site\model\AutorModel;
use app\site\model\GeneroModel;

class LivrosController extends Controller {
    public function index() {
        $this->load("livros/main");
    }

    public function adicionar() {
        $this->load(
            "livros/adicionar",
            [
                "listaEditora" => (new EditoraModel())->readAll(),
                "listaAutor" => (new AutorModel())->readAll(),
                "listaGenero" => (new GeneroModel())->readAll()
            ]
        );
    }
}
