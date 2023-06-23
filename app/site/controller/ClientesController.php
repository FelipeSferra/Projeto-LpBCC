<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\entities\Cliente;
use app\site\model\ClienteModel;

class ClientesController extends Controller {

    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new ClienteModel();
    }

    public function index() {
        $this->load("clientes/main", [
            "listaCliente" => $this->clienteModel->readAll()
        ]);
    }

    public function adicionar() {
        $this->load("clientes/adicionar");
    }

    public function editar(int $clienteId) {
        $clienteId = filter_var($clienteId, FILTER_SANITIZE_NUMBER_INT);

        if ($clienteId <= 0) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "clientes/"
            );
            return;
        }

        $this->load("clientes/editar", [
            "cliente" => $this->clienteModel->readById($clienteId),
            "clienteId" => $clienteId
        ]);
    }

    public function visualizar(int $clienteId) {
        $clienteId = filter_var($clienteId, FILTER_SANITIZE_NUMBER_INT);
        $cliente = $this->clienteModel->readById($clienteId);

        if ($cliente->getNome() == null) {
            $this->showMessage(
                "Cliente não encontrada",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "clientes/"
            );
            return;
        }

        $this->load("clientes/visualizar", [
            "cliente" => $cliente,
            "clienteId" => $clienteId
        ]);
    }

    //----------------------------------------------------//

    public function inserir() {
        $cliente = $this->getInput();

        if (!$this->validar($cliente, false)) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "clientes/"
            );
            return;
        }

        $result = $this->clienteModel->insert($cliente);
        if ($result <= 0) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "clientes/"
            );
            return;
        }

        redirect(BASE . "clientes/editar/" . $result);
    }

    public function alterar(int $clienteId) {
        $cliente = $this->getInput();
        $cliente->setId($clienteId);

        if (!$this->validar($cliente)) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "clientes/"
            );
            return;
        }

        if (!$this->clienteModel->update($cliente)) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "clientes/"
            );
            return;
        }

        redirect(BASE . "clientes/");
    }

    public function excluir(int $clienteId) {
        $cliente = $this->getInput();
        $cliente->setId($clienteId);

        if (!$this->clienteModel->delete($cliente)) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar alterar, tente novamente mais tarde!",
                "clientes/"
            );
            return;
        }

        redirect(BASE . "clientes/");
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
}
