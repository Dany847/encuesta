<?php

namespace Controller;

use Classes\SessionController;

class Dashboard extends SessionController
{
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    function render()
    {
    }

}
