<?php

namespace Controller;

use Libs\Controller;

class Errores extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('errores/index');
    }
}
