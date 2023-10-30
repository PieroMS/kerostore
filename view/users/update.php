<?php
    require_once("c://xampp/htdocs/projectFact/controller/userController.php");
    $obj = new userController(); 
    $obj->update($_POST['id'],$_POST['rol'],$_POST['rol_cliente'],$_POST['rol_proveedor'],$_POST['rol_categorias'],$_POST['rol_productos']);
?>