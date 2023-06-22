<?php

namespace app\site\entities;

class Cliente {
    private $id;
    private $nome;
    private $cep;
    private $endereco;
    private $numero;
    private $cidade;
    private $uf;
    private $qtde;

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function setQtde($qtde){
        $this->qtde = $qtde;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function getUf(){
        return $this->uf;
    }

    public function getQtde(){
        return $this->qtde;
    }
}

