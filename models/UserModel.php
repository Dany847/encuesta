<?php

namespace Models;

use Libs\IModel;
use Libs\Model;
use \PDO;
use \PDOException;

include_once "libs/imodel.php";

class UserModel extends Model implements IModel
{

    private $id;
    private $nombre;
    private $apellidos;
    private $usuario;
    private $password;
    private $rol;
    private $rfc;

    public function __construct()
    {
        parent::__construct();
        $this->id = 0;
        $this->nombre = "";
        $this->apellidos = "";
        $this->usuario = "";
        $this->password = "";
        $this->rol = "";
        $this->rfc = "";
    }
    public function save()
    {
        try {
            $query = $this->prepare("INSERT INTO usuarios(nombre, apellidos, usuario, password, rol, rfc) 
            VALUES(:nombre, :apellidos, :cargo, :usuario, :password, :rol, :rfc)");
            $query->execute([
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "usuario" => $this->usuario,
                "password" => $this->password,
                "rol" => $this->rol,
                "rfc" => $this->rfc
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("User_Model::save -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function getAll()
    {
        $items = [];
        try {
            $query = $this->query("SELECT * FROM usuarios");
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new UserModel();
                $item->setId($p["id"]);
                $item->setNombre($p["nombre"]);
                $item->setApellidos($p["apellidos"]);
                $item->setUsuario($p["usuario"]);
                $item->setPassword($p["password"], false);
                $item->setRol($p["rol"]);
                $item->setrfc($p["rfc"]);

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log("User_Model::getAll -> Algo anda fallando " . $e);
        }
    }
    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM usuarios WHERE id = :id");
            $query->execute([
                "id" => $id
            ]);

            $user = $query->fetch(PDO::FETCH_ASSOC);
            $this->setId($user["id"]);
            $this->setNombre($user["nombre"]);
            $this->setApellidos($user["apellidos"]);
            $this->setUsuario($user["usuario"]);
            $this->setPassword($user["password"], false);
            $this->setRol($user["rol"]);
            $this->setrfc($user["rfc"]);
            return $this;
        } catch (PDOException $e) {
            error_log("User_Model::getId -> Algo anda fallando " . $e);
        }
    }
    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE FROM usuarios WHERE id = :id");
            $query->execute([
                "id" => $id
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("User_Model::Delete -> Algo anda fallando " . $e);
        }
    }
    public function update()
    {
        try {
            $query = $this->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, 
            usuario = :usuario, password = :password, rol = :rol, rfc = rfc WHERE id = :id");
            $query->execute([
                "id" => $this->id,
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "usuario" => $this->usuario,
                "password" => $this->password,
                "rol" => $this->rol,
                "rfc" => $this->rfc
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("User_Model::getId -> Algo anda fallando " . $e);
            return false;
        }
    }
    public function from($array)
    {
        $this->id = $array['id'];
        $this->nombre = $array['nombre'];
        $this->apellidos = $array['apellidos'];
        $this->usuario = $array['usuario'];
        $this->password = $array['password'];
        $this->rol = $array['rol'];
        $this->rfc = $array['rfc'];
    }
    public function exists($username)
    {
        try {
            $query = $this->prepare("SELECT usuario FROM usuarios WHERE usuario = :username");
            $query->execute(
                array(":username" => $username)
            );
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("User_Model::exists -> Algo anda fallando " . $e);
            return false;
        }
    }

    public function comparePassword($password, $id)
    {
        try {
            $user = $this->get($id);
            return password_verify($password, $user->getPassword());
        } catch (PDOException $e) {
            error_log("User_Model::comparar pass -> Algo anda fallando " . $e);
            return false;
        }
    }

    private function getHashedPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }


    public function getrfc()
    {
        return $this->rfc;
    }
    public function setrfc($rfc): self
    {
        $this->rfc = $rfc;
        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol): self
    {
        $this->rol = $rol;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password, $hash = true)
    {
        if ($hash) {
            $this->password = $this->getHashedPassword($password);
        } else {
            $this->password = $password;
        }
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getCargo()
    {
        return $this->cargo;
    }
    public function setCargo($cargo): self
    {
        $this->cargo = $cargo;
        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }
}
