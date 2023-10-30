<?php
    require_once("c://xampp/htdocs/projectFact/controller/userController.php");
    $obj = new userController();
    $obj->destroyUser($_GET['id']);
?>