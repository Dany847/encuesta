<?php

namespace Controller;

use Classes\ErrorMessages;
use Classes\SuccessMessages;
use Models\UserModel;

require_once "models/userModel.php";

use Classes\SessionController;

class SignUp extends SessionController
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render("login/signup", []);
    }
    function nuevoUsuario()
    {
        if ($this->existPOST(["nombre", "apellidos", "cargo", "usuario", "password"])) {
            $nombre = $this->getPost("nombre");
            $apellidos = $this->getPost("apellidos");
            $cargo = $this->getPost("cargo");
            $username = $this->getPost("usuario");
            $password = $this->getPost("password");
            if (
                $nombre == "" || empty($nombre) || $apellidos == "" || empty($apellidos) ||
                $cargo == "" || empty($cargo) ||
                $username == "" || empty($usuario) || $password == "" || empty($pasword)
            ) {
                $this->redirect("signup", ["error" => ErrorMessages::ERROR_SIGNUP_CAMPOS_VACIOS]);
            }
            $usuario = new UserModel();
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setCargo($cargo);
            $usuario->setUsuario($username);
            $usuario->setPassword($password);

            $usuario->setRol("user");
            if ($usuario->exists($username)) {
                $this->redirect("signup", ["error" => ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE]);
            } else if ($usuario->save()) {
                $this->redirect("", ["success" => SuccessMessages::USURIO_CREADO]);
            } else {
                $this->redirect("signup", ["error" => ErrorMessages::ERROR_SIGNUP_ERROR]);
            }
        } else {
            $this->redirect("signup", ["error" => ErrorMessages::ERROR_SIGNUP_ERROR]);
        }
    }
}
