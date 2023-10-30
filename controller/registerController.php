<?php
    class registerController{
        private $model;
        public function __construct(){
            require_once("c://xampp1/htdocs/projectFact/model/registerModel.php");
            $this->model = new registerModel;
        }

        public function registraDataUser($nombre_usu, $telefono, $direccion){
            $id = $this->model->registraDataUser($nombre_usu, $telefono, $direccion);
            return($id!=false) ? header("Location: ../../index.php") : header("Location: ../../user/register/register.php");
        }

        public function registraEncryptUser($correoId, $passContra){
            $id = $this->model->registraEncryptUser($correoId, $passContra);
            return($id!=false) ? header("Location: ../../index.php") : header("Location: ../../user/register/register.php");
        }
    }
?>