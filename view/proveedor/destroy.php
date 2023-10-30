<?php
    require_once("c://xampp/htdocs/projectFact/controller/proveedorController.php");
    $obj = new proveedorController(); 
    $obj->destroy($_GET['id']);
?>