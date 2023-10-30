<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {
    
    if ($_SESSION['rol'] == 1 || $_SESSION['rol_cliente'] == 1 ) {
        require_once("c://xampp/htdocs/projectFact/view/head/head.php");
        require_once("c://xampp/htdocs/projectFact/controller/productController.php");
        $obj = new productController();
        $data = $obj->selectCat();
    }
} else {
    echo '<script>alert("No tienes acceso."); window.location.href = "/projectfact/home.php" </script>';
}
?>

    <div class="col-12 p-5">
        <h3 class="text-secondary">AGREGAR PRODUCTOS</h3>
        <form action="store.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="nombre" class="form-label">Producto:</label>
                <input required type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <select required class="form-control form-select" id="categoria" name="categoria">
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
                <label for="stock" class="form-label">Stock:</label>
                <input required type="text" class="form-control" id="stock" name="stock">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="aceptar" value="ok">Aceptar</button>
                <a href="/projectFact/view/product/mostrar.php" type="submit" class="btn btn-danger" name="cancelar" value="canok">Cancelar</a>
            </div>
        </form>
    </div>

<?php 
    require_once("c://xampp/htdocs/projectFact/view/head/footer.php");
?>