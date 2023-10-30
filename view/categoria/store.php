<?php
    require_once("c://xampp/htdocs/projectFact/controller/categoriaController.php");
    $obj = new categoriaController(); 
    $obj->store($_POST['codigo'],$_POST['categoria']);
?>