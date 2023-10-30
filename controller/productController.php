<?php
class productController{
    private $model;

    public function __construct(){
        require_once("c://xampp/htdocs/projectFact/model/productModel.php");
        $this->model = new productModel;
    }

    public function index(){
        return($this->model->index()) ? $this->model->index() : false;
    }

    public function selectCat(){
        return($this->model->selectCat()) ? $this->model->selectCat() : false;
    }

    public function show($id){
        return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:home.php");
    }

    public function store($nombre, $categoria, $stock){
        $id = $this->model->store($nombre, $categoria, $stock);
        return($id!=false) ? header("Location:mostrar.php") : header("Location:mostrar.php");
    }

    public function update($id, $nombre, $categoria, $stock){
        return($this->model->update($id, $nombre, $categoria, $stock) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }   

    public function destroy($id){
        return($this->model->destroy($id) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    } 
}
?>

