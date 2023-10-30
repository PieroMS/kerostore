<?php
/*
    class clientController{
        private $model;
        public function __construct(){
            require_once("c://xampp/htdocs/projectFact/model/clientModel.php");
            $this->model = new clientModel;
        }

        public function index(){
            return($this->model->index()) ? $this->model->index() : false;
        }

        public function show($id){
            return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }

        public function store($nombre,$ruc,$telefono,$direccion){
            $id = $this->model->store($nombre,$ruc,$telefono,$direccion);
            return($id!=false) ? header("Location:mostrar.php") : header("Location:create.php");
        }

        public function update($id,$nombre,$ruc,$telefono,$direccion){
            return($this->model->update($id,$nombre,$ruc,$telefono,$direccion) != false) ? header("Location:mostrar.php") : header("Location:index.php");
        }   

        public function destroy($id){
            return($this->model->destroy($id) != false) ? header("Location:mostrar.php") : header("Location:index.php");
        }  
    }
    */
?>




<?php
class clientController{
    private $model;

    public function __construct(){
        require_once("c://xampp/htdocs/projectFact/model/clientModel.php");
        $this->model = new clientModel;
    }

    public function index(){
        return($this->model->index()) ? $this->model->index() : false;
    }

    public function show($id){
        return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:home.php");
    }

    public function store($nombre,$ruc,$telefono,$correo){
        $id = $this->model->store($nombre,$ruc,$telefono,$correo);
        return($id!=false) ? header("Location:mostrar.php") : header("Location:mostrar.php");
    }

    public function update($id,$nombre,$ruc,$telefono,$correo){
        return($this->model->update($id,$nombre,$ruc,$telefono,$correo) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }   

    public function destroy($id){
        return($this->model->destroy($id) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }  
}
?>

