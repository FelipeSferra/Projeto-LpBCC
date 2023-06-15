<?php

namespace app\site\controller;

use app\core\Controller;

class LivrosController extends Controller{
    public function index(){
        $this->load("livros/main");
    }

    public function adicionar(){
        $this->load("livros/adicionar");
    }
}