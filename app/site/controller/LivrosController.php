<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entities\Livro;
use app\site\model\LivroModel;
use app\site\model\EditoraModel;
use app\site\model\AutorModel;
use app\site\model\GeneroModel;

class LivrosController extends Controller {

    private $livroModel;

    public function __construct() {
        $this->livroModel = new LivroModel();
    }

    public function index() {
        $this->load("livros/main", []);
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

    //----------------------------------------------------//

    public function inserir() {
        $livro = $this->getInput();

        if (!$this->validar($livro, false)) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "livros/"
            );
            return;
        }

        $result = $this->livroModel->insert($livro);

        if ($result <= 0) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "livros/"
            );
            return;
        }

        redirect(BASE . "livros/");
    }

    private function validar(Livro $livro, bool $validateId = true) {
        if ($validateId && $livro->getId() <= 0)
            return false;

        if (strlen($livro->getTitulo()) < 3)
            return false;

        if (strlen($livro->getThumb()) < 3)
            return false;

        if (strlen($livro->getSinopse()) < 10)
            return false;

        if (strlen($livro->getStatus()) < 3)
            return false;

        if ($livro->getQtde() < 0)
            return false;

        if ($livro->getEditoraId() <= 0)
            return false;

        if ($livro->getGeneroId() <= 0)
            return false;

        if ($livro->getAutorId() <= 0)
            return false;

        return true;
    }

    private function getInput() {
        $livro = new Livro();

        $livro->setTitulo(filter_input(INPUT_POST, "txtTitulo", FILTER_UNSAFE_RAW));
        $livro->setSlug(
            $this->createSlug($livro->getTitulo())
        );
        $livro->setSinopse(filter_input(INPUT_POST, "txtSinopse", FILTER_SANITIZE_SPECIAL_CHARS));
        $livro->setThumb(filter_input(INPUT_POST, "txtThumb", FILTER_UNSAFE_RAW));
        $livro->setStatus(filter_input(INPUT_POST, "slStatus", FILTER_UNSAFE_RAW));
        $livro->setQtde(filter_input(INPUT_POST, "nmQtde", FILTER_SANITIZE_NUMBER_INT));
        $livro->setGeneroId(filter_input(INPUT_POST, "slGenero", FILTER_SANITIZE_NUMBER_INT));
        $livro->setAutorId(filter_input(INPUT_POST, "slAutor", FILTER_SANITIZE_NUMBER_INT));
        $livro->setEditoraId(filter_input(INPUT_POST, "slEditora", FILTER_SANITIZE_NUMBER_INT));

        return $livro;
    }
}
