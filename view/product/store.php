<?php
    require_once("c://xampp/htdocs/projectFact/controller/productController.php");
    $obj = new productController();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $categoria = $_POST["categoria"];
        if ($categoria == "-1") {
            $error_message = "Por favor, selecciona una categoría.";
        }
        $stock = $_POST["stock"];
        $obj->store($nombre, $categoria, $stock);
    }
?>



