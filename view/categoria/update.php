<?php
    require_once("c://xampp/htdocs/projectFact/controller/categoriaController.php");
    $obj = new categoriaController(); 
    $obj->update($_POST['id'],$_POST['codigo'],$_POST['categoria']);
?>