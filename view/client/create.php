<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {
    
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_cliente'] == 1 ) {
        require_once("c://xampp/htdocs/projectFact/view/head/head.php");
    }
} else {
    echo '<script>alert("No tienes acceso."); window.location.href = "/projectfact/home.php" </script>';
}
?>

<div class="col-12 p-5">
    <h3 class="text-secondary">AGREGAR CLIENTE</h3>
    <form action="store.php" method="POST" autocomplete="off">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input required type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="ruc" class="form-label">RUC:</label>
            <input required type="text" class="form-control" id="ruc" name="ruc" maxlength="11">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefono:</label>
            <input required type="text" class="form-control" id="phone" name="telefono" maxlength="9">
        </div>
        <div class="mb-3">
            <label for="dir" class="form-label">Correo:</label>
            <input required type="email" class="form-control" id="dir" name="correo">
        </div>
        <button type="submit" class="btn btn-primary" name="aceptar" value="ok">Aceptar</button>
        <a href="/projectFact/view/client/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
    </form>
</div>

<?php

require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>