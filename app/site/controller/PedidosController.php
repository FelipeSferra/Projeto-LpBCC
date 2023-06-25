<?php

namespace  app\site\controller;

use app\core\Controller;
use app\site\model\PedidoModel;

class PedidosController extends Controller{
    private $pedidoModel;

    public function __construct()
    {
        $this->pedidoModel = new PedidoModel();
    }

    public function index(){
        $this->load("pedidos/main");
    }
}