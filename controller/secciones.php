<?php

namespace Controller;

use Classes\SessionController;
use Models\SeccionesModel;
use Classes\ErrorMessages;

class Secciones extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    function render()
    {
        $secciones = SeccionesModel::get();
        $this->view->render("secciones/index", [
            "user" => $this->user,
            "secciones" => $secciones
        ]);
    }
    public function create()
    {
        $this->view->render("secciones/create", [
            "user" => $this->user
        ]);
    }

    public function save()
    {
        if ($this->existPOST(["numero_seccion", "nombre_seccion"])) {
                $secciones = SeccionesModel::create([
                    "numero_seccion" => $_POST["numero_seccion"],
                    "nombre_seccion" => $_POST["nombre_seccion"],
                ]);
                if ($secciones) {
                    $secciones = SeccionesModel::all();
                    $this->view->render("secciones/index", [
                        "user" => $this->user,
                        "secciones" => $secciones
                    ]);
                }else {
                $this->redirect("secciones/create", ["error" => ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE]);
            }
        }
    }

    public function edit($id_seccion)
    {
        if ($id_seccion != null) {
            $secciones = SeccionesModel::find($id_seccion);
            $this->view->render("secciones/edit", [
                "user" => $this->user,
                "secciones" => $secciones
            ]);
        }
    }


     public function update()
    {
        if ($this->existPOST(["id_seccion", "numero_seccion", "nombre_seccion"])) {
            $id_seccion = $_POST["id_seccion"];
            $secciones = SeccionesModel::find($id_seccion);
            $secciones->numero_seccion = $_POST["numero_seccion"];
            $secciones->nombre_seccion = $_POST["nombre_seccion"];
            $secciones->save();
            if ($secciones) {
                $secciones = SeccionesModel::all();
                $this->view->render("secciones/index", [
                    "user" => $this->user,
                    "secciones" => $secciones
                ]);
            }
        } else {
            $this->redirect("secciones/edit", ["error" => ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE]);
        }
    }

     public function delete($id_seccion)
    {
        if ($id_seccion != null) {
            $secciones = SeccionesModel::where("id_seccion", $id_seccion)->first();
            $secciones->delete();
            $this->render("secciones/index");
        }
    }
    
}
