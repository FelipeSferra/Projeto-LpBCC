<?php

namespace app\site\controller;

use app\core\Controller;

class ClientesController extends Controller{
    public function index(){
        $this->load("clientes/main");
    }

    public function adicionar(){
        $this->load("clientes/adicionar");
    }
}