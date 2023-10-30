<?php
    require_once("c://xampp/htdocs/projectFact/user/log/loginSet.php");
    $obj = new loginSet(); 
    $obj->logear($_POST['usuario'],$_POST['pass']);
?>