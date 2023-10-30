<?php
    require_once("c://xampp/htdocs/projectFact/controller/ventaController.php");
    $obj = new ventaController(); 
    $obj->store($_POST['cliente'],$_POST['producto'],$_POST['cantidad'],$_POST['precio'],$_POST['importe'],$_POST['igv'],$_POST['total']);
?>