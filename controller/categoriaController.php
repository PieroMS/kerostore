<?php
class categoriaController{
    private $model;

    public function __construct(){
        require_once("c://xampp/htdocs/projectFact/model/categoriaModel.php");
        $this->model = new categoriaModel;
    }

    public function index(){
        return($this->model->index()) ? $this->model->index() : false;
    }

    public function show($id){
        return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:home.php");
    }

    public function store($codigo,$categoria){
        $id = $this->model->store($codigo,$categoria);
        return($id!=false) ? header("Location:mostrar.php") : header("Location:mostrar.php");
    }

    public function update($id,$codigo,$categoria){
        return($this->model->update($id,$codigo,$categoria) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }  
    
    public function destroy($id){
        return($this->model->destroy($id) != false) ? header("Location:mostrar.php") : header("Location:../../home.php");
    }
}
?>