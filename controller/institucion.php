<?php
namespace Controller;

use Classes\SessionController;
use Models\InstitucionModel;
use Classes\ErrorMessages;
class Institucion extends SessionController
{
	function __construct()
	{
		parent::__construct();
		$this->user = $this->getUserSessionData();
	}
	function render()
	{
		$institucion = InstitucionModel::get();
		$this->view->render("institucion/index", [
			"user" => $this->user,
			"institucion" => $institucion
		]);
	}
	public function create()
    {
        $this->view->render("institucion/create", [
            "user" => $this->user
        ]);
    }
    public function save()
    {
        if ($this->existPOST(["nombre_organizacion"])) {
                $url_logo = "";
                if (!empty($_FILES["url_logo"]["type"])) {
                    $fileName = uniqid() . $_FILES["url_logo"]["name"];
                    $validExtensions = array("jpeg", "jpg", "png");
                    $temporal = explode(".", $_FILES["url_logo"]["name"]);
                    $fileExtension = end($temporal);

                    if ((($_FILES["url_logo"]["type"] == "image/png") ||
                            ($_FILES["url_logo"]["type"] == "image/jpg") ||
                            ($_FILES["url_logo"]["type"] == "image/jpeg")) &&
                        in_array($fileExtension, $validExtensions)
                    ) {
                        $sourcePath = $_FILES['url_logo']['tmp_name'];
                        $targetPath = "public/img/perfil/" . $fileName;
                        if (move_uploaded_file($sourcePath, $targetPath)) {
                            $url_logo = $fileName;
                        }
                    }
                }
                $institucion = InstitucionModel::create([
                    "nombre_organizacion" => $_POST["nombre_organizacion"],
                    "url_logo" => $url_logo
                ]);
                if ($institucion) {
                    $institucion = InstitucionModel::all();
                    $this->view->render("institucion/index", [
                        "user" => $this->user,
                        "institucion" => $institucion
                    ]);
                }else {
                $this->redirect("institucion/create", ["error" => ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE]);
            }
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $institucion = InstitucionModel::where("id", $id)->first();
            $institucion->delete();
            $this->render();
        }
    }
    public function update()
    {
        if ($this->existPOST(["nombre_organizacion", "id"])) {
            $id = $_POST["id"];
            $institucion = InstitucionModel::find($id);
            $institucion->nombre_organizacion = $_POST["nombre_organizacion"];
            $institucion->save();
            if ($institucion) {
                $instituciones = InstitucionModel::all();
                $this->view->render("institucion/index", [
                    "user" => $this->user,
                    "instituciones" => $instituciones
                ]);
            }
        } else {
            $this->redirect("institucion/update", ["error" => ErrorMessages::ERROR_SIGNUP_USUARIO_EXISTE]);
        }
    }

}
