<?php
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {

    require_once("c://xampp/htdocs/projectFact/view/head/head.php");
    require_once("c://xampp/htdocs/projectFact/controller/userController.php");
    $obj = new userController();
    $user = $obj->show($_GET['id']);/*data*/
} else {
    echo '<script>alert("No tienes acceso."); window.location.href = "mostrar.php" </script>';
}
?>

<div class="col-12 p-5">
    <h3 class="text-secondary">EDITAR USUARIO</h3>
    <form action="update.php" method="POST" autocomplete="off">
        <div class="mb-3" style="display: none;">
            <label for="id" class="form-label">Id:</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="<?= $user[0] ?>">
            
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Correo Usuario:</label>
            <input type="text" class="form-control" id="usuario_id" name="usuario_id" value="<?= $user[1] ?> " disabled>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo ($user[1] == 1) ? 'Inactivo' : 'Activo'; ?> " disabled>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol:</label>
            <select class="form-select" id="rol" name="rol" >
                <option value="1" <?php if ($user[4] == 1) echo 'selected'; ?>>Administrador</option>
                <option value="2" <?php if ($user[4] == 2) echo 'selected'; ?>>Usuario</option>
            </select>
        </div>
        <div class="form__flex">
            <div class="mb-3">
                <label for="rol" class="form-label">Acceso a Clientes:</label>
                <select class="form-select" id="rol_cliente" name="rol_cliente" >
                    <option value="1" <?php if ($user[5] == 1) echo 'selected'; ?>>Permitido</option>
                    <option value="2" <?php if ($user[5] == 2) echo 'selected'; ?>>Denegado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Acceso a Proveedores:</label>
                <select class="form-select" id="rol_proveedor" name="rol_proveedor" >
                    <option value="1" <?php if ($user[6] == 1) echo 'selected'; ?>>Permitido</option>
                    <option value="2" <?php if ($user[6] == 2) echo 'selected'; ?>>Denegado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Acceso a Categorias:</label>
                <select class="form-select" id="rol_categorias" name="rol_categorias" >
                    <option value="1" <?php if ($user[7] == 1) echo 'selected'; ?>>Permitido</option>
                    <option value="2" <?php if ($user[7] == 2) echo 'selected'; ?>>Denegado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Acceso a Productos:</label>
                <select class="form-select" id="rol_productos" name="rol_productos" >
                    <option value="1" <?php if ($user[8] == 1) echo 'selected'; ?>>Permitido</option>
                    <option value="2" <?php if ($user[8] == 2) echo 'selected'; ?>>Denegado</option>
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary" name="aceptar" value="actualizar">Aceptar</button>
        <a href="/projectFact/view/users/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
    </form>
</div>

<?php
require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>