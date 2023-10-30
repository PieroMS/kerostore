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
        
    <h3 class="text-secondary">AGREGAR USUARIO</h3>
        <form action="store.php" method="POST" autocomplete="off">
            <div class="border__form">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Correo Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol:</label>
                    <select class="form-select" id="rol" name="rol" >
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select>
                </div>
                <div class="form__flex">
                    <div>
                        <label for="rol_cliente" class="form-label">Acceso a Clientes:</label>
                        <select class="form-select" id="rol_cliente" name="rol_cliente" >
                            <option value="1">Permitido</option>
                            <option value="2">Denegado</option>
                        </select>
                    </div>
                    <div>
                        <label for="rol_proveedor" class="form-label">Acceso a Proveedores:</label>
                        <select class="form-select" id="rol_proveedor" name="rol_proveedor" >
                            <option value="1">Permitido</option>
                            <option value="2">Denegado</option>
                        </select>
                    </div>
                    <div>
                        <label for="rol_categorias" class="form-label">Acceso a Categorias:</label>
                        <select class="form-select" id="rol_categorias" name="rol_categorias" >
                            <option value="1">Permitido</option>
                            <option value="2">Denegado</option>
                        </select>
                    </div>
                    <div>
                        <label for="rol_productos" class="form-label">Acceso a Productos:</label>
                        <select class="form-select" id="rol_productos" name="rol_productos" >
                            <option value="1">Permitido</option>
                            <option value="2">Denegado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="border__form">
                <div class="mb-3">
                    <label for="ruc" class="form-label">RUC:</label>
                    <input required type="text" class="form-control" id="ruc" name="ruc" required maxlength="11">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input required type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input required type="text" class="form-control" id="direccion" name="direccion">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input required type="text" class="form-control" id="telefono" name="telefono" maxlength="9">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="aceptar" value="ok">Aceptar</button>
                <a href="/projectFact/view/users/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
            </div>
        </form>
    </div>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>