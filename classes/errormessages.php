<?php

namespace Classes;

class ErrorMessages
{
    const ERROR_LOGIN_USUARIO_CONTRASENIA_INCONRRECTO = "bcbe63ed8464684af6945ad8a89f76f8";
    const ERROR_SIGNUP_USUARIO_EXISTE = "4bc00d53606586d363275b8b3544008c";
    const ERROR_SIGNUP_CAMPOS_VACIOS = "0576c75e752d04ac340ee5714a310e47";
    const ERROR_SIGNUP_ERROR = "1e01ebedf0d419ac6c6967aafe190ad4";
    const ERROR_LOGIN_AUTENTICATE_EMPTY = "54b4f3460274ba401899a9810adb150d";
    const ASEGURADO_COMPLETO_DEPENDIENTES = "2a493b4713a5bf8cb23d7da99790cf7d";
    private $errorList = [];
    public function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_LOGIN_USUARIO_CONTRASENIA_INCONRRECTO => "Nombre de usuario y/o password incorrectos",
            ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE => "El nombre de usuario ya existe",
            ErrorMessages::ERROR_SIGNUP_CAMPOS_VACIOS => "Los campos no pueden estar vacíos",
            ErrorMessages::ERROR_SIGNUP_ERROR => "Error al registrar usuario",
            ErrorMessages::ERROR_LOGIN_AUTENTICATE_EMPTY => "Error de Llena los campos del login",
            ErrorMessages::ASEGURADO_COMPLETO_DEPENDIENTES => "El asegurado ya tiene tres dependientes"
        ];
    }
    public function get($hash)
    {
        return $this->errorList[$hash];
    }
    function existsKey($key)
    {
        if (array_key_exists($key, $this->errorList)) {
            return true;
        } else {
            return false;
        }
    }
}