<?php

namespace Classes;

class SuccessMessages
{
    const USURIO_CREADO = "5967240064d0f8494db9bd5b6a1359b9";
    private $successList = [];
    public function __construct()
    {
        $this->successList = [
            SuccessMessages::USURIO_CREADO => "Usuario registrado exitosamente",
        ];
    }
    public function get($hash)
    {
        return $this->successList[$hash];
    }
    function existsKey($key)
    {
        if (array_key_exists($key, $this->successList)) {
            return true;
        } else {
            return false;
        }
    }
}
