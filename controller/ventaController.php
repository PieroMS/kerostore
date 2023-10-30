<?php
class ventaController{
    private $model;

    public function __construct(){
        require_once("c://xampp/htdocs/projectFact/model/ventaModel.php");
        $this->model = new ventaModel;
    }

    public function selectClient(){
        return($this->model->selectClient()) ? $this->model->selectClient() : false;
    }

    public function selectProduct(){
        return($this->model->selectProduct()) ? $this->model->selectProduct() : false;
    }

    public function index(){
        return($this->model->index()) ? $this->model->index() : false;
    }

    public function show($id){
        return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:home.php");
    }

    public function store($cliente,$producto,$cantidad,$precio,$importe,$igv,$total){
        $id = $this->model->store($cliente,$producto,$cantidad,$precio,$importe,$igv,$total);
        return($id!=false) ? header("Location:mostrar.php") : header("Location:mostrar.php");
    } 
    
    public function destroy($id){
        return($this->model->destroy($id) != false) ? header("Location:mostrarLista.php") : header("Location:home.php");
    }
}
?>