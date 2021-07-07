<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $table = "usuarios";
    public $timestamps = false;
    protected $fillable = [
        "nombre",
        "apellidos",
        "usuario",
        "password",
        "rol",
        "rfc"
    ];
    
}
