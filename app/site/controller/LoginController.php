<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\LoginModel;

class LoginController extends Controller {

    private $loginModel;
    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function index() {
        $this->load("login/main");
    }

    public function adicionar() {
        $this->load("login/adicionar");
    }



    public function logar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST["username"];
            $password = $_POST["txtSen"];


            trim($username);
            trim($password);


            $bUser = $this->loginModel->readByUser($username);
            if ($username && md5($password) == $bUser->senha) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;

                $this->showConfirm(
                    "Login Realizado com sucesso",
                    "Redirecionando para a página principal",
                    "home/main"
                );
            } else {
                $_SESSION['logged_in'] = false;
                $this->showMessage(
                    "Usuário ou senha inválidos!",
                    "Os dados fornecidos estão incompletos ou são inválidos!",
                    "login/"
                );
            }
        }
    }

    //----------------------------------------------------//

    public function inserir() {
        $user = filter_input(INPUT_POST, "txtUser", FILTER_UNSAFE_RAW);
        $pass = filter_input(INPUT_POST, "txtSen", FILTER_UNSAFE_RAW);
        trim($user);
        trim($pass);


        if (strlen($user) < 2 || strlen($pass) < 2) {
            $this->showMessage(
                "Formulário Inválido",
                "Os dados fornecidos estão incompletos ou são inválidos!",
                "login/adicionar"
            );
            return;
        }

        $usuarios = $this->loginModel->readByUser($user);

        foreach ($usuarios as $usuario) {
            if ($usuario == $user) {
                $this->showMessage(
                    "Erro",
                    "Esse usuário já existe, tente outro nome de usuário!",
                    "login/adicionar"
                );
                return;
            }
        }

        $result = $this->loginModel->insert($user, md5($pass));


        if ($result <= 0) {
            $this->showMessage(
                "Erro",
                "Houve um erro ao tentar cadastrar, tente novamente mais tarde!",
                "login/adicionar"
            );
            return;
        }

        redirect(BASE . "login/");
    }

    public function sair(){
        session_start();
        
        session_destroy();

        redirect(BASE);
    }

    // public function alterar($loginId = 0) {
    //     $loginId = filter_var($loginId, FILTER_SANITIZE_NUMBER_INT);
    //     $login = filter_input(INPUT_POST, "txtSen", FILTER_UNSAFE_RAW);

    //     if ($loginId <= 0 || strlen($login) < 2) {
    //         $this->showMessage(
    //             "Formulário Inválido",
    //             "Os dados fornecidos estão incompletos ou são inválidos!",
    //             "login/"
    //         );
    //         return;
    //     }

    //     if (!$this->loginModel->update($loginId, $login)) {
    //         $this->showMessage(
    //             "Erro",
    //             "Houve um erro ao tentar alterar, tente novamente mais tarde!",
    //             "login/"
    //         );
    //         return;
    //     }

    //     redirect(BASE . "login/");
    // }
}
