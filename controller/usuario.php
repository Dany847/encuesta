<?php

namespace Controller;

use Classes\SessionController;
use Models\UsuarioModel;
use Classes\ErrorMessages;

class Usuario extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    function render()
    {
        $usuarios = UsuarioModel::get();
        $this->view->render("usuario/index", [
            "user" => $this->user,
            "usuarios" => $usuarios
        ]);
    }
    public function create()
    {
        $this->view->render("usuario/create", [
            "user" => $this->user
        ]);
    }
    public function save()
    {
        if ($this->existPOST(["nombre", "apellidos", "usuario", "password", "rol", "rfc"])) {
            if (!$this->existUsuario($_POST["usuario"])) {

                $usuario = UsuarioModel::create([
                    "nombre" => $_POST["nombre"],
                    "apellidos" => $_POST["apellidos"],
                    "usuario" => $_POST["usuario"],
                    "password" => $this->getHashedPassword($_POST["password"]),
                    "rol" => $_POST["rol"],
                    "rfc" => $rfc
                ]);
                if ($usuario) {
                    $usuarios = UsuarioModel::all();
                    $this->view->render("usuario/index", [
                        "user" => $this->user,
                        "usuarios" => $usuarios
                    ]);
                }
            } else {
                $this->redirect("usuario/create", ["error" => ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE]);
            }
        }
    }

    //Encriptar la password
    private function getHashedPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }
    public function ver($id)
    {
        if ($id != null) {
            $usuario = UsuarioModel::find($id);
            $this->view->render("usuario/ver", [
                "user" => $this->user,
                "usuario" => $usuario
            ]);
        }
    }
    public function delete($id)
    {
        if ($id != null) {
            $usuario = UsuarioModel::where("id", $id)->first();
            $usuario->delete();
            $this->render();
        }
    }
    private function existUsuario($usuario)
    {
        $usuario = UsuarioModel::where("usuario", $usuario)->first();
        if ($usuario != null) {
            return true;
        } else {
            return false;
        }
    }
    public function edit($id)
    {
        if ($id != null) {
            $usuario = UsuarioModel::find($id);
            $this->view->render("usuario/edit", [
                "user" => $this->user,
                "usuario" => $usuario
            ]);
        }
    }

    public function update()
    {
        if ($this->existPOST(["nombre", "apellidos", "usuario", "password", "rol", "id"])) {
            $id = $_POST["id"];
            $usuario = UsuarioModel::find($id);
            $usuario->nombre = $_POST["nombre"];
            $usuario->apellidos = $_POST["apellidos"];
            $usuario->usuario = $_POST["usuario"];
            $usuario->password = $_POST["password"];
            $usuario->rol = $_POST["rol"];
            $usuario->rfc = $_POST["rfc"];
            $usuario->save();
            if ($usuario) {
                $usuarios = UsuarioModel::all();
                $this->view->render("usuario/index", [
                    "user" => $this->user,
                    "usuarios" => $usuarios
                ]);
            }
        } else {
            $this->redirect("usuario/update", ["error" => ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE]);
        }
    }
}
