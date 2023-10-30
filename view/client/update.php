<?php
    require_once("c://xampp/htdocs/projectFact/controller/clientController.php");
    $obj = new clientController(); 
    $obj->update($_POST['id'],$_POST['nombre'],$_POST['ruc'],$_POST['telefono'],$_POST['correo']);
?>