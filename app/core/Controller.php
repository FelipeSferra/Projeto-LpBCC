<?php

namespace app\core;

error_reporting(0);
ini_set("display_errors", 0);

class Controller {
    protected function load(string $view, $params = []) {
        session_start();
        $username = $_SESSION['username'];

        $twig = new \Twig\Environment((new \Twig\Loader\FilesystemLoader("../app/site/view/")),
            ["debug" => false]
        );

        $twig->addGlobal("BASE", BASE);
        $twig->addGlobal("USER", $username);

        echo $twig->render($view . ".twig.php", $params);
    }

    protected function showMessage(string $title, string $message, string $uri, int $httpCode = 200) {
        http_response_code($httpCode);
        $this->load("partials/mensagem", [
            "title" => $title,
            "message" => $message,
            "link" => $uri
        ]);
    }

    protected function showConfirm(string $title, string $message, string $uri, int $httpCode = 200) {
        http_response_code($httpCode);
        $this->load("partials/confirm", [
            "title" => $title,
            "message" => $message,
            "link" => $uri
        ]);
    }

    protected function createSlug($titulo) {
        $slug = new \Cocur\Slugify\Slugify();

        return $slug->slugify($titulo);
    }
}
