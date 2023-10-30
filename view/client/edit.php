
<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_cliente'] == 1) {
        require_once("c://xampp/htdocs/projectFact/view/head/head.php");
        require_once("c://xampp/htdocs/projectFact/controller/clientController.php");
        $obj = new clientController();
        $user = $obj->show($_GET['id']);/*data*/
    } else {
        echo '<script>alert("No tienes acceso."); window.location.href = "mostrar.php" </script>';
    }
}
?>


    <div class="col-12 p-5">
        <h3 class="text-secondary">EDITAR CLIENTE</h3>
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
                <label for="ruc" class="form-label">RUC:</label>
                <input type="text" class="form-control" id="ruc" name="ruc" value="<?= $user[2] ?>" maxlength="11">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefono:</label>
                <input type="text" class="form-control" id="phone" name="telefono" value="<?= $user[3] ?>" maxlength="9">
            </div>
            <div class="mb-3">
                <label for="dir" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="dir" name="correo" value="<?= $user[4] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="aceptar" value="actualizar">Aceptar</button>
            <a href="/projectFact/view/client/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
        </form>
    </div>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>