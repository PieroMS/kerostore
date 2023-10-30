<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {
    
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_cliente'] == 1 ) {
        require_once("c://xampp/htdocs/projectFact/view/head/head.php");
        require_once("c://xampp/htdocs/projectFact/controller/productController.php");
        $obj = new productController();
        $user = $obj->show($_GET['id']);/*data*/
        $data = $obj->selectCat();
        }
} else {
    echo '<script>alert("No tienes acceso."); window.location.href = "/projectfact/home.php" </script>';
}
?>

    <div class="col-12 p-5">
        <h3 class="text-secondary">EDITAR PRODUCTO</h3>
        <form action="update.php" method="POST" autocomplete="off">
            <div class="mb-3" style="display: none;">
                <label for="id" class="form-label">Id:</label>
                <input readonly type="text" class="form-control" id="id" name="id" value="<?= $user[0] ?>">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $user[1] ?>">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <select required class="form-control form-select" id="categoria" name="categoria" value="<?= $user[4] ?>>
                    <option value="-1">Seleccionar categoria</option>
                    <?php if ($data): ?>
                        <?php foreach ($data as $row): ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['categoria']; ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay categorías disponibles</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" value="<?= $user[2] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="aceptar" value="actualizar">Aceptar</button>
            <a href="/projectFact/view/product/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
        </form>
    </div>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>