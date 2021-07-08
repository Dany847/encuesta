<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class InstitucionModel extends Model
{
    protected $table = "instituciones";
    public $timestamps = false;
    protected $fillable = [
        "nombre_organizacion",
        "url_logo"
    ];
}
