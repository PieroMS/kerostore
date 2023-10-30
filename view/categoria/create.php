<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {
    require_once("c://xampp/htdocs/projectFact/view/head/head.php");
} else {
    echo '<script>alert("No tienes acceso.");';
}



?>

<div class="col-12 p-5">
        <h3 class="text-secondary">AGREGAR CATEGORIA</h3>
        <form action="store.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="codigo" class="form-label">Codigo:</label>
                <input required type="text" class="form-control" id="codigo" name="codigo">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input required type="text" class="form-control" id="categoria" name="categoria">
            </div>
            <button type="submit" class="btn btn-primary" name="aceptar" value="ok">Aceptar</button>
            <a href="/projectFact/view/categoria/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
        </form>
</div>
<?php

require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>