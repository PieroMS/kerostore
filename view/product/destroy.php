<?php
    require_once("c://xampp/htdocs/projectFact/controller/productController.php");
    $obj = new productController(); 
    $obj->destroy($_GET['id']);
?>