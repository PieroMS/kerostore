<?php
class proveedorController{
    private $model;

    public function __construct(){
        require_once("c://xampp/htdocs/projectFact/model/proveedorModel.php");
        $this->model = new proveedorModel;
    }

    public function index(){
        return($this->model->index()) ? $this->model->index() : false;
    }

    public function show($id){
        return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:home.php");
    }

    public function store($nombre,$telefono,$direccion,$ruc){
        $id = $this->model->store($nombre,$telefono,$direccion,$ruc);
        return($id!=false) ? header("Location:mostrar.php") : header("Location:mostrar.php");
    }

    public function update($id,$nombre,$telefono,$direccion,$ruc){
        return($this->model->update($id,$nombre,$telefono,$direccion,$ruc) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }  
    
    public function destroy($id){
        return($this->model->destroy($id) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }
}
?>