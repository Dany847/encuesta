<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class SeccionesModel extends Model
{
    protected $table = "secciones";
    protected $primaryKey = 'id_seccion';
    public $timestamps = false;
    protected $fillable = [
        "id_seccion",
        "numero_seccion",
        "nombre_seccion"
    ];
    
}