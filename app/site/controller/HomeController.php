<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\LivroModel;

class HomeController extends Controller {
    public function index() {
        $this->load('home/main',[
            "listaLivros" => (new LivroModel())->readAll()
        ]);
    }
}
