
<?php
class userController{
    private $model;

    public function __construct(){
        require_once("c://xampp/htdocs/projectFact/model/userModel.php");
        $this->model = new userModel;
    }

    public function index(){
        return($this->model->index()) ? $this->model->index() : false;
    }

    public function show($id){
        return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:home.php");
    }

    public function storeUserData($ruc,$nombre,$direccion,$telefono){
        $id = $this->model->storeUserData($ruc,$nombre,$direccion,$telefono);
        return($id!=false) ? header("Location:mostrar.php") : header("Location:mostrar.php");
    }

    public function storeUser($usuario,$pass,$rol,$rol_cliente,$rol_proveedor,$rol_categorias,$rol_productos){
        $id = $this->model->storeUser($usuario,$pass,$rol,$rol_cliente,$rol_proveedor,$rol_categorias,$rol_productos);
        return($id!=false) ? header("Location:mostrar.php") : header("Location:mostrar.php");
    }

    public function update($id,$rol,$rol_cliente,$rol_proveedor,$rol_categorias,$rol_productos){
        return($this->model->update($id,$rol,$rol_cliente,$rol_proveedor,$rol_categorias,$rol_productos) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }   

    public function destroyUser($id){
        return($this->model->destroyUser($id) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    }  

    public function back($id){
        return($this->model->back($id) != false) ? header("Location:mostrar.php") : header("Location:home.php");
    } 
}
?>

