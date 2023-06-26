<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entities\Livro;
use app\site\entities\Cliente;
use app\site\model\LivroModel;
use app\site\model\ClienteModel;
use app\site\model\PedidoModel;

class PedidosController extends Controller {

    private $clienteModel;
    private $livroModel;
    private $pedidoModel;

    public function __construct() {
        $this->clienteModel = new ClienteModel();
        $this->livroModel = new LivroModel();
        $this->pedidoModel = new PedidoModel();
    }
    public function index() {
        $this->load("pedidos/main", [
            "listaPedidos" => $this->pedidoModel->readAll(),
            "listaClientes" => $this->clienteModel->readAll(),
            "listaLivros" => $this->livroModel->readAll()
        ]);
    }
    public function adicionar(int $livroId) {
        $livros = $this->livroModel->readById($livroId);
        $this->load("pedidos/adicionar", [
            "livro" => $livros,
            "listaClientes" => $this->clienteModel->readAll()
        ]);
    }

    public function visualizar($pedidoId = 0) {
        $pedidoId = filter_var($pedidoId, FILTER_SANITIZE_NUMBER_INT);

        $pedido = $this->pedidoModel->readById($pedidoId);

        if ($pedido->id <= 0) {
            $this->showMessage(
                "Pedido não encontrado",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "pedidos/"
            );
            return;
        }

        $this->load("pedidos/visualizar", [
            "pedido" => $pedido,
            "listaClientes" => $this->clienteModel->readAll(),
            "listaLivros" => $this->livroModel->readAll()
        ]);
    }

    //----------------------------------------------------//

    public function encomendar(int $livroId) {
        $livro = $this->livroModel->readById($livroId);
        $clientes = $this->clienteModel->readById(filter_input(INPUT_POST, "slCliente", FILTER_UNSAFE_RAW));
        $dataEmp = getCurrentDate();
        $dataDev = addDays($dataEmp);

        if (!$this->validar($clientes, false) || !$this->validarLivro($livro, false)) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                ""
            );
            return;
        }

        $resultP = $this->pedidoModel->insertPedido($livro->getId(), $clientes->getId(), $dataEmp, $dataDev);
        $resultC = $this->pedidoModel->update($clientes);
        $resultL = $this->pedidoModel->updateStatus($livro);

        if ($resultP <= 0 || $resultC <= 0 || $resultL <= 0) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                ""
            );
            return;
        }

        redirect(BASE);
    }

    public function devolver(int $pedidoId = 0) {
        $pedidoId = filter_var($pedidoId, FILTER_SANITIZE_NUMBER_INT);
        $pedido = $this->pedidoModel->readById($pedidoId);
        $livro = $this->livroModel->readById($pedido->livroId);

        if (!$this->pedidoModel->updateDevolucao($livro, $pedidoId)) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                ""
            );
            return;
        }

        redirect(BASE . "pedidos/");
    }

    private function validar(Cliente $cliente, bool $validateId = true) {
        if ($validateId && $cliente->getId() <= 0)
            return false;
        if (strlen($cliente->getNome()) < 3)
            return false;
        if ($cliente->getCep() <= 0)
            return false;
        if ($cliente->getNumero() <= 0)
            return false;
        if (strlen($cliente->getCidade()) < 3)
            return false;
        if (strlen($cliente->getUf()) < 2)
            return false;
        return true;

        return true;
    }
    private function validarLivro(Livro $livro, bool $validateId = true) {

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
        $cliente = new Cliente();

        $cliente->setNome(filter_input(INPUT_POST, "txtNome", FILTER_UNSAFE_RAW));
        $cliente->setCep(filter_input(INPUT_POST, "nmCEP", FILTER_SANITIZE_NUMBER_INT));
        $xml = searchCEP($cliente->getCep());
        $cliente->setEndereco($xml->logradouro);
        $cliente->setNumero(filter_input(INPUT_POST, "nmNum", FILTER_SANITIZE_NUMBER_INT));
        $cliente->setCidade($xml->localidade);
        $cliente->setUf($xml->uf);
        $cliente->setQtde(filter_input(INPUT_POST, "nmQtde", FILTER_SANITIZE_NUMBER_INT));

        return $cliente;
    }

    private function getInputLivro() {
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
