<?php
    require_once("c://xampp/htdocs/projectFact/controller/userController.php");
    $data1 = new userController(); 
    $data2 = new userController(); 
    $data1->storeUserData($_POST['ruc'],$_POST['nombre'],$_POST['direccion'],$_POST['telefono']);
    $data2->storeUser($_POST['usuario'],$_POST['pass'],$_POST['rol'],$_POST['rol_cliente'],$_POST['rol_proveedor'],$_POST['rol_categorias'],$_POST['rol_productos']);
?>