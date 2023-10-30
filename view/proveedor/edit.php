
<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_cliente'] == 1) {
        require_once("c://xampp/htdocs/projectFact/view/head/head.php");
        require_once("c://xampp/htdocs/projectFact/controller/proveedorController.php");
        $obj = new proveedorController();
        $user = $obj->show($_GET['id']);/*data*/
    } else {
        echo '<script>alert("No tienes acceso."); window.location.href = "/projectFact/homeuser.php" </script>';
    }
}
?>


    <div class="col-12 p-5">
        <h3 class="text-secondary">EDITAR PROVEEDOR</h3>
        <form action="update.php" method="POST" autocomplete="off">
            <div class="mb-3" style="display: none;">
                <label for="id" class="form-label">Id:</label>
                <input readonly type="text" class="form-control" id="id" name="id" value="<?= $user[0] ?>">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $user[1] ?>">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $user[2] ?>" maxlength="9">
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $user[3] ?>">
            </div>
            <div class="mb-3">
                <label for="ruc" class="form-label">RUC:</label>
                <input type="text" class="form-control" id="ruc" name="ruc" value="<?= $user[4] ?>" maxlength="11">
            </div>
            <button type="submit" class="btn btn-primary" name="aceptar" value="actualizar">Aceptar</button>
            <a href="/projectFact/view/proveedor/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
        </form>
    </div>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>