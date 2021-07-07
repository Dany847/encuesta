<?php

namespace Controller;

use Classes\SessionController;
use Classes\ErrorMessages;

class Login extends SessionController
{
    function __construct()
    {
        parent::__construct();
        error_log("Inicio de login");
    }
    function render()
    {
        $this->view->render("login/index");
    }
    function authenticate()
    {
        if ($this->existPOST(["usuario", "password"])) {
            $username = $this->getPost("usuario");
            $password = $this->getPost("password");
            if (
                $username == "" || empty($usuario) || $password == "" || empty($pasword)
            ) {
                $this->redirect("", ["error" => ErrorMessages::ERROR_LOGIN_AUTENTICATE_EMPTY]);
            }
            $user = $this->model->login($username, $password);
            if ($user != null) {
                $this->initialize($user);
            } else {
                $this->redirect("", ["error" => ErrorMessages::ERROR_LOGIN_USUARIO_CONTRASENIA_INCONRRECTO]);
            }
        } else {
            $this->redirect("", ["error" => ErrorMessages::ERROR_LOGIN_AUTENTICATE_EMPTY]);
        }
    }
}
