<?php

namespace Controller;

use Classes\SessionController;

class User extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    function render()
    {
        $this->view->render("usuario/index", [
            "user" => $this->user
        ]);
    }
    public function create()
    {
        $this->view->render("usuario/create", [
            "user" => $this->user
        ]);
    }
}