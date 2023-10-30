<?php
    require_once("c://xampp/htdocs/projectFact/controller/ventaController.php");
    $obj = new ventaController(); 
    $obj->destroy($_GET['id']);
?>