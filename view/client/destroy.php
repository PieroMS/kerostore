<?php
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {
    
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_cliente'] == 1 ) {
        require_once("c://xampp/htdocs/projectFact/controller/clientController.php");
        $obj = new clientController(); 
        $obj->destroy($_GET['id']);
    }
    

}else {
    echo '<script>alert("No tienes acceso."); window.location.href = "mostrar.php" </script>';
    

}
