<?php
    require_once("c://xampp/htdocs/projectFact/controller/categoriaController.php");
    $obj = new categoriaController(); 
    $obj->destroy($_GET['id']);
?>