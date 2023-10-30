<?php
    require_once("c://xampp/htdocs/projectFact/controller/proveedorController.php");
    $obj = new proveedorController(); 
    $obj->update($_POST['id'],$_POST['nombre'],$_POST['telefono'],$_POST['direccion'],$_POST['ruc']);
?>