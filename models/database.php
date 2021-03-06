<?php

namespace Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    function __construct()
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            "driver" => DBDRIVER,
            "host" => DBHOST,
            "database" => DBNAME,
            "username" => DBUSER,
            "password" => DBPASSWORD,
            "charset" => DBCHARSET,
            "collation" => "utf8_unicode_ci",
            "prefix" => ""
        ]);
        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}
