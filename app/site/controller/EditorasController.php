<?php

namespace app\site\controller;

use app\core\Controller;

class EditorasController extends Controller{
    public function index(){
        $this->load("editoras/main");
    }

    public function adicionar(){
        $this->load("editoras/adicionar");
    }
}