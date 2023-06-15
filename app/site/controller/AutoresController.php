<?php

namespace app\site\controller;

use app\core\Controller;

class AutoresController extends Controller{
    public function index(){
        $this->load("autores/main");
    }

    public function adicionar(){
        $this->load("autores/adicionar");
    }
}